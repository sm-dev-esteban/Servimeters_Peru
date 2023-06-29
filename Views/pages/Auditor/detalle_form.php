<?php
//Evalua si cumple con los permisos
if (!isset($_POST['id']) || strcmp($_SESSION['rol'], 'Admin') !== 0)
    echo '<script>window.location.href= "' . SERVERSIDE . '"</script>';

$id = $_POST['id'];
$terminos = $_POST['terminos'];
$forms = array('financial_form', 'financial_sell_form_1', 'financial_sell_form_2', 'financial_sell_form_3', 'policies_form', 'banks_form', 'management_form', 'quiality_form', 'responsability_form');
$formsDocs = array('financial_documents_form');
$data = array();
$dataDocs = array();
require_once('Controllers/formulario.controller.php');
foreach ($forms as $form) {
    $data[$form] = FormController::getForm($id, $form);
}

foreach ($formsDocs as $formDoc) {
    $dataDocs[$formDoc] = FormController::getForm($id, $formDoc);
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Revision de Formulario <?= $id ?></h1>
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
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active formsTab" href="#forms" data-toggle="tab">Formulario</a></li>
                            <li class="nav-item"><a class="nav-link docsTab" href="#docs" data-toggle="tab">Documentos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Cierre</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="forms">
                                <!-- Data -->
                                <span id="data" data-terminos='<?= $terminos ?>' hidden></span>
                                <!-- /.Data -->
                                <!-- Capacity -->
                                <div class="post">
                                    <?php include_once(FOLDERSIDE . 'Views/pages/Cliente/forms/capacityForm.php'); ?>
                                    <?php if (strcmp($terminos, 'on') !== 0) {  ?>
                                        <!-- Alert -->
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> Aviso!</h5>
                                            Los terminos y condiciones no fueron aceptados por el cliente en este formulario.
                                        </div>
                                        <!-- /.Alert -->
                                    <?php } ?>
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
                                        <div class="col-md-6" id="financialDocs">

                                        </div>
                                        <!-- END ACCORDION & CAROUSEL-->
                                        <div class="col-md-7">
                                            <object data="" type="application/pdf" width="100%" height="100%"></object>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active formsTab" href="#forms" data-toggle="tab">Formulario</a></li>
                            <li class="nav-item"><a class="nav-link docsTab" href="#docs" data-toggle="tab">Documentos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Cierre</a></li>
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
        $('#next, .next, .hideForm, .previous, .select2-search').prop('hidden', true);

        var data = $('#data');
        terminos = data.data('terminos');
        if (terminos === 'on') {
            $('#conditionBox').attr('checked', true);
        }

        var data = '<?php echo json_encode($data); ?>';
        data = JSON.parse(data);

        for (const key in data) {
            if (Object.hasOwnProperty.call(data, key)) {
                var values = data[key][0];

                var elements = await getElements(key);

                if (['policies_form', 'banks_form'].includes(key)) {
                    if ((Object.keys(values).length - 2) > elements.length) {
                        await addRows(key, values);
                    } else {
                        await printData(values, elements);
                    }
                } else {
                    await printData(values, elements);
                }
            }
        }

        $('input, select, checkbox').prop('disabled', true);
        loadDocs();
        showDocs();
    })

    function printData(values, elements) {
        return new Promise((resolve, reject) => {
            elements.forEach(input => {
                var value = values[input.name.replace(/data/g, '').replace(/\[/g, '').replace(/\]/g, '')];
                // console.log(`${input.name} -->`, input.name.replace(/data/g, '').replace(/\[/g, '').replace(/\]/g, ''));
                switch (input.type) {
                    case 'select-multiple':
                        // console.log(`${input.name} -->`, value.split('|/|'));
                        value = value.split('|/|');
                        $('.select2').val(value).trigger('change');
                        // input.value = value;
                        break;
                    default:
                        input.value = value;
                        break;
                }

            });
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

    function addRows(key, values) {
        return new Promise((resolve, reject) => {
            setTimeout(async () => {
                (key === 'policies_form') ? $('#addRowPolicies').click(): $('#addRowBanks').click();
                var elements = await getElements(key);
                await printData(values, elements);
                resolve(true);
            }, 100);
        })
    }

    async function loadDocs() {

        var span = `<span id="" class="loadFile btn btn-primary">
                                    Ver
                                </span>`;

        $.ajax({
            url: `${SERVERSIDE}Views/pages/Cliente/forms/financialDocuments.php`,
            method: 'GET',
            dataType: 'html',
            success: function(res) {
                var html = $(res).find('.custom-file').html(span);
                console.log(html);
                $('#financialDocs').html(html);
                // console.log(res);
            }
        })

        var dataDocs = '<?php echo json_encode($dataDocs); ?>';
        dataDocs = JSON.parse(dataDocs);

        // for (const key in dataDocs) {
        //     var values = dataDocs[key][0];
        //     var elements = await getElements(key);
        //     elements.forEach(e => {
        //         if (e.type === 'file') {
        //             console.log('Cambiando File');
        //             var $file = $(e).parent('div')[0];
        //             var id = e.id;
        //             var span = `<span id="${id}" class="loadFile btn btn-primary" data-file="${values[e.name.replace(/file/g, '').replace(/\[/g, '').replace(/\]/g, '')]}">
        //                             Ver
        //                         </span>`;

        //             $file.innerHTML = span;
        //         }
        //     })
        // }

    }

    function showDocs() {
        $('.docsTab').on('click', async function(e) {
            $('.hideForm').prop('hidden', false);

        });

        $('.formsTab').on('click', function(e) {
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

            var result = await requestController('formulario', 'registerForm', data, `entity=${form.id}`);

            if (!result.Result.status) {
                throw new Error('Fallo en el resultado');
            }

            let userData = new FormData();
            var idcliente = '<?php echo $idcliente ?>';
            userData.append('id', idcliente);
            userData.append('estado', 'evaluado');

            result = await requestController('Usuario', 'updateStateUser', userData);
            console.log(result);
            if (!result.Result) {
                throw new Error('No se actualizo el cliente');
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