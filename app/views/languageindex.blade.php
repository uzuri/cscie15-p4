@extends('main')

@section('body')
	<p>{{ $placeholder }}</p>
@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="language/create">Create a New Language</a></li>
		</ul>
	</div>
@stop
