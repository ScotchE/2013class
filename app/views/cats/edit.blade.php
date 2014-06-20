@extends('layouts.scaffold')

@section('main')

<h1>Edit Cat</h1>
{{ Form::model($cat, array('method' => 'PATCH', 'route' => array('cats.update', $cat->id))) }}
	<ul>
        <li>
            {{ Form::label('categorie', 'Categorie:') }}
            {{ Form::text('categorie') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('cats.show', 'Cancel', $cat->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
