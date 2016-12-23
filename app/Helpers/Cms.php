<?php
namespace App\Helpers;
use DB;

class Cms 
{
	public static function loop_cols($table_name, $request, $errors)
	{
		$cols = DB::select("SHOW FULL COLUMNS FROM `".$table_name."`");

		foreach($cols as $col)
		{
			if($col->Comment != '')
			{
				$comment = explode('|', $col->Comment);

				?>
				<div class="form-group row">
					<div class="col-lg-2">
						<?=?>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="page_title" value="{{ Request::old('page_title') }}" />

						@if($errors->has('page_title'))
		                    <font color="red">{{ $errors->first('page_title') }}</font>
		            	@endif
					</div>
				</div>
				<?php
			}
		}
	}
}