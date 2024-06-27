<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'ubah-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        Permission::create(['name' => 'tambah-tulisan']);
        Permission::create(['name' => 'ubah-tulisan']);
        Permission::create(['name' => 'hapus-tulisan']);
        Permission::create(['name' => 'lihat-tulisan']);

        permission::create(['name' => 'user']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'penulis']);
        Role::create(['name' => 'user']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('ubah-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $rolePenulis = Role::findByName('penulis');
        $rolePenulis->givePermissionTo('tambah-tulisan');
        $rolePenulis->givePermissionTo('ubah-tulisan');
        $rolePenulis->givePermissionTo('hapus-tulisan');
        $rolePenulis->givePermissionTo('lihat-tulisan');

        $roleUser = Role::findByName('user');
        $roleUser->givePermissionTo('lihat-tulisan');
    }
}
