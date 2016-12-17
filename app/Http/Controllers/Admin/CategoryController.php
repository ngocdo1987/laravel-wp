<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	public function index()
	{
		$mt = 'List categories';
		return view('admin.category.index', compact('mt'));
	}

	public function add()
	{
		$mt = 'Add category';
		return view('admin.category.add', compact('mt'));
	}

	public function edit($id = null)
	{
		$mt = 'Edit category';
		return view('admin.category.edit', compact('mt'));
	}

	public function delete($id = null)
	{
		
	}
}