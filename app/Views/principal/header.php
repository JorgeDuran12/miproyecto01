<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?> ">
    <script rel="stylesheet" src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?> "></script>
    <link rel="stylesheet" href="<?php echo base_url('/css/header1.css'); ?> ">
</head>
<header>
    <img src="<?php echo base_url('./img/logo1.png');?>" class="img1">
    <div class="titulos">
        <h1><?php echo "Proyecto taller";?></h1>
        <h3><?php echo "Jorge Duran";?></h3>
    </div>
    <a href="https://sena.territorio.la/cms/index.php" target="_blank">
        <img src="<?php echo base_url('./img/sena.png');?>" class="img2">
    </a>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Ubicacion
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('/paises'); ?>">Pais</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/departamentos'); ?>">Departamentos</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/municipios'); ?>">Municipios</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/cargos'); ?>">Cargos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Empleados
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('/empleados'); ?>">Administrar</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/salarios'); ?>">Salarios</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/sadmin'); ?>">Usuarios</a>
                </li>
            </ul>
        </div>
        <a class="btn btn-warning" href="<?=('cerrar_sesion') ?>" role="button">Cerrar sesión</a>
    </div>
</nav>