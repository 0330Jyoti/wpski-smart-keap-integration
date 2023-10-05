<?php

class WPSKI_Smart_Keap_Admin {



    public function __construct() {

        $this->load();

        $this->menu();

    }



    private function load() {

        require_once WPSKI_PLUGIN_PATH . 'admin/class.settings.php';

        require_once WPSKI_PLUGIN_PATH . 'admin/class.fields-mappings.php';

        require_once WPSKI_PLUGIN_PATH . 'admin/class.synchronization.php';

        require_once WPSKI_PLUGIN_PATH . 'admin/class.customers-list.php';

        require_once WPSKI_PLUGIN_PATH . 'admin/class.orders-list.php';

        require_once WPSKI_PLUGIN_PATH . 'admin/class.products-list.php';

    }



    private function menu() {

        add_action( 'admin_enqueue_scripts', array($this, 'wpski_smart_keap_scripts_callback') );

        add_action( 'wp_ajax_wp_field', array($this, 'wpski_smart_keap_wp_field_callback') );

        add_action( 'wp_ajax_Keap_field', array($this, 'wpski_smart_keap_keap_field_callback') );

        add_action( 'admin_menu', array($this, 'wpski_smart_keap_main_menu_callback') );

    }



    public function wpski_smart_keap_scripts_callback(  $hook ) {

      

        $hook_array = array(

                            'toplevel_page_wpski-smart-Keap-integration',

                            'smart-Keap_page_wpski-smart-Keap-mappings'

                        );

        if (  ! in_array($hook, $hook_array)  ) {

            return;

        }



        // Register the script



        wp_register_script( 

                    'jquery-dataTables-min-js', 

                    wpski_PLUGIN_URL . 'admin/js/jquery.dataTables.min.js', 

                    array(), 

                    time() 

                );



        wp_register_script( 

                    'wpski-smart-Keap-js', 

                    wpski_PLUGIN_URL . 'admin/js/wpski-smart-Keap.js', 

                    array(), 

                    time() 

                );



        wp_register_style( 

                    'jquery-dataTables-min-css', 

                    wpski_PLUGIN_URL . 'admin/css/jquery.dataTables.min.css', 

                    array(), 

                    time() 

                );



        wp_register_style( 

                    'wpski-smart-Keap-style', 

                    wpski_PLUGIN_URL . 'admin/css/wpski-smart-Keap.css', 

                    array(), 

                    time() 

                );

        



        // Localize the script with new data

        $localize_array = array(

            'ajaxurl'       => admin_url( 'admin-ajax.php' ),

        );



        wp_localize_script( 'wpski-smart-Keap-js', 'smart_Keap_js', $localize_array );

         

        // Enqueued script with localized data.



        wp_enqueue_script( 'jquery-dataTables-min-js' );

        wp_enqueue_script( 'wpski-smart-Keap-js' );

        

        wp_enqueue_style( 'jquery-dataTables-min-css' );

        wp_enqueue_style( 'wpski-smart-Keap-style' );

    }



    public function wpski_smart_keap_wp_field_callback() {

       ob_start(); 

       $wp_fields = array();



       if( isset( $_REQUEST['wp_module_name'] ) ){



            switch ( $_REQUEST['wp_module_name'] ) {

                case 'customers':

                    $wp_fields = wpski_Smart_Keap::get_customer_fields();

                    break;



                case 'orders':

                    $wp_fields = wpski_Smart_Keap::get_order_fields();

                    break;



                case 'products':

                    $wp_fields = wpski_Smart_Keap::get_product_fields();

                    break;



                default:

                    # code...

                    break;

            }

       }

       

       $wp_fields_options = "<option>".esc_html__('Select WP Fields', 'wpski-smart-Keap')."</option>";

       

       if($wp_fields){

            foreach ($wp_fields as $option_value => $option_label) {

                $wp_fields_options .=  "<option value='".$option_value."'>".esc_html__($option_label, 'wpski-smart-Keap')."</option>";

            }

       }

       

       ob_get_clean();

       echo $wp_fields_options;

       wp_die(); 

    }



    public function wpski_smart_keap_keap_field_callback() {

       ob_start(); 

       $Keap_fields = array();



       if( isset($_REQUEST['Keap_module_name']) ){

            $Keap_module    = $_REQUEST['Keap_module_name'];

                $Keap_api_obj   = new wpski_Smart_Keap_API();

                $Keap_fields    = $Keap_api_obj->getFieldsMetaData($Keap_module);

       }

       

       $Keap_fields_options = "<option>".esc_html__('Select Keap Fields', 'wpski-smart-Keap')."</option>";

       

       if($Keap_fields){

            foreach ($Keap_fields['fields'] as $Keap_field_key => $Keap_field_data) {

                if($Keap_field_data['field_read_only'] == NULL){



                    $system_mandatory   = ($Keap_field_data['system_mandatory'] == 1) ? " ( Required ) " : "";

                    $data_type          = isset($Keap_field_data['data_type']) ? " ( ".ucfirst($Keap_field_data['data_type'])." ) " : "";



                    echo 

                    $Keap_fields_options .= "<option value='".$Keap_field_data['api_name']."'>". esc_html__($Keap_field_data['display_label'], 'wpski-smart-Keap') . esc_html($data_type) . esc_html($system_mandatory) . "</option>";

                }

            }

       }

       

       ob_get_clean();

       echo $Keap_fields_options;

       wp_die(); 

    }



    public function wpski_smart_keap_main_menu_callback() {

        add_menu_page( 

                        esc_html__('Smart Keap', 'wpski-smart-keap'), 

                        esc_html__('Smart Keap', 'wpski-smart-keap'), 

                        'manage_options', 

                        'wpski-smart-keap-integration', 

                        array($this, 'settings_callback'), 

                        'dashicons-migrate' 

                    );



        add_submenu_page( 

                        'wpski-smart-keap-integration', 

                        esc_html__( 'Smart Keap Settings', 'wpski-smart-keap' ), 

                        esc_html__( 'Smart Keap', 'wpski-smart-keap' ), 

                        'manage_options', 

                        'wpski-smart-keap-integration', 

                        array($this, 'settings_callback')

                    );



        add_submenu_page( 

                        'wpski-smart-keap-integration', 

                        esc_html__( 'Smart Keap Fields Mappings', 'wpski-smart-keap' ), 

                        esc_html__( 'Fields Mappings', 'wpski-smart-keap' ), 

                        'manage_options', 

                        'wpski-smart-keap-mappings', 

                        array($this, 'mappings_callback')

                    );



        add_submenu_page( 

                        'wpski-smart-keap-integration', 

                        esc_html__( 'Smart Keap Synchronization', 'wpski-smart-keap' ), 

                        esc_html__( 'Synchronization', 'wpski-smart-keap' ), 

                        'manage_options', 

                        'wpski-smart-keap-synchronization', 

                        array($this, 'Synchronization_callback')

                    );



        add_submenu_page( 

                        'wpski-smart-keap-integration', 

                        NULL, 

                        NULL, 

                        'manage_options', 

                        'wpski_smart_keap_process', 

                        array($this, 'keap_process_callback')

                    );

    }



    public function keap_process_callback(){

        

        global $wpdb;



        if ( isset( $_REQUEST['code'] ) ) {

            $code           = sanitize_text_field($_REQUEST['code']);

            $Keap_api_obj   = new WPSKI_Smart_Keap_API();

            $token          = $Keap_api_obj->getToken( $code, WPSKI_REDIRECT_URI );

            

            if ( isset( $token->error ) ) {

                /*Error logic*/

            } else {

                $Keap_api_obj->manageToken( $token );    

            }

        }



        $smart_Keap_obj = new WPSKI_Smart_Keap();

        $smart_Keap_obj->store_required_field_mapping_data();

        

        wp_redirect(WPSKI_SETTINGS_URI);

        exit();

    }



    public function settings_callback(){

        $admin_settings_obj = new WPSKI_Smart_Keap_Admin_Settings();

        $admin_settings_obj->processSettingsForm();

        $admin_settings_obj->displaySettingsForm();

    }



    public function mappings_callback(){

        $field_mapping_obj = new WPSKI_Smart_Keap_Field_Mappings();

        $field_mapping_obj->processMappingsForm();

        $field_mapping_obj->displayMappingsForm(); 

        $field_mapping_obj->displayMappingsFieldList();

    }



    public function Synchronization_callback(){

        $admin_synch_obj = new WPSKI_Smart_Keap_Admin_Synchronization();

        $admin_synch_obj->processSynch();

        $admin_synch_obj->displaySynchData();

    }

}



new WPSKI_Smart_Keap_Admin();

?>