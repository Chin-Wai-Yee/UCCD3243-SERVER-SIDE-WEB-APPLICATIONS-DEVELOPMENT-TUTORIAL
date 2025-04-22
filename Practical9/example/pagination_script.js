$(document).ready(function () {
    let currentPage = 1;
    const recordsPerPage = 3;
    function loadUsers(page) {
        $.ajax({
            url: 'server.php',
            type: 'GET',
            data: { action: 'display', page: page, recordsPerPage: recordsPerPage },
            success: function (response) {
                $('#userTable').html(response);
                $('#pageNumber').text(page);
                updatePaginationButtons();
            }
        });
    }
    function updatePaginationButtons() {
        $.ajax({
            url: 'server.php',
            type: 'GET',
            data: { action: 'countRecords' },
            success: function (response) {
                let totalRecords = parseInt(response);
                let totalPages = Math.ceil(totalRecords / recordsPerPage);
                console.log("count: ", totalRecords)
                $('#prevPage').prop('disabled', currentPage === 1);
                $('#nextPage').prop('disabled', currentPage >= totalPages);
            }
        });
    }
    loadUsers(currentPage);
    $('#nextPage').click(function () {
        if (!$(this).prop('disabled')) {
            currentPage++;
            loadUsers(currentPage);
        }
    });
    $('#prevPage').click(function () {
        if (!$(this).prop('disabled')) {
            currentPage--;
            loadUsers(currentPage);
        }
    });
    $(document).on('click', 'button', function () {
        setTimeout(() => {
            loadUsers(currentPage);
            updatePaginationButtons();
        }, 300);
    });
});