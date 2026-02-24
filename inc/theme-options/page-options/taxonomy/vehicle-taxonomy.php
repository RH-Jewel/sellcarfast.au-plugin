<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'drivco_brand_taxonomy';


    // Create taxonomy options
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'vehicle-brand',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));


    // Create a section
    CSF::createSection($prefix, array(
        'fields' => array(

            array(
                'id'      => 'drivco_brand_feature',
                'type'    => 'text',
                'title'   => esc_html__('Add Featured Text', 'drivco-core'),
                'placeholder' => esc_html__('Best Deal!', 'drivco-core'),
                'desc' => esc_html__('If you want this brand as a featured !!!', 'drivco-core'),
            ),

            array(
                'id'      => 'drivco_brand_logo',
                'type'    => 'media',
                'title'   => esc_html__('Upload Brand Logo', 'drivco-core'),
                'desc'   => esc_html__('Original brand logo', 'drivco-core'),
                'library' => 'image',
            ),

            array(
                'id'      => 'drivco_brand_thumb',
                'type'    => 'media',
                'title'   => esc_html__('Upload Vehicle thumb', 'drivco-core'),
                'desc'   => esc_html__('Upload thumb image or svg', 'drivco-core'),
                'library' => 'image',
            ),

            array(
                'id'      => 'drivco_brand_image',
                'type'    => 'media',
                'title'   => esc_html__('Upload Vehicle image', 'drivco-core'),
                'desc'   => esc_html__('Upload vehicle image or svg', 'drivco-core'),
                'library' => 'image',
            ),

        )
    ));


    //location

    // Set a unique slug-like ID
    $prefix = 'drivco_location_taxonomy';


    // Create taxonomy options
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'location',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'fields' => array(

            array(
                'id'      => 'drivco_location_logo',
                'type'    => 'media',
                'title'   => esc_html__('Upload Location Logo', 'drivco-core'),
                'desc'   => esc_html__('Original Location logo', 'drivco-core'),
                'library' => 'image',
            ),

        )
    ));

    // Set a unique slug-like ID
    $prefix = 'drivco_body_taxonomy';


    // Create taxonomy options
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy'  => 'body-type',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'fields' => array(

            array(
                'id'      => 'drivco_body_logo',
                'type'    => 'media',
                'title'   => esc_html__('Upload Body Type Logo', 'drivco-core'),
                'desc'   => esc_html__('Original Body Type logo', 'drivco-core'),
                'library' => 'image',
            ),

        )
    ));
}
