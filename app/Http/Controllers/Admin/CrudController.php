<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use DB;

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
		//die($model::rules_lol($request));
		$cruds = $model->orderBy('id', 'desc')->paginate(20);
		$config = $this->config;
		$singular = $this->singular;
		$plural = $this->plural;
		return view('admin.crud.index', compact('mt', 'cruds', 'config', 'singular', 'plural'));
	}

	public function create(Request $request)
	{
		$mt = 'Add '.$this->singular;
		$config = $this->config;
		$singular = $this->singular;

		$compact = ['mt', 'config', 'singular'];

		// Check recursive
		if(isset($config->recursive) && $config->recursive == 1)
		{
			$model = '\App\\'.ucfirst($this->singular);
			$model = new $model;

			$recursives = $model::recursive();
			$compact[] = 'recursives';
		}

		// Check 1-n

		// Check n-n
		if(isset($config->relation->nn) && count($config->relation->nn) > 0)
		{
			foreach($config->relation->nn as $singular_model => $v)
			{
				$model = '\App\\'.ucfirst($singular_model);
				$model = new $model;

				$$singular_model = $model->all();
				$compact[] = $singular_model;
				//echo '<pre>'; print_r($$k); echo '</pre>'; die('');
			}	
		}

		return view('admin.crud.create', compact($compact));
	}

	public function store(Request $request)
	{
		$input = $request->all();

		//echo '<pre>'; print_r($input); echo '</pre>'; die('');

		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;

		$validation = validator()->make($input, $model->rules($request));

		if($validation->passes())
		{
			$config = $this->config;

			$crud = $model->create($input);
			
			// Save n-n
			if(isset($config->relation->nn) && count($config->relation->nn) > 0)
			{
				foreach($config->relation->nn as $singular_model => $v)
				{
					$func_name = $v->func;
					$crud->$func_name()->sync($input[$singular_model]);
				}
			}
			

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
		$config = $this->config;
		$singular = $this->singular;

		return view('admin.crud.show', compact('mt', 'crud', 'config', 'singular'));
	}

	public function edit(Request $request, $id = null)
	{
		$mt = 'Edit '.$this->singular;

		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;
		$crud = $model->find($id);
		$config = $this->config;
		$singular = $this->singular;

		$compact = ['mt', 'crud', 'config', 'singular'];

		// Check recursive
		if(isset($config->recursive) && $config->recursive == 1)
		{
			$model = '\App\\'.ucfirst($this->singular);
			$model = new $model;

			$recursives = $model::recursive();
			$compact[] = 'recursives';
		}

		// Check 1-n

		// Check n-n
		if(isset($config->relation->nn) && count($config->relation->nn) > 0)
		{
			foreach($config->relation->nn as $singular_model => $v)
			{
				$model = '\App\\'.ucfirst($singular_model);
				$model = new $model;

				// Get all values of model table
				$$singular_model = $model->all();
				$compact[] = $singular_model;

				// Get model related ids
				$func_name = $v->func;
				$singular_model_related_ids = $singular_model.'_related_ids';
				$$singular_model_related_ids = [];
				$obj_related_ids = $crud->$func_name()->getRelatedIds();
				foreach($obj_related_ids as $ori)
				{
					$$singular_model_related_ids[] = $ori;
				}
				$compact[] = $singular_model_related_ids;

				//echo '<pre>'; print_r($$singular_model_related_ids); echo '</pre>'; die('');
			}	
		}

		return view('admin.crud.edit', compact($compact));
	}

	public function update(Request $request, $id = null)
	{
		$mt = 'Edit '.$this->singular;
		$input = $request->all();

		$model = '\App\\'.ucfirst($this->singular);
		$model = new $model;
		
		$validation = validator()->make($input, $model->rules($request));

		if($validation->passes())
		{
			$config = $this->config;

			$crud = $model->find($id);
			$crud->update($input);

			// Save n-n
			if(isset($config->relation->nn) && count($config->relation->nn) > 0)
			{
				foreach($config->relation->nn as $singular_model => $v)
				{
					$func_name = $v->func;
					$crud->$func_name()->sync($input[$singular_model]);
				}
			}

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