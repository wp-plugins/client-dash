<?php

/**
 * Class ClientDash_Page_Webmaster_Tab_Main
 *
 * Adds the core content section for Webmaster -> Main.
 *
 * @package WordPress
 * @subpackage Client Dash
 *
 * @since Client Dash 1.5
 */
class ClientDash_Core_Page_Webmaster_Tab_Main extends ClientDash {

	/**
	 * The main construct function.
	 *
	 * @since Client Dash 1.5
	 */
	function __construct() {

		// Set the tab name to whatever the user set
		$tab_name = get_option( 'cd_webmaster_main_tab_name' );

		// Make sure the tab name isn't empty
		if ( empty( $tab_name ) ) {
			$tab_name = $this->option_defaults['webmaster_main_tab_name'];
		}

		$this->add_content_section( array(
			'name'     => 'Main',
			'page'     => 'Webmaster',
			'tab'      => $tab_name,
			'callback' => array( $this, 'block_output' )
		) );
	}

	/**
	 * The content for the content section.
	 *
	 * @since Client Dash 1.4
	 */
	public function block_output() {

		$content = get_option( 'cd_webmaster_main_tab_content' );
		$content = wpautop( $content );

		if ( ! empty( $content ) ) {
			echo $content;
		} else {
			$this->error_nag( 'Please set content under Client Dash <a href="' . $this->get_settings_url( 'webmaster' ) . '">settings</a>.', 'manage_options' );
			$this->error_nag( 'This tab has no content. If you believe this to be an error, please contact your system administrator.' );
		}
	}
}