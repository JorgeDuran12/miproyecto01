<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/css/empleados.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
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
                    <th>cargo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Paises</th>
                    <th>Departamento</th>
                    <th>municipio</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php foreach ($empl as $dato) { ?>
                <tr>
                    <td> <?php echo $dato['id']; ?> </td>
                    <td> <?php echo $dato['N_cargo']; ?> </td>
                    <td> <?php echo $dato['nombres']; ?> </td>
                    <td> <?php echo $dato['apellidos']; ?> </td>
                    <td> <?php echo $dato['nacimiento']; ?> </td>
                    <td> <?php echo $dato['N_pais']; ?> </td>
                    <td> <?php echo $dato['N_dpto']; ?> </td>
                    <td> <?php echo $dato['N_muni']; ?> </td>
                    <td> <?php echo $dato['estado']; ?> </td>
                   
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
    <form method="POST" action="<?php echo base_url('/Empleados/insertar'); ?>" autocomplete="on">

        <div class="modal fade" id="EmpleadosModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar empleados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <input hidden name="id" id="id">
                        <input hidden name="tp" id="tp">

                        <div>
                            <select class="form-select" aria-label="Default select example" name="pais" id="pais">

                                <option selected>Seleciona un pais</option>
                                <?php foreach ($paises as $dato) { ?>
                                <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombres'];?></option>

                                <?php } ?>
                            </select>

                        </div>
                                    <br>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="dpto" id="dpto">

                                <option selected>Seleciona un departamento</option>
                                <?php foreach ($dpto as $dato) { ?>
                                <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre'];?></option>

                                <?php } ?>
                            </select>

                        </div>
                                    <br>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="municipio" id="municipio">

                                <option selected>Seleciona un municipio</option>
                                <?php foreach ($muni as $dato) { ?>
                                <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre'];?></option>

                                <?php } ?>
                            </select>
                        </div>
                                    <br>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="cargo" id="cargo">

                                <option selected>Seleciona un cargo</option>
                                <?php foreach ($cargos as $dato) { ?>
                                <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre'];?></option>

                                <?php } ?>
                            </select>

                        </div>
                                    <br>
                        <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombres</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="nombres" id="nombres">

                        </div>

                        <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">apellidos</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="apellidos" id="apellidos">

                        </div>

                        <div class="input-group input-group-sm mb-3">

                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de Nacimiento</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" name="nacm" id="nacm">

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

<script>

    //Modal confirma
$('#modal-confirma').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

$('.close').click(function() {
        $("#modal-confirma").modal("hide");
    });

    //Funcion selecciona municipio
function seleccionaEmpleado( id, tp ) {
    if( tp == 2 ) {
        // console.log('actualizando...')

        dataURL = "<?php echo base_url('/empleados/buscar_empleados'); ?>" + "/" + id;
        $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {
                document.getElementById('exampleModalLabel').innerText = "Actualizar empleado";
                $("#tp").val(2);
                $("#id").val(id);
                $("#pais").val(rs[0]['iden_pais']);
                
                llenar_Select(rs[0]['iden_pais'],"dpto",rs[0]['iden_dpto']);
                llenar_Select(rs[0]['iden_dpto'],"municipio",rs[0]['iden_muni']);
                
                $("#nombres").val(rs[0]['nombres']);
                $("#apellidos").val(rs[0]['apellidos']);
                $("#nacm").val(rs[0]['nacimiento']);
                $("#cargo").val(rs[0]['iden_cargo']);
                // $("#").val(rs[0]['']);
                $("#btn_Guardar").text('Actualizar');
                $("#EmpleadosModal").modal("show");
            }
        });

    }else{
        $("#tp").val(1);
        document.getElementById('exampleModalLabel').innerText = "Agregar empleado";
        $("#codigo").val('');
        $("#nombres").val('');
        $("#apellidos").val('');
        $("#nacm").val('');
        $("#cargo").val('');
        $("#municipio").val('');
        // $("#pais").innerText('Seleccione un Pais').attr('selected',true);
        $("#btn_Guardar").text('Guardar');
    }
}

//Select de dpto
$("#pais").on('change', function() {
      pais = $("#pais").val();     
      dataUrl="<?php echo base_url('buscar_departamentoxpais') ?>" + '/' + pais;
      llenar_Select(pais,"dpto",0, dataUrl) 
    });

//Select de municipio
$("#dpto").on('change', function() {
      dpto = $("#dpto").val();           
      dataUrl="<?php echo base_url('buscar_municipioxdepartamento') ?>" + '/' + dpto;
      llenar_Select(dpto,"municipio",0,dataUrl) 
    });

//Funcion para llenar select dinamicamente
function llenar_Select(id,name,id_sel,data){
      $.ajax({
        url: data,
        type: 'POST',
        dataType: 'json',
        success: function(res) {          
        $('#'+name).empty()
           for (let i = 0; i < res[0].length; i++) {
            let id = res[0][i]['id'];
            let nombre = res[0][i]['nombre'];          
             $('#'+name).append("<option value='"+id+"'>"+nombre+"</option>");
          } 
          if(id_sel!=0){$('#'+name).val(id_sel);}
        }
      })
    }
    
</script>
