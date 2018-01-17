<?php
/*
	Inventory Controller - github.com/harrischristiansen/inventory
	File created by Harris Christiansen (HarrisChristiansen.com)
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditItemRequest;
use App\Http\Requests\UploadPhotoRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Photo;
use Carbon\Carbon;
use Image;									// http://image.intervention.io

class InventoryController extends Controller {
	
	public function index() {
		return view('pages.home');
	}
	
	// --------------- Items ---------------
	
	public function getList() {
		$items = Item::all();
		return view('pages.item.list', compact('items'));
	}
	
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
	
	public function postItem(EditItemRequest $request, Item $item=null) {
		// Get Inputs
		$name = $request->input("name");
		$description = $request->input("description");
		$quantity = $request->input("quantity");
		$categoryName = $request->input("category");
		$url = $request->input("url");
		
		// Create Item if necessary
		if ($item == null) {
			$item = new Item();
		}
		
		// Update Item
		$item->name = $name;
		$item->description = $description;
		if ($quantity > 1) {
			$item->quantity = $quantity;
		}
		if (strlen($categoryName) > 2) {
			$category = Category::firstOrCreate(['name' => $categoryName]);
			$item->category_id = $category->id;
		} else {
			$item->category_id = null;
		}
		$item->url = $url;
		$item->save();
		
		return redirect()->route('item', [$item])->with('alert', "Success! Saved item: ".$name);
	}
	
	// --------------- Photos ---------------
	
	public function postUploadPhoto(UploadPhotoRequest $request, Item $item) {
		$title = $request->input("title");
		$filename = $item->id."_".Carbon::now()->toDateTimeString();
		
		// Create Photo DB Record
		$photo = new Photo();
		$photo->title = $title;
		$photo->item_id = $item->id;
		$photo->ipaddr = $request->ip();
		$photo->save();
		
		// Upload File
		if ($request->hasFile('file')) {
			$file = $request->file("file");
			
			if ($file->isValid()) {
				$extension = strtolower($file->getClientOriginalExtension());
				
				if ($extension=="jpg" || $extension=="jpeg" || $extension=="png") {
					$uploadPath = 'photos/';
					$photo->filename = $filename.".".$extension;
					$photo->iconname = $filename."_icon.".$extension;
					$photo->save();
					
					Image::make($file)->resize(null, 200, function ($constraint) {
						$constraint->aspectRatio();
					})->save(public_path($uploadPath.$photo->iconname));
					$file->move($uploadPath, $photo->filename);
				} else {
					return redirect()->route('uploadPhoto', [$item])->with('alert', "Error: Invalid File Type!");
				}
			}
		}
		
		return redirect()->route('item', [$item])->with('alert', "Success! Added photo: ".$title." to item: ".$item->name);
	}
	
	// --------------- Downloads ---------------
	
	public function getDownloadCSV() {
		$items = Item::all();
		
		return redirect()->route('home')->with('alert', "Error: Feature not complete");
	}
	
	public function getDownloadXLSX() {
		return redirect()->route('home')->with('alert', "Error: Feature not complete");
	}
}
