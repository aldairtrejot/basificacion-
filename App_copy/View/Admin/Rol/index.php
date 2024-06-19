<body>

    <?php include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid bg-image">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-10 align-self-center">
                            <h2 class="page-title">Control de roles</h2>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="col-2 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../../Admin/MiPerfil/index.php" style="color:#cb9f52;">Inicio</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3 search-container">
                            <input onkeyup="buscarRol();" id="buscarRol" type="text" placeholder="Buscar..."
                                class="form-control mr-sm-2 search-input">
                            <span class="search-icon"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <br>

                    <table class="table table-striped" id="t-table" style="width:100%">
                    </table>


                </div>
            </div>
        </div>

        <script src="../../../../js/Admin/Rol/Rol.js"></script>
        <?php include ('../../footer-librerias.php') ?>
</body>