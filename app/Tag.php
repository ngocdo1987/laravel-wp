<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['tag_name', 'tag_slug', 'tag_description', 'tag_mt', 'tag_md', 'tag_mk'];

	public static $rules = [
		'tag_name' => 'required|min:3',
		'tag_slug' => 'required|min:3'
	];

	public static $filters = [

	];

	public function posts()
	{
		return $this->belongsToMany('App\Post', 'posts_tags', 'tag_id', 'post_id');
	}
}