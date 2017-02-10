@if(isset($singular))
	{{ Debugbar::info($singular) }}
@endif

@if(isset($config))
	{{ Debugbar::info($config) }}
@endif

@if(isset($cruds))
	{{ Debugbar::info($cruds) }}
@endif
	