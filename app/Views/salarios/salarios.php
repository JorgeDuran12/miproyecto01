<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/css/salarios.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url(); ?>/css/jquery-3.6.0.js"></script>
</head>

<div class="tit">
    <h1>Administrar salarios</h1>
</div>

<div class="botn">
    <a href="#" onclick="seleccionaSalario(<?php echo 1 . ',' . 1 ?>);" class="btn btn-success regresar_Btn"
        data-bs-toggle="modal" data-bs-target="#SalariosAgregar">Agregar</a>

    <a href="<?php echo base_url('eliminados_salarios'); ?>" class="btn btn-secondary regresar_Btn">Eliminados</a>

    <a href="<?php echo base_url('/principal'); ?>" class="btn btn-primary regresar_Btn">Regresar</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped" id="dataTable" width="90%" cellspacing="0">
        <thead>
            <tr class="table">
                <th>Id Empleado</th>
                <th>Id salario</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Salario</th>
                <th>Periodo</th>
                <th>estado</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php foreach ($salarios as $dato){ ?>
            <tr>
                <td> <?php echo $dato['id_empleado']; ?></td>
                <td> <?php echo $dato['id']; ?></td>
                <td> <?php echo $dato['N_nombre']; ?></td>
                <td> <?php echo $dato['N_apellido']; ?></td>
                <td> <?php echo $dato['N_cargo']; ?></td>
                <td> <?php echo $dato['sueldo']; ?></td>
                <td> <?php echo $dato['periodo']; ?></td>
                <td> <?php if($dato['estado']=="A"){echo "Activo";}else{echo "Eliminado";}?></td>

                <td id="inp_edita" style="height:0.2rem;width:1rem;">
                    <input href="#" onclick="seleccionaSalario(<?php echo $dato['id'] . ',' . 2 ?>);"
                        data-bs-toggle="modal" data-bs-target="#SalariosAgregar" type="image"
                        src="<?php echo base_url(); ?>/icons/escritura.png" width="16" height="16"
                        title="Editar Registro">
                    </input>
                </td>

                <td style="height:0.2rem;width:1rem;">
                    <input href="#"
                        data-href="<?php echo base_url('/salarios/eliminar') . '/' .$dato['id']. '/' .'E'; ?>"
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


<form method="POST" action="<?php echo base_url('/salarios/insertar'); ?>" autocomplete="on">

    <div class="modal fade" id="SalariosAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar salarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <input hidden name="id" id="id">
                    <input hidden name="tp" id="tp">

                    <div>
                        <span class="input-group-text">Selecione un empleado</span>
                        <select class="form-select" aria-label="Default select example" name="id_empleado"
                            id="id_empleado">
                            <?php foreach ($empl as $data) {?>

                            <option value="<?php echo $data['id']; ?>">

                                <?php echo $data["nombres"];?> <?php echo $data["apellidos"];?>

                            </option>

                            <?php } ?>

                        </select>
                    </div>
                    <br>
                    <div class="input-group input-group-sm mb-3">

                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control"
                            name="sueldo" id="sueldo">
                        <span class="input-group-text">.00</span>

                    </div>

                    <div class="input-group input-group-sm mb-3">

                        <span class="input-group-text" id="inputGroup-sizing-sm">Periodo</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" name="periodo" id="periodo">

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

<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="background: linear-gradient(90deg, #838da0, #b4c1d9);" class="modal-content">
            <div style="text-align:center;" class="modal-header">
                <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">
                    Eliminación de Registro<h5>

            </div>
            <div style="text-align:center;font-weight:bold;" class="modal-body">
                <p>Seguro Desea Eliminar este Registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary close" data-bs-dismiss="modal">No</button>
                <a class="btn btn-danger btn-ok">Si</a>
            </div>
        </div>
    </div>
</div>

<body>

    <script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    function seleccionaSalario(id, tp) {
        if (tp == 2) {
            dataURL = "<?php echo base_url('/salarios/buscar_salario'); ?>" + "/" + id;
            $.ajax({
                type: "POST",
                url: dataURL,
                dataType: "json",
                success: function(rs) {
                    document.getElementById('exampleModalLabel').innerText = "Actualizar salario";
                    $("#tp").val(2);
                    $("#id").val(id);
                    $("#id_empleado").val(rs[0]['iden_empleado']);
                    $("#periodo").val(rs[0]['periodo']);
                    $("#sueldo").val(rs[0]['sueldo']);
                    $("#btn_guardar").text('Actualizar');
                    $("#SalariosAgregar").modal("show");
                }
            })
        } else {
            $("#tp").val(1);
            document.getElementById('exampleModalLabel').innerText = "Agregar salario";
            $("#id_empleado").val('');
            $("#sueldo").val('');
            $("#periodo").val('');
            $("#btn_guardar").text('Guardar');
        }

    };


    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
    </script>