<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\SalariosModel;
use App\Models\EmpleadosModel;

class Salarios extends BaseController    
{    
    protected $salario;
    protected $empleado;

    public function __construct()
    {
        $this->salario = new SalariosModel();
        $this->empleado = new EmpleadosModel();

    }
        public function index() 
        {    

            $empleado = $this->empleado->traer_empleados('A');                              
            $salario = $this->salario->traer_salarios('A');                               
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Jorge Duran','salarios'=>$salario, 'empl'=>$empleado]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header',$data);
            echo view('/salarios/salarios',$data);

        }   
       
        public function insertar()
        {
            $tp=$this->request->getPost('tp');
            if ($this->request->getMethod() == "post") {
                if ($tp == 1) {
                    $this->salario->save([
                        'id_empleado' => $this->request->getPost('id_empleado'),
                        'salario' => $this->request->getPost('sueldo'),
                        'periodo' => $this->request->getPost('periodo')
                    ]);
                } else {
                    $this->salario->update($this->request->getPost('id'),[                    
                        'id_empleado' => $this->request->getPost('id_empleado'),
                        'salario' => $this->request->getPost('sueldo'),
                        'periodo' => $this->request->getPost('periodo')
                    ]);
                }
                return redirect()->to(base_url('/salarios'));
            }
        }
        

        public function eliminados()
        {
            $empleado = $this->empleado->traer_empleados('E');                              
            $salario = $this->salario->traer_salarios('E'); 
            $data = ['titulo' => 'SALARIOS ELIMINADOS', 'datos' => $salario];
    
            echo view('/principal/header');
            echo view('salarios/eliminados', $data);
        }

    
          public function buscar_salario($id)
          {
              $returnData = array();
              $salario_ = $this->salario->seleccionar_salarios($id, 'A');
              if (!empty($salario_)) {
                  array_push($returnData, $salario_);
              }
              echo json_encode($returnData);
          }
        
        public function eliminar($id,$estado){
            $salario_ = $this->salario->eliminar_salarios($id,$estado);
            return redirect()->to(base_url('/salarios'));
        }       
}
