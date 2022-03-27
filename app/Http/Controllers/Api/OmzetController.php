<?php
// need to simplify query
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DatePeriod;
use DateInterval;

class OmzetController extends Controller

{

    function getDayPeriod($startDate, $endDate)
    {
        $array = array();
        $period = new DatePeriod(
        new DateTime($startDate),
        new DateInterval('P1D'),
        new DateTime($endDate)
        );

        foreach ($period as $date) {
            $array[] = $date->format('Y-m-d');
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


    function formatOmzet($period, $data)
    {
        $array = array();
        for ($i = 0; $i < count($period); $i++) {
            $array[$i]['tanggal'] = $period[$i];
            $array[$i]['jumlah'] = 0;
            for ($j = 0; $j < count($data); $j++) {
                if ($period[$i] == $data[$j]['tanggal']) {
                    $array[$i]['jumlah'] = $data[$j]['jumlah'];
                }
            }
        }

        return $array;
    }



    function daily(Request $request){
        $this->validate($request, [
            'startDate'  =>  'required|date',
            'endDate'    =>  'required|date|after_or_equal:start_date'
        ]);

        $member = DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                        select date(od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                        from golf_fnb.order_list ol
                        left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                        inner join master_ma.ware wr on wr.wno=ol.wno
                        inner join master_ma.deppro dp on wr.dept_code = dp.code
                        where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03' and ol.name LIKE '%Member'
                        group by ol.code_item, date(od.date_ref), ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group  order by date(od.date_ref) asc
                        ) as a
                        group by a.tanggal
                        order by a.tanggal asc");

        $guest = DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                        select date(od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                        from golf_fnb.order_list ol
                        left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                        inner join master_ma.ware wr on wr.wno=ol.wno
                        inner join master_ma.deppro dp on wr.dept_code = dp.code
                        where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03' and ol.name LIKE '%Guest'
                        group by ol.code_item, date(od.date_ref), ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group  order by date(od.date_ref) asc
                        ) as a
                        group by a.tanggal
                        order by a.tanggal asc");

        $total =  DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                        select date(od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                        from golf_fnb.order_list ol
                        left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                        inner join master_ma.ware wr on wr.wno=ol.wno
                        inner join master_ma.deppro dp on wr.dept_code = dp.code
                        where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03'
                        group by ol.code_item, date(od.date_ref), ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group  order by date(od.date_ref) asc
                        ) as a
                        group by a.tanggal
                        order by a.tanggal asc");

        // fill the blank data
        $period = $this->getDayPeriod($request->startDate, $request->endDate);
        $member = $this->formatOmzet($period, json_decode(json_encode($member), true));
        $guest = $this->formatOmzet($period, json_decode(json_encode($guest), true));
        $total = $this->formatOmzet($period, json_decode(json_encode($total), true));


        return response()->json([
            'member' => $member,
            'guest' => $guest,
            'total' => $total,
        ], 200, [], JSON_PRETTY_PRINT);

    }

    // omzet bulanan
    function monthly(Request $request){
        $this->validate($request, [
            'startDate'  =>  'required|date',
            'endDate'    =>  'required|date|after_or_equal:start_date'
        ]);

        $member = DB::select("select to_char(a.tanggal, 'YYYY-MM') as tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03' and ol.name LIKE '%Member'
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");

        $guest = DB::select("select to_char(a.tanggal, 'YYYY-MM') as tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03' and ol.name LIKE '%Guest'
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");


        $total = DB::select("select to_char(a.tanggal, 'YYYY-MM') as tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03'
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");

        // fill the blank data
        $period = $this->getMonthPeriod($request->startDate, $request->endDate);
        $member = $this->formatOmzet($period, json_decode(json_encode($member), true));
        $guest = $this->formatOmzet($period, json_decode(json_encode($guest), true));
        $total = $this->formatOmzet($period, json_decode(json_encode($total), true));


        return response()->json([
            'member' => $member,
            'guest' => $guest,
            'total' => $total,
        ], 200, [], JSON_PRETTY_PRINT);
    }


    // omzet bulanan ZT3
    function monthly_zt3(Request $request){
        $this->validate($request, [
            'startDate'  =>  'required|date',
            'endDate'    =>  'required|date|after_or_equal:start_date'
        ]);

        $member = DB::select("select to_char(a.tanggal, 'YYYY-MM') as tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03' and ol.name LIKE '%Member' AND extract(hour from od.date_ref) IN (16, 20)
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");

        $guest = DB::select("select to_char(a.tanggal, 'YYYY-MM') as tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03' and ol.name LIKE '%Guest' AND extract(hour from od.date_ref) IN (16, 20)
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");

        $total = DB::select("select to_char(a.tanggal, 'YYYY-MM') as tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' and ol.wno='03' AND extract(hour from od.date_ref) IN (16, 20)
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");

        $period = $this->getMonthPeriod($request->startDate, $request->endDate);
        $member = $this->formatOmzet($period, json_decode(json_encode($member), true));
        $guest = $this->formatOmzet($period, json_decode(json_encode($guest), true));
        $total = $this->formatOmzet($period, json_decode(json_encode($total), true));

        return response()->json([
            'member' => $member,
            'guest' => $guest,
            'total' => $total,
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
