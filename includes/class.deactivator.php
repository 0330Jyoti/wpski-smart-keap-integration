<?php



class WPSKI_Smart_Keap_Deactivator

{

    public function deactivate() {

		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		

		$smart_Keap_report_table_name 			= $wpdb->prefix . 'smart_Keap_report';

		$smart_Keap_field_mapping_table_name 	= $wpdb->prefix . 'smart_Keap_field_mapping';



		delete_option('wpski_smart_Keap_settings');

		delete_option('wpski_smart_Keap');

		delete_option('wpski_smart_Keap_modules_fields');

	}

}

?>