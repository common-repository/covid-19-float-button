<?php
/**
* Plugin Name: COVID-19 Float Button
* Description: Shows a floating button with a link to a read more page.
* Version: 1.1
* Author: Bart Sallé
* Author URI: https://www.bartsalle.nl
* Plugin URI: https://www.bartsalle.nl/download/
**/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Create settings link

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'cbf_add_plugin_page_settings_link');
function cbf_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=cfb-options' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}

// Set default options
$defaults = array(
    'enable' => '0',
    'text' => 'Our COVID-19 response',
    'link' => '#',
    'newpage' => '0',
    'textcolor' => '#FFFFFF',
    'bgcolor' => '#D70F20',
    'icon' => 1,
    'position' => 1,
    'offset-vertical' => '20px',
    'offset-horizontal' => '20px'
  );

// Global Options Variable
$cfb_options = get_option('cfb_settings', $defaults);

// Load admin
if (is_admin()) {
    require_once(plugin_dir_path(__FILE__).'includes/covid-float-button-admin.php');
}

// Load main stylesheet
function cfb_add_scripts() {
    wp_register_style( 'cfb-main-style',  plugin_dir_url( __FILE__ ) . 'css/style.css' );
    wp_enqueue_style( 'cfb-main-style' );
}
add_action( 'wp_enqueue_scripts', 'cfb_add_scripts' );

// Load Font Awesome if not already available
function cfb_load_fa() {
    wp_register_style( 'cfb-fa',  plugin_dir_url( __FILE__ ) . 'css/all.css' );
    wp_enqueue_style( 'cfb-fa' );
}
if (!wp_style_is( 'fontawesome', 'enqueued' )) {
    add_action( 'wp_enqueue_scripts', 'cfb_load_fa' );
    add_action('admin_init', 'cfb_load_fa');
}

// Load content
function cfb_content() {
    global $cfb_options;

    $button = '<a id="cfb-button" href="'. $cfb_options['link'] .'" ';
    if($cfb_options['newpage']=='1') {
        $button .= 'target="_blank"';
    } else {
        $button .= 'target="_self"';
    }
    $button .= 'style="background-color:'.$cfb_options['bgcolor'].'; color:'.$cfb_options['textcolor'].';';
    if($cfb_options['position']=='1') {
        $button .= 'bottom:'.$cfb_options['offset-horizontal'].';';
        $button .= 'right:'.$cfb_options['offset-vertical'].';';
    } elseif($cfb_options['position']=='2') {
        $button .= 'bottom:'.$cfb_options['offset-horizontal'].';';
        $button .= 'left:'.$cfb_options['offset-vertical'].';';
    } elseif($cfb_options['position']=='3') {
        $button .= 'top:'.$cfb_options['offset-horizontal'].';';
        $button .= 'right:'.$cfb_options['offset-vertical'].';';
    } else {
        $button .= 'top:'.$cfb_options['offset-horizontal'].';';
        $button .= 'left:'.$cfb_options['offset-vertical'].';';
    }
    $button .= '">';
    $button .= $cfb_options['text'];
    if($cfb_options['icon']=='1') {
        $button .= '<i class="fas fa-info-circle fa-3x"></i>';
    } elseif($cfb_options['icon']=='2') {
        $button .= '<i class="fas fa-virus fa-3x"></i>';
    } elseif($cfb_options['icon']=='3') {
        $button .= '<i class="fas fa-question-circle fa-3x"></i>';
    } else {
        $button .= '<i class="fas fa-exclamation-circle fa-3x"></i>';
    }
    $button .= '</a>';
    
    if($cfb_options['enable']==1) {
        echo $button; 
    }
    
}
add_action( 'wp_footer', 'cfb_content' );