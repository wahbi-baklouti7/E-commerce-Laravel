$(document).ready(function () {
    alert("js loaded !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
    $(".delete-category-btn").on("click", deleteCategory);

    // $(".delete-product-btn").on("click", deleteProduct);
    $("example1").DataTable({
        processing: true,
        serverSide: true,
    });

    $(".changeLang").on("change", function () {
        window.location.href = `/change/${this.value}`
    })
});

function deleteCategory() {
    const paren = $(this).parent().parent();
    const id = paren.data("id");
    // alert(id);
    $.ajax({
        url: `/admin/category/${id}`,
        type: "DELETE",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            let table = new DataTable("#example1");
            table.row(paren).remove().draw();
            toastr.success('Category Deleted Successfully', 'Success');

        },
    });
}


// function deleteProduct() {
//     const paren = $(this).parent().parent();
//     const id = paren.data("id");
//     $.ajax({

//         url: `/admin/product/${id}`,
//         type: "DELETE",
//         data: {
//             // id: id,
//         },
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),

//         },

//         success: function (data) {
//             let table = new DataTable("#example1");
//             table.row(paren).remove().draw();
//             toastr.success('Product Deleted Successfully', 'Success');
//         },
//     });
// }



