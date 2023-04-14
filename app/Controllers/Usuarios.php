<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class Usuarios extends BaseController    
{    
    protected $user;


    public function __construct()
    {
        $this->user = new UsuariosModel();

    }


    public function index()
    {
        // Mostrar la vista de inicio de sesión
        $data['logo1'] =base_url('img/logo1.png');
        return view('usuarios/login', $data);
    }


    public function login()
    {
        if($this->request->getMethod() == "post" ) {

            // Validar el formulario de inicio de sesión y autenticar al usuario
            $usuario = $this->request->getPost('usu');
            $pass = $this->request->getPost('pass');
            
            $user = $this ->user -> validar($usuario, $pass);
        
            if ($user) {

                //session() es una función de CodeIgniter que se utiliza para acceder al objeto de sesión actual. 

                $sesion_activa = session();

                //$session->set() : es una función de la biblioteca de sesión de CodeIgniter que se utiliza para establecer los valores de sesión. 
            
                $sesion_activa ->set ([
                    'id' => $user['id'],
                    'usuario' => $user['usuario'],
                    'inicio_sesion' => true
                ]);
        
                return redirect()->to('/principal');

            }else {
                return redirect()->to('/');
            }

        }
    }


    public function cerrar_sesion()
    {
        // Cerrar la sesión del usuario y redirigir a la página de inicio de sesión
        $sesion_activa = session();

        //$session->destroy() es una función de CodeIgniter que se utiliza para cerrar la sesión del usuario y eliminar todas las variables de sesión almacenadas. Cuando un usuario inicia sesión en un sitio web, se crea una sesión en el servidor y se almacenan variables de sesión para mantener la información del usuario durante su visita al sitio. 
        
        $sesion_activa->destroy();

        return redirect()->to('/');
    }


    public function crear_cuenta(){

        return view('usuarios/crear');
    }

    
    public function guardar(){   

        if ($this->request->getMethod() == "post" ) {

            $this->user->save([    
                            
                'nombres' => $this->request->getPost('nombre'),
                'apellidos' => $this->request->getPost('apellido'),
                'usuario' => $this->request->getPost('NombreUsuario'),
                'pass' => $this->request->getPost('pass'),
                'email' => $this->request->getPost('email')

            ]);

            return redirect()->to('/');
        }
    }
    
}

   