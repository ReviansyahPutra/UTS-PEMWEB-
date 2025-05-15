<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $permission = [
            'view course',
            'create course',
            'edit course',
            'delete course',

        ];

        foreach($permission as $permission){
            Permission::create(attributes: [
                'name' => $permission
            ]);
        }

        $teacherRole = Role::create(attributes: [
            'name' => 'teacher'
        ]);

        $teacherRole->givePermissionTo(permissions: [
            'view course',
            'create course',
            'edit course',
            'delete course',
        ]);

        $studentRole = Role::create(attributes: [
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo(permissions: [
            'view course'
        ]);

        // membuat data user super admin
        $user = User::create([
            'name' => 'azmi',
            'email' => 'azmi@teacher.com',
            'password' => bcrypt('123123123')
        ]);

        $user->assignRole($teacherRole);

    }
}
