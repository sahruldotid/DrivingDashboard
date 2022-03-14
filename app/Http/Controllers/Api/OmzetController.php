<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OmzetController extends Controller
{
    function daily(Request $request){
        $data = DB::select("select date(o.date_ref), count(o.date_ref) as jumlah FROM golf_fnb.order_ref o left outer join golf_fnb.registration rg on rg.no_reg = o.no_ref left outer join golf_fnb.customers cs on cs.id_customer = rg.id_customer left outer join golf_fnb.customer_type ct on ct.id_tcust = cs.id_tcust WHERE date(o.date_ref) >= '2000-01-01' and date(o.date_ref) <= '2022-01-01' and coalesce(o.status,'')=''AND (cs.folio_open=true OR cs.folio_open=false) and ct.cust_type = 'MEMBER' group by date(o.date_ref) order by date(o.date_ref) asc");
        return response()->json($data);
    }
}
