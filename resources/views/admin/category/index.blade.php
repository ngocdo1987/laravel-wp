@extends('layouts.admin')

@section('content')
	@if(count($categories) > 0)
		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Description</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach($categories as $category)
	            <tr>
	                <td>
	                	<a href="{{ url('admin/category/'.$category->id.'/edit') }}">{{ $category->category_name }}</a>
	                </td>
	                <td>{{ strip_tags($category->category_description) }}</td>
	                <td class="center">
	                	Edit / Delete
	                </td>
	            </tr>
	            @endforeach
	        </tbody>
	    </table>
    @else
    	<center><font color="red">No categories existed!</font></center>
    @endif

    <a href="{{ url('admin/category/create') }}" class="btn btn-primary">ADD NEW</a>
@stop