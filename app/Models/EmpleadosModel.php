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

    // public function obtenerEmpleados(){
    //  $this->select('empleados.*');
    //  $this->where('estado', 'A');
    //   $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
    //   return $datos;
    //  }

    
    public function traer_empleados($estado){
        $this->select('empleados.*, municipios.nombre as N_muni, cargos.nombre as N_cargo, departamentos.nombre as N_dpto, paises.nombres as N_pais, cargos.nombre as N_cargo');
        $this->join('municipios','empleados.id_municipio = municipios.id');
        $this->join('departamentos', 'municipios.id_dpto = departamentos.id');
        $this->join('paises', 'departamentos.id_pais = paises.id');
        $this->join('cargos', 'empleados.id_cargo = cargos.id');
        $this->where('empleados.estado',$estado);
        $datos = $this->findAll();
        return $datos;
    } 
    
    public function seleccionar_Empleado($id,$estado){
        $this->select('empleados.*,empleados.id_municipio as iden_muni, municipios.id_dpto as iden_dpto,paises.id as iden_pais, cargos.id as iden_cargo');
        $this -> join('cargos','empleados.id_cargo=cargos.id');
        $this -> join('municipios','empleados.id_municipio=municipios.id');
        $this -> join('departamentos','municipios.id_dpto=departamentos.id');
        $this -> join('paises','departamentos.id_pais=paises.id');
        $this->where('empleados.id',$id);
        $this ->where('empleados.estado',$estado);
        $datos = $this->first();           
        return $datos;
    }
    
    public function eliminar_empl($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }
    
}