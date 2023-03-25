<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/css/empleados.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('/js/CambioDinamico.js'); ?>"></script>
    <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>


</head>

<body>

    <div class="tit">
        <h1>Administrar empleados</h1>
    </div>

    <div class="botn">
        <a href="" onclick="seleccionaEmpleado(<?php echo 1 . ',' . 1 ?>);" class="btn btn-success regresar_Btn"
            data-bs-toggle="modal" data-bs-target="#EmpleadosModal">Agregar</a>
        <a href="<?php echo base_url('eliminados_empleados'); ?>" class="btn btn-secondary ">Eliminados</a>
        <a href="<?php echo base_url('/principal'); ?>" class="btn btn-primary regresar_Btn">Regresar</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="90%" cellspacing="0">
            <thead>
                <tr class="table">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Nacimiento</th>
                    <th>Estado</th>
                    <th>Id_municipio</th>
                    <th>Id_cargo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php foreach ($empl as $dato) { ?>
                <tr>
                    <td> <?php echo $dato['id']; ?> </td>
                    <td> <?php echo $dato['nombres']; ?> </td>
                    <td> <?php echo $dato['apellidos']; ?> </td>
                    <td> <?php echo $dato['nacimiento']; ?> </td>
                    <td> <?php echo $dato['estado']; ?> </td>
                    <td> <?php echo $dato['id_municipio']; ?> </td>
                    <td> <?php echo $dato['id_cargo']; ?> </td>
                   
                    <td id="inp_edita" style="height:0.2rem;width:1rem;">
                        <input href="#" onclick="seleccionaEmpleado(<?php echo $dato['id'] . ',' . 2 ?>);"
                            data-bs-toggle="modal" data-bs-target="#EmpleadosModal" type="image"
                            src="<?php echo base_url(); ?>/icons/escritura.png" width="16" height="16"
                            title="Editar Registro">
                        </input>
                    </td>

                    <td style="height:0.2rem;width:1rem;"><input href="#"
                            data-href="<?php echo base_url('/empleados/eliminar') . '/' .$dato['id']. '/' .'E'; ?>"
                            data-bs-toggle="modal" data-bs-target="#modal-confirma" type="image"
                            src="<?php echo base_url(); ?>/icons/borrar.png" width="16" height="16"
                            title="Eliminar Registro">
                        </input>
                    </td>

                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('/Empleados/insertar'); ?>" autocomplete="off">

        <div class="modal fade" id="EmpleadosModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar empleados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombres</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="nombres" id="nombres">
                                <input hidden name="id" id="id">
                            <input hidden name="tp" id="tp">
                        </div>
                        <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">apellidos</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="apellidos" id="apellidos">
                                <input hidden name="id" id="id">
                            <input hidden name="tp" id="tp">
                        </div>
                        <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">Nacimiento</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="nacm" id="nacm">
                                <input hidden name="id" id="id">
                            <input hidden name="tp" id="tp">
                        </div>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="cargo" id="cargo">

                                <option selected>Seleciona un cargo</option>
                                <?php foreach ($cargos as $dato) { ?>
                                <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre'];?></option>

                                <?php } ?>
                            </select>

                        </div>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="municipio" id="municipio">

                                <option selected>Seleciona un municipio</option>
                                <?php foreach ($muni as $dato) { ?>
                                <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre'];?></option>

                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>