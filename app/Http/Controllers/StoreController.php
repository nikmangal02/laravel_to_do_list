<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\store;
use App\item;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Redirect;

class StoreController extends Controller
{
    public function index($id)
    {
        $fetch_item_id = Item :: find($id);
        return view('pages.store', compact('fetch_item_id'));
    }
    public function insertStore($id,Request $request)
    {
        $store = new store();
        $store->store_name = $request->storeName;
        $store->store_addr = $request->address;
        $this->validate($request, [
            'storeName' => 'required|min:4'
        ]);
   /*  $store_name =$request->input('store_name');
        if(!store::where('store_name',$store_name)->count())
        {
            $store = new store;
            $store_id = $store->insertGetId([
                'store_name' =>$store_name
            ]);

        }
        else {

            $store_id = store::where('store_name', $store_name)->value('id');
        }*/
       /* $sum = DB::table('store')
            ->join('item', function ($join) {
                $join->on('store.id', '=', 'item.store_id')->select('store_name from store as storename', DB::raw('SUM(item.price) as total_price'))->where('item.is_check',1)->groupBy('item.store_id')->orderBy('total_price');
            })
            ->take(5)->get();*/
        $store->save();
        return redirect('/bought/'.$id);
        //return Redirect::to('bought/fetchItemIdForPreviousUrl');
        //return Redirect:: url()->previous();
//return new RedirectResponse("http://localhost:8000/bought/$getIt");
    }
}
