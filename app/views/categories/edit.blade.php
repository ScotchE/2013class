@extends('layouts.scaffold')

@section('main')

<h1>Edit Category</h1>
{{ Form::model($categorie, array('method' => 'PATCH', 'route' => array('categories.update', $categorie->id))) }}
	<ul>
        <li>
            {{ Form::label('categorie', 'Categorie:') }}
            {{ Form::text('categorie') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('categories.show', 'Cancel', $categorie->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
