<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends CrudController
{
	protected $singular = 'category';
	protected $plural = 'categories';

}