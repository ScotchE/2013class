<?php

class Pilote extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required'
	);


	public function scratch() {
		return $this->hasMany('Scratch');
	}
	
}
