<?php
include ('app/config.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IESTP "Mario Gutiérrez López"
Mesa de Partes
</title>
    <link rel="icon" href="<?=APP_URL;?>/public/dist/img/logo.ico" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">
  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background: url('<?=APP_URL;?>/public/dist/img/background.png') no-repeat center center fixed;
      background-size: cover;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a style="font-size: 38px; font-weight: bold; color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"><b>IESTP "Mario Gutiérrez López"
Mesa de Partes

</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      
    <p style="font-size:20px;font-weight:bold" class="login-box-msg">Inicio como Administrador</p>
    <div class="btn-group btn-block">
      <a href="index_usuario.php" class="btn btn-primary ">USUARIO</a>
        <a href="index.php" class="btn btn-primary ">ADMINISTRADOR</a>
      </div>
      <hr>
      <form action="app/controllers/login/controller-login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Usuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <hr>
        <div class="input-group mb-3">
          <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
        </div>
      </form>
      <div class="row">
        <div class="col-12">
          <a href="<?=APP_URL;?>/login/recuperar_contrasena.php" class="btn btn-link">Olvidé mi contraseña</a>
        </div>
      </div>
      <?php
      session_start();
      if (isset($_SESSION['mensaje'])){
          $mensaje = $_SESSION['mensaje'];
          ?>
          <script>
              Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "El usuario o contraseña son incorrectos",
                  showConfirmButton: false,
                  timer: 1400
              });
          </script>
      <?php
          session_destroy();
      }
      ?> 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=APP_URL;?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
include ('layout/mensajes.php');

?>