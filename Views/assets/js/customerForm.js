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
        Toast.fire({
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
  formValidate.validateField();
//   formValidate.sendFinancialForm();
//   formValidate.sendFinancialDocument();
//   formValidate.sendManagementForm();
//   formValidate.sendquialityForm();

  $('#sendForm').on('click', function(e) {
    e.preventDefault();
    let forms = document.getElementsByTagName('form');
    let index = 1;
    Array.from(forms).forEach(async (form) => {
        let formData = new FormData(form);
        let result = await requestController('formulario', 'registerForm', formData, `entity=${form.id}`);
        if (result.Result.status) {
            formValidate.showToast(`Guardado ${index} de ${forms.length}...`, 'success');
        }else if(result.Result.error){
            formValidate.showToast(`No se guardado ${index} de ${forms.length}...`, 'error');
        }
        index++;
    });
    // TODO Actualizar estado del usuario
    window.location.href = SERVERSIDE;
    return false;
  })
});
