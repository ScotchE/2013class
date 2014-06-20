@extends('layouts.scaffold')

@section('main')

<h1>Create Scratch</h1>

{{ Form::open(array('route' => 'scratches.store')) }}
	<ul>
        <li>

            {{ Form::label('course', 'Course :') }}
            {{ Form::select('course_id', Course::lists('nom', 'id'), 'course_id', array('style' => 'width:300px', 'class' => 'chosen-select')) }} 

        </li>

        <li>
            {{ Form::label('pilote', 'Pilote :') }}
            {{ Form::select('pilote_id', Pilote::lists('nom', 'id'), 'pilote_id', array('style' => 'width:300px', 'class' => 'chosen-select')) }} 
        </li>

        <li>
            {{ Form::label('categorie', 'Categorie:') }}
            {{ Form::select('cat_id', Cat::lists('categorie', 'id'), 'cat_id', array('style' => 'width:300px')) }} 
        </li>

        <li>
            {{ Form::label('scratch', 'Scratch:') }}
            {{ Form::input('number', 'scratch') }}
        </li>

        <li>
            {{ Form::label('remarque', 'Remarque:') }}
            {{ Form::text('remarque') }}
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


<!-- 
<script src="../assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="../assets/js/chosen.jquery.js" type="text/javascript"></script>

<script type="text/javascript">
    var config = {
      '.chosen-select'           : {no_results_text:'Aucun résultat correspond à '},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>

 -->
@stop


