<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;

class Drivco_Compare_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_compare';
    }

    public function get_title()
    {
        return esc_html__('EG Vehicle Compare', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-layout-settings';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_compare_section_genaral',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_compare_style_selection',
            [
                'label'   => esc_html__('Select Compare Style', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'drivco-core'),
                    'style_two' => esc_html__('Style Two', 'drivco-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'drivco_compare_content_section',
            [
                'label' => esc_html__('Compare Product Slider', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_compare_products',
            [
                'label' => esc_html__('Compare Two Product', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name' => 'drivco_compare_post_list',
                        'label' => esc_html__('Select Vehicle One', 'drivco-core'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'label_block'   => true,
                        'options' => Egns_Core\Egns_Helper::get_post_list_by_post_type('vehicle'),
                    ],

                    [
                        'name' => 'drivco_compare_post_list2',
                        'label' => esc_html__('Select Vehicle Two', 'drivco-core'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'label_block'   => true,
                        'options' => Egns_Core\Egns_Helper::get_post_list_by_post_type('vehicle'),
                    ],


                ],
                'title_field' => '{{{ " Compare Vehicle" }}}',
            ]
        );

        $this->add_control(
            'drivco_compare_arrow_with_btn',
            [
                'label' => esc_html__('Show Arrow With Button', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'drivco_compare_btn_short_desc',
            [
                'label' => esc_html__('Short Description', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('There are Trending Car Available', 'drivco-core'),
                'condition' => [
                    'drivco_compare_arrow_with_btn' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'drivco_compare_btn_label',
            [
                'label' => esc_html__('Button Label', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View More', 'drivco-core'),
                'condition' => [
                    'drivco_compare_arrow_with_btn' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'drivco_compare_btn_link',
            [
                'label' => esc_html__('Button Link', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    // 'custom_attributes' => '',
                ],
                'condition' => [
                    'drivco_compare_arrow_with_btn' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();


        // =====================Style One=======================//


        //brand

        $this->start_controls_section(
            'drivco_compare_vehicle_brand',
            [
                'label' => esc_html__('Brand', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_compare_vehicle_brand_typ',
                'selector' => '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content span',
            ]
        );
        $this->add_control(
            'drivco_compare_vehicle_brand_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_compare_vehicle_brand_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_compare_vehicle_brand_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //vehicle_title

        $this->start_controls_section(
            'drivco_compare_vehicle_car_title',
            [
                'label' => esc_html__('Product Name', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_compare_vehicle_car_title_typ',
                'selector' => '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.title a',
            ]
        );
        $this->add_control(
            'drivco_compare_vehicle_car_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_car_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_compare_vehicle_car_title_margn',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_compare_vehicle_car_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //vehicle_price


        $this->start_controls_section(
            'drivco_compare_vehicle_car_price',
            [
                'label' => esc_html__('Product Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_compare_vehicle_car_price_typ',
                'selector' => '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.price',
            ]
        );
        $this->add_control(
            'drivco_compare_vehicle_car_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_compare_vehicle_car_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_compare_vehicle_car_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .single-car .content h6.price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //vehicle_seperator


        $this->start_controls_section(
            'drivco_compare_vehicle_car_seperator',
            [
                'label' => esc_html__('Vehicle Separetor', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_car_seperator_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .vs span' => 'color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_car_seperator_bg',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .vs span' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .vs span::after' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .compare-car-section .single-compare-card .compare-top .vs span::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //vehicle_title

        $this->start_controls_section(
            'drivco_compare_vehicle_car_button',
            [
                'label' => esc_html__('Compare Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_compare_vehicle_car_button_typ',
                'selector' => '{{WRAPPER}} .button.primary-btn2.compare_vehicle',
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_car_button_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button.primary-btn2.compare_vehicle' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_car_button_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button.primary-btn2.compare_vehicle:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //Modal Heading

        $this->start_controls_section(
            'drivco_compare_vehicle_modal_view',
            [
                'label' => esc_html__('Modal View', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_modal_view_color',
            [
                'label'     => esc_html__('Heading Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-modal .modal-header .modal-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Product Title Typography', 'drivco-core'),
                'name'     => 'drivco_compare_vehicle_modal_view_vehicle_title_typ',
                'selector' => '{{WRAPPER}} .compare-modal .modal-header .modal-title',
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_modal_view_vehicle_title_color',
            [
                'label'     => esc_html__('Product Title Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-modal .compare-top .single-car .content h6.title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_modal_view_vehicle_title_hover_color',
            [
                'label'     => esc_html__('Product Title Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-modal .compare-top .single-car .content h6.title a:hover' => 'color: {{VALUE}};',
                ],
                'separator' => 'after',

            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Product Price Typography', 'drivco-core'),
                'name'     => 'drivco_compare_vehicle_modal_view_vehicle_price_typ',
                'selector' => '{{WRAPPER}} .compare-modal .compare-top .single-car .content h6.price',
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_modal_view_vehicle_price_color',
            [
                'label'     => esc_html__('Product Price Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-modal .compare-top .single-car .content h6.price' => 'color: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );



        $this->add_control(
            'drivco_compare_vehicle_modal_view_vehicle_seperator_color',
            [
                'label'     => esc_html__('Product Seperator Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-modal .compare-top .vs span' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_control(
            'drivco_compare_vehicle_modal_view_vehicle_seperator_bg_color',
            [
                'label'     => esc_html__('Product Seperator BG Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .compare-modal .compare-top .vs span' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .compare-modal .compare-top .vs span::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .compare-modal .compare-top .vs span::after' => 'background-color: {{VALUE}};',

                ],
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'drivco_compare_vehicle_modal_view_vehicle__brand_color',
            [
                'label'     => esc_html__('Product Brand Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eg-table thead tr th' => 'color: {{VALUE}};',
                ],
                'separator' => 'after',

            ]
        );




        $this->add_control(
            'drivco_compare_vehicle_modal_view_vehicle__car_details_option_color',
            [
                'label'     => esc_html__('Product Details Labels', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eg-table tbody tr td strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_modal_view_vehicle__car_details_into_color',
            [
                'label'     => esc_html__('Product Details Information Text', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eg-table tbody tr td' => 'color: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );


        $this->end_controls_section();

        //vehicle_title

        $this->start_controls_section(
            'drivco_compare_vehicle_car_modal_buttons',
            [
                'label' => esc_html__('Modal Buttons', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_compare_vehicle_car_modal_buttons_typ',
                'selector' => '{{WRAPPER}} .button.primary-btn2.compare_vehicle',
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_car_modal_buttons_main_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_car_modal_buttons_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_car_modal_buttons_hover_text_color',
            [
                'label'     => esc_html__('Hover Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'drivco_compare_vehicle_car_modal_buttons_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button.primary-btn2.compare_vehicle:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();



        //bottom_part

        $this->start_controls_section(
            'drivco_compare_vehicle_bottom_part',
            [
                'label' => esc_html__('Bottom Area', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_control(
            'drivco_compare_vehicle_bottom_part_title_color',
            [
                'label'     => esc_html__('Title Text', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn-area p' => 'color: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_bottom_part_title_link_color',
            [
                'label'     => esc_html__('Link Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_bottom_part_title_link__border_color',
            [
                'label'     => esc_html__('Link Border Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn::after' => 'border: 1px solid {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_bottom_part_title_link__hvoer_color',
            [
                'label'     => esc_html__('Link Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn::after' => 'color: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_bottom_part_title_link__pagi_btn_bordr_color',
            [
                'label'     => esc_html__('Pagination Button Arrow Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group .slider-btn svg' => 'fill: {{VALUE}};',
                ],

            ]
        );


        $this->add_control(
            'drivco_compare_vehicle_bottom_part_title_link__pagi_btn_border_color',
            [
                'label'     => esc_html__('Pagination Button Border Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_bottom_part_title_link__pagi_hvoer_color',
            [
                'label'     => esc_html__('Pagination Button Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'drivco_compare_vehicle_bottom_part_title_link__pagi_hover_bg_color',
            [
                'label'     => esc_html__('Pagination Button Hover BG Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],

            ]
        );







        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $compare_sliders = $settings['drivco_compare_products'];


        $args = array(
            'post_type'      => 'vehicle',
            'offset'         => 0,
            'post_status'    => 'publish',
        );


?>

        <?php if (is_admin()) : ?>
            <script>
                // compare Car
                var swiper = new Swiper(".compare-car-slider", {
                    slidesPerView: 3,
                    speed: 1500,
                    spaceBetween: 25,
                    // loop: true,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-3",
                        prevEl: ".prev-3",
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 24,
                        },
                        1400: {
                            slidesPerView: 3
                        },
                    }
                });
            </script>
        <?php endif ?>


        <?php if ($settings['drivco_compare_style_selection'] == 'style_one') : ?>
            <div class="compare-car-section">
                <div class="modal compare-modal fade" id="compareModal01" tabindex="-1" aria-labelledby="compareModal01Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" id="vehicle_compare_data">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" id="loadID">
                        <div class="swiper compare-car-slider">
                            <div class="swiper-wrapper">

                                <?php
                                foreach ((array) $compare_sliders as $compare_slider) :
                                ?>
                                    <div class="swiper-slide">
                                        <div class="single-compare-card">
                                            <div class="compare-top">
                                                <?php

                                                $args = array(
                                                    'post_type'      => 'vehicle',
                                                    'post__in' => array($compare_slider['drivco_compare_post_list']),
                                                );
                                                $query = new \WP_Query($args);

                                                while ($query->have_posts()) :
                                                    $query->the_post();

                                                    $term = get_the_terms(get_the_ID(), 'vehicle-brand');

                                                ?>
                                                    <div class="single-car">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <div class="car-img">
                                                                <?php the_post_thumbnail('egns-thumb-cart') ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="content text-center">
                                                            <span>(<?php echo $term[0]->name ?>)</span>
                                                            <h6 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                                            <h6 class="price">
                                                                <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                <?php
                                                endwhile;
                                                wp_reset_postdata();
                                                ?>

                                                <?php if ($compare_slider['drivco_compare_post_list'] ?? '') : ?>
                                                    <div class="vs">
                                                        <span><?php echo esc_html__('VS', 'drivco-core') ?></span>
                                                    </div>
                                                <?php endif; ?>

                                                <?php

                                                $args = array(
                                                    'post_type'      => 'vehicle',
                                                    'post__in' => array($compare_slider['drivco_compare_post_list2']),
                                                );
                                                $query = new \WP_Query($args);

                                                while ($query->have_posts()) :
                                                    $query->the_post();

                                                    $term = get_the_terms(get_the_ID(), 'vehicle-brand');
                                                ?>
                                                    <div class="single-car">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <div class="car-img">
                                                                <?php the_post_thumbnail('egns-thumb-cart') ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="content text-center">
                                                            <span>(<?php echo $term[0]->name ?>)</span>
                                                            <h6 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                                            <h6 class="price">
                                                                <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                            </h6>
                                                        </div>
                                                    </div>

                                                <?php
                                                endwhile;
                                                wp_reset_postdata();
                                                ?>

                                            </div>
                                            <div class="compare-btm">
                                                <button type="button" value="<?php echo $compare_slider['drivco_compare_post_list'] . '_' . $compare_slider['drivco_compare_post_list2'] ?>" class="primary-btn2 compare_vehicle" data-bs-toggle="modal" data-bs-target="#compareModal01"><?php echo esc_html__('Compare Vehicles', 'drivco-core') ?></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($settings['drivco_compare_arrow_with_btn'] == 'yes') : ?>
                    <div class="row ">
                        <div class="col-lg-12 divider">
                            <div class="slider-btn-group style-2 justify-content-md-between justify-content-center">
                                <div class="slider-btn prev-3 d-md-flex d-none">
                                    <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="view-btn-area">
                                    <p><?php echo $settings['drivco_compare_btn_short_desc'] ?></p>
                                    <a class="view-btn" href="<?php echo $settings['drivco_compare_btn_link']['url'] ?>"><?php echo $settings['drivco_compare_btn_label'] ?></a>
                                </div>
                                <div class="slider-btn next-3 d-md-flex d-none">
                                    <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Compare_Widget());
