
class RegisterUser{

    constructor(){
        this.btn = $('.sendUser');
        if (this.btn.data('type') === 'create') {
            $('#confirm_password').prop('required', true);
            $('#checkbox').val('on');
        }
        // this.btn.prop('disabled', true);
    }

    validateForm(){
        $('.sendUser').on('click', function(e) {
            $('form').find(':valid').removeClass('is-invalid').addClass('is-valid');
            var count = $('form').find(':invalid').removeClass('is-valid').addClass('is-invalid').length ;
            if (count > 0) {
                e.preventDefault();
                return false;
            }
        })
    }
    
      // Rest of the class methods...

    validatePasswords(){
        $('form').on('blur', '#confirm_password', function(e) {
            if ($('#confirm_password').val().length <= 0) {
                console.log('No hay data en confirm pass');
                return false;
            }

            if ($('#password').val() !== $('#confirm_password').val()) {
                $('.sendUser').prop('disabled', true);
                return false;
            }

            $('.sendUser').prop('disabled', false);
        })
    }

    passChange(){
        $('#password').change(function(e) {
            if (!$('#confirm_password').prop('required')) {
                $('#confirm_password').prop('required', true);
                $('#password').attr('name', 'password');
            }
        })
    }

    habilitarChange(){
        $('#habilitado').on('switchChange.bootstrapSwitch', function() {
            if ($('#habilitado').bootstrapSwitch('state')) {
                $('#checkbox').val('on');
            }else{
                $('#checkbox').val('off');
            }
        });
    }

    loadModalData(){
        $('#modal-xl').on('show.bs.modal', async function(e) {
            var button = $(e.relatedTarget);
            var id = button.data('user');
            var formData = new FormData();
            formData.append('id', id);
            try {
                const result = await requestController('Usuario', 'loadUser', formData);
                if (!result.Result) {
                    return false;
                }

                for (const key in result.Result[0]) {
                    var element = document.getElementsByName(key)[0];
                    if (element !== undefined) {
                        
                        switch (element.name) {
                            case 'habilitado':
                                $('#habilitado').bootstrapSwitch('state', (result.Result[0][key] === 'on'));
                                $('#checkbox').val((result.Result[0][key] === 'on') ? 'on' : 'off');
                                break;
                            case 'rol':
                                $('#select').val(result.Result[0][key]).trigger('change');
                                break;
                            default:
                                element.value = result.Result[0][key];
                                break;
                        }
                    }

                }

                if ($('.sendUser').data('type') === 'update') {
                    $('#password').removeAttr('name');
                }

                ValidationForms.addValuesToLabelInputForms();
            } catch (error) {
                console.error(error);
            }
        })
    }

    refreshPage(){
        $('#modal-xl').on('hidden.bs.modal', function(e) {
        })
    }

    deleteSpaceUser(){
        $('#user_form').keypress(function(e){
            var value = $(this).val();
            if (e.keyCode === 32){
                return false;
            }
            e.stopPropagation();
        })
    }
}


$(document).ready(function() {
    let registerObject = new RegisterUser();
    registerObject.validateForm();
    registerObject.validatePasswords();
    registerObject.passChange();
    registerObject.habilitarChange();
    registerObject.loadModalData();
    registerObject.deleteSpaceUser();
    ValidationForms.addValuesToLabelInputForms();

    //------------------------------------------------------------------------------------------------------------------------------------------------------
    // Tooltip
    //------------------------------------------------------------------------------------------------------------------------------------------------------
    $('[data-toggle="tooltip"]').tooltip(); 
})
