<?php
if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
function egnsCustomStyling()
{
    $custom_css = "";
    $egns_theme_options = get_option('egns_theme_options');


    /**************************
     * Primary Color Start
     *************************/

    $primary_color = $egns_theme_options['primary_color'] ?? '';

    if (!empty($primary_color)) {
        $custom_css .= "
            :root{
                --primary-color1: $primary_color !important;
            }
        ";
    }
    /**************************
     * Primary Color End
     *************************/

    /**************************
     * Header Style Start 
     *************************/

    /************************** Header Style *************************/
    // $header_menu_color = $egns_theme_options['header_menu_color'] ?? '';
    // $header_menu_hover_color = $egns_theme_options['header_menu_hover_color'] ?? '';
    // $header_others_color = $egns_theme_options['header_others_color'] ?? '';

    // if (!empty($header_menu_color)) {
    //     $custom_css .= "
    //     header.style-1 .main-menu ul > li a,#app header .main-menu ul > li.has-mega-menu ul.sub-menu.row.mega-col-4 > li > a{
    //         color: $header_menu_color !important;
    //     }
    // ";
    // }

    // if (!empty($header_menu_hover_color)) {
    //     $custom_css .= "
    //     header.style-1 .main-menu ul > li.current-menu-parent > a, header.style-1 .main-menu ul > li.current-menu-item > a, header.style-1 .main-menu ul > li.current-menu-ancestor > a,header.style-1 .main-menu ul > li:hover > a{
    //         color: $header_menu_hover_color !important;
    //     }
    // ";
    // }


    // if (!empty($header_others_color)) {
    //     $custom_css .= "
    //     .top-bar .topbar-right ul li .sell-btn,.top-bar .topbar-right ul li a,header.style-1 .nav-right .modal-btn,header.style-1 .nav-right .hotline-area .content h6 a,header.style-1 .nav-right .hotline-area .content span{
    //         color: $header_others_color !important;
    //     }
    // ";
    // }
    // if (!empty($header_others_color)) {
    //     $custom_css .= "
    //     .top-bar .topbar-right ul li .sell-btn svg,.top-bar .topbar-right ul li a svg,.top-bar .topbar-right ul li a.primary-btn1 svg{
    //         fill: $header_others_color !important;
    //     }
    // ";
    // }

    /**************************
     * Header Style End
     *************************/

    /************************
     * Start Breadcrumb Style
     ************************/

    // Breadcrumb Title
    $breadcrumb_title = $egns_theme_options['breadcrumb_title_typography'] ?? '';

    $breadcrumb_title_font_family = $breadcrumb_title['font-family'] ?? '';
    $breadcrumb_title_font_size = $breadcrumb_title['font-size'] ?? '';
    $breadcrumb_title_text_transform = $breadcrumb_title['text-transform'] ?? '';
    $breadcrumb_title_text_align = $breadcrumb_title['text-align'] ?? '';
    $breadcrumb_title_color = $breadcrumb_title['color'] ?? '';

    if (!empty($breadcrumb_title_font_family)) {
        $custom_css .= "
        .inner-page-banner .banner-content h1{
            font-family: $breadcrumb_title_font_family " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_title_font_size)) {
        $custom_css .= "
        .inner-page-banner .banner-content h1{
            font-size: $breadcrumb_title_font_size" . 'px !important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_title_text_transform)) {
        $custom_css .= "
        .inner-page-banner .banner-content h1{
            text-transform: $breadcrumb_title_text_transform " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_title_text_align)) {
        $custom_css .= "
        .inner-page-banner .banner-content h1{
            text-align: $breadcrumb_title_text_align " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_title_color)) {
        $custom_css .= "
        .inner-page-banner .banner-content h1{
            color: $breadcrumb_title_color " . '!important' . ";
        }
    ";
    }

    // Breadcrumb Active 
    $breadcrumb_active = $egns_theme_options['breadcrumb_active_title_typography'] ?? '';

    $breadcrumb_active_font_family = $breadcrumb_active['font-family'] ?? '';
    $breadcrumb_active_font_size = $breadcrumb_active['font-size'] ?? '';
    $breadcrumb_active_text_transform = $breadcrumb_active['text-transform'] ?? '';
    $breadcrumb_active_text_align = $breadcrumb_active['text-align'] ?? '';
    $breadcrumb_active_color = $breadcrumb_active['color'] ?? '';

    if (!empty($breadcrumb_active_font_family)) {
        $custom_css .= "
        .inner-page-banner .breadcrumb-list li{
            font-family: $breadcrumb_active_font_family " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_active_font_size)) {
        $custom_css .= "
        .inner-page-banner .breadcrumb-list li{
            font-size: $breadcrumb_active_font_size" . 'px !important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_active_text_transform)) {
        $custom_css .= "
        .inner-page-banner .breadcrumb-list li{
            text-transform: $breadcrumb_active_text_transform " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_active_text_align)) {
        $custom_css .= "
        .inner-page-banner .breadcrumb-list li{
            text-align: $breadcrumb_active_text_align " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_active_color)) {
        $custom_css .= "
        .inner-page-banner .breadcrumb-list li{
            color: $breadcrumb_active_color " . '!important' . ";
        }
    ";
    }

    // Breadcrumb Review 
    $breadcrumb_review = $egns_theme_options['breadcrumb_review_typography'] ?? '';

    $breadcrumb_review_font_family = $breadcrumb_review['font-family'] ?? '';
    $breadcrumb_review_font_size = $breadcrumb_review['font-size'] ?? '';
    $breadcrumb_review_text_transform = $breadcrumb_review['text-transform'] ?? '';
    $breadcrumb_review_text_align = $breadcrumb_review['text-align'] ?? '';
    $breadcrumb_review_color = $breadcrumb_review['color'] ?? '';

    if (!empty($breadcrumb_review_font_family)) {
        $custom_css .= "
        .inner-page-banner .banner-content .customar-review > ul > li a .content ul li{
            font-family: $breadcrumb_review_font_family " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_review_font_size)) {
        $custom_css .= "
        .inner-page-banner .banner-content .customar-review > ul > li a .content ul li{
            font-size: $breadcrumb_review_font_size" . 'px !important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_review_text_transform)) {
        $custom_css .= "
        .inner-page-banner .banner-content .customar-review > ul > li a .content ul li{
            text-transform: $breadcrumb_review_text_transform " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_review_text_align)) {
        $custom_css .= "
        .inner-page-banner .banner-content .customar-review > ul > li a .content ul li{
            text-align: $breadcrumb_review_text_align " . '!important' . ";
        }
    ";
    }
    if (!empty($breadcrumb_review_color)) {
        $custom_css .= "
        .inner-page-banner .banner-content .customar-review > ul > li a .content ul li{
            color: $breadcrumb_review_color " . '!important' . ";
        }
        .inner-page-banner .banner-content .customar-review > ul > li::after{
            background-color: $breadcrumb_review_color " . '!important' . ";
        }
    ";
    }

    //Breadcrumb BG image
    $breadcrumb_background_img = $egns_theme_options['breadcrumb_bg_image']['url'] ?? '';

    if (!empty($breadcrumb_background_img)) {
        $custom_css .= "
        .inner-page-banner{
            background-image: url($breadcrumb_background_img), linear-gradient(#FAFAFA, #FAFAFA);
            background-size: cover;
            background-repeat: no-repeat;
        }
    ";
    }
    //Breadcrumb BG Color
    $breadcump_normal_color_background = $egns_theme_options['breadcump_normal_color_background'] ?? '';

    if (!empty($breadcump_normal_color_background)) {
        $custom_css .= "
        .inner-page-banner{
            background-color: $breadcump_normal_color_background;
        }
    ";
    }

    /*********************
     * End Breadcrumb
     *********************/

    /*********************
     * Footer Style
     *********************/

    //Footer Background Color
    $footer_widget_area_background_color = $egns_theme_options['footer_widget_area_background_color'] ?? '';

    if (!empty($footer_widget_area_background_color)) {
        $custom_css .= "
        footer{
            background-color: $footer_widget_area_background_color !important;
        }
    ";
    }
    //Footer Background Image
    $footer_widget_area_background_img = $egns_theme_options['footer_widget_area_background_img']['url'] ?? '';

    if (!empty($footer_widget_area_background_img)) {
        $custom_css .= "
        footer {
            background-image: url($footer_widget_area_background_img), linear-gradient(#1d1d1d, #1d1d1d) ;
            background-size: cover;
            background-repeat: no-repeat;
            overflow: hidden;
        }
    ";
    }
    //Footer Copyright Area Text Color
    $footer_copyright_area_text_color = $egns_theme_options['footer_copyright_area_text_color'] ?? '';

    if (!empty($footer_copyright_area_text_color)) {
        $custom_css .= "
        footer .footer-btm .copyright-area p {
                color: $footer_copyright_area_text_color !important;
            }
        ";
    }
    //Footer Copyright Area Link Color
    $footer_copyright_area_text_link_color = $egns_theme_options['footer_copyright_area_text_link_color'] ?? '';

    if (!empty($footer_copyright_area_text_link_color)) {
        $custom_css .= "
        footer .footer-btm .copyright-area p a {
                color: $footer_copyright_area_text_link_color !important;
            }
        ";
    }
    //Footer Copyright Area Link Hover
    $footer_copyright_area_text_link_hvr_color = $egns_theme_options['footer_copyright_area_text_link_hvr_color'] ?? '';

    if (!empty($footer_copyright_area_text_link_hvr_color)) {
        $custom_css .= "
        footer .footer-btm .copyright-area p a:hover {
                color: $footer_copyright_area_text_link_hvr_color !important;
            }
        ";
    }
    //Footer Bottom Social Icon
    $footer_btn_social_icon_color = $egns_theme_options['footer_btn_social_icon_color'] ?? '';

    if (!empty($footer_btn_social_icon_color)) {
        $custom_css .= "
        footer .footer-btm .social-area ul li a {
                color: $footer_btn_social_icon_color !important;
            }
        ";
    }
    //Footer Bottom Social Icon BG
    $footer_btn_social_icon_bg = $egns_theme_options['footer_btn_social_icon_bg'] ?? '';

    if (!empty($footer_btn_social_icon_bg)) {
        $custom_css .= "
        footer .footer-btm .social-area ul li a {
                border: 1px solid $footer_btn_social_icon_bg !important;
            }
        ";
    }
    //Footer Bottom Social Icon Hover
    $footer_btn_social_icon_hvr_color = $egns_theme_options['footer_btn_social_icon_hvr_color'] ?? '';

    if (!empty($footer_btn_social_icon_hvr_color)) {
        $custom_css .= "
        footer .footer-btm .social-area ul li a:hover {
                color: $footer_btn_social_icon_hvr_color !important;
            }
        ";
    }
    //Footer Bottom Social Icon BG Hover
    $footer_btn_social_icon_bg_hvr_color = $egns_theme_options['footer_btn_social_icon_bg_hvr_color'] ?? '';

    if (!empty($footer_btn_social_icon_bg_hvr_color)) {
        $custom_css .= "
        footer .footer-btm .social-area ul li a:hover {
                background-color: $footer_btn_social_icon_bg_hvr_color !important;
            }
        ";
    }


    //Footer Color Options
    $footer_heading_color = $egns_theme_options['footer_heading_color'] ?? '';
    $footer_others_color = $egns_theme_options['footer_others_color'] ?? '';

    if (!empty($footer_heading_color)) {
        $custom_css .= "
        footer .footer-widget .widget-title h5{
            color: $footer_heading_color !important;
        }
    ";
    }

    if (!empty($footer_others_color)) {
        $custom_css .= "
        footer .footer-widget .menu-container ul li a,footer .footer-center .contact-area .hotline-area .content span,footer .footer-btm .social-area h6,footer .footer-btm .copyright-area p,footer .footer-center ul li a{
            color: $footer_others_color !important;
        }
    ";
    }





    wp_register_style('egns-stylesheet', false);
    wp_enqueue_style('egns-stylesheet', false);
    wp_add_inline_style('egns-stylesheet', $custom_css, true);
}
if (class_exists('CSF')) {
    add_action('wp_enqueue_scripts', 'egnsCustomStyling');
}
