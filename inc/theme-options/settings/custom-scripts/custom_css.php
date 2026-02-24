<?php
/*-----------------------------------
		H Options
	------------------------------------*/

CSF::createSection($prefix, array(
    'parent' => 'custom_scripts',
    'title'  => esc_html__('Custom CSS', 'drivco-core'),
    'id'     => 'custom_css',
    'icon'   => 'fa fa-id-card-o',
    'fields' => array(

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS  ( All Device )', 'drivco-core'),
        ),
        array(
            'id'       => 'custom_css',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post.', 'drivco-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS  ( Medium Device or Ipad Pro )', 'drivco-core'),
        ),
        array(
            'id'       => 'custom_css_ipad',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post, when device width will be  minimum 1024px maximum 1366px.', 'drivco-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS  ( Medium Device or Tablet )', 'drivco-core'),
        ),
        array(
            'id'       => 'custom_css_tablet',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post, when device width will be  minimum 768px maximum 992px.', 'drivco-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),

        array(
            'type'    => 'subheading',
            'content' => esc_html__('Custom CSS  ( Mobile Device )', 'drivco-core'),
        ),
        array(
            'id'       => 'custom_css_mobile',
            'type'     => 'code_editor',
            'desc'     => esc_html__('Write custom css here with css selector. this css will be applied in all pages and post, when device width will be maximum 767px.', 'drivco-core'),
            'settings' => array(
                'mode'        => 'css',
                'theme'       => 'dracula',
                'tabSize'     => 4,
                'smartIndent' => true,
                'autocorrect' => true,
            ),
        ),
    ),

));
