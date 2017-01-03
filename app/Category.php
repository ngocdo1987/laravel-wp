<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
	protected $guarded = ['id'];
	protected $fillable = ['category_name', 'category_slug', 'category_description', 'parent_id', 'category_mt', 'category_md', 'category_mk'];

	public static $filters = [

	];

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

	public static function recursive($parent_id = 0, $prefix = '', $trees = null)
	{
		if(!$trees) 
		{
			$trees = [];
		}	

		$childs = Category::where('parent_id', $parent_id)->get();
		
		if(count($childs) > 0)
		{
			foreach($childs as $child)
			{
				//$tree .= '<option value="'.$child->id.'">'.$child->category_name.'</option>';
				$trees[] = [
					'id' => $child->id,
					'name' => $prefix.$child->category_name,
					'parent_id' => $child->parent_id
				];

				$trees = Category::recursive($child->id, $prefix.'---', $trees);
			}
		}

		return $trees;
	}

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