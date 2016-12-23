<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['page_title', 'page_slug', 'page_image', 'page_content', 'page_status', 'page_mt', 'page_md', 'page_mk'];

	public static $rules = [
		'page_title' => 'required|min:3',
		'page_slug' => 'required|min:3'
	];

	public static $filters = [

	];
}