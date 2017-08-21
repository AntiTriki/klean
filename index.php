<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<style>
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 30px white inset;

}
</style>
</head>
<body>
  <div class="text-center" style="padding:50px 0">
    <div class="logo">login</div>
    <!-- Main Form -->
    <div class="login-form-1">
      <form id="login-form" class="text-left" action="signin.php">
        <div class="login-form-main-message"></div>
        <div class="main-login-form">
          <div class="login-group">
            <div class="form-group">
              <label for="lg_username" class="sr-only">Usuario</label>
              <input type="email" class="form-control" id="lg_username" name="correo" placeholder="username">
            </div>
            <div class="form-group">
              <label for="lg_password" class="sr-only">Contrasena</label>
              <input type="password" class="form-control" id="lg_password" name="contra" placeholder="password">
            </div>
            <div class="form-group login-group-checkbox">
              <input type="checkbox" id="lg_remember" name="lg_remember">
              <label for="lg_remember">remember</label>
            </div>
          </div>
          <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
        </div>
        <div class="etc-login-form">

          <p><a href="#">Crear nuevo usuario</a></p>
        </div>
      </form>
    </div>
    <!-- end:Main Form -->
  </div>
  <script src="js/jquery.js" charset="utf-8"></script>
  <script src="js/main.js" charset="utf-8"></script>
  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>


</body>
</html>
