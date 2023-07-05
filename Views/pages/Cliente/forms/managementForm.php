<!-- Form 3 -->
<div id="test-l-3" class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Capacidad operativa e Infraestructura</h3>
                </div>

                <form id="management_form" class="validatable-form form_2">
                    <div class="card-body">
                        <!-- Campo Instalaciones -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                                <label>Las instalaciones utilizadas por la empresa son*:</label>
                                <select class="form-control" name="data[instalaciones]" id="instalaciones">
                                    <option>Propias</option>
                                    <option>Arendadas</option>
                                </select>
                            </div>
                        </div>

                        <!--Campo sistema de comunicación-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Seleccione los sistemas de comunicación y transmisión de datos con que cuenta la empresa:</label>
                                <select class="select2" name="data[sistemas_comunicacion][]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
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
                                <select class="custom-select" name="data[equipos_computo]">
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

        <!--Tabla de contratación de servicio-->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">1.1 Llene la capacidad de contratación del servicio que desea homologar:</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="contracting_service_form" class="validatable-form form_2">
                            <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                            <table id="contracting_service_table" data-table="contracting_service" class="table table-bordered table-form">
                                <thead>
                                    <tr>
                                        <th>Producto o Servicio</th>
                                        <th>Capacidad Instalada</th>
                                        <th>Producción Actual</th>
                                        <th>Detalle del producto o servicio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-border" name="data[product][]" placeholder="..." required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[capacity][]" placeholder="..." required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[production][]" placeholder="..." required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[details][]" placeholder="..." required></td>
                                    </tr>

                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td> <button type="button" class="btn btn-secondary addRow" data-id="contracting_service_table">Agregar Fila <i class="fas fa-plus"></i></button> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Tabla de prestación de servicio-->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">1.3 Relación de clientes a los cuales ha prestado el servicio o producto a homologar:</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="service_provision_form" class="validatable-form form_2">
                            <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                            <table id="serv_prov_table" data-table="service_prov" class="table table-bordered table-form">
                                <thead>
                                    <tr>
                                        <th>Equipos</th>
                                        <th>Marca</th>
                                        <th>Año no fabricación</th>
                                        <th>Propio o alquilado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-border" name="data[hd][]" placeholder="..." required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[marca][]" placeholder="..." required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[anno][]" placeholder="001" required></td>
                                        <td>
                                            <select class="form-control form-control-border" name="data[propietario][]">
                                                <option>Propio</option>
                                                <option>alquilado</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td> <button type="button" class="btn btn-secondary addRow" data-row="2" data-id="serv_prov_table">Agregar Fila <i class="fas fa-plus"></i></button> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Tabla de prestación de servicio o producto-->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">1.3 Relación de clientes a los cuales ha prestado el servicio o producto a homologar:</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="service_provision_product_form" class="validatable-form form_2">
                            <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                            <table id="serv_prov_prod_table" data-table="service_prov_prod" class="table table-bordered table-form">
                                <thead>
                                    <tr>
                                        <th>Nombre del Cliente</th>
                                        <th>Actividad del Cliente</th>
                                        <th>Contacto</th>
                                        <th>Teléfono</th>
                                        <th>Antiguedad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-border" name="data[customer][]" placeholder="..." required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[activity][]" placeholder="..." required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[contact][]" placeholder="001" required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[phone][]" placeholder="2329829" required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[details][]" placeholder="..." required></td>
                                    </tr>
                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td> <button type="button" class="btn btn-secondary addRow" data-row="2" data-id="serv_prov_prod_table">Agregar Fila <i class="fas fa-plus"></i></button> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <button class="btn btn-primary previous" onclick="stepper.previous()">Anterior</button>
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-html="true" title="Complete los campos obligatorios <b class='mandatory'>*</b> para continuar">
            <button class="btn btn-primary next" data-form="2">Siguiente</button>
        </span>
    </div>
</div>
</div>