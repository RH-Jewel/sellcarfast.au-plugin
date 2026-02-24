<?php

/*-------------------------------------------------------
		  ** Breadcrumbs Options
	--------------------------------------------------------*/

CSF::createSection($prefix, array(
	'title'  => esc_html__('Breadcrumb', 'drivco-core'),
	'id'     => 'breadcrumb_options',
	'icon'   => 'fa fa-ellipsis-h',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Breadcrumb Options', 'drivco-core') . '</h3>'
		),
		array(
			'id'      => 'breadcrumb_enable',
			'title'   => esc_html__('Enable Breadcrumb', 'drivco-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default' => true,
		),
		array(
			'id'         => 'breadcrumb_title_typography',
			'type'       => 'typography',
			'title'      => esc_html__('Title Typography', 'drivco-core'),
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'         => 'breadcrumb_active_title_typography',
			'type'       => 'typography',
			'title'      => esc_html__('Navigation Typography', 'drivco-core'),
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'type'       => 'subheading',
			'content'    => '<h4>' . esc_html__('Breadcrumb Background', 'drivco-core') . '</h4>',
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'         => 'breadcrumb_bg_image',
			'type'       => 'media',
			'title'      => esc_html__('Background Image', 'drivco-core'),
			'desc'       => esc_html__('set the banner background image', 'drivco-core'),
			'dependency' => array('breadcrumb_enable', '==', 'true'),
			'default'    => array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/breadcrumb/breadcrumb-bg.jpg'),
				'id'        => 'breadcrumb-img',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/breadcrumb/breadcrumb-bg.jpg'),
				'alt'       => esc_attr('breadcrumb-img'),
				'title'     => esc_html('Breadcrumb'),
			),
		),
		array(
			'id'         => 'breadcump_normal_color_background',
			'type'       => 'color',
			'title'      => 'Background Color',
			'desc'       => esc_html__('set the banner background color', 'drivco-core'),
			'dependency' => array('breadcrumb_enable', '==', 'true'),
		),

		// Vehicle Single Page Options
		array(
			'type'       => 'subheading',
			'content'    => '<h4>' . esc_html__('Breadcrumb Vehicle Details', 'drivco-core') . '</h4>',
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'         => 'breadcrumb_priceShare_enable',
			'title'      => esc_html__('Enable Price & Share', 'drivco-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide product price & share', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => true,
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'         => 'breadcrumb_notify_label',
			'type'       => 'text',
			'title'      => esc_html__('Notify label', 'drivco-core'),
			'default'    => esc_html__('Notify me when price drops', 'drivco-core'),
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'         => 'breadcrumb_notify_form_header',
			'type'       => 'text',
			'title'      => esc_html__('Form Header label', 'drivco-core'),
			'default'    => esc_html__('Get Notify For Upcoming Car', 'drivco-core'),
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'         => 'breadcrumb_notify_form_short_desc',
			'type'       => 'text',
			'title'      => esc_html__('Form Short Description label', 'drivco-core'),
			'default'    => esc_html__('If you need to set up email want to receive notifications', 'drivco-core'),
			'dependency' => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),
		array(
			'id'          => 'breadcrumb_notify_shortcode',
			'type'        => 'textarea',
			'title'       => esc_html__('Notify Form', 'drivco-core'),
			'placeholder' => esc_html__('Add Form Shortcode here', 'drivco-core'),
			'default'     => '[contact-form-7 id="759fd92" title="upcomming-car"]',
			'dependency'  => array(
				array('breadcrumb_enable',  '==', 'true'),
			),
		),


	)
));
