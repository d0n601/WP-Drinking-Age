<?php

// if uninstall.php is not called by WordPress, die
if ( ! defined( 'WPINC' ) ) {
    die();
}

// Enqueue Admin Scripts and Styles for WP Drinking Age
function dagw_admin_scripts() {

    wp_enqueue_media();

    wp_register_script( 'bouncer_admin_js', plugin_dir_url(__FILE__).'js/bouncer_admin.js');
    wp_enqueue_script( 'bouncer_admin_js');

    wp_register_style( 'bouncer_admin_css', plugin_dir_url(__FILE__). 'css/bouncer_admin.css', false, '1.0.0' );
    wp_enqueue_style( 'bouncer_admin_css' );

} add_action('admin_enqueue_scripts', 'dagw_admin_scripts');


// Add Admin Menu Option
function dagw_admin_menu() {
    add_options_page( 'WP Drinking Age', 'WP Drinking Age', 'manage_options', 'wp-drinking-age', 'dagw_options_page' );
} add_action( 'admin_menu', 'dagw_admin_menu' );


// Register Settings and Fields for Gateway Configuration
function dagw_settings() {

    // Register Settings For Age Gateway Behavior
    add_option( 'dagw_bootstrap', 0);
    register_setting( 'gateway-group', 'dagw_bootstrap' );

    add_option( 'dagw_logo_url', 'https://placehold.it/350x150');
    register_setting( 'gateway-group', 'dagw_logo_url' );

    add_option( 'dagw_message', "As part of our commitment to responsible drinking, we just need to check that you're of legal drinking age.");
    register_setting( 'gateway-group', 'dagw_message' );

    add_option( 'dagw_redirect', 'https://responsibility.org');
    register_setting( 'gateway-group', 'dagw_redirect' );

    add_option( 'dagw_deny_message', 'Sorry but you are not of legal drinking age...');
    register_setting( 'gateway-group', 'dagw_deny_message' );

    add_option( 'dagw_deny_timeout', 3000);
    register_setting( 'gateway-group', 'dagw_deny_timeout' );

    // Register Settings For Age Gateway Custom Styles
    add_option( 'dagw_gate_font_color', '#FFFFFF');
    register_setting( 'gateway-group', 'dagw_gate_font_color' );

    add_option( 'dagw_gate_background_color', '#1F1B1C');
    register_setting( 'gateway-group', 'dagw_gate_background_color' );

    add_option( 'dagw_gate_border_radius', '15px');
    register_setting( 'gateway-group', 'dagw_gate_border_radius' );

    add_option( 'dagw_gate_border_style', 'solid', '', 'yes' );
    register_setting( 'gateway-group', 'dagw_gate_border_style' );

    add_option( 'dagw_gate_border_color', '#FFFFFF');
    register_setting( 'gateway-group', 'dagw_gate_border_color' );

    add_option( 'dagw_gate_border_width', '5px');
    register_setting( 'gateway-group', 'dagw_gate_border_width' );


    // Create Group For Age Gate Behavioral Settings
    add_settings_section( 'gateway', 'Gateway Settings', 'dagw_settings_callback', 'wp-drinking-age' );

    // Create Setting Fields For Behavioral Settings
    add_settings_field( 'bootstrap-field', 'Bootstrap CSS', 'dagw_bootstrap_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field('logo-field', 'Logo Image', 'dagw_logo_field_callback', 'wp-drinking-age', 'gateway');
    add_settings_field( 'message-field', 'Message', 'dagw_message_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field( 'redirect-field', 'Redirect', 'dagw_redirect_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field( 'deny-message-field', 'Denial Message', 'dagw_deny_message_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field( 'deny-timeout-field', 'Deny Timeout', 'dagw_deny_timeout_field_callback', 'wp-drinking-age', 'gateway' );

    // Create Setting Fields For Custom Styles
    add_settings_field( 'font-color-field', 'Font Color', 'dagw_font_color_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field( 'background-color-field', 'Background Color', 'dagw_background_color_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field( 'border-color-field', 'Border Color', 'dagw_border_color_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field( 'border-radius-field', 'Border Radius', 'dagw_border_radius_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field( 'border-style-field', 'Border Style', 'dagw_border_style_field_callback', 'wp-drinking-age', 'gateway' );
    add_settings_field( 'border-width-field', 'Border Width', 'dagw_border_width_field_callback', 'wp-drinking-age', 'gateway' );


} add_action( 'admin_init', 'dagw_settings' );


function dagw_options_page() {
    ?>
    <div class="wrap">
        <h2>WP Drinking Age: An Age Verification Gateway for Alcoholic Brands</h2>
        <form action="options.php" method="POST">
            <?php settings_fields( 'gateway-group' ); ?>
            <?php do_settings_sections( 'wp-drinking-age' ); ?>
            <?php submit_button(); ?>

        </form>
    </div>
    <?php
}

function dagw_settings_callback() {
    echo 'You may change the default settings of your age verification gateway.';
}

function dagw_bootstrap_field_callback() {
    $setting = esc_attr( get_option( 'dagw_bootstrap') );
	?>
    <input type='checkbox' name='dagw_bootstrap' id='dagw_bootstrap' value="1" <?php checked(1, $setting, true); ?> />
    <span class='description'> check this if theme already uses Twitter Bootstrap CSS</span>

    <?php
}

function dagw_logo_field_callback() {
    $setting = esc_attr( get_option( 'dagw_logo_url') );
    ?>
    <input type="text" id="dagw_logo_url" name="dagw_logo_url" value="<?php echo esc_url( $setting ); ?>" />
    <input name="upload-btn" id="upload-btn" type="button" class="button" value="Upload" required/>
    <span class="description"><?php echo 'Select your logo image.'; ?></span>
    <?php
}

function dagw_message_field_callback() {
    $setting = esc_attr( get_option('dagw_message') );
    echo "<input type='text' name='dagw_message' value='$setting' required/>";
}

function dagw_redirect_field_callback() {
    $setting = esc_attr( get_option('dagw_redirect') );
    echo "<input type='text' name='dagw_redirect' value='$setting' required/>";
}

function dagw_deny_message_field_callback() {
    $setting = esc_attr( get_option('dagw_deny_message') );
    echo "<input type='text' name='dagw_deny_message' value='$setting' required/>";
}

function dagw_deny_timeout_field_callback() {
    $setting = esc_attr( get_option('dagw_deny_timeout') );
    echo "<input type='text' name='dagw_deny_timeout' value='$setting' required/>";
    echo "<span class='description'>Time in Miliseconds</span>";

}

function dagw_font_color_field_callback() {
    $setting = esc_attr( get_option('dagw_gate_font_color') );
    echo "<input type='text' name='dagw_gate_font_color' value='$setting' required/>";
}

function dagw_background_color_field_callback() {
    $setting = esc_attr( get_option('dagw_gate_background_color') );
    echo "<input type='text' name='dagw_gate_background_color' value='$setting' required/>";
}

function dagw_border_color_field_callback() {
    $setting = esc_attr( get_option('dagw_gate_border_color') );
    echo "<input type='text' name='dagw_gate_border_color' value='$setting' required/>";
}

function dagw_border_style_field_callback() {
    $setting = esc_attr( get_option('dagw_gate_border_style') );
    echo "<input type='text' name='dagw_gate_border_style' value='$setting' required/>";
}

function dagw_border_width_field_callback() {
    $setting = esc_attr( get_option('dagw_gate_border_width') );
    echo "<input type='text' name='dagw_gate_border_width' value='$setting' required/>";
}

function dagw_border_radius_field_callback() {
    $setting = esc_attr( get_option('dagw_gate_border_radius') );
    echo "<input type='text' name='dagw_gate_border_radius' value='$setting' required/>";
}