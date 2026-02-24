<?php

/*-----------------------------------
    PAGE BARNER SECTION
------------------------------------*/
CSF::createSection(
	$prefix,
	array(
		'title'  => esc_html__('Breadcrumb', 'drivco-core'),
		'parent' => 'page_meta_option',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Breadcrumb Options', 'drivco-core'),
			),
			array(
				'id'      => 'breadcrumb_enable_page',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Breadcrumb', 'drivco-core'),
				'desc'    => esc_html__('If you want to show or hide page banner you can set here by toggle ( YES / NO ).', 'drivco-core'),
				'default' => true,
			),
			array(
				'id'              => 'breadcrumb_page_bg_image',
				'type'            => 'media',
				'title'           => esc_html__('Breadcrumb Background Image', 'drivco-core'),
				'desc'            => esc_html__('Set the banner background image', 'drivco-core'),
				'dependency'      => array('breadcrumb_enable_page', '==', 'true'),
			),

		)
	)
);
