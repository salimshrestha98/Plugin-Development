console.log("Hurray! the js file is loaded successfully.");
$ = jQuery;
$(document).ready( function() {
    $('#tj-ur-form').on('submit',  function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var userDetails = {
            'username' : $('#tj-user-name').val(),
            'email' : $('#tj-email').val(),
            'password' : $('#tj-password').val()
        }

        // alert( ajaxUrl );
        console.log( userDetails );


        $.post(ajaxUrl, {'action': 'tj_register_user', 'formData': userDetails}, (data, status) => {
            data = JSON.parse( data );
            alert(data.status + '! ' + data.message);
        });
    });
});