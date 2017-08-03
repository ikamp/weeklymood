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
        factory(App\Model\Department::class, 20)->create();
        factory(App\Model\Company::class, 20)->create();
        factory(App\Model\User::class,50)->create();

        DB::table('mood')->insert([
            'type' => 'Extremely Sad',
            'value' => 0
        ]);

        DB::table('mood')->insert([
            'type' => 'Sad',
            'value' => 25
        ]);

        DB::table('mood')->insert([
            'type' => 'Normal',
            'value' => 50
        ]);

        DB::table('mood')->insert([
            'type' => 'Happy',
            'value' => 75
        ]);

        DB::table('mood')->insert([
            'type' => 'Extremely Happy',
            'value' => 100
        ]);

        DB::table('tag')->insert([
            'name' => 'Work Environmental'
        ]);

        DB::table('tag')->insert([
            'name' => 'Health'
        ]);

        DB::table('tag')->insert([
            'name' => 'Working Hours'
        ]);

        DB::table('tag')->insert([
            'name' => 'Salary'
        ]);

        DB::table('tag')->insert([
            'name' => 'Team Members'
        ]);

        DB::table('user')->insert([
            'name' => 'Julia',
            'surname' => 'Gate',
            'email' => 'julia@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '1',
            'company_id' => '1',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Helen',
            'surname' => 'Smith',
            'email' => 'helensmith@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '2',
            'company_id' => '2',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Tim',
            'surname' => 'Smithboy',
            'email' => 'timsmithboy@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '2',
            'company_id' => '3',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Helena',
            'surname' => 'Brovski',
            'email' => 'helena@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '3',
            'company_id' => '4',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'John',
            'surname' => 'Hay',
            'email' => 'john@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '4',
            'company_id' => '5',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Selena',
            'surname' => 'Rose',
            'email' => 'selena@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '1',
            'company_id' => '6',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Melissa',
            'surname' => 'Gray',
            'email' => 'melissa@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '7',
            'company_id' => '7',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Merith',
            'surname' => 'Kay',
            'email' => 'merith@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '6',
            'company_id' => '8',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Mary',
            'surname' => 'Ten',
            'email' => 'mary@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '10',
            'company_id' => '9',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'William',
            'surname' => 'Bank',
            'email' => 'william@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '10',
            'company_id' => '10',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Charles',
            'surname' => 'King',
            'email' => 'charles@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '1',
            'company_id' => '11',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Micheal',
            'surname' => 'Rock',
            'email' => 'micheal@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '11',
            'company_id' => '12',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Denis',
            'surname' => 'Hell',
            'email' => 'denis@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '12',
            'company_id' => '13',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Tony',
            'surname' => 'Key',
            'email' => 'tonykey@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '14',
            'company_id' => '14',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Victoria',
            'surname' => 'Beckham',
            'email' => 'victoria@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '15',
            'company_id' => '15',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Diana',
            'surname' => 'Sorry',
            'email' => 'diana@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '16',
            'company_id' => '16',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Bella',
            'surname' => 'Therna',
            'email' => 'bella@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '15',
            'company_id' => '17',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'David',
            'surname' => 'Zerk',
            'email' => 'davidzerk@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '17',
            'company_id' => '18',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Nikki',
            'surname' => 'Minnie',
            'email' => 'nikki@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '18',
            'company_id' => '18',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);

        DB::table('user')->insert([
            'name' => 'Jamie',
            'surname' => 'Beck',
            'email' => 'jamie@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '1',
            'company_id' => '19',
            'is_manager' => 'true',
            'is_active' => 'true',
            'remember_token' => 'asdfgh'
        ]);
        return;
    }
}
