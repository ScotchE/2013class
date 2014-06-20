@extends('layouts.scaffold')

@section('main')

<h1>Create Cat</h1>

{{ Form::open(array('route' => 'cats.store')) }}
	<ul>
        <li>
            {{ Form::label('categorie', 'Categorie:') }}
            {{ Form::text('categorie') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


