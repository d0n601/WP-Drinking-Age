<?php

/**
* Plugin Name: WP Drinking Age
* Plugin URI: https://github.com/d0n601/WP-Drinking-Age
* Description: Easily implement a drinking age gateway on your WordPress installation.
* Author: Ryan Kozak
* Version: 0.1.0
* Author URI: https://ryankozak.com
**/

// if uninstall.php is not called by WordPress, die
if ( ! defined( 'WPINC' ) ) {
    die();
}

require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '/admin/admin.php';


// Load Assets
function dagw_gateway_assets() {

    // User settings check for themes that already include Bootstrap CSS
    if(get_option('dagw_bootstrap') == 0) {
        wp_register_style('bootstrap', plugin_dir_url(__FILE__).'/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap');
    }

    wp_register_script( 'bouncer_js', plugin_dir_url(__FILE__).'/js/bouncer.js', array( 'jquery' ), '1.0.0', false);
    wp_enqueue_script( 'bouncer_js');

    wp_register_style('bouncer_css', plugin_dir_url(__FILE__).'/css/bouncer.css');
    wp_enqueue_style('bouncer_css');

} add_action( 'wp_enqueue_scripts', 'dagw_gateway_assets' );



// Initalize the gateway with user settings
function dagw_init_gateway() {
    ?>

    <style>
        #age_controls {
            color: <?php echo get_option('dagw_gate_font_color')?>;
            background-color: <?php echo get_option('dagw_gate_background_color')?>;
            border-radius: <?php echo get_option('dagw_gate_border_radius')?>;
            border-style: <?php echo get_option('dagw_gate_border_style')?>;
            border-width: <?php echo get_option('dagw_gate_border_width')?>;
            border-color: <?php echo get_option('dagw_gate_border_color')?>;
        }
    </style>

    <script type="text/javascript">
        var settings = {
            "image" : "<?php echo get_option('dagw_logo_url')?>",
            "message" : "<?php echo get_option('dagw_message') ?>",
            "redirect" : "<?php echo get_option('dagw_redirect') ?>",
            "deny_message" : "<?php echo get_option('dagw_deny_message') ?>",
            "deny_timeout": "<?php echo get_option('dagw_deny_timeout'); ?>"
        };
        drinkingAge(settings);
    </script>

    <?php
} add_action('wp_footer', 'dagw_init_gateway');

