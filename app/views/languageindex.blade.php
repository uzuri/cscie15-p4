@extends('main')

@section('body')
	{{ $placeholder }}
	<table>
	@if ($lcount > 0)
		<tr>	
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Functions</th>
		</tr>
		@foreach ($languages as $language)
			<tr>
				<td>{{ $language->id }}</td>
				<td>{{ $language->name }}</td>
				<td>{{ $language->description }}</td>
				<td><a href="/language/{{ $language->id }}/edit">Edit</a> | <a href="/language/{{ $language->id }}/delete">Delete</a></td>
			</tr>
		@endforeach
	@else
		<tr><td><em>No Languages Defined</em></td></tr>
	@endif
	</table>
@stop


@section('subnav')
	<div id="subnav">
		<ul>
			<li><a href="language/create">Create a New Language</a></li>
		</ul>
	</div>
@stop
