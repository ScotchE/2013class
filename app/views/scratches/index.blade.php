@extends('layouts.scaffold')

@section('main')

<h1>All Scratches</h1>

<p>{{ link_to_route('scratches.create', 'Add new scratch') }}</p>

@if ($scratches->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Course_id</th>
				<th>Pilote</th>
				<th>Categorie</th>
				<th>Scratch</th>
				<th>Remarque</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($scratches as $scratch)
				<tr>
					<td>{{{ $scratch->course->nom }}}</td>
					<td>{{{ $scratch->pilote->nom }}}</td>
					<td>{{{ $scratch->cat->categorie }}}</td>
					<td>{{{ $scratch->scratch }}}</td>
					<td>{{{ $scratch->remarque }}}</td>
                    <td>{{ link_to_route('scratches.edit', 'Edit', array($scratch->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('scratches.destroy', $scratch->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no scratches
@endif

@stop
