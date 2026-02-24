<?php
/*-------------------------------------------------------
		   ** Footer  Options
	--------------------------------------------------------*/
CSF::createSection($prefix, array(
	'title'  => esc_html__('Footer', 'drivco-core'),
	'id'     => 'footer_options',
	'icon'   => 'fa fa-copyright',
	'fields' => array(

		//------------------------- Footer Options--------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Options', 'drivco-core') . '</h3>'
		),

		array(
			'id'      => 'footer_widget_area_background_color',
			'type'    => 'color',
			'title'   => 'Footer Background Color',
			'desc'    	=> wp_kses(__('you can select <mark>Footer Background Color </mark> for footer section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
		),
		array(
			'id'      => 'footer_widget_area_background_img',
			'title'   => esc_html__('Footer Background Image', 'drivco-core'),
			'type'    => 'media',
			'desc'    	=> wp_kses(__('you can select <mark>Footer Background Image </mark> for footer section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'	=> array(
				'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-bg.png'),
				'id'          => 'footer-bg',
				'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-bg.png'),
				'alt'         => esc_attr('footer-bg'),
				'title'       => esc_html('footer-bg'),
			),
		),



		//------------------------- Footer Copyright Area Text--------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Copyright Area', 'drivco-core') . '</h3>'
		),

		array(
			'id'    => 'copyright_text',
			'title' => esc_html__('Copyright Area Text', 'drivco-core'),
			'desc'  => wp_kses(__('write your <mark>Footer Copyright Text</mark> here', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'type'  => 'textarea',
			'default' => wp_kses(('Copyright 2024 <a href="#">DRIVCO</a> | Design By <a href="https://www.egenslab.com/">Egens Lab</a>'), wp_kses_allowed_html('drivco-core')),
		),

		//------------------------- Footer Social Link--------------------------//
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Social Links', 'drivco-core') . '</h3>'
		),
		array(
			'id'      => 'footer_social_enable',
			'title'   => esc_html__('Enable Social Links', 'drivco-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Social Links Options', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'default' => true,
		),
		array(
			'id'      => 'footer_bottom_social_head',
			'type'    => 'text',
			'title'   => esc_html__('Social Heading', 'drivco-core'),
			'default' => esc_html__('Follow Drivco:', 'drivco-core'),
			'dependency' => array(
				array('footer_social_enable', '==', 'true'),
			),
		),
		array(
			'id'     => 'footer_bottom_social',
			'type'   => 'repeater',
			'title'  => esc_html__('Social Links', 'drivco-core'),
			'dependency' => array(
				array('footer_social_enable', '==', 'true'),
			),
			'fields' => array(
				array(
					'id'      => 'footer_social_icon_class',
					'type'    => 'icon',
					'title'   =>  esc_html('Icon Class ( Bootstrap/Box Icon/Font Awesome )'),
					'default' => 'fa fa-heart'
				),
				array(
					'id'    => 'footer_social_icon_url',
					'type'  => 'link',
					'title' => esc_html__('Social Link', 'drivco-core'),
					'default'  => array(
						'url'    => '#',
						'target' => '_blank'
					),
				),
			),
			'default'   => array(
				array(
					'footer_social_icon_url' => array(
						'url'   => esc_url('https://www.facebook.com/'),
						'target' => '_blank'
					),
					'footer_social_icon_class' => 'fab fa-facebook-f',
				),
				array(
					'footer_social_icon_url' => array(
						'url'   => esc_url('https://twitter.com/'),
						'target' => '_blank'
					),
					'footer_social_icon_class' => 'fab fa-twitter',
				),
				array(
					'footer_social_icon_url' => array(
						'url'   => esc_url('https://www.linkedin.com/'),
						'target' => '_blank'
					),
					'footer_social_icon_class' => 'fab fa-linkedin-in',
				),
				array(
					'footer_social_icon_url' => array(
						'url'   => esc_url('https://www.instagram.com/'),
						'target' => '_blank'
					),
					'footer_social_icon_class' => 'fab fa-instagram',
				),
			)
		),
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Footer Color Options', 'drivco-core') . '</h3>'
		),
		array(
			'id'    => 'footer_heading_color',
			'type'  => 'color',
			'title' => esc_html__('Footer Heading Color', 'drivco-core'),
		),
		array(
			'id'    => 'footer_others_color',
			'type'  => 'color',
			'title' => esc_html__('Footer Element Color', 'drivco-core'),
		),

	)
));
