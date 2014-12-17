<?php
/*
Plugin Name: WooCommerce CCBill gateway
Plugin URI: http://www.prospekt-solutions.com/
Description: WooCommerce CCBill gateway, single payments only no recurring billing
Version: 1.0.2
Author: Prospekt
Author URI: http://www.prospekt-solutions.com/
Requires at least: 3.1
Tested up to: 3.8
*/

/**
 * CCBill
 * 
 * Provides a CCBill Payment Gateway.
 *
 * @class 		WC_CCBILL
 * @package		WooCommerce
 * @category	Payment Gateways
 * @author		Prospekt
 */
add_action('plugins_loaded', 'init_ccbill_gateway');
 

 
function init_ccbill_gateway() { 
		
class WC_CCBill extends WC_Payment_Gateway {

    /* 
     * Constructor
     * 
     * @since 1.0.0
     */
    public function __construct() {
         
		$this->id				= 'ccbill';
		$this->icon 			= apply_filters('woocommerce_bacs_icon', '');
		$this->has_fields 		= false;
		$this->method_title     = __( 'ccbill', 'woocommerce' );
		$this->debug			= 'no';
		$this->init_form_fields();
           
        // Define user set variables
		$this->enabled          = $this->get_option('enabled');
		$this->title 			= $this->get_option('title');
		$this->description      = $this->get_option('description');		
		$this->clientAccnum     = $this->get_option('clientAccnum');
		$this->clientSubacc  	= $this->get_option('clientSubacc');
		$this->formName  		= $this->get_option('formName');		
		$this->formPeriod  		= $this->get_option('formPeriod');
		$this->currencyCode  	= $this->get_option('currencyCode');
		$this->md5salt  		= $this->get_option('md5salt');		
		$this->liveurl			= $this->get_option('liveurl');		
		$this->testmode			= $this->get_option('testmode'); // yes|no
		  
		
		$this->init_settings();   		  
		// Actions
		add_action('woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );		
    	add_action('woocommerce_thankyou_ccbill', array(&$this, 'thankyou_page'));				
		add_action('woocommerce_thankyou', array(&$this, 'thankyou_page'));
		add_action('woocommerce_receipt_ccbill', array(&$this, 'receipt_page'));	

    } 

	/* 
     * Initialise Gateway Settings Form Fields
     * 
     * @since 1.0.0
     */
    function init_form_fields() {
    
    	$this->form_fields = array(
					 
			'title' => array(
							'title' => __( 'Payment Gateway Title', 'woocommerce' ), 
							'type' => 'text', 
							'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ), 
							'default' => __( 'Credit Card payment via CCBill', 'woocommerce' )
						),
            'enabled' => array(
                    'title' => __( 'Enable / Disable CCBill', 'woocommerce' ),
                    'type' => 'checkbox',
                    'label' => __( 'Enable CCBill Payments', 'woocommerce' ),
                    'default' => 'yes'
                ),		
            'testmode' => array(
                    'title' => __( 'Enable / Disable Test Mode', 'woocommerce' ),
                    'type' => 'checkbox',
                    'label' => __( 'Enable CCBill test mode', 'woocommerce' ),
                    'default' => 'yes'
                ),                  			
			'description' => array(
							'title' => __( 'Customer Message', 'woocommerce' ), 
							'type' => 'textarea', 
							'description' => __( 'Give the customer instructions for paying via CCBill.', 'woocommerce' ), 
							'default' => __('Use your credit card to make payment', 'woocommerce')
						),
            'liveurl' => array(
                            'title' => __( 'CCBill request url', 'woocommerce' ), 
                            'type' => 'text', 
                            'description' => __( 'URL to which requests are made', 'woocommerce' ), 
                            'default' => __( 'https://bill.ccbill.com/jpost/signup.cgi', 'woocommerce' )
                        ),						
			'clientAccnum' => array(
							'title' => __( 'Client Account Number', 'woocommerce' ), 
							'type' => 'text', 
							'description' => 'An integer value representing the 6-digit client account number (provided by CCBill staff)', 
							'default' => '000000'
						),
			'clientSubacc' => array(
							'title' => __( 'Client Sub Account Number', 'woocommerce' ), 
							'type' => 'text', 
							'description' => 'An integer value representing the 4-digit client subaccount number (provided by CCBill staff)', 
							'default' => '0000'
						),
			'formName' => array(
							'title' => __( 'Form Name', 'woocommerce' ), 
							'type' => 'text', 
							'description' => 'The name of the CCBill form (provided by CCBill staff)', 
							'default' => ''
						),	
			'formPeriod' => array(
							'title' => __( 'Form Period', 'woocommerce' ), 
							'type' => 'text', 
							'description' => 'An integer representing the length, in days, of the initial billing period, not applicable for single payments but required anyway (provided by CCBill staff)', 
							'default' => '3'
						),											
			'currencyCode' => array(
							'title' => __( 'Currency Code', 'woocommerce' ), 
							'type' => 'text', 
							'description' => 'An integer representing the 3-digit currency code that will be used for the transaction (provided by CCBill staff)', 
							'default' => '840'
						),
			'md5salt' => array(
							'title' => __( 'MD5 Salt', 'woocommerce' ), 
							'type' => 'text', 
							'description' => 'Contact client support and receive the salt value (provided by CCBill staff)', 
							'default' => ''
						)
			);    
    }	
	/*
	 * Admin Panel Options	 
	 *
	 * @since 1.0.0
	 */
	public function admin_options() {
    	?>
    	<script>
    	jQuery(document).ready(function(){	
    		jQuery("input[name=woocommerce_ccbill_title]").css("width", "450");
    		jQuery("input[name=woocommerce_ccbill_md5salt]").css("width", "450");
    	});
    	</script>
    	
    	<h3><?php _e('CCBill Payment', 'woocommerce'); ?></h3>
    	
    	<p><?php _e('Allows payments by CCBill.', 'woocommerce'); ?></p>
    	
    	<table class="form-table">
    	   <?php $this->generate_settings_html(); ?>
		</table>
    	<?php
    }
    /*
     * Process payment for order   
     *
     * @since 1.0.0
     */
	function process_payment( $order_id ) {
		
		$order = new WC_Order( $order_id );		
		if ( $this->testmode == 'yes' ):
			$ccbill_adr = $this->liveurl . '?byPassDeactive=1&';		
		else :
			$ccbill_adr = $this->liveurl . '?';		
		endif;		
		
		if ( 0 == (int)$order->order_total ){
				
			$formDigest2 	= md5(md5($order_id.$this->md5salt));
			return array(
				'result' 	=> 'success',
				'redirect'	=> 'http://'.get_site_url().'/callback.php?val='.$formDigest2.'&order_id='.$order_id				
			);			
		
		} else {
		
			$formDigest 	= md5($order->order_total.$this->formPeriod.$this->currencyCode.$this->md5salt);
			$ccbill_args 	= 	array(
					'clientAccnum' 			=> $this->clientAccnum,
					'clientSubacc' 			=> $this->clientSubacc,
					'formName' 				=> $this->formName,
					'formPrice' 			=> $order->order_total,
					'formPeriod' 			=> $this->formPeriod,
					'currencyCode' 			=> $this->currencyCode,
					'orderId'				=> $order_id,
					'formRebills' 			=> 0,
					'formDigest' 			=> $formDigest				
			);			
			return array(
				'result' 	=> 'success',
				'redirect'	=> $ccbill_adr . http_build_query( $ccbill_args )
			);		
		}
	}
	
	

}

/*
 * Add the gateway to WooCommerce admin panel
 * 
 * @since 1.0.0
 */
function add_ccbill_gateway( $methods ) {
	$methods[] = 'WC_CCBill'; return $methods;
}

add_filter('woocommerce_payment_gateways', 'add_ccbill_gateway' );
}

