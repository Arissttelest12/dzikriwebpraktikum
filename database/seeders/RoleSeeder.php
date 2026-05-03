<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // Role
    $pustakawan = Role::create(['name' => 'pustakawan']);
    $mahasiswa = Role::create(['name' => 'mahasiswa']);

    // Permission
    $editBook = Permission::create(['name' => 'edit_book']);
    $editUser = Permission::create(['name' => 'edit_user']);
    $viewBook = Permission::create(['name' => 'view_book']);

    // Relasi
    $pustakawan->givePermissionTo([$editBook, $editUser, $viewBook]);
    $mahasiswa->givePermissionTo($viewBook);
    }
}
