<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['post_title', 'post_slug', 'post_image', 'post_content', 'post_status', 'post_mt', 'post_md', 'post_mk'];

	public static $filters = [

	];

	public function rules(Request $request)
	{
		$rules = [
			'post_title' => 'required|min:3',
			'post_slug' => 'required|min:3|unique:posts,post_slug',
			'post_image' => 'required|mimes:jpg,jpeg,gif,png'
		];

		if(in_array($request->method(), ['PUT', 'PATCH']))
		{
			$rules['post_slug'] = $rules['post_slug'].','.$request->segment(3);
		}

		return $rules;
	}

	public function categories()
	{
		return $this->belongsToMany('App\Category', 'categories_posts', 'post_id', 'category_id');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'posts_tags', 'post_id', 'tag_id');
	}
}