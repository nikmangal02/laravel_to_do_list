<?php

namespace App\Http\Controllers;
use App\item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class BoughtItemController extends Controller
{
    public function show($id)
    {
        $fetch_name = Item::find($id);
        $stores = DB::table('store')->get();
        return view('pages.BoughItem', compact('fetch_name','stores'));
    }
    public function GetId($id, Request $request)
    {
        $BoughtItem = Item ::find($id);
         $BoughtItem->price = $request->price;
        $BoughtItem->store_id = $request->store;
        $BoughtItem->is_check = 1;
            $this->validate($request,[
            'price' => 'required|max:50',
            'store' => 'required|not_in:-1'
        ]);
        $BoughtItem->create_at = Carbon::now();
        $BoughtItem->save();
        return Redirect::to('/');
    }
}
