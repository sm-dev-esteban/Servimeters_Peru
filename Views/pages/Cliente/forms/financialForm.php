<!-- Form 2 -->
<div id="test-l-2" class="content">
    <div class="row">
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Situación financiera y Requisitos legales</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="financial_form" class="validatable-form form_1">
                    <div class="card-body">
                        <!--Campo Empresa-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="data[proceso]" value="<?= $process ?>" hidden>
                                    <label>¿La empresa declara la veracidad de la información que suministrará en este formulario?</label>
                                    <select class="form-control" name="data[pregunta_veracidad]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo Fecha -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="data[fecha]" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                                        <span class='error'></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Campo Razón Social-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Razón Social</label>
                                    <input type="text" name="data[razon_social]" class="form-control" id="###" placeholder="Ingrese razón social" required>
                                    <span class='error'></span>
                                </div>
                            </div>

                            <!--Campo Nombre Comercial-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Nombre Comercial</label>
                                    <input type="text" name="data[nombre_comercial]" class="form-control" id="###" placeholder="Ingrese el nombre comercial" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Campo RUC / CIF / NIF ( Por Favor especificar)-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">RUC / CIF / NIF ( Por Favor especificar)</label>
                                    <input type="text" class="form-control" name="data[ruc_cif_nif]" id="###" placeholder="Ingrese el datos que se especifica" required>
                                </div>
                            </div>

                            <!--Campo Domicilio Fiscal-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Domicilio Fiscal</label>
                                    <input type="text" class="form-control" name="data[domicilio_fiscal]" id="###" placeholder="Ingrese el domicilio fiscal" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Campo Código Postal-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Código Postal</label>
                                    <input type="text" class="form-control" name="data[codigo_postal]" id="###" placeholder="Ingrese el código postal" required>
                                </div>
                            </div>

                            <!--Campo Providencia/Población/Pais-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Ciudad/Provincia/País</label>
                                    <input type="text" class="form-control" name="data[providencia_poblacion_pais]" id="###" placeholder="Ingrese las siguientes opciones" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Campo Llenado por -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Llenado por:</label>
                                    <input type="text" class="form-control" name="data[llenado_por]" id="###" placeholder="Ingrese su nombre" required>
                                </div>
                            </div>

                            <!--Campo Télefono -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Télefono:</label>
                                    <input type="text" class="form-control" name="data[telefono]" id="###" placeholder="Ingrese el télefono" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Campo Actividad Económica(Código CIIU): -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Actividad Económica(Código CIIU)</label>
                                    <input type="text" class="form-control" name="data[actividad_economica]" id="###" placeholder="Ingrese su actividad económica" required>
                                </div>
                            </div>

                            <!--Campo ¿Acepta Facturación Electrónica?: -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿Acepta Facturación Electrónica?</label>
                                    <select class="form-control" name="data[acepta_facturacion]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Campo Tipo de servicio-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Escriba el tipo de servicio o producto a homologar, adicional, especifique si lo subcontrata.</label>
                                    <input type="text" class="form-control" name="data[tipo_servicio_producto]" id="###" placeholder="Ingrese el tipo de servicio o producto a homologar" required>
                                </div>
                            </div>

                            <!--Campo Tipo de servicio-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿Tiene servicio postventa?</label>
                                    <select class="form-control" name="data[servicio_postventa]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!--Campo Capital Social de la empresa en Dólares-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="###">Capital Social de la empresa en Dólares</label>
                                <input type="number" step="0.01" class="form-control" name="data[capital_social]" id="###" placeholder="Ingrese la capital social de la mepresa en dólares" required>
                            </div>
                        </div>

                        <!--Campo Capital Social de la empresa en Dólares-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="###">Número de clientes en los últimos dos años(2021/2022)</label>
                                <input type="text" class="form-control" name="data[numero_clientes]" id="###" placeholder="Ingrese el número de clientes en los últimos dos años" required>
                            </div>
                        </div>

                        <!--Campo Capital Social de la empresa en Dólares-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>¿Se encuentra o se ha encontrado en algún tipo de litigio judicial relacionado con el desarrollo de su actividad?</label>
                                <select class="form-control" name="data[litigio_judicial]">
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--Adjunto de archivos-->
        <?php include('financialDocuments.php') ?>
        <!-- Tabla de volumen-->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">1.1 En la siguiente tabla llene el volumen de ventas de los últimos tres años en
                        dólares:</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <!-- Primera tabla -->
                            <?php for ($i = 1; $i < 4; $i++) { ?>
                                <div class="col-md-6">
                                    <form id="financial_sell_form_<?= $i ?>" class="validatable-form form_1">
                                        <input type="text" name="data[proceso]" value="<?= $process ?>" hidden>
                                        <!-- <label>Información adicional</label> -->
                                        <table id="financial_table<?= $i ?>" data-index="<?= $i ?>" data-table="finance" class="table table-bordered table-form">
                                            <thead>
                                                <tr>
                                                    <th>Año <?= $i ?></th>
                                                    <th>Sector</th>
                                                    <th>Ventas Totales</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <input type="text" class="form-control form-control-border" name="data[anno][]" placeholder="2023" required> </td>
                                                    <td> <input type="text" class="form-control form-control-border" name="data[sector][]" placeholder="Sector A" required> </td>
                                                    <td> <input type="number" class="form-control form-control-border sum" data-total="<?= $i ?>" step="0.01" name="data[ventas][]" placeholder="$100" required> </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td> <button type="button" class="btn btn-secondary addRow" data-id="financial_table<?= $i ?>">Agregar Fila <i class="fas fa-plus"></i></button> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-right"><strong>Total</strong></td>
                                                    <td><strong><input type="text" class="form-control form-control-border" id="total_<?= $i ?>" disabled></strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--Tabla de pólizas-->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">1.2 En la siguiente tabla llene las Pólizas con las cuales cuenta la empresa:</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="policies_form" class="validatable-form form_1">
                            <input type="text" name="data[proceso]" value="<?= $process ?>" hidden>
                            <table id="policies_table" data-table="policies" class="table table-bordered table-form">
                                <thead>
                                    <tr>
                                        <th>Entidad</th>
                                        <th>Número</th>
                                        <th>Fecha de Vigencia</th>
                                        <th>Detalle de la Póliza</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-border" name="data[entity][]" placeholder="Entidad A" required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[number][]" placeholder="001" required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[dateValidity][]" placeholder="<?= date("d-m-Y") ?>" required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[details][]" placeholder="..." required></td>
                                    </tr>
                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td> <button type="button" class="btn btn-secondary addRow" data-id="policies_table">Agregar Fila <i class="fas fa-plus"></i></button> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Tabla de bancos-->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">1.3 En la siguiente tabla llene los Bancos con los cuales trabaja la empresa:</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="banks_form" class="validatable-form form_1">
                            <input type="text" name="data[proceso]" value="<?= $process ?>" hidden>
                            <table id="bank_table" data-table="bank" class="table table-bordered table-form">
                                <thead>
                                    <tr>
                                        <th>Banco</th>
                                        <th>Sucursal</th>
                                        <th>Número de Cuenta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-border" name="data[nameBank][]" placeholder="Banco A" required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[subsidiary][]" placeholder="Sucursal 1" required></td>
                                        <td><input type="text" class="form-control form-control-border" name="data[accountNumber][]" placeholder="<?= str_repeat(1, 5) ?>" required></td>
                                    </tr>
                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td> <button type="button" class="btn btn-secondary addRow" data-id="bank_table">Agregar Fila <i class="fas fa-plus"></i></button> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary previous" onclick="stepper.previous()">Anterior</button>
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-html="true" title="Complete los campos obligatorios <b class='mandatory'>*</b> para continuar">
                <button class="btn btn-primary next" data-form="1">Siguiente</button>
            </span>
        </div>
    </div>
</div>