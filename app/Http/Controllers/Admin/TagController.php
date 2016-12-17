<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
	public function index()
	{
		$mt = 'List tags';
		return view('admin.tag.index', compact('mt'));
	}

	public function add()
	{
		$mt = 'Add tag';
		return view('admin.tag.add', compact('mt'));
	}

	public function edit($id = null)
	{
		$mt = 'Edit tag';
		return view('admin.tag.edit', compact('mt'));
	}

	public function delete($id = null)
	{
		
	}
}