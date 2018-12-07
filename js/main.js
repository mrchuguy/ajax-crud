$('#btn_add').click(function(){
    $('#modal_add').css('display', 'block');
});
$('#form_add').submit(function () {        
        var fd = new FormData(document.getElementById('form_add'));
//        console.log(fd);
        $.ajax({
            url: location.origin + '/api/add',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: function (msg) {
                console.log(msg);
            }
        });
        return false;
    });