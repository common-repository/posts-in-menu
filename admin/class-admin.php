<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://endif.media
 * @since      1.0.0
 *
 * @package    Posts_In_Menu_Pro
 * @subpackage Posts_In_Menu_Pro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Posts_In_Menu_Pro
 * @subpackage Posts_In_Menu_Pro/admin
 * @author     -- <-->
 */
class Posts_In_Menu_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Posts_In_Menu_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Posts_In_Menu_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/admin.js', array( 'jquery' ), $this->version, true );

	}

	/**
	 * Check for nag transient.
	 */
	public function admin_notice__nag() { ?>
		<?php if (!get_transient('pim_upgrade_nag')) { ?>
			<div class="notice notice-success is-dismissible pim-plugin-nag-dismiss">
				<p><span><?php _e( 'Want more features upgrade to <strong>Posts in Menu Pro</strong>!', $this->plugin_name ); ?></span>
				<span><a href="https://endif.media/posts-in-menu-pro" target="_blank"><?php _e( 'Upgrade Now', $this->plugin_name ); ?></a></span></p>
			</div>
		<?php } ?>
	<?php }

	/**
	 * Dismiss nag temporarily
	 */
	public function admin_notice__dismiss() {
		//wp_die('poo');
		set_transient( 'pim_upgrade_nag', 'true', 60 * 60 * 168); //7days
	}

}
