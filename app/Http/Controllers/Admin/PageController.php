<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends CrudController
{
	protected $singular = 'page';
	protected $plural = 'pages';

	/*
	public function index(Request $request)
	{
		echo file_get_contents('../config/cms/page.json'); die('');
		$mt = 'List pages';
		$pages = Page::paginate(20);
		return view('admin.page.index', compact('mt', 'pages'));
	}
	*/
}