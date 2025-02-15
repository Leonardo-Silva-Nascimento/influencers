$(document).ready(function () {
    function validarCampos() {
        let email = $('#email').val();
        let password = $('#password').val();
        let name = $('#name').val();

        if (name == '') {
            $('#submit').prop('disabled', true).addClass('disabled-btn');
            $('#name').addClass('worng');
        } if (password == '' || password.length <= 6) {
            $('#submit').prop('disabled', true).addClass('disabled-btn');
            $('#password').addClass('worng');
        } if (email == '') {
            $('#submit').prop('disabled', true).addClass('disabled-btn');
            $('#email').addClass('worng');
        }
        if (email != '' && password != '' && password.length >= 6 && name != '') {

            $('#submit').prop('disabled', false).removeClass('disabled-btn');
            $('#password').removeClass('worng');
            $('#email').removeClass('worng');
            $('#name').removeClass('worng');
        }
    }

    $('#email, #password, #name').on('input', validarCampos);
});
