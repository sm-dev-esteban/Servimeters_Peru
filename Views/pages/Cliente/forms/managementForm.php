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

         <!--Tabla de contratación de servicio-->
         <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">1.1 Llene la capacidad de contratación del servicio que desea homologar:</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="contracting_service_form" class="validatable-form form_1">
                            <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                            <table id="policiesTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Producto o Servicio</th>
                                        <th>Capacidad Instalada</th>
                                        <th>Producción Actual</th>
                                        <th>Detalle del producto o servicio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 1; $i < 4; $i++) { ?>
                                        <tr>
                                            <td><input type="text" class="form-control form-control-border" name="data[product_<?= $i ?>]" placeholder="..." required></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[capacity_<?= $i ?>]" placeholder="..." required></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[production_<?= $i ?>]" placeholder="..." required></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[details_<?= $i ?>]" placeholder="..." required></td>
                                        </tr>
                                    <?php } ?>

                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td> <button type="button" class="btn btn-secondary" id="addRowPolicies">Agregar Fila <i class="fas fa-plus"></i></button> </td>
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
                    <h3 class="card-title">1.2 Equipos que utiliza para la prestación del servicio:</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="service_provision_form" class="validatable-form form_1">
                            <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                            <table id="policiesTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Equipos</th>
                                        <th>Marca</th>
                                        <th>Año no fabricación</th>
                                        <th>Propio o alquilado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 1; $i < 4; $i++) { ?>
                                        <tr>
                                            <td><input type="text" class="form-control form-control-border" name="data[hardware_<?= $i ?>]" placeholder="..." required></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[mark_<?= $i ?>]" placeholder="DELL" required></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[anno_<?= $i ?>]" placeholder="2023" required></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[apartment _<?= $i ?>]" placeholder="Propio" required ></td>
                                        </tr>
                                    <?php } ?>

                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td> <button type="button" class="btn btn-secondary" id="addRowPolicies">Agregar Fila <i class="fas fa-plus"></i></button> </td>
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
                        <form id="service_provision_product_form" class="validatable-form form_1">
                            <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                            <table id="policiesTable" class="table table-bordered">
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
                                    <?php for ($i = 1; $i < 4; $i++) { ?>
                                        <tr>
                                            <td><input type="text" class="form-control form-control-border" name="data[customer_<?= $i ?>]" placeholder="..." required ></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[activity_<?= $i ?>]" placeholder="..." required></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[contact_<?= $i ?>]" placeholder="00<?= $i ?>" required></td>
                                            <td><input type="number" class="form-control form-control-border" name="data[phone_<?= $i ?>]" placeholder="2329829" required ></td>
                                            <td><input type="text" class="form-control form-control-border" name="data[details_<?= $i ?>]" placeholder="..." required ></td>
                                        </tr>
                                    <?php } ?>
                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td> <button type="button" class="btn btn-secondary" id="addRowPolicies">Agregar Fila <i class="fas fa-plus"></i></button> </td>
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