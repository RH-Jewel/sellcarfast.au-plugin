<?php
/*-----------------------------------
		Header Options
	------------------------------------*/

CSF::createSection($prefix, array(
	'parent' => 'header_options',
	'title'  => esc_html__('Header Options', 'drivco-core'),
	'id'     => 'theme_header_options',
	'icon'   => 'fa fa-id-card-o',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Header Options', 'drivco-core') . '</h3>'
		),
		array(
			'id'      => 'header_menu_style',
			'title'   => esc_html__('Select Style', 'drivco-core'),
			'type'    => 'image_select',
			'options' => array(
				'header_one'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header1.png'),
				'header_two'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header2.png'),
				'header_three' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header3.png'),
				'header_four'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header4.png'),
				'header_five'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header5.png'),
			),
			'desc'    => wp_kses(__('you can select <mark>Header Style </mark> for header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default' => 'header_one',
		),

		/*************************** Header One *************************/

		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),

		// Search show Hide 
		array(
			'id'         => 'header_search_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Search', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),

		// Sell show Hide 
		array(
			'id'         => 'header_sell_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Sell Button', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'         => 'header_sell_label',
			'type'       => 'text',
			'title'      => esc_html__('Sell Button Label', 'drivco-core'),
			'default'    => esc_html__('SELL WITH US', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_sell_show',  '==|==', 'header_one|true'),
			),
		),
		array(
			'id'          => 'header_sell_form',
			'type'        => 'textarea',
			'title'       => esc_html__('Add Sell Form Shortcode', 'drivco-core'),
			'placeholder' => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'default'     => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'dependency'  => array(
				array('header_menu_style|header_sell_show',  '==|==', 'header_one|true'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Button Search', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'         => 'header_wishlist_label',
			'type'       => 'text',
			'title'      => esc_html__('Wishlist Button Label', 'drivco-core'),
			'default'    => esc_html__('SAVE', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_wishlist_show',  '==|==', 'header_one|true'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Button', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'         => 'header_signIn_label',
			'type'       => 'text',
			'title'      => esc_html__('SignIn/SignUp Button Label', 'drivco-core'),
			'default'    => esc_html__('Sign Up', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_signIn_show',  '==|==', 'header_one|true'),
			),
		),


		//Cart Button Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Cart & Contact Options', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),

		// Cart show Hide 
		array(
			'id'         => 'header_cart_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Mini Cart', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark> Mini Cart </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'         => 'header_cart_label',
			'type'       => 'text',
			'title'      => esc_html__('Mini Cart Label', 'drivco-core'),
			'default'    => esc_html__('Cart', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_cart_show',  '==|==', 'header_one|true'),
			),
		),

		// Button Enabel
		array(
			'id'         => 'header_one_button_enable',
			'title'      => esc_html__('Enable Contact', 'drivco-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
			),
		),
		array(
			'id'      => 'header_one_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'drivco-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
				array('header_one_button_enable',   '==', '1'),
			),

		),
		array(
			'id'         => 'header_one_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
				array('header_one_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_one_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'drivco-core'),
			'default'    => esc_html__('To More Inquiry', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
				array('header_one_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_one_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'drivco-core'),
			'default'    => esc_html__('+990-737 621 432', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_one'),
				array('header_one_button_enable',   '==', '1'),
			),
		),


		/*************************** Header Two *************************/

		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Search show Hide 
		array(
			'id'         => 'header_two_search_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Search', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Enquery Button Hide 
		array(
			'id'         => 'header_two_button_enable',
			'title'      => esc_html__('Enable Contact', 'drivco-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'      => 'header_two_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'drivco-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_two_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_two_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'drivco-core'),
			'default'    => esc_html__('To More Inquiry', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_two_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'drivco-core'),
			'default'    => esc_html__('+990-737 621 432', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_button_enable',   '==', '1'),
			),
		),
		/*************************** Header Two *************************/

		// Header Sidebar Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Sidebar Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		// Enquery Button Hide 
		array(
			'id'         => 'header_two_sidebar_button_enable',
			'title'      => esc_html__('Enable Contact', 'drivco-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'      => 'header_two_sidebar_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'drivco-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_sidebar_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_two_sidebar_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_sidebar_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_two_sidebar_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'drivco-core'),
			'default'    => esc_html__('To More Inquiry', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_sidebar_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_two_sidebar_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'drivco-core'),
			'default'    => esc_html__('+990-737 621 432', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
				array('header_two_sidebar_button_enable',   '==', '1'),
			),
		),
		// Header Bottom Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Bottom Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Slide Menu show Hide 
		array(
			'id'         => 'header_two_menu_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Slide Menu', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Mega Menu show Hide 
		array(
			'id'         => 'header_two_mega_menu_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Mega Menu', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		//Cart Button Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Cart & Button Options', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),

		// Cart show Hide 
		array(
			'id'         => 'header_two_cart_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Mini Cart', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark> Mini Cart </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'         => 'header_two_cart_label',
			'type'       => 'text',
			'title'      => esc_html__('Mini Cart Label', 'drivco-core'),
			'default'    => esc_html__('Cart', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_two_cart_show',  '==|==', 'header_two|true'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_two_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Button Search', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'         => 'header_two_wishlist_label',
			'type'       => 'text',
			'title'      => esc_html__('Wishlist Button Label', 'drivco-core'),
			'default'    => esc_html__('SAVE', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_two_wishlist_show',  '==|==', 'header_two|true'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_two_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Button', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_two'),
			),
		),
		array(
			'id'         => 'header_two_signIn_label',
			'type'       => 'text',
			'title'      => esc_html__('SignIn/SignUp Button Label', 'drivco-core'),
			'default'    => esc_html__('Sign Up', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_two_signIn_show',  '==|==', 'header_two|true'),
			),
		),



		/*************************** Header Three *************************/

		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),

		// Search show Hide 
		array(
			'id'         => 'header_three_search_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Small Device Search', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_three_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Button Search', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),
		array(
			'id'         => 'header_three_wishlist_label',
			'type'       => 'text',
			'title'      => esc_html__('Wishlist Button Label', 'drivco-core'),
			'default'    => esc_html__('SAVE', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_three_wishlist_show',  '==|==', 'header_three|true'),
			),
		),

		// Sell show Hide 
		array(
			'id'         => 'header_three_sell_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Sell Button', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),
		array(
			'id'         => 'header_three_sell_label',
			'type'       => 'text',
			'title'      => esc_html__('Sell Button Label', 'drivco-core'),
			'default'    => esc_html__('SELL WITH US', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_three_sell_show',  '==|==', 'header_three|true'),
			),
		),
		array(
			'id'          => 'header_three_sell_form',
			'type'        => 'textarea',
			'title'       => esc_html__('Add Sell Form Shortcode', 'drivco-core'),
			'placeholder' => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'default'     => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'dependency'  => array(
				array('header_menu_style|header_three_sell_show',  '==|==', 'header_three|true'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_three_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Button', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),
		array(
			'id'         => 'header_three_signIn_label',
			'type'       => 'text',
			'title'      => esc_html__('SignIn/SignUp Button Label', 'drivco-core'),
			'default'    => esc_html__('Sign Up', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_three_signIn_show',  '==|==', 'header_three|true'),
			),
		),

		//Header Bottom Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Bottom Options', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),

		// Search Filter show Hide 
		array(
			'id'         => 'header_three_search_filter_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Search Filter', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),

		// Enquery Button show Hide 
		array(
			'id'         => 'header_three_button_enable',
			'title'      => esc_html__('Enable Contact', 'drivco-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
			),
		),
		array(
			'id'      => 'header_three_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'drivco-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
				array('header_three_button_enable',   '==', '1'),
			),

		),
		array(
			'id'         => 'header_three_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
				array('header_three_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_three_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'drivco-core'),
			'default'    => esc_html__('To More Inquiry', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
				array('header_three_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_three_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'drivco-core'),
			'default'    => esc_html__('+990-737 621 432', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_three'),
				array('header_three_button_enable',   '==', '1'),
			),
		),



		/*************************** Header Four *************************/

		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// Slide Menu show Hide 
		array(
			'id'         => 'header_four_menu_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Slide Menu', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// Search show Hide 
		array(
			'id'         => 'header_four_search_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Search Icon', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Middle Search </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_four_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Icon', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_four_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Icon', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),

		// Enquery Button show Hide 
		array(
			'id'         => 'header_four_button_enable',
			'title'      => esc_html__('Enable Contact', 'drivco-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),
		array(
			'id'      => 'header_four_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'drivco-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_button_enable',   '==', '1'),
			),

		),
		array(
			'id'         => 'header_four_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_four_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'drivco-core'),
			'default'    => esc_html__('To More Inquiry', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_four_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'drivco-core'),
			'default'    => esc_html__('+990-737 621 432', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_button_enable',   '==', '1'),
			),
		),
		/*************************** Header Four *************************/

		// Header Sidebar Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Sidebar Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),

			),
		),
		// Enquery Button Hide 
		array(
			'id'         => 'header_four_sidebar_button_enable',
			'title'      => esc_html__('Enable Contact', 'drivco-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
			),
		),
		array(
			'id'      => 'header_four_sidebar_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'drivco-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_sidebar_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_four_sidebar_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_sidebar_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_four_sidebar_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'drivco-core'),
			'default'    => esc_html__('To More Inquiry', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_sidebar_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_four_sidebar_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'drivco-core'),
			'default'    => esc_html__('+990-737 621 432', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_four'),
				array('header_four_sidebar_button_enable',   '==', '1'),
			),
		),


		/*************************** Header Five *************************/


		// Header Top Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Top Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),

		// Wishlist show Hide 
		array(
			'id'         => 'header_five_wishlist_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Wishlist Button Search', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Wishlist </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'         => 'header_five_wishlist_label',
			'type'       => 'text',
			'title'      => esc_html__('Wishlist Button Label', 'drivco-core'),
			'default'    => esc_html__('SAVE', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_five_wishlist_show',  '==|==', 'header_five|true'),
			),
		),

		// Sell show Hide 
		array(
			'id'         => 'header_five_sell_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Sell Button', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header Sell </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'         => 'header_five_sell_label',
			'type'       => 'text',
			'title'      => esc_html__('Sell Button Label', 'drivco-core'),
			'default'    => esc_html__('SELL WITH US', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_five_sell_show',  '==|==', 'header_five|true'),
			),
		),

		array(
			'id'          => 'header_five_sell_form',
			'type'        => 'textarea',
			'title'       => esc_html__('Add Sell Form Shortcode', 'drivco-core'),
			'placeholder' => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'default'     => esc_html('[contact-form-7 id="3b498ea" title="Sell Car Form"]'),
			'dependency'  => array(
				array('header_menu_style|header_five_sell_show',  '==|==', 'header_five|true'),
			),
		),

		// Enquery Button show Hide 
		array(
			'id'         => 'header_five_button_enable',
			'title'      => esc_html__('Enable Contact', 'drivco-core'),
			'type'       => 'switcher',
			'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Button Options', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'default'    => true,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'      => 'header_five_contact_type',
			'type'    => 'radio',
			'title'   => esc_html__('Select Contact Type', 'drivco-core'),
			'options' => array(
				'number' => 'Number',
				'mail'   => 'E-mail',
				'others' => 'Others',
			),
			'default'    => 'number',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
				array('header_five_button_enable',   '==', '1'),
			),

		),
		array(
			'id'         => 'header_five_contact_icon',
			'type'       => 'media',
			'title'      => esc_html__('Contact Icon', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
				array('header_five_button_enable',   '==', '1'),
			),
			'default'	=> array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'id'        => 'content_icon',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icon/hotline-icon.svg'),
				'alt'       => esc_attr('content-icons'),
				'title'     => esc_html('Icon'),
			),
		),
		array(
			'id'         => 'header_five_contact_head_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Head label', 'drivco-core'),
			'default'    => esc_html__('To More Inquiry', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
				array('header_five_button_enable',   '==', '1'),
			),
		),
		array(
			'id'         => 'header_five_contact_label',
			'type'       => 'text',
			'title'      => esc_html__('Contact Value', 'drivco-core'),
			'default'    => esc_html__('+990-737 621 432', 'drivco-core'),
			'desc'       => wp_kses(__('write your <mark>text</mark> here', 'drivco-core'),  wp_kses_allowed_html('drivco-core')),
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
				array('header_five_button_enable',   '==', '1'),
			),
		),


		// Header Bottom Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Bottom Options ', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),


		//Cart Button Options
		array(
			'type'       => 'subheading',
			'content'    => '<h3>' . esc_html__('Header Cart & Login Options', 'drivco-core') . '</h3>',
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),

		// SignIn/SignUp show Hide 
		array(
			'id'         => 'header_five_signIn_show',
			'type'       => 'switcher',
			'title'      => esc_html__('SignIn/SignUp Button', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark>Header SignIn/SignUp </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'         => 'header_five_signIn_label',
			'type'       => 'text',
			'title'      => esc_html__('SignIn/SignUp Button Label', 'drivco-core'),
			'default'    => esc_html__('Sign Up', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_five_signIn_show',  '==|==', 'header_five|true'),
			),
		),

		// Cart show Hide 
		array(
			'id'         => 'header_five_cart_show',
			'type'       => 'switcher',
			'title'      => esc_html__('Mini Cart', 'drivco-core'),
			'desc'       => wp_kses(__('you can enable/disable <mark> Mini Cart </mark> from header section', 'drivco-core'), wp_kses_allowed_html('drivco-core')),
			'default'    => 1,
			'dependency' => array(
				array('header_menu_style',  '==', 'header_five'),
			),
		),
		array(
			'id'         => 'header_five_cart_label',
			'type'       => 'text',
			'title'      => esc_html__('Mini Cart Label', 'drivco-core'),
			'default'    => esc_html__('Cart', 'drivco-core'),
			'dependency' => array(
				array('header_menu_style|header_five_cart_show',  '==|==', 'header_five|true'),
			),
		),

		// Header Color options 
		// array(
		// 	'type'    => 'subheading',
		// 	'content' => '<h3>' . esc_html__('Header Elements Color ', 'drivco-core') . '</h3>',
		// ),
		// array(
		// 	'id'               => 'header_menu_color',
		// 	'type'             => 'color',
		// 	'title'            => esc_html__('Menu Color', 'drivco-core'),
		// 	'output_important' => true,
		// ),
		// array(
		// 	'id'               => 'header_menu_hover_color',
		// 	'type'             => 'color',
		// 	'title'            => esc_html__('Menu Hover & Active Color', 'drivco-core'),
		// 	'output_important' => true,
		// ),
		// array(
		// 	'id'               => 'header_others_color',
		// 	'type'             => 'color',
		// 	'title'            => esc_html__('Other Element Color', 'drivco-core'),
		// 	'output_important' => true,
		// ),
	),

));
