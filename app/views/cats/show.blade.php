@extends('layouts.scaffold')

@section('main')

<h1>Show Cat</h1>

<p>{{ link_to_route('cats.index', 'Return to all cats') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Categorie</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $cat->categorie }}}</td>
                    <td>{{ link_to_route('cats.edit', 'Edit', array($cat->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('cats.destroy', $cat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
