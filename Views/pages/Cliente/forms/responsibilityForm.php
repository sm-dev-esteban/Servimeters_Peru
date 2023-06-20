<?php
  require_once 'Controllers/customer.controller.php';
?>

<div id="test-l-5" class="content">
    <h5 class="text-center p-3">Responsabilidad Corporativa</h5>
    <form id="resposibilityForm" method="post">
    <div class="row">
        <!--Campo Número de empleados-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="###">Número de Empleados(Fijos / Subcontratados)</label>
                <input type="text" name="data[numero_empleados]" class="form-control" id="###" placeholder="Ingrese el número de empleados" required>
            </div>
        </div>

        <!--Campo Empleados Contrato-->
        <div class="col-md-12">
            <div class="form-group">
                <label>¿Todos los empleados de su organización tienen contrato?</label>
                <select class="form-control" name="data[empleados_contrato]">
                    <option>Si</option>
                    <option>No</option>
                </select>
            </div>
        </div>

        <!--Campo Código de conducto-->
        <div class="col-md-12">
            <div class="form-group">
                <label>¿La empresa posee código de conducto, ética o similar de los empleados?</label>
                <select class="form-control" name="data[codigo_conducto]">
                    <option>Si</option>
                    <option>No</option>
                </select>
            </div>
        </div>

        <!--Campo Responsabilidad Corporativa-->
        <div class="col-md-12">
            <div class="form-group">
                <label>¿La empresa posee Política de Responsabilidad Corporativa?</label>
                <select class="form-control" name="data[politica_responsabilidad_corporativa]">
                    <option>Si</option>
                    <option>No</option>
                </select>
            </div>
        </div>

        <!--Campo Contratación Legal-->
        <div class="col-md-12">
            <div class="form-group">
                <label>¿Cumple con la reserva legal de contratación de personas con discapacidad según RD legislativo
                    1/2013?</label>
                <select class="form-control" name="data[cumplimiento_contratacion_discapacidad]">
                    <option>Si</option>
                    <option>No</option>
                </select>
            </div>
        </div>

        <!--Campo Ultima auditoria-->
        <div class="col-md-12">
            <div class="form-group">
                <label for="###">Escriba los resultados de la última auditoría interna o externa del
                    Sistema de Seguridad y Salud en el Trabajo.
                    No. de Fortalezas / No. de Oportunidades de mejora / No. de No Conformidades </label>
                <input type="text" name="data[auditoria_resultados]" class="form-control" id="###" placeholder="Enter email" required>
            </div>
        </div>

        <!--Campo Prevención de Riesgo-->
        <div class="col-md-12">
            <div class="form-group">
                <label>¿Dispone del servicio de Prevención de Riesgo Laborales?</label>
                <select class="form-control" name="data[servicio_prevencion_riesgos]">
                    <option>Si</option>
                    <option>No</option>
                </select>
            </div>
        </div>

        <!--Campo Formación Prevención de Riesgo-->
        <div class="col-md-12">
            <div class="form-group">
                <label>¿Sus trabajadores tienen formación de Prevención de Riesgos Laborales?</label>
                <select class="form-control" name="data[formacion_prevencion_riesgos]">
                    <option>Si</option>
                    <option>No</option>
                </select>
            </div>
        </div>

        <!--Campo Riesgos Ambientales-->
        <div class="col-md-12">
            <div class="form-group">
                <label>¿Con base en su matriz de riesgos ambientales como impacta el servicio o producto que ofrece su
                    empresa al medio ambiente?*</label>
                <select class="form-control" name="data[impacto_medio_ambiente]">
                    <option>Minimo</option>
                    <option>Moderado</option>
                    <option>Alto</option>
                </select>
            </div>
        </div>

        <!--Campo Suministración Empresa-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="###">¿Qué productos o servicios suministra la empresa que sean sostenibles
                    con el medio ambiente?</label>
                <input type="text" name="data[productos_sostenibles]" class="form-control" id="###" placeholder="Enter email" required>
            </div>
        </div>

        <!--Campo Embajales Retornables-->
        <div class="col-md-12">
            <div class="form-group">
                <label>¿Utiliza embalajes retornables?</label>
                <select class="form-control" name="data[utiliza_embalajes_retornables]">
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

        <!--Adjunto de archivos-->
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><em>Adjuntar la siguiente información:</em></h3><br>
                    <ul>
                        <li class="nav-item">1. Documento asociado a la protección de datos de carácter personal. </li>
                        <li class="nav-item">2. Certificación del Sistema Gestión de Seguridad y Salud en el Trabajo
                            (ISO
                            45001).</li>
                        <li class="nav-item">3. Certificación del Sistema Gestión de Ambiental (ISO 14001)</li>
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
            <button class="btn btn-primary" onclick="stepper.next()">Enviar</button>
        </div>
    </div>
</div>