@extends('layouts.scaffold')

@section('main')

<h1>All Points</h1>

<p>{{ link_to_route('points.create', 'Add new point') }}</p>

@if ($points->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Points</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($points as $point)
				<tr>
					<td>{{{ $point->points }}}</td>
                    <td>{{ link_to_route('points.edit', 'Edit', array($point->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('points.destroy', $point->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no points
@endif

@stop
