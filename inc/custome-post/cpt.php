<?php

/**
 * Custom Post Type
 * Author EgensLab
 * @since 1.2.0
 * */

if (!defined('ABSPATH')) {
	exit();  //exit if access directly
}
if (!class_exists('drivco_Custom_Post_Type')) {
	class drivco_Custom_Post_Type
	{

		//$instance variable
		private static $instance;

		public function __construct()
		{
			//register post type
			add_action('init', array($this, 'register_custom_post_type'));
		}

		/**
		 * get Instance
		 * @since  2.0.0
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register Custom Post Type
		 * @since  2.0.0
		 * */
		public function register_custom_post_type()
		{

			$all_post_type = array(

				// Custome post vehicle 
				[
					'post_type' => 'vehicle',
					'args'      => array(
						'label'       => esc_html__('Vehicle', 'drivco-core'),
						'description' => esc_html__('Vehicle', 'drivco-core'),
						'menu_icon'   => 'dashicons-car',
						'labels'      => array(
							'name'               => esc_html_x('Vehicle', 'Post Type General Name', 'drivco-core'),
							'singular_name'      => esc_html_x('Vehicle', 'Post Type Singular Name', 'drivco-core'),
							'menu_name'          => esc_html__('EG Vehicle', 'drivco-core'),
							'all_items'          => esc_html__('All Vehicle', 'drivco-core'),
							'view_item'          => esc_html__('View Vehicle', 'drivco-core'),
							'add_new_item'       => esc_html__('Add New Vehicle', 'drivco-core'),
							'add_new'            => esc_html__('Add New Vehicle', 'drivco-core'),
							'edit_item'          => esc_html__('Edit Vehicle', 'drivco-core'),
							'update_item'        => esc_html__('Update Vehicle', 'drivco-core'),
							'search_items'       => esc_html__('Search Vehicle', 'drivco-core'),
							'not_found'          => esc_html__('Not Found', 'drivco-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'drivco-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'vehicle', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
					)
				],

			);

			if (!empty($all_post_type) && is_array($all_post_type)) {
				foreach ($all_post_type as $post_type) {
					call_user_func_array('register_post_type', $post_type);
				}
			}

			/**
			 * Custom Taxonomy Register
			 */
			$all_custom_taxonmy = array(

				// Taxonomy for vehicle post vehicle-tab
				array(
					'taxonomy'    => 'vehicle-tab',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Tabs", 'drivco-core'),
							"singular_name" => esc_html__("Tab", 'drivco-core'),
							"menu_name"     => esc_html__("Vehicle Tabs", 'drivco-core'),
							"all_items"     => esc_html__("All Tabs", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Tab", 'drivco-core'),
							"new_item_name" => esc_html__("New Tab Name", 'drivco-core'),
							"parent_item"   => esc_html__("Parent Tab", 'drivco-core'),
							"edit_item"     => esc_html__("Edit Tab", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'tab', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post vehicle-category
				array(
					'taxonomy'    => 'vehicle-category',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Category", 'drivco-core'),
							"singular_name" => esc_html__("Category", 'drivco-core'),
							"menu_name"     => esc_html__("Category", 'drivco-core'),
							"all_items"     => esc_html__("All Category", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Category", 'drivco-core'),
							"new_item_name" => esc_html__("New Category Name", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'vehicle-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post vehicle-brand
				array(
					'taxonomy'    => 'vehicle-brand',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Brand", 'drivco-core'),
							"singular_name" => esc_html__("Brand", 'drivco-core'),
							"menu_name"     => esc_html__("Vehicle Brand", 'drivco-core'),
							"all_items"     => esc_html__("All Brand", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Brand", 'drivco-core'),
							"new_item_name" => esc_html__("New Brand Name", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'vehicle-brand', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post vehicle-model
				array(
					'taxonomy'    => 'vehicle-model',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Model", 'drivco-core'),
							"singular_name" => esc_html__("Model", 'drivco-core'),
							"menu_name"     => esc_html__("Vehicle Model", 'drivco-core'),
							"all_items"     => esc_html__("All Model", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Model", 'drivco-core'),
							"new_item_name" => esc_html__("New Model Name", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'model', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post vehicle-make
				array(
					'taxonomy'    => 'vehicle-make',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Makes", 'drivco-core'),
							"singular_name" => esc_html__("Make", 'drivco-core'),
							"menu_name"     => esc_html__("Vehicle Makes", 'drivco-core'),
							"all_items"     => esc_html__("All Makes", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Make", 'drivco-core'),
							"new_item_name" => esc_html__("New Make Name", 'drivco-core'),
							"parent_item"   => esc_html__("Parent Make", 'drivco-core'),
							"edit_item"     => esc_html__("Edit Make", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'make', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post States
				array(
					'taxonomy'    => 'vehicle-states',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("States", 'drivco-core'),
							"singular_name" => esc_html__("States", 'drivco-core'),
							"menu_name"     => esc_html__("States", 'drivco-core'),
							"all_items"     => esc_html__("All States", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New States", 'drivco-core'),
							"new_item_name" => esc_html__("New States Name", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'states', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post Location
				array(
					'taxonomy'    => 'location',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Location", 'drivco-core'),
							"singular_name" => esc_html__("Location", 'drivco-core'),
							"menu_name"     => esc_html__("Location", 'drivco-core'),
							"all_items"     => esc_html__("All Location", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Location", 'drivco-core'),
							"new_item_name" => esc_html__("New Location Name", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'location', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post Body Type
				array(
					'taxonomy'    => 'body-type',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Body Type", 'drivco-core'),
							"singular_name" => esc_html__("Body Type", 'drivco-core'),
							"menu_name"     => esc_html__("Body Type", 'drivco-core'),
							"all_items"     => esc_html__("All Body Type", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Body Type", 'drivco-core'),
							"new_item_name" => esc_html__("New Body Type Name", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'body-type', 'with_front' => true),
						"query_var"          => false,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post Colors
				array(
					'taxonomy'    => 'colors',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Colors", 'drivco-core'),
							"singular_name" => esc_html__("Colors", 'drivco-core'),
							"menu_name"     => esc_html__("Vehicle Colors", 'drivco-core'),
							"all_items"     => esc_html__("All Colors", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Color", 'drivco-core'),
							"new_item_name" => esc_html__("New Color Name", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'colors', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Taxonomy for vehicle post vehicle-year
				array(
					'taxonomy'    => 'vehicle-year',
					'object_type' => 'vehicle',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Year", 'drivco-core'),
							"singular_name" => esc_html__("Year", 'drivco-core'),
							"menu_name"     => esc_html__("Vehicle Year", 'drivco-core'),
							"all_items"     => esc_html__("All Year", 'drivco-core'),
							"add_new_item"  => esc_html__("Add New Year", 'drivco-core'),
							"new_item_name" => esc_html__("New Year Name", 'drivco-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'vehicle-year', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

			);


			if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
				foreach ($all_custom_taxonmy as $taxonomy) {
					call_user_func_array('register_taxonomy', $taxonomy);
				}
			}

			// Connect the sub-taxonomy to the main taxonomy
			register_taxonomy_for_object_type('vehicle-model', 'vehicle-brand', true);

			flush_rewrite_rules();
		}
	} //end class

	if (class_exists('drivco_Custom_Post_Type')) {
		drivco_Custom_Post_Type::getInstance();
	}
}
