@extends('layouts.scaffold')

@section('main')

<h1>Create Pilote</h1>

{{ Form::open(array('route' => 'pilotes.store')) }}
	<ul>
        <li>
            {{ Form::label('nom', 'Nom :') }}
            {{ Form::text('nom') }}
        </li>

        <li>
            {{ Form::label('marque', 'Marque :') }}
            {{ Form::text('marque') }}
        </li>

        <li>
            {{ Form::label('mc', 'Mc :') }}
            {{ Form::text('mc') }}
        </li>

        <li>
            {{ Form::label('licence', 'Licence :') }}
            {{ Form::input('number', 'licence') }}
        </li>

         <li>
            {{ Form::label('naissance', 'Date de naissance :') }}
            {{ Form::input('date', 'naissance', '2014-01-01') }}
        </li>

		<li>
			{{ Form::submit('Enregistrer', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


