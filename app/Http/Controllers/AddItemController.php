<?php

namespace App\Http\Controllers;
use DB;
use App\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddItemController extends Controller
{
    public function AddItem()
    {
        return view('pages.addItem');
    }
    public function insertItem(Request $request)
    {
        $item = new item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->quantity = $request->quantity . $request->unit;
        $this->validate($request, [
            'name' => 'required|alpha|min:3',
            'quantity' => 'required|integer|min:1|max:100'
        ]);
        $item->save();

        return Redirect::to('/');
    }

}
