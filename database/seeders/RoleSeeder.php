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
        $role2 = Role::create(['name'=>'operadores']);             
        $role3 = Role::create(['name'=>'mecanico']);
        $role4 = Role::create(['name'=>'cliente']);


        
        Permission::create(['name' => 'admin.home','descripcion'=>'ver el dashboard'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'cliente.home','descripcion'=>'ver el dashboar cliente'])->syncRoles($role4);

        
        Permission::create(['name' => 'admin.administracion','descripcion'=>'Modulo de adnimistracion'])->syncRoles($role1);
        Permission::create(['name' => 'admin.seguros','descripcion'=>'Modulo seguros'])->syncRoles($role1,$role2,$role3);
        Permission::create(['name' => 'admin.finanza','descripcion'=>'Modulo de finanzas'])->syncRoles($role1,$role2);




        Permission::create(['name' => 'admin.usuario.index','descripcion'=>'Listar usuarios'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'admin.usuario.create','descripcion'=>'Crear usuarios'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'admin.usuario.edit','descripcion'=>'Editar usuarios'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'admin.usuario.destroy','descripcion'=>'Eliminar usuarios'])->syncRoles($role1,$role2);


    }
}
