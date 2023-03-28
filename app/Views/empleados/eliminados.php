<head>
  <meta charset="utf-8" />
  <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>
  <link rel="stylesheet" href="<?php echo base_url('/css/eliminados.css'); ?>">
</head>

<body>

  <div class="card" style="width:72rem;">
    <div class="tit">
      <h1 class="titulo_Vista">Empleados Eliminados</h1>
    </div>

    <div class="card-body">

      <div class="row col-sm-12" >
        <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-5">
        </div>
        <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-2">        
          <a href="<?php echo base_url('/empleados'); ?>" class="btn btn-primary regresar_Btn">Regresar</a>
        </div>
      </div>

      <br>

      <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="font-family:Arial;font-size:12px;text-align:center;">
                    <th>Id</th>
                    <th>cargo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Paises</th>
                    <th>Departamento</th>
                    <th>municipio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
            </tr>
          </thead>
          <tbody style="font-family:Arial;font-size:12px;">
            <?php foreach ($datos as $dato) { ?>
              <tr>
                    <td> <?php echo $dato['id']; ?> </td>
                    <td> <?php echo $dato['N_cargo']; ?> </td>
                    <td> <?php echo $dato['nombres']; ?> </td>
                    <td> <?php echo $dato['apellidos']; ?> </td>
                    <td> <?php echo $dato['nacimiento']; ?> </td>
                    <td> <?php echo $dato['N_pais']; ?> </td>
                    <td> <?php echo $dato['N_dpto']; ?> </td>
                    <td> <?php echo $dato['N_muni']; ?> </td>
                    <td>  <?php if($dato['estado']=="E"){echo "ELIMINADO";}else{echo "Eliminado";}?></td>

                <td style="heighdato.2rem;width:1rem;">
                  <input href="#" data-href="<?php echo base_url('/empleados/eliminar') . '/' .$dato['id']. '/' .'A'; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" type="image" src="<?php echo base_url(); ?>/icons/arrow-clockwise.svg" width="16" height="16" title="Activar Registro">
                  </input>  
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      
      <!-- Modal Confirma Eliminar -->
      <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: linear-gradient(90deg, #838da0, #b4c1d9);" class="modal-content">
                <div style="text-align:center;" class="modal-header">
                    <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Activación de Registro</h5>
                    
                </div>
                <div style="text-align:center;font-weight:bold;" class="modal-body">
                    <p>Seguro Desea Activar éste Registro?</p>
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
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  
  function eliminarMuni(id) {     
      $("#id").val(id);
      dataURL = "<?php echo base_url('eliminar_empl'); ?>" + "/" + id + "/" + 'A';
      $.ajax({
        type: "POST",
        url: dataURL,
        dataType: "json",
        success: function(rs) {
        },
        error: function() {
                alert("No se ha Podido Activar El Registro");
            }
      })

  };
 
  $('.close').click(function() {$("#modal-confirma").modal("hide");});
  
</script>