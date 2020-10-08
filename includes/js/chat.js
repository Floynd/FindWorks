$(document).ready(function() {
    loadChat();
});

$('#message').keyup(function(e) {
    var message = $(this).val();
    if (e.which == 13) {
        $.post('handlers/ajax.php?action=SendMessage&message=' + message, function(response) {
            loadChat();
            $('#message').val('');
        });
    }
});

function loadChat() {
    $.post('handlers/ajax.php?action=getChat', function(response) {
        $('.chathistory').html(response);
    });
}

setInterval(function() {
    loadChat();
}, 2000);