<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
	public function index()
	{
		$mt = 'List HTML inputs';
		return view('admin.test.index', compact('mt'));
	}

	public function list_cols()
	{
		$mt = 'List cols';
		$cols = DB::select("SHOW FULL COLUMNS FROM `posts`");
		//$comments = DB::select("SELECT `table_comments` FROM `information_schema`.`tables` WHERE `table_schema` = 'fw_laravel' AND `table_name` = 'posts'");
		return view('admin.test.list_cols', compact('mt', 'cols'/*, 'comments'*/));
		//print_r($cols);
	}
}