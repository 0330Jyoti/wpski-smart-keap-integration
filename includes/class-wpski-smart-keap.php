<?php

class WPSKI_Smart_Keap {



	protected $plugin_name;



	protected $version;



	public function __construct() {

		$this->version = '1.0.0';

		$this->plugin_name = 'wpszi-smart-Keap';

	}



	public function run() {

		/*

			Load all class files

		*/

		require_once WPSKI_PLUGIN_PATH . 'includes/class-wpski-smart-keap-api.php';

        require_once WPSKI_PLUGIN_PATH . 'admin/class.wpski-smart-keap-admin.php';

		require_once WPSKI_PLUGIN_PATH . 'public/class.wpski-smart-keap-public.php';

	}



	public function get_plugin_name() {

		return $this->plugin_name;

	}

	

	public function get_version() {

		return $this->version;

	}



	public function get_wp_modules(){

		return array(

                'customers' => esc_html__('Customers','wpszi-smart-Keap'),

                'orders'    => esc_html__('Orders','wpszi-smart-Keap'),

                'products'  => esc_html__('Products','wpszi-smart-Keap'),

            );

	}



	public function get_Keap_modules(){



		$Keap_api_obj   = new WPSZI_Smart_Keap_API();

       

        /*get list modules*/

        $getListModules = $Keap_api_obj->getListModules();

        

        return $getListModules;

	}



	public static function get_customer_fields(){

    	

    	global $wpdb;

		$wc_fields = array(

		    'first_name'            => esc_html__('First Name', 'wpszi-smart-Keap'),

		    'last_name'             => esc_html__('Last Name', 'wpszi-smart-Keap'),

		    'user_email'            => esc_html__('Email', 'wpszi-smart-Keap'),

		    'billing_first_name'    => esc_html__('Billing First Name', 'wpszi-smart-Keap'),

		    'billing_last_name'     => esc_html__('Billing Last Name', 'wpszi-smart-Keap'),

		    'billing_company'       => esc_html__('Billing Company', 'wpszi-smart-Keap'),

		    'billing_address_1'     => esc_html__('Billing Address 1', 'wpszi-smart-Keap'),

		    'billing_address_2'     => esc_html__('Billing Address 2', 'wpszi-smart-Keap'),

		    'billing_city'          => esc_html__('Billing City', 'wpszi-smart-Keap'),

		    'billing_state'         => esc_html__('Billing State', 'wpszi-smart-Keap'),

		    'billing_postcode'      => esc_html__('Billing Postcode', 'wpszi-smart-Keap'),

		    'billing_country'       => esc_html__('Billing Country', 'wpszi-smart-Keap'),

		    'billing_phone'         => esc_html__('Billing Phone', 'wpszi-smart-Keap'),

		    'billing_email'         => esc_html__('Billing Email', 'wpszi-smart-Keap'),

		    'shipping_first_name'   => esc_html__('Shipping First Name', 'wpszi-smart-Keap'),

		    'shipping_last_name'    => esc_html__('Shipping Last Name', 'wpszi-smart-Keap'),

		    'shipping_company'      => esc_html__('Shipping Company', 'wpszi-smart-Keap'),

		    'shipping_address_1'    => esc_html__('Shipping Address 1', 'wpszi-smart-Keap'),

		    'shipping_address_2'    => esc_html__('Shipping Address 2', 'wpszi-smart-Keap'),

		    'shipping_city'         => esc_html__('Shipping City', 'wpszi-smart-Keap'),

		    'shipping_postcode'     => esc_html__('Shipping Postcode', 'wpszi-smart-Keap'),

		    'shipping_country'      => esc_html__('Shipping Country', 'wpszi-smart-Keap'),

		    'shipping_state'        => esc_html__('Shipping State', 'wpszi-smart-Keap'),

		    'user_url'              => esc_html__('Website', 'wpszi-smart-Keap'),

		    'description'           => esc_html__('Biographical Info', 'wpszi-smart-Keap'),

		    'display_name'          => esc_html__('Display name publicly as', 'wpszi-smart-Keap'),

		    'nickname'              => esc_html__('Nickname', 'wpszi-smart-Keap'),

		    'user_login'            => esc_html__('Username', 'wpszi-smart-Keap'),

		    'user_registered'       => esc_html__('Registration Date', 'wpszi-smart-Keap')

		);



		return $wc_fields;

    }





    public static  function get_order_fields(){

    	

    	global $wpdb;





        $wc_fields =  array(

                'get_id'                       => esc_html__('Order Number', 'wpszi-smart-Keap'),

                'get_order_key'                => esc_html__('Order Key', 'wpszi-smart-Keap'),

                'get_billing_first_name'       => esc_html__('Billing First Name', 'wpszi-smart-Keap'),

                'get_billing_last_name'        => esc_html__('Billing Last Name', 'wpszi-smart-Keap'),

                'get_billing_company'          => esc_html__('Billing Company', 'wpszi-smart-Keap'),

                'get_billing_address_1'        => esc_html__('Billing Address 1', 'wpszi-smart-Keap'),

                'get_billing_address_2'        => esc_html__('Billing Address 2', 'wpszi-smart-Keap'),

                'get_billing_city'             => esc_html__('Billing City', 'wpszi-smart-Keap'),

                'get_billing_state'            => esc_html__('Billing State', 'wpszi-smart-Keap'),

                'get_billing_postcode'         => esc_html__('Billing Postcode', 'wpszi-smart-Keap'),

                'get_billing_country'          => esc_html__('Billing Country', 'wpszi-smart-Keap'), 

                'get_billing_phone'            => esc_html__('Billing Phone', 'wpszi-smart-Keap'),

                'get_billing_email'            => esc_html__('Billing Email', 'wpszi-smart-Keap'),

                'get_shipping_first_name'      => esc_html__('Shipping First Name', 'wpszi-smart-Keap'),

                'get_shipping_last_name'       => esc_html__('Shipping Last Name', 'wpszi-smart-Keap'),

                'get_shipping_company'         => esc_html__('Shipping Company', 'wpszi-smart-Keap'),

                'get_shipping_address_1'       => esc_html__('Shipping Address 1', 'wpszi-smart-Keap'),

                'get_shipping_address_2'       => esc_html__('Shipping Address 2', 'wpszi-smart-Keap'),

                'get_shipping_city'            => esc_html__('Shipping City', 'wpszi-smart-Keap'),

                'get_shipping_state'           => esc_html__('Shipping State', 'wpszi-smart-Keap'),

                'get_shipping_postcode'        => esc_html__('Shipping Postcode', 'wpszi-smart-Keap'),

                'get_shipping_country'         => esc_html__('Shipping Country',  'wpszi-smart-Keap'),

                'get_formatted_order_total'     => esc_html__('Formatted Order Total', 'wpszi-smart-Keap'),

                'get_cart_tax'                  => esc_html__('Cart Tax', 'wpszi-smart-Keap'),

                'get_currency'                  => esc_html__('Currency', 'wpszi-smart-Keap'),

                'get_discount_tax'              => esc_html__('Discount Tax', 'wpszi-smart-Keap'),

                'get_discount_to_display'       => esc_html__('Discount to Display', 'wpszi-smart-Keap'),

                'get_discount_total'            => esc_html__('Discount Total', 'wpszi-smart-Keap'),

                'get_shipping_tax'              => esc_html__('Shipping Tax', 'wpszi-smart-Keap'),

                'get_shipping_total'            => esc_html__('Shipping Total', 'wpszi-smart-Keap'),

                'get_subtotal'                  => esc_html__('SubTotal', 'wpszi-smart-Keap'),

                'get_subtotal_to_display'       => esc_html__('SubTotal to Display', 'wpszi-smart-Keap'),

                'get_total'                     => esc_html__('Get Total', 'wpszi-smart-Keap'),

                'get_total_discount'            => esc_html__('Get Total Discount', 'wpszi-smart-Keap'),

                'get_total_tax'                 => esc_html__('Total Tax', 'wpszi-smart-Keap'),

                'get_total_refunded'            => esc_html__('Total Refunded', 'wpszi-smart-Keap'),

                'get_total_tax_refunded'        => esc_html__('Total Tax Refunded', 'wpszi-smart-Keap'),

                'get_total_shipping_refunded'   => esc_html__('Total Shipping Refunded', 'wpszi-smart-Keap'),

                'get_item_count_refunded'       => esc_html__('Item count refunded', 'wpszi-smart-Keap'),

                'get_total_qty_refunded'        => esc_html__('Total Quantity Refunded', 'wpszi-smart-Keap'),

                'get_remaining_refund_amount'   => esc_html__('Remaining Refund Amount', 'wpszi-smart-Keap'),

                'get_item_count'                => esc_html__('Item count', 'wpszi-smart-Keap'),

                'get_shipping_method'           => esc_html__('Shipping Method', 'wpszi-smart-Keap'),

                'get_shipping_to_display'       => esc_html__('Shipping to Display', 'wpszi-smart-Keap'),

                'get_date_created'              => esc_html__('Date Created', 'wpszi-smart-Keap'),

                'get_date_modified'             => esc_html__('Date Modified', 'wpszi-smart-Keap'),

                'get_date_completed'            => esc_html__('Date Completed', 'wpszi-smart-Keap'),

                'get_date_paid'                 => esc_html__('Date Paid', 'wpszi-smart-Keap'),

                'get_customer_id'               => esc_html__('Customer ID', 'wpszi-smart-Keap'),

                'get_user_id'                   => esc_html__('User ID', 'wpszi-smart-Keap'),

                'get_customer_ip_address'       => esc_html__('Customer IP Address', 'wpszi-smart-Keap'),

                'get_customer_user_agent'       => esc_html__('Customer User Agent', 'wpszi-smart-Keap'),

                'get_created_via'               => esc_html__('Order Created Via', 'wpszi-smart-Keap'),

                'get_customer_note'             => esc_html__('Customer Note', 'wpszi-smart-Keap'),

                'get_shipping_address_map_url'  => esc_html__('Shipping Address Map URL', 'wpszi-smart-Keap'),

                'get_formatted_billing_full_name'   => esc_html__('Formatted Billing Full Name', 'wpszi-smart-Keap'),

                'get_formatted_shipping_full_name'  => esc_html__('Formatted Shipping Full Name', 'wpszi-smart-Keap'),

                'get_formatted_billing_address'     => esc_html__('Formatted Billing Address', 'wpszi-smart-Keap'),

                'get_formatted_shipping_address'    => esc_html__('Formatted Shipping Address', 'wpszi-smart-Keap'),

                'get_payment_method'            => esc_html__('Payment Method', 'wpszi-smart-Keap'),

                'get_payment_method_title'      => esc_html__('Payment Method Title', 'wpszi-smart-Keap'),

                'get_transaction_id'            => esc_html__('Transaction ID', 'wpszi-smart-Keap'),

                'get_checkout_payment_url'      => esc_html__( 'Checkout Payment URL', 'wpszi-smart-Keap'),

                'get_checkout_order_received_url'   => esc_html__('Checkout Order Received URL', 'wpszi-smart-Keap'),

                'get_cancel_order_url'          => esc_html__('Cancel Order URL', 'wpszi-smart-Keap'),

                'get_cancel_order_url_raw'      => esc_html__('Cancel Order URL Raw', 'wpszi-smart-Keap'),

                'get_cancel_endpoint'           => esc_html__('Cancel Endpoint', 'wpszi-smart-Keap'),

                'get_view_order_url'            => esc_html__('View Order URL', 'wpszi-smart-Keap'),

                'get_edit_order_url'            => esc_html__('Edit Order URL', 'wpszi-smart-Keap'),

                'get_status'                    => esc_html__('Status', 'wpszi-smart-Keap'),

            );

        

        return $wc_fields;

    }





    public static function get_product_fields(){

    	global $wpdb;

		$wc_fields = array(

		    'get_id'              		=> esc_html__('Product Id', 'wpszi-smart-Keap'),

            'get_type'       			=> esc_html__('Product Type', 'wpszi-smart-Keap'),

            'get_name'       			=> esc_html__('Name', 'wpszi-smart-Keap'),

            'get_slug'          		=> esc_html__('Slug', 'wpszi-smart-Keap'),

            'get_date_created'      	=> esc_html__('Date Created', 'wpszi-smart-Keap'),

            'get_date_modified'     	=> esc_html__('Date Modified', 'wpszi-smart-Keap'),

            'get_status'            	=> esc_html__('Status', 'wpszi-smart-Keap'),

            'get_featured'          	=> esc_html__('Featured', 'wpszi-smart-Keap'),

            'get_catalog_visibility'	=> esc_html__('Catalog Visibility', 'wpszi-smart-Keap'),

            'get_description'       	=> esc_html__('Description', 'wpszi-smart-Keap'),

            'get_short_description' 	=> esc_html__('Short Description', 'wpszi-smart-Keap'),

            'get_sku'            		=> esc_html__('Sku', 'wpszi-smart-Keap'),

            'get_menu_order'      		=> esc_html__('Menu Order', 'wpszi-smart-Keap'),

            'get_virtual'       		=> esc_html__('Virtual', 'wpszi-smart-Keap'),

            'get_permalink'         	=> esc_html__('Product Permalink', 'wpszi-smart-Keap'),

            'get_price'       			=> esc_html__('Price', 'wpszi-smart-Keap'),

            'get_regular_price'       	=> esc_html__('Regular Price', 'wpszi-smart-Keap'),

            'get_sale_price'            => esc_html__('Sale Price', 'wpszi-smart-Keap'),

            'get_date_on_sale_from'     => esc_html__('Date on Sale From', 'wpszi-smart-Keap'),

            'get_date_on_sale_to'       => esc_html__('Date on Sale To', 'wpszi-smart-Keap'),

            'get_total_sales'         	=> esc_html__('Total Sales', 'wpszi-smart-Keap'),

            'get_tax_status'     		=> esc_html__('Tax Status', 'wpszi-smart-Keap'),

            'get_tax_class'           	=> esc_html__('Tax Class', 'wpszi-smart-Keap'),

            'get_manage_stock'          => esc_html__('Manage Stock', 'wpszi-smart-Keap'),

            'get_stock_quantity'        => esc_html__('Stock Quantity', 'wpszi-smart-Keap'),

            'get_stock_status'          => esc_html__('Stock Status', 'wpszi-smart-Keap'),

            'get_backorders'       		=> esc_html__('Backorders', 'wpszi-smart-Keap'),

            'get_sold_individually'     => esc_html__('Sold Individually', 'wpszi-smart-Keap'),

            'get_purchase_note'         => esc_html__('Purchase Note', 'wpszi-smart-Keap'),

            'get_shipping_class_id'     => esc_html__('Shipping Class ID', 'wpszi-smart-Keap'),

            'get_weight'               	=> esc_html__('Weight', 'wpszi-smart-Keap'),

            'get_length'              	=> esc_html__('Length', 'wpszi-smart-Keap'),

            'get_width'            		=> esc_html__('Width', 'wpszi-smart-Keap'),

            'get_height'            	=> esc_html__('Height', 'wpszi-smart-Keap'),

            'get_categories'            => esc_html__('Categories', 'wpszi-smart-Keap'),

            'get_category_ids'          => esc_html__('Categories IDs', 'wpszi-smart-Keap'),

            'get_tag_ids'            	=> esc_html__('Tag IDs', 'wpszi-smart-Keap'),

		);

        

		return $wc_fields;

    }



    public function store_required_field_mapping_data(){



        global $wpdb;

        $Keap_api_obj   = new WPSZI_Smart_Keap_API();

        $wp_modules     = $this->get_wp_modules();

        $getListModules = $this->get_Keap_modules();



        if($getListModules['modules']){

            foreach ($getListModules['modules'] as $key => $singleModule) {

                if( $singleModule['deletable'] &&  $singleModule['creatable'] ){

        

                    $Keap_fields = $Keap_api_obj->getFieldsMetaData( $singleModule['api_name'] );

        

                    if($Keap_fields){

                        foreach ($Keap_fields['fields'] as $Keap_field_key => $Keap_field_data) {

                            if($Keap_field_data['field_read_only'] == NULL){

                                if( $Keap_field_data['system_mandatory'] == 1 ){

                                    if($wp_modules){

                                        foreach ($wp_modules as $wpModuleSlug => $wpModuleLabel) {

        

                                            switch ( $wpModuleSlug ) {

                                                case 'customers':

                                                    $wp_field = "first_name";

                                                    break;

                                                

                                                case 'orders':

                                                    $wp_field = "get_id";

                                                    break;



                                                case 'products':

                                                    $wp_field = "get_name";

                                                    break;



                                                default:

                                                    $wp_field = "";

                                                    break;

                                            }



                                            $status         = 'active';

                                            $description    = '';



                                            $record_exists = $wpdb->get_row( 

                                                $wpdb->prepare(

                                                    "

                                                    SELECT * FROM ".$wpdb->prefix ."smart_Keap_field_mapping  WHERE wp_module = %s AND wp_field = %s  AND Keap_module = %s AND Keap_field = %s

                                                    " ,

                                                    $wpModuleSlug, $wp_field, $singleModule['api_name'], $Keap_field_data['api_name']

                                                    )

                                                

                                            );



                                            if ( null !== $record_exists ) {

                                                

                                              $reccord_id       = $record_exists->id;

                                              $is_predefined    = $record_exists->is_predefined;

                                              



                                                $wpdb->update(

                                                    $wpdb->prefix . 'smart_Keap_field_mapping', 

                                                    array( 

                                                        'wp_module'     => sanitize_text_field($wpModuleSlug),

                                                        'wp_field'      => sanitize_text_field($wp_field),

                                                        'Keap_module'   => sanitize_text_field($singleModule['api_name']),

                                                        'Keap_field'    => sanitize_text_field($Keap_field_data['api_name']), 

                                                        'status'        => sanitize_text_field($status),

                                                        'description'   => sanitize_text_field($description), 

                                                        'is_predefined' => sanitize_text_field($is_predefined), 

                                                    ), 

                                                    array( 'id' => $reccord_id ), 

                                                    array( 

                                                        '%s', 

                                                        '%s', 

                                                        '%s', 

                                                        '%s', 

                                                        '%s', 

                                                        '%s', 

                                                        '%s'

                                                    ),

                                                    array( '%d' )

                                                );



                                            }else{

                                                $wpdb->insert( 

                                                    $wpdb->prefix . 'smart_Keap_field_mapping', 

                                                    array( 

                                                        'wp_module'     => sanitize_text_field($wpModuleSlug),

                                                        'wp_field'      => sanitize_text_field($wp_field),

                                                        'Keap_module'   => sanitize_text_field($singleModule['api_name']),

                                                        'Keap_field'    => sanitize_text_field($Keap_field_data['api_name']), 

                                                        'status'        => sanitize_text_field($status),

                                                        'description'   => sanitize_text_field($description), 

                                                        'is_predefined' => 'yes', 

                                                    ),

                                                    array( 

                                                        '%s', 

                                                        '%s', 

                                                        '%s', 

                                                        '%s', 

                                                        '%s', 

                                                        '%s', 

                                                        '%s'

                                                    ) 

                                                );

                                            }

                                            

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

    }

}

?>