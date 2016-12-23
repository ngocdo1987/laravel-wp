<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CrudController extends Controller
{
	public function loop_cols(Request $request, $table_name)
	{
		$cols = DB::select("SHOW FULL COLUMNS FROM `".$table_name."`");
		$errors = $request->session()->get('errors', new \Illuminate\Support\MessageBag);

		return [
			'cols' => $cols,
			'errors' => $errors
		];
		
	}
}