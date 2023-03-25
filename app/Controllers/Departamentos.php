<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\DepartamentosModel;
use App\Models\PaisesModel;

class Departamentos extends BaseController    
{    
    protected $pais;
    protected $dept;
    public function __construct()
    {
        $this -> dept = new DepartamentosModel();
        $this -> pais = new PaisesModel();
    }
        public function index() 
        {   

            $dept= $this->dept->obtenerDept();         
            $pais= $this->pais->obtenerPais();         
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Jorge Duran','dept'=>$dept, 'paises'=>$pais]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/departamentos/departamentos', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }

        public function eliminados()
        {
            $dept = $this->dept->where('estado','E')->findAll();
            $data = ['titulo' => 'Departamentos eliminados','nombre'=>'Jorge Duran', 'datos' => $dept];
            echo view('/principal/header');
            echo view('departamentos/eliminados', $data);
        }

        public function insertar()
        {
            $tp=$this->request->getPost('tp');
            if ($this->request->getMethod() == "post" ) {
                if($tp ==1){
                    $this->dept->save([    
                        'id_pais' => $this->request->getPost('pais'),
                        'nombre' => $this->request->getPost('nombre_dpto')

                    ]);
                } else{
                    $this->dept->update($this->request->getPost('id'),[         
                        'id_pais' => $this->request->getPost('pais'),
                        'nombre' => $this->request->getPost('nombre_dpto')

                    ]);
                }
                return redirect()->to(base_url('/departamentos'));   
            } 
        }

        public function buscar_dpto($id)
        {
                $returnData = array();
                $dept_ = $this->dept->traer_Dpto($id);
                if (!empty($dept_)) {
                    array_push($returnData, $dept_);
                }
                echo json_encode($returnData);
        }

        public function eliminar($id,$estado)
        {
            $dept_ = $this->dept->elimina_Dpto($id,$estado);
            return redirect()->to(base_url('/departamentos'));
        }

        public function buscar_DepartamentosPais($id)
        {
        $returnData = array();
        $dept = $this->dept->traer_DepartamentosPais($id,'A');
        if (!empty($dept)) {
            array_push($returnData, $dept);
        }
        echo json_encode($returnData);
        }
}
