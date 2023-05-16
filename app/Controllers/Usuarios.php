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
        $user = $this->request->getPost('usu');
        $pass = $this->request->getPost('pass');

        $usuariosModel = new UsuariosModel();

        $usuario = $usuariosModel->Auth_usuario($user);

        if (isset($usuario)) {

            if ($usuario && password_verify($pass, $usuario['pass'])) {
        
                $session = session();
                $session->set([
                    'id', $usuario['id'],
                    'usuario', $usuario['usuario'],
                    'logged_in' => true
                ]);
            
                return redirect()->to('/principal');

                }else{
                    echo "La contraseña es incorrecta";
                }
        }else{
            // return redirect()->back()->with('error', 'Credenciales inválidas');
            echo "este usuario no existe, incorrecto";
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

            $pass = $this->request->getPost('pass');
            $hass = password_hash($pass, PASSWORD_DEFAULT);

            $this->user->save([    
                            
                'nombres' => $this->request->getPost('nombre'),
                'apellidos' => $this->request->getPost('apellido'),
                'usuario' => $this->request->getPost('NombreUsuario'),
                'pass' => $hass ,
                'email' => $this->request->getPost('email')

            ]);

            return redirect()->to('/');
        }
    }
    
}

   
