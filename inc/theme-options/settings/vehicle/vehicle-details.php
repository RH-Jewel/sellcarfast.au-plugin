<?php

/*-------------------------------------------------------
		   ** Vehicle Details options
	--------------------------------------------------------*/

CSF::createSection($prefix, array(
    'parent' => 'vehicle_options',
    'id'     => 'vehicle_details_options',
    'title'  => esc_html__('Details Vehicle', 'drivco-core'),
    'icon'   => 'fas fa-info-circle',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Vehicle Details Sidebar', 'drivco-core') . '</h3>'
        ),

        // Vehicle Details Sidebar
        array(
            'id'      => 'vehicle_inquiry_switcher',
            'type'    => 'switcher',
            'title'   => esc_html__('Inquiry Form', 'drivco-core'),
            'label'   => esc_html__('Do you want activate it ?', 'drivco-core'),
            'default' => true
        ),
        array(
            'id'    => 'vehicle_contact_form_heading',
            'type'  => 'text',
            'title' => esc_html__('Heading', 'drivco-core'),
            'default' => esc_html__('To More inquiry ', 'drivco-core'),
            'dependency' => array('vehicle_inquiry_switcher', '==', 'true'),
        ),
        array(
            'id'    => 'vehicle_contact_form_subheading',
            'type'  => 'textarea',
            'title' => esc_html__('Sub Heading', 'drivco-core'),
            'default' => esc_html__('If choose this car to contact easily with us.', 'drivco-core'),
            'dependency' => array('vehicle_inquiry_switcher', '==', 'true'),
        ),
        array(
            'id'    => 'vehicle_contact_form_shortcode',
            'type'  => 'textarea',
            'title' => esc_html__('Form Shortcode', 'drivco-core'),
            'default' => '[contact-form-7 id="83ea927" title="product inquiry form"]',
            'dependency' => array('vehicle_inquiry_switcher', '==', 'true'),
        ),
        array(
            'id'      => 'vehicle_rightside_recent_product',
            'type'    => 'switcher',
            'title'   => esc_html__('Recent product', 'drivco-core'),
            'label'   => 'Do you want Recent product ?',
            'default' => true,
            'dependency' => array('vehicle_inquiry_switcher', '==', 'true'),
        ),
        array(
            'id'     => 'vehicle_sidebar_banner',
            'type'   => 'repeater',
            'title'  => esc_html__('Add Sidebar banner', 'drivco-core'),
            'fields' => array(
                array(
                    'id'      => 'vehicle_banner_image',
                    'type'    => 'media',
                    'title'   => esc_html__('Add Image', 'drivco-core'),
                    'library' => 'image',
                ),
                array(
                    'id'       => 'vehicle_banner_image_link',
                    'type'     => 'link',
                    'title'    => esc_html__('Image Link', 'drivco-core'),
                    'default'  => array(
                        'url'    => '#',
                        'target' => '_blank'
                    ),
                ),
            ),
        ),
        array(
            'id'      => 'vehicle_related_switcher',
            'type'    => 'switcher',
            'title'   => esc_html__('Related Vehicle Product', 'drivco-core'),
            'label'   => esc_html__('Do you want activate it ?', 'drivco-core'),
            'default' => true
        ),
        array(
            'id'      => 'vehicle_related_sub_title',
            'type'    => 'text',
            'title'   => esc_html__('Sub Title', 'drivco-core'),
            'default' => esc_html__(' Similar Vehicle ', 'drivco-core'),
            'dependency' => array('vehicle_related_switcher', '==', 'true'),
        ),
        array(
            'id'      => 'vehicle_related_title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'drivco-core'),
            'default' => esc_html__('Similar Vehicle From This Brand', 'drivco-core'),
            'dependency' => array('vehicle_related_switcher', '==', 'true'),
        ),
    )
));
