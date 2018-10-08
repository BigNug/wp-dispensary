<?php
/**
 * Adding the functions that are used throughout
 * various areas of the plugin
 *
 * @link       https://www.wpdispensary.com
 * @since      2.0.0
 *
 * @package    WP_Dispensary
 * @subpackage WP_Dispensary/admin
 */

/**
 * Currency Code
 * 
 * @since 2.0
 */
function wpd_currency_code() {

	$wpd_settings = get_option( 'wpdas_general' );

	if ( ! isset ( $wpd_settings['wpd_pricing_currency_code'] ) ) {
		$wpd_currency = 'USD';
	} else {
		$wpd_currency = $wpd_settings['wpd_pricing_currency_code'];
	}

	$currency_symbols = array(
		'AED' => '&#1583;.&#1573;', // ?
		'AFN' => '&#65;&#102;',
		'ALL' => '&#76;&#101;&#107;',
		'AMD' => '',
		'ANG' => '&#402;',
		'AOA' => '&#75;&#122;', // ?
		'ARS' => '&#36;',
		'AUD' => '&#36;',
		'AWG' => '&#402;',
		'AZN' => '&#1084;&#1072;&#1085;',
		'BAM' => '&#75;&#77;',
		'BBD' => '&#36;',
		'BDT' => '&#2547;', // ?
		'BGN' => '&#1083;&#1074;',
		'BHD' => '.&#1583;.&#1576;', // ?
		'BIF' => '&#70;&#66;&#117;', // ?
		'BMD' => '&#36;',
		'BND' => '&#36;',
		'BOB' => '&#36;&#98;',
		'BRL' => '&#82;&#36;',
		'BSD' => '&#36;',
		'BTN' => '&#78;&#117;&#46;', // ?
		'BWP' => '&#80;',
		'BYR' => '&#112;&#46;',
		'BZD' => '&#66;&#90;&#36;',
		'CAD' => '&#36;',
		'CDF' => '&#70;&#67;',
		'CHF' => '&#67;&#72;&#70;',
		'CLF' => '', // ?
		'CLP' => '&#36;',
		'CNY' => '&#165;',
		'COP' => '&#36;',
		'CRC' => '&#8353;',
		'CUP' => '&#8396;',
		'CVE' => '&#36;', // ?
		'CZK' => '&#75;&#269;',
		'DJF' => '&#70;&#100;&#106;', // ?
		'DKK' => '&#107;&#114;',
		'DOP' => '&#82;&#68;&#36;',
		'DZD' => '&#1583;&#1580;', // ?
		'EGP' => '&#163;',
		'ETB' => '&#66;&#114;',
		'EUR' => '&#8364;',
		'FJD' => '&#36;',
		'FKP' => '&#163;',
		'GBP' => '&#163;',
		'GEL' => '&#4314;', // ?
		'GHS' => '&#162;',
		'GIP' => '&#163;',
		'GMD' => '&#68;', // ?
		'GNF' => '&#70;&#71;', // ?
		'GTQ' => '&#81;',
		'GYD' => '&#36;',
		'HKD' => '&#36;',
		'HNL' => '&#76;',
		'HRK' => '&#107;&#110;',
		'HTG' => '&#71;', // ?
		'HUF' => '&#70;&#116;',
		'IDR' => '&#82;&#112;',
		'ILS' => '&#8362;',
		'INR' => '&#8377;',
		'IQD' => '&#1593;.&#1583;', // ?
		'IRR' => '&#65020;',
		'ISK' => '&#107;&#114;',
		'JEP' => '&#163;',
		'JMD' => '&#74;&#36;',
		'JOD' => '&#74;&#68;', // ?
		'JPY' => '&#165;',
		'KES' => '&#75;&#83;&#104;', // ?
		'KGS' => '&#1083;&#1074;',
		'KHR' => '&#6107;',
		'KMF' => '&#67;&#70;', // ?
		'KPW' => '&#8361;',
		'KRW' => '&#8361;',
		'KWD' => '&#1583;.&#1603;', // ?
		'KYD' => '&#36;',
		'KZT' => '&#1083;&#1074;',
		'LAK' => '&#8365;',
		'LBP' => '&#163;',
		'LKR' => '&#8360;',
		'LRD' => '&#36;',
		'LSL' => '&#76;', // ?
		'LTL' => '&#76;&#116;',
		'LVL' => '&#76;&#115;',
		'LYD' => '&#1604;.&#1583;', // ?
		'MAD' => '&#1583;.&#1605;.', // ?
		'MDL' => '&#76;',
		'MGA' => '&#65;&#114;', // ?
		'MKD' => '&#1076;&#1077;&#1085;',
		'MMK' => '&#75;',
		'MNT' => '&#8366;',
		'MOP' => '&#77;&#79;&#80;&#36;', // ?
		'MRO' => '&#85;&#77;', // ?
		'MUR' => '&#8360;', // ?
		'MVR' => '.&#1923;', // ?
		'MWK' => '&#77;&#75;',
		'MXN' => '&#36;',
		'MYR' => '&#82;&#77;',
		'MZN' => '&#77;&#84;',
		'NAD' => '&#36;',
		'NGN' => '&#8358;',
		'NIO' => '&#67;&#36;',
		'NOK' => '&#107;&#114;',
		'NPR' => '&#8360;',
		'NZD' => '&#36;',
		'OMR' => '&#65020;',
		'PAB' => '&#66;&#47;&#46;',
		'PEN' => '&#83;&#47;&#46;',
		'PGK' => '&#75;', // ?
		'PHP' => '&#8369;',
		'PKR' => '&#8360;',
		'PLN' => '&#122;&#322;',
		'PYG' => '&#71;&#115;',
		'QAR' => '&#65020;',
		'RON' => '&#108;&#101;&#105;',
		'RSD' => '&#1044;&#1080;&#1085;&#46;',
		'RUB' => '&#1088;&#1091;&#1073;',
		'RWF' => '&#1585;.&#1587;',
		'SAR' => '&#65020;',
		'SBD' => '&#36;',
		'SCR' => '&#8360;',
		'SDG' => '&#163;', // ?
		'SEK' => '&#107;&#114;',
		'SGD' => '&#36;',
		'SHP' => '&#163;',
		'SLL' => '&#76;&#101;', // ?
		'SOS' => '&#83;',
		'SRD' => '&#36;',
		'STD' => '&#68;&#98;', // ?
		'SVC' => '&#36;',
		'SYP' => '&#163;',
		'SZL' => '&#76;', // ?
		'THB' => '&#3647;',
		'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
		'TMT' => '&#109;',
		'TND' => '&#1583;.&#1578;',
		'TOP' => '&#84;&#36;',
		'TRY' => '&#8356;', // New Turkey Lira (old symbol used).
		'TTD' => '&#36;',
		'TWD' => '&#78;&#84;&#36;',
		'TZS' => '',
		'UAH' => '&#8372;',
		'UGX' => '&#85;&#83;&#104;',
		'USD' => '&#36;',
		'UYU' => '&#36;&#85;',
		'UZS' => '&#1083;&#1074;',
		'VEF' => '&#66;&#115;',
		'VND' => '&#8363;',
		'VUV' => '&#86;&#84;',
		'WST' => '&#87;&#83;&#36;',
		'XAF' => '&#70;&#67;&#70;&#65;',
		'XCD' => '&#36;',
		'XDR' => '',
		'XOF' => '',
		'XPF' => '&#70;',
		'YER' => '&#65020;',
		'ZAR' => '&#82;',
		'ZMK' => '&#90;&#75;', // ?
		'ZWL' => '&#90;&#36;',
	);

	return $currency_symbols[ $wpd_currency ];

}

/**
 * Flowers Prices - Simple
 * 
 * @since 2.4
 */
function wpd_flowers_prices_simple() {

	// Get currency code.
	$currency_code = wpd_currency_code();

	// Get prices.
	$price_half_gram     = get_post_meta( get_the_ID(), '_halfgram', true );
	$price_one_gram      = get_post_meta( get_the_ID(), '_gram', true );
	$price_two_grams     = get_post_meta( get_the_ID(), '_twograms', true );
	$price_eighth        = get_post_meta( get_the_ID(), '_eighth', true );
	$price_five_grams    = get_post_meta( get_the_ID(), '_fivegrams', true );
	$price_quarter_ounce = get_post_meta( get_the_ID(), '_quarter', true );
	$price_half_ounce    = get_post_meta( get_the_ID(), '_halfounce', true );
	$price_one_ounce     = get_post_meta( get_the_ID(), '_ounce', true );

	/**
	 * Price output - if only one price has been added
	 */
	if ( '' === $price_two_grams && '' === $price_eighth && '' === $price_five_grams && '' === $price_quarter_ounce && '' === $price_half_ounce && '' === $price_one_ounce ) {
		$pricing = $currency_code . $price_one_gram;
	} elseif ( '' === $price_one_gram && '' === $price_eighth && '' === $price_five_grams && '' === $price_quarter_ounce && '' === $price_half_ounce && '' === $price_one_ounce ) {
		$pricing = $currency_code . $price_two_grams;
	} elseif ( '' === $price_one_gram && '' === $price_two_grams && '' === $price_five_grams && '' === $price_quarter_ounce && '' === $price_half_ounce && '' === $price_one_ounce ) {
		$pricing = $currency_code . $price_eighth;
	} elseif ( '' === $price_one_gram && '' === $price_two_grams && '' === $price_eighth && '' === $price_quarter_ounce && '' === $price_half_ounce && '' === $price_one_ounce ) {
		$pricing = $currency_code . $price_five_grams;
	} elseif ( '' === $price_one_gram && '' === $price_two_grams && '' === $price_eighth && '' === $price_five_grams && '' === $price_half_ounce && '' === $price_one_ounce ) {
		$pricing = $currency_code . $price_quarter_ounce;
	} elseif ( '' === $price_one_gram && '' === $price_two_grams && '' === $price_eighth && '' === $price_five_grams && '' === $price_quarter_ounce && '' === $price_one_ounce ) {
		$pricing = $currency_code . $price_half_ounce;
	} elseif ( '' === $price_one_gram && '' === $price_two_grams && '' === $price_eighth && '' === $price_five_grams && '' === $price_quarter_ounce && '' === $price_half_ounce ) {
		$pricing = $currency_code . $price_one_ounce;
	} else {
		$pricing = '';
	}

	/**
	 * Price output - if no prices have been added
	 */
	if ( '' === $price_one_gram && '' === $price_two_grams && '' === $price_eighth && '' === $price_five_grams && '' === $price_quarter_ounce && '' === $price_half_ounce && '' === $price_one_ounce ) {
		$pricing = ' ';
	}

	/**
	 * Price output - high amount
	 */
	$pricinglow = '';

	if ( get_post_meta( get_the_ID(), '_gram', true ) ) {
		$pricinglow = $currency_code . $price_one_gram;
	} elseif ( get_post_meta( get_the_ID(), '_twograms', true ) ) {
		$pricinglow = $currency_code . $price_two_grams;
	} elseif ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
		$pricinglow = $currency_code . $price_eighth;
	} elseif ( get_post_meta( get_the_ID(), '_fivegrams', true ) ) {
		$pricinglow = $currency_code . $price_five_grams;
	} elseif ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
		$pricinglow = $currency_code . $price_quarter_ounce;
	} elseif ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
		$pricinglow = $currency_code . $price_half_ounce;
	}

	// Separator.
	$pricingsep = ' - ';

	/**
	 * Price output - high amount
	 */
	$pricinghigh = '';

	if ( get_post_meta( get_the_ID(), '_ounce', true ) ) {
		$pricinghigh = $currency_code . $price_one_ounce;
	} elseif ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
		$pricinghigh = $currency_code . $price_half_ounce;
	} elseif ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
		$pricinghigh = $currency_code . $price_quarter_ounce;
	} elseif ( get_post_meta( get_the_ID(), '_fivegrams', true ) ) {
		$pricinghigh = $currency_code . $price_five_grams;
	} elseif ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
		$pricinghigh = $currency_code . $price_eighth;
	} elseif ( get_post_meta( get_the_ID(), '_twograms', true ) ) {
		$pricinghigh = $currency_code . $price_two_grams;
	} elseif ( get_post_meta( get_the_ID(), '_gram', true ) ) {
		$pricinghigh = $currency_code . $price_one_gram;
	}

	/**
	 * Return Pricing Prices.
	 */
	if ( empty( $pricing ) ) {
		return $pricinglow . $pricingsep . $pricinghigh;
	} elseif ( ' ' === $pricing ) {
		return '';
	} else {
		return $pricing;
	}

}
