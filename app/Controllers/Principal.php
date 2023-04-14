<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */

class Principal extends BaseController    
{    
    public function __construct()
    {
        
    }
        public function index() 
        {            
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Jorge Duran']; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header',$data);
        }     

}

