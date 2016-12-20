@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-2">
			Select2 single: 
		</div>
		<div class="col-lg-10">
			<select class="form-control select2">
				<option value="AZ">Arizona</option>
			    <option value="CO">Colorado</option>
			    <option value="ID">Idaho</option>
			    <option value="MT">Montana</option>
			    <option value="NE">Nebraska</option>
			    <option value="NM">New Mexico</option>
			    <option value="ND">North Dakota</option>
			    <option value="UT">Utah</option>
			    <option value="WY">Wyoming</option>
			</select>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-lg-2">
			Select2 multiple: 
		</div>
		<div class="col-lg-10">
			<select class="form-control select2" multiple="multiple">
			<option value="AZ">Arizona</option>
		    <option value="CO">Colorado</option>
		    <option value="ID">Idaho</option>
		    <option value="MT">Montana</option>
		    <option value="NE">Nebraska</option>
		    <option value="NM">New Mexico</option>
		    <option value="ND">North Dakota</option>
		    <option value="UT">Utah</option>
		    <option value="WY">Wyoming</option>
		</select>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-lg-2">
			CKEditor:
		</div>
		<div class="col-lg-10">
			<textarea class="form-control" id="ckeditor"></textarea>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-lg-2">
			Image upload: 
		</div>
		<div class="col-lg-10">
			<input type="file" class="form-control image_upload" />
			<br/>
    		<img class="image_upload_preview" src="http://placehold.it/100x100" alt="your image" width="150" />
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-lg-2">
			Datetime picker: 
		</div>
		<div class="col-lg-10">
			<div class="input-group date" class="datetimepicker">
                <input type="text" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
		</div>
	</div>

	<br/>
@stop
