<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController    
{    
    public function __construct()
    {

    }
        public function index() 
        {            
            $data=['Title' => 'Login'];
            echo view('/principal/login', $data);
        }     

}

    // public function login() {
    //     // Cargar el modelo "User_model"
    //     $this->load->model('LoginModel');

    //     // Obtener los datos del formulario de inicio de sesión
    //     $nombre_usuario = $this->input->post('usuario');
    //     $contraseña = $this->input->post('contraseña');

    //     // Validar el usuario y la contraseña
    //     $valid = $this->Validar_Usuario($nombre_usuario, $contraseña);

    //     // Si el usuario y la contraseña son válidos, redirigir a la página de inicio
    //     if ($valid) {
    //         redirect('header');
    //     }
    //     // Si no son válidos, mostrar un mensaje de error en la vista de inicio de sesión
    //     else {
    //         $data['error'] = 'Usuario y/o contraseña incorrectos';
    //         $this->load->view('login', $data);
    //     }
    // }


}