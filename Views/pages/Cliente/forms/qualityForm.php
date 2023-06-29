<div id="test-l-4" class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sistemas de gestión de calidad</h3>
                </div>

                <form id="quialityForm" class="validatable-form form_3">
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


    <div class="col-md-12">
        <!--Adjunto de archivos-->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Adjuntar los siguientes documentos:</h3>
            </div>
            <form id="sgcDocumentsForm" class="validatable-form form_3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="data[usuario]" value="<?= $_SESSION['id'] ?>" hidden>
                            <label for="adjunto1">1. Certificado de Sistema de Gestión de Calidad (ISO 9001) que relacione el
                                servicio o producto a homologar.</label>
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
                            <label for="adjunto2">2. Ficha técnica del servicio o producto a homologar.</label>
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
                            <label for="adjunto3">3. Documento con el cual gestiona y analizan las acciones correctivas.</label>
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
                            <label for="adjunto4">4. Documento en el cual se han definido las competencias del personal que
                                incluyan Cargo y Educación.</label>
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
                            <label for="adjunto5">5. Plan o programa de mantenimiento y calibración de los equipos relacionados
                                en la sección de capacidad operativa y que influyen en la calidad del servicio o producto a
                                homologar.</label>
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
                            <label for="adjunto6">6. Procedimiento de evaluación de proveedores.</label>
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
                            <label for="adjunto7">7. Procedimiento de inspección de productos, materiales o insumos
                                comprados.</label>
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
                            <label for="adjunto8">8. Procedimiento utilizado para realizar el control de calidad una vez
                                finalizado el servicio el cual indique como afrontar retrasos en la fabricación de productos
                                o servicios.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file[adjunto8]" id="adjunto8" accept=".pdf" required>
                                <label class="custom-file-label" for="adjunto8">Subir archivo</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="adjunto9">9. Resultado del análisis de los resultados de las evaluaciones de
                                satisfacción del cliente.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file[adjunto9]" id="adjunto9" accept=".pdf" required>
                                <label class="custom-file-label" for="adjunto9">Subir archivo</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="adjunto10">10. Procedimiento de quejas.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file[adjunto10]" id="adjunto10" accept=".pdf" required>
                                <label class="custom-file-label" for="adjunto10">Subir archivo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- <div id="actions" class="row">
                        <div class="col-lg-6">
                            <div class="btn-group w-100">
                                <span class="btn  col fileinput-button">
                                    <i class="fas fa-plus"></i>
                                    <span>Agregar archivos</span>
                                </span>
                                <button type="submit" class="btn btn-primary col start">
                                    <i class="fas fa-upload"></i>
                                    <span>Subir Archivos</span>
                                </button>
                                <button type="reset" class="btn btn-warning col cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span>Cancelar Subida</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="fileupload-process w-100">
                                <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

            <!-- <div class="table table-striped files" id="previews">
                        <div id="template" class="row mt-2">
                            <div class="col-auto">
                                <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                            </div>
                            <div class="col d-flex align-items-center">
                                <p class="mb-0">
                                    <span class="lead" data-dz-name></span>
                                    <span data-dz-size></span>
                                </p>
                                <strong class="error text-danger" data-dz-errormessage></strong>
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-primary start">
                                        <i class="fas fa-upload"></i>
                                        <span>Start</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-warning cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancel</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-danger delete">
                                        <i class="fas fa-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> -->

        </div>
    </div>
    <div class="col-md-12">
        <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-html="true" title="Complete los campos obligatorios <b class='mandatory'>*</b> para continuar">
            <button class="btn btn-primary next" data-form="3">Siguiente</button>
        </span>
    </div>
</div>
</div>