<?php 

/* 
  Plugin Name: Fouad Vollmer – Easy Init 
  Description: Setting up and customizing the Fouad Vollmer Custom Theme with ease.
  Plugin URI: https://github.com/fouadvollmer/plugin-easy-init
  Author: Fouad Vollmer Werbeagentur
  Author URI: https://www.fouadvollmer.de
  Version: 1.0.3
*/

  require_once plugin_dir_path( __FILE__ ) . '/src/interface.php';

  function fv_ei_add_interface () {
    includeInterface();
  }

  add_action('wp_head', 'fv_ei_add_interface');

  function fv_ei_change_acf_loading_location( $path ) {
    return plugin_dir_path( __FILE__ ) . './src/acf-json';
  }

  add_filter('acf/settings/save_json', 'fv_ei_change_acf_loading_location');
  add_filter('acf/settings/load_json', 'fv_ei_change_acf_loading_location');

  // ACF Add Theme Settings Page
  if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
      'page_title' => 'Theme',
      'menu_title' => 'Theme',
      'menu_slug' => 'theme-options',
      'capability' => 'switch_themes',
      'redirect' => false,
      'icon_url' => 'dashicons-admin-settings',
      'position' => 59
    ) );
  }
