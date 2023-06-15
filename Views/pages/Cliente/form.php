<h1>FORMULARIO DE CLIENTES</h1>
<div class="container">
  <div class="row">
  <div class="col-md-12 mt-5">
    <div id="stepper1" class="bs-stepper">
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
               <?= require_once 'forms/capacityForm.php'?>

                <!--Paso 2 (Situación financiera y requisitos legales)-->
                <?= require_once 'forms/financialForm'?>
       
                <!--Paso 3 (Capacidad operativa e infraestructura-->
                <?= require_once 'forms/managementForm'?>

                <!--Paso 4 (Sistema de gestión de calidad-->
                <?= require_once 'forms/qualityForm'?>

                <!--Paso 5 (Responsabilidad corporativa)-->
                <?= require_once 'forms/responsibilityForm' ?>
           </div>
    </div>
  </div>
</div>

       
          