<?php
// need to simplify query
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DatePeriod;
use DateInterval;

class PlayerController extends Controller{

    function formatPlayer($period, $data)
    {
        $array = array();
        for ($i = 0; $i < count($period); $i++) {
            $array[$i]['tanggal'] = $period[$i];
            $array[$i]['playertot'] = 0;
            for ($j = 0; $j < count($data); $j++) {
                if ($period[$i] == $data[$j]['tanggal']) {
                    $array[$i]['playertot'] = $data[$j]['playertot'];
                }
            }
        }

        return $array;
    }

    function getMonthPeriod($startDate, $endDate)
    {
        $array = array();
        $period = new DatePeriod(
        new DateTime($startDate),
        new DateInterval('P1M'),
        new DateTime($endDate)
        );

        foreach ($period as $date) {
            $array[] = $date->format('Y-m');
        }
        return $array;
    }

    // pemain total bulanan
    function monthly_playertot(Request $request){
        $this->validate($request, [
            'startDate'  =>  'required|date',
            'endDate'    =>  'required|date|after_or_equal:start_date'
        ]);
        
        $member = DB::select("select to_char(a.tanggal, 'YYYY-MM') as tanggal, COUNT(a) as playertot from (
            select date_trunc('month', ol.log_ts_ins) as tanggal
            from golf_fnb.order_list ol
            where date(ol.log_ts_ins) >= '$request->startDate' and date(ol.log_ts_ins) <= '$request->endDate' and ol.wno='03' and ol.name LIKE '%Member%' 
            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,'')
            order by tanggal asc
            ) as a

            group by a.tanggal
            order by a.tanggal asc");

        $guest = DB::select("select to_char(a.tanggal, 'YYYY-MM') as tanggal, COUNT(a) as playertot from (
            select date_trunc('month', ol.log_ts_ins) as tanggal
            from golf_fnb.order_list ol
            where date(ol.log_ts_ins) >= '$request->startDate' and date(ol.log_ts_ins) <= '$request->endDate' and ol.wno='03' and ol.name LIKE '%Guest%' 
            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,'')
            order by tanggal asc
            ) as a

            group by a.tanggal
            order by a.tanggal asc");

        $period = $this->getMonthPeriod($request->startDate, $request->endDate);
        $member = $this->formatPlayer($period, json_decode(json_encode($member), true));
        $guest = $this->formatPlayer($period, json_decode(json_encode($guest), true));


        return response()->json([
            'member' => $member,
            'guest' => $guest,
        ], 200, [], JSON_PRETTY_PRINT);        
    }
}
