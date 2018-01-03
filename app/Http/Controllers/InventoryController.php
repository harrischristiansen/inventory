<?php
/*
	Inventory Controller
	File created by Harris Christiansen (HarrisChristiansen.com)
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class InventoryController extends Controller {
	
	public function index() {
		return view('pages.home');
	}
	
	public function getList() {
		$items = Item::all();
		return view('pages.item.list', compact('items'));
	}
	
	// --------------- Items ---------------
	
	public function getItem(Item $item) {
		return view('pages.item.item', compact('item'));
	}
	
	public function getItemCreate() {
		$item = new Item();
		$item->id = 0;
		return view('pages.item.edit', compact('item'));
	}
	
	public function getItemEdit(Item $item) {
		return view('pages.item.edit', compact('item'));
	}
	
	public function postItem(Request $request, Item $item=null) {
		// Get Inputs
		$name = $request->input("name");
		$description = $request->input("description");
		$quantity = $request->input("quantity");
		$category = $request->input("category");
		$url = $request->input("url");
		
		// Create Item if necessary
		if ($item == null) {
			$item = new Item();
		}
		
		// Update Classroom
		$item->name = $name;
		$item->description = $description;
		if ($quantity > 1) {
			$item->quantity = $quantity;
		}
		$item->category = $category;
		$item->url = $url;
		$item->save();
		
		return redirect()->route('item', [$item])->with('alert', "Success! Saved item: ".$name);
	}
}
