<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use DB;
use App\item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use App\store;

class HomeController extends Controller
{
    public function home()
    {
        $item_name = DB::table('item')->paginate(5);
        $name = DB::table('item')->get();
        $count = count($name);
//        $store_name = DB::table('store')->select()->Limit(3)->get();
//        $priceSum = DB::table('item')->where('is_check',1)->sum('price');
//        $priceSum = DB::table('item')->selectRaw('sum(price) as sumPrice')->where('item.store_id','=',' store.id')->groupBy('store_id')->orderBy('price')->get('sumPrice');
//        $sql="select *,(select store_name from store where item.store_id=store.id) as name, SUM(price) as price from item where is_check=1 group by store_id order by price desc limit 0,3";
//        $sum = DB::table('item')->selectRaw('store_id','sum(price) as total')->where('item.store_id','=','store.id')->where(is_check ,1)->groupBy('store_id')->orderBy('price')->get();
//        $sum = item::join('store', 'store.id', '=', 'item.store_id')->select('store.store_name as storename', DB::raw('SUM(item.price) as total_price'))->groupBy('item.price')->orderBy('total_price')->take(3)->get();
       /*$sum = DB::table('store')
           ->join('item', function ($join)
           {
               $join->on('store.id', '=', 'item.store_id')->select('store_name from store as storename', DB::raw('SUM(item.price) as total_price'))->where('item.is_check',1)->groupBy('item.store_id')->orderBy('total_price');
           })
           ->take(3)->get();
        $count_store_name = count($sum);*/

      /* $storeds = DB::table('item')
            ->select(DB::raw('SUM(price) as sprice'),'item.store_id as stid')
            ->groupBy('store_id')->get();

        /*foreach($storeds as $stors)
        {

            DB::update('update store set price =  ? where id = ? ',array($stors->sprice,$stors->stid));

        }*/
        /*$store_name = DB::table('store')->orderBy('price','desc')->get();

        $count_store_name = count($store_name);*/

       /* return view('welcome')
            ->with ('item_name' , $item_name)
            ->with ('store_name' , $store_name)
            ->with ('count', $count)
            ->with ('stored', $storeds)
            ->with ('count_store_name', $count_store_name);*/
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
