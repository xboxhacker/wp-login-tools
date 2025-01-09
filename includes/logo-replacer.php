<?php
function wp_login_tools_custom_login_logo() {
    $options = get_option('wp_login_tools_options');
    if (!empty($options['login_logo'])) {
        echo '
        <style type="text/css">
            #login h1 a {
                background-image: url(' . esc_url($options['login_logo']) . ') !important;
                background-size: contain !important;
                width: 100% !important;
                height: 80px !important;
            }
        </style>';
    }
}
add_action('login_enqueue_scripts', 'wp_login_tools_custom_login_logo');
?>
