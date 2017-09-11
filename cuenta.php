<?php
include_once('bar.php');

include_once('conexion.php');
date_default_timezone_set('America/La_Paz');


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plan de Cuentas</title>
    <style>

        button, input, optgroup, select, textarea {

            color: #000000;
        }
    </style>
    <style media="screen">
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
        body {
  margin: 30px;
  font-family: sans-serif;
  }

#fontSizeWrapper { font-size: 16px; }

#fontSize {
  width: 100px;
  font-size: 1em;
  }

/* ————————————————————–
  Tree core styles
*/
.tree { margin: 1em; }

.tree input {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  }

.tree input ~ ul { display: none; }

.tree input:checked ~ ul { display: block; }

/* ————————————————————–
  Tree rows
*/
.tree li {
  line-height: 1.2;
  position: relative;
  padding: 0 0 1em 1em;
  }

.tree ul li { padding: 1em 0 0 1em; }

.tree > li:last-child { padding-bottom: 0; }

/* ————————————————————–
  Tree labels
*/
.tree_label {
  position: relative;
  display: inline-block;
  background: #fff;
  }

label.tree_label { cursor: pointer; }

label.tree_label:hover { color: #666; }

/* ————————————————————–
  Tree expanded icon
*/
label.tree_label:before {
  background: #000;
  color: #fff;
  position: relative;
  z-index: 1;
  float: left;
  margin: 0 1em 0 -2em;
  width: 1em;
  height: 1em;
  border-radius: 1em;
  content: '+';
  text-align: center;
  line-height: .9em;
  }

:checked ~ label.tree_label:before { content: '–'; }

/* ————————————————————–
  Tree branches
*/
.tree li:before {
  position: absolute;
  top: 0;
  bottom: 0;
  left: -.5em;
  display: block;
  width: 0;
  border-left: 1px solid #777;
  content: "";
  }

.tree_label:after {
  position: absolute;
  top: 0;
  left: -1.5em;
  display: block;
  height: 0.5em;
  width: 1em;
  border-bottom: 1px solid #777;
  border-left: 1px solid #777;
  border-radius: 0 0 0 .3em;
  content: '';
  }

label.tree_label:after { border-bottom: 0; }

:checked ~ label.tree_label:after {
  border-radius: 0 .3em 0 0;
  border-top: 1px solid #777;
  border-right: 1px solid #777;
  border-bottom: 0;
  border-left: 0;
  bottom: 0;
  top: 0.5em;
  height: auto;
  }

.tree li:last-child:before {
  height: 1em;
  bottom: auto;
  }

.tree > li:last-child:before { display: none; }

.tree_custom {
  display: block;
  background: #eee;
  padding: 1em;
  border-radius: 0.3em;
}
    </style>
    <script type="text/javascript">
    function isNumber(n) {
return !isNaN(parseFloat(n)) && isFinite(n);
}

function setFontSize(el) {
  var fontSize = el.val();

  if ( isNumber(fontSize) && fontSize >= 0.5 ) {
    $('body').css({ fontSize: fontSize + 'em' });
  } else if ( fontSize ) {
    el.val('1');
    $('body').css({ fontSize: '1em' });
  }
}

$(function() {

$('#fontSize')
  .bind('change', function(){ setFontSize($(this)); })
  .bind('keyup', function(e){
    if (e.keyCode == 27) {
      $(this).val('1');
      $('body').css({ fontSize: '1em' });
    } else {
      setFontSize($(this));
    }
  });

$(window)
  .bind('keyup', function(e){
    if (e.keyCode == 27) {
      $('#fontSize').val('1');
      $('body').css({ fontSize: '1em' });
    }
  });

});
    </script>
  </head>
 <body>
   <div class="container">
           <div class="container-fluid">
               <div class="text-center">
                   <h1>Plan de Cuentas</h1>

               </div>
               <form class="form-horizontal" role="form" method="post" action="productoregister.php" enctype="multipart/form-data">
                 <div class="container">
                   <div class="row row-centered">
                       <div class="col-sm-3 col-lg-3 col-centered">
                           <!-- <div class="form-group">
                   <label for="input6" class="col-md-4 control-label">123456789012:</label>
                   <div class="col-md-8">
                   <input type="text" class="form-control" id="input6" placeholder="input 6">
                 </div>
               </div> -->

                           </div>
                   </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-6 col-lg-4">
                           <div class="form-group">
                               <label for="nombre" class="col-md-4 control-label">Nombre:</label>
                               <div class="col-md-8">
                                   <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                               </div>
                           </div>
                       </div>
                       <div class="col-sm-6 col-lg-2">
                         <div class="form-group">
                           <label for="stock" class="col-md-4 control-label">Nivel:</label>
                           <div class="col-md-8">
                             <input type="number" min="0" step="1" class="form-control" id="stock" name="stock" placeholder="Nivel">
                           </div>
                         </div>
                       </div>
                       <div class="col-sm-6 col-lg-4">
                           <div class="form-group">
                               <label for="descripcion" class="col-md-4 control-label">Tipo de Cuenta:</label>
                               <div class="col-md-8">
                                   <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                               </div>
                           </div>
                       </div>


                   </div>
                   <!-- /.row this actually does not appear to be needed with the form-horizontal -->
                   <button type="submit" class="btn btn-success pull-right"> Ingresar</button>
               </form>


           </div>
           <!-- /.container -->
           <div id="fontSizeWrapper" style="margin:auto">
  <label for="fontSize">Font size</label>
  <input type="range" value="1" id="fontSize" step="0.5" min="0.5" max="5" />
</div>
<ul class="tree">
  <li>
    <input type="checkbox" checked="checked" id="c1" />
    <label class="tree_label" for="c1">Level 0</label>
    <ul>
      <li>
        <input type="checkbox" checked="checked" id="c2" />
        <label for="c2" class="tree_label">Level 1</label>
        <ul>
          <li><span class="tree_label">Level 2</span></li>
          <li><span class="tree_label">Level 2</span></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="c3" />
        <label for="c3" class="tree_label">Looong level 1 <br/>label text <br/>with line-breaks</label>
        <ul>
          <li><span class="tree_label">Level 2</span></li>
          <li>
            <input type="checkbox" id="c4" />
            <label for="c4" class="tree_label"><span class="tree_custom">Specified tree item view</span></label>
            <ul>
              <li><span class="tree_label">Level 3</span></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>


  <li>
    <input type="checkbox" id="c5" />
    <label class="tree_label" for="c5">Level 0</label>
    <ul>
      <li>
        <input type="checkbox" id="c6" />
        <label for="c6" class="tree_label">Level 1</label>
        <ul>
          <li><span class="tree_label">Level 2</span></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="c7" />
        <label for="c7" class="tree_label">Level 1</label>
        <ul>
          <li><span class="tree_label">Level 2</span></li>
          <li>
            <input type="checkbox" id="c8" />
            <label for="c8" class="tree_label">Level 2</label>
            <ul>
              <li><span class="tree_label">Level 3</span></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>
</ul>
       </div>


 </body>
</html>
