$(document).ready(function() {
    $(document).on('click', '.delUser', function () {
        var id = $(this).data('id');
        var selector = $(this);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
            console.log(id);
            $.ajax({
                url: '/admin/user/delete/' + id,
                type: 'GET',
                success: function (res) {
                    selector.parents('tr').remove();
                }
            });
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });    
    });
});