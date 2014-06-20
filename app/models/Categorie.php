<?php

class Categorie extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'categorie' => 'required'
	);

}
