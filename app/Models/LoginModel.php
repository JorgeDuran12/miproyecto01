<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class LoginModel extends Model{
    protected $table= 'usuarios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_cargo','nombres', 'apellidos','contraseña','nombre_usuario','estado','fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;



    // public function Validar_Usuario($nombre_usuario, $contraseña) {
    //     $this->select('usuarios.*');
    //     $this->where('username', $nombre_usuario);
    //     $this->where('password', $contraseña);

    //     if ($query->num_rows() == 1) {
    //         return true; // El usuario y la contraseña son válidos
    //     } else {
    //         return false; // El usuario y/o la contraseña son incorrectos
    //     }
    // }



}