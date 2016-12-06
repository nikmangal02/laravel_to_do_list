<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class EditController extends Controller
{
    public function getId($id)
    {
        $fetch_item_name = Item::find($id);
        return view('pages.edit', compact('fetch_item_name'));
    }
    public function edit($id, Request $request)
    {
        $editItem = Item :: find($id);
        if($editItem) {
            $editItem->description = $request->description;
            $editItem->quantity = $request->quantity;
            $editItem->save();
        }else
            {
                return 'not found';
        }
        return Redirect::to('/');
    }

    public function delete($id)
    {
        $delete = Item :: find($id);
        $delete->delete();
        return Redirect::to('/');
    }
}
