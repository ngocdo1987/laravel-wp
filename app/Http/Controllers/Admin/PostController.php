<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends CrudController
{
	public function index()
	{
		$mt = 'List posts';
		$posts = Post::paginate(20);
		return view('admin.post.index', compact('mt', 'posts'));
	}

	public function create(Request $request)
	{
		$mt = 'Add post';
		$categories = Category::all();
		$tags = Tag::all();

		$loop_cols_arr = $this->loop_cols($request, 'posts');
		$cols = $loop_cols_arr['cols'];
		$errors = $loop_cols_arr['errors'];
		$form_url = 'admin/post';
		$back_url = 'admin/post';
		return view('admin.crud.loop_cols', compact('cols', 'errors', 'form_url', 'back_url', 'categories', 'tags', 'mt'));
	}

	public function store(Request $request)
	{
		$mt = 'Add post';
		$input = $request->all();

		$validation = validator()->make($input, Post::$rules);

		if($validation->passes())
		{
			Post::create($input);

			return redirect()->route('post.index')
	    					->with('message', 'Create post successfully!');
		}

		return redirect()->route('post.create')
						->withInput()
						->withErrors($validation);
	}

	public function show($id = null)
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

	public function destroy($id = null)
	{
		Post::find($id)->delete();
		return redirect()->route('admin.post.index')
						->with('message', 'Delete post successfully!');
	}
}