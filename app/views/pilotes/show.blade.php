@extends('layouts.scaffold')

@section('main')

<h1>Détail d'un pilote</h1>

<p>{{ link_to_route('pilotes.index', 'Retour à la liste des pilotes') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nom</th>
				<th>Marque</th>
				<th>Mc</th>
				<th>Licence</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $pilote->nom }}}</td>
					<td>{{{ $pilote->marque }}}</td>
					<td>{{{ $pilote->mc }}}</td>
					<td>{{{ $pilote->licence }}}</td>
                    <td>{{ link_to_route('pilotes.edit', 'Edit', array($pilote->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('pilotes.destroy', $pilote->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>


<?php
$scratches = Scratch::whereRaw('pilote_id = '. $pilote->id )->get();
?>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Course</th>
			<th>Pilote</th>
			<th>Categorie</th>
			<th>Scratch</th>
			<th>Remarque</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($scratches as $key => $scratch)

		<tr>
			<td>{{{ $scratch->course->nom }}} / {{{ $scratch->course->date }}}</td>
			<td>{{{ $scratch->pilote->nom }}}</td>
			<td>{{{ $scratch->cat->categorie }}}</td>
			<td>{{{ $scratch->scratch }}}</td>
			<td>{{{ $scratch->remarque }}}</td>
		</tr>

	@endforeach
	</tbody>
	</table>


@stop
