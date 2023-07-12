<!-- Form 5 -->
<div id="test-l-5" class="content">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Responsabilidad Corporativa</h3>
                </div>

                <form id="responsability_form" class="validatable-form form_4">
                    <div class="card-body">
                        <div class="row">
                            <!--Campo Número de empleados-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="data[proceso]" value="<?= $process ?>" hidden>
                                    <label for="###">Número de Empleados(Fijos / Subcontratados)</label>
                                    <input type="text" name="data[numero_empleados]" class="form-control" id="###" placeholder="Ingrese el número de empleados" required>
                                </div>
                            </div>

                            <!--Campo Empleados Contrato-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿Todos los empleados de su organización tienen contrato?</label>
                                    <select class="form-control" name="data[empleados_contrato]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>

                            <!--Campo Código de conducto-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿La empresa posee código de conducto, ética o similar de los empleados?</label>
                                    <select class="form-control" name="data[codigo_conducto]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>

                            <!--Campo Responsabilidad Corporativa-->
                            <div class="col-md-6">
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
                                    <input type="text" name="data[auditoria_resultados]" class="form-control" id="###" placeholder="Ingrese un texto" required>
                                </div>
                            </div>

                            <!--Campo Prevención de Riesgo-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿Dispone del servicio de Prevención de Riesgo Laborales?</label>
                                    <select class="form-control" name="data[servicio_prevencion_riesgos]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>

                            <!--Campo Formación Prevención de Riesgo-->
                            <div class="col-md-6">
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
                                    <input type="text" name="data[productos_sostenibles]" class="form-control" id="###" placeholder="Ingrese un texto" required>
                                </div>
                            </div>

                            <!--Campo Embajales Retornables-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>¿Utiliza embalajes retornables?</label>
                                    <select class="form-control" name="data[utiliza_embalajes_retornables]">
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!--Adjunto de archivos-->
        <?php include_once('responsabilityDocuments.php') ?>

        <div class="col-md-12">
            <button class="btn btn-primary previous" onclick="stepper.previous()">Anterior</button>
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-html="true" title="Complete los campos obligatorios <b class='mandatory'>*</b> para continuar">
                <button class="btn btn-primary next" data-form="4" id="sendForm" data-process="<?= $process ?>">Enviar</button>
            </span>
        </div>
    </div>
</div>