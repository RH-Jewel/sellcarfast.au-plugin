<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

  /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
  CSF::createMetabox(
    "EGNS_PROJECT_META_ID",
    array(
      'title'           => esc_html__('Project Details', 'drivco-core'),
      'post_type'       => 'project',
      'context'         => 'normal',
      'priority'        => 'high',
      'show_restore'    => true,
      'enqueue_webfont' => true,
      'async_webfont'   => false,
      'output_css'      => false,
      'nav'             => 'normal',
      'theme'           => 'dark',
      'id'              => 'project_meta_option',
    )
  );


  /*-----------------------------------
		REQUIRE META FILES
	------------------------------------*/

  CSF::createSection(
    "EGNS_PROJECT_META_ID",
    array(
      'parent' => 'project_meta_option',
      'title'  => esc_html__('Project Information', 'drivco-core'),
      'fields' => array(

        array(
          'id'    => 'project_gallery_image',
          'type'  => 'gallery',
          'title' => esc_html__('Project Gallery Image', 'drivco-core'),
          'desc' => esc_html__('Maximum Upload Three (03) Gallery Image', 'drivco-core'),
        ),

        array(
          'id'      => 'project_work_process_heading',
          'type'    => 'text',
          'title'   => esc_html__('Step Title', 'drivco-core'),
          'default' => esc_html__('Working Process', 'drivco-core'),
        ),

        array(
          'id'     => 'project_info_steps',
          'type'   => 'repeater',
          'title'  => esc_html__('Project Steps', 'drivco-core'),
          'fields' => array(

            array(
              'id'    => 'project_steps_icon',
              'type'  => 'media',
              'title' => esc_html__('Add Icon', 'drivco-core'),
              'library' => 'image',
              'default'        => array(
                'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/research.svg'),
                'id'          => 'cs_step_icon',
                'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/research.svg'),
                'alt'         => esc_attr('Icon'),
                'title'       => esc_html('Icon'),
              ),
            ),
            array(
              'id'    => 'project_steps_count',
              'type'  => 'text',
              'title' => esc_html__('Counting Text', 'drivco-core'),
              'default' => esc_html__('Step 01', 'drivco-core'),
            ),
            array(
              'id'    => 'project_steps_heading',
              'type'  => 'text',
              'title' => esc_html__('Step Heading', 'drivco-core'),
              'default' => esc_html__('Research', 'drivco-core'),
            ),
            array(
              'id'      => 'project_steps_info',
              'type'    => 'textarea',
              'title' => esc_html('Short Description'),
              'default' => wp_kses('Interdum et malesuada fames ac Etiam europeat nibh elementum, accumsan ona.', wp_kses_allowed_html('post'))
            ),

          ),
        ),


      ),
    )
  );


  // User Info 
  CSF::createSection(
    "EGNS_PROJECT_META_ID",
    array(
      'parent' => 'project_meta_option',
      'title'  => esc_html__('Project Conclusion', 'drivco-core'),
      'fields' => array(

        array(
          'id'    => 'project_conclusion_gallery',
          'type'  => 'gallery',
          'title' => esc_html__('Conclusion Gallery', 'drivco-core'),
        ),
        array(
          'id'    => 'project_conclusion_heading',
          'type'  => 'text',
          'title' => esc_html__('conclusion Heading', 'drivco-core'),
          'default' => esc_html__('Conclusion', 'drivco-core'),
        ),
        array(
          'id'      => 'project_conclusion_info',
          'type'    => 'textarea',
          'title' => esc_html('Short Description'),
          'default' => wp_kses('Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam eu nibh elementum, accumsan ona neque ac, aliquet nunc. In eu ipsum fringilla, accumsan purus vel, pellentesque risus. Vivamus vehicula nl purus at eros interdum, in dignissim nulla vestibulum.', wp_kses_allowed_html('post'))
        ),

      ),
    )
  );



  // User Info 
  CSF::createSection(
    "EGNS_PROJECT_META_ID",
    array(
      'parent' => 'project_meta_option',
      'title'  => esc_html__('Project Info List', 'drivco-core'),
      'fields' => array(

        array(
          'id'     => 'project_right_info',
          'type'   => 'repeater',
          'title'  => esc_html__('List Item', 'drivco-core'),
          'fields' => array(

            array(
              'id'      => 'user_subtitle',
              'type'    => 'text',
              'title'   => esc_html__('Label', 'drivco-core'),
              'default' => esc_html__('Client:', 'drivco-core'),
            ),
            array(
              'id'      => 'user_title',
              'type'    => 'text',
              'title'   => esc_html__('Value', 'drivco-core'),
              'default' => esc_html__('Argova Josen', 'drivco-core'),
            ),

          ),
        ),


      ),
    )
  );

  // Banner info 
  CSF::createSection(
    "EGNS_PROJECT_META_ID",
    array(
      'parent' => 'project_meta_option',
      'title'  => esc_html__('Project Banner', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'project_banner_title',
          'type'    => 'text',
          'title'   => esc_html__('Title', 'drivco-core'),
          'default' => esc_html__('Argova Josen', 'drivco-core'),
        ),
        array(
          'id'      => 'project_banner_button',
          'type'    => 'text',
          'title'   => esc_html__('Button Text', 'drivco-core'),
          'default' => esc_html__('Get a quote', 'drivco-core'),
        ),
        array(
          'id'    => 'project_banner_button_link',
          'type'  => 'link',
          'title' => esc_html__('Button Link', 'drivco-core'),
          'default'  => array(
            'url'    => '#',
            'text'   => 'Banner URL',
            'target' => '_blank'
          ),
        ),
        array(
          'id'    => 'project_banner_bg',
          'type'  => 'media',
          'title' => esc_html__('Add Banner BG', 'drivco-core'),
          'library' => 'image',
          'default'        => array(
            'url'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/research.svg'),
            'id'          => 'cs_step_icon',
            'thumbnail'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/research.svg'),
            'alt'         => esc_attr('Icon'),
            'title'       => esc_html('Icon'),
          ),
        ),

      ),
    )
  );
}
