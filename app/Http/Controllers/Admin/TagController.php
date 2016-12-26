<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends CrudController
{
	protected $singular = 'tag';
	protected $plural = 'tags';

}