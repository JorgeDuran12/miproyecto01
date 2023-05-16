<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table= 'usuarios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_cargo','nombres', 'apellidos','pass','usuario','estado','email', 'fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function buscacargo(){
        $this->select('usuarios.*, cargos.nombre as cargo');
        $this->join('cargos', 'usuarios.id_cargo = cargos.id ');
        $this->where('usuarios.estado', 'A');
        $datos = $this->findAll();   
        return $datos;
      }

      
      public function Auth_usuario($nombreCorto)
      {
        $this->select('usuarios.*');
        $this->where('usuario', $nombreCorto);
        $datos = $this->first();
          return $datos;

          // o puedes agregar esto == "return $this->where('nombre_corto', $nombreCorto)->first();"//
      }

}
