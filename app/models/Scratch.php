<?php

class Scratch extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'course_id' => 'required',
		'pilote_id' => 'required',
		'cat_id' => 'required',
		'scratch' => 'required'
	);

	public function pilote(){
		return $this->belongsTo('Pilote');
	}
	public function course(){
		return $this->belongsTo('Course');
	}
	public function cat(){
		return $this->belongsTo('Cat');
	}


}
