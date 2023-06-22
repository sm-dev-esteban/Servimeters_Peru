class CustomerForm {
    constructor() {
        this.$conditionBox = $("#conditionBox");
        this.$button = $("#next");
        this.$buttonValidate = $("#nextValidate");
        this.$button.prop("disabled", true);

        this.Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        
    }

    //Mostrar mensaje al almacenar formularios
    showToast(msg = 'Servimeters', icon = 'info') {
        this.Toast.fire({
            icon: icon,
            title: msg
        });
    }

    // Permiso al cliente de continuar rellenando el formulario
    togglePermissions() {
        this.$conditionBox.on("change", () => {
            this.$button.prop("disabled", !this.$conditionBox.is(":checked"));
        });
    }

    addRowPolicies(){
        var t = $('#policiesTable').DataTable({
            paging: false,
            ordering: false,
            info: false,
            searching: false,
        });
        var counter = 4;
        $('#addRowPolicies').on('click', function(e) {
          t.row.add([`<input type="text" class="form-control form-control-border" name="data[entity_${counter}]" placeholder="Entidad A">`, 
          `<input type="text" class="form-control form-control-border" name="data[number_${counter}]" placeholder="00${counter}">`, 
          `<input type="text" class="form-control form-control-border" name="data[dateValidity_${counter}]" placeholder="${moment(new Date()).format('DD-MM-yyyy')}">`, 
          `<input type="text" class="form-control form-control-border" name="data[details_${counter}]" placeholder="...">`]).draw(false);
          counter++;
        });
    }

    addRowBanks(){
        var t = $('#bankTable').DataTable({
            paging: false,
            ordering: false,
            info: false,
            searching: false,
        });
        var counter = 4;
        $('#addRowBanks').on('click', function(e) {
          t.row.add([`<input type="text" class="form-control form-control-border" name="data[nameBank_${counter}]" placeholder="Banco A">`, 
          `<input type="text" class="form-control form-control-border" name="data[subsidiary_${counter}]" placeholder="Sucursal ${counter}">`, 
          `<input type="text" class="form-control form-control-border" name="data[accountNumber_${counter}]" placeholder="${counter.toString().repeat(5)}">`
        ]).draw(false);
          counter++;
        });
    }

    sendForm(formId, entity) {
        $('#' + formId).submit(function (event) {
            event.preventDefault();

            // Obtener los datos del formulario
            // var formData = $(this).serialize();

            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: `?entity=${entity}`,
                data: new FormData(this),
                processData: false,
                cache: false,
                contentType: false,
                success: function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, "funciona");
                },
                error: function (xhr, status, error) {
                    // Manejar los errores
                    console.error(error);
                }
            });
        });
    }

    sendResponsibilityForm() {

        //Enviar documentos sección 2 situación financiera-->
        $('#resposibilityForm').submit(function (event) {

            // Evitar que se envíe el formulario de manera tradicional
            event.preventDefault();

            // Obtener los datos del formulario
            var formData = $(this).serialize();

            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: '?entity=corporacion',
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, "funciona");
                },
                error: function (xhr, status, error) {
                    // Manejar los errores
                    console.error(error);
                }
            });
        });

    }
}

$(document).ready(function () {
  const formValidate = new CustomerForm();
  formValidate.togglePermissions();
  formValidate.addRowPolicies();
  formValidate.addRowBanks();

  $('#sendForm').on('click', async function(e) {
    e.preventDefault();
    let forms = document.getElementsByTagName('form');
    Array.from(forms).forEach(async (form) => {
        let formData = new FormData(form);
        try {
            await requestController('formulario', 'registerForm', formData, `entity=${form.id}`);
        } catch (error) {
            console.error(error);
            formValidate.showToast(`No se guardaron las respuestas...`, 'error');
        }
    });

    
    let userData = new FormData();
    let user = JSON.parse(localStorage.getItem('user'));
    for (const key in user) {
        userData.append(`${key}`, `${user[key]}`);
    }
    userData.delete('estado');
    userData.append('estado', 'auditando');
    try {
        let result = await requestController('Usuario', 'updateUser', userData);
        if (result.Result) {
            formValidate.showToast(`Guardado con exito...`, 'success');
        }
        window.location.href = SERVERSIDE;
    } catch (error) {
        formValidate.showToast(`${error}`, 'error');
        console.error(error);
    }
    return false;
  })
});
