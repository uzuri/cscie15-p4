@extends('main')

@section('body')
	{{ $alert }}
	{{ Form::open(array('url' => $uri)) }}
		<p> Are you sure you want to delete <strong>"{{ $phonemes	->letters }}"</strong> from <strong>"{{ $languages->name }}"</strong>?</p>
		<p> {{ Form::submit('Delete this Phoneme') }} </p>
	{{ Form::close() }}

@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="/language/{{ $lang }}/phoneme">Return to Phoneme Menu</a></li>
		</ul>
	</div>
@stop
