@extends('layouts.admin')

@section('content')
	@foreach($cols as $col)
		@if($col->Comment != '')
			<?php $comment = explode("|", $col->Comment); ?>
			<div class="row">
				<div class="col-lg-2">
					{{ $comment[0] }}
				</div>
				<div class="col-lg-10">
					<?php 
						switch($comment[1]) {
							case 'text':
								?>
								<input type="text" class="form-control" name="{{ $col->Field }}" />
								<?php
								break;
							case 'textarea':
								?>
								<textarea class="form-control" name="{{ $col->Field }}" rows="8"></textarea>
								<?php
								break;
							case 'ckeditor':
								?>
								<textarea class="form-control" name="{{ $col->Field }}" id="ckeditor"></textarea>
								<?php
								break;		
							case 'select':
								?>
								<select class="form-control" name="{{ $col->Field }}">
									<option>option 1</option>
									<option>option 2</option>
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
								<input type="file" class="form-control" name="{{ $col->Field }}" />
								<?php
								break;
							case 'gmap':
								?>

								<?php
								break;					
						}
					?>
				</div>
			</div>
			<br/>
			<?php // echo '<pre>'; print_r($col); echo '</pre>'; ?>
		@endif
	@endforeach
	
@stop
