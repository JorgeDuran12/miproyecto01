<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController    
{    
    public function index()
    {
        // Mostrar la vista de inicio de sesión
        return view('principal/login');
    }

    public function login()
    {
        // Validar el formulario de inicio de sesión y autenticar al usuario
        $usuario = $this->request->getPost('usu');
        $pass = $this->request->getPost('pass');
        
        $Logue = new LoginModel();
        $user = $Logue->validar($usuario, $pass);
    
        if ($user) {

            //session() es una función de CodeIgniter que se utiliza para acceder al objeto de sesión actual. El objeto de sesión es una instancia de la clase CodeIgniter\Session\Session que se utiliza para interactuar con las variables de sesión almacenadas para el usuario actual.

            $sesion_activa = session();

            //$session->set() : es una función de la biblioteca de sesión de CodeIgniter que se utiliza para establecer los valores de sesión. Recibe un arreglo asociativo como parámetro, donde las claves representan los nombres de las variables de sesión y los valores representan los valores de esas variables.

            $sesion_activa->set([
                'id' => $user['id'],
                'usuario' => $user['usuario'],
                'inicio_sesion' => true
            ]);
    
            return redirect()->to('/principal');

        }else {
            return redirect()->to('/');
        }
    }

    public function Cerrar_sesion()
    {
        // Cerrar la sesión del usuario y redirigir a la página de inicio de sesión
        $sesion_activa = session();

        //$session->destroy() es una función de CodeIgniter que se utiliza para cerrar la sesión del usuario y eliminar todas las variables de sesión almacenadas. Cuando un usuario inicia sesión en un sitio web, se crea una sesión en el servidor y se almacenan variables de sesión para mantener la información del usuario durante su visita al sitio. 
        
        $sesion_activa->destroy();

        return redirect()->to('/login');
    }

   
}

   