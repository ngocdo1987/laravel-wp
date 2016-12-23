@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="{{ url($form_url) }}" accept-charset="UTF-8">
				{!! csrf_field() !!}

				@foreach($cols as $col)
					@if($col->Comment != '')
						<?php $comment = explode("|", $col->Comment); ?>

						<div class="form-group row">
							<div class="col-lg-2">
								{{ $comment[0] }}
							</div>
							<div class="col-lg-10">
								<?php
									switch($comment[1])
									{
										case 'text':
											?>
											<input type="text" class="form-control" name="{{ $col->Field }}" value="{{ Request::old($col->Field) }}" />
											<?php
											break;
										case 'textarea':
											?>
											<textarea class="form-control" name="{{ $col->Field }}">{{ Request::old($col->Field) }}</textarea>
											<?php
											break;	
										case 'ckeditor':
											?>
											<textarea class="form-control" name="{{ $col->Field }}" id="ckeditor">{{ Request::old($col->Field) }}</textarea>
											<?php
											break;
										case 'tinymce':
										
											break;
										case 'select':
											?>
											<select class="form-control select2" name="{{ $col->Field }}">
												<option value="">option 1</option>
												<option value="">option 2</option>
											</select>
											<?php
											break;
										case 'select_multiple':
											?>
											<select name="form-control select2" name="{{ $col->Field }}" multiple="multiple">
												<option>option 1</option>
												<option>option 2</option>
												<option>option 3</option>
											</select>
											<?php
											break;
										case 'radio':
											?>
											<input type="radio" class="form-control" name="{{ $col->Field }}" />
											<?php
											break;
										case 'checkbox':
											?>
											<input type="checkbox" class="form-control" name="{{ $col->Field }}" />
											<?php
											break;
										case 'file':
											?>
											<input type="file" class="form-control" name="{{ $col->Field }}" />
											<?php
											break;
										case 'image':
											?>
											<input type="file" class="form-control image_upload" name="{{ $col->Field }}" />
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
											 	<input type="checkbox" name="{{ $col->Field }}" checked>
											 	<div class="slider round"></div>
											</label>
											<?php
											break;											
									}
								?>

								@if($errors->has($col->Field))
				                    <font color="red">{{ $errors->first($col->Field) }}</font>
				            	@endif
							</div>
						</div>
					@endif
				@endforeach

				<div class="form-group row">
					<input type="submit" class="btn btn-primary" value="SAVE" /> 
					<a href="{{ url($back_url) }}" class="btn btn-primary">BACK</a>
				</div>
			</form>
		</div>
	</div>	
@stop