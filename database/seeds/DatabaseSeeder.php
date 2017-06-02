<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            array(
                'title' => 'Администраторы',
            )
        );

        DB::table('admins')->insert(
            array(
                'role_id'   => '1',
                'name'      => 'admin',
                'email'     => 'admin@admin.ru',
                'password'  =>  bcrypt('admin'),
                'created_at'=>time()
            )
        );

       /* DB::table('users')->insert(
            array(
                'name'          => 'user',
                'email'         => 'user@user.ru',
                'password'      =>  bcrypt('user'),
                'created_at'    =>time()
            )
        );*/
    }
}
