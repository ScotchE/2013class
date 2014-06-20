@extends('layouts.scaffold')

@section('main')

<h1>Show Category</h1>

<p>{{ link_to_route('categories.index', 'Return to all categories') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Categorie</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $categorie->categorie }}}</td>
                    <td>{{ link_to_route('categories.edit', 'Edit', array($categorie->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('categories.destroy', $categorie->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
