$(document).ready(function() {
    $('.wysiwyg').summernote({
        height: 300,
        disableDragAndDrop: true,
        toolbar: [
            'style',
            'bold',
            'underline',
            'clear',
            'color',
            'ul',
            'ol',
            'paragraph',
            'table',
            'link',
            'picture',
            'video',
            'codeview'
          ]
    });
  });

$('.modern-nav-toggle').on('click', function(){

    $.ajax({
    url: BASIC_URL + 'cms/toggle-manu-cms',
    type: 'GET',
    dataType: 'json',
    data: { toggleCms: $(this).data('cms-toggle') },
    success: function (response) {
    }
    });

});

$('.img-front-to-save').on('input', function(){

    var fileUrl = URL.createObjectURL(event.target.files[0]);
    $('.img-front').attr('src', fileUrl);
    $('.block-img-front').css('display', 'block');
    
});

$('form').on('submit', function(e){

    $('[type=submit]').attr('disabled', 'disabled');

});