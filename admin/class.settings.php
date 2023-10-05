<?php



class WPSKI_Smart_Keap_Admin_Settings {







    public function processSettingsForm($POST = array()){



       



        $client_id = $client_secret = "";



        



       	if ( isset( $_POST['submit'] ) ) {







            if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == "general"){



                $client_id                  = sanitize_text_field($_REQUEST['wpszi_smart_Keap_settings']['client_id']);



                $client_secret              = sanitize_text_field($_REQUEST['wpszi_smart_Keap_settings']['client_secret']);



                $wpszi_smart_Keap_data_center  = sanitize_text_field($_REQUEST['wpszi_smart_Keap_settings']['data_center']);    



            }



                        



            $wpszi_smart_Keap_settings  = !empty(get_option( 'wpszi_smart_Keap_settings' )) ? get_option( 'wpszi_smart_Keap_settings' ) : array();







            $wpszi_smart_Keap_settings = array_merge($wpszi_smart_Keap_settings, $_REQUEST['wpszi_smart_Keap_settings']);



            



            update_option( 'wpszi_smart_Keap_settings', $wpszi_smart_Keap_settings );



            



            if ( $client_id && $client_secret ) {



                $redirect_uri = esc_url(WPSKI_REDIRECT_URI);



             $redirect_url = "$wpszi_smart_Keap_data_center/oauth/v2/auth?client_id=$client_id&redirect_uri=$redirect_uri&response_type=code&scope=KeapCRM.modules.all,KeapCRM.settings.all&access_type=offline";

            

             ?>



<script>window.location='<?php echo $redirect_url; ?>'</script>

             <?php



             if ( wp_redirect( $redirect_url ) ) {



              



                exit;







             }



        }



            



            



        }



    }







    public function displaySettingsForm(){



        require_once WPSKI_PLUGIN_PATH . 'admin/partials/settings.php';



    }



}



?>