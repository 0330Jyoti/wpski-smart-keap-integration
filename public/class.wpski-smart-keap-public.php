<?php

class WPSKI_Smart_Keap_Public {

  

    public function __construct() {

        

        $this->loadCustomerAction();

        $this->loadOrderAction();

        $this->loadProductAction();

    }





    private function loadCustomerAction() {

        add_action( 'user_register', array($this, 'addUserToKeap') );

        add_action( 'profile_update', array($this, 'addUserToKeap'), 10, 1 );

        add_action( 'woocommerce_update_customer', array($this, 'addUserToKeap'), 10, 1 );

    }





    private function loadOrderAction() {

        add_action( 'save_post', array( $this, 'addOrderToKeap' ), 10, 1 );

        add_action('woocommerce_thankyou', array( $this, 'addOrderToKeap' ), 10, 1);

    }





    private function loadProductAction() {

        add_action( 'woocommerce_update_product', array( $this, 'addProductToKeap' ), 10, 1 );

    }



    public function addUserToKeap( $user_id ){

        global $wpdb;

        $data       = array();

        $user_info  = get_userdata($user_id);



        $default_wp_module = "customers";



        $wpski_smart_Keap_settings = get_option( 'wpski_smart_Keap_settings' );

        $synch_settings         = !empty( $wpski_smart_Keap_settings['synch'] ) ? $wpski_smart_Keap_settings['synch'] : array();



        foreach ($synch_settings as $wp_Keap_module => $enable) {

            

            $wp_Keap_module = explode('_', $wp_Keap_module);

            $wp_module      = $wp_Keap_module[0];

            $Keap_module    = $wp_Keap_module[1];



            if($default_wp_module == $wp_module){

                

                $get_Keap_field_mapping = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}smart_Keap_field_mapping WHERE wp_module ='".$wp_module."' AND Keap_module = '".$Keap_module."' AND status='active'");



                foreach ($get_Keap_field_mapping as $key => $value) {

                    $wp_field   = $value->wp_field;

                    $Keap_field = $value->Keap_field;



                    if ( $Keap_field ) {

                        if ( isset( $user_info->{$wp_field} ) ) {

                            if ( is_array( $user_info->{$wp_field} ) ) {

                                $user_info->{$wp_field} = implode(';', $user_info->{$wp_field} );

                            }

                            $data[$Keap_module][$Keap_field] = strip_tags( $user_info->{$wp_field} );

                        }

                    }

                }

            }   

        }



        if( $data != null ){

            $this->prepareAndActionOnData( $user_id, $data, $default_wp_module );

        }

    }





    public function addOrderToKeap( $order_id ){

        global $wpdb, $post_type; 

        $data       = array();



        if ( get_post_type( $order_id ) !== 'shop_order' ){

            return;

        }



        $order = wc_get_order( $order_id );

        

        $default_wp_module = "orders";



        $wpski_smart_Keap_settings = get_option( 'wpski_smart_Keap_settings' );

        $synch_settings         = !empty( $wpski_smart_Keap_settings['synch'] ) ? $wpski_smart_Keap_settings['synch'] : array();



        foreach ($synch_settings as $wp_Keap_module => $enable) {

            

            $wp_Keap_module = explode('_', $wp_Keap_module);

            $wp_module      = $wp_Keap_module[0];

            $Keap_module    = $wp_Keap_module[1];



            if($default_wp_module == $wp_module){

                

                $get_Keap_field_mapping = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}smart_Keap_field_mapping WHERE wp_module ='".$wp_module."' AND Keap_module = '".$Keap_module."' AND status='active'");



                foreach ($get_Keap_field_mapping as $key => $value) {

                    $wp_field   = $value->wp_field;

                    $Keap_field = $value->Keap_field;



                    if ( $Keap_field ) {



                        if ( null !== $order->{$wp_field}() ) {

                            $data[$Keap_module][$Keap_field] = strip_tags( $order->{$wp_field}() );

                        }

                    }

                }

            }   

        }

        

        if( $data != null ){

            $this->prepareAndActionOnData( $order_id, $data, $default_wp_module );

        }

    }





    public function addProductToKeap( $post_id ){

        global $wpdb, $post_type, $data; 

        $data = array();



        if ( get_post_type( $post_id ) !== 'product' ){

            return;

        }

        

        $product = wc_get_product( $post_id );



        $default_wp_module = "products";



        $wpski_smart_Keap_settings = get_option( 'wpski_smart_Keap_settings' );

        $synch_settings         = !empty( $wpski_smart_Keap_settings['synch'] ) ? $wpski_smart_Keap_settings['synch'] : array();



        foreach ($synch_settings as $wp_Keap_module => $enable) {

            

            $wp_Keap_module = explode('_', $wp_Keap_module);

            $wp_module      = $wp_Keap_module[0];

            $Keap_module    = $wp_Keap_module[1];



            if($default_wp_module == $wp_module){

                

                $get_Keap_field_mapping = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}smart_Keap_field_mapping WHERE wp_module ='".$wp_module."' AND Keap_module = '".$Keap_module."' AND status='active'");



                foreach ($get_Keap_field_mapping as $key => $value) {

                    $wp_field   = $value->wp_field;

                    $Keap_field = $value->Keap_field;



                    if ( $Keap_field ) {



                        if ( null !== $product->{$wp_field}() ) {

                            if(is_array($product->{$wp_field}())){

                                $data[$Keap_module][$Keap_field] = implode(',', $product->{$wp_field}());

                            }else{

                                $data[$Keap_module][$Keap_field] = strip_tags( $product->{$wp_field}() );    

                            }

                        }

                    }

                }

            }   

        }



        if($data != null ){

            $this->prepareAndActionOnData( $post_id, $data, $default_wp_module );

        }

    }





    public function prepareAndActionOnData($id, $data = array(), $default_wp_module = NULL){

        

        if( $default_wp_module == 'orders' ||  $default_wp_module == 'products' ){

            $smart_Keap_relation = get_post_meta( $id, 'smart_Keap_relation', true );

        }else{

            $smart_Keap_relation = get_user_meta( $id, 'smart_Keap_relation', true );    

        }

        



        if ( ! is_array( $smart_Keap_relation ) ) {

            $smart_Keap_relation = array();

        }



        $Keap_api_obj   = new wpski_Smart_Keap_API();

        

        foreach ($data as $Keap_module => $Keap_data) {

            

            $record_id = ( isset( $smart_Keap_relation[$Keap_module] ) ? $smart_Keap_relation[$Keap_module] : 0 );



            if ( $record_id ) {

                $response = $Keap_api_obj->updateRecord($Keap_module, $Keap_data, $record_id);

            }else{

                $response = $Keap_api_obj->addRecord($Keap_module, $Keap_data);

            }

                        

            if ( isset( $response->data[0]->details->id ) ) {

                $record_id = $response->data[0]->details->id;

                $smart_Keap_relation[$Keap_module] = $record_id;

            }

        }



        if( $default_wp_module == 'orders' ||  $default_wp_module == 'products' ){

            update_post_meta( $id, 'smart_Keap_relation', $smart_Keap_relation );

        }else{

            update_user_meta( $id, 'smart_Keap_relation', $smart_Keap_relation );    

        }

        

    }

}



new WPSKI_Smart_Keap_Public();

?>