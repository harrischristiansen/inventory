<?php
/*
	Inventory Controller
	File created by Harris Christiansen (HarrisChristiansen.com)
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller {
	
	public function index() {
		return view('pages.home');
	}
	
	public function getList() {
		return view('pages.list');
	}
	
	public function getObject() {
		return view('pages.object');
	}
}
