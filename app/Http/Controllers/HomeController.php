<?php

namespace App\Http\Controllers;
use DB;

class HomeController extends Controller
{
    public function home()
    {
        $item_name = DB::table('item')->paginate(5);
        $name = DB::table('item')->get();
        $count = count($name);
       $sum = DB::table('item')
           ->select(DB::raw('SUM(price) as sprice'),'item.store_id as stid')
           ->groupBy('store_id')->get();
        foreach($sum as $stors)
        {
            DB::update('update store set price =  ? where id = ? ',array($stors->sprice,$stors->stid));
        }
        $store_name = DB::table('store')->orderBy('price','desc')->get();
        $count_store_name = count($store_name);
        return view('welcome',compact('item_name','count' ,'count_store_name','name','sum','store_name'));
    }
}
