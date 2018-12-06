<?php
/**
 * Adding the Admin Settings Page
 *
 * @link       https://www.wpdispensary.com
 * @since      2.0.0
 *
 * @package    WP_Dispensary
 * @subpackage WP_Dispensary/admin
 */

/**
 * Define global constants.
 *
 * @since 2.0
 */
// Plugin version.
if ( ! defined( 'WPD_ADMIN_SETTINGS_VERSION' ) ) {
	define( 'WPD_ADMIN_SETTINGS_VERSION', WP_DISPENSARY_VERSION );
}
if ( ! defined( 'WPDS_NAME' ) ) {
	define( 'WPDS_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}
if ( ! defined( 'WPDS_DIR' ) ) {
	define( 'WPDS_DIR', WP_PLUGIN_DIR . '/' . WPDS_NAME );
}
if ( ! defined( 'WPDS_URL' ) ) {
	define( 'WPDS_URL', WP_PLUGIN_URL . '/' . WPDS_NAME );
}

// Required for is_plugin_active function.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Class `WPD_ADMIN_SETTINGS`.
 *
 * @since 2.0
 */
require_once( WPDS_DIR . '/class-wp-dispensary-admin-settings.php' );

/**
 * Actions/Filters
 *
 * Related to all settings API.
 *
 * @since  2.0
 */
if ( class_exists( 'WPD_ADMIN_SETTINGS' ) ) {
	/**
	 * Object Instantiation.
	 *
	 * Object for the class `WPD_ADMIN_SETTINGS`.
	 */
	$wpdas_obj = new WPD_ADMIN_SETTINGS();

	// Section: Display.
	$wpdas_obj->add_section(
		array(
			'id'    => 'wpdas_display',
			'title' => __( 'Display', 'wp-dispensary' ),
		)
	);

	// Section: General.
	$wpdas_obj->add_section(
		array(
			'id'    => 'wpdas_general',
			'title' => __( 'General', 'wp-dispensary' ),
		)
	);

	// Check if WPD eCommerce is active.
	if ( is_plugin_active( 'wpd-ecommerce/wpd-ecommerce.php' ) ) {
		// Section: Payments.
		$wpdas_obj->add_section(
			array(
				'id'    => 'wpdas_payments',
				'title' => __( 'Payments', 'wp-dispensary' ),
			)
		);

		// Section: Pages.
		$wpdas_obj->add_section(
			array(
				'id'    => 'wpdas_pages',
				'title' => __( 'Pages', 'wp-dispensary' ),
			)
		);
	}

	// Check if WPD eCommerce is active.
	if ( ! is_plugin_active( 'wpd-ecommerce/wpd-ecommerce.php' ) ) {
		/**
		 * Add Field: Display a title to help separate fields
		 * Field:     title
		 * Section:   wpdas_display
		 */
		$wpdas_obj->add_field(
			'wpdas_display',
			array(
				'id'   => 'wpd_settings_pricing_table_title',
				'type' => 'title',
				'name' => '<h1>Prices table</h1>',
			)
		);

		/**
		 * Add Field: Pricing phrase
		 * Field:     select
		 * Section:   wpdas_display
		 */
		$wpdas_obj->add_field(
			'wpdas_display',
			array(
				'id'      => 'wpd_pricing_phrase',
				'type'    => 'select',
				'name'    => __( 'Title', 'wp-dispensary' ),
				'desc'    => __( 'Choose the title you would like used', 'wp-dispensary' ),
				'options' => array(
					'Price'    => 'Prices',
					'Donation' => 'Donations',
				),
			)
		);

		/**
		 * Add Field: Custom title
		 * Field:     text
		 * Section:   wpdas_display
		 */
		$wpdas_obj->add_field(
			'wpdas_display',
			array(
				'id'          => 'wpd_pricing_phrase_custom',
				'type'        => 'text',
				'name'        => '',
				'desc'        => __( 'or add a custom title', 'wp-dispensary' ),
				'placeholder' => '',
			)
		);

		/**
		 * Add Field: Pricing table display
		 * Field:     select
		 * Section:   wpdas_display
		 */
		$wpdas_obj->add_field(
			'wpdas_display',
			array(
				'id'      => 'wpd_pricing_table_placement',
				'type'    => 'select',
				'name'    => __( 'Display', 'wp-dispensary' ),
				'desc'    => __( 'Where should the pricing display on single menu items?', 'wp-dispensary' ),
				'options' => array(
					'above' => 'Above Content',
					'below' => 'Below Content',
				),
			)
		);

		/**
		 * Add Field: Hide pricing table
		 * Field:     checkbox
		 * Section:   wpdas_display
		 */
		$wpdas_obj->add_field(
			'wpdas_display',
			array(
				'id'   => 'wpd_hide_pricing',
				'type' => 'checkbox',
				'name' => '',
				'desc' => __( 'Remove the price table from data output', 'wp-dispensary' ),
			)
		);

		/**
		 * Add Field: Separator between fields
		 * Field:     separator
		 * Section:   wpdas_display
		 */
		$wpdas_obj->add_field(
			'wpdas_display',
			array(
				'id'   => 'wpd_settings_separator',
				'type' => 'separator',
			)
		);
	}

	/**
	 * Add Field: Display a title to help separate fields
	 * Field:     title
	 * Section:   wpdas_display
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'   => 'wpd_settings_compounds_table_title',
			'type' => 'title',
			'name' => '<h1>Compounds table</h1>',
		)
	);

	/**
	 * Add Field: Details table placement
	 * Field:     select
	 * Section:   wpdas_display
	 * 
	 * @todo make the options filterable for WPD eCommerce to add and set an option on install.
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'      => 'wpd_compounds_table_placement',
			'type'    => 'select',
			'name'    => __( 'Display', 'wp-dispensary' ),
			'desc'    => __( 'Where should the compounds display on single menu items?', 'wp-dispensary' ),
			'options' => array(
				'above' => 'Above Content',
				'below' => 'Below Content',
			),
		)
	);

	/**
	 * Add Field: Display compounds table
	 * Field:     checkbox
	 * Section:   wpdas_display
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'   => 'wpd_hide_compounds',
			'type' => 'checkbox',
			'name' => '',
			'desc' => __( 'Remove the compounds table from data output', 'wp-dispensary' ),
		)
	);

	/**
	 * Add Field: Separator between fields
	 * Field:     separator
	 * Section:   wpdas_display
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'   => 'wpd_settings_separator_compounds',
			'type' => 'separator',
		)
	);

	/**
	 * Add Field: Display a title to help separate fields
	 * Field:     title
	 * Section:   wpdas_display
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'   => 'wpd_settings_details_table_title',
			'type' => 'title',
			'name' => '<h1>' . __( 'Details table', 'wp-dispensary' ) . '</h1>',
		)
	);

	/**
	 * Add Field: Details phrase
	 * Field:     select
	 * Section:   wpdas_display
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'      => 'wpd_details_phrase',
			'type'    => 'select',
			'name'    => __( 'Title', 'wp-dispensary' ),
			'desc'    => __( 'Choose the title you would like used', 'wp-dispensary' ),
			'options' => array(
				'Details'     => 'Details',
				'Information' => 'Information',
			),
		)
	);

	/**
	 * Add Field: Custom title
	 * Field:     text
	 * Section:   wpdas_display
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'          => 'wpd_details_phrase_custom',
			'type'        => 'text',
			'name'        => '',
			'desc'        => __( 'or add a custom title', 'wp-dispensary' ),
			'placeholder' => '',
		)
	);

	/**
	 * Add Field: Details table placement
	 * Field:     select
	 * Section:   wpdas_display
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'      => 'wpd_details_table_placement',
			'type'    => 'select',
			'name'    => __( 'Display', 'wp-dispensary' ),
			'desc'    => __( 'Where should the details display on single menu items?', 'wp-dispensary' ),
			'options' => array(
				'above' => 'Above Content',
				'below' => 'Below Content',
			),
		)
	);

	/**
	 * Add Field: Display details table
	 * Field:     checkbox
	 * Section:   wpdas_display
	 */
	$wpdas_obj->add_field(
		'wpdas_display',
		array(
			'id'   => 'wpd_hide_details',
			'type' => 'checkbox',
			'name' => '',
			'desc' => __( 'Remove the details table from data output', 'wp-dispensary' ),
		)
	);

	// Check if WPD eCommerce is active.
	if ( is_plugin_active( 'wpd-ecommerce/wpd-ecommerce.php' ) ) {
		/**
		 * Add Field: Display a title to help separate fields
		 * Field:     title
		 * Section:   wpdas_general
		 */
		$wpdas_obj->add_field(
			'wpdas_general',
			array(
				'id'   => 'wpd_settings_store_general',
				'type' => 'title',
				'name' => '<h1>' . __( 'General', 'wp-dispensary' ) . '</h1>',
			)
		);
	}

	/**
	 * Add Field: Currency code
	 * Field:     select
	 * Section:   wpdas_general
	 */
	$wpdas_obj->add_field(
		'wpdas_general',
		array(
			'id'      => 'wpd_pricing_currency_code',
			'type'    => 'select',
			'name'    => __( 'Currency', 'wp-dispensary' ),
			'desc'    => __( 'Select the currency symbol you would like to use', 'wp-dispensary' ),
			'options' => array(
				'AUD' => '(AUD) Australian Dollar',
				'BRL' => '(BRL) Brazilian Real',
				'CAD' => '(CAD) Canadian Dollar',
				'CZK' => '(CZK) Czech Koruna',
				'DKK' => '(DKK) Danish Krone',
				'EUR' => '(EUR) Euro',
				'HKD' => '(HKD) Hong Kong Dollar',
				'HUF' => '(HUF) Hungarian Forint',
				'ILS' => '(ILS) Israeli New Sheqel',
				'JPY' => '(JPY) Japanese Yen',
				'MYR' => '(MYR) Malaysian Ringgit',
				'MYR' => '(MXN) Mexican Peso',
				'MXN' => '(NOK) Norwegian Krone',
				'NOK' => '(NZD) New Zealand Dollar',
				'NZD' => '(PHP) Philippine Peso',
				'PHP' => '(PLN) Polish Zloty',
				'PLN' => '(GBP) Pound Sterling',
				'GBP' => '(SGD) Singapore Dollar',
				'SGD' => '(SEK) Swedish Krona',
				'CHF' => '(CHF) Swiss Franc',
				'TWD' => '(TWD) Taiwan New Dollar',
				'THB' => '(THB) Thai Baht',
				'TRY' => '(TRY) Turkish Lira',
				'USD' => '(USD) U.S. Dollar',
			),
		)
	);

	// Check if WPD eCommerce is active.
	if ( is_plugin_active( 'wpd-ecommerce/wpd-ecommerce.php' ) ) {
		/**
		 * Add Field: Display a title to help separate fields
		 * Field:     title
		 * Section:   wpdas_general
		 */
		$wpdas_obj->add_field(
			'wpdas_general',
			array(
				'id'   => 'wpd_settings_store_taxes',
				'type' => 'title',
				'name' => '<h1>' . __( 'Taxes', 'wp-dispensary' ) . '</h1>',
			)
		);

		/**
		 * Add Field: Sales tax
		 * Field:     select
		 * Section:   wpdas_display
		 */
		$wpdas_obj->add_field(
			'wpdas_general',
			array(
				'id'      => 'wpd_ecommerce_sales_tax',
				'type'    => 'text',
				'name'    => __( 'Sales tax', 'wp-dispensary' ),
				'desc'    => __( 'Apply sales tax to orders (%)', 'wp-dispensary' ),
				'placeholder' => __( '6', 'wp-dispensary' ),
			)
		);

		/**
		 * Add Field: Excise tax
		 * Field:     text
		 * Section:   wpdas_display
		 */
		$wpdas_obj->add_field(
			'wpdas_general',
			array(
				'id'      => 'wpd_ecommerce_excise_tax',
				'type'        => 'text',
				'name'        => __( 'Excise tax', 'wp-dispensary' ),
				'desc'        => __( 'Apply excise tax to orders (%)', 'wp-dispensary' ),
				'placeholder' => __( '10', 'wp-dispensary' ),
			)
		);

		/**
		 * Add Field: Display a title to help separate fields
		 * Field:     title
		 * Section:   wpdas_general
		 */
		$wpdas_obj->add_field(
			'wpdas_general',
			array(
				'id'   => 'wpd_settings_checkout_options',
				'type' => 'title',
				'name' => '<h1>' . __( 'Checkout', 'wp-dispensary' ) . '</h1>',
			)
		);

		/**
		 * Add Field: Minimum order
		 * Field:     text
		 * Section:   wpdas_general
		 */
		$wpdas_obj->add_field(
			'wpdas_general',
			array(
				'id'          => 'wpd_ecommerce_checkout_minimum_order',
				'type'        => 'text',
				'name'        => __( 'Minimum order', 'wp-dispensary' ),
				'desc'        => __( 'Require a minimum order amount before checkout', 'wp-dispensary' ),
				'placeholder' => 'ex: 50',
			)
		);

		// Check if Coupons add-on is active.
		if ( is_plugin_active( 'dispensary-coupons/dispensary-coupons.php' ) ) {
			/**
			 * Add Field: Checkout coupons
			 * Field:     checkbox
			 * Section:   wpdas_general
			 */
			$wpdas_obj->add_field(
				'wpdas_general',
				array(
					'id'   => 'wpd_ecommerce_checkout_coupons',
					'type' => 'checkbox',
					'name' => __( 'Coupons', 'wp-dispensary' ),
					'desc' => __( 'Allow patients to apply a coupon to their order', 'wp-dispensary' ),
				)
			);
		}

		/**
		 * Checkout payment options
		 * 
		 * @todo make this filterable.
		 * @since 2.5
		 */
		$checkout_payments = array(
			'cod'    => __( 'Cash on delivery', 'wp-dispensary' ),
			'pop'    => __( 'Pay on pickup', 'wp-dispensary' ),
			'ground' => __( 'Ground shipping', 'wp-dispensary' ),
		);

		foreach ( $checkout_payments as $id=>$value ) {

			/**
			 * Add Field: Display a title to help separate fields
			 * Field:     title
			 * Section:   wpdas_payments
			 */
			$wpdas_obj->add_field(
				'wpdas_payments',
				array(
					'id'   => 'wpd_settings_payment_options_' . $id,
					'type' => 'title',
					'name' => '<h1>' . $value . '</h1>',
				)
			);

			/**
			 * Add Field: Checkout payments
			 * Field:     checkbox
			 * Section:   wpdas_payments
			 */
			$wpdas_obj->add_field(
				'wpdas_payments',
				array(
					'id'   => 'wpd_ecommerce_checkout_payments_' . $id . '_checkbox',
					'type' => 'checkbox',
					'name' => 'Enable/Disable',
					'desc' => __( 'Enable ' . $value, 'wp-dispensary' ),
				)
			);

			/**
			 * Add Field: Checkout payments
			 * Field:     text
			 * Section:   wpdas_payments
			 */
			$wpdas_obj->add_field(
				'wpdas_payments',
				array(
					'id'          => 'wpd_ecommerce_checkout_payments_' . $id,
					'type'        => 'text',
					'name'        => __( 'Charge', 'wp-dispensary' ),
					'placeholder' => __( '0', 'wp-dispensary' ),
				)
			);

		} // foreach

		/**
		 * Add Field: Display a title to help separate fields
		 * Field:     title
		 * Section:   wpdas_general
		 */
		$wpdas_obj->add_field(
			'wpdas_pages',
			array(
				'id'   => 'wpd_settings_checkout_options',
				'type' => 'title',
				'name' => '<h1>' . __( 'Page Setup', 'wp-dispensary' ) . '</h1>',
			)
		);

		// Args for pages.
		$args = array(
			'sort_order'   => 'asc',
			'sort_column'  => 'post_title',
			'hierarchical' => 1,
			'exclude'      => '',
			'include'      => '',
			'meta_key'     => '',
			'meta_value'   => '',
			'authors'      => '',
			'child_of'     => 0,
			'parent'       => -1,
			'exclude_tree' => '',
			'number'       => '',
			'offset'       => 0,
			'post_type'    => 'page',
			'post_status'  => 'publish'
		);

		// Get all pages.
		$pages = get_pages( $args );
		// Loop through pages.
		foreach ( $pages as $page ) {
			$pages_array[$page->post_name] = $page->post_title;
		}

		//print_r( $pages_array );

		/**
		 * Add Field: Menu page
		 * Field:     select
		 * Section:   wpdas_pages
		 */
		$wpdas_obj->add_field(
			'wpdas_pages',
			array(
				'id'      => 'wpd_pages_setup_menu_page',
				'type'    => 'select',
				'name'    => __( 'Menu page', 'wp-dispensary' ),
				'desc'    => __( 'Page contents [wpd_menu]', 'wp-dispensary' ),
				'options' => $pages_array,
			)
		);

		/**
		 * Add Field: Cart page
		 * Field:     select
		 * Section:   wpdas_pages
		 */
		$wpdas_obj->add_field(
			'wpdas_pages',
			array(
				'id'      => 'wpd_pages_setup_cart_page',
				'type'    => 'select',
				'name'    => __( 'Cart page', 'wp-dispensary' ),
				'desc'    => __( 'Page contents [wpd_cart]', 'wp-dispensary' ),
				'options' => $pages_array,
			)
		);

		/**
		 * Add Field: Checkout page
		 * Field:     select
		 * Section:   wpdas_pages
		 */
		$wpdas_obj->add_field(
			'wpdas_pages',
			array(
				'id'      => 'wpd_pages_setup_checkout_page',
				'type'    => 'select',
				'name'    => __( 'Checkout page', 'wp-dispensary' ),
				'desc'    => __( 'Page contents [wpd_checkout]', 'wp-dispensary' ),
				'options' => $pages_array,
			)
		);

		/**
		 * Add Field: Account page
		 * Field:     select
		 * Section:   wpdas_pages
		 */
		$wpdas_obj->add_field(
			'wpdas_pages',
			array(
				'id'      => 'wpd_pages_setup_account_page',
				'type'    => 'select',
				'name'    => __( 'Account page', 'wp-dispensary' ),
				'desc'    => __( 'Page contents [wpd_account]', 'wp-dispensary' ),
				'options' => $pages_array,
			)
		);

	}

} // end WPD_ADMIN_SETTINGS check
