<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $roles = ['admin', 'student', 'faculty', 'officers'];
    
        foreach ($roles as $roleName) {
            \Spatie\Permission\Models\Role::firstOrCreate(['name' => $roleName]);
        }
    
        
        $adminUser = \App\Models\User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );
        $adminUser->assignRole('admin');
    
        $facultyUser = \App\Models\User::updateOrCreate(
            ['email' => 'faculty@example.com'],
            [
                'name' => 'Faculty User',
                'password' => bcrypt('password'),
                'role' => 'faculty',
            ]
        );
        $facultyUser->assignRole('faculty');
    
        $officerUser = \App\Models\User::updateOrCreate(
            ['email' => 'officer@example.com'],
            [
                'name' => 'Officer User',
                'password' => bcrypt('password'),
                'role' => 'officers',
            ]
        );
        $officerUser->assignRole('officers');

        $studentUser = User::updateOrCreate(
            ['email' => 'student@example.com'],
            [
                'name' => 'Student User',
                'password' => bcrypt('password'),
            ]
        );
        $studentUser->assignRole('student');

        $studentUser = User::updateOrCreate(
            ['email' => 'jon@example.com'],
            [
                'name' => 'Jon User',
                'password' => bcrypt('password'),
            ]
        );
        $studentUser->assignRole('student');

        
    }

    

    
    

}
