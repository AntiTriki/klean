<?php
session_name('nilds');
session_start();
include_once('tipo.php');
if(isset($_SESSION['id_emp']))
{

unset($_SESSION['id_emp']);
unset($_SESSION['nombreemp']);
}
?>
<html>
  <head>
<!--  <link href="css/metro/crimson/jtable.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/family Exo 100 200 400.css">
<link rel="stylesheet" href="css/family Source Sans Pro 700 400 300.css">
    scripts
<script src="js/jquery-1.8.2.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
<script src="js/jquery.jtable.js" type="text/javascript"></script>
<script src="js/script.js"></script>
<script src="js/jquery.jtable.es.js" type="text/javascript"></script>
<script src="js/prefixfree.min.js" type="text/javascript"></script>-->

	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/jquery.jtable.min.js" type="text/javascript"></script>

	<!--<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>-->


    <script src="localization/jquery.jtable.es.js" type="text/javascript"></script>
	<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<link href="css/jtable_jqueryui.min.css" rel="stylesheet" type="text/css" />
<!--	<link href="themes\lightcolor\gray\jtable.min.css" rel="stylesheet" type="text/css" />-->
	<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/mainp2.css">
      <link rel="stylesheet" href="themes\metro\blue\jtable.min.css">
<!--	<link href="Scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />-->
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
          button, input, optgroup, select, textarea {

              color: #000000;
          }
      </style>
<!-- Import Javascript files for validation engine (in Head section of HTML) -->
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-es.js"></script>
      <script src="js/bootstrap.min.js" charset="utf-8"></script>
      onkeypress='return event.charCode >= 48 && event.charCode <= 57'
  </head>
  <body>
  <div id="navbar-auto-hidden" class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
          <div class="navbar-header">
              <?php if (isset($_SESSION['name'])){ ?>

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
  <div class="container" style="padding-top: 100px">
      <div id="Productos" style="width: 60%;margin:auto"></div>
  </div>
  <!-- <script>
      $(document).ready(function() {
          var x = document.getElementsByName("nit");
          x.keydown(function (e) {
              // Allow: backspace, delete, tab, escape, enter and .
              if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                  // Allow: Ctrl+A, Command+A
                  (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                  // Allow: home, end, left, right, down, up
                  (e.keyCode >= 35 && e.keyCode <= 40)) {
                  // let it happen, don't do anything
                  return;
              }
              // Ensure that it is a number and stop the keypress
              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                  e.preventDefault();
              }
          });
      });

  </script> -->
	<script type="text/javascript">
    $(document).ready(function () {
        $('#Productos').jtable({
				title: 'Empresas',

				defaultSorting: 'id ASC',
				actions: {
            //READ
            listAction: 'productos.php?accion=listar',
					//CREATE
					createAction: 'productos.php?accion=crear',
					//UPDATE
					updateAction: 'productos.php?accion=actualizar',
					//DELETE
					deleteAction: 'productos.php?accion=eliminar'
				},
				fields: {
            id: {
                title: 'Id Producto',
						key: true,
						create: false,
						edit: false,
						list: true
					},
            razon_social: {
                title: 'Nombre',
						width: '25%'
					},
            sigla: {
                title: 'Sigla',
						width: '25%'

					},
            direccion: {
                title: 'Direccion',
						create: true,
						edit: true,
						list: false
					},
            correo: {
                        title: 'Correo',
                        create: true,
                        edit: true,
                        list: false
                    },
            nit: {
                        title: 'Nit',
                        create: true,
                        edit: true,
                        list: false
                    },
            nivel: {
                        title: 'Nivel',
                        create: true,
                        edit: true,
                        list: false
                    },
            ShowDetailColumn: {
                title: '',
                create: false,
                edit: false,
                list: true,
    display: function (data) {
                    return '<a href="inicio.php?id=' + data.record.id + '&nivel='+data.record.nivel+'"><img style="width:20px" src="22.png" /></a>';
                },
	width: '2%'
},
        },
            //Initialize validation logic when a form is created
            formCreated: function (event, data) {
                data.form.find('input[name="razon_social"]').addClass('validate[required]');
                data.form.find('input[name="correo"]').addClass('validate[required,custom[email]]');
                data.form.find('input[name="sigla"]').addClass('validate[required]');
                data.form.find('input[name="direccion"]').addClass('validate[required]');
                data.form.find('input[name="nit"]').addClass('validate[required],custom[integer]');

                data.form.find('input[name="nivel"]').addClass('validate[required],custom[integer],min[3],max[7]');

                data.form.validationEngine();
                data.form.css('width','300px');

                data.form.closest('.ui-dialog').dialog('option', 'position', 'center');
            },
            //Validate form when it is being submitted
            formSubmitting: function (event, data) {
                return data.form.validationEngine('validate');
            },
            //Dispose validation logic when form is closed
            formClosed: function (event, data) {
                data.form.validationEngine('hide');
                data.form.validationEngine('detach');
            }
			});

			//Load person list from server
			$('#Productos').jtable('load');

		});

	</script>
  <script src="js/jasny-bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
