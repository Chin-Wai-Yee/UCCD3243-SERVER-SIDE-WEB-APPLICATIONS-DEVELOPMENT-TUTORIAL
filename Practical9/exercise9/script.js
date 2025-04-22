$(document).ready(function () {
    liveSearch();
});

function addUser() {
    var name = $('#name').val();
    var email = $('#email').val();
    if (name && email) {
        $.ajax({
            url: 'server.php',
            type: 'POST',
            data: { action: 'add', name: name, email: email },
            success: function (response) {
                $('#userForm')[0].reset();
                displayUsers();
                liveSearch();
            }
        });
    }
}

function displayUsers() {
    $.ajax({
        url: 'server.php',
        type: 'GET',
        data: { action: 'display' },
        success: function (response) {
            $('#userTable').html(response);
            liveSearch();
        }
    });
}

function editUser(id) {
    $.ajax({
        url: 'server.php',
        type: 'GET',
        data: { action: 'getSingleUser', id: id },
        success: function (response) {
            var user = JSON.parse(response);
            var updatedName = prompt("Enter updated name:", user.name);
            var updatedEmail = prompt("Enter updated email:", user.email);
            if (updatedName && updatedEmail) {
                $.ajax({
                    url: 'server.php',
                    type: 'POST',
                    data: { action: 'edit', id: id, name: updatedName, email: updatedEmail },
                    success: function () {
                        displayUsers();
                    }
                });
            }
        }
    });
}

function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        $.ajax({
            url: 'server.php',
            type: 'POST',
            data: { action: 'delete', id: id },
            success: function () {
                displayUsers();
                liveSearch();
            }
        });
    }
}

function liveSearch() {
    var searchValue = $('#search').val();
    $.ajax({
        url: 'server.php',
        type: 'GET',
        data: { action: 'search', search: searchValue },
        success: function (response) {
            $('#searchResults').html(response);
        }
    });
}