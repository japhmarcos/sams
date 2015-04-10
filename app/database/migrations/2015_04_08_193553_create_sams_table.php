<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('middlename');
			$table->string('address');
			$table->string('birthday');
			$table->string('contact');
			$table->string('email');
			$table->enum('isAdmin', array(0,1))->default(0);
			$table->enum('isTeacher', array(0,1))->default(0);
			$table->string('image');
			$table->string('remember_token');
			$table->timestamps();
			
		});

		
				Schema::create('sections', function(Blueprint $table)
			{
				//references('id')->on('users');
			$table->increments('id');
			$table->string('name');
			$table->string('comment');
			$table->integer('student_id')->unsigned();
			$table->string('student_firstname');
			$table->string('student_lastname');
			$table->timestamps();
			
		});

			

				Schema::create('room', function(Blueprint $table)
			{
				//references('id')->on('users');
			$table->increments('id');
			$table->integer('number');
			$table->string('type');
			$table->timestamps();
			
		});

					Schema::create('subject', function(Blueprint $table)
			{
				//references('id')->on('users');
			$table->increments('id');
			$table->string('code');
			$table->string('name');
			$table->string('info');
			$table->string('start_time');
			$table->string('end_time');
			$table->integer('student_id')->unsigned();
			$table->string('student_firstname');
			$table->string('student_lastname');
			$table->integer('teacher_id')->unsigned();
			$table->string('teacher_firstname');
			$table->string('teacher_lastname');
			$table->integer('section_id');
			$table->string('section_name');
			$table->integer('room_id');
			$table->string('room_type');
			$table->integer('room_number');
			$table->timestamps();
			
		});


					Schema::create('attendances', function(Blueprint $table)
			{
				//references('id')->on('users');
			$table->increments('id');
			$table->string('status');
			$table->string('comment');
			$table->integer('student_id')->unsigned();
			$table->string('student_firstname');
			$table->string('student_lastname');
			$table->integer('teacher_id')->unsigned();
			$table->string('teacher_firstname');
			$table->string('teacher_lastname');
			$table->integer('section_id');
			$table->string('section_name');
			$table->integer('subject_id');
			$table->string('subject_code');
			$table->string('subject_name');
			$table->string('date_recorded');
			$table->timestamps();
			
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('attendances');
		Schema::drop('sections');
		Schema::drop('subject');
		Schema::drop('room');
	}

}
