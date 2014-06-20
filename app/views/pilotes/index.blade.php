@extends('layouts.scaffold')

@section('main')

<h1>Pilotes</h1>

<p>{{ link_to_route('pilotes.create', 'Ajouter un pilote') }}</p>

@if ($pilotes->count())
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
			@foreach ($pilotes as $pilote)
				<tr>
					<td>{{ link_to_route('pilotes.show', $pilote->nom , array($pilote->id)) }}<br>
					<td>{{{ $pilote->marque }}}</td>
					<td>{{{ $pilote->mc }}}</td>
					<td>{{{ $pilote->licence }}}</td>
                    <td>{{ link_to_route('pilotes.edit', 'Editer', array($pilote->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('pilotes.destroy', $pilote->id))) }}
                            {{ Form::submit('Effacer', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no pilotes
@endif

@stop
