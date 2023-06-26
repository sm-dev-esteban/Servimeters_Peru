class ValidationForms {

    constructor() {
        this.$conditionBox = $("#conditionBox");
        this.$button = $("#next");
        this.$button.prop("disabled", true);        
    }

    static Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    //Mostrar mensaje al almacenar formularios
    static showToast(msg = 'Servimeters', icon = 'info') {
        ValidationForms.Toast.fire({
            icon: icon,
            title: msg
        });
    }

    static async sendForms(){
        // $('#sendForm').on('click', async function(e) {

            let forms = document.getElementsByTagName('form');
            Array.from(forms).forEach(async (form) => {
                let formData = new FormData(form);
                try {
                    await requestController('formulario', 'registerForm', formData, `entity=${form.id}`);
                } catch (error) {
                    console.error(error);
                    ValidationForms.showToast(`No se guardaron las respuestas...`, 'error');
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
                let result = await requestController('Usuario', 'updateStateUser', userData);
                if (result.Result) {
                    ValidationForms.showToast(`Guardado con exito...`, 'success');
                }
                window.location.href = SERVERSIDE;
            } catch (error) {
                ValidationForms.showToast(`${error}`, 'error');
                console.error(error);
            }
            return false;
        // })
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
          t.row.add([`<input type="text" class="form-control form-control-border" name="data[entity_${counter}]" placeholder="Entidad A" required>`, 
          `<input type="text" class="form-control form-control-border" name="data[number_${counter}]" placeholder="00${counter}" required>`, 
          `<input type="text" class="form-control form-control-border" name="data[dateValidity_${counter}]" placeholder="${moment(new Date()).format('DD-MM-yyyy')}" required>`, 
          `<input type="text" class="form-control form-control-border" name="data[details_${counter}]" placeholder="..." required>`]).draw(false);
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
          t.row.add([`<input type="text" class="form-control form-control-border" name="data[nameBank_${counter}]" placeholder="Banco A" required>`, 
          `<input type="text" class="form-control form-control-border" name="data[subsidiary_${counter}]" placeholder="Sucursal ${counter}" required>`, 
          `<input type="text" class="form-control form-control-border" name="data[accountNumber_${counter}]" placeholder="${counter.toString().repeat(5)}" required>`
        ]).draw(false);
          counter++;
        });
    }

    // Permiso al cliente de continuar rellenando el formulario
    togglePermissions() {
        this.$conditionBox.on("change", () => {
            this.$button.prop("disabled", !this.$conditionBox.is(":checked"));
        });
    }

    addValuesToLabelForms(objectLabel = []){
        for (let i = 0; i < objectLabel.length; i++) {
            let {label, classLabel, text} = objectLabel[i];
            $('form').each(function() {
                const form = $(this);
                const labels = form.find(label);
        
                labels.each(function() {
                    const currentLabel = $(this);
                    const span = $('<span>').addClass(classLabel).text(text);
        
                    currentLabel.after(span);
                });
            })
        }
    }

    validateErrors(form){

        const inputs = form.querySelectorAll("input");
        inputs.forEach((input) =>{
            input.addEventListener('blur', () => {
                
                let $input = $(input);

                if(input.validity.valueMissing){
                    $input.addClass('is-invalid').removeClass('is-valid');
                    showError(input);
                }else{
                    $input.addClass('is-valid').removeClass('is-invalid');
                    hideError(input);
                }
            });
        });

        function showError(input){
            const errorSpan = input.nextElementSibling;
            if (errorSpan !== null) {
                errorSpan.textContent = input.validationMessage;
            }
        }

        function hideError(input) {
            const errorSpan = input.nextElementSibling;
            if (errorSpan !== null) {
                errorSpan.textContent = '';
            }
        }
    
    }

    checkNextForm(){

        $('.next').on('click', function(e) {
            var button = $(this);
            var idForm = button.data('form');
            var isValid = false;
            $(`.form_${idForm}`).each(function() {
                var form = $(this);
                var count = form.find(":invalid").addClass('is-invalid').length;
                
                if (count !== 0) {
                    button.addClass('disabledNext');
                    var id = form.attr("id");
                    var elementId = $(`#${id}`);
                    $('html, body').animate({ scrollTop: elementId.offset().top }, 800);
                    isValid = false;
                    return false;
                } else{
                    isValid = true;   
                }
            });

            if (isValid) {
                button.removeClass('disabledNext');
                console.log(idForm);
                console.log(typeof idForm);
                idForm === 4 ? ValidationForms.sendForms() : stepper.next();
            }
        });
    }
    
}

$(document).ready(function(e) {
    console.log('Validacion');
    var object  = new ValidationForms();
    object.addRowBanks();
    object.addRowPolicies();
    object.togglePermissions();


    let valuesToForm = [
        {
            label: 'input',
            classLabel: 'error',
            text: ''
        },
        {
            label: 'label',
            classLabel: 'mandatory',
            text: '*'
        },
    ];

    // Agregar valores a inputs de formularios
    object.addValuesToLabelForms(valuesToForm);

    // Validar boton Next
    object.checkNextForm();

    // Validar inputs
    const forms = document.querySelectorAll('.validatable-form');
    
    forms.forEach((form) => {
       object.validateErrors(form);
    });

    //------------------------------------------------------------------------------------------------------------------------------------------------------
    // Tooltip
    //------------------------------------------------------------------------------------------------------------------------------------------------------
    $('[data-toggle="tooltip"]').tooltip();
})