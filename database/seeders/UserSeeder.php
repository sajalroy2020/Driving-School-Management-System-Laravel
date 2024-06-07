<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $google2fa = app('pragmarx.google2fa');
        User::insert([
            ['name' => 'Admin Deo', 'phone' => '0', 'role' => USER_ROLE_ADMIN, 'email' => 'admin@gmail.com', 'password' => Hash::make(123456), 'status' => USER_STATUS_ACTIVE, 'google2fa_secret' => $google2fa->generateSecretKey(), 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['name' => 'Staff Deo', 'phone' => '0', 'role' => USER_ROLE_STAFF, 'email' => 'staff@gmail.com', 'password' => Hash::make(123456), 'status' => USER_STATUS_ACTIVE, 'google2fa_secret' => $google2fa->generateSecretKey(), 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['name' => 'Instructor Deo', 'phone' => '0', 'role' => USER_ROLE_INSTRUCTOR, 'email' => 'instructor@gmail.com', 'password' => Hash::make(123456), 'status' => USER_STATUS_ACTIVE, 'google2fa_secret' => $google2fa->generateSecretKey(), 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
            ['name' => 'Student Deo', 'phone' => '0', 'role' => USER_ROLE_STUDENT, 'email' => 'student@gmail.com', 'password' => Hash::make(123456), 'status' => USER_STATUS_ACTIVE, 'google2fa_secret' => $google2fa->generateSecretKey(), 'tenant_id' => DEFAULT_TENANT_ID_ADMIN],
        ]);
    }
}
