<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class AUserRolesController extends Controller
{
    public function store(Request $request){
        if(!$role = Role::create([
            'name' =>$request->name,
            'slug'=>$request->slug
        ])){
            return response('Error a crear rol', 404);
        }
        return response('Rol creado', 200);
    }

    public function get(){
        return response(Role::all(),200);
    }

    public function update(Request $request){
        try {
            $role = Role::find($request->id_role);
            $role->name = $request->name;
            $role->slug = $request->slug;
            $role->save();
        }catch (Exception $e){
            return response('Error en actualizar',404);
        }
        return response($role, 200);


    }

    public function destroy(Request  $request ){
        try {
            Role::destroy($request->id_role);
        }catch (Exception $e){
            return response('Error al eliminiar rol',404);
        }
        return  response('rol Elimindo', 200);
    }

    public function  permissions($id_role){
        $roles[] =Role::find($id_role);

        $permissions=[];
        foreach($roles as $index=> $role){
            foreach ($role->permissions as $permission){
                $permissions[$permission->id]=$permission->name;
            }
        }

        return  response($permissions,200);
    }

    public function  add_permission(Request  $request){
        $role = Role::find($request->id_role);
        try {
            $role->permissions()->attach($request->id_permission);
        }catch (Exception $e){
            return response('Error al asignar permiso', 404);
        }
        return response('permiso asignado', 200);
    }

    public function remove_permission(Request $request){
        $role =Role::find($request->id_role);

        try {
            $role->permissions()->detach($request->id_permission);
        }catch (Exception $e){
            return response('Error al quitar premiso',404);
        }
        return  response('permiso eliminado',200);
    }
}
