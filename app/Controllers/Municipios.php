<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MunicipiosModel;
use App\Models\DepartamentosModel;
use App\Models\PaisesModel;


class Municipios extends BaseController    
{    
    protected $muni;
    protected $dpto;
    protected $pais;

    public function __construct()
    {
        $this -> muni = new MunicipiosModel();
        $this -> dpto = new DepartamentosModel();
        $this -> pais = new PaisesModel();
    }
        public function index() 
        {   
            $muni= $this->muni->traer_municipios('A');
            $dpto= $this->dpto->obtenerDept();
            $pais=$this->pais->obtenerPais();
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Jorge Duran','muni'=>$muni, 'departamentos'=>$dpto, 'pais'=>$pais]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/municipios/municipios', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }

        
        public function eliminados()
        {
            $muni = $this->muni->traer_municipios('E');
            $data = ['titulo' => 'Municipios eliminados','nombre'=>'Jorge Duran', 'datos' => $muni];
            echo view('/principal/header');
            echo view('municipios/eliminados', $data);
        }

        public function insertar()
        {
            $tp=$this->request->getPost('tp');
            if ($this->request->getMethod() == "post" ) {
                if($tp ==1){
                    $this->muni->save([    
                        'id_dpto'=> $this->request ->getPost('dpto'),
                        'nombre' => $this->request->getPost('muni')
                    ]);
                } else{
                    $this->muni->update($this->request->getPost('id'),[         
                        'id_dpto' => $this->request->getPost('dpto'),
                        'nombre' => $this->request->getPost('muni')
                    ]);
                }
                return redirect()->to(base_url('/municipios'));   
            } 
        }


        public function buscar_municipio($id)
        {
                $returnData = array();
                $muni_ = $this->muni->seleccionar_Municipio($id, 'A');
                if (!empty($muni_)) {
                    array_push($returnData, $muni_);
                }
                echo json_encode($returnData);
        }


        public function eliminar($id,$estado)
        {
            $muni_ = $this->muni->eliminar_muni($id,$estado);
            return redirect()->to(base_url('/municipios'));
        }
        
        
}

