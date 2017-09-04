<?php
include_once('bar_single.php');
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
<link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="Scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />

	<!--<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>-->
	<!-- <script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script> -->
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
    <script src="localization/jquery.jtable.es.js" type="text/javascript"></script>
	<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />

<!-- Import Javascript files for validation engine (in Head section of HTML) -->
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-es.js"></script>
<style media="screen">
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="canvas">
<div class="container">
  <div id="Productos" style="width: 50%;margin:auto"></div>



</div>
</div>
<!--<script src="js/jquery.js" charset="utf-8"></script>-->
<!--<script src="js/autohidingnavbar.min.js" charset="utf-8"></script>-->
<!--<script src="js/main.js" charset="utf-8"></script>-->
<!--<script src="js/bootstrap.min.js" charset="utf-8"></script>-->
<!--<script src="js/bootstrap-table.min.js" charset="utf-8"></script>-->

<!-- <script>
$('.table > tbody > tr').click(function() {
    // row was clicked
});
$('#myTable').on('click', '.clickable-row', function(event) {
  $(this).addClass('active').siblings().removeClass('active');
});

</script> -->
<script type="text/javascript">
  $(document).ready(function () {
    $('#Productos').jtable({
      title: 'Tabla Empresas',
      paging: true,
      pageSize:5,
      sorting: true,
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
          title: 'Id Producto',

          create: true,
          edit: true,
          list: false
        },
        ShowDetailColumn: {
  title: '',
  display: function (data) {
      return '<a href="ambiente.php?id=' + data.record.id + '"><img style="width:20px" src="22.png" /></a>';
  },
width: '2%'
},
      }
    });

    //Load person list from server
    $('#Productos').jtable('load');

  });

</script>
<script src="js/jasny-bootstrap.min.js" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        // click on button submit
        $("#submit").on('click', function(){
            // send ajax
            $.ajax({
                url: 'empresaregister.php', // url where to submit the request
                type : "POST", // type of action POST || GET
                dataType : 'json', // data type
                data : $("#form").serialize(), // post data || get data
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
                    console.log(result);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })
        });
    });

</script>
<script>

    $(document).ready(function () {
        var counter = 0;
        function AgregarFila(){

            var newRow = $("<tr>");
            var cols = "";

            cols += '<tr>
                <td class="col-sm-4 clickable-row">
            </td>

            <td class="col-sm-4 clickable-row">
            </td>

            <td class="col-sm-4 clickable-row">
            </td>
            <td>
            <a class="btn btn-danger delete " data-tog
            gle="modal" role="button"
            href="ambiente.php?id=''"><span id="" class="glyphicon glyphicon-chevron-right "></span></a>


                </td>
                </tr>
                </tr>';
            newRow.append(cols);
            $("table.order-list").append(newRow);

        }
        // $('#submit').click( function () {
        //   $.ajax({
        //           url: empresaregister.php,
        //           type:'POST',
        //           data: $('#form').serialize(),
        //           success: function(msg)
        //           {
        //               if(msg == 'fail') {
        //                   alert('Ya existe una empresa con alguno de los datos ingresados');
        //               }else{
        //
        //                   AgregarFila();
        //                   counter++;
        //
        //               }
        //
        //           }
        //       });



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
