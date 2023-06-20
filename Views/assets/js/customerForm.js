class CustomerForm {
  constructor() {
      this.$conditionBox = $("#conditionBox");
      this.$button = $("#next");
      this.$buttonValidate = $("#nextValidate");
      this.$button.prop("disabled", true);

      this.table;
      this.formData;
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
          var formData = $(this).serialize();

          // Enviar los datos mediante AJAX
          $.ajax({
              type: 'POST',
              url: `?entity=${entity}`,
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

  formValidate.sendForm('financialForm', 'datosfinancieros');
  formValidate.sendForm('financialDocument', 'documentos');
  formValidate.sendForm('managementForm', 'equipos');
  formValidate.sendForm('quialityForm', 'gestion');
  formValidate.sendForm('responsibilityForm', 'corporacion');
});
