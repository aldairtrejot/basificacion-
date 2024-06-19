<?php include ("../../php/ControlCargaMasivaC/Listar.php") ?>
<?php include ("../../php/Usuario/listarUsuario.php") ?>



<div class="modal fade" id="exampleModalHistoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Historia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <table class="table table-striped" id="">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Registro</th>
                            <th style="color: white;">ID</th>
                            <th style="color: white;">Usuario</th>
                            <th style="color: white;">Tipo</th>
                            <th style="color: white;">Fecha</th>
                            <th style="color: white;">Hora</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $listdado = listarCargaMasivaByAll();
                        if ($listdado) {
                            if (pg_num_rows($listdado) > 0) {
                                while ($obj = pg_fetch_object($listdado)) { ?>
                                    <tr>
                                        <td>
                                            <div class=" btn-group">
                                                <button type="button" class="btn btn-light" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="background-color: transparent; border:none; outline:none; color: white;">
                                                    <i class="fa fa-file" style="font-size: 1.4rem; color:#235B4E;"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="<?php echo '#modalIncorrect-' . $obj->id_ctrl_carga_masiva ?>">Registros
                                                        correctos</a>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="<?php echo '#modalIncorrect-' . $obj->id_ctrl_carga_masiva ?>">Registros
                                                        incorrectos</a>
                                                </div>
                                            </div>

                                            <!-- MODAL INCORRECTO -->
                                            <div class="modal fade"
                                                id="<?php echo '#modalIncorrect-' . $obj->id_ctrl_carga_masiva ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Registros Incorrectos
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <table class="table table-striped" id="">
                                                                <thead>
                                                                    <tr style="background-color: #5c5c5c;">
                                                                        <th style="color: white;">Registro</th>
                                                                        <th style="color: white;">ID</th>
                                                                        <th style="color: white;">Usuario</th>
                                                                        <th style="color: white;">Tipo</th>
                                                                        <th style="color: white;">Fecha</th>
                                                                        <th style="color: white;">Hora</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $listdadox = listarCargaMasivaByAll();
                                                                    if ($listdadox) {
                                                                        if (pg_num_rows($listdado) > 0) {
                                                                            while ($objx = pg_fetch_object($listdadox)) { ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class=" btn-group">
                                                                                            <button type="button" class="btn btn-light"
                                                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                                                aria-expanded="false"
                                                                                                style="background-color: transparent; border:none; outline:none; color: white;">
                                                                                                <i class="fa fa-file"
                                                                                                    style="font-size: 1.4rem; color:#235B4E;"></i>
                                                                                            </button>
                                                                                            <div class="dropdown-menu">
                                                                                                <a class="dropdown-item"
                                                                                                    href="<?php echo "usuarioEditar.php?D-F=" . $objx->id_ctrl_carga_masiva ?>">Registros
                                                                                                    correctos</a>
                                                                                                <a class="dropdown-item" data-toggle="modal"
                                                                                                    data-target="<?php echo '#modal-' . $objx->id_ctrl_carga_masiva ?>">Registros
                                                                                                    incorrectos</a>
                                                                                            </div>
                                                                                        </div>

                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo "ER$objx->id_ctrl_carga_masiva" ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo listarUsuarioByNick($objx->id_usuario) ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $objx->id_cat_carga_masiva ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                        $date = new DateTime($objx->fecha);
                                                                                        echo $date->format('Y-m-d');
                                                                                        ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                        $date = new DateTime($objx->fecha);
                                                                                        echo $date->format('H:i');
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        } else
                                                                            echo "<p>Sin Resultados</p>";
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL INCORRECTO -->

                                        </td>
                                        <td>
                                            <?php echo "ER$obj->id_ctrl_carga_masiva" ?>
                                        </td>
                                        <td>
                                            <?php echo listarUsuarioByNick($obj->id_usuario) ?>
                                        </td>
                                        <td>
                                            <?php echo listadoCargaMasivaByNombre($obj->id_cat_carga_masiva) ?>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($obj->fecha);
                                            echo $date->format('d-m-y');
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($obj->fecha);
                                            echo $date->format('H:i');
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else
                                echo "<p></p>";
                        }
                        ?>
                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalIncorrect" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registros Incorrectos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <table class="table table-striped" id="">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Registro</th>
                            <th style="color: white;">ID</th>
                            <th style="color: white;">Usuario</th>
                            <th style="color: white;">Fecha</th>
                            <th style="color: white;">Hora</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $listdado = listarCargaMasivaByAll();
                        if ($listdado) {
                            if (pg_num_rows($listdado) > 0) {
                                while ($obj = pg_fetch_object($listdado)) { ?>
                                    <tr>
                                        <td>
                                            <div class=" btn-group">
                                                <button type="button" class="btn btn-light" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="background-color: transparent; border:none; outline:none; color: white;">
                                                    <i class="fa fa-file" style="font-size: 1.4rem; color:#cb9f52;"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="<?php echo "usuarioEditar.php?D-F=" . $obj->id_ctrl_carga_masiva ?>">Registros
                                                        correctos</a>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="<?php echo '#modal-' . $obj->id_ctrl_carga_masiva ?>">Registros
                                                        incorrectos</a>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <?php echo "ER$obj->id_ctrl_carga_masiva" ?>
                                        </td>
                                        <td>
                                            <?php echo listarUsuarioByNick($obj->id_usuario) ?>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($obj->fecha);
                                            echo $date->format('Y-m-d');
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($obj->fecha);
                                            echo $date->format('H:i');
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else
                                echo "<p>Sin Resultados</p>";
                        }
                        ?>
                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
            </div>
        </div>
    </div>
</div>