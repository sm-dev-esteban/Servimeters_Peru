class Process{

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
}

$(document).ready(function(params) {
    var process = new Process();
    process.asign();
})