<?php

/*-------------------------------------------------------
		   ** Color  Options
	--------------------------------------------------------*/
CSF::createSection($prefix, array(
	'id'     => 'color_options',
	'title'  => esc_html__('Color Options', 'drivco-core'),
	'icon'   => 'fa fa-tint',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Color Options', 'drivco-core') . '</h3>',
		),

		array(
			'id'      => 'primary_color',
			'type'    => 'color',
			'title'   => esc_html__('Website primary Color', 'drivco-core'),
			'desc'    => wp_kses(__("Change Your Website's Color Scheme", 'drivco-core'), wp_kses_allowed_html('drivco-core')),
		),
	)
));
