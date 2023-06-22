<div id="test-l-3" class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Capacidad operativa e Infraestructura</h3>
                </div>

                <form id="managementForm" method="post">
                    <div class="card-body">
                        <!-- Campo Instalaciones -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                                <label>Las instalaciones utilizadas por la empresa son*:</label>
                                <select class="form-control" name="data[instalaciones]" id="instalaciones" required>
                                    <option>Propias</option>
                                    <option>Arendadas</option>
                                </select>
                            </div>
                        </div>

                        <!--Campo sistema de comunicación-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Seleccione los sistemas de comunicación y transmisión de datos con que cuenta la empresa:</label>
                                <select class="select2" name="data[sistemas_comunicacion][]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required>
                                    <option>Teléfono Fijo / Teléfono Celular</option>
                                    <option>LAN / Intranet (06 PCs)</option>
                                    <option>Red WAN / Extranet</option>
                                    <option>Conexión a Internet / Correo Eléctronico</option>
                                </select>
                            </div>
                        </div>

                        <!-- Campo Equipos -->
                        <div class="col-md-12">
                            <!-- select -->
                            <div class="form-group">
                                <label>¿Cuenta con equipos de cómputo y software especializado para el desarrollo de la actividades a
                                    homologar?</label>
                                <select class="custom-select" name="data[equipos_computo]" required>
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Campo Licencias -->
                        <div class="col-md-12">
                            <!-- select -->
                            <div class="form-group">
                                <label>¿Los software utilizados tienen la licencia correspondiente?</label>
                                <select class="custom-select" name="data[software_licencia]">
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
        <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
    </div>
</div>
</div>