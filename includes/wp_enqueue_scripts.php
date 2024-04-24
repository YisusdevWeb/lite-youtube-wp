<?php
//Global  Variables
$js_data_passed = array('ajax_url' => admin_url('admin-ajax.php'));

// Incluir scripts y estilos del frontend
add_action('wp_enqueue_scripts', 'ylw_enequeue_scripts_and_styles', 100);
function ylw_enequeue_scripts_and_styles()
{
  global $js_data_passed;
  //wp_enqueue_script( 'ylw-frontend', YLW_PLUGIN_URL . '/assets/js/script.js', array('jquery'), '1.0.0', true );
  // wp_localize_script( 'ylw-frontend', 'ylw', $js_data_passed);
  wp_enqueue_style('ylw-frontend-style', YLW_PLUGIN_URL . '/assets/css/style.css', array(), '1.0.2');
}

// Incluir scripts y estilos del administrador

add_action('admin_enqueue_scripts', 'ylw_enqueue_admin_scripts_and_styles');
function ylw_enqueue_admin_scripts_and_styles()
{
  global $js_data_passed;
  wp_enqueue_script('ylw-settings', YLW_PLUGIN_URL . '/assets/js/script.js', array('jquery'), '1.0.2', true);
  wp_localize_script('ylw-settings', 'ylw', $js_data_passed);
}
