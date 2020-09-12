<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname'   => 'Goku',
            'email'      => 'goku@gmail.com',
            'phone'      => '310234876',
            'birthdate'  => '1970-08-07',
            'gender'     => 'Male',
            'address'    => 'Avd la última visita',
            'password'   => bcrypt('admin'),
            'role'       => 'Admin',
            'created_at' => now(),
        ]);

        $usr = new User;
        $usr->fullname = 'Vegueta';
        $usr->email = 'vuegueta@gmail.com';
        $usr->phone = '3549875643';
        $usr->birthdate = '1980-01-10';
        $usr->gender = 'Male';
        $usr->address = 'No sabe';
        $usr->password = bcrypt('customer');
        $usr->created_at = now();
        $usr->save();

        //Creación de Factory
        factory(User::class, 10)->create();

    }
}
