<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core;
use Egns_Core\Egns_Helper;
use Elementor\core\Schemes;

class Drivco_Vehicle_Parts_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_vehicle_parts';
    }

    public function get_title()
    {
        return esc_html__('EG Vehicle Parts', 'drivco-core');
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

        //=====================Blog Style =======================//

        // Text Slider
        $this->start_controls_section(
            'drivco_vehicle_parts_txt_slider_sec',
            [
                'label' => esc_html__('Text Slider', 'drivco-core'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_vehicle_parts_slider_txt',
            [
                'label' => esc_html__('Text Slider', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('SHOP CART', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'slider_txt_list',
            [
                'label' => esc_html__('Repeater List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_vehicle_parts_slider_txt' => esc_html__('Slider Text', 'drivco-core'),
                    ],
                ],
                'title_field' => '{{{ drivco_vehicle_parts_slider_txt }}}',
            ]
        );

        $this->end_controls_section();

        //Image
        $this->start_controls_section(
            'drivco_vehicle_parts_image_sec',
            [
                'label' => esc_html__('Image', 'drivco-core'),
            ]
        );
        $this->add_control(
            'drivco_vehicle_parts_image',
            [
                'label' => esc_html__('Choose Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();
        //Heading
        $this->start_controls_section(
            'drivco_vehicle_parts_heading',
            [
                'label' => esc_html__('Heading', 'drivco-core'),
            ]
        );
        $this->add_control(
            'drivco_vehicle_parts_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Do Your Need <br>Any Parts Of The Car ?', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        //Button
        $this->start_controls_section(
            'drivco_vehicle_parts_btn_sec',
            [
                'label' => esc_html__('Button', 'drivco-core'),
            ]
        );
        $this->add_control(
            'drivco_vehicle_parts_btn_label',
            [
                'label' => esc_html__('Button Label', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Go to Shop Page', 'drivco-core'),
                'placeholder' => esc_html__('Type button text here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_vehicle_parts_btn_link',
            [
                'label' => esc_html__('Button Link', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        //Description
        $this->start_controls_section(
            'drivco_vehicle_parts_dsc_sec',
            [
                'label' => esc_html__('Description', 'drivco-core'),
            ]
        );
        $this->add_control(
            'drivco_vehicle_parts_dsc',
            [
                'label' => esc_html__('Description', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Advance Auto Parts is a retailer of automotive aftermarket parts, tools, and accessories. The company offers a comprehensive range of products, including batteries, brakes, engine parts, suspension and steering, and more.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type description here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();



        //Query
        $this->start_controls_section(
            'drivco_vehicle_parts_query',
            [
                'label' => esc_html__('Query', 'drivco-core'),
            ]
        );
        $this->add_control(
            'product_list',
            [
                'label'         => __('Front Glass', 'drivco-core'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Core\Egns_Helper::get_product_lists(),
            ]
        );
        $this->add_control(
            'product_list_four',
            [
                'label'         => __('Head Light', 'drivco-core'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Core\Egns_Helper::get_product_lists(),
            ]
        );
        $this->add_control(
            'product_list_three',
            [
                'label'         => __('Tyre', 'drivco-core'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Core\Egns_Helper::get_product_lists(),
            ]
        );
        $this->add_control(
            'product_list_two',
            [
                'label'         => __('Indicator Light', 'drivco-core'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Core\Egns_Helper::get_product_lists(),
            ]
        );
        $this->add_control(
            'product_list_five',
            [
                'label'         => __('Looking Glass', 'drivco-core'),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'multiple'      => true,
                'options'       => Egns_Core\Egns_Helper::get_product_lists(),
            ]
        );
        $this->end_controls_section();

        // Style Start
        // Slider Text
        $this->start_controls_section(
            'drivco_vehicle_parts_slider_txt',
            [
                'label' => esc_html__('Slider Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_parts_slider_txt_typ',
                'selector' => '{{WRAPPER}} .shop-car-parts-section .text-slider h2',

            ]
        );

        $this->add_control(
            'drivco_vehicle_parts_slider_txt_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop-car-parts-section .text-slider h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Heading
        $this->start_controls_section(
            'drivco_vehicle_parts_title_style_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_parts_title_typ',
                'selector' => '{{WRAPPER}} .section-title1 h2',

            ]
        );

        $this->add_control(
            'drivco_vehicle_parts_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_parts_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_parts_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            'drivco_button_style_one',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'drivco_btn_one_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} vehicle-part.primary-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_btn_one_padding',
            [
                'label'      => __(
                    'Padding',
                    'drivco-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} vehicle-part.primary-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        // Tabs
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'drivco-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_btn_one_typ',
                'selector' => '{{WRAPPER}} a.vehicle-part.primary-btn2',

            ]
        );
        $this->add_control(
            'drivco_btn_one_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.vehicle-part.primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_btn_one_bg_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.vehicle-part.primary-btn2' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_btn_one_border_radius',
            [
                'label'      => __('Border Radius', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} a.vehicle-part.primary-btn2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} a.vehicle-part.primary-btn2::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_btn_one_color_hover',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.vehicle-part.primary-btn2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_btn_one_bg_color_hvr',
            [
                'label' => __('Background Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.vehicle-part.primary-btn2::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Description
        $this->start_controls_section(
            'drivco_vehicle_parts_desc_style_sec',
            [
                'label' => esc_html__('Description', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_parts_desc_typ',
                'selector' => '{{WRAPPER}} .shop-car-parts-section .shop-right-content p',

            ]
        );
        $this->add_control(
            'drivco_vehicle_parts_desc_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop-car-parts-section .shop-right-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_vehicle_parts_desc_top_bdr_line_color',
            [
                'label'     => esc_html__('Top Border Line Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop-car-parts-section .shop-right-content p::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_parts_desc_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .shop-car-parts-section .shop-right-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_parts_desc_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        // Product
        $this->start_controls_section(
            'drivco_vehicle_parts_product_style_sec',
            [
                'label' => esc_html__('Product Image', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'drivco_vehicle_parts_prdt_img_bg_color',
            [
                'label'     => esc_html__('Image BG Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop-card .shop-img' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Product Title
        $this->start_controls_section(
            'drivco_vehicle_parts_prdt_title_style_sec',
            [
                'label' => esc_html__('Product Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_parts_prdt_title_typ',
                'selector' => '{{WRAPPER}} .shop-card .content h6 a',

            ]
        );

        $this->add_control(
            'drivco_vehicle_parts_prdt_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop-card .content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_parts_prdt_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .shop-card .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_parts_prdt_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .shop-card .content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        // Product Price
        $this->start_controls_section(
            'drivco_vehicle_parts_prdt_price_style_sec',
            [
                'label' => esc_html__('Product Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_parts_prdt_price_typ',
                'selector' => '{{WRAPPER}} .shop-card .content .content-btm .price h6',

            ]
        );

        $this->add_control(
            'drivco_vehicle_parts_prdt_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop-card .content .content-btm .price h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_parts_prdt_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .shop-card .content .content-btm .price h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_parts_prdt_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .shop-card .content .content-btm .price h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        // Product Button
        $this->start_controls_section(
            'drivco_product_button_style_one',
            [
                'label' => esc_html__('Product Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'drivco_prdt_btn_one_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} prdt-btn.primary-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_prdt_btn_one_padding',
            [
                'label'      => __(
                    'Padding',
                    'drivco-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} prdt-btn.primary-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        // Tabs
        $this->start_controls_tabs(
            'style_tabs_one'
        );

        $this->start_controls_tab(
            'style_normal_tab_one',
            [
                'label' => esc_html__(
                    'Normal',
                    'drivco-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_prdt_btn_one_typ',
                'selector' => '{{WRAPPER}} a.prdt-btn.primary-btn2',

            ]
        );
        $this->add_control(
            'drivco_prdt_btn_one_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.prdt-btn.primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_prdt_btn_one_bg_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.prdt-btn.primary-btn2' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_prdt_btn_one_border_radius',
            [
                'label'      => __('Border Radius', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} a.prdt-btn.primary-btn2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} a.prdt-btn.primary-btn2::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'style_hover_tab_one',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_prdt_btn_one_color_hover',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.prdt-btn.primary-btn2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_prdt_btn_one_bg_color_hvr',
            [
                'label' => __('Background Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.prdt-btn.primary-btn2::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Style End

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['slider_txt_list'];
        $heading_title = wp_kses($settings['drivco_vehicle_parts_title'], wp_kses_allowed_html('post'));
        $btn_txt = wp_kses($settings['drivco_vehicle_parts_btn_label'], wp_kses_allowed_html('post'));
        if (!empty($settings['drivco_vehicle_parts_btn_link']['url'])) {
            $this->add_link_attributes('drivco_vehicle_parts_btn_link', $settings['drivco_vehicle_parts_btn_link']);
        }
        $description = wp_kses($settings['drivco_vehicle_parts_dsc'], wp_kses_allowed_html('post'));


        $selected_post_id = (array) $settings['product_list']; // Get the selected product IDs from the control.
        $selected_post_id_two = (array) $settings['product_list_two'];
        $selected_post_id_three = (array) $settings['product_list_three'];
        $selected_post_id_four = (array) $settings['product_list_four'];
        $selected_post_id_five = (array) $settings['product_list_five'];

        $args = array(
            'post_type'      => 'product',
            'offset'         => 0,
            'post_status'    => 'publish',
        );

        $args_two = array( // Create a separate $args_two array for the second query.
            'post_type'      => 'product',
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        $args_three = array(
            'post_type'      => 'product',
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        $args_four = array(
            'post_type'      => 'product',
            'offset'         => 0,
            'post_status'    => 'publish',
        );
        $args_five = array(
            'post_type'      => 'product',
            'offset'         => 0,
            'post_status'    => 'publish',
        );

        // Add Included posts for the first query
        if (!empty($selected_post_id)) {
            $args['post__in'] = $selected_post_id;
        }

        // Add Included posts for the second query
        if (!empty($selected_post_id_two)) {
            $args_two['post__in'] = $selected_post_id_two;
        }

        if (!empty($selected_post_id_three)) {
            $args_three['post__in'] = $selected_post_id_three;
        }

        if (!empty($selected_post_id_four)) {
            $args_four['post__in'] = $selected_post_id_four;
        }

        if (!empty($selected_post_id_five)) {
            $args_five['post__in'] = $selected_post_id_five;
        }


?>
        <?php if (is_admin()) : ?>
            <script>
                jQuery(".marquee_text").marquee({
                    direction: "left",
                    duration: 25000,
                    gap: 50,
                    delayBeforeStart: 0,
                    duplicated: true,
                    startVisible: true,
                });
            </script>
        <?php endif ?>
        <div class="shop-car-parts-section pt-90 pb-90">
            <div class="text-slider">
                <h2 class="marquee_text">
                    <?php foreach ($data as $item) : ?>
                        <?php if (!empty($item['drivco_vehicle_parts_slider_txt'])) :   ?>
                            <?php echo wp_kses($item['drivco_vehicle_parts_slider_txt'], wp_kses_allowed_html('post'))  ?>
                        <?php endif ?>
                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.58632 27.5817H20.292L4.24546 37.2005C3.49356 37.6498 3.25516 38.6218 3.70446 39.3737C4.15376 40.1255 5.12573 40.364 5.87762 39.9147L21.5666 30.5068L12.4063 46.3424C11.9661 47.0943 12.2229 48.0663 12.984 48.5064C13.7358 48.9466 14.7078 48.6898 15.1479 47.9288L24.4274 31.8914V50.4137C24.4274 51.2848 25.1335 52 26.0138 52C26.8849 52 27.6001 51.294 27.6001 50.4137V31.708L37.2188 47.7454C37.6681 48.4973 38.6401 48.7357 39.392 48.2864C40.1439 47.8371 40.3823 46.8651 39.933 46.1132L30.5068 30.4334L46.3424 39.5937C47.0943 40.0339 48.0663 39.7771 48.5064 39.016C48.9466 38.2641 48.6898 37.2922 47.9288 36.8521L31.8914 27.5817H50.4137C51.2848 27.5817 52 26.8757 52 25.9954C52 25.1243 51.294 24.4091 50.4137 24.4091H31.708L47.7454 14.7903C48.4973 14.341 48.7357 13.3691 48.2864 12.6172C47.8371 11.8653 46.8651 11.6269 46.1132 12.0762L30.4334 21.4932L39.5937 5.65756C40.0339 4.90566 39.7771 3.9337 39.016 3.49356C38.2641 3.05343 37.2922 3.31017 36.8521 4.07124L27.5817 20.1086V1.58632C27.5817 0.715218 26.8757 0 25.9954 0C25.1243 0 24.4091 0.706048 24.4091 1.58632V20.292L14.7995 4.24546C14.3502 3.49356 13.3782 3.25516 12.6263 3.70446C11.8744 4.15376 11.636 5.12573 12.0853 5.87762L21.4932 21.5666L5.65756 12.4063C4.90566 11.9661 3.9337 12.2229 3.49356 12.984C3.05343 13.7358 3.31017 14.7078 4.07124 15.1479L20.1086 24.4274H1.58632C0.706048 24.4183 0 25.1243 0 25.9954C0 26.8757 0.706048 27.5817 1.58632 27.5817Z" fill="url(#paint0_linear_611_413)" />
                            <defs>
                                <linearGradient id="paint0_linear_611_413" x1="26" y1="0" x2="26" y2="52" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E2E2E2" />
                                    <stop offset="1" stop-color="#E7E6E6" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    <?php endforeach; ?>
                </h2>
            </div>
            <div class="container-fluid">
                <div class="row g-lg-4 gy-5 mt-50">
                    <div class="col-lg-4">
                        <div class="section-title1">
                            <?php if (!empty($heading_title)) : ?>
                                <h2><?php echo $heading_title ?></h2>
                            <?php endif ?>
                            <?php if (!empty($btn_txt)) : ?>
                                <a <?php echo $this->get_render_attribute_string('drivco_vehicle_parts_btn_link'); ?> class="vehicle-part primary-btn2"><i class="bi bi-cart2"></i> <?php echo $btn_txt ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shop-big-img">
                            <img src="<?php echo esc_url($settings['drivco_vehicle_parts_image']['url']) ?>" alt="<?php echo esc_attr('vehicle-image', 'drivco-core') ?>">
                            <ul>
                                <?php
                                $query = new \WP_Query($args);
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post(); ?>
                                        <li>
                                            <div class="dot-main">
                                                <div class="promo-video">
                                                    <div class="waves-block">
                                                        <div class="waves wave-1"></div>
                                                        <div class="waves wave-2"></div>
                                                        <div class="waves wave-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shop-card">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="shop-img">
                                                        <?php the_post_thumbnail() ?>
                                                    </div>
                                                <?php endif ?>
                                                <div class="content">
                                                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                                    <div class="content-btm">
                                                        <?php
                                                        if (class_exists('Woocommerce')) {
                                                            global $product;
                                                        ?>
                                                            <div class="price">
                                                                <h6><?php echo $product->get_price_html(); ?></h6>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <a class="prdt-btn primary-btn2" href="<?php the_permalink(); ?>"><?php echo esc_html('View Details') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                                <?php
                                $query_two = new \WP_Query($args_two);
                                if ($query_two->have_posts()) {
                                    while ($query_two->have_posts()) {
                                        $query_two->the_post(); ?>
                                        <li>
                                            <div class="dot-main left">
                                                <div class="promo-video">
                                                    <div class="waves-block">
                                                        <div class="waves wave-1"></div>
                                                        <div class="waves wave-2"></div>
                                                        <div class="waves wave-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shop-card left">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="shop-img">
                                                        <?php the_post_thumbnail() ?>
                                                    </div>
                                                <?php endif ?>
                                                <div class="content">
                                                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                                    <div class="content-btm">
                                                        <?php if (class_exists('WooCommerce')) : ?>
                                                            <div class="price">
                                                                <h6><?php echo $product->get_price_html(); ?></h6>
                                                            </div>
                                                        <?php endif; ?>
                                                        <a class="prdt-btn primary-btn2" href="<?php the_permalink(); ?>"><?php echo esc_html('View Details') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                                <?php
                                $query_three = new \WP_Query($args_three);
                                if ($query_three->have_posts()) {
                                    while ($query_three->have_posts()) {
                                        $query_three->the_post(); ?>
                                        <li>
                                            <div class="dot-main">
                                                <div class="promo-video">
                                                    <div class="waves-block">
                                                        <div class="waves wave-1"></div>
                                                        <div class="waves wave-2"></div>
                                                        <div class="waves wave-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shop-card">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="shop-img">
                                                        <?php the_post_thumbnail() ?>
                                                    </div>
                                                <?php endif ?>
                                                <div class="content">
                                                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                                    <div class="content-btm">
                                                        <?php if (class_exists('WooCommerce')) : ?>
                                                            <div class="price">
                                                                <h6><?php echo $product->get_price_html(); ?></h6>
                                                            </div>
                                                        <?php endif; ?>
                                                        <a class="prdt-btn primary-btn2" href="<?php the_permalink(); ?>"><?php echo esc_html('View Details') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                                <?php
                                $query_four = new \WP_Query($args_four);
                                if ($query_four->have_posts()) {
                                    while ($query_four->have_posts()) {
                                        $query_four->the_post(); ?>
                                        <li>
                                            <div class="dot-main">
                                                <div class="promo-video">
                                                    <div class="waves-block">
                                                        <div class="waves wave-1"></div>
                                                        <div class="waves wave-2"></div>
                                                        <div class="waves wave-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shop-card">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="shop-img">
                                                        <?php the_post_thumbnail() ?>
                                                    </div>
                                                <?php endif ?>
                                                <div class="content">
                                                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                                    <div class="content-btm">
                                                        <?php if (class_exists('WooCommerce')) : ?>
                                                            <div class="price">
                                                                <h6><?php echo $product->get_price_html(); ?></h6>
                                                            </div>
                                                        <?php endif; ?>
                                                        <a class="prdt-btn primary-btn2" href="<?php the_permalink(); ?>"><?php echo esc_html('View Details') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                                <?php
                                $query_five = new \WP_Query($args_five);
                                if ($query_five->have_posts()) {
                                    while ($query_five->have_posts()) {
                                        $query_five->the_post(); ?>
                                        <li>
                                            <div class="dot-main left">
                                                <div class="promo-video">
                                                    <div class="waves-block">
                                                        <div class="waves wave-1"></div>
                                                        <div class="waves wave-2"></div>
                                                        <div class="waves wave-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shop-card left">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="shop-img">
                                                        <?php the_post_thumbnail() ?>
                                                    </div>
                                                <?php endif ?>
                                                <div class="content">
                                                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                                    <div class="content-btm">
                                                        <?php if (class_exists('WooCommerce')) : ?>
                                                            <div class="price">
                                                                <h6><?php echo $product->get_price_html(); ?></h6>
                                                            </div>
                                                        <?php endif; ?>
                                                        <a class="prdt-btn primary-btn2" href="<?php the_permalink(); ?>"><?php echo esc_html('View Details') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php if (!empty($description)) : ?>
                        <div class="col-lg-4 d-flex align-items-end">
                            <div class="shop-right-content">
                                <p><?php echo $description ?></p>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Vehicle_Parts_Widget());
