$(document).ready(function() {
    //Delete media
    $(document).on('click', '.delMedia', function () {
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
            $.ajax({
                url: '/admin/media/delete/' + id,
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

    //Event review file media
    $(document).on('change', '#file-media', function() {
        var file = event.target.files[0] || event.dataTransfer.files[0];
        createFile(file);
    });

    //function reciew file media
    function createFile(file) {
        var reader = new FileReader();
        var review_file_path = '';
        reader.onload = (e) => {
            review_file_path = e.target.result;
            $('.review-file-media').attr('src', review_file_path);
        };
        reader.readAsDataURL(file);
    }
});