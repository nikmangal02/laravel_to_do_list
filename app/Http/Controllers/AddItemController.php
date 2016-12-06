<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DB;
use App\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\In;

class AddItemController extends Controller
{
    public function AddItem()
    {
        return view('pages.addItem');
    }
    public function insertItem(Request $request)
    {
      /*$name = $request->input('name');
        $description = $request->input('description');
        $quantity = $request->input('quantity');
        item::create([
            'name' => $name,
            'description' => $description,
            'quantity' => $quantity
        ]);*/
        /*DB::table('item')->insert([
            ['name' => $request->name],
            ['description' => $request->description],
            ['quantity' => $request->quantity]
        ]);*/
//        Log::info($request);
        $item = new item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
        $this->validate($request, [
            'name' => 'required|min:4',
            'quantity' => 'required|min:4|max:10|alpha_num'
        ]);
        $item->save();

        return Redirect::to('/');
    }

}
