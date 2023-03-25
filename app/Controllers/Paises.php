<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\PaisesModel;

class Paises extends BaseController    
{    
    protected $pais;
    public function __construct()
    {
        $this -> pais = new PaisesModel();
    }
        public function index() 
        {   
            $pais= $this->pais->where('estado', "A")->findAll();         
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Jorge Duran','pais'=>$pais]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/paises/paises', $data);
            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }     

        public function eliminados()
        {
            $pais = $this->pais->where('estado','E')->findAll();
            $data = ['titulo' => 'Paises eliminados','nombre'=>'Jorge Duran', 'datos' => $pais];
            echo view('/principal/header');
            echo view('paises/eliminados', $data);
        }

        public function insertar()
        {
            $tp=$this->request->getPost('tp');
            if ($this->request->getMethod() == "post" ) {
                if($tp ==1){
                    $this->pais->save([    
                        'codigo' => $this->request->getPost('codigo'),          
                        'nombres' => $this->request->getPost('nombre')
                    ]);
                } else{

                    $this->pais->update($this->request->getPost('id'),[
                        'codigo' => $this->request->getPost('codigo'),          
                        'nombres' => $this->request->getPost('nombre')
                    ]);
                }
                return redirect()->to(base_url('/paises'));
                
            } 
    
        }

        public function buscar_Pais($id)
        {
                $returnData = array();
                $pais_ = $this->pais->traer_Pais($id);
                if (!empty($pais_)) {
                    array_push($returnData, $pais_);
                }
                echo json_encode($returnData);
        }

        
        public function eliminar($id,$estado)
        {
            $pais_ = $this->pais->elimina_Pais($id,$estado);
            return redirect()->to(base_url('/paises'));
        }

}