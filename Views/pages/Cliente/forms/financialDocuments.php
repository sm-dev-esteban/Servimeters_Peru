<!-- Form Docs -->
<div class="col-12 hideForm">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Adjuntar los siguientes documentos:</h3>
        </div>
        <form id="financial_documents_form" class="validatable-form form_1 documents">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="data[proceso]" value="<?= $process ?>" hidden>
                        <label for="adjunto1">1. RUC no mayor a 30 días.</label>
                    </div>

                    <div class="col-md-2 pt-1 text-center">
                        <input type="checkbox">
                        <span class="custom-file-no-label" for="check1">No subir archivo</span>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file[adjunto1]" id="adjunto1" accept=".pdf" required>
                            <span class="custom-file-label" for="adjunto1">Subir archivo</span>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="adjunto2">2. Balance del último año junto con las notas.</label>
                    </div>

                    <div class="col-md-2 pt-1 text-center">
                        <input type="checkbox">
                        <span class="custom-file-no-label" for="check2">No subir archivo</span>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file[adjunto2]" id="adjunto2" accept=".pdf" required>
                            <span class="custom-file-label" for="adjunto2">Subir archivo</span>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="adjunto3">3. En un solo archivo los últimos seis meses de pagos a ESSALUD.</label>
                    </div>

                    <div class="col-md-2 pt-1 text-center">
                        <input type="checkbox">
                        <span class="custom-file-no-label" for="check3">No subir archivo</span>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file[adjunto3]" id="adjunto3" accept=".pdf" required required>
                            <span class="custom-file-label" for="adjunto3">Subir archivo</span>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="adjunto4">4. En un solo archivo los últimos seis meses de pagos a APF / SNP.</label>
                    </div>

                    <div class="col-md-2 pt-1 text-center">
                        <input type="checkbox">
                        <span class="custom-file-no-label" for="check4">No subir archivo</span>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file[adjunto4]" id="adjunto4" accept=".pdf" required>
                            <span class="custom-file-label" for="adjunto4">Subir archivo</sp>
                        </div>

                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="adjunto5">5. En un solo archivo los últimos seis meses de planillas de personal.</label>
                    </div>

                    <div class="col-md-2 pt-1 text-center">
                        <input type="checkbox">
                        <span class="custom-file-no-label" for="check5">No subir archivo</span>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file[adjunto5]" id="adjunto5" accept=".pdf" required>
                            <span class="custom-file-label" for="adjunto5">Subir archivo</span>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="adjunto6">6. En un solo archivo los últimos seis meses de CTS (Compensación por tiempo de servicio).</label>
                    </div>

                    <div class="col-md-2 pt-1 text-center">
                        <input type="checkbox" class="custom-no-file">
                        <span class="custom-file-no-label" for="check6">No subir archivo</span>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file[adjunto6]" id="adjunto6" accept=".pdf" required>
                            <span class="custom-file-label" for="adjunto6">Subir archivo</span>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="adjunto7">7. Declaración Antisoborno y procedencia de los fondos de la empresa firmada por el representante legal.</label>
                    </div>

                    <div class="col-md-2 pt-1 text-center">
                        <input type="checkbox" class="custom-no-file">
                        <span class="custom-file-no-label" for="check7">No subir archivo</span>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file[adjunto7]" id="adjunto7" accept=".pdf" required>
                            <span class="custom-file-label" for="adjunto7">Subir archivo</span>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="adjunto8">8. Declaración que establezca que la documentación entregada es legítima y que exime a SM por cualquier daño o perjuicio por la información suministrada firmada por el representante legal.</label>
                    </div>

                    <div class="col-md-2 pt-1 text-center">
                        <input type="checkbox">
                        <span class="custom-file-no-label" for="check8">No subir archivo</span>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file[adjunto8]" id="adjunto8" accept=".pdf" required>
                            <span class="custom-file-label" for="adjunto8">Subir archivo</span>
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