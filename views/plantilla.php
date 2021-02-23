<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CristanchoLicores</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Css plugins -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <link rel="icon" href="views/img/plantilla/logocolor.svg">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="views/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="views/plugins/icheck-1.0.3/skins/all.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="views/dist/css/style.css">

<!-- =====================================================
     Javascript plugins
 ========================================================-->

  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- InputMask -->
  <script src="views/plugins/moment/moment.min.js"></script>
  <script src="views/plugins/moment/locale/es.js"></script>
  <script src="views/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- date-range-picker -->
  <script src="views/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="views/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="views/dist/js/demo.js"></script> -->
  <!-- DataTables -->
  <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- iCheck for checkboxes and radio inputs -->
  <script src="views/plugins/icheck-1.0.3/icheck.js"></script>

  <!-- SWEET ALERT  -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>


</head>

<!-- <body class="hold-transition sidebar-collapse sidebar-mini login-page"> -->
<!-- Site wrapper -->
  
    <?php

        if(isset($_SESSION["login"])&& $_SESSION["login"]== "ok"){

            echo '
            <body class="hold-transition sidebar-collapse sidebar-mini">
            
            <div class="wrapper">';
            
            /* =====================================================
            CABEZOTE
            ========================================================*/
            include "moduls/cabezote.php";

            /* =====================================================
            MENÚ
            ========================================================*/ 
            include "moduls/aside.php";
            /* =====================================================
            INICIO
            ========================================================*/
            if(isset($_GET["ruta"])){

                if($_GET["ruta"]== "inicio"||
                $_GET["ruta"]== "usuarios"||
                $_GET["ruta"]== "categorias"||
                $_GET["ruta"]== "productos"||
                $_GET["ruta"]== "clientes"||
                $_GET["ruta"]== "ventas"||
                $_GET["ruta"]== "crear-venta"||
                $_GET["ruta"]== "reportes"||
                $_GET["ruta"]== "salir"){
                    
                    include "moduls/".$_GET["ruta"].".php";
                }else{
                    include "moduls/404.php";
                }
            }else{
                include "moduls/inicio.php";
            }
        
            /* =====================================================
            FOOTER
            ========================================================*/
            include "moduls/footer.php";

            echo '</div>';
        }else{
            include "moduls/login.php";
        }
    ?>

<!-- ./wrapper -->
    <script src="views/js/plantilla.js"></script>
    <!-- USUARIOS -->
    <script src="views/js/usuarios.js"></script>
    <!-- CATEGORIAS -->
    <script src="views/js/categorias.js"></script>
    <!-- PRODUCTOS  -->
    <script src="views/js/productos.js"></script>
    <!-- CLIENTES  -->
    <script src="views/js/clientes.js"></script>

</body>
</html>
