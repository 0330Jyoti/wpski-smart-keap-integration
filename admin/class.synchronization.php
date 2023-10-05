<?php

class WPSKI_Smart_Keap_Admin_Synchronization {



    public function processSynch($POST = array()){

       

       	if ( isset( $_POST['submit'] ) ) {



            if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == "general"){

                $client_id                  = sanitize_text_field($_REQUEST['wpski_smart_Keap_settings']['client_id']);

                $client_secret              = sanitize_text_field($_REQUEST['wpski_smart_Keap_settings']['client_secret']);

                $wpski_smart_Keap_data_center  = sanitize_text_field($_REQUEST['wpski_smart_Keap_settings']['data_center']);

            }

                        

            $wpski_smart_Keap_settings  = !empty(get_option( 'wpski_smart_Keap_settings' )) ? get_option( 'wpski_smart_Keap_settings' ) : array();



            $wpski_smart_Keap_settings = array_merge($wpski_smart_Keap_settings, $_REQUEST['wpski_smart_Keap_settings']);

            

            update_option( 'wpski_smart_Keap_settings', $wpski_smart_Keap_settings );

            

        }





        /*Synch product*/

        if( isset( $_POST['smart_synch'] ) && $_POST['smart_synch'] == 'Keap' ){



           

            $id = $_POST['id'];



            switch ($_POST['wp_module']) {

                

                case 'products':

                    

                    $wpski_Smart_Keap_Public = new wpski_Smart_Keap_Public();

                    $wpski_Smart_Keap_Public->addProductToKeap( $id );



                    break;



                case 'orders':

                    

                    $wpski_Smart_Keap_Public = new wpski_Smart_Keap_Public();

                    $wpski_Smart_Keap_Public->addOrderToKeap( $id );



                    break;



                case 'customers':

                    

                    $wpski_Smart_Keap_Public = new wpski_Smart_Keap_Public();

                    $wpski_Smart_Keap_Public->addUserToKeap( $id );



                    break;    

                

                default:

                    # code...

                    break;

            }

            

        }

        



    }



    public function displaySynchData(){

        require_once WPSKI_PLUGIN_PATH . 'admin/partials/synchronization.php';

    }

}

?>