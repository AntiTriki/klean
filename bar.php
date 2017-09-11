<?php
session_name('nilds');
session_start();
include_once('tipo.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="css/jtable_jqueryui.min.css" rel="stylesheet" type="text/css" />
    <!--	<link href="themes\lightcolor\gray\jtable.min.css" rel="stylesheet" type="text/css" />-->
    <link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="css/modern-business.css">
    <!-- <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script> -->
    <link rel="stylesheet" href="themes\metro\blue\jtable.min.css">
    <link rel="stylesheet" href="css/mainp2.css">
    <style media="screen">
    .profile-img{
  margin-top: -8px;
  margin-right: 5px;
  float: left;
background: url('<?php echo $_SESSION["logo"]; ?>') 50% 50% no-repeat;
  background-size: auto 100%;
  width: 35px;
  height: 35px;
  }
  a.dropdown-toggle { width: 250px; }
  .navbar-toggle.navbar-left {
    float: left;
    margin-left: 10px;
  }
  html, body {
  height: 100%;
  }

  .navbar-toggle {
  float: left;
  margin-left: 15px;
  }

  .navmenu {
  z-index: 1;
  }

  .canvas {
  position: relative;
  left: 0;
  z-index: 2;
min-height: 100%;
  padding:  0 0 0;
  background: #fff;
  }
.carousel.slide.canvas{
  min-height: auto;
}
  @media (min-width: 0) {
  .navbar-toggle {
    display: block; /* force showing the toggle */
  }
  }

  @media (min-width: 992px) {
  body {

  }
  .navbar {


  }
  .canvas {

  }
  }
  .navmenu-fixed-left{
    position: fixed;

    top: 50px;
    bottom: 0;
    overflow-y: auto;
    border-radius: 0;
  }
  </style>
</head>

<body>
    <div id="navbar-auto-hidden" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
              <?php if (isset($_SESSION['name'])){ ?>
<!--                <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">-->
<!--                         <span class="icon-bar"></span>-->
<!--                             <span class="icon-bar"></span>-->
<!--                             <span class="icon-bar"></span>-->
<!---->
<!--                </button>-->
        <?php } ?>


                <a href="index.php" class="navbar-brand">ERP</a>



            </div>
            <div class="collapse navbar-collapse" id="nav-collapse">

                <?php
if (isset($_SESSION['name'])){
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="img-thumbnail profile-img"></div>


                            <strong ><?php echo $_SESSION["name"] ; ?></strong>
<!--20 caracteres de nombre en el a href -->
                            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <div class="img-thumbnail profile-img" ></div>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left"><strong></strong></p>
                                            <p class="text-left small"><?php echo $_SESSION["correo"]; ?></p>
                                            <p class="text-left">
                                                <a href="#" class="btn btn-primary btn-block btn-sm">Profile</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider navbar-login-session-bg"></li>
                            <li><a href="#">Configuracion de Cuenta <span class="glyphicon glyphicon-cog pull-right"></span></a></li>

                            <li class="divider"></li>
                            <li><a href="logout.php?logout">Salir <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                        </ul>
                    </li>
                </ul>
              <?php }?>
            </div>
        </div>
    </div>
    <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <br>
                <div class="bs-example bs-example-tabs">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active"><a href="#signin" data-toggle="tab">Sesion</a></li>
                        <li class=""><a href="#signup" data-toggle="tab">Nuevo?</a></li>
                        <li class=""><a href="#why" data-toggle="tab">Empresarial</a></li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in" id="why">
                            <p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>
                            <p></p><br> Please contact
                            <a mailto:href="JoeSixPack@Sixpacksrus.com"></a> for any other inquiries.
                        </div>
                        <div class="tab-pane fade active in" id="signin">
                            <form class="form-horizontal" action="signin.php" method="post">
                                <fieldset>
                                    <!-- Sign In Form -->
                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="userid">Correo:</label>
                                        <div class="controls">
                                            <input required="" id="userid" name="correo" type="text" class="form-control"  >
                                        </div>
                                    </div>

                                    <!-- Password input-->
                                    <div class="control-group">
                                        <label class="control-label" for="passwordinput">Contrasena:</label>
                                        <div class="controls">
                                            <input required="" id="passwordinput" name="contra" class="form-control input-medium" type="password"  >
                                        </div>
                                    </div>

                                    <!-- Multiple Checkboxes (inline) -->
                                    <div class="control-group">
                                        <label class="control-label" for="rememberme"></label>
                                        <div class="controls">

                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="control-group">
                                        <label class="control-label" for="signin"></label>
                                        <div class="controls">
                                            <button id="signinn" type="submit" name="signin" class="btn btn-success">Ingresar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="signup">
                            <form id="form" class="form-horizontal" >
                                <fieldset>
                                    <!-- Sign Up Form -->
                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="Email">Correo:</label>
                                        <div class="controls">
                                            <input id="Email" name="correo" class="form-control input-large" type="text" placeholder="ejemplo@ejemplo.com"  required="">
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="userid">Nombre:</label>
                                        <div class="controls">
                                            <input id="useridd" name="nombre" class="form-control" type="text" placeholder="Nombre" required >
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="usrid">Apellidos:</label>
                                        <div class="controls">
                                            <input id="usridd" name="apellido" class="form-control" type="text" placeholder="Apellidos" required >
                                        </div>
                                    </div>
                                    <!-- Password input-->
                                    <div class="control-group">
                                        <label class="control-label" for="password">Contrasena:</label>
                                        <div class="controls">
                                            <input id="password" name="password" class="form-control" type="password" placeholder="********" required >
                                            <em>1-8 Caracteres</em>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="reenterpassword">Confirmar Contrasena:</label>
                                        <div class="controls">
                                            <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********"  required>
                                        </div>
                                    </div>

                                    <!-- Multiple Radios (inline) -->
                                    <br>


                                    <!-- Button -->
                                    <div class="control-group">
                                        <label class="control-label" for="confirmsignup"></label>
                                        <div class="controls">
                                            <button id="confirmar" name="confirmsignup" class="btn btn-success">Crear Cuenta</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <?php
if (isset($_SESSION['name'])){
    ?>
    <div class="navmenu navmenu-default navmenu-fixed-left" style="width:200px">

      <ul class="nav navmenu-nav">
        <li class="visible-xs">
            <a >
                <!-- The Profile picture inserted via div class below, with shaping provided by Bootstrap -->
                <div class="img-rounded profile-img"></div>
                <?php echo  $_SESSION['name'];?>
            </a>



        </li>
        <li class="visible-xs">
            <a href="#">Settings</a>
        </li>
        <li role="separator" class="divider visible-xs"></li>
        <?php
    if (isset($_SESSION['nombre_empresa'])){
        ?>

        <li>
            <a href="prod_emp.php">Mis productos</a>
        </li>
        <?php }else{ ?>
          <li>
              <a href="empresas.php" >Empresas</a>
          </li>
        <?php } ?>
        <li class="visible-xs">
            <a href="logout.php?logout">Salir</a>
        </li>

      </ul>

    </div>


    <?php
  }?>
    <!-- <script src="js/jquery.js" charset="utf-8"></script> -->

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/jquery.jtable.min.js" type="text/javascript"></script>

    <!--<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>-->


    <script src="localization/jquery.jtable.es.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="js/jquery.validationEngine-es.js"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>



</body>


</html>
