<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['category_name', 'category_slug', 'category_description', 'parent_id', 'category_mt', 'category_md', 'category_mk'];

	public static $rules = [
		'category_name' => 'required|min:3',
		'category_slug' => 'required|min:3'
	];

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