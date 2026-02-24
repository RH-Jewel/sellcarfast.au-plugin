<?php

/*-----------------------------------
    PAGE FOOTER SECTION
------------------------------------*/
CSF::createSection(
	$prefix,
	array(
		'title'  => esc_html__('Page Footer', 'drivco-core'),
		'parent' => 'page_meta_option',
		'fields' => array(

			array(
				'type'    => 'subheading',
				'content' => esc_html__('Footer Options', 'drivco-core'),
			),
			array(
				'id'      => 'footer_widget_enable',
				'type'    => 'switcher',
				'title'   => esc_html__('Footer Widget Area', 'drivco-core'),
				'desc'    => esc_html__('If you want to show the footer widget area you can set here by ( YES / NO ).', 'drivco-core'),
				'default' => true,
			),
		)
	)
);
