$(document).ready(function () {
    loadUserStatus();
    setInterval(loadUserStatus, 5000);
});

function loadUserStatus() {
    $.ajax({
        url: 'auto_refresh_server.php',
        type: 'GET',
        data: { action: 'display' },
        success: function (response) {
            $('#userStatusTable').html(response);
        }
    });
}