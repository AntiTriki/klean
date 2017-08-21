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
            <td>Empresa </td>
            <td>NIT</td>
            <td>Direccion</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $cxn = new mysqli($mysql_host,$mysql_user,$mysql_password,$my_database);
        $query =sprintf('SELECT * FROM EMPRESA WHERE ID_USUARIO=$id_usuario');
        $cxn -> set_charset("utf8");
        $result = mysqli_query($cxn,$query) or die ("Error:".mysqli_error($cxn));

        
        ?>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="name" class="form-control" />
            </td>
            <td class="col-sm-4">
                <input type="mail" name="mail"  class="form-control"/>
            </td>
            <td class="col-sm-3">
                <input type="text" name="phone"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
            </td>
        </tr>
        <tr>
        </tr>
        </tfoot>
    </table>
</div>
</div>
</div>

<!--<script src="js/jquery.js" charset="utf-8"></script>-->
<!--<script src="js/autohidingnavbar.min.js" charset="utf-8"></script>-->
<!--<script src="js/main.js" charset="utf-8"></script>-->
<!--<script src="js/bootstrap.min.js" charset="utf-8"></script>-->
<!--<script src="js/bootstrap-table.min.js" charset="utf-8"></script>-->
<script>
    $("document").ready(function () {
        $("#confirmar").click(function () {
            $('#form').submit(function (e) {
                e.preventDefault();
                var informacion=$('#form').serialize();
                var metodo='POST';
                var peticion='usuarioregister.php';
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
    $(document).ready(function () {
        var counter = 0;

        $("#addrow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
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