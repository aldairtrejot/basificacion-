<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"></label>Modificar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="card-body">


                <ul class="nav nav-tabs" id="tabContent">
                    <li class="nav-item">
                        <a href="#details" data-toggle="tab" style="color: black"><label class="control-label">Datos del
                                personal</label></a>
                    </li>
                    <li class="nav-item">
                        <a href="#networking" data-toggle="tab" style="color: black"><label
                                class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instance
                                Name</label></a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="details">


                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore est non repellendus
                            pariatur eum. Debitis blanditiis, iusto maxime velit ducimus id natus tenetur, similique
                            perspiciatis porro minima, enim nemo illum?</p>
                        <label class="control-label">Instance Name</label>
                        <div class="form-group col-md-6">
                            <label>Apellido materno</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
                                placeholder="Apellido materno">
                        </div>

                        <div class="form-group col-md-6">
                            <label>N&uacutemero de seguro social</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="nss" name="nss"
                                placeholder="Número de seguro social">
                        </div>

                    </div>

                    <div class="tab-pane" id="networking">content 0
                        <div class="form-group col-md-6">
                            <label>Nombre</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Rfc</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Rfc">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellido paterno</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"
                                placeholder="Apellido paterno">
                        </div>
                    </div>

                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validar();">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>

<!--
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"></label>Modificar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <form action="">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Nombre</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Rfc</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Rfc">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellido paterno</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Apellido paterno">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Curp</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Curp">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellido materno</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Apellido materno">
                        </div>

                        <div class="form-group col-md-6">
                            <label>N&uacutemero de seguro social</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="nss" name="nss" placeholder="Número de seguro social">
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validar();">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>
-->