<?php

class SupraMongodbManagerLoader extends MvcPluginLoader {

	var $db_version = '1.0';
	var $tables = array();

        private function prefixTableName($table_name) {
            global $wpdb; 
           
            return $wpdb->prefix . $table_name;
 
        }

	function activate() {

		// This call needs to be made to activate this app within WP MVC
		$this->activate_app(__FILE__);
		
		// Perform any databases modifications related to plugin activation here, if necessary

		require_once ABSPATH.'wp-admin/includes/upgrade.php';
	
		add_option('supra_mongodb_manager_db_version', $this->db_version);
		
		// Use dbDelta() to create the tables for the app here
		// $sql = '';
		// dbDelta($sql);
                $tableName = $this->prefixTableName('supra_mongodb_connections');
                $sql = "
                     CREATE TABLE IF NOT EXISTS `$tableName` (
                     `id` int(8) NOT NULL AUTO_INCREMENT,
                     `name` varchar(64) NOT NULL,
                     `username` varchar(64) NOT NULL,
                     `password` varchar(64) NOT NULL,
                     `host` varchar(64) NOT NULL,
                     `port` varchar(64) NOT NULL,
                     `database_name` varchar(64) NOT NULL,
                     `active` boolean NOT NULL DEFAULT 1,
                     PRIMARY KEY (`id`)
                 )";
                dbDelta($sql);

                $tableName = $this->prefixTableName('supra_mongodb_collections');
                $sql = "
                    CREATE TABLE IF NOT EXISTS `$tableName` (
                    `id` int(8) NOT NULL AUTO_INCREMENT,
                    `supra_mongodb_connection_id` int(8) NOT NULL,
                    `name` varchar(64) NOT NULL,
                    `displayable_name` varchar(64) NOT NULL,
                    `active` boolean NOT NULL DEFAULT 1,
                    PRIMARY KEY (`id`)
                 )";
                dbDelta($sql);

                $tableName = $this->prefixTableName('supra_mongodb_fields');
                $sql = "
                     CREATE TABLE IF NOT EXISTS `$tableName` (
                     `id` int(8) NOT NULL AUTO_INCREMENT,
                     `supra_mongodb_collection_id` int(8) NOT NULL,
                     `name` varchar(64) NOT NULL,
                     `displayable_name` varchar(64) NOT NULL,
                     `active` boolean NOT NULL DEFAULT 1,
                     PRIMARY KEY (`id`)
                 )";
                dbDelta($sql);
	}

	function deactivate() {
	
		// This call needs to be made to deactivate this app within WP MVC
		
		$this->deactivate_app(__FILE__);
		
		// Perform any databases modifications related to plugin deactivation here, if necessary
	
	}

}

?>
