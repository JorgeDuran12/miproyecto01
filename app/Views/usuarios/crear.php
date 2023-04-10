<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/css/crear.css'); ?>">
    <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">

</head>


<body>

    <form method="POST" action="<?php echo base_url('guardar');?>" class="row g-3 needs-validation" novalidate>


        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            <div class="invalid-feedback">
                por favor, ingrese su nombre!
            </div>
        </div>

        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
            <div class="invalid-feedback">
                por favor, ingrese sus apellidos!
            </div>
        </div>

        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Nombre de usuario</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="NombreUsuario" name="NombreUsuario"
                    aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    por favor, ingrese su nombre de usuario!
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">
                por favor, ingrese su email o correo electronico!
            </div>
        </div>

        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
            <div class="invalid-feedback">
                Este campo es obligatorio!
            </div>
        </div>

        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            <div class="invalid-feedback">
            Debes confirmar la contraseña!
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-success" type="submit">Guardar</button>
        </div>
    </form>

</body>

<script>
        
    (function() {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()


    function validateForm() {
        var password = document.getElementById("pass");
        var confirmPassword = document.getElementById("confirmPassword");

        if (password.value != confirmPassword.value) {
        confirmPassword.setCustomValidity("Las contraseñas no coinciden.");
        } else {
        confirmPassword.setCustomValidity("");
        }
    }
    var form = document.querySelector('.needs-validation');
    form.addEventListener('submit', validateForm);

</script>
