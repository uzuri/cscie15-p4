@extends('main')

@section('body')
	
	{{ Form::open(array('url' => $uri)) }}
		<p>Ready to get started?  Give me 
		    {{ Form::input('number', 'paras', $data_paras, array('min' => 0, 'max' => 5)) }}
		    {{ Form::label('paras', 'paragraphs') }}
		    and/or 
		    {{ Form::input('number', 'users', $data_users, array('min' => 0, 'max' => 50)) }}
		    {{ Form::label('users', 'users') }}.
		</p>
		
		<p>
		    {{ Form::submit('Go!') }}
		</p>
	{{ Form::close() }}

@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="language">Return to Languages Menu</a></li>
		</ul>
	</div>
@stop
