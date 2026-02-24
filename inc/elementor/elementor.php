<?php

namespace Egns_Core;

/**
 * All Elementor widget init
 * 
 * @since 1.2.0
 */

if (!defined('ABSPATH')) {
	exit(); // exit if access directly
}

if (!class_exists('Egns_Elementor')) {

	class Egns_Elementor
	{

		/*
		* $instance
		* @since 1.2.0
		* */
		private static $instance;

		/*
		* construct()
		* @since 1.2.0
		* */
		public function __construct()
		{

			add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));

			//elementor widget registered
			add_action('elementor/widgets/register', array($this, '_widget_registered'));
		}

		/*
	   * getInstance()
	   * @since 1.2.0
	   * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * _widget_categories()
		 * @since 1.2.0
		 * */
		public function _widget_categories($elements_manager)
		{
			$elements_manager->add_category(
				'drivco_widgets',
				[
					'title' => esc_html__('Drivco Widgets', 'drivco-core'),
					'icon'  => 'fa fa-plug',
				]
			);
		}


		/**
		 * _widget_registered()
		 * @since 1.2.0
		 * */
		public function _widget_registered()
		{

			if (!class_exists('Elementor\Widget_Base')) {
				return;
			}

			$elementor_widgets = array(
				'heading',
				'choose',
				'quick_link',
				'wellcome-banner',
				'inner-banner',
				'marquee_slider',
				'gallery',
				'contact-one',
				'contact-two',
				'why-drivco',
				'counter',
				'how-it-work',
				'testimonial',
				'hero-banner-one',
				'hero-banner-two',
				'hero-banner-three',
				'hero-banner-four',
				'hero-banner-five',
				'hero-banner-six',
				'review',
				'brand',
				'tab-vehicle',
				'vehicle-brand',
				'vehicle-category',
				'banner-two-slider',
				'blog',
				'vehicle-slider',
				'upcoming-vehicle',
				'vehicle-brand-grid',
				'price-filter-vehicle',
				'vehicle-location',
				'compare',
				'review-two',
				'faq',
				'vehicle-parts',
				'inquiry-form',
				'vehicle-special-offer',
			);

			$elementor_widgets = apply_filters('drivco_widgets', $elementor_widgets);

			if (is_array($elementor_widgets) && !empty($elementor_widgets)) {

				foreach ($elementor_widgets as $widget) {

					if (file_exists(EGNS_CORE_INC . '/elementor/widgets/class-' . $widget . '-elementor-widget.php')) {
						require_once EGNS_CORE_INC . '/elementor/widgets/class-' . $widget . '-elementor-widget.php';
					}
				}
			}
		}
	}
	if (class_exists('Egns_Elementor')) {
		Egns_Elementor::getInstance();
	}
}//end if