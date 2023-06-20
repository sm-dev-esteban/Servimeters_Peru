class CustomerForm {
    constructor() {
        this.$conditionBox = $("#conditionBox");
        this.$button = $("#next");
        this.$buttonValidate = $("#nextValidate");
        this.$button.prop("disabled", true);

    }

    //Permiso al cliente de continuar rellenando el formulario
    togglePermissions() {
        this.$conditionBox.on("change", () => {
            this.$button.prop("disabled", !this.$conditionBox.is(":checked"));
        });
    }

    //Valida los campos antes de pasar a la siguiente sección
    validateField() {
        $(document).ready(function () {
            $('#formulario').submit(function (event) {
                event.preventDefault(); // Evitar el envío del formulario por defecto

                // Remover estilos de error y habilitar el botón
                $('input').removeClass('error');
                $('#submitButton').prop('disabled', false);

                var emptyInputs = $(this).find('input').filter(function () {
                    return $(this).val() === ''; // Filtrar los inputs vacíos
                });

                if (emptyInputs.length > 0) {
                    emptyInputs.addClass('error'); // Aplicar estilo de error
                    $('#submitButton').prop('disabled', true); // Deshabilitar el botón
                } else {
                    // Todos los campos están llenos, se puede continuar con el envío
                    console.log('Formulario enviado');
                    // Aquí puedes agregar la lógica adicional que desees
                }
            });
        });

    }

    sendFinancialForm() {
        //Enviar datos seccion 1 situación financiera-->
        $('#financialForm').submit(function (event) {

            // Evitar que se envíe el formulario de manera tradicional
            event.preventDefault();

            // Obtener los datos del formulario
            var formData = $(this).serialize();

            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: '?entity=datosfinancieros',
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function (response) {
                    // Manejar la respuesta del servidor
                    console.log("Formulario enviado exitosamente");
                },
                error: function (xhr, status, error) {
                    // Manejar los errores
                    console.error(error);
                }
            });
        });
    }

    sendFinancialDocument() {

        //Enviar documentos sección 2 situación financiera-->
        $('#financialDocument').submit(function (event) {

            // Evitar que se envíe el formulario de manera tradicional
            event.preventDefault();

            // Obtener los datos del formulario
            var formData = $(this).serialize();

            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: '?entity=documentos',
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

    sendManagementForm() {
        console.log("entro");

        //Enviar documentos sección 2 situación financiera-->
        $('#managementForm').submit(function (event) {
            // Evitar que se envíe el formulario de manera tradicional
            event.preventDefault();

            // Obtener los datos del formulario
            var formData = $(this).serialize();

            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: '?entity=equipos',
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

    sendquialityForm() {

        //Enviar documentos sección 2 situación financiera-->
        $('#quialityForm').submit(function (event) {

            // Evitar que se envíe el formulario de manera tradicional
            event.preventDefault();

            // Obtener los datos del formulario
            var formData = $(this).serialize();

            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: '?entity=gestion',
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
  formValidate.sendFinancialForm();
  formValidate.sendFinancialDocument();
  formValidate.sendManagementForm();
  formValidate.sendquialityForm();
});
