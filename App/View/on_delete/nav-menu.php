<?php include '../../../../conexion.php'; ?>
<?php include 'validar_sesion.php'; ?>

<?php
$id_user = $_SESSION['id_user'];
$nick = $_SESSION['nick'];
$nombre = $_SESSION['nombre'];
$id_rol = $_SESSION['id_rol'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" href=""> -->
    <title>Sistema Integral de Recursos Humanos</title>
    
    <!-- Custom CSS -->
    <link href="../../../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../../.././assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../../../.././assets/libs/morris.js/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../../.././dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../.././assets/extra-libs/css/css.css">
    <link rel="stylesheet" type="text/css" href="../../../.././assets/extra-libs/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../../.././assets/extra-libs/select2/css/select2.css">
    <link rel="stylesheet" type="text/css" href="../../../.././assets/extra-libs/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="../../../.././assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css"
        href="../../../.././assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- jQuery UI JS -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- Datatable JS -->
    <!-- <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->


    <!-- <script src="./dist/js/jquery-3.2.1.min.js"></script> -->
    <script src="../../../.././assets/extra-libs/alertifyjs/alertify.js"></script>
    <script src="../../../.././assets/extra-libs/select2/js/select2.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="../../../../js/Mensajes/mensajes.js"></script>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    <style>
        /* Custom CSS for green tooltip */
        .tippy-box[data-theme~='green'] {
            background-color: #235B4E;
            color: white;
            font-family: 'Montserrat';
        }

        .tippy-box[data-theme~='green'] .tippy-arrow {
            color: #235B4E
        }
    </style>


    <style>
        .left-sidebar {
            height: 600px;
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            /* Adjust the width according to your design */
            background-color: #fff;
            /* Change the background color if needed */
            overflow-y: auto;
        }

        .scroll-sidebar {
            max-height: calc(100% - 150px);
            /* Adjust the maximum height as needed */
            overflow-y: auto;
            min-height: 200px;
        }

        .sidebar-nav {
            padding-top: 15px;
            padding-bottom: 15px;
            padding-right: 25px;
        }

        a.dropdown-item:hover {
            background-color: #fbf4e8;
            ;
        }

        .search-input {
            width: 100%;
            padding: padding: 10px 40px 10px 10px;
            box-sizing: border-box;
        }

        .bg-image {
            background-image: url('../../../../assets/sirh/fondo.png');
            /* Ruta de tu imagen de fondo */
            background-size: cover;
            /* Ajusta la imagen al tamaño del contenedor */
            background-position: center;
            /* Centra la imagen */
            height: 100vh;
            /* Tamaño completo de la ventana */
            /*color: white;*/
            /* Color del texto para que sea legible en la imagen de fondo */
        }

    </style>

    </style>

    <link rel="icon" type="image/png" href="../../../../logo.png">
    <link rel="stylesheet" type="text/css" href="../../../../assets/styles/Styles.css">
</head>

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
                </a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="#">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon --><br>
                        <img src="../../../../assets/logo/Iimsslogo1.png" alt="homepage" class="dark-logo"
                            style="width: 30%;" />

                        <!-- Light Logo icon -->

                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <!-- <img src="assets/icontext.png" alt="homepage" class="dark-logo" width="100%" /> -->
                        <!-- Light Logo text -->
                        <!-- <img src="assets/icontext.png" class="light-logo" alt="homepage" width="100%" /> -->
                    </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                            data-sidebartype="mini-sidebar">
                            <i class="sl-icon-menu font-20"></i>
                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- mega menu -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End mega menu -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->

                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li>
                        <!-- User Profile-->
                        <div class="user-profile dropdown m-t-20">
                            <div class="user-pic">

                            </div><br><br>
                            <div class="user-content hide-menu m-t-10">
                                <h5 class="m-b-10 user-name font-medium" style="color: #cb9f52;">
                                    <?php echo $nick; ?>
                                </h5>
                            </div>
                        </div>
                    </li>
                    <!-- HOME -->
                    <li class="sidebar-item">
                        <a href="../../Admin/MiPerfil/index.php" class="sidebar-link" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="far fa-folder" style="font-size: 1.2rem;"></i>
                            <span class="hide-menu" style="font-weight: bold;">&nbsp;&nbsp;Inicio</span>
                        </a>
                    </li>
                    <!-- HOME -->

                    <!-- MY PROFILE -->
                    <?php if (false) { ?>
                        <li class="sidebar-item">
                            <a href="../../Admin/MiPerfil/index.php" class="sidebar-link" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="far fa-folder" style="font-size: 1.2rem;"></i>
                                <span class="hide-menu" style="font-weight: bold;">&nbsp;&nbsp; Mi perfil</span>
                            </a>
                        </li>
                    <?php } ?>
                    <!-- MY PROFILE -->

                    <!-- ADMIN INICIO -->
                    <?php if ($id_rol == 1) { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="far fa-folder" style="font-size: 1.1rem;"></i>
                                <span class="hide-menu" style="font-weight: bold;">&nbsp;&nbsp;Administraci&oacuten</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="../../Admin/Usuarios/index.php" class="sidebar-link">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <i class="far fa-folder" style="font-size: 1.1rem;"></i>
                                        <span class="hide-menu"
                                            style="font-weight: bold; font-size:0.8rem;">&nbsp;&nbsp;Usuarios</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../../Admin/Rol/index.php" class="sidebar-link">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <i class="far fa-folder" style="font-size: 1.2rem;"></i>
                                        <span class="hide-menu"
                                            style="font-weight: bold; font-size:0.8rem;">&nbsp;&nbsp;Roles</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- ADMIN FIN -->

                    <!-- CENTRAL INICIO -->
                    <?php if ($id_rol == 1 || $id_rol == 2) { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="far fa-folder" style="font-size: 1.1rem;"></i>
                                <span class="hide-menu" style="font-weight: bold;">&nbsp;&nbsp;CENTRAL</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <i class="far fa-folder" style="font-size: 1.1rem;"></i>
                                        <span class="hide-menu"
                                            style="font-weight: bold; font-size:0.8rem;">&nbsp;&nbsp;Centro de
                                            trabajo</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <i class="far fa-folder" style="font-size: 1.2rem;"></i>
                                        <span class="hide-menu"
                                            style="font-weight: bold; font-size:0.8rem;">&nbsp;&nbsp;Plazas</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <i class="far fa-folder" style="font-size: 1.2rem;"></i>
                                        <span class="hide-menu"
                                            style="font-weight: bold; font-size:0.8rem;">&nbsp;&nbsp;Empleado</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- CENTRAL FIN -->

                    <!-- HRAES INICIO -->
                    <?php if ($id_rol == 1 || $id_rol == 3) { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="far fa-folder" style="font-size: 1.1rem;"></i>
                                <span class="hide-menu" style="font-weight: bold;">&nbsp;&nbsp;HRAES</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="../../Hraes/CentroTrabajo/index.php" class="sidebar-link">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <i class="far fa-folder" style="font-size: 1.1rem;"></i>
                                        <span class="hide-menu"
                                            style="font-weight: bold; font-size:0.8rem;">&nbsp;&nbsp;Centro de
                                            trabajo</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../../Hraes/Plazas/index.php" class="sidebar-link">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <i class="far fa-folder" style="font-size: 1.2rem;"></i>
                                        <span class="hide-menu"
                                            style="font-weight: bold; font-size:0.8rem;">&nbsp;&nbsp;Plazas</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../../Hraes/Empleados/index.php" class="sidebar-link">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <i class="far fa-folder" style="font-size: 1.2rem;"></i>
                                        <span class="hide-menu"
                                            style="font-weight: bold; font-size:0.8rem;">&nbsp;&nbsp;Empleado</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- HRAES FIN -->



                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" data-toggle="modal"
                            data-target="#exampleModalCenter" aria-expanded="false">
                            <i class="fa fa-caret-right" style="font-size: 1.2rem;"></i>
                            <span class="hide-menu" style="font-weight: bold;">&nbsp;&nbsp;Salir</span>
                        </a>
                    </li>
                    <br>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->




    </aside>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>
    </body>

    <!-- MODAL SALIR-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#235B4E">
                    <h4 style="color:white" class="modal-title" id="exampleModalLongTitle">Confirmar cierre de
                        ses&oacuten</h4>
                    <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <a href="../../salir.php" style="color:  #235B4E;" class="btn btn-light"><i class=""></i>
                        <span class="hide-menu" style="font-weight: bold;">&nbsp;Salir</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL SALIR-->

</html>