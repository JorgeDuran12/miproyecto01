<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class MunicipiosModel extends Model
{
    protected $table= 'municipios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_dpto','nombre','estado']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = ''; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;
    

    // public function obtenerMunicipio(){
    // $this->select('municipios.*');
    // $this->where('estado', 'A');
    // $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
    // return $datos;
    //  }

    // public function traer_Muni($id){
    //     $this-> select('municipios.*');
    //     $this->where('id',$id);
    //     $datos = $this->first();
    //     return $datos;
    // }

    public function eliminar_muni($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }
    
    public function traer_municipios($estado){
        $this->select('municipios.*,departamentos.nombre as nom_dpto , paises.nombres as nom_pais');
        $this->join('departamentos','municipios.id_dpto=departamentos.id');
        $this->join('paises','departamentos.id_pais=paises.id');
        $this->where('municipios.estado',$estado);
        $datos = $this->findAll();
        return $datos;
    } 
    
    public function seleccionar_Municipio($id,$estado){
        $this->select('municipios.*,municipios.id_dpto as iden_dpto,paises.id as iden_pais');
        $this->join('departamentos','municipios.id_dpto=departamentos.id');
        $this->join('paises','departamentos.id_pais=paises.id');
        $this->where('municipios.id',$id);
        $this->where('municipios.estado',$estado);
        $datos = $this->first();           
        return $datos;
    }
    
}