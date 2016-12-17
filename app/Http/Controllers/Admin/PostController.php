<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
	public function index()
	{
		$mt = 'List posts';
		return view('admin.post.index', compact('mt'));
	}

	public function add()
	{
		$mt = 'Add post';
		return view('admin.post.add', compact('mt'));
	}

	public function edit($id = null)
	{
		$mt = 'Edit post';
		return view('admin.post.edit', compact('mt'));
	}

	public function delete($id = null)
	{
		
	}
}