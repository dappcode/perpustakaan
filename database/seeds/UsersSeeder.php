<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role Admin
        $roleAdmin = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
        ]);

        // Role Member
        $roleMember = Role::create([
            'name' => 'member',
            'display_name' => 'Member',
        ]);

        // Contoh user dengan Role
        $adminUser = User::create([
            'name' => 'Admin GGWP',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('qweasd123'),
        ]);
        
        $adminUser->attachRole($roleAdmin);
        
        $memberUser = User::create([
            'name' => 'Member GGWP',
            'email' => 'member@gmail.com',
            'password' => bcrypt('qweasd123'),
        ]);
        
        $memberUser->attachRole($roleMember);
        
    }
}
