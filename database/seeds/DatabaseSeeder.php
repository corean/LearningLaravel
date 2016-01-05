<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
        $this->call('RolesTableSeeder');
        $this->command->info('Roles table seeded!');

        $this->call('RoleUserTableSeeder');
        $this->command->info('RoleUser table seeded!');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            ['name' => 'corean','password' => Hash::make('test1234'),'email' => 'corean@corean.biz'],
            ['name' => 'test','password' => Hash::make('test1234'),'email' => 'test@corean.biz'],
        ]);

    }

}

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            ['name' => 'manager', 'display_name' => 'Manager', 'description' => 'User is allowed to access admin control panel'] ,
            ['name' => 'member', 'display_name' => 'Member', 'description' => 'Official member of the site'] ,
        ]);
    }

}

class RoleUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role_user')->delete();

        $user = User::whereName('corean')->FirstOrFail();
        $user->saveRoles([1]);
        $user = User::whereName('test')->FirstOrFail();
        $user->saveRoles([2]);
    }

}


