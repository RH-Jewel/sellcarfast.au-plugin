<?php

/*------------------------
	Meta Id For Image
-------------------------*/
$image_prefix = '_egns_image';

/*-----------------------------------
    Post Format For Image Metabox Section.
------------------------------------*/
CSF::createMetabox(
	$image_prefix,
	array(
		'title'           => esc_html__('Post Settings', 'drivco-core'),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'post_formats'    => 'image',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);

/*-----------------------------------
    Post Formet Image
------------------------------------*/
CSF::createSection(
	$image_prefix,
	array(
		'title'  => esc_html__('Image Post Setting', 'drivco-core'),
		'fields' => array(
			array(
				'id'          => 'egns_thumb_images',
				'type'        => 'media',
				'title'       => esc_html__('Add Image Images', 'drivco-core'),
				'desc'        => esc_html__('Select Images For Image Post Format.', 'drivco-core'),
				'add_title'   => esc_html__('Add Images', 'drivco-core'),
				'edit_title'  => esc_html__('Edit Image', 'drivco-core'),
				'clear_title' => esc_html__('Remove Images', 'drivco-core'),
			),
		)
	)
);
