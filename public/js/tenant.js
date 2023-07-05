jQuery(function () {
    //-----------------------------------------------------
    // Defining a variable
    //-----------------------------------------------------

    var token = $("input[name='_token']").val(),
        datatable_url = window.location.origin + "/js/datatable/pt-br.json",
        datatable_route = $("#datatable-route").val();

    //-----------------------------------------------------
    // Plugins
    //-----------------------------------------------------

    $("#im").mask("00000000000");

    $("#ie").mask("00000000000000");

    $("#phone").mask("(00) 00000-0000");

    $("#cnpj").off("input").on("input", checkCnpj);

    /**
     * Valida CNPJ
     */
    function checkCnpj() {
        $(this).mask("00.000.000/0000-00");

        var cnpj = $(this).val();

        if (validateCnpj(cnpj)) {
            this.setCustomValidity("");

            return;
        }

        this.setCustomValidity("CNPJ inválido!");
    }

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
                data: "legal_name",
            },
            {
                data: "trade_name",
            },
            {
                data: "cnpj",
            },
            {
                data: "active",
                className: "text-center",
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
