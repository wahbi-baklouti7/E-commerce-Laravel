$(document).ready(function () {
    $(".delete-category-btn").on("click", deleteCategory);

    $("example1").DataTable({
        processing: true,
        serverSide: true,
    });
});

function deleteCategory() {
    const paren = $(this).parent().parent();
    const id = paren.data("id");
    console.log(id);
    // alert(id);
    $.ajax({
        url: `/category/${id}`,
        type: "DELETE",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            console.log(data);
            let table = new DataTable("#example1");
            table.row(paren).remove().draw();
        },
    });
}
