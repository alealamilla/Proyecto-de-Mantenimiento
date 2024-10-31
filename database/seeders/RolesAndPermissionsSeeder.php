<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create users permissions
        Permission::create(['name' => 'ver panel usuarios']);
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);

        // create permissions 
        Permission::create(['name' => 'ver permisos usuarios']);
        Permission::create(['name' => 'editar permisos usuarios']);

        // create logs permissions
        Permission::create(['name' => 'ver panel bitácora']);

        // create status permissions
        Permission::create(['name' => 'ver panel status']);
        Permission::create(['name' => 'crear status']);
        Permission::create(['name' => 'editar status']);
        Permission::create(['name' => 'eliminar status']);

        // create brands permissions
        Permission::create(['name' => 'ver panel marcas']);
        Permission::create(['name' => 'crear marcas']);
        Permission::create(['name' => 'editar marcas']);
        Permission::create(['name' => 'eliminar marcas']);

        // create colors permissions
        Permission::create(['name' => 'ver panel colores']);
        Permission::create(['name' => 'crear colores']);
        Permission::create(['name' => 'editar colores']);
        Permission::create(['name' => 'eliminar colores']);

        // create types permissions
        Permission::create(['name' => 'ver panel modelos']);
        Permission::create(['name' => 'crear modelos']);
        Permission::create(['name' => 'editar modelos']);
        Permission::create(['name' => 'eliminar modelos']);

        // create services permissions
        Permission::create(['name' => 'ver panel servicios']);
        Permission::create(['name' => 'crear servicios']);
        Permission::create(['name' => 'editar servicios']);
        Permission::create(['name' => 'eliminar servicios']);

        // create spareparts permissions
        Permission::create(['name' => 'ver panel refacciones']);
        Permission::create(['name' => 'crear refacciones']);
        Permission::create(['name' => 'editar refacciones']);
        Permission::create(['name' => 'eliminar refacciones']);

        // create owners permissions
        Permission::create(['name' => 'ver panel propietarios']);
        Permission::create(['name' => 'crear propietarios']);
        Permission::create(['name' => 'editar propietarios']);
        Permission::create(['name' => 'eliminar propietarios']);

        // create cars permissions
        Permission::create(['name' => 'ver panel carros']);
        Permission::create(['name' => 'crear carros']);
        Permission::create(['name' => 'editar carros']);
        Permission::create(['name' => 'eliminar carros']);

        // create reeptiodn permissions
        Permission::create(['name' => 'ver panel recepciones']);
        Permission::create(['name' => 'crear recepciones']);
        Permission::create(['name' => 'editar recepciones']);
        Permission::create(['name' => 'eliminar recepciones']);

        // create works permissions
        Permission::create(['name' => 'ver panel trabajos']);
        Permission::create(['name' => 'crear trabajos']);
        Permission::create(['name' => 'editar trabajos']);
        Permission::create(['name' => 'eliminar trabajos']);

        // roles
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'employ']);
        // $role->givePermissionTo(Permission::all());

    }
}
