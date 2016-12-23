@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="{{ url('admin/page') }}" accept-charset="UTF-8">
				{!! csrf_field() !!}
				<div class="form-group row">
					<div class="col-lg-2">
						Title
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="page_title" value="{{ Request::old('page_title') }}" />

						@if($errors->has('page_title'))
		                    <font color="red">{{ $errors->first('page_title') }}</font>
		            	@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						Slug
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="page_slug" value="{{ Request::old('page_slug') }}" />
						
						@if($errors->has('page_slug'))
		                    <font color="red">{{ $errors->first('page_slug') }}</font>
		            	@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						Image
					</div>
					<div class="col-lg-10">
						<input type="file" class="form-control image_upload" name="page_image" />
						<br/>
						<img class="image_upload_preview" src="http://placehold.it/100x100" alt="your image" width="150" />
						
						@if($errors->has('page_image'))
		                    <font color="red">{{ $errors->first('page_image') }}</font>
		            	@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						Content
					</div>
					<div class="col-lg-10">
						<textarea class="form-control" name="page_content" id="ckeditor">{{ Request::old('page_content') }}</textarea>
						
						@if($errors->has('page_content'))
		                    <font color="red">{{ $errors->first('page_content') }}</font>
		            	@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						Status
					</div>
					<div class="col-lg-10">
						<select class="form-control select2" name="page_status">
							<option value="1">Publish</option>
							<option value="0">Draft</option>
						</select>
						
						@if($errors->has('page_status'))
		                    <font color="red">{{ $errors->first('page_status') }}</font>
		            	@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						Meta title
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="meta_title" value="{{ Request::old('meta_title') }}" />
						
						@if($errors->has('meta_title'))
		                    <font color="red">{{ $errors->first('meta_title') }}</font>
		            	@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						Meta description
					</div>
					<div class="col-lg-10">
						<textarea class="form-control" name="meta_description">{{ Request::old('meta_description') }}</textarea>
						
						@if($errors->has('meta_description'))
		                    <font color="red">{{ $errors->first('meta_description') }}</font>
		            	@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						Meta keyword
					</div>
					<div class="col-lg-10">
						<textarea class="form-control" name="meta_keyword">{{ Request::old('meta_keyword') }}</textarea>
						
						@if($errors->has('meta_keyword'))
		                    <font color="red">{{ $errors->first('meta_keyword') }}</font>
		            	@endif
					</div>
				</div>
				<div class="form-group row">
					<input type="submit" class="btn btn-primary" value="SAVE" /> 
					<a href="{{ url('admin/page') }}" class="btn btn-primary">BACK</a>
				</div>
			</form>
		</div>
	</div>	
@stop