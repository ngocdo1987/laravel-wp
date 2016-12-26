<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Page extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['page_title', 'page_slug', 'page_image', 'page_content', 'page_status', 'page_mt', 'page_md', 'page_mk'];

	public function rules(Request $request)
	{
		$rules = [
			'page_title' => 'required|min:3',
			'page_slug' => 'required|min:3|unique:pages,page_slug'
		];

		if(in_array($request->method(), ['PUT', 'PATCH']))
		{
			$rules['page_slug'] = $rules['page_slug'].','.$request->get('id');
		}

		return $rules;
	}

	public static $filters = [

	];
}