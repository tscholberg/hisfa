$(document).on("click", ".btn-delete", function (e) {
               var id_value = $(this).attr('data-id');
               var name_value = $(this).attr('data-name');
               bootbox.confirm({
                   message: "Are you sure you want to delete user " + name_value + "? This action can not be undone.",
                   buttons: {
                       confirm: {
                           label: 'Yes, delete user',
                           className: 'btn-danger'
                       },
                       cancel: {
                           label: 'Cancel',
                           className: 'btn-default'
                       }
                   },
                   callback: function (result) {
                       if (result) {
                           window.location = "/users/" + id_value + "/delete";
                       }
                   }
               });
});