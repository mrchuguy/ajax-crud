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
            $("#news").empty();
            get_news();
            $('#modal_add').css('display', 'none');
        }
    });
    return false;
});

function show_news(news) {
    $(news).each(function (i, news_item) {
        //date = new Date(news_item.date);
        $('#news').append('<table class="table_news"><tr><td>' + news_item.title + '</td><td>' + news_item.date + '</td><tr><td><img src="/upload_file/'+news_item.image+'" alt=""></td><td>' + news_item.text + '' + '</td></tr><tr><td><form method="post" class="form_delete"><input type="submit" value="DELETE"/><input type=hidden value=' + news_item.id + '></form></td><td><form method="post" class="form_update"><input type="submit" value="EDIT"/><input type=hidden value=' + news_item.id + '></form></td></tr></table>');
    });
    delete_news();
    update_news();
}

function get_news() {
    $.ajax({
        url: location.origin + '/api/index',
        success: function (news_json) {
           if (news_json) {
               show_news(news_json);
           }
        }
    });
}
function delete_news() {
    $(".form_delete").submit(function () {
        var id = $(this).find('input[type="hidden"]').val();
        $.ajax({
            url: location.origin + '/api/delete',
            type: 'POST',
            data: id,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                // $("#news").empty();
                // get_news();
            }
        });
        return false;
    });
}
function update_news() {
    $(".form_update").submit(function () {
        alert('up');
    });
    return false;
}