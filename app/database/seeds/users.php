<?php


$now = date('Y-m-d H:i:s');


return array(
        'table' => 'users',

        array(
                'username'   => 'Admin',
                'password'   => Hash::make('admin123'),
                'firstname' => 'Admin',
                'lastname' => 'admi432'
                'middlename' => 'dsadsa',
                'address' => 'dfaffs',
                'birthday' => '1/2/1992',
                'contact' => '3214321',
                'email' => 'admin@admin.com',
                'isAdmin' => '1',
                'isTeacher' => '0',
                'created_at' => $now
                'updated_at' => $now
               
        ));