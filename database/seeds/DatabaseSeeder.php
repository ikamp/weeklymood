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
        DB::table('department')->delete();
        App\Department::create([
            'name' => 'HR',
        ]);

        DB::table('company')->delete();
        App\Company::create([
            'name' => 'Happy A.Ş.',
            'logo' => 'logo',
        ]);

        DB::table('user')->delete();
        App\User::create([
            'name' => 'Helen',
            'surname' => 'Smith',
            'email' => 'helensmith@gmail.com',
            'password' => Hash::make('12345'),
            'position' => 'manager',
            'avatar' => 'avatar',
            'department_id' => '1',
            'company_id' => '1',
            'is_manager' => 'true',
        ]);
    }
}
