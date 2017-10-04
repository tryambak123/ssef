<?php

/*
  Plugin Name: AlphansoTech Plugin
  Description: Plugin for testing purpose
  Version: 1
  Author: AlphansoTech
  Author URI: http://alphansotech.com
 */
add_action('admin_menu', 'at_alphansotech_menu');

function plugin_name_scripts() {
	wp_enqueue_style( 'style', plugins_url('CSS/style.css', __FILE__));
	wp_enqueue_script( 'script', plugins_url('JS/validation.js', __FILE__), array('jquery'));
}
add_action('init', 'plugin_name_scripts');

function at_alphansotech_menu() {
    add_menu_page('Employee Listing', //page title
            'Employee', //menu title
            'manage_options', //capabilities
            'Employee', //menu slug
            employee_list //function
    );
    add_submenu_page('Employee', //parent slug
            'Add New Employee', //page title
            'Add New', //menu title
            'manage_options', //capability
            'add_new_employee', //menu slug
            add_new_employee);
}

global $at_db_version;
$at_db_version = '1.0';

function at_datatable() {
    global $wpdb;
    global $at_db_version;

    $table_name = $wpdb->prefix . 'students';

    $charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE  IF NOT EXISTS wp_students (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	name varchar(100) DEFAULT '' NOT NULL,
	username varchar(100) DEFAULT '' NOT NULL,
	password varchar(100) DEFAULT '' NOT NULL,
	UNIQUE KEY id (id) ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
	
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);

    add_option('at_db_version', $at_db_version);
}
try{
	register_activation_hook(__FILE__, 'at_datatable');
} catch (Exception $e) {
	die($e->getMessage());
}
define('ROOTDIR', plugin_dir_path(__FILE__)); // returns the root directory path of particular plugin
require_once(ROOTDIR . 'employee_list.php');
require_once(ROOTDIR . 'add_employee.php');
require_once(ROOTDIR . 'home.php');
require_once(ROOTDIR . 'for_students.php');
require_once(ROOTDIR . 'students_registration.php');
require_once(ROOTDIR . 'students_login.php');
?>