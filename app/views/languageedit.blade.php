@extends('main')

@section('body')
	{{ $alert }}
	{{ Form::open(array('url' => $uri)) }}
		<table>
			<tr>
				<td><strong>{{ Form::label('name', 'Name') }}</strong></td>
				<td>{{ Form::input('text', 'name', $languages->name) }}</td>
			</tr>
			<tr>
				<td><strong>{{ Form::label('description', 'Description') }}</strong></td>
				<td>{{ Form::textarea('description', $languages->description) }}</td>
			</tr>
		</table>
		<p> {{ Form::submit('Edit this Language') }} </p>
	{{ Form::close() }}

@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="/language">Return to Languages Menu</a></li>
		</ul>
	</div>
@stop
