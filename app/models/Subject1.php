<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Subject1 extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	  */
	 
	protected $table = 'subject';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}



/*use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
	
class Subject1 extends Eloquent {



public function users()
		{

			return $this->belongsTo('User', 'id');

		}


		


	}

*/


