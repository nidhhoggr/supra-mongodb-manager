<?php
/*
Plugin Name: Supra MongoDB Manager
Description: A plugin to provide a crud interface for the specified mongodb collection
Author: zmijevik
Version: 0.6
*/

//load the framework
require_once(dirname(__FILE__) . '/wp_mvc.php');

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
