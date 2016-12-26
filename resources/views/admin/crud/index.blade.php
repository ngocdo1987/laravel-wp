@extends('layouts.admin')

@section('content')
	@if(count($cruds) > 0 && !empty($config))
		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	        <thead>
	            <tr>
	            	@foreach($config->display->index as $cdi)
	                <th>{{ $config->cols->$cdi->label }}</th>
	                @endforeach
	                <th></th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach($cruds as $crud)
	            <tr class="odd">
	            	@foreach($config->display->index as $cdi)
	                <td>
	                	{{ strip_tags($crud->$cdi) }}
	                </td>
	                @endforeach
	                
	                <td class="center">
	                	<a href="{{ url('/admin/'.$singular.'/'.$crud->id.'/edit') }}">Edit</a> / 
	                	<a href="javascript:void(0)">Delete</a>
	                </td>
	            </tr>
	            @endforeach
	        </tbody>
	    </table>
    @else
    	<center>
    		<font color="red">
    			No {{ $plural }} existed or config file not found!
    		</font>
    	</center>
    @endif

    <a href="{{ url('admin/'.$singular.'/create') }}" class="btn btn-primary">ADD NEW</a>
@stop