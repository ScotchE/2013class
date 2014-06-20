<?php

class Cat extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'categorie' => 'required'
	);


	public function scratch() {
		return $this->hasMany('Scratch');
	}

}
