<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends CrudController
{
	protected $singular = 'category';
	protected $plural = 'categories';
	/*
	public function index(Request $request)
	{
		$mt = 'List categories';
		$categories = Category::paginate(20);
		return view('admin.category.index', compact('mt', 'categories'));
	}
	*/
}