<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/css/login.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>

</head>


<body class="all">

    <header>
        <!-- <img src="<?php echo base_url('./img/logo1.png');?>" class="img1"> -->
        <div class="titulos">
            <h1><?php echo $Title;?></h1>
            <!-- <a href="https://sena.territorio.la/cms/index.php" target="_blank"> -->
                <!-- <img src="<?php echo base_url('./img/sena.png');?>" class="img2"> -->
            <!-- </a> -->
        </div>
    </header>

    <div class="form">

        <div id="cont-form">

            <form method="POST" action="<?php echo base_url('login/validar'); ?>">
                <label for="usuario">Usuario:</label>
                <input type="text" id="user" name="user" required>

                <label for="contraseña">Contraseña:</label>
                <input type="password" id="pass" name="pass" required>

                <button type="submit">Iniciar sesión</button>
            </form>

        </div>

    </div>

</body>