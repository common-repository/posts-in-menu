<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://endif.media
 * @since      1.0.0
 *
 * @package    Posts_In_Menu
 * @subpackage Posts_In_Menu/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Posts_In_Menu
 * @subpackage Posts_In_Menu/public
 * @author     -- <-->
 */
class Posts_In_Menu_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add blog links to menu.
	 *
	 * @param $items
	 * @param $args
	 *
	 * @return array
	 */
	function add_blog_menu_links($items, $args) {

		$num = rand(1111, 9999);
		$items = $this->add_parent_item_to_menu($items, 'Blog', $num, array('menu-item-has-children'));
		$blogs = $this->get_latest_posts();

		foreach ($blogs as $blog) {
			$items = $this->add_item_to_menu_parent($items, $blog->post_title, $num, $blog->ID, get_the_permalink($blog->ID));
		}
		return $items;

	}

	/**
	 * @param $items
	 * @param string $title
	 * @param null $id
	 * @param string $classes
	 *
	 * @return array
	 */
	function add_parent_item_to_menu($items, $title = '', $id = null, $classes = '') {
		$item = array(
			'title'            => $title,
			'ID'               => $id,
			'db_id'            => $id,
			'classes'          => $classes// optionally add custom CSS class
		);
		$items[] = (object) $item;
		return $items;
	}

	/**
	 * Add an item to a menu parent.
	 *
	 * @param $items
	 * @param string $title
	 * @param null $menu_parent
	 * @param null $id
	 * @param string $url
	 * @param string $classes
	 *
	 * @return array
	 */
	function add_item_to_menu_parent($items, $title = '', $menu_parent = null, $id = null, $url = '', $classes = '') {
		$item = array(
			'title'            => $title,
			'menu_item_parent' => $menu_parent,
			'ID'               => $id,
			'db_id'            => $id,
			'url'			   => $url,
			'classes'          => $classes
		);
		$items[] = (object) $item;
		return $items;
	}

	/**
	 * Get list of blog posts.
	 *
	 * @return array
	 */
	function get_latest_posts() {
		$args = array(
			'posts_per_page'   => 3,
			'post_type'        => 'post',
			'post_status'      => 'publish',
		);
		$blogs = get_posts($args);
		return $blogs;
	}

}
