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
	                	<form method="POST" action="{{ url('admin/'.$singular.'/'.$crud->id) }}" accept-charset="UTF-8">
	                		{!! csrf_field() !!} 
	                		<input name="_method" type="hidden" value="DELETE">
	                		<a href="{{ url('/admin/'.$singular.'/'.$crud->id.'/edit') }}" class="btn btn-primary btn-xs">Edit</a> 

	                		<input class="btn btn-danger btn-xs delete_confirm" type="button" value="Delete">
	                	</form>
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