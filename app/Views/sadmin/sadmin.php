<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/css/mun.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>
</head>

<body>

    <div class="tit">
        <h1>Administrar usuarios</h1>
    </div>

    <div class="botn">
        <a href="" onclick="
        seleccionaMunicipio(<?php echo 1 . ',' . 1 ?>);" class="btn btn-success regresar_Btn" data-bs-toggle="modal" data-bs-target="#MuniModal">Agregar</a>

        <!-- <a href="<?php echo base_url(''); ?>" class="btn btn-secondary">Eliminados</a> -->
        <a href="<?php echo base_url('/principal'); ?>" class="btn btn-primary regresar_Btn">Regresar</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="90%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Usuario</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php foreach ($usuarios as $dato){ ?>
                <tr>
                    <td> <?php echo $dato['id']; ?></td>
                    <td> <?php echo $dato['nombres']; ?></td>
                    <td> <?php echo $dato['apellidos']; ?></td>
                    <td> <?php echo $dato['usuario']; ?></td>
                    <td> <?php echo $dato['cargo']; ?></td>
                    <td> <?php echo $dato['email']; ?></td>
                    <td> <?php if($dato['estado']=="A"){echo "Activo";}else{echo "Eliminado";}?></td>
                    <td>Editar / Borrar</td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>