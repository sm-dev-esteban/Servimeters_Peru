<div id="test-l-3" class="content">
    <h5 class="text-center p-3">Capacidad operativa e Infraestructura</h5>
    <div class="row">
        <!-- Campo Instalaciones -->
        <div class="col-md-12">
            <div class="form-group">
                <label>Las instalaciones utilizadas por la empresa son*:</label>
                <select class="form-control">
                    <option>Propias</option>
                    <option>Arendadas</option>
                </select>
            </div>
        </div>

        <!--Campo sistema de comunicación-->
        <div class="col-md-12">
            <div class="form-group">
                <label>Seleccione los sistemas de comunicación y transmisión de datos con que cuenta la empresa:</label>
                <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
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
                <select class="custom-select">
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
                <select class="custom-select">
                    <option>Si</option>
                    <option>No</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
            <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
        </div>
    </div>
</div>