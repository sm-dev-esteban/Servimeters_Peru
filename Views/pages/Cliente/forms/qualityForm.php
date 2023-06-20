<?php
  require_once 'Controllers/customer.controller.php';
?>

<div id="test-l-4" class="content">
    <h5 class="text-center p-3">Sistemas de gestión de calidad</h5>
    <form id="quialityForm" method="post">
    <div class="row">
        <!-- Campo Responsable -->
        <div class="col-md-6">
            <div class="form-group" style="margin-top: 1.5rem;">
                <label>Escriba el nombre del responsable de Gestión de Calidad y el cargo.</label>
                <input type="text" class="form-control" name="data[responsable]" required>
            </div>
        </div>

        <!-- Campo Auditoria -->
        <div class="col-md-6">
            <div class="form-group">
                <label>Escriba los resultados de la última auditoría interna o externa.
                    No. de Fortalezas / No. de Oportunidades de mejora / No. de No Conformidades</label>
                <input type="text" class="form-control" name="data[resultados_auditoria]">
            </div>
        </div>

        <!-- Campo Revisión y Aprobación-->
        <div class="col-md-6">
            <div class="form-group" style="margin-top: 2rem;">
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
                <input type="text" class="form-control" name="data[control_documentos]" required>
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
                <input type="text" class="form-control" name="data[control_stock]">
            </div>
        </div>

        <!-- Campo Subcontratados-->
        <div class="col-md-6">
            <div class="form-group">
                <label>Escriba como la empresa realiza el control de los procesos subcontratados asociados al producto o
                    servicio a homologar.</label>
                <input type="text" class="form-control" name="data[control_subcontratados]">
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
          <!--Botón de envio-->
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary m-3">Enviar</button>
        </div>
        </form>
        <?php $result = CustomerController::createCustomer(); ?>

        <div class="col-md-12">
            <!--Adjunto de archivos-->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><em>Adjuntar los siguientes documentos:</em></h3><br>
                    <ul>
                        <li class="nav-item">1. Certificado de Sistema de Gestión de Calidad (ISO 9001) que relacione el
                            servicio o producto a homologar.</li>
                        <li class="nav-item">2. Ficha técnica del servicio o producto a homologar.</li>
                        <li class="nav-item">3. Documento con el cual gestiona y analizan las acciones correctivas.</li>
                        <li class="nav-item">4. Documento en el cual se han definido las competencias del personal que
                            incluyan Cargo y Educación.</li>
                        <li class="nav-item">5. Plan o programa de mantenimiento y calibración de los equipos
                            relacionados
                            en la sección de capacidad operativa y que influyen en la calidad del servicio o producto a
                            homologar</li>
                        <li class="nav-item">6. Procedimiento de evaluación de proveedores.</li>
                        <li class="nav-item">7. Procedimiento de inspección de productos, materiales o insumos
                            comprados.
                        </li>
                        <li class="nav-item">8. Procedimiento utilizado para realizar el control de calidad una vez
                            finalizado el servicio el cual indique como afrontar retrasos en la fabricación de productos
                            o
                            servicios.</li>
                        <li class="nav-item">9. Resultado del análisis de los resultados de las evaluaciones de
                            satisfacción
                            del cliente.</li>
                        <li class="nav-item">10. Procedimiento de quejas.</li>
                    </ul>
                </div>
                <div class="card-body">
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
                    <input type="file" name="" id="" class="form-control">
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
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
            <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
        </div>
    </div>
</div>