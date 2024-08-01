$(document).ready(function() {
    $('#sendEmailButton').on('click', function() {
        $.ajax({
            url: '/send-email',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: 'user@example.com',  // Replace with dynamic user email
                id: 123  // Replace with dynamic user ID
            },
            success: function(response) {
                alert(response.success);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
                alert('An error occurred: ' + error);
            }
        });
    });
});