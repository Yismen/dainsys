<?php

namespace App\Repositories\Capillus;

use App\Connections\RingCentralConnection;
use Illuminate\Support\Facades\DB;

class CapillusCallTypeRepository extends RingCentralConnection
{
    protected $options;

    public $call_types_count;

    public $call_types_results;

    public function __construct(array $options)
    {
        $this->options = $options;
        
        $this->call_types_count = $this->getCallsTypeCounts();
        
        $this->call_types_results = $this->getCallsTypeResults();
    }

    protected function getCallsTypeCounts()
    {
        return $this->connection()->select(
            DB::raw("
                select
                source_type, 
                source_group_name, 
                source_name, 
                source_description, 
                call_result, 
                connected_disposition, 
                dial_type, 
                count(*) num_calls
            from
                GlobalCallTypeAll
            where
                source_name like 'Cap%'
                and ANI in ('4099342098','2176914370','4783052467','5152599619','4056514625','8133938475','6123414551','7192059335','2539736831','9096938993','9175257456','3235234290','2036932151','5307629812','2165332784','3058037953','7038612414','2523945880','4804016962','2022625375','2514595276','9152496264','6473358259','3106864729','9077443056','3472665744','5615024019','3343125910','7122607803','4157609613','9073540046','3607896318','9168374421','3473366264','8309955632','8309955632','8089387122','3176570089','8572126954','6022525153','3136519889','3214203501','3214203501','2522186577','3214203842','2037588373','3047294752','3047294752','9377971331','2763858625','4013207093','9107361214','2173426547','9158205971','8504349482','8163660709','7704801785','3854195331','9542754494','7024888627','2167014120','2564998642','9739077246','2146326732','3214204020','6022845665','5758401110','4699519930','8043211789','5596232040','5596232040','9134995741','9134995741','2037588373','3047294752','2763858625','9107361214','3233762083','9896323385','7024888627','4013207093','3054962179','3054962179','3054500767','3054962179','3054962179','7547779891','7547779891','3054500767','3054962179','3054500767','3054500767','6185352722','3054500767','3054500767','3054500767','3054500767','3054500767','3054500767','3054500767','3054500767','3054500767','7316134813','3053361408','6316001051','9403935129','2135706351','2563574616','2563574616','3013679370','8608406287','5706760960','9015418920','9292751842','3146032901')
                and convert(date, call_start_dts) = '{$this->options['date']}'
                -- and connected_disposition = 'Fax Machine / Telephone Problem'
            group by 
                source_type, 
                source_group_name, 
                source_name, 
                source_description, 
                call_result, 
                connected_disposition, 
                dial_type
            order by 
                source_type, 
                source_group_name, 
                source_name, 
                source_description, 
                call_result, 
                connected_disposition, 
                dial_type
            ")
        );
    }

    protected function getCallsTypeResults()
    {
        return $this->connection()->select(
            DB::raw("
                select
                source_type, 
                source_group_name, 
                source_name, 
                source_description, 
                call_result, 
                connected_disposition, 
                dial_type, 
                ANI, DNIS, 
                call_start_dts, 
                recording_url
            from
                GlobalCallTypeAll
            where
                source_name like 'Cap%'
                and ANI in ('4099342098','2176914370','4783052467','5152599619','4056514625','8133938475','6123414551','7192059335','2539736831','9096938993','9175257456','3235234290','2036932151','5307629812','2165332784','3058037953','7038612414','2523945880','4804016962','2022625375','2514595276','9152496264','6473358259','3106864729','9077443056','3472665744','5615024019','3343125910','7122607803','4157609613','9073540046','3607896318','9168374421','3473366264','8309955632','8309955632','8089387122','3176570089','8572126954','6022525153','3136519889','3214203501','3214203501','2522186577','3214203842','2037588373','3047294752','3047294752','9377971331','2763858625','4013207093','9107361214','2173426547','9158205971','8504349482','8163660709','7704801785','3854195331','9542754494','7024888627','2167014120','2564998642','9739077246','2146326732','3214204020','6022845665','5758401110','4699519930','8043211789','5596232040','5596232040','9134995741','9134995741','2037588373','3047294752','2763858625','9107361214','3233762083','9896323385','7024888627','4013207093','3054962179','3054962179','3054500767','3054962179','3054962179','7547779891','7547779891','3054500767','3054962179','3054500767','3054500767','6185352722','3054500767','3054500767','3054500767','3054500767','3054500767','3054500767','3054500767','3054500767','3054500767','7316134813','3053361408','6316001051','9403935129','2135706351','2563574616','2563574616','3013679370','8608406287','5706760960','9015418920','9292751842','3146032901')
                and convert(date, call_start_dts) = '{$this->options['date']}'
                and connected_disposition = 'Fax Machine / Telephone Problem'
            order by 
                source_type, 
                source_group_name, 
                source_name, 
                source_description, 
                call_result, 
                connected_disposition, 
                dial_type
            ")
        );
    }
}
