<body>
    <?php include '../nav-menu.php' ?>

    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Usuarios</h2>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../../../index.php" style="color:#cb9f52;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <p>Informaci&oacuten de usuarios del sistema.</p>

                <div class="form-inline">
                    <button onclick="agregarEditarDetalles(null)" class="btn btn-light"><i class="fas fa-plus"></i>
                        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar usuario</span>
                    </button>
                </div>
                <p></p>
                <input class="form-control mr-sm-2" type="search" placeholder="Ingresa busqueda" id="buscar"
                    onkeyup="buscarUsuario();" aria-label="Search">

                <p></p>

                <table class="table table-striped" id="t-usuarios" style="width:100%">
                    <div id="records_content">
                    </div>
                </table>

                <?php include 'AgregarEditar.php' ?>

            </div>
        </div>
    </div>

    <?php include ('../footer-librerias.php') ?>
</body>


</html>