@extends('layouts.scaffold')

@section('main')

<h1>Edit Pilote</h1>
{{ Form::model($pilote, array('method' => 'PATCH', 'route' => array('pilotes.update', $pilote->id))) }}
	<ul>
        <li>
            {{ Form::label('nom', 'Nom:') }}
            {{ Form::text('nom') }}
        </li>

        <li>
            {{ Form::label('marque', 'Marque:') }}
            {{ Form::text('marque') }}
        </li>

        <li>
            {{ Form::label('mc', 'Mc:') }}
            {{ Form::text('mc') }}
        </li>

        <li>
            {{ Form::label('licence', 'Licence:') }}
            {{ Form::input('number', 'licence') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('pilotes.show', 'Cancel', $pilote->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
