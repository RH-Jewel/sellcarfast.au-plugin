<?php

/*-----------------------------------
PAGE MENU SECTION
------------------------------------*/
CSF::createSection(
    $prefix,
    array(
        'title'  => esc_html__('Page Header', 'drivco-core'),
        'parent' => 'page_meta_option',
        'fields' => array(
            //Page Header Options
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Header Options', 'drivco-core'),
            ),
            array(
                'id'            => 'page_main_header_enable',
                'type'          => 'select',
                'title'           => esc_html__('Main Header', 'drivco-core'),
                'desc'            => wp_kses(__('you can enable/disable <mark>Main Header </mark> for header section', 'drivco-core'), wp_kses_allowed_html('post')),
                'options'         => array(
                    'enable'          => esc_html('Enable'),
                    'disable'          => esc_html('Disable'),
                ),
                'default'       => 1
            ),
            array(
                'id'              => 'page_header_menu_style',
                'title'           => esc_html__('Select Style', 'drivco-core'),
                'type'            => 'image_select',
                'options'             => array(
                    'default'         => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/default.png'),
                    'header_one'      => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header1.png'),
                    'header_two'      => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header2.png'),
                    'header_three'    => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header3.png'),
                    'header_four'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header4.png'),
                    'header_five'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header5.png'),
                ),
                'desc'            => wp_kses(__('you can select <mark>Header Style </mark> for header section', 'drivco-core'), wp_kses_allowed_html('post')),
                'default'         => 'default',
                'dependency'    => array('page_main_header_enable', '==', 'enable'),
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header One)', 'drivco-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_one'),
            ),
            array(
                'id'      => 'page_header_one_logo',
                'title'   => esc_html__('Upload  Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_one'),
            ),
            array(
                'id'      => 'page_header_one_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_one'),
            ),
            array(
                'type'    => 'subheading',
                'content' => '<h4>' . esc_html__('Header Button', 'drivco-core') . '</h4>',
                'dependency'    => array('page_header_menu_style', '==', 'header_one'),
            ),
            array(
                'id'      => 'page_header_one_btn_ed',
                'type'    => 'select',
                'title'   => esc_html__('Header Button (enable/disable)', 'drivco-core'),
                'desc'    => esc_html__('If you want to show the header button, you can set here by ( Enable / Disable ).', 'drivco-core'),
                'options'     => array(
                    'enable'  => 'Enable',
                    'disable'  => 'Disable',
                ),
                'default'     => 'enable',
                'dependency'    => array('page_header_menu_style', '==', 'header_one'),
            ),

            // Two

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Two)', 'drivco-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_two'),
            ),
            array(
                'id'      => 'page_header_two_logo',
                'title'   => esc_html__('Upload  Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_two'),
            ),
            array(
                'id'      => 'page_header_two_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_two'),
            ),
            array(
                'type'    => 'subheading',
                'content' => '<h4>' . esc_html__('Header Contact Info', 'drivco-core') . '</h4>',
                'dependency'    => array('page_header_menu_style', '==', 'header_two'),
            ),
            array(
                'id'      => 'page_header_two_contact_info_enable',
                'type'    => 'switcher',
                'title'   => esc_html__('Header Contact Info (enable/disable)', 'drivco-core'),
                'desc'    => esc_html__('If you want to show the header contact info, you can set here by ( YES / NO ).', 'drivco-core'),
                'default' => true,
                'dependency'    => array('page_header_menu_style', '==', 'header_two'),
            ),

            // Three
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Three)', 'drivco-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_three'),
            ),
            array(
                'id'      => 'page_header_three_logo',
                'title'   => esc_html__('Upload  Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_three'),
            ),
            array(
                'id'      => 'page_header_three_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_three'),
            ),


            // Four
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Four)', 'drivco-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_four'),
            ),
            array(
                'id'      => 'page_header_four_logo',
                'title'   => esc_html__('Upload  Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_four'),
            ),
            array(
                'id'      => 'page_header_four_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_four'),
            ),


            // Five
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__('Upload Logo(Header Five)', 'drivco-core') . '</h3>',
                'dependency'    => array('page_header_menu_style', '==', 'header_five'),
            ),
            array(
                'id'      => 'page_header_five_logo',
                'title'   => esc_html__('Upload  Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark> Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_five'),
            ),
            array(
                'id'      => 'page_header_five_logo_mobile',
                'title'   => esc_html__('Upload Mobile Logo', 'drivco-core'),
                'type'    => 'media',
                'desc'    => wp_kses(__('you can upload <mark>Mobile Logo</mark> for header', 'drivco-core'), wp_kses_allowed_html('post')),
                'dependency'    => array('page_header_menu_style', '==', 'header_five'),
            ),


        ),
    )
);
