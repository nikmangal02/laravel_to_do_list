<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\store;
use App\item;
use App\Http\Controllers\DB;

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
        $store->save();
        return redirect('/bought/'.$id);
    }
}
