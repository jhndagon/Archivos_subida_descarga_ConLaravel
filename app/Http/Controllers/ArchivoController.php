<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;


class ArchivoController extends Controller
{
    function index(){
        return view('archivos');
    }

    function store(Request $request){
        $archivo = $request->file('archivo'); //se obtiene el archivo
        $nombre = $archivo->getClientOriginalName(); // obtiene el nombre del archivo
        $id = rand(); //se crear un id aleatorio
        $ruta = \Storage::disk('local')->put('/' . $id . '/' . $nombre, \File::get($archivo)); //se guarda en local con la carpeta del id que se obtuvo yel nombre del archivo
        
        //si el archivo se guardo satisfactoriamente $ruta = 1,
        //procedemos a crear un enlace para descargar el archivo

        if($ruta != 1){
            /*
            //comprobamos que el archivo exista
            if(\Storage::disk('local')->exists('/' . $id . '/' . $nombre)){
                $url = storage_path() . '/storage/' . $id . '/' . $nombre;
                return response()->download($url);
            }
            */
            
            abort(404);
        }
        
        $archivo = new Archivo();
        $archivo->ruta = '/' . $id . '/' . $nombre;
        $archivo->save();
        
        return 'todo esta bien ' . $nombre . ' path: ' . storage_path().'/' . $id . '/' . $nombre;
    }

    function archivos(){
        return view('archivo', array('archivos'=> Archivo::all()));
    }

    function obtenerArchivo($id, $nombre){
        
        $ruta = storage_path() . '/storage/' . $id . '/' . $nombre;        


        if(\Storage::disk('local')->exists('/'.$id.'/'.$nombre)){
            //return $ruta;
            return response()->download($ruta);
        }
        abort(404);        
    }
}
