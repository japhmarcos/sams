<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
     
    	$user =  new User;
    	$user->username = 'Admin';
    	$user->password = Hash::make('admin123');
    	$user->firstname = 'Admin';
    	$user->lastname = 'Admin';
        $user->middlename = 'Admin';
        $user->address = 'ertrt';
        $user->birthday = '1/2/2003';
        $user->contact = '234523';
        $user->email = 'admin@admin.com';
        $user->isAdmin = '1';
        $user->isTeacher = '0';
        $user->save();
    }

}



