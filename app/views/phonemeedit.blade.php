@extends('main')

@section('body')
	{{ $alert }}
	{{ Form::open(array('url' => $uri)) }}
		<table>
			<tr>
				<td><strong>{{ Form::label('name', 'Letters') }}</strong></td>
				<td>{{ Form::input('text', 'letters', $phonemes->letters) }}</td>
			</tr>
			<tr>
				<td><strong>{{ Form::label('description', 'Description') }}</strong></td>
				<td>{{ Form::textarea('description', $phonemes->description) }}</td>
			</tr>
			<tr>
				<td><strong>{{ Form::label('canstart', 'Can start a word') }}</strong></td>
				<td>{{ Form::checkbox('canstart', 1, $phonemes->can_start) }}</td>
			</tr>
			<tr>
				<td><strong>{{ Form::label('canend', 'Can end a word') }}</strong></td>
				<td>{{ Form::checkbox('canend', 1, $phonemes->can_end) }}</td>
			</tr>
			<tr>
				<td><strong>Follows</strong></td>
				<td>
					<div class="columns">
					
					@foreach ($followers as $follower)
						<p>{{ Form::checkbox($follower->letters, 1) }}
						{{ $follower->letters }}</p>
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
