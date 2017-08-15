<?php
add_action('admin_menu', 'bookapitest_register_submenu');

function bookapitest_register_submenu() {
    add_submenu_page( 
        'options-general.php', 'BookApiTest settings', 'BookApiTestSettings', 'manage_options', 'book-api-test', 'bookapitest_submenu_page_callback'
    );
}

function bookapitest_submenu_page_callback() {

    if (!current_user_can('manage_options')) {
        return;
    }

    echo '<div class="wrap">';
    echo '<h1>', esc_html(get_admin_page_title()), '</h1>';
    echo '<form action="options.php" method="post">';

    echo settings_fields('bookapitest_options');
    echo do_settings_sections('bookapitest');

    echo '<table class="form-table">';
    echo '<tr valign="top">';
    echo '<th scope="row">API Key</th>';
    echo '<td><input type="text" name="bookapitest_api_key" value="', esc_attr( get_option('bookapitest_api_key') ), '" /></td>';
    echo '</tr>';
    echo '<tr valign="top">';
    echo '<th scope="row">Service URL</th>';
    echo '<td><input type="text" name="bookapitest_service_url" value="', esc_attr( get_option('bookapitest_service_url') ), '" /></td>';
    echo '</tr>';
    echo '</table>';
                                               
    echo submit_button('Save Settings');

    echo '</form>';
    echo '</div>';
}

add_action('admin_init', 'bookapitest_register_settings');

function bookapitest_register_settings() {
    register_setting('bookapitest_options', 'bookapitest_api_key');
    register_setting('bookapitest_options', 'bookapitest_service_url');
}
