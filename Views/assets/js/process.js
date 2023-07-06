class Process{

    constructor(){
        $("#example1").DataTable({
            "paging": false,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    }

    asign(){
        $('.process').on('click', async function() {
            var resp = await showSwal('Asignación de procesos', 'info', '¿Desea asignar un proceso al cliente?', {
                showCancelButton: true,
                confirmButtonText: 'Si, asignar!',
                cancelButtonText: 'No, cancelar!'
            });
            
            if (!resp) {
                return false;
            }

            var dataForm = ['usuario', 'estado', 'auditor'];
            var formData = new FormData();

            // Recorremos los valores a enviar
            dataForm.forEach((e) => {
                var value = $(this).data(e);

                formData.append(e, value);
            });

            var response = await requestController('proceso', 'insert', formData);

            console.log(response);

            if (response.Result.status) {
                showToast('Asignado con exito!');
            }else{
                showToast('Error al asignar', 'error');
            }
        })
    }

    static async update(formData){

        var respContinue = await showSwal('Actualizar Proceso', 'info', '¿Desea actualizar el proceso?', {
            showCancelButton: true,
            confirmButtonText: 'Si, actualizar!',
            cancelButtonText: 'No, cancelar!'
        });

        if (!respContinue) {
            window.location.href = `${SERVERSIDE}Admin/procesos`;
            return false;
        }

        var res = await requestController('proceso', 'update', formData);
        if (res.Result.status) {
            showToast(`Se actualizo el valor.`, 'success');
        }else{
            showToast(`Error al actualizar el valor.`, 'error');
        }
        window.location.href = `${SERVERSIDE}Admin/procesos`;

    }

    updateProcess(){
    
        $(`.select`).on('change', async function() {
            var select = $(this);

            var formData = new FormData();
            formData.append('id', select.data('id'));
            formData.append('auditor', select.val() || null);

            Process.update(formData);

        });
    }

    updateStatus(){
        $('.update-status').on('click', async function(){
            var update = $(this);
            var formData = new FormData();
            formData.append('id', update.data('id'));
            formData.append('estado', update.data('estado'));

            Process.update(formData);
        })
    }
}

$(document).ready(function() {
    var process = new Process();
    process.asign();
    process.updateStatus();
    process.updateProcess();
})