<?php
/**
 * Plugin Name:Sendgrid-email-plugin
 * Plugin URI:http://localhost:8000
 * Version:1.0.0
 * Description:plugin to send email using sendgrid
 * Author:Ram
 * Author URI:http://localhost:8000
 * License :GPL or later
 * Text Domain:Sendgrid-email-plugin
 *
 */

defined( 'ABSPATH') OR die( 'You cannot access this page');
defined( 'SE_ADMIN_VIEW_PATH') OR define( 'SE_ADMIN_VIEW_PATH', __DIR__ . '/App/View/Admin');
defined('SE_ADMIN_CONTROLLER_PATH') OR define( 'SE_ADMIN_CONTROLLER_PATH', __DIR__ . '/App/Controller/Admin');
defined( 'SE_JS_PATH') OR define( 'SE_JS_PATH', plugins_url('/asserts/Admin/js', __FILE__) );


if( file_exists( plugin_dir_path( __FILE__ ).'vendor/autoload.php')) {
    require_once 'vendor/autoload.php';
    $plugin = new \se\App\Router();
    $plugin->init();
}







