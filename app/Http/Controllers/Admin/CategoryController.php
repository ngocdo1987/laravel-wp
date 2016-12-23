<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends CrudController
{
	public function index()
	{
		$mt = 'List categories';
		$categories = Category::paginate(20);
		return view('admin.category.index', compact('mt', 'categories'));
	}

	public function create(Request $request)
	{
		$mt = 'Add category';
		$loop_cols_arr = $this->loop_cols($request, 'categories');
		$cols = $loop_cols_arr['cols'];
		$errors = $loop_cols_arr['errors'];
		$form_url = 'admin/category';
		$back_url = 'admin/category';
		return view('admin.crud.loop_cols', compact('cols', 'errors', 'form_url', 'back_url', 'mt'));
	}

	public function store(Request $request)
	{
		$mt = 'Add category';
		$input = $request->all();

		$validation = validator()->make($input, Category::$rules);

		if($validation->passes())
		{
			Category::create($input);

			return redirect()->route('category.index')
	    					->with('message', 'Create category successfully!');
		}

		return redirect()->route('category.create')
						->withInput()
						->withErrors($validation);
	}

	public function show($id = null)
	{
		$mt = 'Show category';
		$category = Category::find($id);

		return view('admin.category.show', compact('mt', 'category'));
	}

	public function edit(Request $request, $id = null)
	{
		$mt = 'Edit category';
		$category = Category::find($id);

		return view('admin.category.edit', compact('mt', 'category'));
	}

	public function update(Request $request, $id = null)
	{
		$mt = 'Edit category';
		$input = $request->all();

		$validation = validator()->make($input, Category::$rules);

		if($validation->passes())
		{
			Category::find($id)->update($input);

			return redirect()->route('admin.category.index')
	    					->with('message', 'Edit category successfully!');
		}

		return redirect()->route('admin.category.edit', $id)
						->withInput()
						->withErrors($validation);
	}

	public function destroy($id = null)
	{
		Category::find($id)->delete();
		return redirect()->route('admin.category.index')
						->with('message', 'Delete category successfully!');
	}
}