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
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'password' =>  bcrypt('admin'),
                'created_at'=>time()
            )
        );
    }
}
