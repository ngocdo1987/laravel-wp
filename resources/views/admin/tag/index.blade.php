@extends('layouts.admin')

@section('content')
	@if(count($tags) > 0)
		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Description</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach($tags as $tag)
	            <tr>
	                <td>
	                	<a href="{{ url('admin/tag/'.$tag->id.'/edit') }}">{{ $tag->tag_name }}</a>
	                </td>
	                <td>{{ $tag->tag_description }}</td>
	                <td class="center">
	                	Edit / Delete
	                </td>
	            </tr>
	            @endforeach
	        </tbody>
	    </table>
    @else
    	<center><font color="red">No tags existed!</font></center>
    @endif

    <a href="{{ url('admin/tag/create') }}" class="btn btn-primary">ADD NEW</a>
@stop