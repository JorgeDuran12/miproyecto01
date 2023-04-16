<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('/css/crear3.css'); ?>">
    <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>

</head>


<body>

    <div class="form">
        <div class="card-form">
            <h5 class="card-title">Crear cuenta</h5>
            <p class="card-text">

            <form method="POST" action="<?php echo base_url('guardar');?>" class="row g-3 needs-validation" novalidate>

                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese su nombre!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese sus apellidos!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Nombre de usuario</label>
                    <div class="input-group has-validation d-flex">
                        <input type="text" class="form-control" id="NombreUsuario" name="NombreUsuario" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese su nombre de usuario!
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese su email o correo electronico!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass" required>
                    <div class="invalid-feedback">
                        Este campo es obligatorio!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="confirmar_Pass" name="confirmar_Pass" required>

                    <div class="invalid-feedback">
                        Debes confirmar la contraseña!
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
            </p>
        </div>
    </div>

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

//Validar contraseñas//
const pass = document.getElementById('pass');
const confirmar_Pass = document.getElementById('confirmar_Pass');

function ValidarContraseñas() {
    if (pass.value === confirmar_Pass.value && confirmar_Pass.value !== "") {
        confirmar_Pass.classList.remove('is-invalid');
        confirmar_Pass.classList.add('is-valid');
    } else {
        confirmar_Pass.classList.remove('is-valid');
        confirmar_Pass.classList.add('is-invalid');
    }
}
pass.addEventListener('input', ValidarContraseñas);
confirmar_Pass.addEventListener('input', ValidarContraseñas);

</script>