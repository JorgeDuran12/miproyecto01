<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class DepartamentosModel extends Model{
    protected $table= 'departamentos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre','estado','id_pais','fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerDept(){
     $this->select('departamentos.*');
     $this->where('estado', 'A');
    $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
       return $datos;
     }

     public function traer_Dpto($id){
      $this -> select('departamentos.*');
      $this->where('id',$id);
      $datos = $this->first();
      return $datos;
    }

    public function elimina_Dpto($id,$estado){
    $datos = $this->update($id, ['estado' => $estado]);         
    return $datos;
    }

    public function traer_DepartamentosPais($id,$estado){
      $this->select('departamentos.*');   
      $this->where('departamentos.id_pais', $id);     
      $this->where('departamentos.estado', $estado);
      $this->orderBY('departamentos.nombre');
      $datos = $this->findAll();         
      return $datos;
  }

}
