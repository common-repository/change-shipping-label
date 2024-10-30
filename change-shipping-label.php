<?php
/*
Plugin Name: Change Shipping Label
Description: A simple plugin for changing shipping labels in WooCommece cart and checkout.
Version: 1.2
Author: Wittler Webdesign
Author URI: https://wittler-webdesign.de/
*/

/*
Copyright (C) 2020 Jan Wittler

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if(!defined('ABSPATH')){
	die;
}

/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 * 
 * Modified by the Author of the Plugin.
 */

class ChangeShippingLabels {
	private $change_shipping_labels_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'change_shipping_labels_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'change_shipping_labels_page_init' ) );
	}

	

	public function change_shipping_labels_add_plugin_page() {
		add_submenu_page(
			'woocommerce',
			'Change Shipping Labels', // page_title
			'Change Shipping Labels', // menu_title
			'manage_options', // capability
			'change-shipping-labels', // menu_slug
			array( $this, 'change_shipping_labels_create_admin_page' ) // function
		);
	}

	public function change_shipping_labels_create_admin_page() {
		$this->change_shipping_labels_options = get_option( 'change_shipping_labels_option_name' ); ?>

		<div class="wrap">
			<h2>Change Shipping Labels</h2>
			<p>This is a Plugin for changing the shipping labels on cart and checkout page. Just add your custom text below and save. It's that easy. You should select one of the options for displaying the labels. More information about the different label types can be found on the plugin page.</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'change_shipping_labels_option_group' );
					do_settings_sections( 'change-shipping-labels-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function change_shipping_labels_page_init() {
		register_setting(
			'change_shipping_labels_option_group', // option_group
			'change_shipping_labels_option_name', // option_name
			array( $this, 'change_shipping_labels_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'change_shipping_labels_setting_section', // id
			'Settings', // title
			array( $this, 'change_shipping_labels_section_info' ), // callback
			'change-shipping-labels-admin' // page
		);

		add_settings_field(
			'shipping_label_0', // id
			'Shipping label', // title
			array( $this, 'shipping_label_0_callback' ), // callback
			'change-shipping-labels-admin', // page
			'change_shipping_labels_setting_section' // section
		);

		add_settings_field(
			'display_options_1', // id
			'Display options', // title
			array( $this, 'display_options_1_callback' ), // callback
			'change-shipping-labels-admin', // page
			'change_shipping_labels_setting_section' // section
		);

		add_settings_field(
			'shipping_method_label_2', // id
			'Shipping method label', // title
			array( $this, 'shipping_method_label_2_callback' ), // callback
			'change-shipping-labels-admin', // page
			'change_shipping_labels_setting_section' // section
		);

		add_settings_field(
			'display_options_3', // id
			'Display options', // title
			array( $this, 'display_options_3_callback' ), // callback
			'change-shipping-labels-admin', // page
			'change_shipping_labels_setting_section' // section
		);
	}

	public function change_shipping_labels_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['shipping_label_0'] ) ) {
			$sanitary_values['shipping_label_0'] = sanitize_text_field( $input['shipping_label_0'] );
		}

		if ( isset( $input['display_options_1'] ) ) {
			$sanitary_values['display_options_1'] = $input['display_options_1'];
		}

		if ( isset( $input['shipping_method_label_2'] ) ) {
			$sanitary_values['shipping_method_label_2'] = sanitize_text_field( $input['shipping_method_label_2'] );
		}

		if ( isset( $input['display_options_3'] ) ) {
			$sanitary_values['display_options_3'] = $input['display_options_3'];
		}

		return $sanitary_values;
	}

	public function change_shipping_labels_section_info() {
		
	}

	public function shipping_label_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="change_shipping_labels_option_name[shipping_label_0]" id="shipping_label_0" value="%s">',
			isset( $this->change_shipping_labels_options['shipping_label_0'] ) ? esc_attr( $this->change_shipping_labels_options['shipping_label_0']) : ''
		);
	}

	public function display_options_1_callback() {
		?> <fieldset><?php $checked = ( isset( $this->change_shipping_labels_options['display_options_1'] ) && $this->change_shipping_labels_options['display_options_1'] === 'Show' ) ? 'checked' : '' ; ?>
		<label for="display_options_1-0"><input type="radio" name="change_shipping_labels_option_name[display_options_1]" id="display_options_1-0" value="Show" <?php echo $checked; ?>> Show</label><br>
		<?php $checked = ( isset( $this->change_shipping_labels_options['display_options_1'] ) && $this->change_shipping_labels_options['display_options_1'] === 'Hide' ) ? 'checked' : '' ; ?>
		<label for="display_options_1-1"><input type="radio" name="change_shipping_labels_option_name[display_options_1]" id="display_options_1-1" value="Hide" <?php echo $checked; ?>> Hide</label></fieldset> <?php
	}

	public function shipping_method_label_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="change_shipping_labels_option_name[shipping_method_label_2]" id="shipping_method_label_2" value="%s">',
			isset( $this->change_shipping_labels_options['shipping_method_label_2'] ) ? esc_attr( $this->change_shipping_labels_options['shipping_method_label_2']) : ''
		);
	}

	public function display_options_3_callback() {
		?> <fieldset><?php $checked = ( isset( $this->change_shipping_labels_options['display_options_3'] ) && $this->change_shipping_labels_options['display_options_3'] === 'Show label and price' ) ? 'checked' : '' ; ?>
		<label for="display_options_3-0"><input type="radio" name="change_shipping_labels_option_name[display_options_3]" id="display_options_3-0" value="Show label and price" <?php echo $checked; ?>> Show label and price</label><br>
		<?php $checked = ( isset( $this->change_shipping_labels_options['display_options_3'] ) && $this->change_shipping_labels_options['display_options_3'] === 'Show label and hide price' ) ? 'checked' : '' ; ?>
		<label for="display_options_3-1"><input type="radio" name="change_shipping_labels_option_name[display_options_3]" id="display_options_3-1" value="Show label and hide price" <?php echo $checked; ?>> Show label and hide price</label><br>
		<?php $checked = ( isset( $this->change_shipping_labels_options['display_options_3'] ) && $this->change_shipping_labels_options['display_options_3'] === 'Hide label and show price' ) ? 'checked' : '' ; ?>
		<label for="display_options_3-2"><input type="radio" name="change_shipping_labels_option_name[display_options_3]" id="display_options_3-2" value="Hide label and show price" <?php echo $checked; ?>> Hide label and show price</label><br>
		<?php $checked = ( isset( $this->change_shipping_labels_options['display_options_3'] ) && $this->change_shipping_labels_options['display_options_3'] === 'Hide label and price' ) ? 'checked' : '' ; ?>
		<label for="display_options_3-3"><input type="radio" name="change_shipping_labels_option_name[display_options_3]" id="display_options_3-3" value="Hide label and price" <?php echo $checked; ?>> Hide label and price</label></fieldset> <?php
	}

}
if ( is_admin() )
	$change_shipping_labels = new ChangeShippingLabels();

/* 
 * Retrieve this value with:
 * $change_shipping_labels_options = get_option( 'change_shipping_labels_option_name' ); // Array of All Options
 * $shipping_label_0 = $change_shipping_labels_options['shipping_label_0']; // Shipping label
 * $display_options_1 = $change_shipping_labels_options['display_options_1']; // Display options
 * $shipping_method_label_2 = $change_shipping_labels_options['shipping_method_label_2']; // Shipping method label
 * $display_options_3 = $change_shipping_labels_options['display_options_3']; // Display options
 */





add_filter( 'woocommerce_shipping_package_name', 'csl_custom_shipping_label' );

function csl_custom_shipping_label( $name ) {
	
	$change_shipping_labels_options = get_option( 'change_shipping_labels_option_name' ); // Array of All Options
	$shipping_label_0 = $change_shipping_labels_options['shipping_label_0']; // Shipping label
	$display_options_1 = $change_shipping_labels_options['display_options_1']; // Display options

	if($display_options_1 == 'Hide') {
		return '';
	} else if ($shipping_label_0 == '' && $display_options_1 != 'Hide') {
		return $name;
	} else if($display_options_1 == 'Show'){
    	return $shipping_label_0;
	}

}

function csl_change_shipping_method_label( $label ) {

	$change_shipping_labels_options = get_option( 'change_shipping_labels_option_name' ); // Array of All Options
	$shipping_method_label_2 = $change_shipping_labels_options['shipping_method_label_2']; // Shipping method label
    $display_options_3 = $change_shipping_labels_options['display_options_3']; // Display options

	if($display_options_3 == 'Hide label and show price') {
		$where = strpos( $label, ': ' );
		return substr( $label, ++$where );
	} else if($shipping_method_label_2 == '' && $display_options_3 == 'Show label and price'){
		return $label;
	} else if($shipping_method_label_2 != '' && $display_options_3 == "Show label and price"){
		$where = strpos( $label, ': ' );
		return ($shipping_method_label_2 . substr( $label, ++$where ));
	} else if($display_options_3 == 'Show label and hide price' && $shipping_method_label_2 != ''){
		return $shipping_method_label_2;
	} else if($display_options_3 == 'Show label and hide price' && $shipping_method_label_2 == '') {
		// Substring nur vorderer teil
		$where2 = strpos( $label, ': ' );
		return substr( $label, 0, $where2 );
	} else if($display_options_3 == "Hide label and price"){
		return '';
	}

}

add_filter( 'woocommerce_cart_shipping_method_full_label', 'csl_change_shipping_method_label' );

?>
