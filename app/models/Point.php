<?php

class Point extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'points' => 'required'
	);
}
