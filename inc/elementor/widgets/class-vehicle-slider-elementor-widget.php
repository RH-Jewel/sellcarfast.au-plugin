<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core;
use Egns_Core\Egns_Helper;
use Elementor\core\Schemes;

class Drivco_Vehicle_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_vehicle_product_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Vehicle Product Slider', 'drivco-core');
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
            'drivco_vehicle_product_slider_content_section',
            [
                'label' => esc_html__('General', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_style_selection',
            [
                'label'   => esc_html__('Select Style', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'drivco-core'),
                    'style_two' => esc_html__('Style Two', 'drivco-core'),
                    'style_three' => esc_html__('Style Three', 'drivco-core'),
                    'style_four' => esc_html__('Style Four', 'drivco-core'),
                    'style_five' => esc_html__('Style Five', 'drivco-core'),
                    'style_six' => esc_html__('Style Six', 'drivco-core'),

                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Recent Launched Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six']

                ]
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_subtitle',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Here are some of the featured cars in different categories', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub title here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six']

                ]
            ]
        );

        $this->end_controls_section();

        //Explore Button
        $this->start_controls_section(
            'drivco_vehicle_product_slider_button_area',
            [
                'label' => esc_html__('Explore Button', 'drivco-core'),
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_four', 'style_six']

                ]
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_button_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Explore More', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_button_url',
            [
                'label' => esc_html__('Button URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );
        $this->end_controls_section();

        //Content Button
        $this->start_controls_section(
            'drivco_vehicle_product_slider_content_button_area',
            [
                'label' => esc_html__('Content Button', 'drivco-core'),
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_six', 'style_five']

                ]
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_content_button_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('View Details', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();

        //Price Button
        $this->start_controls_section(
            'drivco_vehicle_product_slider_price_button_area',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_four']

                ]
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_price_button_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Explore More', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();


        //grneral section
        $this->start_controls_section(
            'drivco_vehicle_product_slider_general_section',
            [
                'label' => esc_html__('Slider', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider',
            [
                'label'             => esc_html__('Select Products', 'drivco-core'),
                'type'              => \Elementor\Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => Egns_Core\Egns_Helper::get_post_list_by_post_type('vehicle'),
                'default'           => Egns_Core\Egns_Helper::get_all_post_key('vehicle'),
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_order',
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

        $this->add_control(
            'drivco_vehicle_product_slider_order_by',
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

        $this->add_control(
            'drivco_vehicle_product_slider_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'drivco-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slide_devider',
            [
                'label' => esc_html__('Slider Arrow', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five']

                ]
            ]
        );

        $this->end_controls_section();


        ////////////////////////Style One////////////////////////////////////////

        //Title
        $this->start_controls_section(
            'drivco_vehicle_product_slider_title_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six']
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_slider_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Sub Title
        $this->start_controls_section(
            'drivco_vehicle_product_slider_subtitle_sec',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six']
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_slider_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Price
        $this->start_controls_section(
            'drivco_vehicle_product_slider_price_sec',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_slider_price_typ',
                'selector' => '{{WRAPPER}} .featured-car-section .feature-card .product-content .price strong',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content .price strong' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content .price strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content .price strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Product Model
        $this->start_controls_section(
            'drivco_vehicle_product_slider_car_model_sec',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_slider_car_model_typ',
                'selector' => '{{WRAPPER}} .featured-car-section .feature-card .product-content h5 a ',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content h5 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_car_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_car_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Features 
        $this->start_controls_section(
            'drivco_vehicle_product_slider_features_sec',
            [
                'label' => esc_html__('Features', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_slider_features_typ',
                'selector' => '{{WRAPPER}} .featured-car-section .feature-card .product-content .features li ',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_features_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content .features li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_features_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content .features li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_slider_features_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .featured-car-section .feature-card .product-content .features li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        ////////////////////////Style Two////////////////////////////////////////

        //Price
        $this->start_controls_section(
            'drivco_vehicle_product_two_slider_price_sec',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_two_slider_price_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-content .price strong',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_two_slider_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content .price strong' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_two_slider_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content .price strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_two_slider_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card2 .product-content .price strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Car Model
        $this->start_controls_section(
            'drivco_vehicle_product_two_slider_car_model_sec',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_two_slider_car_model_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-content h6 a ',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_two_slider_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_two_slider_car_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_two_slider_car_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        ////////////////////////Style Three////////////////////////////////////////

        //Price
        $this->start_controls_section(
            'drivco_vehicle_product_three_slider_price_sec',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_three_slider_price_typ',
                'selector' => '{{WRAPPER}} .product-card3.style-2 .product-content .price-tag span',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_three_slider_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content .price-tag span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_three_slider_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content .price-tag span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_three_slider_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content .price-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Car Model
        $this->start_controls_section(
            'drivco_vehicle_product_three_slider_car_model_sec',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_three_slider_car_model_typ',
                'selector' => '{{WRAPPER}} .product-card3.style-2 .product-content h5 a ',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_three_slider_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content h5 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_three_slider_car_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_three_slider_car_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Features 
        $this->start_controls_section(
            'drivco_vehicle_product_three_slider_features_sec',
            [
                'label' => esc_html__('Features', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_three_slider_features_typ',
                'selector' => '{{WRAPPER}} .product-card3.style-2 .product-content .features li',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_three_slider_features_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content .features li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_three_slider_features_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content .features li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_three_slider_features_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card3.style-2 .product-content .features li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();




        ////////////////////////Style Four ////////////////////////////////////////

        //Location
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_location_sec',
            [
                'label' => esc_html__('Location', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_location_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .location a',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_location_color_hover',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_location_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_location_margin',
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
            'drivco_vehicle_product_four_slider_location_padding',
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


        //Car Model
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_car_model_sec',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_car_model_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content h6 a ',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_car_model_color_hover_color',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_car_model_margin',
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
            'drivco_vehicle_product_four_slider_car_model_padding',
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


        //Features 
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_features_sec',
            [
                'label' => esc_html__('Features', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_features_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .features li',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_features_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_features_margin',
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
            'drivco_vehicle_product_four_slider_features_padding',
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



        // Explore  Button 
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_explore_button_text_sec',
            [
                'label' => esc_html__(' Explore Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_four']
                ]
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_vehicle_product_four_slider_explore_button_tabs'
        );

        $this->start_controls_tab(
            'drivco_vehicle_product_four_slider_explore_button_normal_tab',
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
                'name'     => 'drivco_vehicle_product_four_slider_explore_button_text_typ',
                'selector' => '{{WRAPPER}} .explore-more-btn a',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_explore_button_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .explore-more-btn a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_explore_button_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .explore-more-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_explore_button_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .explore-more-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_vehicle_product_four_slider_explore_button_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider__explore_button_color_hover',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .explore-more-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();





        // Price Button 
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_button_text_sec',
            [
                'label' => esc_html__(' Price Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_four'
                ]
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_vehicle_product_four_slider_button_tabs'
        );

        $this->start_controls_tab(
            'drivco_vehicle_product_four_slider_button_normal_tab',
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
                'name'     => 'drivco_vehicle_product_four_slider_button_text_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_button_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_button_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_button_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_vehicle_product_four_slider_button_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_button_color_hover',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_button_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();



        //Price
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_price_sec',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_four'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_price_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_price_margin',
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
            'drivco_vehicle_product_four_slider_price_padding',
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



        ////////////////////////Style Five ////////////////////////////////////////

        //Price
        $this->start_controls_section(
            'drivco_vehicle_product_five_slider_price_sec',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_five_slider_price_typ',
                'selector' => '{{WRAPPER}} .product-card5 .product-img .product-price span',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-img .product-price span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_price_color_hover',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-img .product-price span:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-img .product-price span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card5 .product-img .product-price span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Location
        $this->start_controls_section(
            'drivco_vehicle_product_five_slider_location_sec',
            [
                'label' => esc_html__('Location', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_five_slider_location_typ',
                'selector' => '{{WRAPPER}} .product-card5 .product-content .location a',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_location_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .location a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_location_hover_color',
            [
                'label'     => esc_html__('hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .location a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_location_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .location a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_location_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card5 .product-content .location a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Car Model
        $this->start_controls_section(
            'drivco_vehicle_product_five_slider_car_model_sec',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_five_slider_car_model_typ',
                'selector' => '{{WRAPPER}} .product-card5 .product-content h6 a ',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_car_model_color_hover_color',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_car_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_car_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card5 .product-content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Features 
        $this->start_controls_section(
            'drivco_vehicle_product_five_slider_features_sec',
            [
                'label' => esc_html__('Features', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_five_slider_features_typ',
                'selector' => '{{WRAPPER}} .product-card5 .product-content .features li',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_features_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .features li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_features_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .features li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_features_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card5 .product-content .features li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Button Text
        $this->start_controls_section(
            'drivco_vehicle_product_five_slider_button_text_sec',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_five'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_five_slider_button_text_typ',
                'selector' => '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_button_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_five_slider_button_text_color_hover_color',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_button_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_five_slider_button_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        ////////////////////////Style Six ////////////////////////////////////////

        //Price
        $this->start_controls_section(
            'drivco_vehicle_product_six_slider_price_sec',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_six'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_six_slider_price_typ',
                'selector' => '{{WRAPPER}} .product-st-card1 .product-img .product-price span',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-img .product-price span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_price_color_hover',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-img .product-price span:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-img .product-price span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-st-card1 .product-img .product-price span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Location
        $this->start_controls_section(
            'drivco_vehicle_product_six_slider_location_sec',
            [
                'label' => esc_html__('Location', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_six'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_six_slider_location_typ',
                'selector' => '{{WRAPPER}} .product-st-card1 .product-content .location a',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_location_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content .location a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_location_hover_color',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content .location a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_location_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content .location a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_location_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-st-card1 .product-content .location a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Car Model
        $this->start_controls_section(
            'drivco_vehicle_product_six_slider_car_model_sec',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_six'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_six_slider_car_model_typ',
                'selector' => '{{WRAPPER}} .product-st-card1 .product-content h6 a',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_car_model_color_hover_color',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_car_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_car_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-st-card1 .product-content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Features 
        $this->start_controls_section(
            'drivco_vehicle_product_six_slider_features_sec',
            [
                'label' => esc_html__('Features', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_six'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_six_slider_features_typ',
                'selector' => '{{WRAPPER}} .product-st-card1 .product-content .features li',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_features_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content .features li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_features_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content .features li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_features_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-st-card1 .product-content .features li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Explore  Button 
        $this->start_controls_section(
            'drivco_vehicle_product_six_slider_explore_button_text_sec',
            [
                'label' => esc_html__(' Explore Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => ['style_six']
                ]
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_vehicle_product_six_slider_explore_button_tabs'
        );

        $this->start_controls_tab(
            'drivco_vehicle_product_six_slider_explore_button_normal_tab',
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
                'name'     => 'drivco_vehicle_product_six_slider_explore_button_text_typ',
                'selector' => '{{WRAPPER}} .explore-more-btn a',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_explore_button_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .explore-more-btn a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_explore_button_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .explore-more-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_explore_button_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .explore-more-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_vehicle_product_six_slider_explore_button_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider__explore_button_color_hover',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .explore-more-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();



        //Content Button 
        $this->start_controls_section(
            'drivco_vehicle_product_six_slider_button_text_sec',
            [
                'label' => esc_html__(' Content Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_vehicle_product_slider_style_selection' => 'style_six'
                ]
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_vehicle_product_six_slider_button_tabs'
        );

        $this->start_controls_tab(
            'drivco_vehicle_product_six_slider_button_normal_tab',
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
                'name'     => 'drivco_vehicle_product_six_slider_button_text_typ',
                'selector' => '{{WRAPPER}} .product-st-card1 .product-content .content-btm .view-btn2',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_button_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content .content-btm .view-btn2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_button_text_color_hover_color',
            [
                'label'     => esc_html__('Hover  Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content .content-btm .view-btn2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_button_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-st-card1 .product-content .content-btm .view-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_six_slider_button_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-st-card1 .product-content .content-btm .view-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_vehicle_product_six_slider_button_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_button_color_hover',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_six_slider_button_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $args = array(
            'post_type'      => 'vehicle',
            'posts_per_page' => $settings['drivco_vehicle_product_slider_posts_per_page'],
            'orderby'        => $settings['drivco_vehicle_product_slider_order_by'],
            'order'          => $settings['drivco_vehicle_product_slider_order'],
            'post__in'       => $settings['drivco_vehicle_product_slider'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );


        $query = new \WP_Query($args);



?>

        <?php
        if (is_admin()) : ?>
            <script>
                // most-search-slider
                var swiper = new Swiper(".home2-featured-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    slidesPerView: 1,
                    centerSlides: true,
                    autoplay: {
                        delay: 3000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-1",
                        prevEl: ".prev-1",
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
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4
                        },
                    }
                });

                // Recent Launch Slider
                var swiper = new Swiper(".recent-launch-car-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    slidesPerView: 1,
                    centerSlides: true,
                    // loop: true,
                    autoplay: {
                        delay: 3000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-5",
                        prevEl: ".prev-5",
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
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4
                        },
                    }
                });

                // Recent Launch Slider
                var swiper = new Swiper(".brand-category-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 25,
                    slidesPerView: 1,
                    autoplay: {
                        delay: 3000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-5",
                        prevEl: ".prev-5",
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
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4
                        },
                    }
                });

                // Latest Car Slider
                var swiper = new Swiper(".home4-latest-car-slider", {
                    speed: 1500,
                    spaceBetween: 25,
                    autoplay: {
                        delay: 3000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-11",
                        prevEl: ".prev-11",
                    },
                    pagination: {
                        el: ".pagination11",
                        clickable: "true",
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
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
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 3
                        },
                    }
                });

                var swiper = new Swiper(".home5-fetured-slider", {
                    speed: 1500,
                    spaceBetween: 25,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-51",
                        prevEl: ".prev-51",
                    },
                    pagination: {
                        el: ".pagination8",
                        clickable: "true",
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
                            slidesPerView: 4,
                            spaceBetween: 24,
                        },
                        1400: {
                            slidesPerView: 4
                        },
                    }
                });

                jQuery('#slick3').slick({
                    rows: 2,
                    dots: false,
                    arrows: true,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    speed: 2000,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    responsive: [{
                        breakpoint: 1200,
                        settings: {
                            arrows: false,
                            slidesToShow: 2
                        }
                    }, {
                        breakpoint: 991,
                        settings: {
                            arrows: false,
                            slidesToShow: 1
                        }
                    }, {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            slidesToShow: 1
                        }
                    }, {
                        breakpoint: 576,
                        settings: {
                            arrows: false,
                            slidesToShow: 1
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            slidesToShow: 1
                        }
                    }, {
                        breakpoint: 350,
                        settings: {
                            arrows: false,
                            slidesToShow: 1
                        }
                    }]
                });
            </script>
        <?php endif; ?>

        <?php if ($settings["drivco_vehicle_product_slider_style_selection"] == "style_one") : ?>
            <div class="featured-car-section">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_vehicle_product_slider_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['drivco_vehicle_product_slider_title']) ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['drivco_vehicle_product_slider_subtitle'])) :   ?>
                                    <p><?php echo esc_html($settings['drivco_vehicle_product_slider_subtitle']) ?></p>
                                <?php endif ?>
                            </div>
                            <?php if ('yes' == $settings['drivco_vehicle_product_slide_devider']) { ?>
                                <div class="slider-btn-group2">
                                    <div class="slider-btn prev-1">
                                        <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                        </svg>
                                    </div>
                                    <div class="slider-btn next-1">
                                        <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                        </svg>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="swiper home2-featured-slider">
                        <div class="swiper-wrapper">
                            <?php
                            while ($query->have_posts()) :
                                $query->the_post();

                            ?>
                                <div class="swiper-slide">
                                    <div class="feature-card">
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
                                                    <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product-content">
                                            <div class="price">
                                                <strong>
                                                    <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                </strong>
                                            </div>
                                            <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                            <ul class="features">
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/milage_two.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                    <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_milage_info_value') ?>

                                                </li>
                                                <li>

                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/info_two.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                    <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?>
                                                </li>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/engine_two.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                    <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings["drivco_vehicle_product_slider_style_selection"] == "style_two") : ?>
            <div class="recent-launched-car ">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_vehicle_product_slider_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_vehicle_product_slider_title']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_vehicle_product_slider_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_vehicle_product_slider_subtitle']) ?></p>
                            <?php endif ?>
                        </div>
                        <?php if ('yes' == $settings['drivco_vehicle_product_slide_devider']) { ?>
                            <div class="slider-btn-group2">
                                <div class="slider-btn prev-1">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="slider-btn next-1">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper recent-launch-car-slider">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();

                                ?>
                                    <div class="swiper-slide">
                                        <div class="product-card2">
                                            <div class="product-img">
                                                <?php the_post_thumbnail('egns-thumb-cart2') ?>
                                            </div>
                                            <div class="product-content">
                                                <div class="details-btn">
                                                    <a href="<?php the_permalink() ?>"><i class="bi bi-arrow-right-short"></i></a>
                                                </div>
                                                <div class="price">
                                                    <strong>
                                                        <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                    </strong>
                                                </div>
                                                <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings["drivco_vehicle_product_slider_style_selection"] == "style_three") : ?>
            <div class="home3-recent-launched-section ">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_vehicle_product_slider_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_vehicle_product_slider_title']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_vehicle_product_slider_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_vehicle_product_slider_subtitle']) ?></p>
                            <?php endif ?>
                        </div>
                        <?php if ('yes' == $settings['drivco_vehicle_product_slide_devider']) { ?>
                            <div class="slider-btn-group2">
                                <div class="slider-btn prev-1">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="slider-btn next-1">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper brand-category-slider">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();

                                ?>
                                    <div class="swiper-slide">
                                        <div class="product-card3 style-2">
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
                                                        <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="product-content">
                                                <div class="price-tag">
                                                    <span>
                                                        <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                    </span>
                                                </div>
                                                <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                                <ul class="features">
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/milage_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_milage_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/info_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/engine_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings["drivco_vehicle_product_slider_style_selection"] == "style_four") : ?>
            <div class="home3-latest-car-section">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_vehicle_product_slider_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_vehicle_product_slider_title']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_vehicle_product_slider_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_vehicle_product_slider_subtitle']) ?></p>
                            <?php endif ?>
                        </div>
                        <?php if (!empty($settings['drivco_vehicle_product_slider_button_text'])) :   ?>
                            <div class="explore-more-btn">
                                <a href="<?php echo esc_url($settings['drivco_vehicle_product_slider_button_url']['url']) ?>"><?php echo esc_html($settings['drivco_vehicle_product_slider_button_text']) ?> <i class="bi bi-arrow-right"></i></a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-40">
                        <div class="swiper home4-latest-car-slider">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();

                                ?>
                                    <div class="swiper-slide">
                                        <div class="product-card4">
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
                                                        <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="product-content">
                                                <div class="location">
                                                    <?php echo Egns_Core\Egns_Helper::get_first_location_link('bi bi-geo-alt', 'location') ?>
                                                </div>
                                                <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                                <ul class="features">
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/milage_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_milage_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/info_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/engine_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?>
                                                    </li>
                                                </ul>
                                                <div class="button-and-price">
                                                    <?php if (!empty($settings['drivco_vehicle_product_slider_price_button_text'])) : ?>
                                                        <a class="primary-btn3" href="<?php the_permalink() ?>"> <?php echo $settings['drivco_vehicle_product_slider_price_button_text'] ?></a>
                                                    <?php endif; ?>
                                                    <div class="price-area">
                                                        <span><?php echo esc_html('Great Price') ?></span>
                                                        <h6>
                                                            <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                                ?>

                            </div>
                        </div>
                    </div>
                    <?php if ('yes' == $settings['drivco_vehicle_product_slide_devider']) { ?>
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="slider-btn-pagination">
                                <div class="slider-btn prev-11"><i class="bi bi-arrow-left"></i></div>
                                <div class="slider-btn next-11"><i class="bi bi-arrow-right"></i></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings["drivco_vehicle_product_slider_style_selection"] == "style_five") : ?>
            <div class="home5-featured-cars-section">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_vehicle_product_slider_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_vehicle_product_slider_title']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_vehicle_product_slider_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_vehicle_product_slider_subtitle']) ?></p>
                            <?php endif ?>
                        </div>
                        <?php if ('yes' == $settings['drivco_vehicle_product_slide_devider']) { ?>
                            <div class="slider-btn-group2 d-flex align-items-center justify-content-between">
                                <div class="slider-btn prev-51">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="slider-btn next-51">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper home5-fetured-slider">
                            <div class="swiper-wrapper">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();

                                ?>
                                    <div class="swiper-slide">
                                        <div class="product-card5">
                                            <div class="product-img">
                                                <div class="product-price">
                                                    <span>
                                                        <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                    </span>
                                                </div>
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
                                                        <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="product-content">
                                                <div class="location">
                                                    <?php echo Egns_Core\Egns_Helper::get_first_location_link('bi bi-geo-alt', 'location') ?>
                                                </div>
                                                <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                                <ul class="features">
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/milage_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_milage_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/home4/icon/electric.svg'  ?>" alt="<?php echo esc_attr__('electric-icon', 'drivco-core') ?>">
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/info_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/engine_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_condition_info_value') ?>
                                                    </li>
                                                </ul>
                                                <div class="content-btm">
                                                    <?php if (!empty($settings['drivco_vehicle_product_slider_content_button_text'])) : ?>
                                                        <a class="view-btn2" href="<?php the_permalink() ?>">
                                                            <svg width="35" height="21" viewBox="0 0 35 21" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 20C5.47715 20 1 15.7467 1 10.5C1 5.25329 5.47715 1 11 1" stroke-linecap="round"></path>
                                                                <path d="M14.2597 3C14.1569 3 14.0583 3.04166 13.9856 3.11582C13.9129 3.18997 13.8721 3.29055 13.8721 3.39542C13.8721 3.50029 13.9129 3.60086 13.9856 3.67502C14.0583 3.74917 14.1569 3.79083 14.2597 3.79083H15.8104C15.9132 3.79083 16.0118 3.74917 16.0845 3.67502C16.1572 3.60086 16.198 3.50029 16.198 3.39542C16.198 3.29055 16.1572 3.18997 16.0845 3.11582C16.0118 3.04166 15.9132 3 15.8104 3H14.2597ZM16.7795 3C16.6767 3 16.5781 3.04166 16.5054 3.11582C16.4327 3.18997 16.3919 3.29055 16.3919 3.39542C16.3919 3.50029 16.4327 3.60086 16.5054 3.67502C16.5781 3.74917 16.6767 3.79083 16.7795 3.79083H21.3346C21.4374 3.79083 21.536 3.74917 21.6087 3.67502C21.6814 3.60086 21.7222 3.50029 21.7222 3.39542C21.7222 3.29055 21.6814 3.18997 21.6087 3.11582C21.536 3.04166 21.4374 3 21.3346 3H16.7795Z">
                                                                </path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2292 5.76953C15.1264 5.76953 15.0278 5.81119 14.9551 5.88535C14.8824 5.9595 14.8415 6.06008 14.8415 6.16495C14.8415 6.26982 14.8824 6.3704 14.9551 6.44455C15.0278 6.51871 15.1264 6.56037 15.2292 6.56037H24.1454C25.653 6.56037 26.5822 6.79999 27.3256 7.18493C27.9575 7.51194 28.4672 7.9467 29.1055 8.49119C29.2375 8.60368 29.3749 8.72073 29.5201 8.84271L29.6101 8.91824L29.726 8.93069C33.2653 9.31069 34.0622 10.5309 34.2246 11.1557V12.6893C34.2246 12.7942 34.1838 12.8948 34.1111 12.9689C34.0384 13.0431 33.9398 13.0847 33.8369 13.0847H32.8356C32.6511 11.9627 31.6943 11.1077 30.5418 11.1077C29.3893 11.1077 28.4325 11.9627 28.248 13.0847H21.2058C21.0212 11.9627 20.0645 11.1077 18.912 11.1077C17.7594 11.1077 16.8027 11.9627 16.6182 13.0847H14.7446C14.6418 13.0847 14.5432 13.1264 14.4705 13.2006C14.3978 13.2747 14.3569 13.3753 14.3569 13.4802C14.3569 13.585 14.3978 13.6856 14.4705 13.7598C14.5432 13.8339 14.6418 13.8756 14.7446 13.8756H16.6182C16.8027 14.9976 17.7594 15.8527 18.912 15.8527C20.0645 15.8527 21.0212 14.9976 21.2058 13.8756H28.248C28.4325 14.9976 29.3893 15.8527 30.5418 15.8527C31.6943 15.8527 32.6511 14.9976 32.8356 13.8756H33.8369C34.1454 13.8756 34.4412 13.7506 34.6593 13.5281C34.8774 13.3057 34.9999 13.0039 34.9999 12.6893V11.0626L34.99 11.0187C34.7431 9.92754 33.5791 8.57502 29.9239 8.15706C29.8217 8.07086 29.7215 7.98505 29.6227 7.90063C28.9828 7.35397 28.3942 6.851 27.6766 6.4795C26.7966 6.02418 25.7391 5.76953 24.1454 5.76953H15.2292ZM28.9912 13.4802C28.9912 13.0607 29.1545 12.6584 29.4453 12.3618C29.7361 12.0651 30.1306 11.8985 30.5418 11.8985C30.9531 11.8985 31.3475 12.0651 31.6383 12.3618C31.9291 12.6584 32.0925 13.0607 32.0925 13.4802C32.0925 13.8996 31.9291 14.302 31.6383 14.5986C31.3475 14.8952 30.9531 15.0618 30.5418 15.0618C30.1306 15.0618 29.7361 14.8952 29.4453 14.5986C29.1545 14.302 28.9912 13.8996 28.9912 13.4802ZM18.912 11.8985C18.5007 11.8985 18.1063 12.0651 17.8155 12.3618C17.5247 12.6584 17.3613 13.0607 17.3613 13.4802C17.3613 13.8996 17.5247 14.302 17.8155 14.5986C18.1063 14.8952 18.5007 15.0618 18.912 15.0618C19.3232 15.0618 19.7176 14.8952 20.0084 14.5986C20.2992 14.302 20.4626 13.8996 20.4626 13.4802C20.4626 13.0607 20.2992 12.6584 20.0084 12.3618C19.7176 12.0651 19.3232 11.8985 18.912 11.8985Z">
                                                                </path>
                                                                <path d="M11 8.14151C11 8.03664 11.0408 7.93606 11.1135 7.86191C11.1862 7.78775 11.2848 7.74609 11.3877 7.74609H15.7489C15.8517 7.74609 15.9503 7.78775 16.023 7.86191C16.0957 7.93606 16.1365 8.03664 16.1365 8.14151C16.1365 8.24638 16.0957 8.34696 16.023 8.42111C15.9503 8.49527 15.8517 8.53693 15.7489 8.53693H11.3877C11.2848 8.53693 11.1862 8.49527 11.1135 8.42111C11.0408 8.34696 11 8.24638 11 8.14151ZM26.6836 8.65278C26.7563 8.72694 26.7971 8.82749 26.7971 8.93234C26.7971 9.03719 26.7563 9.13775 26.6836 9.2119L26.6532 9.24294C26.2897 9.61367 25.7968 9.82197 25.2828 9.82203H19.1409C19.0381 9.82203 18.9395 9.78037 18.8668 9.70622C18.7941 9.63206 18.7532 9.53149 18.7532 9.42662C18.7532 9.32174 18.7941 9.22117 18.8668 9.14701C18.9395 9.07286 19.0381 9.0312 19.1409 9.0312H25.2826C25.4354 9.03122 25.5866 9.00055 25.7277 8.94095C25.8688 8.88134 25.997 8.79397 26.105 8.68382L26.1355 8.65278C26.2082 8.57866 26.3068 8.53701 26.4096 8.53701C26.5123 8.53701 26.6109 8.57866 26.6836 8.65278ZM19.5286 17.7304C19.5286 17.6255 19.5694 17.5249 19.6421 17.4508C19.7148 17.3766 19.8134 17.335 19.9162 17.335H21.5638C21.6666 17.335 21.7652 17.3766 21.8379 17.4508C21.9106 17.5249 21.9514 17.6255 21.9514 17.7304C21.9514 17.8352 21.9106 17.9358 21.8379 18.01C21.7652 18.0841 21.6666 18.1258 21.5638 18.1258H19.9162C19.8134 18.1258 19.7148 18.0841 19.6421 18.01C19.5694 17.9358 19.5286 17.8352 19.5286 17.7304ZM22.2422 17.7304C22.2422 17.6255 22.283 17.5249 22.3557 17.4508C22.4284 17.3766 22.527 17.335 22.6299 17.335H26.991C27.0939 17.335 27.1925 17.3766 27.2652 17.4508C27.3379 17.5249 27.3787 17.6255 27.3787 17.7304C27.3787 17.8352 27.3379 17.9358 27.2652 18.01C27.1925 18.0841 27.0939 18.1258 26.991 18.1258H22.6299C22.527 18.1258 22.4284 18.0841 22.3557 18.01C22.283 17.9358 22.2422 17.8352 22.2422 17.7304Z">
                                                                </path>
                                                            </svg>
                                                            <?php echo $settings['drivco_vehicle_product_slider_content_button_text'] ?>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings["drivco_vehicle_product_slider_style_selection"] == "style_six") : ?>
            <div class="home5-recent-car-section">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_vehicle_product_slider_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_vehicle_product_slider_title']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_vehicle_product_slider_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_vehicle_product_slider_subtitle']) ?></p>
                            <?php endif ?>
                        </div>
                        <?php if (!empty($settings['drivco_vehicle_product_slider_button_text'])) :   ?>
                            <div class="slider-btn-and-exp-btn">
                                <div class="explore-more-btn two three">
                                    <a href="<?php echo esc_url($settings['drivco_vehicle_product_slider_button_url']['url']) ?>"><?php echo esc_html($settings['drivco_vehicle_product_slider_button_text']) ?> <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slick-wrapper">
                            <div id="slick3">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();

                                ?>
                                    <div class="slide-item">
                                        <div class="product-st-card1">
                                            <div class="product-img">
                                                <div class="product-price">
                                                    <span>
                                                        <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                    </span>
                                                </div>
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
                                                        <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="product-content">
                                                <div class="location">
                                                    <?php echo Egns_Core\Egns_Helper::get_first_location_link('bi bi-geo-alt', 'location') ?>
                                                </div>
                                                <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                                <ul class="features">
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/milage_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/info_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?>
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/engine_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?>
                                                    </li>
                                                </ul>
                                                <div class="content-btm">
                                                    <?php if (!empty($settings['drivco_vehicle_product_slider_content_button_text'])) : ?>
                                                        <a class="view-btn2" href="<?php the_permalink() ?>">
                                                            <svg width="35" height="21" viewBox="0 0 35 21" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 20C5.47715 20 1 15.7467 1 10.5C1 5.25329 5.47715 1 11 1" stroke-linecap="round"></path>
                                                                <path d="M14.2597 3C14.1569 3 14.0583 3.04166 13.9856 3.11582C13.9129 3.18997 13.8721 3.29055 13.8721 3.39542C13.8721 3.50029 13.9129 3.60086 13.9856 3.67502C14.0583 3.74917 14.1569 3.79083 14.2597 3.79083H15.8104C15.9132 3.79083 16.0118 3.74917 16.0845 3.67502C16.1572 3.60086 16.198 3.50029 16.198 3.39542C16.198 3.29055 16.1572 3.18997 16.0845 3.11582C16.0118 3.04166 15.9132 3 15.8104 3H14.2597ZM16.7795 3C16.6767 3 16.5781 3.04166 16.5054 3.11582C16.4327 3.18997 16.3919 3.29055 16.3919 3.39542C16.3919 3.50029 16.4327 3.60086 16.5054 3.67502C16.5781 3.74917 16.6767 3.79083 16.7795 3.79083H21.3346C21.4374 3.79083 21.536 3.74917 21.6087 3.67502C21.6814 3.60086 21.7222 3.50029 21.7222 3.39542C21.7222 3.29055 21.6814 3.18997 21.6087 3.11582C21.536 3.04166 21.4374 3 21.3346 3H16.7795Z">
                                                                </path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2292 5.76953C15.1264 5.76953 15.0278 5.81119 14.9551 5.88535C14.8824 5.9595 14.8415 6.06008 14.8415 6.16495C14.8415 6.26982 14.8824 6.3704 14.9551 6.44455C15.0278 6.51871 15.1264 6.56037 15.2292 6.56037H24.1454C25.653 6.56037 26.5822 6.79999 27.3256 7.18493C27.9575 7.51194 28.4672 7.9467 29.1055 8.49119C29.2375 8.60368 29.3749 8.72073 29.5201 8.84271L29.6101 8.91824L29.726 8.93069C33.2653 9.31069 34.0622 10.5309 34.2246 11.1557V12.6893C34.2246 12.7942 34.1838 12.8948 34.1111 12.9689C34.0384 13.0431 33.9398 13.0847 33.8369 13.0847H32.8356C32.6511 11.9627 31.6943 11.1077 30.5418 11.1077C29.3893 11.1077 28.4325 11.9627 28.248 13.0847H21.2058C21.0212 11.9627 20.0645 11.1077 18.912 11.1077C17.7594 11.1077 16.8027 11.9627 16.6182 13.0847H14.7446C14.6418 13.0847 14.5432 13.1264 14.4705 13.2006C14.3978 13.2747 14.3569 13.3753 14.3569 13.4802C14.3569 13.585 14.3978 13.6856 14.4705 13.7598C14.5432 13.8339 14.6418 13.8756 14.7446 13.8756H16.6182C16.8027 14.9976 17.7594 15.8527 18.912 15.8527C20.0645 15.8527 21.0212 14.9976 21.2058 13.8756H28.248C28.4325 14.9976 29.3893 15.8527 30.5418 15.8527C31.6943 15.8527 32.6511 14.9976 32.8356 13.8756H33.8369C34.1454 13.8756 34.4412 13.7506 34.6593 13.5281C34.8774 13.3057 34.9999 13.0039 34.9999 12.6893V11.0626L34.99 11.0187C34.7431 9.92754 33.5791 8.57502 29.9239 8.15706C29.8217 8.07086 29.7215 7.98505 29.6227 7.90063C28.9828 7.35397 28.3942 6.851 27.6766 6.4795C26.7966 6.02418 25.7391 5.76953 24.1454 5.76953H15.2292ZM28.9912 13.4802C28.9912 13.0607 29.1545 12.6584 29.4453 12.3618C29.7361 12.0651 30.1306 11.8985 30.5418 11.8985C30.9531 11.8985 31.3475 12.0651 31.6383 12.3618C31.9291 12.6584 32.0925 13.0607 32.0925 13.4802C32.0925 13.8996 31.9291 14.302 31.6383 14.5986C31.3475 14.8952 30.9531 15.0618 30.5418 15.0618C30.1306 15.0618 29.7361 14.8952 29.4453 14.5986C29.1545 14.302 28.9912 13.8996 28.9912 13.4802ZM18.912 11.8985C18.5007 11.8985 18.1063 12.0651 17.8155 12.3618C17.5247 12.6584 17.3613 13.0607 17.3613 13.4802C17.3613 13.8996 17.5247 14.302 17.8155 14.5986C18.1063 14.8952 18.5007 15.0618 18.912 15.0618C19.3232 15.0618 19.7176 14.8952 20.0084 14.5986C20.2992 14.302 20.4626 13.8996 20.4626 13.4802C20.4626 13.0607 20.2992 12.6584 20.0084 12.3618C19.7176 12.0651 19.3232 11.8985 18.912 11.8985Z">
                                                                </path>
                                                                <path d="M11 8.14151C11 8.03664 11.0408 7.93606 11.1135 7.86191C11.1862 7.78775 11.2848 7.74609 11.3877 7.74609H15.7489C15.8517 7.74609 15.9503 7.78775 16.023 7.86191C16.0957 7.93606 16.1365 8.03664 16.1365 8.14151C16.1365 8.24638 16.0957 8.34696 16.023 8.42111C15.9503 8.49527 15.8517 8.53693 15.7489 8.53693H11.3877C11.2848 8.53693 11.1862 8.49527 11.1135 8.42111C11.0408 8.34696 11 8.24638 11 8.14151ZM26.6836 8.65278C26.7563 8.72694 26.7971 8.82749 26.7971 8.93234C26.7971 9.03719 26.7563 9.13775 26.6836 9.2119L26.6532 9.24294C26.2897 9.61367 25.7968 9.82197 25.2828 9.82203H19.1409C19.0381 9.82203 18.9395 9.78037 18.8668 9.70622C18.7941 9.63206 18.7532 9.53149 18.7532 9.42662C18.7532 9.32174 18.7941 9.22117 18.8668 9.14701C18.9395 9.07286 19.0381 9.0312 19.1409 9.0312H25.2826C25.4354 9.03122 25.5866 9.00055 25.7277 8.94095C25.8688 8.88134 25.997 8.79397 26.105 8.68382L26.1355 8.65278C26.2082 8.57866 26.3068 8.53701 26.4096 8.53701C26.5123 8.53701 26.6109 8.57866 26.6836 8.65278ZM19.5286 17.7304C19.5286 17.6255 19.5694 17.5249 19.6421 17.4508C19.7148 17.3766 19.8134 17.335 19.9162 17.335H21.5638C21.6666 17.335 21.7652 17.3766 21.8379 17.4508C21.9106 17.5249 21.9514 17.6255 21.9514 17.7304C21.9514 17.8352 21.9106 17.9358 21.8379 18.01C21.7652 18.0841 21.6666 18.1258 21.5638 18.1258H19.9162C19.8134 18.1258 19.7148 18.0841 19.6421 18.01C19.5694 17.9358 19.5286 17.8352 19.5286 17.7304ZM22.2422 17.7304C22.2422 17.6255 22.283 17.5249 22.3557 17.4508C22.4284 17.3766 22.527 17.335 22.6299 17.335H26.991C27.0939 17.335 27.1925 17.3766 27.2652 17.4508C27.3379 17.5249 27.3787 17.6255 27.3787 17.7304C27.3787 17.8352 27.3379 17.9358 27.2652 18.01C27.1925 18.0841 27.0939 18.1258 26.991 18.1258H22.6299C22.527 18.1258 22.4284 18.0841 22.3557 18.01C22.283 17.9358 22.2422 17.8352 22.2422 17.7304Z">
                                                                </path>
                                                            </svg>
                                                            <?php echo $settings['drivco_vehicle_product_slider_content_button_text'] ?>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Vehicle_Slider_Widget());
