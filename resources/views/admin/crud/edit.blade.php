@extends('layouts.admin')

@section('content')
	<div class="row">
		{{ Form::model($crud, ['method' => 'PATCH', 'route' => [$singular.'.update', $crud->id], 'files' => 'true']) }}
		<div class="col-lg-9">
			@foreach($config->cols as $k => $v)
				@if($config->display->edit == '*' || in_array($k, $config->display->edit))
					<div class="form-group row">
						
						<div class="col-lg-12">
							{{ $v->label }}
							<br/>
							<?php
								switch($v->type)
								{
									case 'text':
										?>
										<input type="text" class="form-control" name="{{ $k }}" value="{{ $crud->$k }}" />
										<?php
										break;
									case 'textarea':
										?>
										<textarea class="form-control" name="{{ $k }}" rows="6">{{ $crud->$k }}</textarea>
										<?php
										break;	
									case 'ckeditor':
										?>
										<textarea class="form-control" name="{{ $k }}" id="ckeditor">{{ $crud->$k }}</textarea>
										<?php
										break;
									case 'tinymce':
									
										break;
									case 'summernote':
										?>
										<textarea class="form-control summernote" name="{{ $k }}">{{ $crud->$k }}</textarea>
										<?php
										break;	
									case 'select':
										?>
										<select class="form-control select2" name="{{ $k }}">
											@foreach($v->value as $k1 => $v1)
												@php
													$selected = ($crud->$k == $k1) ? ' selected="selected"' : ''
												@endphp
											<option value="{{ $k1 }}"{{ $selected }}>{{ $v1 }}</option>
											@endforeach
										</select>
										<?php
										break;
									case 'select_recursive':
										?>
										<select class="form-control select2" name="{{ $k }}">
											<option value="0">-- Choose --</option>
											@foreach($recursives as $recursive)
												@php
													$selected = ($crud->$k == $recursive['id']) ? ' selected="selected"' : ''
												@endphp
											<option value="{{ $recursive['id'] }}"{{ $selected }}>{{ $recursive['name'] }}</option>
											@endforeach
										</select>
										<?php
										break;	
									case 'select_multiple':
										?>
										<select name="form-control select2" name="{{ $k }}" multiple="multiple">
											<option>option 1</option>
											<option>option 2</option>
											<option>option 3</option>
										</select>
										<?php
										break;
									case 'radio':
										?>
										<input type="radio" class="form-control" name="{{ $k }}" />
										<?php
										break;
									case 'checkbox':
										?>
										<input type="checkbox" class="form-control" name="{{ $k }}" />
										<?php
										break;
									case 'file':
										?>
										<input type="file" class="form-control" name="{{ $k }}" />
										<?php
										break;
									case 'image':
										?>
										<input type="file" class="form-control image_upload" name="{{ $k }}" />
										<br/>
										<img class="image_upload_preview" src="http://placehold.it/100x100" alt="your image" width="150" />
										<?php
										break;
									case 'date':
									
										break;
									case 'datetime':
									
										break;
									case 'true_false':
										?>
										<label class="switch">
										 	<input type="checkbox" name="{{ $k }}" checked>
										 	<div class="slider round"></div>
										</label>
										<?php
										break;											
								}
							?>

							@if($errors->has($k))
			                    <font color="red"><i>{{ $errors->first($k) }}</i></font>
			            	@endif
						</div>
					</div>
				@endif
			@endforeach

			<div class="form-group row">
				<div class="col-lg-12">
					<input type="submit" class="btn btn-primary" value="SAVE" /> 
					<a href="{{ url('admin/'.$singular) }}" class="btn btn-primary">BACK</a>
				</div>	
			</div>
			
		</div>
		<div class="col-lg-3">
			@if(isset($config->relation->nn) && count($config->relation->nn) > 0)
				@foreach($config->relation->nn as $singular_model => $v)
					<h3>{{ ucfirst($singular_model) }}</h3>
					@foreach($$singular_model as $sm)
						@php
							$target_label = $v->target_label;
							$singular_model_related_ids = $singular_model.'_related_ids';
							$checked = in_array($sm->id, $$singular_model_related_ids) ? ' checked="checked"' : '';
						@endphp
						<input type="checkbox" name="{{ $singular_model }}[]" value="{{ $sm->id }}"{{ $checked }} /> {{ $sm->$target_label }} <br/>
					@endforeach
					<hr/>
				@endforeach
			@endif
		</div>
		{{ Form::close() }}
	</div>	
@stop