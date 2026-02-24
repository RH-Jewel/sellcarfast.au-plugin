<?php

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if (class_exists('CSF')) {

    /*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
    CSF::createMetabox(
        "EGNS_PRODUCT_META_ID",
        array(
            'id'              => 'product_meta_option',
            'title'           => esc_html__('Specification', 'drivco-core'),
            'post_type'       => 'product',
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

    CSF::createSection(
        "EGNS_PRODUCT_META_ID",
        array(
            'parent' => 'product_meta_option',
            'fields' => array(

                array(
                    'id'      => 'product_tab_heading',
                    'type'    => 'text',
                    'title'   => esc_html__('Tab Title', 'drivco-core'),
                    'default' => esc_html__('Specification', 'drivco-core'),
                ),

                array(
                    'id'     => 'product_tab_content',
                    'type'   => 'repeater',
                    'title'  => esc_html__('Tab Contents', 'drivco-core'),
                    'fields' => array(
                        array(
                            'id'    => 'product_tab_content_label',
                            'type'  => 'text',
                            'title' => esc_html__('Label', 'drivco-core'),
                            'default' => esc_html__('Step 01', 'drivco-core'),
                        ),
                        array(
                            'id'      => 'product_tab_content_value',
                            'type'    => 'textarea',
                            'title' => esc_html('Description'),
                            'default' => wp_kses('Interdum et malesuada fames ac Etiam europeat nibh elementum, accumsan ona.', wp_kses_allowed_html('post'))
                        ),

                    ),
                    'default'   => array(
                        array(
                            'product_tab_content_label' => esc_html__('Brand', 'drivco-core'),
                            'product_tab_content_value' => esc_html__('Pyhodi', 'drivco-core'),
                        ),
                    )
                ),

            ),
        )
    );


    
}
