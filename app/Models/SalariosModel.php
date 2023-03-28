<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models
use CodeIgniter\Model;

class SalariosModel extends Model{
    protected $table      = 'salarios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['periodo','id_empleado','sueldo', 'estado']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = ''; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;
 

    public function traer_salarios($estado){
      $this->select('salarios.*, cargos.nombre as N_cargo, empleados.nombres as N_nombre, empleados.apellidos as N_apellido');
      $this->join('empleados','salarios.id_empleado=empleados.id');
      $this->join('cargos','empleados.id_cargo=cargos.id');
      $this->where('salarios.estado', 'A');
      $datos = $this->findAll();
      return $datos;
  } 

  public function seleccionar_salarios($id,$estado){
    $this->select('salarios.*, salarios.id_empleado as iden_empleado, empleados.nombres as N_nombre, empleados.apellidos as N_apellido');
    $this -> join('empleados','salarios.id_empleado=empleados.id');
    // $this -> join('','');
    $this->where('salarios.id',$id);
    $this->where('salarios.estado', 'A');
    $this->listar;
    $datos = $this->first();           
    return $datos;
  }

  public function traer_salariosEliminados($estado){
    $this->select('salarios.*, cargos.nombre as N_cargo, empleados.nombres as N_nombre, empleados.apellidos as N_apellido');
    $this->join('empleados','salarios.id_empleado=empleados.id');
    $this->join('cargos','empleados.id_cargo=cargos.id');
    $this->where('salarios.estado', 'E');
    $datos = $this->findAll();
    return $datos;
  }
  
  public function eliminar_salarios($id,$estado){
    $datos = $this->update($id, ['estado' => $estado]);         
    return $datos;
  }

}   




