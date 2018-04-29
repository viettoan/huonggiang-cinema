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
                    url: '/admin/movie/delete/' + id,
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

    //click add booking cinema
    $(document).on('click', '.booking-cinema', function() {
        var movie_id = $(this).data('movie');
        console.log(movie_id);
        $.ajax({
            method: 'GET',
            url: '/admin/get-cinema-add-booking',
            data: {'movie_id': movie_id},
            success: function (res) {
                $('#booking_cinema_system').find('.modal-body').html(res);
                $('#booking_cinema_system').modal('show');
            }
        })
    });

    //change link or add booking link movie
    $(document).on('change', '.add_link_booking_movie', function() {
        var movie_id = $(this).data('movie');
        var cinema_id = $(this).data('cinema');
        var link = $(this).val();
        var data = {
            'movie_id': movie_id,
            'cinema_id': cinema_id,
            'link': link,
        }
        $.ajax({
            method: 'GET',
            url: '/admin/store-booking-movie',
            data: data,
            success: function (res) {
                if (res.success != null) {
                    toastr.success(res.success, '', {timeOut: 5000});

                } 
                if (res.failed != null) {
                    toastr.success(res.failed, '', {timeOut: 5000});

                }
            }
        })
    })
});