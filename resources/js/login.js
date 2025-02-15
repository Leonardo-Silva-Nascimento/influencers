$(document).ready(function () {

    $('form').submit(function (event) {
        event.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        if (email === '' || password === '') {
            alert('Por favor, preencha todos os campos!');
            return;
        }
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/login',
            method: 'POST',
            data: {
                email: email,
                password: password,
                _token: csrfToken
            },
            success: function (response) {
                console.log(response.token);
                if (response.token) {
                    localStorage.setItem('auth_token', response.token);
                    document.cookie = "auth_token=" + response.token ;
                    window.location.href = '/home' ;
                } else {
                    alert('Erro no login');
                }
            },
            error: function (xhr, status, error) {
                var err = xhr.responseJSON ? xhr.responseJSON.error : 'Ocorreu um erro ao tentar fazer login';
                alert(err);
            }
        });
    });

    function validarCampos() {
        let email = $('#email').val();
        let password = $('#password').val();
        if (email == '') {
            $('#submit').prop('disabled', true).addClass('disabled-btn');
            $('#email').addClass('worng');
        } else if (password == '') {
            $('#submit').prop('disabled', true).addClass('disabled-btn');
            $('#password').addClass('worng');
        } else {
            $('#submit').prop('disabled', false).removeClass('disabled-btn');
            $('#password').removeClass('worng');
            $('#email').removeClass('worng');
        }
    }

    $('#email, #password').on('input', validarCampos);
});
