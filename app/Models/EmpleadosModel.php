<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class EmpleadosModel extends Model{
    protected $table= 'empleados'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hayas eliminacion fisica de registro */

    protected $allowedFields = ['nombres', 'apellidos', 'nacimiento','estado','id_cargo','id_municipio']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = ''; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerEmpleados(){
     $this->select('empleados.*');
     $this->where('estado', 'A');
      $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
      return $datos;
     }

    
    // public function update($nombre, $id){
    //     $this->update('cargos');
    //     $this->set('nombre', $nombre);
    //     $this->where('id_cargo', $id);
    // } 
    //  public function buscaEmple($id){
    //    $this->select('empleados.*, empleados.nombre as NewName');
    //    $this->join('municipios', 'municipios.id = empleados.id_municipio');
    //     $this->where('empleados.estado', 'A');
    //    $datos = $this->findAll();  // nos trae el registro que cumpla con una condicion dada 
    //      return $datos;
    // }
 
}