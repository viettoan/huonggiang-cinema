$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

    //delete movie
    $(document).on('click', '.delMovie', function () {
        var id = $(this).data('id');
        var selector = $(this);
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/admin/schedule/delete/' + id,
                    type: 'GET',
                    success: function (res) {
                        swal(
                            'Deleted!',
                            'Your imaginary file has been deleted.',
                            'success'
                          )
                        selector.parents('tr').remove();
                    }
                });
              
            // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            } else if (result.dismiss === 'cancel') {
              swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
        });    
    });

    //add new room
    $(document).on('click', '.new-room', function () {
        $.ajax({
            url: '/admin/new-room-ui',
            type: 'GET',
            success: function (res) {
                $('.admin-schedule').append(res.ui);
            }
        });
    });
    $(document).on('click', '.del-room', function () {
        $(this).parents('.room-action').parent().remove();
    });
});