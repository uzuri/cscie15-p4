@extends('main')

@section('body')
	{{ $alert }}

@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="/language/{{ $lang }}/phoneme">Return to Phoneme Menu</a></li>
		</ul>
	</div>
@stop
