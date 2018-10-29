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
    public function getCount()
    {
        $completed = Item::where('status','=','1')->selectRaw('count(*) as completed')->get()->toArray();
        $pending = Item::where('status','=','0')->selectRaw('count(*) as pending')->get()->toArray();
        $json = '[';
        $json .=    '{"completed":"'.$completed[0]['completed'].'","pending":"'.$pending[0]['pending'].'"}';
        $json .= ']';
        return $json;
    }
    //Create a new Item to the list
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

    //Search for the Item (Just AutoComplete)
    public function search(Request $request)
    {
        $term = $request->term;
        $items = Item::where('item', 'LIKE', '%'.$term.'%')->get();
        //return $item;
        if(count($items) == 0){
            $searchResult[] = 'No item found !';
        }else{
            foreach($items as $item){
                $searchResult[] = $item->item; 
            }
        }
        return $searchResult;    
    }

}
