<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CrudController extends Controller
{
	protected $singular = '';
	protected $plural = '';
	protected $config = [];

	public function __construct()
	{
		if(file_exists('../config/cms/'.$this->singular.'.json'))
		{
			$config = file_get_contents('../config/cms/'.$this->singular.'.json');
			$config = json_decode($config);
		}
		else
		{
			$config = null;
		}
		$this->config = $config;
	}

	public function index(Request $request)
	{
		$mt = 'List '.$this->plural;
		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;
		$cruds = $model->paginate(20);
		$config = $this->config;
		$singular = $this->singular;
		$plural = $this->plural;
		return view('admin.crud.index', compact('mt', 'cruds', 'config', 'singular', 'plural'));
	}

	public function create(Request $request)
	{
		$mt = 'Add '.$this->singular;
		$cols = DB::select("SHOW FULL COLUMNS FROM `".$this->plural."`");
		$config = $this->config;
		$singular = $this->singular;
		return view('admin.crud.create', compact('mt', 'cols', 'config', 'singular'));
	}

	public function store(Request $request)
	{
		$input = $request->all();

		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;

		$validation = validator()->make($input, $model::$rules);

		if($validation->passes())
		{
			$model->create($input);

			return redirect()->route($this->singular.'.index')
	    					->with('message', 'Create '.$this->singular.' successfully!');
		}

		return redirect()->route($this->singular.'.create')
						->withInput()
						->withErrors($validation);
	}

	public function show(Request $request, $id = null)
	{
		$mt = 'Show '.$this->singular;

		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;

		$crud = $model->find($id);

		return view('admin.crud.show', compact('mt', 'crud'));
	}

	public function edit(Request $request, $id = null)
	{
		$mt = 'Edit '.$this->singular;

		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;
		$crud = $model->find($id);

		return view('admin.crud.edit', compact('mt', 'crud'));
	}

	public function update(Request $request, $id = null)
	{
		$mt = 'Edit '.$this->singular;
		$input = $request->all();

		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;

		$validation = validator()->make($input, $model::$rules);

		if($validation->passes())
		{
			$model->find($id)->update($input);

			return redirect()->route($this->singular.'.index')
	    					->with('message', 'Edit '.$this->singular.' successfully!');
		}

		return redirect()->route($this->singular.'.edit', $id)
						->withInput()
						->withErrors($validation);
	}

	public function destroy(Request $request, $id = null)
	{
		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;
		$model->find($id)->delete();

		return redirect()->route($this->singular.'.index')
						->with('message', 'Delete '.$this->singular.' successfully!');
	}
}