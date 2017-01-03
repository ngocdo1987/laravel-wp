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

}