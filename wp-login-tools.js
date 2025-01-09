jQuery(document).ready(function($) {
    $('.wp_login_tools_upload_button').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Select or Upload Logo',
            multiple: false
        }).open()
        .on('select', function() {
            var uploaded_image = image.state().get('selection').first();
            var image_url = uploaded_image.toJSON().url;
            $('#login_logo').val(image_url);
            $('img').attr('src', image_url);
        });
    });
});
