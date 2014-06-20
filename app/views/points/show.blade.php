@extends('layouts.scaffold')

@section('main')

<h1>Show Point</h1>

<p>{{ link_to_route('points.index', 'Return to all points') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Points</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $point->points }}}</td>
                    <td>{{ link_to_route('points.edit', 'Edit', array($point->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('points.destroy', $point->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
