@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="{{ url('admin/'.$singular) }}" accept-charset="UTF-8">
				{!! csrf_field() !!}

				@foreach($config->cols as $k => $v)
					<div class="form-group row">
						<div class="col-lg-2">
							{{ $v->label }}
						</div>
						<div class="col-lg-10">
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
			                    <font color="red">{{ $errors->first($k) }}</font>
			            	@endif
						</div>
					</div>
					
				@endforeach

				<div class="form-group row">
					<input type="submit" class="btn btn-primary" value="SAVE" /> 
					<a href="{{ url('admin/'.$singular) }}" class="btn btn-primary">BACK</a>
				</div>
			</form>
		</div>
	</div>	
@stop