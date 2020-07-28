<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class ItemController extends Controller
{
    public function showAddItem()
    {
        return view('item.add_item');
    }

    public function allItem()
    {
        $items = Item::all();
        return view('item.all_item', compact('items'));
    }

    public function storeItem(Request $request)
    {
        $this->validate($request,[
            'item_name' => 'required',
            'description' => 'required',
            'unit' => 'required',
        ]);
        
        $items = new Item;
        $items->item_name = $request->item_name;
        $items->description = $request->description;
        $items->unit = $request->unit;
        $items->save(); 

        return redirect()->back()->with('success','Item Added Successfully!');
    }

    public function editItem($id)
    {
        $item = Item::find($id);
         return view('item.edit_item', compact('item'));
    }

    public function updateItem(Request $request, $id)
    {
        // dd($request->all());
        // exit;
        $this->validate($request,[
            'item_name' => 'required',
            'description' => 'required',
            'unit' => 'required',
        ]);

        $items = Item::find($id);
        $items->item_name = $request->item_name;
        $items->description = $request->description;
        $items->unit = $request->unit;
        $items->save(); 

        return redirect()->route('allItem')->with('success','Item Updated Successfully!');
    }
    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->back()->with('danger','Item Deleted Successfully!');
    }
}
