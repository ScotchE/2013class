@extends('layouts.scaffold')

@section('main')


<h1>Classements</h1>


<?php
$categories   	= Cat::all();
$courses   		= Course::all();
$scratches 		= Scratch::where('cat_id', '=', '1')->get();

$classement = array();
$classements = array();

?>

@foreach ($categories as $categorie)
<h2>{{{$categorie->categorie}}}</h2>
@foreach ($courses as $course)

<h3>{{{$course->nom}}}</h3>
<?php
$scratches = Scratch::whereRaw('scratch > 0 and cat_id = '. $categorie->id .' and course_id = '.$course->id)->orderBy('scratch')->get();
?>
	<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Place</th>
			<th>Points</th>
			<th>Pilote</th>
			<th>Categorie</th>
			<th>Scratch</th>
			<th>Remarque</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($scratches as $key => $scratch)

		<?php

			$points = Point::find($key+1)['points'];
			if (isset($classement[$scratch->pilote->nom])) {
				$classement[$scratch->pilote->nom] += $points;
			} else {
				$classement[$scratch->pilote->nom] = $points;
			}
			$classements[$course->id][$scratch->pilote->nom] = Point::find($key+1)['points'];
		?>

		<tr>
			<td>{{{ $key+1 }}} / {{ Point::find($key+1)['points'] }} </td>
			<td>{{ $classement[$scratch->pilote->nom] }}</td>
			<td>{{{ $scratch->pilote->nom }}}</td>
			<td>{{{ $scratch->cat->categorie }}}</td>
			<td>{{{ $scratch->scratch }}}</td>
			<td>{{{ $scratch->remarque }}}</td>
		</tr>

	@endforeach
	</tbody>
	</table>

@endforeach


	<h3>Classement</h3>

	<?php 
		arsort($classement); 
		$position = 1;
	?>
	<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th colspan="2">Points</th>
			<th>Pilote</th>
			@foreach ($courses as $course)
				<th class="rotated_cell"><div class="rotate_text"><span>{{{$course->nom}}}</span></th>
			@endforeach
		</tr>
	</thead>
	@foreach ($classement as $key => $place)
		<tr>
			<td>{{$position++}}</td>
			<td>{{ $place }}</td>
			<td>{{{ $key }}}</td>
			@foreach ($courses as $course)
				<?php if (isset($classements[$course->id][$key])) { ?>
				<td class="rotated_cell">{{{$classements[$course->id][$key]}}}</td>
				<?php } else { ?>
				<td class="rotated_cell"> - </td>
				<?php } ?>
			@endforeach
		</tr>
	@endforeach
	</table>




	<h3>Classement SPIP</h3>

	<?php 
		arsort($classement); 
		$position = 1;
	?>
	<p>| Points | < | Pilote |
			@foreach ($courses as $course)
				{{{$course->nom}}} |
			@endforeach
	</p>
	@foreach ($classement as $key => $place)
	<p>		| {{$position++}} | {{ $place }} |{{{ $key }}} |
			@foreach ($courses as $course)
				<?php if (isset($classements[$course->id][$key])) { ?>
				{{{$classements[$course->id][$key]}}} |
				<?php } else { ?>
				 - | 
				<?php } ?>
			@endforeach
	</p>
	@endforeach

	<?php
		$classement = array();
		$classements = array();
	?>


	
@endforeach


@stop
