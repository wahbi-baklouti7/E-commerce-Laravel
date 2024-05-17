import "./bootstrap";

function submitElementForm(form) {
    $("id/class").attr("disabled", true);

    const data = new FormData(form);

    const type = $("id/class_btn_save_name").attr("data-type");
    let url = ENDPOINT + "/urlCreateElement";
    let id;

    if (type === "update") {
        id = $(".save_quotation_file").attr("data-id");

        data.append("id", id);
        url = ENDPOINT + "/urlUpdateElement/" + id;
    }

    $.ajax({
        url: url,
        type: "post",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        data: data,

        contentType: false,

        cache: false,

        processData: false,

        success: function (data) {
            if (type == "update") {
                showtoastr("element", "update", "success", "");
            } else {
                showtoastr("element", "add", "success", "");
            }

            let btn_action = "";
            btn_action = "here put content btn action";

            let line_item = "here put content table";

            line_item += "";

            line_item += btn_action;

            if (type == "save") {
                //change data.data.result.id according to your response
                $("class/id of table body").append(
                    "<tr class='class/id of the row" +
                        data.data.result.id +
                        "'>" +
                        line_item +
                        "</tr>"
                );

                $("class/id of tr empty").remove();
            }

            if (type == "update") {
                $(".tr_doc_" + data.data.result.id).html();
                $(".tr_doc_" + data.data.result.id).html(line_item);
            }

            $("id_btn_close").trigger("click");

            KTMenu.init();

            // add this code if existe tooltip in td of table
            //         const tooltipTriggerList = [].slice.call(
            //             document.querySelectorAll('[data-bs-toggle="tooltip"]')
            //         );
            //         tooltipTriggerList.map(function (
            //             tooltipTriggerEl
            //         ) {
            //             return new bootstrap.Tooltip(tooltipTriggerEl);
            //         });
        },
    });
}
$;
