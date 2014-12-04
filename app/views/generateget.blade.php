@extends('main')

@section('body')
	{{ $alert }}
	<p>What language would you like to generate a word for?</p>
	{{ Form::open(array('url' => $uri)) }}
		<p>{{ Form::select('lang', $languages) }} {{ Form::submit('Generate word') }} </p>
	{{ Form::close() }}

@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="/language">Return to Languages Menu</a></li>
		</ul>
	</div>
@stop
