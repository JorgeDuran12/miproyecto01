<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/css/login.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>

</head>


<body>

    
    <div class="form">
        
            <img src="<?= ('../img/logo1.png');?>" class="img">

            <div class="cont-form">
                <h5 class="card-title">Login</h5>
                <p class="card-text">

                <form method="POST" action="<?=base_url('login');?>" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="usu">Usuario</label>
                        <input id="usu" class="form-control" type="text" name="usu" required>
                    </div>

                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input id="pass" class="form-control" type="password" name="pass" required>
                    </div>
                    <button class="btn btn-success" type="submit">Iniciar sesión</button>
                </form>
                </p>
            </div>
        </div>

</body>