<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\EmpleadosModel;
use App\Models\CargosModel;
use App\Models\MunicipiosModel;
use App\Models\PaisesModel;
use App\Models\DepartamentosModel;

class Empleados extends BaseController    
{    
    protected $empl;
    protected $cargos;
    protected $muni;
    protected $pais;
    protected $dpto;
    public function __construct()
    {
        $this ->dpto = new DepartamentosModel();
        $this ->pais = new PaisesModel();
        $this ->empl = new EmpleadosModel();
        $this->cargos = new CargosModel();
        $this->municipios = new MunicipiosModel();
    }
        public function index() 
        {   
            $pais= $this->pais->obtenerPais();
            $dpto= $this->dpto->obtenerDept();
            $muni= $this->municipios->traer_municipios('A');
            $cargos =$this->cargos->obtenerCargos();
            $empl= $this->empl->traer_empleados('A');
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Jorge Duran','empl'=>$empl, 'cargos'=>$cargos, 'muni'=>$muni, 'paises'=>$pais, 'dpto'=>$dpto]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/empleados/empleados', $data);
           //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }

            // public function eliminados()
            // {
            //     $empl = $this->empl->traer_empleados('E');
            //     $data = ['titulo' => 'Paises eliminados','nombre'=>'Jorge Duran', 'datos' => $empl];
            //     echo view('/principal/header');
            //     echo view('empleados/eliminados', $data);
            // }

            public function insertar()
            {
            
                $tp=$this->request->getPost('tp');
            
                if ($this->request->getMethod() == "post" ) {
                    if($tp ==1){
                        $this->empl->save([    
                            'nombres' => $this->request->getPost('nombres'),
                            'apellidos' => $this->request->getPost('apellidos'),
                            'nacimiento' => $this->request->getPost('nacm'),
                            'id_cargo' => $this->request->getPost('cargo'),
                            'id_municipio' => $this->request->getPost('municipio')
                        ]);
                    } else{
                        $this->empl->update($this->request->getPost('id'),[         
                            'nombres' => $this->request->getPost('nombres'),
                            'apellidos' => $this->request->getPost('apellidos'),
                            'nacimiento' => $this->request->getPost('nacm'),
                            'id_cargo' => $this->request->getPost('cargo'),
                            'id_municipio' => $this->request->getPost('municipio')
                        ]);
                    }
                    return redirect()->to(base_url('/empleados'));   
                } 
            }

            public function buscar_empleados($id)
            {
                    $returnData = array();
                    $empl_ = $this->empl->seleccionar_Empleado($id, 'A');
                    if (!empty($empl_)) {
                        array_push($returnData, $empl_);
                    }
                    echo json_encode($returnData);
            }

            public function eliminar($id,$estado)
            {
                $empl_ = $this->empl->eliminar_empl($id,$estado);
                return redirect()->to(base_url('/empleados'));
            }
}
