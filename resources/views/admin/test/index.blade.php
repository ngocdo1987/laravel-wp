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
@stop
