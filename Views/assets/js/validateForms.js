class ValidationForms {

    constructor() {
        this.$conditionBox = $("#conditionBox");
        this.$button = $("#next");
        this.$button.prop("disabled", true);        
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
                    showToast(`No se guardaron las respuestas...`, 'error');
                }
            });

            
            let processData = new FormData();
            processData.append('id', $('#sendForm').data('process'));
            processData.append('estado', 'revision');

            try {
                let result = await requestController('proceso', 'update', processData);
                if (result.Result) {
                    showToast(`Guardado con exito...`, 'success');
                }
                window.location.href = SERVERSIDE + 'Cliente/list_procesos';
            } catch (error) {
                showToast(`${error}`, 'error');
                console.error(error);
            }
            return false;
        // })
    }

    // addRowPolicies(){
    //     var t = $('#policiesTable').DataTable({
    //         paging: false,
    //         ordering: false, 
    //         info: false,
    //         searching: false,
    //     });
    //     var counter = 2;
    //     $('#addRowPolicies').on('click', function(e) {
    //       t.row.add([`<input type="text" class="form-control form-control-border" name="data[entity_${counter}]" placeholder="Entidad A" >`, 
    //       `<input type="text" class="form-control form-control-border" name="data[number_${counter}]" placeholder="00${counter}" >`, 
    //       `<input type="text" class="form-control form-control-border" name="data[dateValidity_${counter}]" placeholder="${moment(new Date()).format('DD-MM-yyyy')}" >`, 
    //       `<input type="text" class="form-control form-control-border" name="data[details_${counter}]" placeholder="..." >`]).draw(false);
    //       counter++;
    //     });
    // }

    // addRowBanks(){
    //     var t = $('#bankTable').DataTable({
    //         paging: false,
    //         ordering: false,
    //         info: false,
    //         searching: false,
    //     });
    //     var counter = 2;
    //     $('#addRowBanks').on('click', function(e) {
    //       t.row.add([`<input type="text" class="form-control form-control-border" name="data[nameBank_${counter}]" placeholder="Banco A" >`, 
    //       `<input type="text" class="form-control form-control-border" name="data[subsidiary_${counter}]" placeholder="Sucursal ${counter}" >`, 
    //       `<input type="text" class="form-control form-control-border" name="data[accountNumber_${counter}]" placeholder="${counter.toString().repeat(5)}" >`
    //     ]).draw(false);
    //       counter++;
    //     });
    // }

    static addRows(){
        $('.table-form').DataTable({
            paging: false,
            ordering: false,
            info: false,
            searching: false,
        });

        // ValidationForms.totalSales();

        $('.addRow').on('click', function(e) {
            var btn = $(this); 
            var id = btn.data('id');
            // var count = btn.data('row');
            ValidationForms.printRows(id);
            // btn.data('row', (count + 1));
        });
        
    }

    static printRows(id, iterate = 1){
        var t = $(`#${id}`).DataTable();
        var row = $(`#${id}`).data('table');
        var index = $(`#${id}`).data('index');

        const tables = {
            'finance': `<input type="text" class="form-control form-control-border" name="data[anno][]" placeholder="2023" >,
                                <input type="text" class="form-control form-control-border" name="data[sector][]" placeholder="Sector A" >, 
                                <input type="number" class="form-control form-control-border sum" step="0.01" data-total="${index}" name="data[ventas][]" placeholder="$100" >`,
            'service_prov': `<input type="text" class="form-control form-control-border" name="data[hd][]" placeholder="..." >,
                                <input type="text" class="form-control form-control-border" name="data[marca][]" placeholder="..." >,
                                <input type="text" class="form-control form-control-border" name="data[anno][]" placeholder="001" >,
                                <select class="form-control form-control-border" name="data[propietario][]">
                                    <option>Propio</option>
                                    <option>alquilado</option>
                                </select>`,
            'service_prov_prod': `<input type="text" class="form-control form-control-border" name="data[customer][]" placeholder="..." >,
                                <input type="text" class="form-control form-control-border" name="data[activity][]" placeholder="..." >,
                                <input type="text" class="form-control form-control-border" name="data[contact][]" placeholder="001" >,
                                <input type="text" class="form-control form-control-border" name="data[phone][]" placeholder="2329829" >,
                                <input type="text" class="form-control form-control-border" name="data[details][]" placeholder="..." >`,
            'contracting_service': `<input type="text" class="form-control form-control-border" name="data[product][]" placeholder="..." >,
                                <input type="text" class="form-control form-control-border" name="data[capacity][]" placeholder="..." >,
                                <input type="text" class="form-control form-control-border" name="data[production][]" placeholder="..." >,
                                <input type="text" class="form-control form-control-border" name="data[details][]" placeholder="..." >`,
            'policies': `<input type="text" class="form-control form-control-border" name="data[entity][]" placeholder="Entidad A" >,
                        <input type="text" class="form-control form-control-border" name="data[number][]" placeholder="001" >,
                        <input type="text" class="form-control form-control-border" name="data[dateValidity][]" placeholder="${moment(new Date()).format('DD-MM-yyyy')}" >,
                        <input type="text" class="form-control form-control-border" name="data[details][]" placeholder="..." >`,
            'bank': `<input type="text" class="form-control form-control-border" name="data[nameBank][]" placeholder="Banco A" >,
                    <input type="text" class="form-control form-control-border" name="data[subsidiary][]" placeholder="Sucursal 1" >,
                    <input type="text" class="form-control form-control-border" name="data[accountNumber][]" placeholder="11111" >`
            
        };

        for (let i = 0; i < iterate; i++) {
            t.row.add(tables[row].split(',')).draw(false);
        }
    }

    // Permiso al cliente de continuar rellenando el formulario
    togglePermissions() {
        this.$conditionBox.on("change", () => {
            this.$button.prop("disabled", !this.$conditionBox.is(":checked"));
        });
    }

    validateCheckFile(){

         $('.documents').on('click', 'input[type="checkbox"]', function(e) {
            const input = $(this).closest('div').next().find('input[type="file"]');
            $(this).prop('checked') ? input.prop('required', false) : input.prop('required', true);
         })
    }

    static totalSales(){

        $('tbody').on('blur', 'td .sum', function(e) {
            var id = $(this).data('total');
            var table = `financial_table${id}`;
            ValidationForms.sumTotal(table);

        })
    }

    static sumTotal(table){
        var id = $(`#${table}`).data('index');
        var sum = 0;
        $(`#${table} td input.sum`).each(function() {
            var valor = parseFloat($(this).val());
            if (!isNaN(valor)) {
              sum += valor;
            }
          });

          $(`tfoot #total_${id}`).val(sum.toFixed(2));
    }

    static addValuesToLabelInputForms(idForm = 'form'){
            
            $(idForm).each(function() {
                const form = $(this);
                
                const elements = form.find('input');

                elements.each(function() {
                    const currentElement = $(this);
                    if (currentElement.is(':disabled') || currentElement.is(':hidden')) {
                        return true;
                    }

                    if (currentElement.next('.error')[0] === undefined) {
                        const span = $('<span>').addClass('error');
                        currentElement.after(span);
                    }

                    ValidationForms.validateErrors(currentElement);
                    
                    var label = currentElement.prev('label');
                    if (label[0] === undefined) {
                        label = currentElement.next('label');
                    }

                    if (label[0] === undefined) {
                        return true;
                    }

                    label.addClass('mandatory');

                });
            })
        
    }

    static validateErrors(input){

        // const inputs = form.querySelectorAll("input");
        // inputs.forEach((input) =>{
            input.on('blur', () => {
                
                let $input = input.get(0);

                if($input.validity.valueMissing){
                    input.addClass('is-invalid').removeClass('is-valid');
                    showError($input);
                }else{
                    input.addClass('is-valid').removeClass('is-invalid');
                    hideError($input);
                }
            });
        // });

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
        $('#next').on('click', function(params) {
            ValidationForms.addValuesToLabelInputForms('.validatable-form');
        })

        $('.next').on('click', function(e) {
            var button = $(this);
            var idForm = button.data('form');
            var isValid = false;
            ValidationForms.addValuesToLabelInputForms('.validatable-form');
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
                idForm === 4 ? ValidationForms.sendForms() : stepper.next();
            }
        });
    }
    
}

$(document).ready(function(e) {
    console.log('Validacion');
    var object  = new ValidationForms();
    // object.addRowBanks();
    // object.addRowPolicies();
    
    object.togglePermissions();

    // Validar boton Next
    object.checkNextForm();
    
    //Validar check de los input file
    object.validateCheckFile();

    ValidationForms.totalSales();
    // Validar inputs
    // const forms = document.querySelectorAll('.validatable-form');
    
    // forms.forEach((form) => {
    //    object.validateErrors(form);
    // });

    //------------------------------------------------------------------------------------------------------------------------------------------------------
    // Tooltip
    //------------------------------------------------------------------------------------------------------------------------------------------------------
    $('[data-toggle="tooltip"]').tooltip();
}) 