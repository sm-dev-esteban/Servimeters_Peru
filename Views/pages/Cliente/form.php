<?php
if (!isset($_POST['process'])) {
    echo '<script>window.location.href= "' . SERVERSIDE . 'Cliente/list_procesos"</script>';
}

$process = $_POST['process'];
$status = $_POST['status'];
?>

<style>

    :root{
        --duration: 1.5s;
    }

    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: normal;
    }

    .active .bs-stepper-circle,
    .btn-primary {
        background-color: #0473a4;
        border-color: #0473a4;
    }

    .disabledNext {
        background-color: tomato !important;
    }

    #test-l-1{
        animation: fadeIn var(--duration);
    }

    #test-l-2{
        animation: fadeIn var(--duration);
    }

    #test-l-3{
        animation: fadeIn var(--duration);
    }

    #test-l-4{
        animation: fadeIn var(--duration);
    }

    #test-l-5{
        animation: fadeIn var(--duration);
    }
    
    @keyframes fadeIn {
        -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  }
  @-webkit-keyframes fadeIn {
  0% {opacity: 0;}
  100% {opacity: 1;}
  }
  @keyframes fadeIn {
  0% {opacity: 0;}
  100% {opacity: 1;}
    }

</style>
<!-- Form -->
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
                        <?php if (strcmp($status, 'asignado') !== 0) {
                            include('lockScreen.php');
                        } else { ?>
                            <!-- Steper -->
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
                                    <!-- step III -->
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
                                    <!--Paso 3 (Managment)-->
                                    <?php require_once 'forms/managementForm.php' ?>
                                    <!--Paso 4 (Managment)-->
                                    <?php require_once 'forms/qualityForm.php' ?>
                                    <!--Paso 5 (Responsabilidad corporativa)-->
                                    <?php require_once 'forms/responsibilityForm.php' ?>

                                </div>
                            </div>
                        <?php } ?>
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

        ValidationForms.addRows();
    })
</script>