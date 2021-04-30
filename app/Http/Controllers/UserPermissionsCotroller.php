<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class UserPermissionsCotroller extends Controller
{
    public function store(Request  $request){
        if(!$permission = Permission::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
        ])){
            return response('Error al crear permiso',404);
        }
        return response('permiso creado',200);

    }

    public function get(){
        return response(Permission::all(),200);
    }

    public function update(Request $request){
        try{
            $permission = Permission::find($request->id_permission);
            $permission->name = $request->name;
            $permission->slug = $request->slug;
            $permission->save();
        }catch (Exception $e ){
            return response('Error en actualizar permiso', 404);

        }
        return response('permiso actualizado',200);
    }

    public function destroy(Request $request){
        try{
            Permission::destroy($request->id_permission);

        }catch (Exception $e ){
            return response('Error en eliminar permiso', 404);

        }
        return response('permiso eliminado',200);
    }

}
