$(document).ready(function() {
    //comment movie event
    $(document).on('keyup', '#comment-text', function(e) {
        if(e.keyCode == 13)
        {
            var user_id = $(this).data('user');
            var movie_id = $(this).data('movie');
            var content = $(this).val();
            var element = $(this);
            var count_comment = parseInt($('.count-comment').attr('data-comment'));

            if (content.length > 0) {
                $.ajax({
                    url: '/movie/store-comment',
                    method: 'GET',
                    data: {
                        'user_id': user_id,
                        'commentable_id': movie_id,
                        'commentable_type': 'App\\Models\\Movie',
                        'content': content
                    },
                    success: function (res) {
                        if (res.comment) {
                            if ($('#comment-option').val() == 'DESC') {
                                $('.comment-content').find('ul').prepend(`
                                    <li>
                                        <img class="img-responsive comment-avatar col-md-2" src="${ res.user.avatar }">
                                        <div class="form-group col-md-10" >
                                            <p><b>${ res.user.name }</b></p>
                                            <p>${ res.comment.content }</p>
                                        </div>
                                    </li>
                                `)
                            } else {
                                $('.comment-content').find('ul').append(`
                                    <li>
                                        <img class="img-responsive comment-avatar col-md-2" src="${ res.user.avatar }">
                                        <div class="form-group col-md-10" >
                                            <p><b>${ res.user.name }</b></p>
                                            <p>${ res.comment.content }</p>
                                        </div>
                                    </li>
                                `)
                            }
                            $('.count-comment').attr('data-comment', (count_comment + 1));
                            console.log(count_comment);
                            $('.count-comment').html(`
                                <b>${ count_comment + 1} bình luận</b>  
                            `)
                            element.val('');
                        } 
                    }
                })
            }
        }
    });

    //comment option
    $(document).on('change', '#comment-option', function () {
        var option = $(this).val();
        var movie_id = $(this).data('movie');
        console.log(movie_id, option);
        $.ajax({
            url: '/movie/get-comment',
            method: 'GET',
            data: {
                'option': option,
                'movie_id': movie_id
            },
            success: function(res) {
                $('.comment-content').find('ul').html(res);
            }
        })
    })
})