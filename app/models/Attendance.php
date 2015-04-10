<?php



class Attendance extends Eloquent
{

	public function users ()
	{
		return $this->belongsTo('User', 'id');
	}
}