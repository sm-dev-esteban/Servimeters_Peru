<?php define("TABLE", "testForm") ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Prueba de formulario</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form id="test">
                    <div class="mb-3">
                        <label for="text_simple">Simple</label>
                        <input type="text" name="data[text_simple]" id="text_simple" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="file_simple">Simple</label>
                        <input type="file" name="file[file_simple]" id="file_simple" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="file_multip">Multitple</label>
                        <input type="file" name="file[file_multip][]" id="file_multip" class="form-control" multiple accept="image/*">
                    </div>
                    <div class="mb-3"><button class="btn btn-success">Enviar</button></div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead></thead>
                        <tbody></tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $("#test").on("submit", function(e) {
        e.preventDefault();
        $.ajax("<?= SERVERSIDE ?>Views/pages/test/back.php?table=<?= TABLE ?>", {
            processData: false,
            cache: false,
            contentType: false,
            data: new FormData(this),
            type: "POST",
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                loadTable();
            }
        })
    }).ready(function() {
        loadTable();
    });

    function loadTable() {
        tfoot_thead = ``;
        tbody = ``;
        $table = $("#table");
        let data = AutomaticForm("getDataSql", ["<?= TABLE ?>"]);
        if (data !== false) {
            allKeys = Object.keys(data);
            keys = Object.keys(data[0]);
            for (q in keys) {
                tfoot_thead += `<th>${keys[q]}</th>`;
            }
            $table.find("thead, tfoot, tbody").html("");
            $table.find("thead, tfoot").append(`<tr>${tfoot_thead}</tr>`);
            for (q in data) {
                tbody = ``;
                for (w in data[q]) {
                    tbody += `<td>${data[q][w]}</td>`;
                }
                $table.find("tbody").append(`<tr>${tbody}</tr>`);
            }
        }
    }
</script>