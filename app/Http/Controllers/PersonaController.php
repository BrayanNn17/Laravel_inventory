<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function mostrarform($id = null){
        if(!$id){
            return "debe ingresar un id para el formulario";
        }
        return "form id :".$id;
    }
    function consultaProducto(){
        
    }
}
