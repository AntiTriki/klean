<?php
include_once('bar.php');
include_once('conexion.php');
$id_usuario=$_SESSION['id_usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
<!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="css/bootstrap-table.min.css">-->
<!--    <link rel="stylesheet" href="css/jasny-bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="css/modern-business.css">-->
    <!-- <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script> -->
<!--    <link rel="stylesheet" href="css/mainp2.css">-->

</head>
<body>
<div class="canvas">
<div class="container">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
    <table id="myTable" class=" table order-list">
        <thead>
        <tr>
            <td><h4>Empresa</h4> </td>
            <td><h4>NIT</h4></td>
            <td><h4>Direccion</h4></td>
        </tr>
        </thead>
        <tbody>
        <?php
        $cxn = new mysqli($mysql_host,$mysql_user,$mysql_password,$my_database);
        $query =sprintf('SELECT * FROM EMPRESA WHERE ID_USUARIO=%d',$id_usuario);
        $cxn -> set_charset("utf8");
        $result = mysqli_query($cxn,$query) or die ("Error:".mysqli_error($cxn));
        $i=0;
        while ($empresas=mysqli_fetch_array($result)){
            echo '<tr>
            <td class="col-sm-4 clickable-row">'.$empresas['razon_social'].'
             </td>

             <td class="col-sm-4 clickable-row">'.$empresas['nit'].'
             </td>

             <td class="col-sm-4 clickable-row">'.$empresas['direccion'].'
             </td>
             <td>
             <a class="btn btn-danger delete " data-toggle="modal" role="button"
              href="ambiente.php?id='.$empresas['id'].'"><span id="'.$empresas['id'].'" class="glyphicon glyphicon-chevron-right "></span></a>


             </td>
            </tr>
            ';



            }

        ?>


        </tbody>
        <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
              <a class="btn btn-lg btn-block btn-warning " data-toggle="modal" data-target="#form_empresa" role="button" >Agregar Empresa</a>

                <!-- <input type="button" class="btn btn-lg btn-block btn-warning " id="addrow"  /> -->
            </td>
        </tr>
        <tr>
        </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
<div id="form_empresa" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registro de Empresa</h4>
            </div>
            <div class="modal-body">
                <form id="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" name="correo" class="form-control" id="email" placeholder="Ingresar email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">NIT:</label>
                        <div class="col-sm-10">
                            <input type="number" name="nit" class="form-control" id="pwd" placeholder="Ingresar Nit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Razon Social:</label>
                        <div class="col-sm-10">
                            <input type="text" name="razon_social" class="form-control" id="pwd" placeholder="Ingresar Razon Social">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Sigla:</label>
                        <div class="col-sm-10">
                            <input type="text" name="sigla" class="form-control" id="pwd" placeholder="Ingresar Sigla">
                        </div>
                    </div><div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" name="direccion" class="form-control" id="pwd" placeholder="Ingresar Direccion">
                        </div>
                    </div><div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nivel:</label>
                        <div class="col-sm-10">
                            <input type="number" name="nivel" class="form-control" id="pwd" placeholder="Ingresar Nivel">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button id="submit" type="submit" class="btn btn-default">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--<script src="js/jquery.js" charset="utf-8"></script>-->
<!--<script src="js/autohidingnavbar.min.js" charset="utf-8"></script>-->
<!--<script src="js/main.js" charset="utf-8"></script>-->
<!--<script src="js/bootstrap.min.js" charset="utf-8"></script>-->
<!--<script src="js/bootstrap-table.min.js" charset="utf-8"></script>-->
<script>
$('.table > tbody > tr').click(function() {
    // row was clicked
});
$('#myTable').on('click', '.clickable-row', function(event) {
  $(this).addClass('active').siblings().removeClass('active');
});
    $("document").ready(function () {
        $("#confirmar").click(function () {
            $('#form').submit(function (e) {
                e.preventDefault();
                var informacion=$('#form').serialize();
                var metodo='POST';
                var peticion='empresaregister.php';
                $.ajax({
                    type: metodo,
                    url: peticion,
                    data:informacion,
                    beforeSend: function(){

                    },
                    error: function(data) {
                        $("#form").append(data);
                    },
                    success: function (data) {
                        $("#form").fadeOut( "slow" );
                    }
                });
                return false;
            });
        }); // Click effect


    }); //Begin of Jquery Statement
</script>
<script src="js/jasny-bootstrap.min.js" charset="utf-8"></script>
<script>
function AgregarFila(){


}
    $(document).ready(function () {
        var counter = 0;

        $('#submit').click( function () {
          $.ajax({
                  url: empresaregister.php,
                  type:'POST',
                  data: $('#form').serialize(),
                  success: function(msg)
                  {
                      alert('Email Sent');
                  }
              });



            var newRow = $("<tr>");
            var cols = "";

            cols += '
            </tr>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });



        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });


    });



    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();

    }

    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function () {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }

</script>
</div>
</body>
</html>
