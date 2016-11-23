$(document).on("click", ".btn-delete", function (e) {
    var id_value = $(this).attr('data-id');
    var name_value = $(this).attr('data-name');
    var table_value = $(this).attr('data-table');
    bootbox.confirm({
        message: "Are you sure you want to delete " + name_value + "? This action can not be undone.",
        buttons: {
            confirm: {
                label: 'Yes, delete ' + name_value,
                className: 'btn-danger'
            },
            cancel: {
                label: 'Cancel',
                className: 'btn-default'
            }
        },
        callback: function (result) {

            if (result) {
                window.location = "/" + table_value + "/" + id_value + "/delete";
            }
        }
    });
});