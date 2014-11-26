@extends('main')


@section('body')
	{{ $alert }}
	<table>
	@if ($pcount > 0)
		<tr>	
			<th>ID</th>
			<th>Letters</th>
			<th>Description</th>
			<th>Can start</th>
			<th>Can end</th>
			<th>Can follow</th>
			<th>Functions</th>
		</tr>
		@foreach ($phonemes as $phoneme)
			<tr>
				<td>{{ $phoneme->id }}</td>
				<td>{{ $phoneme->letters }}</td>
				<td>{{ $phoneme->description }}</td>
				<td>{{ $phoneme->can_start }}</td>
				<td>{{ $phoneme->can_end }}</td>
				<td>{{ $followers[$phoneme->id] }}
				</td>
				<td><a href="/language/{{ $lang }}/phoneme/{{ $phoneme->id }}/edit">Edit</a> | <a href="/language/{{ $lang }}/phoneme/{{ $phoneme->id }}/delete">Delete</a></td>
			</tr>
		@endforeach
	@else
		<tr><td><em>No Phonemes Defined</em></td></tr>
	@endif
	</table>
@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="/language/{{ $lang }}/phoneme/create">Create a New Phoneme</a></li>
		</ul>
	</div>
@stop
