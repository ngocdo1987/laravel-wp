<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends CrudController
{
	public function index(Request $request)
	{
		$mt = 'List pages';
		$pages = Page::paginate(20);
		return view('admin.page.index', compact('mt', 'pages'));
	}

	public function create(Request $request)
	{
		$mt = 'Add page';
		$loop_cols_arr = $this->loop_cols($request, 'pages');
		$cols = $loop_cols_arr['cols'];
		$errors = $loop_cols_arr['errors'];
		$form_url = 'admin/page';
		$back_url = 'admin/page';
		//return view('admin.page.create', compact('mt'));
		return view('admin.crud.loop_cols', compact('cols', 'errors', 'form_url', 'back_url', 'mt'));
	}

	public function store(Request $request)
	{
		$mt = 'Add page';
		$input = $request->all();

		$validation = validator()->make($input, Page::$rules);

		if($validation->passes())
		{
			Page::create($input);

			return redirect()->route('page.index')
	    					->with('message', 'Create page successfully!');
		}

		return redirect()->route('page.create')
						->withInput()
						->withErrors($validation);
	}

	public function show(Request $request, $id = null)
	{
		$mt = 'Show page';
		$page = Page::find($id);

		return view('admin.page.show', compact('mt', 'page'));
	}

	public function edit(Request $request, $id = null)
	{
		$mt = 'Edit page';
		$page = Page::find($id);

		return view('admin.page.edit', compact('mt', 'page'));
	}

	public function update(Request $request, $id = null)
	{
		$mt = 'Edit page';
		$input = $request->all();

		$validation = validator()->make($input, Page::$rules);

		if($validation->passes())
		{
			Page::find($id)->update($input);

			return redirect()->route('page.index')
	    					->with('message', 'Edit page successfully!');
		}

		return redirect()->route('page.edit', $id)
						->withInput()
						->withErrors($validation);
	}

	public function destroy(Request $request, $id = null)
	{
		Page::find($id)->delete();
		return redirect()->route('page.index')
						->with('message', 'Delete page successfully!');
	}
}