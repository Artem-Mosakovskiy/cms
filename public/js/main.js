var object = {
    x: 0,
    y: 0,
    width: 0,
    height: 0,
    rotate: 0,
    scaleX: 0,
    scaleY: 0
};

$(function () {

    $('.ajax a[data-toggle="tab"]').click(function () {
        $.post('/admin/users/ajax', {
            status: $(this).attr('data-ajax')
        }, function (data) {
            createTable(JSON.parse(data));
        });
    });

    $('#uploadPhoto').on('click', setImg);

    $('input[name=userPhoto]').on('change', function () {

        readURL(this,function () {
            $('.profile-img').cropper('destroy').cropper({
                aspectRatio: 1,
                crop: function(e) {
                    object.x = e.x;
                    object.y = e.y;
                    object.width = e.width;
                    object.height = e.height;
                    object.rotate = e.rotate;
                    object.scaleX = e.scaleX;
                    object.scaleY = e.scaleY;
                }
            });

        });
    });

});

function wrapArray(arr, t, tag, all) {
    var $tr = $('<tr>');

    $.each(arr, function (k,item) {
        $.each(item, function (k,v) {
            if(k == 'status'){
                $tr.append($('<' + t + '>').text(v));
                $tr.append($('<' + t + '>').html(
                    $('<a>').addClass('btn btn-warning btn-xs').attr('href', all.actions + item.id).text('Просмореть')
                ));
            }else {
                $tr.append($('<' + t + '>').text(v));
            }

        });

    });
    return $('<' + tag + '>').html($tr);
}

function createTable(data) {
    if(data.data.length > 0){
        var $head = wrapArray(data.titles, 'th', 'thead', data);
        var $body = wrapArray(data.data, 'td', 'tbody', data);
        $('.panel-body').html($('<table>').addClass('table').append($head, $body));
    }
    else {
        $('.panel-body').html($('<h5>').text('Пусто'));
    }

}


function setImg () {
    var newSaveData = new FormData();


    $('input[type=file]').each(function(key, value){
        if(value.files[0]){
            newSaveData.append('userPhoto',value.files[0]);
        }
    });

    $.each(object,function (k,v) {
        newSaveData.append(k,v);
    });

    $.ajax({
        url: '/uploadUserPhoto' ,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function(data){
            $('.profile-img').removeClass('cropper-hidden');
            $('.profile-img').attr('src', data + "?timestamp=" + new Date().getTime());
            $('.cropper-container').remove();
            $('input[type=file]').val('');
        },
        data : newSaveData
    });

    return false;
}

function readURL(input,call) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-img').attr('src', e.target.result);
            call();
        }

        reader.readAsDataURL(input.files[0]);
    }
}
