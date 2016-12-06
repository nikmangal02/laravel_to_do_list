<?php

namespace App\Http\Controllers;
Use App\item;
use DB;

class BoughtListController extends Controller
{
    public function DisplayList()
    {
        $fetchCompleteBoughtList = item::where('is_check','=',1)->get();
        $fetchStoreNameForBoughtList = DB::table('item')->select('item.store_id','store.id','store.store_name')->join('store','item.store_id','=','store.id')->where('is_check','=',1);

        $count = count($fetchCompleteBoughtList);
        return view('pages.BoughtList',compact('fetchCompleteBoughtList' , 'count','fetchStoreNameForBoughtList'));
    }
}
