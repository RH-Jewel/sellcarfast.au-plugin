<?php

function egns_core_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Footer Center Widget', 'drivco-core'),
		'id'            => 'footer_center',
		'before_widget' => '<div id="%1$s" class="footer-center %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer One Widget', 'drivco-core'),
		'id'            => 'footer_one',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s"><div class="menu-container">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Two Widget', 'drivco-core'),
		'id'            => 'footer_two',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s"><div class="menu-container">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Three Widget', 'drivco-core'),
		'id'            => 'footer_three',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s"><div class="menu-container">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Four Widget', 'drivco-core'),
		'id'            => 'footer_four',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s"><div class="menu-container">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Five Widget', 'drivco-core'),
		'id'            => 'footer_five',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s"><div class="app-download">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Shop Sidebar', 'drivco-core'),
		'id'            => 'shop_sidebar',
		'before_widget' => '<div id="%1$s" class="product-widget mb-20 %2$s"><div class="check-box-item">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h6 class="product-widget-title mb-20">',
		'after_title'   => '</h6></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Vehicle Sidebar', 'drivco-core'),
		'id'            => 'vehicle_sidebar',
		'before_widget' => '<div id="%1$s" class="%2$s"><div class="check-box-item">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"><h6 class="product-widget-title mb-20">',
		'after_title'   => '</h6></div>',
	));

}

add_action('widgets_init', 'egns_core_widgets_init');
