<?php

class Course extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'date' => 'required'
	);

	public function scratch() {
		return $this->hasMany('Scratch');
	}
}
