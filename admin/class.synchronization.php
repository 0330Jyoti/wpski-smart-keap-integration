<?php

class WPSKI_Smart_Keap_Admin_Synchronization {



    public function processSynch($POST = array()){

       

       	if ( isset( $_POST['submit'] ) ) {



            if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == "general"){

                $client_id                  = sanitize_text_field($_REQUEST['wpszi_smart_Keap_settings']['client_id']);

                $client_secret              = sanitize_text_field($_REQUEST['wpszi_smart_Keap_settings']['client_secret']);

                $wpszi_smart_Keap_data_center  = sanitize_text_field($_REQUEST['wpszi_smart_Keap_settings']['data_center']);

            }

                        

            $wpszi_smart_Keap_settings  = !empty(get_option( 'wpszi_smart_Keap_settings' )) ? get_option( 'wpszi_smart_Keap_settings' ) : array();



            $wpszi_smart_Keap_settings = array_merge($wpszi_smart_Keap_settings, $_REQUEST['wpszi_smart_Keap_settings']);

            

            update_option( 'wpszi_smart_Keap_settings', $wpszi_smart_Keap_settings );

            

        }





        /*Synch product*/

        if( isset( $_POST['smart_synch'] ) && $_POST['smart_synch'] == 'Keap' ){



           

            $id = $_POST['id'];



            switch ($_POST['wp_module']) {

                

                case 'products':

                    

                    $WPSZI_Smart_Keap_Public = new WPSZI_Smart_Keap_Public();

                    $WPSZI_Smart_Keap_Public->addProductToKeap( $id );



                    break;



                case 'orders':

                    

                    $WPSZI_Smart_Keap_Public = new WPSZI_Smart_Keap_Public();

                    $WPSZI_Smart_Keap_Public->addOrderToKeap( $id );



                    break;



                case 'customers':

                    

                    $WPSZI_Smart_Keap_Public = new WPSZI_Smart_Keap_Public();

                    $WPSZI_Smart_Keap_Public->addUserToKeap( $id );



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