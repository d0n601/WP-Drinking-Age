<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('dagw_bootstrap');
delete_option('dagw_logo_url');
delete_option('dagw_message');
delete_option('dagw_redirect');
delete_option('dagw_deny_message');
delete_option('dagw_deny_timeout');
delete_option('dagw_link_to_terms');
delete_option('dagw_link_to_privacy');
delete_option('dagw_gate_font_color' );
delete_option('dagw_gate_background_color' );
delete_option('dagw_gate_border_radius' );
delete_option('dagw_gate_border_style' );
delete_option('dagw_gate_border_color' );
delete_option('dagw_gate_border_width' );