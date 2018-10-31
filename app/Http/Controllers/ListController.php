<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;
use App\User;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //List All Items
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }
    public function create(Request $request)
    {
        $item = new Item;
        $item->item = $request->text;
        $item->status = $request->status;
        $item->save();
        return response()->json('Successfully added');
    }   
    //Delete a Item from the list
    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        return response()->json('Successfully Deleted');
    }
    //Update the Item
    public function update($id, Request $request)
    {
        $item = Item::find($id);
        $item->item = $request->text;
        $item->status = $request->status;
        $item->save();
        return response()->json('Successfully Updated');
    }
    
    public function show($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }
}
