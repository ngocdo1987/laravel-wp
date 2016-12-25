@extends('layouts.admin')

@section('content')
	@if(count($pages) > 0)
		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	        <thead>
	            <tr>
	                <th>Title</th>
	                <th>Image</th>
	                <th>Content</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach($pages as $page)
	            <tr class="odd">
	                <td>
	                	<a href="{{ url('admin/page/'.$page->id.'/edit') }}">{{ $page->page_title }}</a>
	                </td>
	                <td>{{ $page->page_image }}</td>
	                <td>{{ strip_tags($page->page_content) }}</td>
	                <td class="center">
	                	Edit / Delete
	                </td>
	            </tr>
	            @endforeach
	        </tbody>
	    </table>
    @else
    	<center><font color="red">No pages existed!</font></center>
    @endif

    <a href="{{ url('admin/page/create') }}" class="btn btn-primary">ADD NEW</a>
@stop