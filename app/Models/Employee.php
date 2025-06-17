<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Trackable;
use App\ModelFilters\FilterableTrait;
use App\Models\DainsysModel as Model;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\Mutators\EmployeeMutators;
use App\Http\Traits\Accessors\EmployeeAccessors;
use App\Http\Traits\Relationships\EmployeeRelationships;

class Employee extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use EmployeeRelationships;
    use EmployeeAccessors;
    use EmployeeMutators;
    use Trackable;
    use FilterableTrait;

    protected $fillable = [
        'first_name',
        'second_first_name',
        'last_name',
        'second_last_name',
        'hire_date',
        'personal_id',
        'passport',
        'date_of_birth',
        'cellphone_number',
        'secondary_phone',
        'position_id',
        'site_id',
        'project_id',
        'supervisor_id',
        'gender_id',
        'marital_id',
        'ars_id',
        'afp_id',
        'nationality_id',
        'has_kids',
        'photo',
    ];

    protected $guarded = [];

    protected $appends = [
        'full_name',
        'active',
        'status',
    ];

    protected $with = [
        'termination'
    ];

    protected $casts = [
        'hire_date' => 'datetime',
        'date_of_birth' => 'datetime',
        'has_kids' => 'boolean',
    ];

    public function scopeAll($query)
    {
        return $query;
    }

    /**
     * sort the query in ascending order.
     *
     * @param QueryBuilder $query
     *
     * @return $query
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('first_name')
            ->orderBy('second_first_name')
            ->orderBy('last_name')
            ->orderBy('second_last_name');
    }

    /**
     * Limit the query to the Vips only.
     *
     * @param QueryBuilder $query
     *
     * @return $query
     */
    public function scopeUniversals($query)
    {
        return $query->with('universal')->has('universal');
    }

    /**
     * Limit the query to those not assigned as universal.
     *
     * @param QueryBuilder $query
     *
     * @return $query
     */
    public function scopeNoUniversals($query)
    {
        return $query->with('universal')->has('universal', false);
    }

    /**
     * Limit the query to the Vips only.
     *
     * @param QueryBuilder $query
     *
     * @return $query
     */
    public function scopeVips($query)
    {
        return $query->with('vip')->has('vip');
    }

    /**
     * Limit the query to those not assigned as vip.
     *
     * @param QueryBuilder $query
     *
     * @return $query
     */
    public function scopeNoVips($query)
    {
        return $query->with('vip')->has('vip', false);
    }

    /**
     * Limit the query to employees not associated to a termination.
     *
     * @param QueryBuilder $query QueryBuilder Instance
     *
     * @return [type] Chain of query builder instance
     */
    public function scopeActives($query)
    {
        return $query->has('termination', false);
    }

    /**
     * Query Active employees or terminated after a given date.
     *
     * @param Query Builder $query -automatically injected by laravel
     * @param Carbon $date carbon instance. The Date since where
     *                     to include the inactives. Default is 1 month ago
     *
     * @return Query Builder        query builder instance
     */
    public function scopeRecents($query, ?Carbon $date = null)
    {
        if ($date === null) {
            $date = Carbon::now()->subMonths(3);
        }

        return $query->actives()
            ->orWhereHas(
                'termination',
                fn($query) => $query->where('termination_date', '>=', $date)
            );
    }

    public function scopeNotRecents($query, ?Carbon $date = null)
    {
        if ($date === null) {
            $date = Carbon::now()->subMonths(3);
        }

        return $query->actives()
            ->orWhereHas(
                'termination',
                fn($query) => $query->where('termination_date', '<', $date)
            );
    }

    /**
     * Limit the query to employees associated to a termination.
     * By definition these employees are considered inactives.
     *
     * @param QueryBuilder $query QueryBuilder Instance     *
     *
     * @return [type] Chain of query builder instance
     */
    public function scopeInactives($query)
    {
        return $query
            // ->with([
            //     'termination' => function ($query) {
            //         $query
            //             ->with([
            //                 'terminationType',
            //                 'terminationReason',
            //             ]);
            //     }
            // ])
            ->whereHas(
                'termination',
                function ($query): void {
                    $query->whereDate('termination_date', '<=', Carbon::today());
                }
            );
    }

    public function scopeHiredSince($query, $date)
    {
        $date = Carbon::parse($date);

        return $query->where('hire_date', '<=', $date);
    }

    public function scopeActiveSince($query, $date)
    {
        $date = Carbon::parse($date);

        return $query->actives()->where('hire_date', '<=', $date);
    }

    /**
     * Determine if an employee was active on a given date.
     *
     * @param [query]          $query DB query builder chaining
     * @param [string as date] $date  A date like string to parsed with Carbon
     *
     * @return [query] returns the query builder chaining
     */
    public function scopeWasActiveOrTerminatedBefore($query, $date)
    {
        $date = Carbon::parse($date);

        return $query->where('hire_date', '<=', $date)
            ->where(function ($query) use ($date): void {
                $query->has('termination', false)
                    ->orWhereHas('termination', function ($query) use ($date): void {
                        $query->where('termination_date', '>=', $date);
                    });
            });
    }

    public function scopeMissingCard($query)
    {
        return $query->has('card', false);
    }

    public function scopeForDefaultSites($query)
    {
        $default_sites = config('dainsys.limit_queries.sites');

        return $query->when(request('site') === null, function ($query) use ($default_sites): void {
            $query->whereHas('site', function ($site_query) use ($default_sites): void {
                $site_query->whereIn('name', $default_sites);
            });
        });
    }

    public function scopeMissingPhoto($query)
    {
        $query
            ->where(function ($query): void {
                $query
                    ->where('photo', '')
                    ->orWhereNull('photo');
            });
    }

    public function computedSalary()
    {
        $base_salary = 8310;
        if ($this->position && $this->position->salary) {
            // if ($this->position->payment->payment_type == 'By-Weekly') {
            //  return $this->position->salary * 2;
            // };

            // if ($this->position->payment->payment_type == 'Monthly') {
            //  return $this->position->salary;
            // };
            if ($this->position->salary > $base_salary) {
                return $this->position->salary;
            }
        }

        return $base_salary;
    }

    public function vacationsStarts()
    {
        return $this->hire_date->addYears(1);
    }

    public function vacationsEnds()
    {
        $starts = $this->vacationsStarts();
        $days = $starts->diffInYears(Carbon::today()) >= 5 ? 21 : 14;

        return $starts->addDays($days);
    }

    public function activesOn($date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');

        return $this->where('hire_date', '<=', $date)
            ->with([
                'termination' => fn($query) => $query->where('termination_date', '>=', $date),
            ])
            ->get();
    }

    public function activesOnYear($year)
    {
        return $this->whereYear('hire_date', '<=', $year)->with([
            'termination' => fn($query) => $query->where('termination_date', '>=', '2012-02-09'),
        ])->get();
    }

    /**
     * Inactivate the current employee
     *
     * @param  Carbon            $carbon
     * @param  TerminationType   $termination_type
     * @param  TerminationReason $termination_eason
     * @param  string            $comments
     *
     * @return void
     */
    public function inactivate(Carbon $carbon, TerminationType $termination_type, TerminationReason $termination_eason, ?string $comments = null)
    {
        return $this->termination()->updateOrCreate([
            'termination_date' => $carbon->now(),
            'termination_type_id' => $termination_type->id,
            'termination_reason_id' => $termination_eason->id,
            'comments' => $comments,
        ]);
    }

    /**
     * cheks if the current employeed.
     *
     * @return string or null 'Masculine'
     */
    public function isMasculine()
    {
        return $this->has('gender') && $this->gender->gender === 'Masculine' ? 'Masculine' : null;
    }

    public function isFemenine()
    {
        return $this->has('gender') && $this->gender->gender === 'Femenine' ? 'Femenine' : null;
    }

    public function isOfGender($gender, $return_value = null)
    {
        if ($this->has('gender') && strtolower((string) $this->gender->gender) === strtolower((string) $gender)) {
            if ($return_value) {
                return $return_value;
            }

            return $gender;
        }

        return null;
    }

    public function loadLists()
    {
        return $this
            ->append([
                'ars_list',
                'afp_list',
                'banks_list',
                'departments_list',
                'genders_list',
                'has_kids_list',
                'maritals_list',
                'positions_list',
                'projects_list',
                'payment_types_list',
                'payment_frequencies_list',
                'nationalities_list',
                'sites_list',
                'supervisors_list',
                'termination_type_list',
                'termination_reason_list',
            ]);
    }

    public function processProgress(int $process_id)
    {
        return Cache::rememberForever("employee-process-progress-{$process_id}-{$this->id}", function () use ($process_id) {
            $process = Process::query()
                ->where('id', $process_id)
                ->withCount('steps')
                ->first();

            $employee_process_steps_count = $this->steps()->where(
                'process_id',
                $process->id
            )->count();

            return (int) $process->steps_count === 0 ? 0 : (int) $employee_process_steps_count / (int) $process->steps_count * 100;
        });
    }
    /**
     * Fields to be converted to Carbon instances.
     *
     * @return Carbon Instance
     */
    protected function casts(): array
    {
        return [
            'hire_date' => 'datetime',
            'date_of_birth' => 'datetime',
        ];
    }
}
