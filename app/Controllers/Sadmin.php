<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\UsuariosModel;


class Sadmin extends BaseController    
{    
    protected $usuario;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();

    }
        public function index() 
        {     
            $usuario = $this->usuario->buscacargo();        

            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Jorge Duran','usuarios'=>$usuario]; 
            echo view('/principal/header', $data);
            echo view('sadmin/sadmin', $data);

        }     

}
