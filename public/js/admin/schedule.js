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
    //get room by date
    $('.admin-schedule').hide();
    $(document).on('change', '#date', function () {
        $('.admin-schedule').show();
    });

    $(document).on('change', '.room_id', function () {
        var room_id = $(this).val();
        var date = $('#date').val();
        var element = $(this);

        $.ajax({
            url: '/admin/get-time',
            type: 'GET',
            data: {'date': date, 'room_id': room_id},
            success: function (res) {
                var html = '';
                for (var i = 0; i < res.times.length; i++) {
                    html += `<option value="${res.times[i].id}">${res.times[i].time}</option>`;
                }
                element.parents('.room').find('.time_id').html(html);
            }
        });
    });
});