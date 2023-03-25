<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\EmpleadosModel;
use App\Models\CargosModel;
use App\Models\MunicipiosModel;

class Empleados extends BaseController    
{    
    protected $empl;
    protected $cargos;
    protected $muni;
    public function __construct()
    {
        $this ->empl = new EmpleadosModel();
        $this->cargos = new CargosModel();
        $this->municipios = new MunicipiosModel();
    }
        public function index() 
        {   
            $muni= $this->municipios->obtenerMunicipio();
            $cargos =$this->cargos->obtenerCargos();
            $empl= $this->empl-> obtenerEmpleados();
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Jorge Duran','empl'=>$empl, 'cargos'=>$cargos, 'muni'=>$muni]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/empleados/empleados', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }     

        public function insertar()
        {
            if ($this->request->getMethod() == "post" ) {

                $this->empl->save([
                'nombres' => $this->request->getPost('nombres'),
                'apellidos' => $this->request->getPost('apellidos'),
                'nacimiento' => $this->request->getPost('nacm'),
                'id_cargo' => $this->request->getPost('cargo'),
                'id_municipio' => $this->request->getPost('municipio')
                ]);
                return redirect()->to(base_url('/empleados'));
            }
        }

}
