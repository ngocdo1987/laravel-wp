<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends CrudController
{
	public function index(Request $request)
	{
		$mt = 'List tags';
		$tags = Tag::paginate(20);
		return view('admin.tag.index', compact('mt', 'tags'));
	}

	public function create(Request $request)
	{
		$mt = 'Add tag';
		$loop_cols_arr = $this->loop_cols($request, 'tags');
		$cols = $loop_cols_arr['cols'];
		$errors = $loop_cols_arr['errors'];
		$form_url = 'admin/tag';
		$back_url = 'admin/tag';
		return view('admin.crud.loop_cols', compact('cols', 'errors', 'form_url', 'back_url', 'mt'));
	}

	public function store(Request $request)
	{
		$mt = 'Add tag';
		$input = $request->all();

		$validation = validator()->make($input, Tag::$rules);

		if($validation->passes())
		{
			Tag::create($input);

			return redirect()->route('tag.index')
	    					->with('message', 'Create tag successfully!');
		}

		return redirect()->route('tag.create')
						->withInput()
						->withErrors($validation);
	}

	public function show($id = null)
	{
		$mt = 'Show tag';
		$tag = Tag::find($id);

		return view('admin.tag.show', compact('mt', 'tag'));
	}

	public function edit(Request $request, $id = null)
	{
		$mt = 'Edit tag';
		$tag = Tag::find($id);

		return view('admin.tag.edit', compact('mt', 'tag'));
	}

	public function update(Request $request, $id = null)
	{
		$mt = 'Edit tag';
		$input = $request->all();

		$validation = validator()->make($input, Tag::$rules);

		if($validation->passes())
		{
			Tag::find($id)->update($input);

			return redirect()->route('admin.tag.index')
	    					->with('message', 'Edit tag successfully!');
		}

		return redirect()->route('admin.tag.edit', $id)
						->withInput()
						->withErrors($validation);
	}

	public function destroy($id = null)
	{
		Tag::find($id)->delete();
		return redirect()->route('admin.tag.index')
						->with('message', 'Delete tag successfully!');
	}
}