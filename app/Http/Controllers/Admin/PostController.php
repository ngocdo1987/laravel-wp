<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;

class PostController extends CrudController
{
	protected $singular = 'post';
	protected $plural = 'posts';

	public function show(Request $request, $id = null)
	{
		$mt = 'Show post';
		$post = Post::find($id);

		return view('admin.post.show', compact('mt', 'post'));
	}

	public function edit(Request $request, $id = null)
	{
		$mt = 'Edit post';
		$post = Post::find($id);
		$categories = Category::all();
		$tags = Tag::all();
		$current_categories = $post->categories();
		$current_tags = $post->tags();

		return view('admin.post.edit', compact('mt', 'post', 'categories', 'tags', 'current_categories', 'current_tags'));
	}

	public function update(Request $request, $id = null)
	{
		$mt = 'Edit post';
		$input = $request->all();

		$validation = validator()->make($input, Post::$rules);

		if($validation->passes())
		{
			Post::find($id)->update($input);

			return redirect()->route('admin.post.index')
	    					->with('message', 'Edit post successfully!');
		}

		return redirect()->route('admin.post.edit', $id)
						->withInput()
						->withErrors($validation);
	}

	public function destroy(Request $request, $id = null)
	{
		Post::find($id)->delete();
		return redirect()->route('admin.post.index')
						->with('message', 'Delete post successfully!');
	}
}