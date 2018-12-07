get_news();
$('#btn_add').click(function () {
    $('#modal_add').css('display', 'block');
});
$('#form_add').submit(function () {
    var fd = new FormData(document.getElementById('form_add'));
    $.ajax({
        url: location.origin + '/api/add',
        type: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            $('#title').val('');
            $('#text').val('');
            $('#image').val('');
            $('#modal_add').css('display', 'none');
        }
    });
    return false;
});

function get_news() {
    $.get({
        url: location.origin + '/api/index',
        success: function (json) {
//            var news = JSON.parse(json);
//            if (news) {
//                show_news(news);
//            }
        }
    });
            
        

}