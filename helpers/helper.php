<?php

namespace Egns_Core;

/**
 * All Elementor widget init
 * 
 * @since 1.2.0
 */

if (!defined('ABSPATH')) {
	exit();  // exit if access directly
}

if (!class_exists('Egns_Helper')) {

	class Egns_Helper
	{


		/**
		 * Helper Class constructor
		 */
		function __construct()
		{
			if (!class_exists('Woocommerce')) {
				add_action('init', array($this, 'egns_add_customer_role'));
				add_action('after_setup_theme', array($this, 'egns_after_theme_setup'));
			}
		}

		// Hide admin bar for customer
		public function egns_after_theme_setup()
		{
			if (current_user_can('customer')) {
				show_admin_bar(false);
			}
		}

		// Auction role 
		public function egns_add_customer_role()
		{
			add_role(
				'customer',
				esc_html('Customer'),
			);
		}

		public static function get_auction_vehicle_by_meta($meta_value, $take = -1)
		{
			$args = array(
				'post_type'      => 'auction-bidding',
				'posts_per_page' => $take,
				'meta_query'     => array(
					array(
						'key'     => 'egns_auction_metadata',
						'value'   => $meta_value,
						'compare' => 'LIKE',
					)
				),
			);
			$total_bids = get_posts($args);
			return $total_bids;
		}

		public static function get_count_auction($post_title)
		{
			$args = array(
				'post_type'   => 'auction-bidding',
				'post_status' => 'publish',
				'numberposts' => -1,
			);
			$posts               = get_posts($args);
			$unique_combinations = array();
			$count               = 0;
			foreach ($posts as $post) {
				$author_id = $post->post_author;
				if ($post->post_title === $post_title) {
					$combination = $post_title . '-' . $author_id;
					if (!in_array($combination, $unique_combinations)) {
						$unique_combinations[] = $combination;
						$count++;
					}
				}
			}
			return $count;
		}

		public static function get_post_list_by_post_type($post_type)
		{
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => -1,
				'post_status'    => 'publish',

			);
			$all_post = new \WP_Query($args);

			while ($all_post->have_posts()) {
				$all_post->the_post();
				$return_val[get_the_ID()] = get_the_title();
			}
			wp_reset_query();
			return $return_val;
		}

		public static function get_all_post_key($post_type)
		{
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => 6,
				'post_status'    => 'publish',

			);
			$all_post = new \WP_Query($args);

			while ($all_post->have_posts()) {
				$all_post->the_post();
				$return_val[] = get_the_ID();
			}
			wp_reset_query();
			return $return_val;
		}

		/**
		 * Get all taxonomy.
		 * @var string $taxonomy . give your taxonomy name.
		 * @return array $data_store . return taxonomy list with slug as key and name as value.
		 * */
		public static function get_taxonomy_list($taxonomy, $order = 'asc')
		{
			$args =  get_terms(array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,
				'order'      => $order,
			));

			$data_store = [];
			foreach ($args as $data) {
				$data_store[$data->slug] = $data;
			}
			return $data_store;
		}


		public static function get_all_brand($is_main_query = false)
		{
			$brands = get_terms('vehicle-brand');  // Get all brands.

			// echo "<pre>";
			// print_r($brands);

			if ($is_main_query) {
				return $brands;
			}
			$brand_options = [];
			foreach ($brands as $brand) {
				$brand_options[$brand->slug] = $brand->name;
			}

			return $brand_options;
		}

		// Get all brand key.
		public static function get_all_brand_key()
		{
			$brands =  get_terms(array(
				'taxonomy' => 'vehicle-brand',
				'number'   => 6,
			)); // Get all brands.

			$brand_options = [];

			foreach ($brands as $brand) {
				$brand_options[] = $brand->slug;
			}

			return $brand_options;
		}


		public static function get_all_location()
		{
			$locations        = get_terms('location');  // Get all location.
			$location_options = [];
			foreach ($locations as $location) {
				$location_options[$location->slug] = $location->name;
			}

			return $location_options;
		}

		// Get all location key.
		public static function get_all_location_key()
		{
			$locations =  get_terms(array(
				'taxonomy' => 'location',
				'number'   => 6,
			)); // Get all location.

			$location_options = [];

			foreach ($locations as $location) {
				$location_options[] = $location->slug;
			}

			return $location_options;
		}

		public static function get_all_body()
		{
			$body         = get_terms('body-type');  // Get all body type.
			$body_options = [];
			foreach ($body as $body) {
				$body_options[$body->slug] = $body->name;
			}

			return $body_options;
		}

		public static function get_all_body_key()
		{
			$body =  get_terms(
				array(
					'taxonomy' => 'body-type',
					'number'   => 6,
				)
			); // Get all body type.

			$body_options = [];

			foreach ($body as $body) {
				$body_options[] = $body->slug;
			}

			return $body_options;
		}

		public static function get_all_colors()
		{
			$colors        = get_terms('colors');  // Get all colors.
			$color_options = [];
			if (!empty($colors) && count($colors) > 0) {
				foreach ($colors as $color) {
					$color_options[$color->slug] = $color->name;
				}
			}
			return $color_options;
		}

		public static function get_all_year()
		{
			$years        = get_terms('vehicle-year');  // Get all years.
			$year_options = [];
			if (!empty($years) && count($years) > 0) {
				foreach ($years as $year) {
					$year_options[$year->slug] = $year->name;
				}
			}
			return $year_options;
		}

		public static function get_all_model()
		{
			$models        = get_terms('vehicle-model');  // Get all models.
			$model_options = [];
			if (!empty($models) && count($models) > 0) {
				foreach ($models as $model) {
					$model_options[$model->slug] = $model->name;
				}
			}
			return $model_options;
		}

		public static function get_all_cat()
		{

			$categorys =  get_terms('vehicle-category', array(
				'orderby' => 'name',
				'order'   => 'ASC',
			)); // Get all category with ASC order.
			$categorys_options = [];
			foreach ($categorys as $category) {
				$categorys_options[$category->slug] = $category->name;
			}

			return $categorys_options;
		}


		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.2.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Vehicle Option Value.
		 */
		public static function  egns_vehicle_auction_value($vehicle_id, $key)
		{
			$vehicle_options = get_post_meta($vehicle_id, 'egns_auction_metadata', true);
			if (!empty($vehicle_options[0]) && is_array($vehicle_options[0])) {
				return $vehicle_options[0][$key];
			} else {
				if (!empty($vehicle_options[$key])) {
					return $vehicle_options[$key];
				} else {
					return '';
				}
			}
		}



		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.2.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Vehicle Option Value.
		 */
		public static function  egns_vehicle_product_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$vehicle_options = get_post_meta(get_the_ID(), 'EGNS_VEHICLE_META_ID', true);

			if (isset($vehicle_options[$key1][$key2][$key3])) {
				return $vehicle_options[$key1][$key2][$key3];
			} elseif (isset($vehicle_options[$key1][$key2])) {
				return $vehicle_options[$key1][$key2];
			} elseif (isset($vehicle_options[$key1])) {
				return $vehicle_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.2.0
		 *
		 * @param string $key . Page Option id.
		 * 
		 * @return mixed Vehicle Option image Ids.
		 */
		public static function egns_vehicle_gallery($key)
		{
			$gallery_opt = self::egns_vehicle_product_value($key);  // for eg. 15,50,70,125
			return $gallery_ids = explode(',', $gallery_opt);
		}

		/**
		 * Return taxonomy name with link.
		 *
		 * @since 1.2.0
		 *
		 * @param string $taxonomy . give your taxonomy.
		 * 
		 * @param string $icon_class . give your icon class here.
		 * 
		 * @return mixed return taxonomy name with link.
		 */
		public static function term_with_link($icon_class, $taxonomy, $take = null)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);
			$count = 0;
			foreach ((array) $terms as $term):
				if ($take !== null && $take <= $count) {
					continue;
				}
				$count++;
?>
				<a href="<?php echo get_term_link($term->slug, $taxonomy) ?>"><i class="<?php echo $icon_class ?>"></i>
					<?php echo $term->name ?>
				</a>
			<?php endforeach;
		}

		//Get first location
		public static function get_first_location_link($icon_class, $taxonomy, $take = null)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);

			if ($terms ?? ''):

			?>
				<a href="<?php echo get_term_link($terms[0]->slug, $taxonomy) ?>"><i class="<?php echo $icon_class ?>"></i>
					<?php echo $terms[0]->name ?>
				</a>
			<?php

			endif;
		}

		/**
		 * Return taxonomy name with link.
		 *
		 * @since 1.2.0
		 *
		 * @param string $taxonomy . give your taxonomy.
		 * 
		 * @param string $icon_class . give your icon class here.
		 * 
		 * @return mixed return taxonomy name with link.
		 */
		public static function term_without_link($icon_class, $taxonomy)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);

			if ($terms ?? ''):
			?>

				<span><i class="<?php echo $icon_class ?>"></i>
					<?php
					foreach ((array) $terms as $term):
						echo $term->name;
					endforeach;
					?>
				</span>
<?php
			endif;
		}




		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.2.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Vehicle Option Value.
		 */
		public static function  egns_vehicle_brand_taxonomy($key1, $key2 = '', $key3 = '', $default = '')
		{

			$term = get_the_terms(get_the_ID(), 'vehicle-brand');
			if (!empty($term)) {
				$meta = get_term_meta($term[0]->term_id, 'drivco_brand_taxonomy', true);
				if (isset($meta[$key1][$key2][$key3])) {
					return $meta[$key1][$key2][$key3];
				} elseif (isset($meta[$key1][$key2])) {
					return $meta[$key1][$key2];
				} elseif (isset($meta[$key1])) {
					return $meta[$key1];
				} else {
					return $default;
				}
			}
		}



		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.2.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Vehicle Option Value.
		 */
		public static function  egns_vehicle_location_taxonomy($key1, $key2 = '', $key3 = '', $default = '')
		{

			$term = get_the_terms(get_the_ID(), 'location');
			$meta = get_term_meta($term[0]->term_id, 'drivco_location_taxonomy', true);

			if (isset($meta[$key1][$key2][$key3])) {
				return $meta[$key1][$key2][$key3];
			} elseif (isset($meta[$key1][$key2])) {
				return $meta[$key1][$key2];
			} elseif (isset($meta[$key1])) {
				return $meta[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.2.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Vehicle Option Value.
		 */
		public static function  egns_vehicle_body_taxonomy($key1, $key2 = '', $key3 = '', $default = '')
		{

			$term = get_the_terms(get_the_ID(), 'body-type');
			$meta = get_term_meta($term[0]->term_id, 'drivco_body_taxonomy', true);

			if (isset($meta[$key1][$key2][$key3])) {
				return $meta[$key1][$key2][$key3];
			} elseif (isset($meta[$key1][$key2])) {
				return $meta[$key1][$key2];
			} elseif (isset($meta[$key1])) {
				return $meta[$key1];
			} else {
				return $default;
			}
		}


		/**
		 * Return vehicle price with sale.
		 *
		 * @since 1.2.0
		 * 
		 * @return mixed Vehicle price Value.
		 */
		public static function get_vehicle_price()
		{
			$currency      = self::egns_vehicle_product_value('vehicle_currency_selector');
			$regular_price = self::egns_vehicle_product_value('vehicle_regular_price');
			$sale_price    = self::egns_vehicle_product_value('vehicle_discount_price');
			$currency_side = self::egns_vehicle_product_value('vehicle_currency_left_right_label');

			// Format prices
			$regular_price_formatted = number_format((int) $regular_price);
			$sale_price_formatted    = number_format((int) $sale_price);
			$currency_symbol         = sprintf(__('%s', 'drivco-core'), $currency);

			if (!empty($sale_price)) {
				if ($currency_side) {
					// Currency symbol after the price
					echo $sale_price_formatted . $currency_symbol;
					echo ' <del>' . $regular_price_formatted . $currency_symbol . '</del>';
				} else {
					// Currency symbol before the price
					echo $currency_symbol . $sale_price_formatted;
					echo ' <del>' . $currency_symbol . $regular_price_formatted . '</del>';
				}
			} else {
				if ($currency_side) {
					echo $regular_price_formatted . $currency_symbol;
				} else {
					echo $currency_symbol . $regular_price_formatted;
				}
			}
		}


		/**
		 * Return term link value.
		 *
		 * @since 1.2.0
		 * 
		 * @return mixed Post type option value.
		 */
		public static function get_any_term_link($taxonomy)
		{
			$term = get_the_terms(get_the_ID(), $taxonomy);
			if (!empty($term)) {
				$link = get_term_link($term[0]->slug, $taxonomy);
				return $link;
			}
		}

		/**
		 * filtering product by title
		 *
		 * @return void
		 */
		public static function get_product_lists()
		{
			$posts   = get_posts(['post_type' => 'product', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}
	} //End Main Class


}//end if
