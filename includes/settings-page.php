<?php
function wp_login_tools_menu() {
    add_menu_page(
        'WP Login Tools',
        'Login Tools',
        'manage_options',
        'wp-login-tools',
        'wp_login_tools_settings_page'
    );
}
add_action('admin_menu', 'wp_login_tools_menu');

function wp_login_tools_settings_page() {
    ?>
    <div class="wrap">
        <h1>WP Login Tools</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('wp_login_tools_options_group');
            do_settings_sections('wp-login-tools');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function wp_login_tools_settings_init() {
    register_setting('wp_login_tools_options_group', 'wp_login_tools_options');

    add_settings_section(
        'wp_login_tools_section',
        'Login Logo Settings',
        null,
        'wp-login-tools'
    );

    add_settings_field(
        'login_logo',
        'Login Logo',
        'wp_login_tools_logo_render',
        'wp-login-tools',
        'wp_login_tools_section'
    );
}
add_action('admin_init', 'wp_login_tools_settings_init');

function wp_login_tools_logo_render() {
    $options = get_option('wp_login_tools_options');
    ?>
    <input type="text" id="login_logo" name="wp_login_tools_options[login_logo]" value="<?php echo esc_url($options['login_logo']); ?>" />
    <button class="button wp_login_tools_upload_button">Upload</button>
    <img src="<?php echo esc_url($options['login_logo']); ?>" style="max-width:100px; display:block; margin-top:10px;" />
    <?php
}
?>
