<?php

namespace App\Http\Controllers;

use App\item;
use App\store;
use Carbon\Carbon;
use Faker\Provider\cs_CZ\DateTime;
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
//       return $id;
        $BoughtItem = Item ::find($id);
        //$store_id = DB::table('store')->find(id);
         $BoughtItem->price = $request->price;
        $BoughtItem->store_id = $request->store;
        $BoughtItem->is_check = 1;
//        $BoughtItem->create_at = $request->DateTime();
        $this->validate($request,[
            'price' => 'required|max:50',
            'store' => 'required|not_in:-1'
        ]);
        $BoughtItem->create_at = Carbon::now();
        $BoughtItem->save();
return Redirect::to('/');
        //return $fetch_name;
    }
}
