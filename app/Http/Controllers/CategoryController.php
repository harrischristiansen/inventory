<?php
/*
	Inventory Controller - github.com/harrischristiansen/inventory
	File created by Harris Christiansen (HarrisChristiansen.com)
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller {
	
	// --------------- Categories ---------------
	
	public function getList() {
		$categories = Category::all();
		return view('pages.category.list', compact('categories'));
	}
	
	public function getCategory(Category $category) {
		return view('pages.category.item', compact('category'));
	}
	
	public function postCategoryCreate(Request $request) {
		// Get Inputs
		$name = $request->input("name");
		
		// Create Category
		$category = Category::firstOrCreate(['name' => $name]);
		
		if (!$category->wasRecentlyCreated) {
			return redirect()->route('categories')->with('alert', "Error - Category already exists with name: ".$name);
		}
		
		return redirect()->route('categories')->with('alert', "Success! Created category: ".$name);
	}
	
	// --------------- Typeahead ---------------
	
	public function getTypeahead(Request $request) {
		$requestTerm = $request->input('term');
		
		$searchFor = '%'.$requestTerm.'%';
		$results = Category::where('name', 'LIKE', $searchFor)->get();
		
		for ($i = 0; $i < count($results); $i++) {
		    $results[$i]['value'] = $results[$i]['name'];
		}
		
		return $results;
	}
	
}
