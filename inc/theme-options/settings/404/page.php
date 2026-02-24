<?php


/*-------------------------------------------------------
		   ** 404 page options
	--------------------------------------------------------*/
CSF::createSection($prefix, array(
	'id'     => '404_page',
	'title'  => esc_html__('404 Page', 'drivco-core'),
	'icon'   => 'fa fa-exclamation-triangle',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('404 Page Options', 'drivco-core') . '</h3>',
		),
		array(
			'id'         => '404_title',
			'title'      => esc_html__('Title', 'drivco-core'),
			'type'       => 'text',
			'info'       => wp_kses(__('you can change <mark>404</mark> text of 404 page', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'	 => wp_kses(__("Opps, Page Not Found", 'drivco-core'), wp_kses_allowed_html('drivco-core')),

		),
		array(
			'id'         => '404_content',
			'title'      => esc_html__('Subtitle', 'drivco-core'),
			'type'       => 'textarea',
			'info'       => wp_kses(__('you can change <mark>Content</mark> text of 404 page', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'	 => esc_html__("Something went wrong, web page that is displayed to the user when the server cannot find the requested page.", 'drivco-core')
		),
		array(
			'id'      => '404_image',
			'type'    => 'media',
			'title'   => esc_html__('404 BG Image', 'drivco-core'),
			'library' => 'image',
			'default'				=> array(
				'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/error/404.svg'),
				'id'          => '404_image',
				'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/error/404.svg'),
				'alt'         => esc_attr('404 image'),
				'title'       => esc_html('404 image'),
			),
		),
		array(
			'id'         => '404_button_text',
			'title'      => esc_html__('Button Text', 'drivco-core'),
			'type'       => 'text',
			'info'       => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'	 => esc_html__('Back To Home', 'drivco-core')
		),

	)
));
