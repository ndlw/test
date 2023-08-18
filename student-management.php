<?php

/*
 * Plugin Name:       Student Management
 * Plugin URI:        #
 * Description:       Student Management plugin.
 */
/*=======================================*/ 

define('ZEND_MP_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('ZEND_MP_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define('ZEND_MP_VIEWS_DIR', ZEND_MP_PLUGIN_DIR .'views');
define('ZEND_MP_CSS_DIR', ZEND_MP_PLUGIN_URL .'css');
define('ZEND_MP_JS_DIR', ZEND_MP_PLUGIN_URL .'js');
define('ZEND_MP_INCLUDES_DIR', ZEND_MP_PLUGIN_DIR .'includes');
define('ZEND_MP_AJAX_DIR', ZEND_MP_PLUGIN_DIR .'ajax');


if ( is_admin() ) {
    
    require_once ZEND_MP_PLUGIN_DIR.'/admin.php';
    new Student_MG_PLG();
}

//Active plugin
require_once ZEND_MP_INCLUDES_DIR.'/student-management-active.php';
$student_active = new student_management_active();
register_activation_hook(__FILE__, array($student_active, 'active'));



