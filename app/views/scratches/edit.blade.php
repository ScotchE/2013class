@extends('layouts.scaffold')

@section('main')

<h1>Edit Scratch</h1>
{{ Form::model($scratch, array('method' => 'PATCH', 'route' => array('scratches.update', $scratch->id))) }}
	<ul>
        <li>
            {{ Form::label('course_id', 'Course :') }}
            {{ Form::select('course_id', Course::lists('nom', 'id')) }} 
        </li>

        <li>
            {{ Form::label('pilote_id', 'Pilote :') }}
            {{ Form::select('pilote_id', Pilote::lists('nom', 'id'))}}
        </li>

        <li>
            {{ Form::label('cat_id', 'Categorie :') }}
            {{ Form::select('cat_id', Cat::lists('categorie', 'id')) }} 

        </li>

        <li>
            {{ Form::label('scratch', 'Scratch:') }}
            {{ Form::input('number', 'scratch') }}
        </li>

        <li>
            {{ Form::label('remarque', 'Remarque :') }}
            {{ Form::text('remarque') }}
        </li>

		<li>
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-info')) }}
			{{ link_to_route('scratches.index', 'Annuler', $scratch->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
