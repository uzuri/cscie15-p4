@extends('main')

@section('body')
	{{ $alert }}
	{{ Form::open(array('url' => $uri)) }}
		<p> Are you sure you want to delete <strong>"{{ $languages->name }}"</strong>?</p>
		<p> {{ Form::submit('Delete this Language') }} </p>
	{{ Form::close() }}

@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="/language">Return to Languages Menu</a></li>
		</ul>
	</div>
@stop
