<?php
class WPSKI_Smart_Keap_Admin_Settings {

    public function processSettingsForm($POST = array()) {
        // Initialize the confirmation variable
        $confirmation = "";

        $client_id = $client_secret = "";

        if (isset($_POST['submit'])) {
            if (isset($_REQUEST['tab']) && $_REQUEST['tab'] == "general") {
                $client_id = sanitize_text_field($_REQUEST['wpski_smart_Keap_settings']['client_id']);
                $client_secret = sanitize_text_field($_REQUEST['wpski_smart_Keap_settings']['client_secret']);
                $wpski_smart_Keap_data_center = sanitize_text_field($_REQUEST['wpski_smart_Keap_settings']['data_center']);

                // Assuming you want to create a confirmation message
                $confirmation = '<div class="updated"><p><strong>Settings have been updated successfully!</strong></p></div>';
            }

            $wpski_smart_Keap_settings = !empty(get_option('wpski_smart_Keap_settings')) ? get_option('wpski_smart_Keap_settings') : array();

            $wpski_smart_Keap_settings = array_merge($wpski_smart_Keap_settings, $_REQUEST['wpski_smart_Keap_settings']);

            update_option('wpski_smart_Keap_settings', $wpski_smart_Keap_settings);

        }

        // Display the confirmation message
        echo $confirmation;
    }

    public function displaySettingsForm() {
        require_once WPSKI_PLUGIN_PATH . 'admin/partials/settings.php';
    }
}
?>




