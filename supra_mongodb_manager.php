<?php
/*
Plugin Name: Supra Mongodb Manager
Plugin URI: 
Description: 
Author: 
Version: 
Author URI: 
*/

register_activation_hook(__FILE__, 'supra_mongodb_manager_activate');
register_deactivation_hook(__FILE__, 'supra_mongodb_manager_deactivate');

function supra_mongodb_manager_activate() {
	require_once dirname(__FILE__).'/supra_mongodb_manager_loader.php';
	$loader = new SupraMongodbManagerLoader();
	$loader->activate();
}

function supra_mongodb_manager_deactivate() {
	require_once dirname(__FILE__).'/supra_mongodb_manager_loader.php';
	$loader = new SupraMongodbManagerLoader();
	$loader->deactivate();
}

?>