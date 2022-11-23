<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456789'),
            'role_as'=>'admin',
        ]);

        User::create([
            'name' => 'employee1',
            'email' => 'employee1@mail.com',
            'password' => bcrypt('123456789'),
            'role_as'=>'employee',
        ]);

        User::create([
            'name' => 'employee2',
            'email' => 'employee2@mail.com',
            'password' => bcrypt('123456789'),
            'role_as'=>'employee',
        ]);

        User::create([
            'name' => 'employee3',
            'email' => 'employee3@mail.com',
            'password' => bcrypt('123456789'),
            'role_as'=>'employee',
        ]);

        User::create([
            'name' => 'employee4',
            'email' => 'employee4@mail.com',
            'password' => bcrypt('123456789'),
            'role_as'=>'employee',
        ]);

        User::create([
            'name' => 'employee5',
            'email' => 'employee5@gmail.com',
            'password' => bcrypt('123456789'),
            'role_as'=>'employee',
        ]);
    }
}
