<?php
define('WP_USE_THEMES', false);
require('./wordpress/wp-blog-header.php');
global $woocommerce;

$posted = array();
$posted['orderId'] 			= isset($_POST['orderId']) ? woocommerce_clean($_POST['orderId']) : '';
$posted['responseDigest'] 	= isset($_POST['responseDigest']) ? woocommerce_clean($_POST['responseDigest']) : '';
$posted['subscription_id']	= isset($_POST['subscription_id']) ? woocommerce_clean($_POST['subscription_id']) : '';

if ( is_numeric($posted['orderId']) ) {

	$order 		= new WC_Order( (int) $posted['orderId'] );
	$gateway 	= new WC_CCBill();
    //$posted['responseDigest'];
    //$posted['subscription_id'];    
	
	$md5salt = $gateway->md5salt; 	
    $md5test = md5($posted['subscription_id'].'1'.$md5salt);			

	if ($posted['responseDigest'] == $md5test){
		// approved transaction        
        $order->payment_complete();
	} else {
		// denied transaction
        $order->update_status('failed', 'Payment via CCBill failed.');
	}			

} 

// debug logging
/*
$fp = fopen("/home/domain.com/public_html/dump.txt", "w");
fwrite($fp, $data);
fclose($fp);
*/ 
?>