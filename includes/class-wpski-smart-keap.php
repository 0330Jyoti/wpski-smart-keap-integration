<?php

class WPSKI_Smart_Keap {



	protected $plugin_name;



	protected $version;



	public function __construct() {

		$this->version = '1.0.0';

		$this->plugin_name = 'wpski-smart-Keap';

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

                'customers' => esc_html__('Customers','wpski-smart-Keap'),

                'orders'    => esc_html__('Orders','wpski-smart-Keap'),

                'products'  => esc_html__('Products','wpski-smart-Keap'),

            );

	}



	public function get_Keap_modules(){



		$Keap_api_obj   = new wpski_Smart_Keap_API();

       

        /*get list modules*/

        $getListModules = $Keap_api_obj->getListModules();

        

        return $getListModules;

	}



	public static function get_customer_fields(){

    	

    	global $wpdb;

		$wc_fields = array(

		    'first_name'            => esc_html__('First Name', 'wpski-smart-Keap'),

		    'last_name'             => esc_html__('Last Name', 'wpski-smart-Keap'),

		    'user_email'            => esc_html__('Email', 'wpski-smart-Keap'),

		    'billing_first_name'    => esc_html__('Billing First Name', 'wpski-smart-Keap'),

		    'billing_last_name'     => esc_html__('Billing Last Name', 'wpski-smart-Keap'),

		    'billing_company'       => esc_html__('Billing Company', 'wpski-smart-Keap'),

		    'billing_address_1'     => esc_html__('Billing Address 1', 'wpski-smart-Keap'),

		    'billing_address_2'     => esc_html__('Billing Address 2', 'wpski-smart-Keap'),

		    'billing_city'          => esc_html__('Billing City', 'wpski-smart-Keap'),

		    'billing_state'         => esc_html__('Billing State', 'wpski-smart-Keap'),

		    'billing_postcode'      => esc_html__('Billing Postcode', 'wpski-smart-Keap'),

		    'billing_country'       => esc_html__('Billing Country', 'wpski-smart-Keap'),

		    'billing_phone'         => esc_html__('Billing Phone', 'wpski-smart-Keap'),

		    'billing_email'         => esc_html__('Billing Email', 'wpski-smart-Keap'),

		    'shipping_first_name'   => esc_html__('Shipping First Name', 'wpski-smart-Keap'),

		    'shipping_last_name'    => esc_html__('Shipping Last Name', 'wpski-smart-Keap'),

		    'shipping_company'      => esc_html__('Shipping Company', 'wpski-smart-Keap'),

		    'shipping_address_1'    => esc_html__('Shipping Address 1', 'wpski-smart-Keap'),

		    'shipping_address_2'    => esc_html__('Shipping Address 2', 'wpski-smart-Keap'),

		    'shipping_city'         => esc_html__('Shipping City', 'wpski-smart-Keap'),

		    'shipping_postcode'     => esc_html__('Shipping Postcode', 'wpski-smart-Keap'),

		    'shipping_country'      => esc_html__('Shipping Country', 'wpski-smart-Keap'),

		    'shipping_state'        => esc_html__('Shipping State', 'wpski-smart-Keap'),

		    'user_url'              => esc_html__('Website', 'wpski-smart-Keap'),

		    'description'           => esc_html__('Biographical Info', 'wpski-smart-Keap'),

		    'display_name'          => esc_html__('Display name publicly as', 'wpski-smart-Keap'),

		    'nickname'              => esc_html__('Nickname', 'wpski-smart-Keap'),

		    'user_login'            => esc_html__('Username', 'wpski-smart-Keap'),

		    'user_registered'       => esc_html__('Registration Date', 'wpski-smart-Keap')

		);



		return $wc_fields;

    }





    public static  function get_order_fields(){

    	

    	global $wpdb;





        $wc_fields =  array(

                'get_id'                       => esc_html__('Order Number', 'wpski-smart-Keap'),

                'get_order_key'                => esc_html__('Order Key', 'wpski-smart-Keap'),

                'get_billing_first_name'       => esc_html__('Billing First Name', 'wpski-smart-Keap'),

                'get_billing_last_name'        => esc_html__('Billing Last Name', 'wpski-smart-Keap'),

                'get_billing_company'          => esc_html__('Billing Company', 'wpski-smart-Keap'),

                'get_billing_address_1'        => esc_html__('Billing Address 1', 'wpski-smart-Keap'),

                'get_billing_address_2'        => esc_html__('Billing Address 2', 'wpski-smart-Keap'),

                'get_billing_city'             => esc_html__('Billing City', 'wpski-smart-Keap'),

                'get_billing_state'            => esc_html__('Billing State', 'wpski-smart-Keap'),

                'get_billing_postcode'         => esc_html__('Billing Postcode', 'wpski-smart-Keap'),

                'get_billing_country'          => esc_html__('Billing Country', 'wpski-smart-Keap'), 

                'get_billing_phone'            => esc_html__('Billing Phone', 'wpski-smart-Keap'),

                'get_billing_email'            => esc_html__('Billing Email', 'wpski-smart-Keap'),

                'get_shipping_first_name'      => esc_html__('Shipping First Name', 'wpski-smart-Keap'),

                'get_shipping_last_name'       => esc_html__('Shipping Last Name', 'wpski-smart-Keap'),

                'get_shipping_company'         => esc_html__('Shipping Company', 'wpski-smart-Keap'),

                'get_shipping_address_1'       => esc_html__('Shipping Address 1', 'wpski-smart-Keap'),

                'get_shipping_address_2'       => esc_html__('Shipping Address 2', 'wpski-smart-Keap'),

                'get_shipping_city'            => esc_html__('Shipping City', 'wpski-smart-Keap'),

                'get_shipping_state'           => esc_html__('Shipping State', 'wpski-smart-Keap'),

                'get_shipping_postcode'        => esc_html__('Shipping Postcode', 'wpski-smart-Keap'),

                'get_shipping_country'         => esc_html__('Shipping Country',  'wpski-smart-Keap'),

                'get_formatted_order_total'     => esc_html__('Formatted Order Total', 'wpski-smart-Keap'),

                'get_cart_tax'                  => esc_html__('Cart Tax', 'wpski-smart-Keap'),

                'get_currency'                  => esc_html__('Currency', 'wpski-smart-Keap'),

                'get_discount_tax'              => esc_html__('Discount Tax', 'wpski-smart-Keap'),

                'get_discount_to_display'       => esc_html__('Discount to Display', 'wpski-smart-Keap'),

                'get_discount_total'            => esc_html__('Discount Total', 'wpski-smart-Keap'),

                'get_shipping_tax'              => esc_html__('Shipping Tax', 'wpski-smart-Keap'),

                'get_shipping_total'            => esc_html__('Shipping Total', 'wpski-smart-Keap'),

                'get_subtotal'                  => esc_html__('SubTotal', 'wpski-smart-Keap'),

                'get_subtotal_to_display'       => esc_html__('SubTotal to Display', 'wpski-smart-Keap'),

                'get_total'                     => esc_html__('Get Total', 'wpski-smart-Keap'),

                'get_total_discount'            => esc_html__('Get Total Discount', 'wpski-smart-Keap'),

                'get_total_tax'                 => esc_html__('Total Tax', 'wpski-smart-Keap'),

                'get_total_refunded'            => esc_html__('Total Refunded', 'wpski-smart-Keap'),

                'get_total_tax_refunded'        => esc_html__('Total Tax Refunded', 'wpski-smart-Keap'),

                'get_total_shipping_refunded'   => esc_html__('Total Shipping Refunded', 'wpski-smart-Keap'),

                'get_item_count_refunded'       => esc_html__('Item count refunded', 'wpski-smart-Keap'),

                'get_total_qty_refunded'        => esc_html__('Total Quantity Refunded', 'wpski-smart-Keap'),

                'get_remaining_refund_amount'   => esc_html__('Remaining Refund Amount', 'wpski-smart-Keap'),

                'get_item_count'                => esc_html__('Item count', 'wpski-smart-Keap'),

                'get_shipping_method'           => esc_html__('Shipping Method', 'wpski-smart-Keap'),

                'get_shipping_to_display'       => esc_html__('Shipping to Display', 'wpski-smart-Keap'),

                'get_date_created'              => esc_html__('Date Created', 'wpski-smart-Keap'),

                'get_date_modified'             => esc_html__('Date Modified', 'wpski-smart-Keap'),

                'get_date_completed'            => esc_html__('Date Completed', 'wpski-smart-Keap'),

                'get_date_paid'                 => esc_html__('Date Paid', 'wpski-smart-Keap'),

                'get_customer_id'               => esc_html__('Customer ID', 'wpski-smart-Keap'),

                'get_user_id'                   => esc_html__('User ID', 'wpski-smart-Keap'),

                'get_customer_ip_address'       => esc_html__('Customer IP Address', 'wpski-smart-Keap'),

                'get_customer_user_agent'       => esc_html__('Customer User Agent', 'wpski-smart-Keap'),

                'get_created_via'               => esc_html__('Order Created Via', 'wpski-smart-Keap'),

                'get_customer_note'             => esc_html__('Customer Note', 'wpski-smart-Keap'),

                'get_shipping_address_map_url'  => esc_html__('Shipping Address Map URL', 'wpski-smart-Keap'),

                'get_formatted_billing_full_name'   => esc_html__('Formatted Billing Full Name', 'wpski-smart-Keap'),

                'get_formatted_shipping_full_name'  => esc_html__('Formatted Shipping Full Name', 'wpski-smart-Keap'),

                'get_formatted_billing_address'     => esc_html__('Formatted Billing Address', 'wpski-smart-Keap'),

                'get_formatted_shipping_address'    => esc_html__('Formatted Shipping Address', 'wpski-smart-Keap'),

                'get_payment_method'            => esc_html__('Payment Method', 'wpski-smart-Keap'),

                'get_payment_method_title'      => esc_html__('Payment Method Title', 'wpski-smart-Keap'),

                'get_transaction_id'            => esc_html__('Transaction ID', 'wpski-smart-Keap'),

                'get_checkout_payment_url'      => esc_html__( 'Checkout Payment URL', 'wpski-smart-Keap'),

                'get_checkout_order_received_url'   => esc_html__('Checkout Order Received URL', 'wpski-smart-Keap'),

                'get_cancel_order_url'          => esc_html__('Cancel Order URL', 'wpski-smart-Keap'),

                'get_cancel_order_url_raw'      => esc_html__('Cancel Order URL Raw', 'wpski-smart-Keap'),

                'get_cancel_endpoint'           => esc_html__('Cancel Endpoint', 'wpski-smart-Keap'),

                'get_view_order_url'            => esc_html__('View Order URL', 'wpski-smart-Keap'),

                'get_edit_order_url'            => esc_html__('Edit Order URL', 'wpski-smart-Keap'),

                'get_status'                    => esc_html__('Status', 'wpski-smart-Keap'),

            );

        

        return $wc_fields;

    }





    public static function get_product_fields(){

    	global $wpdb;

		$wc_fields = array(

		    'get_id'              		=> esc_html__('Product Id', 'wpski-smart-Keap'),

            'get_type'       			=> esc_html__('Product Type', 'wpski-smart-Keap'),

            'get_name'       			=> esc_html__('Name', 'wpski-smart-Keap'),

            'get_slug'          		=> esc_html__('Slug', 'wpski-smart-Keap'),

            'get_date_created'      	=> esc_html__('Date Created', 'wpski-smart-Keap'),

            'get_date_modified'     	=> esc_html__('Date Modified', 'wpski-smart-Keap'),

            'get_status'            	=> esc_html__('Status', 'wpski-smart-Keap'),

            'get_featured'          	=> esc_html__('Featured', 'wpski-smart-Keap'),

            'get_catalog_visibility'	=> esc_html__('Catalog Visibility', 'wpski-smart-Keap'),

            'get_description'       	=> esc_html__('Description', 'wpski-smart-Keap'),

            'get_short_description' 	=> esc_html__('Short Description', 'wpski-smart-Keap'),

            'get_sku'            		=> esc_html__('Sku', 'wpski-smart-Keap'),

            'get_menu_order'      		=> esc_html__('Menu Order', 'wpski-smart-Keap'),

            'get_virtual'       		=> esc_html__('Virtual', 'wpski-smart-Keap'),

            'get_permalink'         	=> esc_html__('Product Permalink', 'wpski-smart-Keap'),

            'get_price'       			=> esc_html__('Price', 'wpski-smart-Keap'),

            'get_regular_price'       	=> esc_html__('Regular Price', 'wpski-smart-Keap'),

            'get_sale_price'            => esc_html__('Sale Price', 'wpski-smart-Keap'),

            'get_date_on_sale_from'     => esc_html__('Date on Sale From', 'wpski-smart-Keap'),

            'get_date_on_sale_to'       => esc_html__('Date on Sale To', 'wpski-smart-Keap'),

            'get_total_sales'         	=> esc_html__('Total Sales', 'wpski-smart-Keap'),

            'get_tax_status'     		=> esc_html__('Tax Status', 'wpski-smart-Keap'),

            'get_tax_class'           	=> esc_html__('Tax Class', 'wpski-smart-Keap'),

            'get_manage_stock'          => esc_html__('Manage Stock', 'wpski-smart-Keap'),

            'get_stock_quantity'        => esc_html__('Stock Quantity', 'wpski-smart-Keap'),

            'get_stock_status'          => esc_html__('Stock Status', 'wpski-smart-Keap'),

            'get_backorders'       		=> esc_html__('Backorders', 'wpski-smart-Keap'),

            'get_sold_individually'     => esc_html__('Sold Individually', 'wpski-smart-Keap'),

            'get_purchase_note'         => esc_html__('Purchase Note', 'wpski-smart-Keap'),

            'get_shipping_class_id'     => esc_html__('Shipping Class ID', 'wpski-smart-Keap'),

            'get_weight'               	=> esc_html__('Weight', 'wpski-smart-Keap'),

            'get_length'              	=> esc_html__('Length', 'wpski-smart-Keap'),

            'get_width'            		=> esc_html__('Width', 'wpski-smart-Keap'),

            'get_height'            	=> esc_html__('Height', 'wpski-smart-Keap'),

            'get_categories'            => esc_html__('Categories', 'wpski-smart-Keap'),

            'get_category_ids'          => esc_html__('Categories IDs', 'wpski-smart-Keap'),

            'get_tag_ids'            	=> esc_html__('Tag IDs', 'wpski-smart-Keap'),

		);

        

		return $wc_fields;

    }



    public function store_required_field_mapping_data(){



        global $wpdb;

        $Keap_api_obj   = new wpski_Smart_Keap_API();

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