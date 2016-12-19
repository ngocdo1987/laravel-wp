<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
	public function index()
	{
		$mt = 'List HTML inputs';
		return view('admin.test.index', compact('mt'));
	}
}