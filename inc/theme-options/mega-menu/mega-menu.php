<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Set a unique slug-like ID
    $prefix = 'mega_menu_options';


    // Create profile options
    CSF::createNavMenuOptions($prefix, array(
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));


    // Create a section
    CSF::createSection($prefix, array(
        'fields' => array(

            array(
                'id'      => 'drivco_mega_menu_switcher',
                'type'    => 'switcher',
                'title'   => esc_html__('Mega-Menu Enabled/Disabled', 'drivco-core'),
                'label'   => 'Do you want activate it ?',
                'default' => false
            ),
            array(
                'id'    => 'drivco_mega_menu_icon',
                'type'  => 'media',
                'title' =>  esc_html__('Menu Icon', 'drivco-core'),
                'dependency' => array('drivco_mega_menu_switcher', '==', 'true'),
            ),

            array(
                'id'    => 'drivco_mega_menu_class',
                'type'  => 'text',
                'title' => esc_html__('CSS Classes(For Megamenu)', 'drivco-core'),
                'dependency' => array('drivco_mega_menu_switcher', '==', 'true'),
            ),

        )
    ));
}
