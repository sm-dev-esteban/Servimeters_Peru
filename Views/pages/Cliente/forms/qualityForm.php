<!-- Form 4 -->
<div id="test-l-4" class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sistemas de gestión de calidad</h3>
                </div>

                <form id="quiality_form" class="validatable-form form_3">
                    <div class="card-body">
                        <div class="row">
                            <!-- Campo Responsable -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                                    <label>Escriba el nombre del responsable de Gestión de Calidad y el cargo.</label>
                                    <input type="text" class="form-control" name="data[responsable]" required>
                                </div>
                            </div>

                            <!-- Campo Auditoria -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Escriba los resultados de la última auditoría interna o externa.
                                        No. de Fortalezas / No. de Oportunidades de mejora / No. de No Conformidades</label>
                                    <input type="text" class="form-control" name="data[resultados_auditoria]" required>
                                </div>
                            </div>

                            <!-- Campo Revisión y Aprobación-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿La documentación que utiliza tiene controles de revisión y aprobación?</label>
                                    <select class="custom-select" name="data[revision_aprobacion_documentacion]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo Auditoria -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Escriba el documento que utiliza para el control de documentos y registros y el tratamiento de
                                        trabajos o productos no conformes.
                                        (Nombre / Código / Versión / Fecha de aprobación AAAA-MM-DD)</label>
                                    <input type="text" class="form-control" name="data[control_documentos]" placeholder="Nombre / Código / Versión / Fecha de aprobación AAAA-MM-DD" required>
                                </div>
                            </div>

                            <!-- Campo Garantia-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Indique el tipo de garantía que ofrece sobre los productos o servicios a homologar.</label>
                                    <input type="text" class="form-control" name="data[tipo_garantia]" required>
                                </div>
                            </div>

                            <!-- Campo Planeación y Programación-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Escriba como la empresa realiza la planeación y programación del producto o servicio a
                                        homologar.</label>
                                    <input type="text" class="form-control" name="data[planeacion_programacion]" required>
                                </div>
                            </div>


                            <!-- Campo Control stock-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Escriba como identifica y mantiene el control del stock de los insumos y productos.</label>
                                    <input type="text" class="form-control" name="data[control_stock]" required>
                                </div>
                            </div>

                            <!-- Campo Subcontratados-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Escriba como la empresa realiza el control de los procesos subcontratados asociados al producto o
                                        servicio a homologar.</label>
                                    <input type="text" class="form-control" name="data[control_subcontratados]" required>
                                </div>
                            </div>

                            <!-- Campo Controles y Auditorias-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿Realiza controles o auditorias sobre su cadena de suministro?</label>
                                    <select class="custom-select" name="data[controles_auditorias_cadena_suministro]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo Revisión y Aprobación-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿La documentación que utiliza tiene controles de revisión y aprobación?</label>
                                    <select class="custom-select" name="data[revision_aprobacion_documentacion2]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>



    <!--Adjunto de archivos-->
    <?php include_once('sgcDocuments.php') ?>

    <div class="col-md-12">
        <button class="btn btn-primary previous" onclick="stepper.previous()">Anterior</button>
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-html="true" title="Complete los campos obligatorios <b class='mandatory'>*</b> para continuar">
            <button class="btn btn-primary next" data-form="3">Siguiente</button>
        </span>
    </div>
</div>
</div>