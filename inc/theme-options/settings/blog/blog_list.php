<?php
/*-------------------------------------------------------
		  ** Blog Page  Options
	--------------------------------------------------------*/

CSF::createSection($prefix, array(
	'parent' => 'blog_settings',
	'id'     => 'blog_post_options',
	'title'  => esc_html__('Blog Post', 'drivco-core'),
	'icon'   => 'fa fa-list-ul',
	'fields' => array(
		array(
			'id'         => 'blog_layout_options',
			'title'      => esc_html__('Blog Layout', 'drivco-core'),
			'type'       => 'image_select',
			'options'    => array(
				'standard'	=> EGNS_CORE_THEME_OPTIONS_IMAGES . '/blog/standard.png',
				'grid'		=> EGNS_CORE_THEME_OPTIONS_IMAGES . '/blog/grid_side.jpg',
			),
			'default'    => 'standard',
			'desc'       => wp_kses(__('you can set <mark>blog layout design</mark> from blog page', 'drivco-core'), wp_kses_allowed_html('post')),
		),
	),

));
