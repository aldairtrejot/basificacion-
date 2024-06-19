<hr>
<div class="row">
    <div class="col-4">
        <div class="card border-light shadow-lg">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <h3 class="card-title">Centro de trabajo&nbsp;&nbsp;</h3>
                    <span class="oval-label-hraes">HRAES</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12" style="font-weight: bold;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #235B4E;"></div>
                                <label>Centros de trabajo:&nbsp;</label><label id="totalCTR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #9fd8a3;"></div>
                                <label>Regional centro:&nbsp;</label><label id="rCentroR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #dbe5ab;"></div>
                                <label>Regional sur:&nbsp;</label><label id="rSurR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #062107;"></div>
                                <label>Regional norte:&nbsp;</label><label id="rNorteR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #747874;"></div>
                                <label>Reg. Metropolitana:&nbsp;</label><label id="rMetropolitanoR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #e2e2e2;"></div>
                                <label>Corporativo:&nbsp;</label><label id="rCorporativoR"> </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="chart-container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <a href="../../Hraes/CentroTrabajo/index.php" class="btn btn-success" style="background:#235B4E;">M&aacutes informacion</a>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card border-light shadow-lg">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <h3 class="card-title">Plazas&nbsp;&nbsp;</h3>
                    <span class="oval-label-hraes">HRAES</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12" style="font-weight: bold;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #235B4E;"></div>
                                <label>Total de plazas:&nbsp;</label><label id="allPlazasR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #e2e2e2;"></div>
                                <label>P. Bloqueda:&nbsp;</label><label id="bloqueadaR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #dbe5ab;"></div>
                                <label>P. Cancelada:&nbsp;</label><label id="canceladaR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #747874;"></div>
                                <label>P. Ocupada:&nbsp;</label><label id="ocupadaR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #062107;"></div>
                                <label>P. Reservada:&nbsp;</label><label id="reservadaR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #9fd8a3;"></div>
                                <label>P. Vacante:&nbsp;</label><label id="vacanteR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #5f6c62;"></div>
                                <label>P. Congelada:&nbsp;</label><label id="congeladaR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #dbe5ab;"></div>
                                <label>P. Vacante Indef:&nbsp;</label><label id="vacanteIndef"> </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="chart-container">
                            <canvas id="myChartPlazas"></canvas>
                        </div>
                    </div>
                </div>
                <a href="../../Hraes/Plazas/index.php" class="btn btn-success" style="background:#235B4E;">M&aacutes informaci&oacuten</a>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card border-light shadow-lg">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <h3 class="card-title">Empleados&nbsp;&nbsp;</h3>
                    <span class="oval-label-hraes">HRAES</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12" style="font-weight: bold;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #235B4E;"></div>
                                <label>Total empleados:&nbsp;</label><label id="empleadosR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #9fd8a3;"></div>
                                <label>Total masculino:&nbsp;</label><label id="masculinoR"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #e2e2e2;"></div>
                                <label>Total femenino:&nbsp;</label><label id="femeninoR"> </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="chart-container">
                            <canvas id="myChartEmpleados"></canvas>
                        </div>
                    </div>
                </div>
                <a href="../../Hraes/Empleados/index.php" class="btn btn-success" style="background:#235B4E;">M&aacutes informacion</a>
            </div>
        </div>
    </div>

</div>
