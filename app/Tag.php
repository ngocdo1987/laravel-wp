<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tag extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['tag_name', 'tag_slug', 'tag_description', 'tag_mt', 'tag_md', 'tag_mk'];

	public function rules(Request $request)
	{
		$rules = [
			'tag_name' => 'required|min:3',
			'tag_slug' => 'required|min:3|unique:tags,tag_slug'
		];

		if(in_array($request->method(), ['PUT', 'PATCH']))
		{
			$rules['tag_slug'] = $rules['tag_slug'].','.$request->get('id');
		}

		return $rules;
	}

	public static $filters = [

	];

	public function posts()
	{
		return $this->belongsToMany('App\Post', 'posts_tags', 'tag_id', 'post_id');
	}
}