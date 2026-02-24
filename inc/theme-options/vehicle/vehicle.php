<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

  /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
  CSF::createMetabox(
    "EGNS_VEHICLE_META_ID",
    array(
      'id'              => 'vehicle_meta_option',
      'title'           => esc_html__('Add Vehicle custom informations', 'drivco-core'),
      'post_type'       => 'vehicle',
      'context'         => 'normal',
      'priority'        => 'high',
      'show_restore'    => true,
      'enqueue_webfont' => true,
      'async_webfont'   => false,
      'output_css'      => false,
      'nav'             => 'normal',
      'theme'           => 'dark',
    )
  );


  /*-----------------------------------
		REQUIRE META FILES
	------------------------------------*/

  // General Info
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('General Info', 'drivco-core'),
      'fields' => array(

        array(
          'id'          => 'vehicle_auction_or_not',
          'type'        => 'select',
          'title'       => esc_html__("Select Product Type", 'drivco-core'),
          'placeholder' => esc_html__("Select an option", 'drivco-core'),
          'options'     => array(
            'general_product'   => 'General Product',
            'auction_product'   => 'Auction Product',
            'simulcast_product' => 'Simulcast Product',
          ),
          'default' => 'general_product'
        ),

        // Auction Product fileds
        array(
          'id'          => 'vehicle_bidding_product',
          'type'        => 'select',
          'title'       => esc_html__('Select Auction Product', 'drivco-core'),
          'placeholder' => esc_html__('Select a Product', 'drivco-core'),
          'desc'        => wp_kses_post('Select a <mark>Product</mark> to continue. You can create a new product here ( <a href="' . home_url() . '/wp-admin/edit.php?post_type=product">Product</a> )'),
          'chosen'      => true,
          'options'    => 'posts',
          'query_args' => array(
            'post_type' => 'product',
            'tax_query' => array(
              array(
                'taxonomy' => 'product_type',
                'field'    => 'slug',
                'terms'    => 'auction',
              ),
            ),
          ),
          'dependency' => array('vehicle_auction_or_not', 'any', 'auction_product,simulcast_product'),
        ),
        // End Auction Content 

        // General Product fileds
        array(
          'id'         => 'vehicle_currency_or_label',
          'type'       => 'switcher',
          'title'      => esc_html__('Currency Or Call Price', 'drivco-core'),
          'label'      => 'Do you want price ?',
          'default'    => true,
          'dependency' => array(
            array('vehicle_auction_or_not', '==', 'general_product'),
          ),
        ),

        // General Product left right label
        array(
          'id'         => 'vehicle_currency_left_right_label',
          'type'       => 'switcher',
          'title'      => esc_html__('Currency On Right Side?', 'drivco-core'),
          'label'      => 'Currency On Right Side?',
          'default'    => false,
          'dependency' => array('vehicle_auction_or_not|vehicle_currency_or_label', '==|==', 'general_product|true'),
        ),

        array(
          'id'          => 'vehicle_currency_selector',
          'type'        => 'text',
          'title'       => esc_html__('Add Currency Symbol or Code', 'drivco-core'),
          'placeholder' => esc_html__('Input currency symbol or Code', 'drivco-core'),
          'default'     => '$',
          'dependency'  => array('vehicle_auction_or_not|vehicle_currency_or_label', '==|==', 'general_product|true'),
        ),

        array(
          'id'         => 'vehicle_regular_price',
          'type'       => 'number',
          'title'      => esc_html__('Regular Price', 'drivco-core'),
          'default'    => 34637,
          'dependency' => array(
            array('vehicle_currency_selector', '!=', ''),
            array('vehicle_auction_or_not', '==', 'general_product'),
            array('vehicle_currency_or_label', '==', 'true'),
          ),
        ),

        array(
          'id'         => 'vehicle_discount_price',
          'type'       => 'number',
          'title'      => esc_html__('Discount Price', 'drivco-core'),
          'default'    => 34020,
          'dependency' => array(
            array('vehicle_currency_selector', '!=', ''),
            array('vehicle_auction_or_not', '==', 'general_product'),
            array('vehicle_currency_or_label', '==', 'true'),
          ),
        ),

        array(
          'id'         => 'vehicle_price_call',
          'type'       => 'text',
          'title'      => esc_html__('Alternate Price', 'drivco-core'),
          'default'    => esc_html__('Call For Price', 'drivco-core'),
          'dependency' => array(
            array('vehicle_currency_or_label', '!=', 'true'),
          ),
        ),

        // A Subheading number
        array(
          'type'       => 'subheading',
          'content'    => esc_html__("Number", 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_contact_icon',
          'type'       => 'icon',
          'title'      => esc_html__('Add Icon', 'drivco-core'),
          'default'    => 'fas fa-phone-alt',
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_contact_label',
          'type'       => 'text',
          'title'      => esc_html__('Label', 'drivco-core'),
          'default'    => esc_html__('Show Number', 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_contact_number',
          'type'       => 'text',
          'title'      => esc_html__('Number', 'drivco-core'),
          'default'    => esc_html__("+990737621432", 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),

        // A Subheading E-mail
        array(
          'type'       => 'subheading',
          'content'    => esc_html__("E-mail", 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_email_icon',
          'type'       => 'icon',
          'title'      => esc_html__('Add Icon', 'drivco-core'),
          'default'    => 'fas fa-envelope',
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_email_label',
          'type'       => 'text',
          'title'      => esc_html__('Label', 'drivco-core'),
          'default'    => esc_html__('Email Now', 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_contact_email',
          'type'       => 'text',
          'title'      => esc_html__('E-mail', 'drivco-core'),
          'default'    => esc_html__("info@gmail.com", 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),

        // A Subheading Whatsapp
        array(
          'type'       => 'subheading',
          'content'    => esc_html__("WhatsApp", 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_whatsapp_icon',
          'type'       => 'icon',
          'title'      => esc_html__('Add Icon', 'drivco-core'),
          'default'    => 'fab fa-whatsapp',
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_whatsapp_label',
          'type'       => 'text',
          'title'      => esc_html__('Label', 'drivco-core'),
          'default'    => esc_html__('Whatsapp', 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'         => 'vehicle_whatsapp_number',
          'type'       => 'text',
          'title'      => esc_html__('Number', 'drivco-core'),
          'default'    => esc_html__("+990737621432", 'drivco-core'),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),
        array(
          'id'      => 'vehicle_whatsapp_link',
          'type'    => 'link',
          'title'   => esc_html__('Whatsapp Link', 'drivco-core'),
          'default' => array(
            'url'    => 'https://api.whatsapp.com/send?phone=990737621432&text=Hello this is the starting message',
            'target' => '_blank'
          ),
          'dependency' => array('vehicle_auction_or_not', '==', 'general_product'),
        ),


        // A Subheading
        array(
          'type'    => 'subheading',
          'content' => esc_html__("Thumb Content", 'drivco-core'),
        ),

        array(
          'id'      => 'vehicle_thumb_heading',
          'type'    => 'text',
          'title'   => esc_html__('Section Heading', 'drivco-core'),
          'default' => esc_html__('Car Image', 'drivco-core'),
        ),

        // Vehicles Exterior Gallery
        array(
          'id'          => 'vehicle_exterior_gallery',
          'type'        => 'gallery',
          'title'       => esc_html__('Vehicle Image Gallery', 'drivco-core'),
          'add_title'   => esc_html__('Add Gallery Images', 'drivco-core'),
          'edit_title'  => esc_html__('Edit Images', 'drivco-core'),
          'clear_title' => esc_html__('Remove Images', 'drivco-core'),
        ),

        // Vehicles Video Clip
        array(
          'id'      => 'vehicle_video_switcher',
          'type'    => 'switcher',
          'title'   => 'Switcher',
          'label'   => esc_html__('Do you want activate URL ?', 'drivco-core'),
          'default' => false
        ),
        array(
          'id'         => 'vehicle_video_clip',
          'type'       => 'media',
          'title'      => esc_html__('Video Clip', 'drivco-core'),
          'library'    => 'video',
          'preview'    => true,
          'dependency' => array('vehicle_video_switcher', '==', 'false'),
        ),

        array(
          'id'         => 'vehicle_video_clip_url',
          'type'       => 'text',
          'title'      => esc_html__('Input Embed Video URL', 'drivco-core'),
          'default'    => esc_url('https://www.youtube.com/embed/YIrR5uQuFlQ'),
          'dependency' => array('vehicle_video_switcher', '==', 'true'),
        ),

      ),
    )
  ); //End General Info


  // Key Car Info
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('Vehicle Info', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_info_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('Car Info', 'drivco-core'),
        ),


        // A Heading
        array(
          'type'    => 'heading',
          'content' => esc_html__('Mileage', 'drivco-core'),
        ),
        array(
          'id'      => 'vehicle_milage_info_icon',
          'type'    => 'media',
          'title'   => esc_html__('Add Icon', 'drivco-core'),
          'desc'    => esc_html__('use SVG icon for better view', 'drivco-core'),
          'library' => 'image',
          'default' => array(
            'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/mileage.svg'),
            'id'        => 'cs_step_icon',
            'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/mileage.svg'),
            'alt'       => esc_attr('Icon'),
            'title'     => esc_html('Icon'),
          ),
        ),
        array(
          'id'      => 'vehicle_milage_info_label',
          'type'    => 'text',
          'title'   => esc_html__('Label', 'drivco-core'),
          'default' => esc_html__('Mileage', 'drivco-core'),
        ),
        array(
          'id'      => 'vehicle_milage_info_value',
          'type'    => 'text',
          'title'   => esc_html__('Value', 'drivco-core'),
          'default' => esc_html__('25,100 miles', 'drivco-core'),
        ),

        // A Heading
        array(
          'type'    => 'heading',
          'content' => esc_html__('Engine', 'drivco-core'),
        ),
        array(
          'id'      => 'vehicle_engine_info_icon',
          'type'    => 'media',
          'title'   => esc_html__('Add Icon', 'drivco-core'),
          'desc'    => esc_html__('use SVG icon for better view', 'drivco-core'),
          'library' => 'image',
          'default' => array(
            'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/engine.svg'),
            'id'        => 'cs_step_icon',
            'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/engine.svg'),
            'alt'       => esc_attr('Icon'),
            'title'     => esc_html('Icon'),
          ),
        ),
        array(
          'id'      => 'vehicle_engine_info_label',
          'type'    => 'text',
          'title'   => esc_html__('Label', 'drivco-core'),
          'default' => esc_html__('Engine', 'drivco-core'),
        ),
        array(
          'id'      => 'vehicle_engine_info_value',
          'type'    => 'text',
          'title'   => esc_html__('Value', 'drivco-core'),
          'default' => esc_html__('22,231 cc', 'drivco-core'),
        ),

        // A Heading
        array(
          'type'    => 'heading',
          'content' => esc_html__('Fuel Type', 'drivco-core'),
        ),
        array(
          'id'      => 'vehicle_type_info_icon',
          'type'    => 'media',
          'title'   => esc_html__('Add Icon', 'drivco-core'),
          'desc'    => esc_html__('use SVG icon for better view', 'drivco-core'),
          'library' => 'image',
          'default' => array(
            'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/fuel.svg'),
            'id'        => 'cs_step_icon',
            'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/fuel.svg'),
            'alt'       => esc_attr('Icon'),
            'title'     => esc_html('Icon'),
          ),
        ),
        array(
          'id'      => 'vehicle_type_info_label',
          'type'    => 'text',
          'title'   => esc_html__('Label', 'drivco-core'),
          'default' => esc_html__('Fuel Type', 'drivco-core'),
        ),
        array(
          'id'          => 'vehicle_type_info_value',
          'type'        => 'select',
          'title'       => esc_html__('Select Value', 'drivco-core'),
          'placeholder' => esc_html__('Select Options', 'drivco-core'),
          'options'     => array(
            'Petrol'       => esc_html__('Petrol', 'drivco-core'),
            'Gas'          => esc_html__('Gas', 'drivco-core'),
            'Petrol + Gas' => esc_html__('Petrol + Gas', 'drivco-core'),
            'Electric'     => esc_html__('Electric', 'drivco-core'),
          ),
          'default' => 'Petrol + Gas',
        ),

        // A Heading
        array(
          'type'    => 'heading',
          'content' => esc_html__('Vehicle Condition', 'drivco-core'),
        ),
        array(
          'id'      => 'vehicle_condition_info_icon',
          'type'    => 'media',
          'title'   => esc_html__('Add Icon', 'drivco-core'),
          'desc'    => esc_html__('use SVG icon for better view', 'drivco-core'),
          'library' => 'image',
          'default' => array(
            'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/condition.svg'),
            'id'        => 'cs_step_icon',
            'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/condition.svg'),
            'alt'       => esc_attr('Icon'),
            'title'     => esc_html('Icon'),
          ),
        ),
        array(
          'id'      => 'vehicle_condition_info_label',
          'type'    => 'text',
          'title'   => esc_html__('Label', 'drivco-core'),
          'default' => esc_html__('Condition', 'drivco-core'),
        ),
        array(
          'id'          => 'vehicle_condition_info_value',
          'type'        => 'select',
          'title'       => esc_html__('Select Value', 'drivco-core'),
          'placeholder' => esc_html__('Select Options', 'drivco-core'),
          'options'     => array(
            'Brand New' => esc_html__('Brand New', 'drivco-core'),
            'Used Car'  => esc_html__('Used Car', 'drivco-core'),
          ),
          'default' => 'Brand New',
        ),
        array(
          'id'      => 'vehicle_condition_steering',
          'type'    => 'select',
          'title'   => esc_html__('Select Steering', 'drivco-core'),
          'options' => array(
            'left'  => esc_html__('Left', 'drivco-core'),
            'right' => esc_html__('Right', 'drivco-core'),
          ),
          'default' => 'left',
        ),
        // Edit Field if needed
        array(
          'id'            => 'vehicle_info_editor',
          'type'          => 'wp_editor',
          'title'         => esc_html__('Details Description', 'drivco-core'),
          'tinymce'       => true,
          'quicktags'     => true,
          'media_buttons' => true,
          'sanitize'      => false,
        ),

      ),
    )
  ); //End Car Info


  // Key Features
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('Key Features', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_key_feature_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('Key Features', 'drivco-core'),
        ),

        array(
          'id'     => 'vehicle_key_features',
          'type'   => 'repeater',
          'title'  => esc_html__('Features', 'drivco-core'),
          'fields' => array(
            array(
              'id'    => 'vehicle_key_feature',
              'type'  => 'text',
              'title' => esc_html__('Add Feature', 'drivco-core'),
            ),
          ),
          'default'   => array(
            array(
              'vehicle_key_feature' => esc_html__('Premium Wheel', 'drivco-core'),
            ),
            array(
              'vehicle_key_feature' => esc_html__('Front Heated Seats ', 'drivco-core'),
            ),
          )
        ),

        // Edit Field if needed
        array(
          'id'            => 'vehicle_key_features_editor',
          'type'          => 'wp_editor',
          'title'         => esc_html__('Details Description', 'drivco-core'),
          'tinymce'       => true,
          'quicktags'     => true,
          'media_buttons' => true,
          'sanitize'      => false,
        ),

      ),
    )
  ); //End Key Features


  // Overviews
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('Overviews', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_overviews_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('Overviews', 'drivco-core'),
        ),

        array(
          'id'     => 'vehicle_overview_items',
          'type'   => 'repeater',
          'title'  => esc_html__('Overviews', 'drivco-core'),
          'fields' => array(
            array(
              'id'    => 'vehicle_overview_label',
              'type'  => 'text',
              'title' => esc_html__('Label', 'drivco-core'),
            ),
            array(
              'id'    => 'vehicle_overview_value',
              'type'  => 'text',
              'title' => esc_html__('Value', 'drivco-core'),
            ),
          ),
          'default'   => array(
            array(
              'vehicle_overview_label' => esc_html__('Make', 'drivco-core'),
              'vehicle_overview_value' => esc_html__('lamborghini', 'drivco-core'),
            ),
            array(
              'vehicle_overview_label' => esc_html__('Model', 'drivco-core'),
              'vehicle_overview_value' => esc_html__('lamborghini ave11', 'drivco-core'),
            ),
          )


        ),

        // Edit Field if needed
        array(
          'id'            => 'vehicle_overview_editor',
          'type'          => 'wp_editor',
          'title'         => esc_html__('Details Description', 'drivco-core'),
          'tinymce'       => true,
          'quicktags'     => true,
          'media_buttons' => true,
          'sanitize'      => false,
        ),

      ),
    )
  ); //End Overviews

  // Engine Performance
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('Engine Performance', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_performance_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('Engine Performance', 'drivco-core'),
        ),

        array(
          'id'     => 'vehicle_performance_items',
          'type'   => 'repeater',
          'title'  => esc_html__('Overviews', 'drivco-core'),
          'fields' => array(
            array(
              'id'    => 'vehicle_performance_label',
              'type'  => 'text',
              'title' => esc_html__('Label', 'drivco-core'),
            ),
            array(
              'id'    => 'vehicle_performance_value',
              'type'  => 'text',
              'title' => esc_html__('Value', 'drivco-core'),
            ),
          ),
          'default'   => array(
            array(
              'vehicle_performance_label' => esc_html__('Induction', 'drivco-core'),
              'vehicle_performance_value' => esc_html__('Aspirated', 'drivco-core'),
            ),
            array(
              'vehicle_performance_label' => esc_html__('Engine Size', 'drivco-core'),
              'vehicle_performance_value' => esc_html__('3.5 L', 'drivco-core'),
            ),
          )

        ),

        // Edit Field if needed
        array(
          'id'            => 'vehicle_performance_editor',
          'type'          => 'wp_editor',
          'title'         => esc_html__('Details Description', 'drivco-core'),
          'tinymce'       => true,
          'quicktags'     => true,
          'media_buttons' => true,
          'sanitize'      => false,
        ),

      ),
    )
  ); //End Engine Performance


  // Vehicle Colors
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('Vehicles Colors', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_colors_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('Lamborghini Colors', 'drivco-core'),
        ),

        array(
          'id'          => 'vehicle_colors_gallery',
          'type'        => 'gallery',
          'title'       => esc_html__('Colors Image Gallery', 'drivco-core'),
          'add_title'   => esc_html__('Add Gallery Images', 'drivco-core'),
          'edit_title'  => esc_html__('Edit Images', 'drivco-core'),
          'clear_title' => esc_html__('Remove Images', 'drivco-core'),
        ),

      ),
    )
  ); //End Vehicle Colors 


  // Engine Vehicle Mileage
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('Vehicle Mileages', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_mileage_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('Lamborghini Mileage', 'drivco-core'),
        ),

        array(
          'id'     => 'vehicle_mileage_items',
          'type'   => 'repeater',
          'title'  => esc_html__('Vehicle Mileage', 'drivco-core'),
          'fields' => array(
            array(
              'id'    => 'vehicle_mileage_label',
              'type'  => 'text',
              'title' => esc_html__('Label', 'drivco-core'),
            ),
            array(
              'id'    => 'vehicle_mileage_value',
              'type'  => 'text',
              'title' => esc_html__('Value', 'drivco-core'),
            ),
          ),

          'default'   => array(
            array(
              'vehicle_mileage_label' => esc_html__('Petrol (Manual)', 'drivco-core'),
              'vehicle_mileage_value' => esc_html__('24.0 kmpl', 'drivco-core'),
            ),
            array(
              'vehicle_mileage_label' => esc_html__('Electric (Auto)', 'drivco-core'),
              'vehicle_mileage_value' => esc_html__('30.0 kmpl', 'drivco-core'),
            ),
          )


        ),

        // Edit Field if needed
        array(
          'id'            => 'vehicle_mileage_editor',
          'type'          => 'wp_editor',
          'title'         => esc_html__('Details Description', 'drivco-core'),
          'tinymce'       => true,
          'quicktags'     => true,
          'media_buttons' => true,
          'sanitize'      => false,
        ),

      ),
    )
  ); //End Vehicle Mileage


  // Map Vehicle Location 
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('Location', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_location_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('Location', 'drivco-core'),
        ),
        array(
          'id'       => 'vehicle_location',
          'type'     => 'code_editor',
          'title'    => esc_html__('Map iFrame Code', 'astrip'),
          'sanitize' => false,
          'desc'     => esc_html__('Enter embed map location', 'drivco-core'),
        ),


      ),
    )
  ); // Map Vehicle Location 




  // Vehicle car loan calculator 
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__('Car Loan Calculator', 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_car_loan_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('Financing Calculator', 'drivco-core'),
        ),

      ),
    )
  ); // Vehicle car loan calculator 


  // FAQ’s Question & Answer
  CSF::createSection(
    "EGNS_VEHICLE_META_ID",
    array(
      'parent' => 'vehicle_meta_option',
      'title'  => esc_html__("FAQ's Question & Answer", 'drivco-core'),
      'fields' => array(

        array(
          'id'      => 'vehicle_faqs_heading',
          'type'    => 'text',
          'title'   => esc_html__('Heading', 'drivco-core'),
          'default' => esc_html__('FAQ’s', 'drivco-core'),
        ),

        array(
          'id'     => 'vehicle_faqs_items',
          'type'   => 'repeater',
          'title'  => esc_html__('Question & Answer', 'drivco-core'),
          'fields' => array(
            array(
              'id'      => 'vehicle_faqs_question',
              'type'    => 'text',
              'title'   => esc_html__('Question', 'drivco-core'),
              'default' => esc_html__('How often should I get my car serviced?', 'drivco-core'),
            ),
            array(
              'id'      => 'vehicle_faqs_answer',
              'type'    => 'textarea',
              'title'   => esc_html__('Answer', 'drivco-core'),
              'default' => esc_html__("It's always a good idea to research and read reviews specific to the dealership you're interested in, as experiences can vary even within the same dealership chain.", 'drivco-core'),
            ),
          ),
          'default'   => array(
            array(
              'vehicle_faqs_question' => esc_html__('How often should I get my car serviced?', 'drivco-core'),
              'vehicle_faqs_answer'   => esc_html__("It's always a good idea to research and read reviews specific to the dealership you're interested in, as experiences can vary even within the same dealership chain.", 'drivco-core'),
            ),
            array(
              'vehicle_faqs_question' => esc_html__('How often should I get my car serviced?', 'drivco-core'),
              'vehicle_faqs_answer'   => esc_html__("It's always a good idea to research and read reviews specific to the dealership you're interested in, as experiences can vary even within the same dealership chain.", 'drivco-core'),
            ),
          )
        ),

      ),
    )
  ); //End FAQ’s Question & Answer




}
