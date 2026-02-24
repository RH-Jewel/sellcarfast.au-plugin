<?php


/*-------------------------------------------------------
		  ** General Options
	--------------------------------------------------------*/
// Create a simple general section
CSF::createSection($prefix, array(
  'title'  => esc_html__('General', 'drivco-core'),
  'id'     => 'general_options',
  'icon'   => 'fa fa-wrench',
  'fields' => array(
    array(
      'type'    => 'subheading',
      'content' => '<h3>' . esc_html__('RTL Options', 'drivco-core') . '</h3>'
    ),
    array(
      'id'      => 'rtl_enable',
      'title'   => esc_html__('LRT to RTL Convert', 'drivco-core'),
      'type'    => 'switcher',
      'desc'    => wp_kses(__('you can set <mark>ON / OFF</mark> to enable/disable LRT to RTL', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
      'default' => false,
    ),
    array(
      'type'    => 'subheading',
      'content' => '<h3>' . esc_html__('Preloader Options', 'drivco-core') . '</h3>'
    ),
    array(
      'id'      => 'preloader_enable',
      'title'   => esc_html__('Preloader', 'drivco-core'),
      'type'    => 'switcher',
      'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable preloader', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
      'default' => false,
    ),
    array(
      'id'      => 'preloader_logo',
      'title'   => esc_html__('Upload Preloader Logo', 'drivco-core'),
      'type'    => 'media',
      'desc'    => wp_kses(__('you can upload <mark>preloader logo</mark> here', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
      'default'  => array(
        'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/preloader/preloader-logo.svg'),
        'id'          => 'logo',
        'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/preloader/preloader-logo.svg'),
        'alt'         => esc_attr('logo'),
        'title'       => esc_html('Logo'),
      ),
      'dependency' => array('preloader_enable', '==', 'true'),
    ),

  )
));
