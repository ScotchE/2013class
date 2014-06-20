@extends('layouts.scaffold')

@section('main')

<h1>Create Point</h1>

{{ Form::open(array('route' => 'points.store')) }}
	<ul>
        <li>
            {{ Form::label('points', 'Points:') }}
            {{ Form::input('number', 'points') }}
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


