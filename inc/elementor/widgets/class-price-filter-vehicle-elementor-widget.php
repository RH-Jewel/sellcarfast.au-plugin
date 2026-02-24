<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core;
use Egns_Core\Egns_Helper;
use Elementor\core\Schemes;

class Drivco_Price_Filter_Vehicle_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_price_filter_vehicle';
    }

    public function get_title()
    {
        return esc_html__('EG Price Filter Vehicle', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-product-images';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================Vehicle Brand Widget =======================//

        $this->start_controls_section(
            'drivco_price_filter_vehicle_repeater',
            [
                'label' => esc_html__('Filter Vehicles Price', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_price_filter_pagination_show',
            [
                'label' => esc_html__('Show Pagination', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_price_filter_vehicle_repeater_tab_name',
            [
                'label' => esc_html__('Tab Name', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('01-06 Lakhs', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'drivco_vehicle_product_price_filter',
            [
                'label'             => esc_html__('Select Products', 'drivco-core'),
                'type'              => \Elementor\Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => Egns_Core\Egns_Helper::get_post_list_by_post_type('vehicle'),
                'default'           => Egns_Core\Egns_Helper::get_all_post_key('vehicle'),
            ]
        );


        $repeater->add_control(
            'drivco_vehicle_brand_grid_order',
            [
                'label'   => esc_html__('Order', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'drivco-core'),
                    'desc' => esc_html__('Descending', 'drivco-core')
                ],
                'default' => 'desc',
            ]
        );

        $repeater->add_control(
            'drivco_vehicle_brand_grid_general_order_by',
            [
                'label'   => esc_html__('Order By', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'drivco-core'),
                    'author'     => esc_html__('Post Author', 'drivco-core'),
                    'title'      => esc_html__('Title', 'drivco-core'),
                    'post_date'  => esc_html__('Date', 'drivco-core'),
                    'rand'       => esc_html__('Random', 'drivco-core'),
                    'menu_order' => esc_html__('Menu Order', 'drivco-core'),
                ],
            ]
        );

        $repeater->add_control(
            'drivco_vehicle_brand_grid_general_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'drivco-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'price_filter_list',
            [
                'label' => esc_html__('Price Filter', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_price_filter_vehicle_repeater_tab_name' => esc_html__('01-06 Lakhs', 'drivco-core'),

                    ],
                    [
                        'drivco_price_filter_vehicle_repeater_tab_name' => esc_html__('07-12 Lakhs', 'drivco-core'),

                    ],
                ],
                'title_field' => '{{{ drivco_price_filter_vehicle_repeater_tab_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'drivco_price_filter_vehicle_button',
            [
                'label' => esc_html__('Button', 'drivco-core')
            ]
        );
        $this->add_control(
            'drivco_vehicle_brand_grid_button_text',
            [
                'label' => esc_html__('Button  Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('View Details', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();



        //tab_text
        $this->start_controls_section(
            'drivco_vehicle_price_filter_tab',
            [
                'label' => esc_html__('Tab', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_price_filter_tab_typ',
                'selector' => '{{WRAPPER}} .home6-filter-area .nav-tabs .nav-item .nav-link',
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_tab_color',
            [
                'label'     => esc_html__('Active Tab Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-filter-area .nav-tabs .nav-item .nav-link.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_vehicle_price_filter_tab_not_active_color',
            [
                'label'     => esc_html__('Non Active Tab Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-filter-area .nav-tabs .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_tab_not_active_bg_color',
            [
                'label'     => esc_html__(' Active BG Tab Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-filter-area .nav-tabs .nav-item .nav-link.active' => 'background: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_section();


        //pagination
        $this->start_controls_section(
            'drivco_vehicle_price_filter_pagination',
            [
                'label' => esc_html__('Pagination', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_price_filter_pagination_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .location a',
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_pagination_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group2 .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_pagination_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group2.style-6 .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_pagination_color_border',
            [
                'label'     => esc_html__('Border Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group2 .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_pagination_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_pagination_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //city
        $this->start_controls_section(
            'drivco_vehicle_price_filter_city',
            [
                'label' => esc_html__('City', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_price_filter_city_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .location a',
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_city_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_city_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_city_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //model
        $this->start_controls_section(
            'drivco_vehicle_price_filter_model',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_price_filter_model_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content h6 a',
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_modelcolor',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //button
        $this->start_controls_section(
            'drivco_vehicle_price_filter_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_price_filter_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn7',
            ]
        );
        $this->add_control(
            'drivco_vehicle_price_filter_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn7' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn7::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn7' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_button_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn7' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_button_pdding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn7' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //price text
        $this->start_controls_section(
            'drivco_vehicle_price_filter_price_text',
            [
                'label' => esc_html__('Price Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_price_filter_price_text_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area span',
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_price_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_price_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_price_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Information Meta
        $this->start_controls_section(
            'drivco_price_filter_Information_meta',
            [
                'label' => esc_html__('Information Meta', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_price_filter_Information_meta_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .features li',
            ]
        );

        $this->add_control(
            'drivco_price_filter_Information_meta_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_price_filter_Information_meta_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .features svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_price_filter_Information_meta_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_price_filter_Information_meta_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //price
        $this->start_controls_section(
            'drivco_vehicle_price_filter_price_price',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_price_filter_price_price_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6',
            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_price_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_price_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_price_filter_price_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //card
        $this->start_controls_section(
            'drivco_vehicle_price_filter_price_card',
            [
                'label' => esc_html__('Card', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'drivco_vehicle_price_filter_price_card_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $list_items = $settings['price_filter_list'];

        $random = uniqid();

?>
        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".home6-top-use-car-slider", {
                    speed: 1500,
                    spaceBetween: 25,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-2",
                        prevEl: ".prev-2",
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        420: {
                            slidesPerView: 1,
                            spaceBetween: 15,
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
                    },
                    observer: true,
                    observeParents: true,
                });
            </script>
        <?php endif; ?>

        <div class="home6-top-used-car-section ">
            <div class="row mb-40">
                <div class="col-lg-12">
                    <div class="home6-filter-area d-flex align-items-center justify-content-between">
                        <ul class="nav nav-tabs" id="myTab3" role="tablist">
                            <?php
                            if (!empty($settings['price_filter_list'])) {
                                $tabIndex = 1;
                                foreach ($settings['price_filter_list'] as $index => $item) {
                                    $tabName = !empty($item['drivco_price_filter_vehicle_repeater_tab_name']) ? $item['drivco_price_filter_vehicle_repeater_tab_name'] : '';
                                    $tabId = 'price-filter' . $tabIndex;
                            ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo ($index === 0 ? 'active' : ''); ?>" id="<?php echo esc_attr($tabId . $random) ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr($tabId . $random) ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($tabId . $random) ?>" aria-selected="<?php echo ($index === 0 ? 'true' : 'false'); ?>"><?php echo esc_html($tabName) ?></button>
                                    </li>

                            <?php
                                    $tabIndex++;
                                }
                            }
                            ?>

                        </ul>
                        <?php if ('yes' === $settings['drivco_price_filter_pagination_show']) : ?>
                            <div class="slider-btn-group2 style-6 d-lg-flex d-none">
                                <div class="slider-btn prev-2">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="slider-btn next-2">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTab3Content">
                        <?php
                        $tabIndex = 1;
                        foreach ($settings['price_filter_list'] as $index => $item) :
                            $tabId = 'price-filter' . $tabIndex;
                        ?>
                            <div class="tab-pane fade <?php echo ($index === 0 ? 'show active' : ''); ?>" id="<?php echo esc_attr($tabId . $random) ?>" role="tabpanel" aria-labelledby="<?php echo ($index === 0 ? 'true' : 'false'); ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="swiper home6-top-use-car-slider">
                                            <div class="swiper-wrapper">
                                                <?php
                                                $args = array(
                                                    'post_type'      => 'vehicle',
                                                    'posts_per_page' => $item['drivco_vehicle_brand_grid_general_post_per_page'],
                                                    'orderby'        => $item['drivco_vehicle_brand_grid_general_order_by'],
                                                    'order'          => $item['drivco_vehicle_brand_grid_order'],
                                                    'post__in'       => $item['drivco_vehicle_product_price_filter'],
                                                    'post_status'    => 'publish',
                                                );

                                                $query = new \WP_Query($args);

                                                if ($query->have_posts()) {
                                                    while ($query->have_posts()) {
                                                        $query->the_post();
                                                ?>
                                                        <div class="swiper-slide">
                                                            <div class="product-card4 style-3">
                                                                <div class="product-img">
                                                                    <?php if (has_post_thumbnail()) : ?>
                                                                        <?php the_post_thumbnail('egns-thumb-cart') ?>
                                                                    <?php endif; ?>
                                                                    <?php $id = uniqid();
                                                                    if (!empty(Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_exterior_gallery'))) : ?>
                                                                        <div id="<?php echo $id ?>" class="hidden">
                                                                            <?php
                                                                            $i = 0;
                                                                            foreach ((array) Egns_Core\Egns_Helper::egns_vehicle_gallery('vehicle_exterior_gallery') as $data) :
                                                                            ?>
                                                                                <a href="<?php echo wp_get_attachment_url($data)  ?>"></a>
                                                                            <?php
                                                                                $i++;
                                                                            endforeach
                                                                            ?>
                                                                        </div>
                                                                        <div class="number-of-img">
                                                                            <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('num-of-image', 'drivco-core') ?>"><?php echo $i ?></a>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="product-content">
                                                                    <div class="location">
                                                                        <?php echo Egns_Core\Egns_Helper::term_with_link('bi bi-geo-alt', 'location') ?>
                                                                    </div>
                                                                    <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                                                    <ul class="features">
                                                                        <li>
                                                                            <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/milage_icon.svg' ?>" alt="<?php echo esc_attr__('feature-img', 'drivco-core') ?>" />
                                                                            <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_milage_info_value') ?>
                                                                        </li>
                                                                        <li>
                                                                            <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/info_icon.svg' ?>" alt="<?php echo esc_attr__('feature-img', 'drivco-core') ?>" />
                                                                            <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?>
                                                                        </li>
                                                                        <li>
                                                                            <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/engine_icon.svg' ?>" alt="<?php echo esc_attr__('feature-img', 'drivco-core') ?>" />
                                                                            <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="button-and-price">
                                                                        <a class="primary-btn7" href="<?php the_permalink() ?>"><?php echo wp_kses($settings['drivco_vehicle_brand_grid_button_text'], wp_kses_allowed_html('post'))  ?></a>
                                                                        <div class="price-area">
                                                                            <span><?php echo ('Great Price') ?></span>
                                                                            <h6>
                                                                                <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php  }
                                                    wp_reset_postdata();
                                                }

                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $tabIndex++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Price_Filter_Vehicle_Widget());
