@extends('main')

@section('body')
	{{ $alert }}
	{{ Form::open(array('url' => $uri)) }}
		<table>
			<tr>
				<td><strong>{{ Form::label('name', 'Letters') }}</strong></td>
				<td>{{ Form::input('text', 'letters') }}</td>
			</tr>
			<tr>
				<td><strong>{{ Form::label('description', 'Description') }}</strong></td>
				<td>{{ Form::textarea('description') }}</td>
			</tr>
			<tr>
				<td><strong>{{ Form::label('canstart', 'Can start a word') }}</strong></td>
				<td>{{ Form::checkbox('canstart', 1) }}</td>
			</tr>
			<tr>
				<td><strong>{{ Form::label('canend', 'Can end a word') }}</strong></td>
				<td>{{ Form::checkbox('canend', 1) }}</td>
			</tr>
			<tr>
				<td><strong>Follows</strong></td>
				<td>
					<div class="columns">
					
					@foreach ($phonemes as $phoneme)
						<p>{{ Form::checkbox($phoneme->letters, 1) }}
						{{ $phoneme->letters }}</p>
					@endforeach
					</div>
				</td>
			</tr>
		</table>
		<p> {{ Form::submit('Make this Phoneme') }} </p>
	{{ Form::close() }}

@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="/language/{{ $lang }}/phoneme">Return to Phoneme Menu</a></li>
		</ul>
	</div>
@stop
