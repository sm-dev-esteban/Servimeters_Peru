<?php
//Evalua si cumple con los permisos
if (!isset($_POST['id']) || strcmp($_SESSION['rol'], 'Auditor') !== 0)
    echo '<script>window.location.href= "' . SERVERSIDE . '"</script>';

$id = $_POST['id'];
$cliente = $_POST['cliente'];
$idcliente = $_POST['idcliente'];

require_once('Controllers/formulario.controller.php');

$data = FormController::loadDataForms();
$dataDocs = FormController::loadDocsForm();

// var_dump($data);

if (empty($data) || empty($dataDocs)) {
    echo '<script>window.location.href= "' . SERVERSIDE . '"</script>';
}
?>

<style>
    .loadFormDoc {
        min-height: 500px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-clipboard text-muted"></i> Revision de Formulario: <span class="text-primary"><?= $id ?></span> Cliente: <span class="text-primary"><?= $cliente ?></span></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2" id="menu">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" id="formsTab" href="#forms" data-toggle="tab">Formulario</a></li>
                            <li class="nav-item"><a class="nav-link" id="docsTab" href="#docs" data-toggle="tab">Documentos</a></li>
                            <li class="nav-item"><a class="nav-link" id="closeTab" href="#cierre" data-toggle="tab">Cierre</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="forms">
                                <!-- Data -->
                                <!-- <span id="data" data-terminos='<?= $terminos ?>' hidden></span> -->
                                <!-- /.Data -->
                                <!-- Capacity -->
                                <div class="post">
                                    <?php include_once(FOLDERSIDE . 'Views/pages/Cliente/forms/capacityForm.php'); ?>
                                    <!-- Alert -->
                                    <div class="alert alert-danger alert-dismissible" hidden>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-exclamation-triangle"></i> Aviso!</h5>
                                        Los terminos y condiciones no fueron aceptados por el cliente en este formulario.
                                    </div>
                                    <!-- /.Alert -->
                                </div>
                                <!-- /.Capacity -->

                                <!-- Financial -->
                                <div class="post clearfix">
                                    <?php include_once(FOLDERSIDE . 'Views/pages/Cliente/forms/financialForm.php'); ?>
                                </div>
                                <!-- /.Financial -->

                                <!-- Management -->
                                <div class="post">
                                    <?php include_once(FOLDERSIDE . 'Views/pages/Cliente/forms/managementForm.php'); ?>
                                </div>
                                <!-- /.Management -->

                                <!-- Quality -->
                                <div class="post">
                                    <?php include_once(FOLDERSIDE . 'Views/pages/Cliente/forms/qualityForm.php'); ?>
                                </div>
                                <!-- /.Quality -->

                                <!-- Responsibility -->
                                <div class="post">
                                    <?php include_once(FOLDERSIDE . 'Views/pages/Cliente/forms/responsibilityForm.php'); ?>
                                </div>
                                <!-- /.Responsibility -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="docs">
                                <!-- Docs Financial -->
                                <div class="post">
                                    <div class="row">
                                        <!-- START ACCORDION & CAROUSEL-->
                                        <div class="col-md-5">
                                            <div class="card">
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                                    <div id="accordion">
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h4 class="card-title w-100">
                                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                                        Documentos Financieros
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <div id="financialDocuments" class="loadFormDoc" data-color="primary">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card card-danger">
                                                            <div class="card-header">
                                                                <h4 class="card-title w-100">
                                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                                                        Documentos SGC
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <div id="sgcDocuments" class="loadFormDoc" data-color="danger">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card card-success">
                                                            <div class="card-header">
                                                                <h4 class="card-title w-100">
                                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                                                        Documentos de Responsabilidad
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <div id="responsabilityDocuments" class="loadFormDoc" data-color="success">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- END ACCORDION & CAROUSEL-->
                                        <div class="col-md-7">
                                            <object data="" type="application/pdf" width="100%" height="100%"></object>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="cierre">
                                <div class="post">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-md-10 mt-5">
                                            <h4>Cierre del Proceso de Evaluación</h4>
                                        </div>
                                        <div class="col-md-10 mt-5 mb-5">
                                            <form id="evaluacion">
                                                <div class="form-group">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="checkboxPrimary1">
                                                        <label for="checkboxPrimary1">
                                                            El cliente cumple con el <span class="text-primary"> proceso de Homologación</span>
                                                        </label>
                                                        <input type="text" id="valueCheck" name="cumple" value="No Cumple" hidden>
                                                        <input type="text" name="proceso" value="<?= $id ?>" hidden>
                                                    </div>

                                                </div>
                                                <button type="button" class="btn btn-app bg-danger" id="closeForm"><i class="fas fa-save"></i> Cerrar Evaluacion</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item" id="up"><a class="nav-link" href="#menu"><i class="fas fa-arrow-up"></i> Subir</a>
                        </ul>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    $(document).ready(async function() {
        $('#next, .next, .hideForm, .previous, .select2-search, .addRow').prop('hidden', true);

        var data = '<?php echo json_encode($data); ?>';
        data = JSON.parse(data);

        for (const key in data) {
            if (Object.hasOwnProperty.call(data, key)) {
                var values = data[key];

                var elements = await getElements(key);

                if (['financial_sell_form_1', 'financial_sell_form_2', 'financial_sell_form_3', 'policies_form', 'banks_form', 'contracting_service_form', 'service_provision_form', 'service_provision_product_form'].includes(key)) {
                    setDataTable(key, values, elements);
                } else {
                    await printData(values, elements);
                }
            }
        }
        $('input, select, checkbox').prop('disabled', true);

        loadFormsDocs();
        showDocs();
        upPage();
        closeEvaluate();
        ValidationForms.addRows();
    })

    function printData(values, elements) {
        return new Promise((resolve, reject) => {
            elements.forEach(input => {
                var value = values[input.name.replace(/data/g, '').replace(/\[/g, '').replace(/\]/g, '')];
                switch (input.type) {
                    case 'select-multiple':
                        // console.log(`${input.name} -->`, value.split('|/|'));
                        if (value !== undefined && value !== null) {
                            value = value.split('|/|');
                            $('.select2').val(value).trigger('change');
                        }
                        break;
                    case 'checkbox':
                        if (value === 'on') {
                            $(input).attr('checked', true);
                        } else {
                            $('.alert').prop('hidden', false);
                        }
                        break;
                    default:
                        input.value = value;
                        break;
                }

            });
            resolve(true);
        })
    }

    function printDataTable(values, elements) {
        return new Promise((resolve, reject) => {
            var inputs;
            for (const key in values) {
                // console.log(key);
                inputs = elements.filter(function(e) {
                    return e.name === `data[${key}][]`;
                });
                // console.log(inputs);

                if (inputs.length > 0) {
                    var val = values[key];
                    // console.log(val);
                    val = val.toString().split('|/|');
                    for (let i = 0; i < val.length; i++) {
                        inputs[i].value = val[i];
                    }
                }
            }
            resolve(true);
        })
    }

    function getElements(key) {
        return new Promise((resolve, reject) => {
            var form = document.getElementById(`${key}`);
            var inputs = form.querySelectorAll("input");
            var selects = form.querySelectorAll("select");
            resolve(Array.from(inputs).concat(Array.from(selects)));
        })
    }

    async function setDataTable(key, values, elements) {
        var value = values[elements[1].name.replace(/data/g, '').replace(/\[/g, '').replace(/\]/g, '')];
        if (value !== undefined) {
            value = value.toString().split('|/|');
            var countRows = value.length
            console.log(countRows);
            if (countRows >= 1) {
                // console.log('Tiene mas de una fila: ' + countRows + ' -- ', elements[1].name);
                var table = $(`#${key}`).children('table');
                await addRows(table, values, (countRows - 1));
                var elements = await getElements(key);
                await printDataTable(values, elements);
                $('input, select, checkbox').prop('disabled', true);
                return;
            }
        }
    }

    function addRows(table, values, count = 1) {
        return new Promise((resolve, reject) => {
            setTimeout(async () => {
                // (key === 'policies_form') ? $('#addRowPolicies').click(): $('#addRowBanks').click();
                var id = $(table).attr('id');
                ValidationForms.printRows(id, count);
                resolve(true);
            }, 100);
        })
    }

    async function loadFormsDocs() {

        var formsDocs = document.getElementsByClassName('loadFormDoc');
        formsDocs.forEach(e => {
            var span = `<span class="loadFile btn btn-${e.dataset.color}">
                            <i class="fas fa-eye"></i> Ver
                        </span>`;
            $.ajax({
                url: `${SERVERSIDE}Views/pages/Cliente/forms/${e.id}.php`,
                method: 'GET',
                dataType: 'html',
                beforeSend: function() {

                },
                success: function(res) {
                    $(`#${e.id}`).html(res).find('.custom-file').replaceWith(span);
                    $(`#${e.id}`).find('.card-header').prop('hidden', true);
                    $(`#${e.id}`).find('form').addClass('seeDocs');
                    $(`#${e.id} .loadFile`).parent('div').removeClass('col-md-4').addClass('col-md-3').parent('div').addClass('justify-content-center');
                }
            });
        });

    }

    function loadDocs(ejecutar) {

        if (!ejecutar) {
            return false;
        }

        var dataDocs = '<?php echo json_encode($dataDocs); ?>';
        dataDocs = JSON.parse(dataDocs);
        var form;

        for (const key in dataDocs) {
            var forms = document.getElementsByClassName(`seeDocs`);
            forms.forEach(e => {
                if (e.id == key) {
                    form = e;
                }
            })
            var span = $(form).find('.loadFile');
            var values = dataDocs[key];

            for (var i = 0; i < span.length; i++) {
                span[i].dataset.file = values[`adjunto${i + 1}`];
            }
        }
    }

    function showDocs() {
        var ejecutar = true;
        $('#docsTab').on('click', async function(e) {
            $('.hideForm').prop('hidden', false);
            loadDocs(ejecutar);
            seeDoc();
            ejecutar = false;
        });

        $('#formsTab').on('click', function(e) {
            $('.hideForm').prop('hidden', true);
            $('input').prop('disabled', true);
        });
    }

    function seeDoc() {
        $('.loadFile').on('click', function() {
            var url = $(this).data('file');
            $('object').attr('data', url);
        })
    }

    function upPage() {
        $('#up').on('click', function() {
            $('html, body').animate({
                scrollTop: $('#menu').offset().top
            }, 500)
        })
    }

    function closeEvaluate() {
        $('#closeTab').on('click', function() {
            $('input').prop('disabled', false);
            $('span.error').replaceAll('');
            confirmClose();
        });
    }

    function confirmClose() {
        $('#closeForm').on('click', async function() {
            var res = await showSwal('¿Desea cerrar la evaluación?', 'warning', 'Confirme para continuar con el cierre', {
                showCancelButton: true,
                confirmButtonText: 'Si, cerrar!',
                cancelButtonText: 'No, cancelar!'
            });

            if (res) {
                closeEvaluation();
            }
        })
    }

    async function closeEvaluation() {
        try {
            $('#valueCheck').val($('#checkboxPrimary1').is(':checked') ? 'Cumple' : 'No Cumple');
            var form = document.getElementById('evaluacion');
            var data = new FormData(form);

            var result = await requestController('Evaluacion', 'insert', data);

            if (!result.Result.status) {
                throw new Error('Fallo en el resultado');
            }

            let processData = new FormData();
            var idProceso = '<?php echo $id ?>';
            processData.append('id', idProceso);
            processData.append('estado', 'evaluado');

            result = await requestController('proceso', 'update', processData);
            if (!result.Result.status) {
                throw new Error('No se actualizo el proceso');
            }

            var res = await showSwal('!Cerrado!');

            if (res) {
                window.location.href = SERVERSIDE + 'Auditor/evaluacion'
            }

        } catch (error) {
            await showSwal('Error en la operacion!', 'info');
            console.error(error);
            return false;
        }

    }
</script>