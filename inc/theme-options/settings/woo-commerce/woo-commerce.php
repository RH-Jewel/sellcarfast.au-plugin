<?php
if (class_exists('CSF')) {
    /*-------------------------------------------------------
		   ** WooCommerce page options
	--------------------------------------------------------*/
    CSF::createSection($prefix, array(
        'id'     => 'woocommerce_options',
        'title'  => esc_html__('WooCommerce', 'drivco-core'),
        'icon'   => 'fa fa-shopping-bag',
    ));


    // Create a section
    CSF::createSection($prefix, array(
        'parent'     => 'woocommerce_options',
        'id'    => 'woo_shop',
        'title'  => esc_html__('Shop Page', 'drivco-core'),
        'icon'   => 'fa fa-cart-plus',
        'fields' => array(

            array(
                'id'      => 'woo_sidebar',
                'type'    => 'switcher',
                'title'   => esc_html__('Shop Sidebar', 'drivco-core'),
                'label'   => 'Do you want activate it ?',
                'default' => true
            ),
            array(
                'id'          => 'shop_column',
                'type'        => 'select',
                'title'       => esc_html__('Shop product Column', 'drivco-core'),
                'placeholder' => 'Select an column',
                'options'     => array(
                    '2'  => 'Two column',
                    '3'  => 'Three column',
                    '4'  => 'Four column',
                ),
                'default'     => '3'
            ),

            array(
                'id'      => 'flash_sale_percentage',
                'type'    => 'switcher',
                'title'   => esc_html__('Show Percentage ', 'drivco-core'),
                'label'   => esc_html__('Show/Hide', 'drivco-core'),
                'default' => true
            ),

            array(
                'id'      => 'flash_sale',
                'type'    => 'switcher',
                'title'   => esc_html__('Flash Sale, Percentage Tag', 'drivco-core'),
                'label'   => esc_html__('Show/Hide', 'drivco-core'),
                'default' => true
            ),

        )
    ));
}
