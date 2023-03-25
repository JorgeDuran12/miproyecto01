<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/css/pais1.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>

    <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>

</head>

<body>

    <div class="tit">
        <h1>Administrar Paises</h1>
    </div>

    <div class="botn">
        <a href="" onclick="seleccionaPais(<?php echo 1 . ',' . 1 ?>);" class="btn btn-success regresar_Btn"
            data-bs-toggle="modal" data-bs-target="#PaisModal">Agregar</a>
        <a href="<?php echo base_url('eliminados_paises'); ?>" class="btn btn-secondary ">Eliminados</a>
        <a href="<?php echo base_url('/principal'); ?>" class="btn btn-primary regresar_Btn">Regresar</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="90%" cellspacing="0">
            <thead>
                <tr class="table">
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>

            </thead>
            <tbody class="tbody">
                <?php foreach ($pais as $dato) { ?>
                <tr>
                    <td> <?php echo $dato['id']; ?> </td>
                    <td> <?php echo $dato['codigo']; ?> </td>
                    <td> <?php echo $dato['nombres']; ?> </td>
                    <td> <?php echo $dato['estado']; ?> </td>

                    <td id="inp_edita" style="height:0.2rem;width:1rem;">
                        <input href="#" onclick="seleccionaPais(<?php echo $dato['id'] . ',' . 2 ?>);"
                            data-bs-toggle="modal" data-bs-target="#PaisModal" type="image"
                            src="<?php echo base_url(); ?>/icons/escritura.png" width="16" height="16"
                            title="Editar Registro">
                        </input>
                    </td>
                    <td style="height:0.2rem;width:1rem;"><input href="#"
                            data-href="<?php echo base_url('/paises/eliminar') . '/' .$dato['id']. '/' .'E'; ?>"
                            data-bs-toggle="modal" data-bs-target="#modal-confirma" type="image"
                            src="<?php echo base_url(); ?>/icons/borrar.png" width="16" height="16"
                            title="Eliminar Registro"></input></td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('/paises/insertar'); ?>" autocomplete="off">

        <div class="modal fade" id="PaisModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar paises</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Codigo</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="codigo" id="codigo">
                            <input hidden name="tp" id="tp">
                            <input hidden name="id" id="id">


                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="nombre" id="nombre">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary" id="btn_Guardar">Guardar</button>
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
                    <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title"
                        id="exampleModalLabel">Eliminación de Registro<h5>

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
</body>
<!-- Script JS -->
<script>
$('#modal-confirma').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

function seleccionaPais(id, tp) {
    if (tp == 2) {
        dataURL = "<?php echo base_url('/paises/buscar_Pais'); ?>" + "/" + id;
        $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {
                document.getElementById('exampleModalLabel').innerText = "Actualizar pais";
                $("#tp").val(2);
                $("#id").val(id);
                $("#codigo").val(rs[0]['codigo']);
                $("#nombre").val(rs[0]['nombres']);
                $("#btn_Guardar").text('Actualizar');
                $("#paisModal").modal("show");
            }
        })
    } else {
        $("#tp").val(1);
        document.getElementById('exampleModalLabel').innerText = "Agregar Pais";
        $("#codigo").val('');
        $("#nombre").val('');
        $("#btn_Guardar").text('Guardar');

    }
};
    $('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });
</script>