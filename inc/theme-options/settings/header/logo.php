<?php
/*-----------------------------------
		Logo Options
	------------------------------------*/

CSF::createSection($prefix, array(
	'parent' => 'header_options',
	'title'  => esc_html__('Logo', 'drivco-core'),
	'id'     => 'theme_header_logo_options',
	'icon'   => 'fab fa-algolia',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Upload Logo', 'drivco-core') . '</h3>'
		),
		array(
			'id'      => 'header_logo',
			'title'   => esc_html__('Upload Header Logo', 'drivco-core'),
			'type'    => 'media',
			'desc'    => wp_kses(__('you can upload <mark>Header Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'	=> array(
				'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
				'id'          => 'logo',
				'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
				'alt'         => esc_attr('logo'),
				'title'       => esc_html('Logo'),
			),
		),
		array(
			'id'      => 'header_logo_mobile',
			'title'   => esc_html__('Upload Mobile Logo', 'drivco-core'),
			'type'    => 'media',
			'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'	=> array(
				'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
				'id'          => 'logo',
				'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/logo/logo.svg'),
				'alt'         => esc_attr('logo'),
				'title'       => esc_html('Logo'),
			),
		),
		array(
			'id'       => 'header_logo_dimensions',
			'type'     => 'dimensions',
			'title'    => 'Set Logo width & height',
			'output_important'   => true,
			'default'  => array(
				'width'  => '220',
				'height' => '',
				'unit'   => 'px',
			),
			'output' => array(
				'.top-bar .company-logo img',
				'.top-bar.style-2 .company-logo img',
				'header.style-3 .header-logo img',
				'header.style-4 .header-logo img',
				'.top-bar.style-5 .logo-and-menu .company-logo img',
				'.top-bar.style-6 .logo-and-menu .company-logo img',
			),
		),
	),

));
