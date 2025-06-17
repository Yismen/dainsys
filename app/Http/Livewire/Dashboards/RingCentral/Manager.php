<?php

namespace App\Http\Livewire\Dashboards\RingCentral;

use App\Models\RingCentral\SessionRaw;
use App\Services\RingCentral\Tables\CallsService;
use App\Services\RingCentral\Tables\SessionRawService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use stdClass;

class Manager extends Component
{
    public $date_from;
    public $date_to;
    public $team;
    public $client;
    // public $campaign;

    private $cache_time = 60 * 60 * 8; // 8 hours

    public function mount()
    {
        $this->resetFilters();
    }

    public function render()
    {
        return view('livewire.dashboards.ring-central.manager', [
            'teams' => $this->teams(),
            'clients' => $this->clients(),
            'production_data' => $this->transformProductionData(),
        ]);
    }

    public function resetFilters()
    {
        $this->date_from = now()->format('Y-m-d');
        $this->date_to = now()->format('Y-m-d');
        $this->team = 'ECC%'; //'ECC-SD'
        $this->client = '%';
    }

    protected function transformProductionData()
    {
        return Cache::remember("ring-central-production-data-{$this->team}-{$this->client}-{$this->date_from}-{$this->date_to}", 60 * 10, function () {
            $production = $this->parseProduction()->groupBy('dial_group_prefix');

            return $production->map(function ($prod, $key) {
                $parse = new stdClass();

                $parse->client = $key;
                $parse->count = $prod->count();
                $parse->total_login_time = $prod->sum('total_login_time_mins') / 60;
                $parse->total_work_time = $prod->sum('total_work_time_mins') / 60;

                $parse->total_talk_time_mins = $prod->sum('total_talk_time_mins');
                $parse->total_pending_disp_time_mins = $prod->sum('total_pending_disp_time_mins');

                $parse->total_calls = $prod->sum('total_calls');
                $parse->total_contacts = $prod->sum('total_contacts');
                $parse->total_sales = $prod->sum('total_sales');
                $parse->talk_time_avg_mins = $parse->total_calls === 0 ? 0 : $parse->total_talk_time_mins / $parse->total_calls;
                $parse->dispo_avg_mins = $parse->total_calls === 0 ? 0 : $parse->total_pending_disp_time_mins / $parse->total_calls;
                $parse->efficiency_rate = $parse->total_login_time === 0 ? 0 : $parse->total_work_time / $parse->total_login_time * 100;
                $parse->contact_ratio = $parse->total_calls === 0 ? 0 : $parse->total_contacts / $parse->total_calls * 100;
                $parse->conversion_ratio = $parse->total_contacts === 0 ? 0 : $parse->total_sales / $parse->total_contacts * 100;
                $parse->sph = $parse->total_work_time === 0 ? 0 : $parse->total_sales / $parse->total_work_time;

                return $parse;
            });
        });
    }

    protected function parseProduction(): Collection
    {
        $production = $this->production();
        $calls = $this->calls();

        $production->map(function ($prod) use ($calls) {
            $parsedCalls = $calls->filter(fn($calls) => $prod->agent_name === $calls->agent_name
                && $prod->date === $calls->date
                && ($prod->dial_group_prefix === 'HTL'
                        ? in_array($calls->dial_group_prefix, ['HTL', 'AKP', 'BCM'])
                        : $prod->dial_group_prefix === $calls->dial_group_prefix));

            $prod->total_duration = $parsedCalls->sum('total_duration') ?? 0;
            $prod->total_sec_on_hold = $parsedCalls->sum('total_sec_on_hold') ?? 0;
            $prod->total_agent_wait_time = $parsedCalls->sum('total_agent_wait_time') ?? 0;
            $prod->total_agent_wrap_time = $parsedCalls->sum('total_agent_wrap_time') ?? 0;
            $prod->total_calls = $parsedCalls->sum('total_calls') ?? 0;
            $prod->total_contacts = $parsedCalls->sum('total_contacts') ?? 0;
            $prod->total_sales = $parsedCalls->sum('total_sales') ?? 0;

            return $prod;
        });

        return $production;
    }

    protected function production(): Collection
    {
        $service = new SessionRawService();

        $production = $service->datesBetween($this->date_from, $this->date_to)
            ->groupByDate()
            ->build([
                'agent_name' => '%',
                // 'agent_id' => '%',
                'team' => $this->team,
                'dial_group_prefix' => $this->client,
            ])
        ;

        return $production->get();
    }

    protected function calls(): Collection
    {
        $service = new CallsService();

        $calls = $service->datesBetween($this->date_from, $this->date_to)
            ->groupByDate()
            ->build([
                'agent_name' => '%',
                // 'agent_id' => '%',
                // 'team' => $this->team,
                'dial_group_prefix' => $this->client,
            ])
        ;

        return $calls->get();
    }

    protected function teams(): Collection
    {
        return Cache::remember('ring_central_teams', $this->cache_time, fn() => SessionRaw::query()
            ->groupBy('team')
            ->whereDate('date', '>=', now()->subYear()->startOfYear())
            ->where('team', 'like', 'Ecc%')
            ->orderBy('team')
            ->get(['team']));
    }

    protected function clients(): Collection
    {
        return Cache::remember('ring_central_clients', $this->cache_time, fn() => SessionRaw::query()
            ->groupBy('dial_group_prefix')
            ->whereDate('date', '>=', now()->subYear()->startOfYear())
            ->where('team', 'like', 'Ecc%')
            ->orderBy('dial_group_prefix')
            ->get(['dial_group_prefix']));
    }
}
