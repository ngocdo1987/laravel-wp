<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
	public function index()
	{
		$mt = 'List pages';
		return view('admin.page.index', compact('mt'));
	}

	public function add()
	{
		$mt = 'Add page';
		return view('admin.page.add', compact('mt'));
	}

	public function edit($id = null)
	{
		$mt = 'Edit page';
		return view('admin.page.edit', compact('mt'));
	}

	public function delete($id = null)
	{
		
	}
}