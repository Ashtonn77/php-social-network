$(document).ready(function () {

    //switching between login and registration forms
    $('#sign-up').click(function () {
        $('.login-form-container').slideUp('slow', function () {
            $('.register-form-container').slideDown('slow');
        })
    })

    $('#sign-in').click(function () {
        $('.register-form-container').slideUp('slow', function () {
            $('.login-form-container').slideDown('slow');
        })
    })


})