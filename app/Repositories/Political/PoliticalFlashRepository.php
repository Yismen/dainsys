<?php

namespace App\Repositories\Political;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Connections\RingCentralConnection;

class PoliticalFlashRepository extends RingCentralConnection implements PoliticalFlashInterface
{
    public $hours;

    public $dispositions;

    public $answers;

    protected $date_from;

    protected $date_to;

    protected $team = 'ECC%';

    public function __construct(array $options)
    {
        $this->date_from = $options['date_from'];
        $this->date_to = $options['date_to'];
        $this->hours = $this->getHours();
        $this->dispositions = $this->getDispositions();
        $this->answers = $this->getAnswers();
    }

    public function hasHours(): bool
    {
        if (count($this->hours) > 0) {
            $cache_key = "political_flash_{$this->date_from}_{$this->date_to}_" . collect($this->hours)->sum('TotalHours');

            if (!Cache::has($cache_key)) {
                Cache::put($cache_key, 'some', now()->addHours(3));

                return true;
            }
        }
        return false;
    }

    public function getHours()
    {
        return $this->connection()->select(
            DB::raw("
                declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50), @team as varchar(50)
                set @fromDate = '{$this->date_from}'
                set @toDate = '{$this->date_to}' 
                set @team = '{$this->team}' 
                
                exec [sp_POL_Campaign_Hours_Total] @fromDate, @toDate, @team
            ")
        );
    }

    public function getDispositions()
    {
        return $this->connection()->select(
            DB::raw("
                declare @reportDate as date
                set @reportDate = '{$this->date_to}'
                
                select
                    campaign_name,
                    disposition,
                    sum(num_leads) as num_leads
                FROM
                    POL_AllCampaignFlash
                WHERE
                            report_date = @reportDate
                group by 
                            campaign_name, 
                            disposition
                order by 
                            campaign_name desc, 
                            disposition
            ")
        );
    }

    public function getAnswers()
    {
        return $this->connection()->select(
            DB::raw("
                declare @reportDate as date
                set @reportDate = '{$this->date_to}'
                
                select
                    *
                FROM
                    POL_AllCampaignFlash
                WHERE
                            report_date = @reportDate
                order by 
                            campaign_name desc
            ")
        );
    }
}
