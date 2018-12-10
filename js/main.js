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
    $('#news').append('<table class="table_news"></table>');
    $('#news .table_news').append('\
        <tr>\n\
            <th>title</th>\n\
            <th>date</th>\n\
            <th>image</th>\n\
            <th>text</th>\n\
            <th>delete</th>\n\
            <th>edit</th>\n\
        </tr>');
    $(news).each(function (i, news_item) {
        const date = new Date(news_item.date * 1000);
        $('#news .table_news').append('' +
                '<tr>' +
                    '<td>' + news_item.title + '</td>' +
                    '<td>' + date.getDate()+'.'+ (date.getMonth()+1) +'.'+ date.getFullYear()+ ' ' + date.getHours()+':'+date.getMinutes() + '</td>' +
                    '<td><img src="/upload_files/'+news_item.image+'" alt=""></td>' +
                    '<td>' + news_item.text + '' + '</td>' +
                    '<td><form method="post" class="form_delete"><input type="submit" value="DELETE"/><input type=hidden value=' + news_item.id + '></form></td>' +
                    '<td><form method="post" class="form_update"><input type="submit" value="EDIT"/><input type=hidden value=' + news_item.id + '></form></td>' +
                '</tr>');
    });
    delete_news();
    update_form();
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
            data: {id: id},
            success: function () {
                $("#news").empty();
                get_news();
            }
        });
        return false;
    });
}
function show_update_form(news_json){
    $('#modal_update_form').append('<form id="news_update" method="post" enctype="multipart/form-data"></form>');
    $(news_json).each(function (i, news_item) {
        $('#modal_update #news_update').append('' +
                    '<label>Title'+
                        '<input type="text" name="title" id="title" value='+ news_item.title +'/>'+
                    '</label>'+
                    '<label>Text'+
                        '<textarea name="text" id="text">'+ news_item.text +'</textarea>'+
                    '</label>'+
                    '<img src="/upload_files/'+news_item.image+'" alt="">'+
                    '<label> Change image:'+
                        '<input type="file" name="image" accept="image/*" id="image"/>'+
                    '</label>'+
                        '<input type=hidden name="id" value=' + news_item.id + '>'+
                        '<input type="submit" value="EDIT NEWS"/>');
    });
    update_news();
}
function update_form() {
    $(".form_update").submit(function () {
        var id = $(this).find('input[type="hidden"]').val();
        $.ajax({
            url: location.origin + '/api/update_form',
            type: 'POST',
            data: {id: id},
            success: function (news_json) {
                $("#modal_update_form").empty();
                $('#modal_update').css('display', 'block');
                if (news_json) {
                show_update_form(news_json);
           }
            }
        });
        return false;
    });
    return false;
}

function update_news(){
    $('#news_update').submit(function () {
    var fd = new FormData(document.getElementById('news_update'));
    $.ajax({
        url: location.origin + '/api/update',
        type: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: function () {            
            $("#news").empty();
            get_news();
            $('#modal_update').css('display', 'none');
        }
    });
    return false;
});
}