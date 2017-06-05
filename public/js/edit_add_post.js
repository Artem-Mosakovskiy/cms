var images = [];

tinymce.init({
    selector:'.editor',
    toolbar: 'undo redo | italic bold | paste copy cut | outdent indent | mybutton',
    height: 400,
    setup: function(editor) {
        editor.on('init', function() {
            tinymce.activeEditor.setContent($('#content').html());
        });

        editor.addButton('mybutton', {
            text: 'Добавить фото',
            icon: false,
            onclick: function () {
                $('input[name=img]').click();
            }
        });

    }
});



function sendImg ($obj) {
    var newSaveData = new FormData();

    $obj.each(function(key, value){
        if(value.files[0]){
            newSaveData.append('user_photo',value.files[0]);
        }
    });

    newSaveData.append('_token', token);

    $.ajax({
        url: '/admin/ajaxUploadImg' ,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function(response){

            tinymce.activeEditor.execCommand('mceInsertContent', false, '<img id="img" style="width: 200px;" src="' + response + '">');

            var $image = tinymce.activeEditor.dom.select('[src="' + response + '"]');
            images.push($($image).attr('src'));
        },
        data : newSaveData
    });

    return false;
}

function deleteUnusedImages($images){
    var src;

    for (var i = 0; i < images.length; i++) {
        src = images[i];

        $.each($images, function (k, v) {
            if (~v.src.indexOf(src)) {
                images.splice(i, 1);
            }
        });
    }
    ajaxDeleteImages();
}

function ajaxDeleteImages() {

    if(images.length >= 1){
        $.get('/admin/ajaxDeleteImages', {photos: images}, function (data) {

        })
    }

}


$(function () {

    $('form[name=post]').submit(function(e){
        $('textarea[name=content]').val(tinymce.activeEditor.getContent());
        var $tiny = tinyMCE.activeEditor.getBody();
        var $images = $($tiny).find('img#img');
        deleteUnusedImages($images);
    });

    $('input[name=img]').on('change', function () {
        sendImg($(this));
    });


});