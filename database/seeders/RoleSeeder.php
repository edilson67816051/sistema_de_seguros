<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
   
    public function run()
    {
        $role1 = Role::create(['name'=>'admin']);
        $role2 = Role::create(['name'=>'Blogger']);
        $role3 = Role::create(['name'=>'cliente']);


        
        Permission::create(['name' => 'admin.home'])->syncRoles($role1,$role2);

        Permission::create(['name' => 'admin.usuario.index'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'admin.usuario.create'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'admin.usuario.edit'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'admin.usuario.destroy'])->syncRoles($role1,$role2);

        Permission::create(['name' => 'cliente.home'])->syncRoles($role3);


    }
}
