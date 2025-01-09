<?php
function wp_login_tools_enqueue_media() {
    wp_enqueue_media();
    wp_enqueue_script('wp-login-tools-js', plugin_dir_url(__FILE__) . 'wp-login-tools.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'wp_login_tools_enqueue_media');

function wp_login_tools_save_media($media) {
    if (isset($_POST['wp_login_tools_options']['login_logo'])) {
        $media['login_logo'] = esc_url_raw($_POST['wp_login_tools_options']['login_logo']);
    }
    return $media;
}
add_filter('pre_update_option_wp_login_tools_options', 'wp_login_tools_save_media');
?>
