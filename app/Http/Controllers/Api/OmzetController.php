<?php
// need to simplify query
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OmzetController extends Controller

{
    // omzet daily
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
                        left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                        left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                        left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                        where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) and ct.cust_type = 'MEMBER'
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
                        left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                        left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                        left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                        where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) and ct.cust_type = 'GUEST'
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
                        left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                        left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                        left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                        where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) and ct.cust_type IN ('GUEST', 'MEMBER')
                        group by ol.code_item, date(od.date_ref), ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group  order by date(od.date_ref) asc
                        ) as a
                        group by a.tanggal
                        order by a.tanggal asc");

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

        $member = DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                            left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                            left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) and ct.cust_type = 'MEMBER'
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");

        $guest = DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                            left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                            left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) and ct.cust_type = 'GUEST'
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");


        $total = DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                            left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                            left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) and ct.cust_type IN ('GUEST', 'MEMBER')
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");
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

        $member = DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                            left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                            left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) AND ct.cust_type = 'MEMBER' AND extract(hour from od.date_ref) IN (16, 20)
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");

        $guest = DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                            left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                            left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) and ct.cust_type = 'GUEST' AND extract(hour from od.date_ref) IN (16, 20)
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");

        $total = DB::select("select a.tanggal, sum(a.amount) as jumlah from (
                            select date_trunc('month', od.date_ref) as tanggal, sum(coalesce(ol.dpp_orderlist,0)) as amount
                            from golf_fnb.order_list ol
                            left join golf_fnb.order_ref od on od.id_ref=ol.id_ref
                            inner join master_ma.ware wr on wr.wno=ol.wno
                            inner join master_ma.deppro dp on wr.dept_code = dp.code
                            left join golf_fnb.registration rg on rg.no_reg = od.no_ref
                            left join golf_fnb.customers cs on cs.id_customer = rg.id_customer
                            left join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust
                            where od.trans_status='CLOSE' and coalesce(od.status,'') != 'CANCELED' and coalesce(od.status,'')='' and date(od.date_ref) >= '$request->startDate' and date(od.date_ref) <= '$request->endDate' and dp.code='420' AND (cs.folio_open=true OR cs.folio_open=false) AND ct.cust_type IN ('MEMBER', 'GUEST') AND extract(hour from od.date_ref) IN (16, 20)
                            group by ol.code_item, tanggal, ol.name, ol.wno, ol.price, coalesce(ol.unit_code,''), wr.ware_group
                            order by tanggal asc
                            ) as a

                            group by a.tanggal
                            order by a.tanggal asc");
        return response()->json([
            'member' => $member,
            'guest' => $guest,
            'total' => $total,
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
