$(document).ready(function () {
    // $('#example1').DataTable({
    //     "paging": false,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    // })

    // var table = $('example1').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     // ajax: "{{ route('products.index') }}",

    // });

    // var table = new DataTable('#example1');
    $('.delete-category-btn').on('click', deleteCategory)

    // function deleteCategory(e) {

    //     e.preventDefault();
    //     console.log("this: "+this);
    //     var id = $(this).data('id');
    //     alert(id);
    //     // $.ajax({
    //     //     url: '/category/delete',
    //     // })
    // }
    // var table = new DataTable('#example1');
    // $('.delete-category-btn').on('click', function () {
         $('example1').DataTable({
            processing: true,
            serverSide: true,
        });

});



    // table
    // .row($(this).closest('tr'))
    // .remove()
    // .draw();
    // var id = $(this).data('id');
    // $(this).closest('tr').remove();
    // alert(id);
    // table.draw()

// var table = new DataTable('#example1');
// $('.delete-category-btn').on('click', deleteCategory)
    // alert('test');
// $('#example1').addClass('bg-danger');



// })



function deleteCategory() {

    // e.preventDefault();
    const paren = $(this).parent().parent();
    const id = paren.data('id');
    console.log(id);
    // alert(id);
    $.ajax({
        url: `/category/${id}`,
        type: 'DELETE',
        data: {
            id: id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            let table = new DataTable('#example1');
            table.row(paren).remove().draw();
            // paren.remove();
            // table.draw();


        }
    })
}
