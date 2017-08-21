<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-table.min.css">
    <link rel="stylesheet" href="css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="css/modern-business.css">
    <!-- <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script> -->
    <link rel="stylesheet" href="css/mainp2.css">
</head>
<body>


<script src="js/jquery.js" charset="utf-8"></script>
<script src="js/autohidingnavbar.min.js" charset="utf-8"></script>
<script src="js/main.js" charset="utf-8"></script>
<script src="js/bootstrap.min.js" charset="utf-8"></script>
<script src="js/bootstrap-table.min.js" charset="utf-8"></script>
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
</body>
</html>