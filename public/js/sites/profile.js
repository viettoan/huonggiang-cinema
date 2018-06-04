$(document).ready(function () {
    $('#upload_avatar').hide();

    $(document).on('click', '.avatar', function(event) {
        console.log(1);
        $('#upload_avatar').click();
    })

    //Event review file media
    $(document).on('change', '#upload_avatar', function() {
        var file = event.target.files[0] || event.dataTransfer.files[0];
        console.log('file');
        createFile(file);
    });

    //function reciew file media
    function createFile(file) {
        var reader = new FileReader();
        var review_file_path = '';
        reader.onload = (e) => {
            review_file_path = e.target.result;
            $('.avatar').find('img').attr('src', review_file_path);
        };
        reader.readAsDataURL(file);
    }
})