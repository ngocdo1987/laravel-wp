<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['category_name', 'category_slug', 'category_description', 'parent_id', 'category_mt', 'category_md', 'category_mk'];

	public function rules(Request $request)
	{
		$rules = [
			'category_name' => 'required|min:3',
			'category_slug' => 'required|min:3|unique:categories,category_slug'
		];

		if(in_array($request->method(), ['PUT', 'PATCH']))
		{
			$rules['category_slug'] = $rules['category_slug'].','.$request->segment(3);
		}

		return $rules;
	}

	public static $filters = [

	];

	public function posts()
	{
		return $this->belongsToMany('App\Post', 'categories_posts', 'category_id', 'post_id');
	}

	public function child_categories()
	{
		return $this->hasMany('App\Category', 'id', 'parent_id');
	}

	public function parent_category()
	{
		return $this->belongsTo('App\Category', 'parent_id', 'id');
	}
}