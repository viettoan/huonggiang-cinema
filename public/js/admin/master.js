$(document).ready(function () {
    $(document).on('keyup', '#search-total', function() {
       var keyword = $(this).val();
        $.ajax({
            url: '/admin/search-total',
            method: 'GET',
            data: {keyword: keyword},
            success: function (response) {
                $('.search-total-result').html(response.view);
            }
        });
    });
})