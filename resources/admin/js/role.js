jQuery(function () {
    //-----------------------------------------------------
    // Defining a variable
    //-----------------------------------------------------

    var token = $("input[name='_token']").val(),
        datatable_url = window.location.origin + "/js/datatable/pt-br.json",
        datatable_route = $("#datatable-route").val();

    //-----------------------------------------------------
    // Instance of plugins
    //-----------------------------------------------------

    $("#dataTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: datatable_route,
            type: "POST",
            beforeSend: function (request) {
                return request.setRequestHeader("X-CSRF-Token", token);
            },
        },
        columns: [{
                data: "name",
            },
            {
                data: "action",
                searchable: false,
                orderable: false,
            },
        ],
        language: {
            url: datatable_url,
        },
    });
});
