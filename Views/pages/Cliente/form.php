<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">FORMULARIO DE CLIENTES</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="stepper" class="bs-stepper">
                            <div class="bs-stepper-header">
                                <!--step I-->
                                <div class="step" data-target="#test-l-1">
                                    <button type="button" class="btn step-trigger">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Paso</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <!--step II-->
                                <div class="step" data-target="#test-l-2">
                                    <button type="button" class="btn step-trigger">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Paso</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <!--step III-->
                                <div class="step" data-target="#test-l-3">
                                    <button type="button" class="btn step-trigger">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Paso</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <!--step IV-->
                                <div class="step" data-target="#test-l-4">
                                    <button type="button" class="btn step-trigger">
                                        <span class="bs-stepper-circle">4</span>
                                        <span class="bs-stepper-label">Paso</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <!--step v-->
                                <div class="step" data-target="#test-l-5">
                                    <button type="button" class="btn step-trigger">
                                        <span class="bs-stepper-circle">5</span>
                                        <span class="bs-stepper-label">Paso</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                    <!--Paso 1 (Introducción) -->
                                    <?php require_once 'forms/capacityForm.php' ?>
                                    <!--Paso 2 (Situación financiera y requisitos legales)-->
                                    <?php require_once 'forms/financialForm.php' ?>
                                    <!--Paso 3 (Capacidad operativa e infraestructura-->
                                    <?php require_once 'forms/managementForm.php' ?>
                                    <!--Paso 4 (Sistema de gestión de calidad-->
                                    <?php require_once 'forms/qualityForm.php' ?>
                                    <!--Paso 5 (Responsabilidad corporativa)-->
                                    <?php require_once 'forms/responsibilityForm.php' ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        window.stepper = new Stepper($('#stepper').get(0))
        $("form").on("submit", function(e) {
            e.preventDefault();
        });


        $(`[data-algo]`).on("click", function () {
            $(":invalid").removeClass("is-valid").addClass("is-invalid");
            $(":valid").removeClass("is-invalid").addClass("is-valid");
            stepper.previous()
            stepper.next()
        });
    })
</script>