class RegisterUser{

    constructor(){
        this.btn = $('.btn');
        this.btn.prop('disabled', true);
    }

    validateForm(){
        
        this.btn.on('click', function(e) {
            $('form').find(':valid').removeClass('is-invalid').addClass('is-valid');
            var count = $('form').find(':invalid').removeClass('is-valid').addClass('is-invalid').length ;
            if (count > 0) {
                e.preventDefault();
                return false;
            }
        })
    }

    validatePasswords(){
        $('form').on('blur', '#password, #confirm_password', function(e) {
            if ($('#password').val() !== $('#confirm_password').val()) {
                $('.btn').prop('disabled', true);
                return false;
            }

            $('.btn').prop('disabled', false);
        })
    }
}

$(document).ready(function() {
    let registerObject = new RegisterUser();
    registerObject.validateForm();
    registerObject.validatePasswords();

    //------------------------------------------------------------------------------------------------------------------------------------------------------
    // Tooltip
    //------------------------------------------------------------------------------------------------------------------------------------------------------
    $('[data-toggle="tooltip"]').tooltip();
})