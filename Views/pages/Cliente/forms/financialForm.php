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
                <form id="financialForm">
                    <div class="card-body">
                        <!--Campo Empresa-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
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
                                    <label for="###">Domicilio Fiscal*</label>
                                    <input type="text" class="form-control" name="data[domicilio_fiscal]" id="###" placeholder="Ingrese el domicilio fiscal" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Campo Código Postal-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Código Postal*</label>
                                    <input type="text" class="form-control" name="data[codigo_postal]" id="###" placeholder="Ingrese el código postal" required>
                                </div>
                            </div>

                            <!--Campo Providencia/Población/Pais-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Providencia/Población/Pais</label>
                                    <input type="text" class="form-control" name="data[providencia_poblacion_pais]" id="###" placeholder="Ingrese las siguientes opciones" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Campo Llenado por -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="###">Llenado por*:</label>
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
                                <div class="form-group" style="margin-top: 1.5rem;">
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
                                <input type="text" class="form-control" name="data[capital_social]" id="###" placeholder="Ingrese la capital social de la mepresa en dólares" required>
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
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Adjuntar los siguientes documentos:</h3>
                </div>
                <form id="financialDocumentForm">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                                <label for="adjunto1">1. Certificado de Cámara y Comercio no mayor a 30 días.</label>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[adjunto1]" id="adjunto1" accept=".pdf" required>
                                    <label class="custom-file-label" for="adjunto1">Subir archivo</label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="adjunto2">2. Balance del último año junto con las notas.</label>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[adjunto2]" id="adjunto2" accept=".pdf" required>
                                    <label class="custom-file-label" for="adjunto2">Subir archivo</label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="adjunto3">3. En un solo archivo los últimos seis meses de pagos a ESSALUD.</label>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[adjunto3]" id="adjunto3" accept=".pdf" required>
                                    <label class="custom-file-label" for="adjunto3">Subir archivo</label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="adjunto4">4. En un solo archivo los últimos seis meses de pagos a APF / SNP.</label>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[adjunto4]" id="adjunto4" accept=".pdf" required>
                                    <label class="custom-file-label" for="adjunto4">Subir archivo</label>
                                </div>

                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="adjunto5">5. En un solo archivo los últimos seis meses de planillas de personal.</label>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[adjunto5]" id="adjunto5" accept=".pdf" required>
                                    <label class="custom-file-label" for="adjunto5">Subir archivo</label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="adjunto6">6. En un solo archivo los últimos seis meses de CTS (Compensación por tiempo de servicio).</label>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[adjunto6]" id="adjunto6" accept=".pdf" required>
                                    <label class="custom-file-label" for="adjunto6">Subir archivo</label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="adjunto7">7. Declaración Antisoborno y procedencia de los fondos de la empresa firmada por el representante legal.</label>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[adjunto7]" id="adjunto7" accept=".pdf" required>
                                    <label class="custom-file-label" for="adjunto7">Subir archivo</label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="adjunto8">8. Declaración que establezca que la documentación entregada es legítima y que exime a SM por cualquier daño o perjuicio por la información suministrada firmada por el representante legal.</label>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file[adjunto8]" id="adjunto8" accept=".pdf" required>
                                    <label class="custom-file-label" for="adjunto8">Subir archivo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-body">
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary text-center m-3">Enviar</button>
                    </div>
                </div> -->
                </form>
            </div>
        </div>
        <!-- Tabla de volumen-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Primera tabla -->
                                <label>1.1 En la siguiente tabla llene el volumen de ventas de los últimos tres años en
                                    dólares:</label>
                                <table id="###" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Año 1</th>
                                            <th>Sector</th>
                                            <th>Ventas Totales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td contenteditable="true">2020</td>
                                            <td contenteditable="true">Sector B</td>
                                            <td contenteditable="true">$150,000</td>
                                        </tr>
                                        <tr>
                                            <td contenteditable="true">2021</td>
                                            <td contenteditable="true">Sector A</td>
                                            <td contenteditable="true">$120,000</td>
                                        </tr>
                                        <tr>
                                            <td contenteditable="true">2021</td>
                                            <td contenteditable="true">Sector B</td>
                                            <td contenteditable="true">$180,000</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right"><strong>Total</strong></td>
                                            <td contenteditable="true"><strong>$550,000</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Segunda tabla -->
                            <div class="col-md-6">
                                <table id="editable-table-2" class="table table-bordered" style="margin-top: 1.5rem;">
                                    <label>Información adicional</label>
                                    <thead>
                                        <tr>
                                            <th>Año 2</th>
                                            <th>Sector</th>
                                            <th>Ventas Totales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td contenteditable="true" name="name[anno]">2020</td>
                                            <td contenteditable="true">Sector A</td>
                                            <td contenteditable="true">$100,000</td>
                                        </tr>
                                        <tr>
                                            <td contenteditable="true">2020</td>
                                            <td contenteditable="true">Sector B</td>
                                            <td contenteditable="true">$150,000</td>
                                        </tr>
                                        <tr>
                                            <td contenteditable="true">2021</td>
                                            <td contenteditable="true">Sector A</td>
                                            <td contenteditable="true">$120,000</td>
                                        </tr>
                                        <tr>
                                            <td contenteditable="true">2021</td>
                                            <td contenteditable="true">Sector B</td>
                                            <td contenteditable="true">$180,000</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right"><strong>Total</strong></td>
                                            <td contenteditable="true"><strong>$550,000</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Tabla de pólizas-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <label>1.2 En la siguiente tabla llene las Pólizas con las cuales cuenta la empresa:</label>
                        <table id="###" class="table table-bordered">
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
                                    <td contenteditable="true">Entidad A</td>
                                    <td contenteditable="true">001</td>
                                    <td contenteditable="true">2023-01-01</td>
                                    <td contenteditable="true">Detalles de la póliza A</td>
                                </tr>
                                <tr>
                                    <td contenteditable="true">Entidad B</td>
                                    <td contenteditable="true">002</td>
                                    <td contenteditable="true">2023-02-15</td>
                                    <td contenteditable="true">Detalles de la póliza B</td>
                                </tr>
                                <tr>
                                    <td contenteditable="true">Entidad C</td>
                                    <td contenteditable="true">003</td>
                                    <td contenteditable="true">2023-03-10</td>
                                    <td contenteditable="true">Detalles de la póliza C</td>
                                </tr>
                                <!-- Agrega más filas según sea necesario -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--Tabla de bancos-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <label>1.3 En la siguiente tabla llene los Bancos con los cuales trabaja la empresa:</label>
                        <table id="###" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Banco</th>
                                    <th>Sucursal</th>
                                    <th>Número de Cuenta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td contenteditable="true">Banco A</td>
                                    <td contenteditable="true">Sucursal 1</td>
                                    <td contenteditable="true">123456789</td>
                                </tr>
                                <tr>
                                    <td contenteditable="true">Banco B</td>
                                    <td contenteditable="true">Sucursal 2</td>
                                    <td contenteditable="true">987654321</td>
                                </tr>
                                <tr>
                                    <td contenteditable="true">Banco C</td>
                                    <td contenteditable="true">Sucursal 3</td>
                                    <td contenteditable="true">456789123</td>
                                </tr>
                                <!-- Agrega más filas según sea necesario -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
            <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>

        </div>
    </div>
</div>