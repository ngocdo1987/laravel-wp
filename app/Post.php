<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['post_title', 'post_slug', 'post_image', 'post_content', 'post_status', 'post_mt', 'post_md', 'post_mk'];

	public static $rules = [
		'post_title' => 'required|min:3',
		'post_slug' => 'required|min:3'
	];

	public static $filters = [

	];

	public function categories()
	{
		return $this->belongsToMany('App\Category', 'categories_posts', 'post_id', 'category_id');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'posts_tags', 'post_id', 'tag_id');
	}
}