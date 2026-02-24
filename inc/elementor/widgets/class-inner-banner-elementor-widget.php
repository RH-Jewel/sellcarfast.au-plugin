<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class drivco_banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Inner Banner', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-select';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_banner_style_section',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_banner_style_selection',
            [
                'label'   => esc_html__('Select Style', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'     => esc_html__('Style One', 'drivco-core'),
                    'style_two'     => esc_html__('Style Two', 'drivco-core'),
                    'style_three'   => esc_html__('Style Three', 'drivco-core'),
                    'style_four'    => esc_html__('Style Four', 'drivco-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        //Style One
        $this->start_controls_section(
            'drivco_banner_section',
            [
                'label' => esc_html__('Banner', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_one',
                ],
            ]
        );


        $this->add_control(
            'drivco_banner_sub-title',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Recommended Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub-title here', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_banner_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Not Sure, Which Car is Best? ', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_banner_right_title',
            [
                'label' => esc_html__('Reccomanded Description', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('A car that is dependable and has a low risk of breakdowns is highly desirable.', 'drivco-core'),
                'placeholder' => esc_html__('Type your Reccomanded title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_banner_inner_sep_four',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'drivco_banner_button_one_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Show Me Best Car', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_banner_button_one_url',
            [
                'label' => esc_html__('Button URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),

            ]
        );

        $this->add_control(
            'drivco_banner_think_img',
            [
                'label' => esc_html__('Think Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        //Style Two 

        $this->start_controls_section(
            'drivco_banner_two_section',
            [
                'label' => esc_html__('Banner', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'drivco_banner_two_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Confusion, Which is Best Car?', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_banner_two_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Car servicing is the regular maintenance and inspection of a vehicle to ensure that it is operating safely and efficiently.', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_banner_inner_sep_five',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'drivco_banner_two_button_icon',
            [
                'label' => esc_html__(' Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-car',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'drivco_banner_button_two_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Show Me Best Car', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_banner_button_two_form_shortcode',
            [
                'label' => esc_html__('Button Modal Shortcode', 'drivco-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_banner_button_two_modal_heading_title',
            [
                'label' => esc_html__('Modal Heading Title', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sell Your Car', 'drivco-core'),
                'label_block' => true,

            ]
        );


        $this->end_controls_section();


        //Style Three
        $this->start_controls_section(
            'drivco_banner_three_section',
            [
                'label' => esc_html__('Banner', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]
        );



        $this->add_control(
            'drivco_banner_three_logo',
            [
                'label' => esc_html__('Choose Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['svg'],

            ]
        );
        $this->add_control(
            'drivco_banner_three_car_price',
            [
                'label' => esc_html__('Product Price', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$74, 345.00', 'drivco-core'),
                'placeholder' => esc_html__('Type your Price here', 'drivco-core'),
                'label_block' => true,

            ]
        );



        $this->add_control(
            'drivco_banner_three_car_model',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Prodcut Model', 'drivco-core'),
                'placeholder' => esc_html__('Type your Model here', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_banner_car_model_url',
            [
                'label' => esc_html__('Product Model URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_banner_three_image',
            [
                'label' => esc_html__('Choose Banner Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],


            ]
        );

        $this->add_control(
            'drivco_banner_three_product_tag_image',
            [
                'label' => esc_html__('Choose Product Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],


            ]
        );

        $this->add_control(
            'drivco_banner_offer_content',
            [
                'label' => esc_html__('Offer Content', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Up To Discount ', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],

            ]
        );
        $this->add_control(
            'drivco_banner_offer_parcentange',
            [
                'label' => esc_html__('Offer Parcentange', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('40% Sale ', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],

            ]
        );
        $this->add_control(
            'drivco_banner_offer_sale',
            [
                'label' => esc_html__('Offer Sale', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__(' Sale ', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],

            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'drivco_banner_three_button_section',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]
        );


        $this->add_control(
            'drivco_banner_button_three_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Show Me Best Car', 'drivco-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'drivco_banner_button_three_url',
            [
                'label' => esc_html__('Button URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );
        $this->end_controls_section();




        //Style Four

        $this->start_controls_section(
            'drivco_banner_four_section',
            [
                'label' => esc_html__('Banner', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );

        $this->add_control(
            'drivco_banner_four_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Sell Your Car With Drivco?', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_banner_four_content',
            [
                'label' => esc_html__('Short Description', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Car servicing is the regular maintenance and inspection of a vehicle to ensure that it is operating safely and efficiently.', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_banner_four_sep_one',
            [
                'label' => esc_html__('Contact', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'drivco_banner_four_contact_logo',
            [
                'label' => esc_html__(' Contact Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],

            ]
        );

        $this->add_control(
            'drivco_banner_four_contact_title',
            [
                'label' => esc_html__('Contact Title', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Call Now', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],

            ]
        );


        $this->add_control(
            'drivco_banner_four_contact_num',
            [
                'label' => esc_html__('Contact Number', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('+990-737 621 432', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],

            ]
        );

        $this->add_control(
            'drivco_banner_four_sep_two',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'drivco_banner_four_button_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Show Me Best Car', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],

            ]
        );


        $this->add_control(
            'drivco_banner_four_button_logo',
            [
                'label' => esc_html__(' Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-car-side',
                    'library' => 'solid',
                ],
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],

            ]
        );

        $this->add_control(
            'drivco_banner_button_four_form_shortcode',
            [
                'label' => esc_html__('Button Modal Shortcode', 'drivco-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],

            ]
        );

        $this->add_control(
            'drivco_banner_button_four_modal_heading_title',
            [
                'label' => esc_html__('Button Modal Heading Title', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sell Your Car', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],

            ]
        );


        $this->end_controls_section();




        //Image Four

        $this->start_controls_section(
            'drivco_banner_four_image_section',
            [
                'label' => esc_html__('Images ', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );
        $this->add_control(
            'drivco_banner_four_background_image',
            [
                'label' => esc_html__('Choose Background Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $this->add_control(
            'drivco_banner_four_image',
            [
                'label' => esc_html__('Choose Banner Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ]
        );
        $this->end_controls_section();


        // =====================Style One=======================//


        //Sub Title

        $this->start_controls_section(
            'drivco_banner_sub-title_sec',
            [
                'label' => esc_html__('Sub-Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_one',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_sub_title_typ',
                'selector' => '{{WRAPPER}} .section-title1 span',

            ]
        );

        $this->add_control(
            'drivco_banner_sub-title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_sub-title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_sub-title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        // Title

        $this->start_controls_section(
            'drivco_banner_title_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_one',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_title_typ_sec',
                'selector' => '{{WRAPPER}} .section-title1 h2',

            ]
        );

        $this->add_control(
            'drivco_banner_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_title_margin',
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
            'drivco_banner_title_padding',
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

        // Right Recommonded Title

        $this->start_controls_section(
            'drivco_banner_right_title_sec',
            [
                'label' => esc_html__('Right Reccomanded Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_one',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_right_title_typ',
                'selector' => '{{WRAPPER}} .recommended-car-section .recommended-right p',

            ]
        );

        $this->add_control(
            'drivco_banner_right_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recommended-car-section .recommended-right p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_right_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .recommended-car-section .recommended-right p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_right_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .recommended-car-section .recommended-right p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Button


        $this->start_controls_section(
            'drivco_bannerbutton_style',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_one',
                ],
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_banner_tabs'
        );

        $this->start_controls_tab(
            'drivco_banner_tab',
            [
                'label' => esc_html__('Normal', 'drivco-core'),
                'condition' => [
                    'drivco_banner_style_selection' => 'style_one',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_btn_typ',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );

        $this->add_control(
            'drivco_banner_btn_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_banner_btn_background',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_btnborder_radius',
            [
                'label'      => __('Border Radius', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primary-btn2::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_btn_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_btn_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_banner_btn_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
                'condition' => [
                    'drivco_banner_style_selection' => 'style_one',
                ],
            ]
        );



        $this->add_control(
            'drivco_banner_btn_color_hover',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover' => '-webkit-text-fill-color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'drivco_banner_btn_background_hover',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2::after' => 'background: {{VALUE}}',
                ],
            ]
        );




        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        // =====================Style Two=======================//


        // Title

        $this->start_controls_section(
            'drivco_banner_two_title_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_two',
                ],
            ]

        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_two_title_typ',
                'selector' => '{{WRAPPER}} .home2-inner-banner .inner-banner-content h2',

            ]
        );

        $this->add_control(
            'drivco_banner_two_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-inner-banner .inner-banner-content h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_two_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-inner-banner .inner-banner-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_two_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-inner-banner .inner-banner-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Content

        $this->start_controls_section(
            'drivco_banner_two_content_sec',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_two',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_two_content_typ',
                'selector' => '{{WRAPPER}} .home2-inner-banner .inner-banner-content p',

            ]
        );

        $this->add_control(
            'drivco_banner_two_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-inner-banner .inner-banner-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_two_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-inner-banner .inner-banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_two_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-inner-banner .inner-banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Button


        $this->start_controls_section(
            'drivco_banner_button_two_style',
            [
                'label' => esc_html__('Banner Two Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_two',
                ],
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_banner_two_tabs'

        );

        $this->start_controls_tab(
            'drivco_banner_two_tab',
            [
                'label' => esc_html__('Normal', 'drivco-core'),
                'condition' => [
                    'drivco_banner_style_selection' => 'style_two',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_two_btn_typ',
                'selector' => '{{WRAPPER}} .primary-btn3',

            ]
        );

        $this->add_control(
            'drivco_banner_two_btn_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_banner_two_btn_background',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_two_btnborder_radius',
            [
                'label'      => __('Border Radius', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primary-btn3::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_two_btn_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_two_btn_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_banner_two_btn_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
                'condition' => [
                    'drivco_banner_style_selection' => 'style_two',
                ],
            ]
        );



        $this->add_control(
            'drivco_banner_two_btn_color_hover',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => '-webkit-text-fill-color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'drivco_banner_two_btn_background_hover',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3::after' => 'background: {{VALUE}}',
                ],
            ]
        );




        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style Three=======================//


        // Car Price

        $this->start_controls_section(
            'drivco_banner_three_car_price_sec',
            [
                'label' => esc_html__('Product Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]

        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_three_car_price_typ',
                'selector' => '{{WRAPPER}} .home3-inner-banner .content .price h4',

            ]
        );

        $this->add_control(
            'drivco_banner_three_car_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content .price h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_three_car_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content .price h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_three_car_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-inner-banner .content .price h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Car Model

        $this->start_controls_section(
            'drivco_banner_three_car_model_sec',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]

        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_three_car_model_typ',
                'selector' => '{{WRAPPER}} .home3-inner-banner .content h5 a',

            ]
        );

        $this->add_control(
            'drivco_banner_three_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content h5 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_three_car_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_three_car_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-inner-banner .content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Button Three


        $this->start_controls_section(
            'drivco_banner_button_three_style',
            [
                'label' => esc_html__('Banner Three Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_banner_button_three_style_tabs'

        );

        $this->start_controls_tab(
            'drivco_banner_button_three_style_tab',
            [
                'label' => esc_html__('Normal', 'drivco-core'),
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_button_three_btn_typ',
                'selector' => '{{WRAPPER}} .home3-inner-banner .content .primary-btn3',

            ]
        );

        $this->add_control(
            'drivco_banner_button_three_btn_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content .primary-btn3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_banner_button_three_btn_background',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content .primary-btn3' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_button_three_btn_border_radius',
            [
                'label'      => __('Border Radius', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-inner-banner .content .primary-btn3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home3-inner-banner .content .primary-btn3::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_button_three_btn_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_button_three_btn_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-inner-banner .content .primary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_banner_button_three_btn_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]
        );



        $this->add_control(
            'drivco_banner_button_three_btn_color_hover',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content .primary-btn3:hover' => '-webkit-text-fill-color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'drivco_banner_button_three_btn_background_hover',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .content .primary-btn3::after' => 'background: {{VALUE}}',
                ],
            ]
        );




        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Offer Content

        $this->start_controls_section(
            'drivco_banner_three_offer_content_sec',
            [
                'label' => esc_html__('Offer Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]

        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_three_offer_content_typ',
                'selector' => '{{WRAPPER}} .home3-inner-banner .offer-tag .offer-content p',

            ]
        );

        $this->add_control(
            'drivco_banner_three_offer_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .offer-tag .offer-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_three_offer_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .offer-tag .offer-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_three_offer_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-inner-banner .offer-tag .offer-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Offer Parcentange

        $this->start_controls_section(
            'drivco_banner_three_offer_parcentange_sec',
            [
                'label' => esc_html__('Offer Parcentange', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_three',
                ],
            ]

        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_three_offer_parcentange_typ',
                'selector' => '{{WRAPPER}} .home3-inner-banner .offer-tag .offer-content span',

            ]
        );

        $this->add_control(
            'drivco_banner_three_offer_parcentange_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .offer-tag .offer-content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_three_offer_parcentange_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-inner-banner .offer-tag .offer-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_three_offer_parcentange_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-inner-banner .offer-tag .offer-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        // =====================Style Four=======================//


        // Title
        $this->start_controls_section(
            'drivco_banner_four_title_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_four_title_typ',
                'selector' => '{{WRAPPER}} .home4-inner-banner-section .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_banner_four_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        // Sub Title

        $this->start_controls_section(
            'drivco_banner_four_sub_title_sec',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_four_sub_title_typ_sec',
                'selector' => '{{WRAPPER}} .home4-inner-banner-section .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_banner_four_sub_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_sub_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_sub_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Button
        $this->start_controls_section(
            'drivco_banner_four_button_style',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_banner_four_tabs'
        );

        $this->start_controls_tab(
            'drivco_banner_four_tab',
            [
                'label' => esc_html__('Normal', 'drivco-core'),
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_four_btn_typ',
                'selector' => '{{WRAPPER}} .primary-btn3',

            ]
        );

        $this->add_control(
            'drivco_banner_four_btn_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_banner_four_btn_background',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_btn_border_radius',
            [
                'label'      => __('Border Radius', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primary-btn3::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_btn_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_btn_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_banner_four_btn_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );



        $this->add_control(
            'drivco_banner_four_btn_color_hover',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => '-webkit-text-fill-color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'drivco_banner_four_btn_background_hover',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3::after' => 'background: {{VALUE}}',
                ],
            ]
        );




        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        // Contact Title

        $this->start_controls_section(
            'drivco_banner_four_contact_title_sec',
            [
                'label' => esc_html__('Contact Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_four_contact_title_typ_sec',
                'selector' => '{{WRAPPER}} .home4-inner-banner-section .section-title-2 .sell-btn-and-contact-info .hotline-area .content span',

            ]
        );

        $this->add_control(
            'drivco_banner_four_contact_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 .sell-btn-and-contact-info .hotline-area .content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_contact_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 .sell-btn-and-contact-info .hotline-area .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_contact_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 .sell-btn-and-contact-info .hotline-area .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Contact Number

        $this->start_controls_section(
            'drivco_banner_four_contact_number_sec',
            [
                'label' => esc_html__('Contact Number', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_banner_style_selection' => 'style_four',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_banner_four_contact_number_typ_sec',
                'selector' => '{{WRAPPER}} .home4-inner-banner-section .section-title-2 .sell-btn-and-contact-info .hotline-area .content h6 a',

            ]
        );

        $this->add_control(
            'drivco_banner_four_contact_number_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 .sell-btn-and-contact-info .hotline-area .content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_contact_number_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 .sell-btn-and-contact-info .hotline-area .content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_banner_four_contact_number_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-inner-banner-section .section-title-2 .sell-btn-and-contact-info .hotline-area .content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['drivco_banner_style_selection'] == 'style_one') : ?>
            <div class="recommended-car-section">
                <div class="row g-4">
                    <div class="col-lg-8 d-flex align-items-lg-end justify-content-center">
                        <div class="recommended-left">
                            <div class="section-title1">
                                <?php if (!empty($settings['drivco_banner_sub-title'])) :   ?>
                                    <span><?php echo wp_kses($settings['drivco_banner_sub-title'], wp_kses_allowed_html('post'))  ?></span>
                                <?php endif ?>
                                <?php if (!empty($settings['drivco_banner_title'])) :   ?>
                                    <h2><?php echo wp_kses($settings['drivco_banner_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                            </div>
                            <div class="think-img">
                                <?php if (!empty($settings['drivco_banner_think_img']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['drivco_banner_think_img']['url']) ?>" alt="<?php echo esc_attr('think image', 'drivco-core') ?>">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-lg-end justify-content-center">
                        <div class="recommended-right">
                            <?php if (!empty($settings['drivco_banner_right_title'])) :   ?>
                                <p><?php echo wp_kses($settings['drivco_banner_right_title'], wp_kses_allowed_html('post'))  ?></p>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_banner_button_one_text'])) :   ?>
                                <a class="primary-btn2" href="<?php echo esc_url($settings['drivco_banner_button_one_url']['url']) ?>"><?php echo esc_html($settings['drivco_banner_button_one_text']) ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['drivco_banner_style_selection'] == 'style_two') : ?>
            <div class="home2-inner-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner-banner-content section-title-2">
                                <?php if (!empty($settings['drivco_banner_two_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['drivco_banner_two_title']) ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_banner_two_content'])) :   ?>
                                    <p><?php echo esc_html($settings['drivco_banner_two_content']) ?></p>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_banner_button_two_text'])) :   ?>
                                    <button class="primary-btn3" type="button" data-bs-toggle="modal" data-bs-target="#sellUsModal01">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['drivco_banner_two_button_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php echo esc_html($settings['drivco_banner_button_two_text']) ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal signUp-modal sell-with-us fade" id="sellUsModal01" tabindex="-1" aria-labelledby="sellUsModal01Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <?php if (!empty($settings['drivco_banner_button_two_modal_heading_title'])) :   ?>
                                <h4 class="modal-title" id="sellUsModal01Label"><?php echo esc_html($settings['drivco_banner_button_two_modal_heading_title']) ?></h4>
                            <?php endif; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                        </div>
                        <div class="modal-body">
                            <?php echo do_shortcode($settings['drivco_banner_button_two_form_shortcode'])  ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['drivco_banner_style_selection'] == 'style_three') : ?>
            <div class="home3-inner-banner">
                <div class="container-lg container-fluid">
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-center justify-content-md-between justify-content-center flex-md-nowrap flex-wrap gap-md-3 gap-4">
                            <div class="content">
                                <div class="logo">
                                    <?php if (!empty($settings['drivco_banner_three_logo']['url'])) :   ?>
                                        <img src="<?php echo esc_url($settings['drivco_banner_three_logo']['url']) ?>" alt="<?php echo esc_attr('Banner Logo', 'drivco-core') ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="price">
                                    <?php if (!empty($settings['drivco_banner_three_car_price'])) :   ?>
                                        <h4><?php echo esc_html($settings['drivco_banner_three_car_price']) ?></h4>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['drivco_banner_three_car_model'])) :   ?>
                                    <h5><a href="<?php echo esc_url($settings['drivco_banner_car_model_url']['url']) ?>"><?php echo wp_kses($settings['drivco_banner_three_car_model'], wp_kses_allowed_html('post'))  ?></a></h5>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_banner_button_three_text'])) :   ?>
                                    <a class="primary-btn3" href="<?php echo esc_url($settings['drivco_banner_button_three_url']['url']) ?>"><?php echo esc_html($settings['drivco_banner_button_three_text']) ?> <i class="bi bi-arrow-right"></i></a>
                                <?php endif; ?>
                            </div>
                            <div class="product-img">
                                <?php if (!empty($settings['drivco_banner_three_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['drivco_banner_three_image']['url']) ?>" alt="<?php echo esc_attr('banner_three image', 'drivco-core') ?>">
                                <?php endif; ?>
                            </div>
                            <div class="offer-tag">
                                <img src="<?php echo esc_url($settings['drivco_banner_three_product_tag_image']['url']) ?>" alt="<?php echo esc_attr('product_tag image', 'drivco-core') ?>">
                                <div class="offer-content">
                                    <?php if (!empty($settings['drivco_banner_offer_content'])) :   ?>
                                        <p><?php echo wp_kses($settings['drivco_banner_offer_content'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['drivco_banner_offer_parcentange'])) :   ?>
                                        <span><i class="bi bi-star-fill"></i><?php echo wp_kses($settings['drivco_banner_offer_parcentange'], wp_kses_allowed_html('post'))  ?><i class="bi bi-star-fill"></i></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['drivco_banner_offer_sale'])) :   ?>
                                        <p> <?php echo wp_kses($settings['drivco_banner_offer_sale'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['drivco_banner_style_selection'] == 'style_four') : ?>
            <div class="home4-inner-banner-section">
                <div class="container">
                    <div class="row gy-5">
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_banner_four_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['drivco_banner_four_title']) ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_banner_four_content'])) :   ?>
                                    <p><?php echo esc_html($settings['drivco_banner_four_content']) ?></p>
                                <?php endif; ?>
                                <div class="sell-btn-and-contact-info">
                                    <?php if (!empty($settings['drivco_banner_four_button_text'])) :   ?>
                                        <button class="primary-btn3" type="button" data-bs-toggle="modal" data-bs-target="#sellUsModal01">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['drivco_banner_four_button_logo'], ['aria-hidden' => 'true']); ?>
                                            <?php echo esc_html($settings['drivco_banner_four_button_text']) ?>
                                        </button>
                                    <?php endif; ?>
                                    <span>Or,</span>
                                    <div class="hotline-area">
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['drivco_banner_four_contact_logo'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                        <div class="content">
                                            <?php if (!empty($settings['drivco_banner_four_contact_title'])) :   ?>
                                                <span><?php echo esc_html($settings['drivco_banner_four_contact_title']) ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['drivco_banner_four_contact_num'])) :   ?>
                                                <h6><a href="tel:<?php echo str_replace(['+', '-', ' '], '', esc_attr($settings['drivco_banner_four_contact_num'])) ?>"><?php echo esc_html($settings['drivco_banner_four_contact_num']) ?></a></h6>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-lg-end justify-content-sm-center justify-content-end">
                            <div class="inner-banner-img">
                                <div class="background-img">
                                    <?php if (!empty($settings['drivco_banner_four_background_image']['url'])) :   ?>
                                        <img src="<?php echo esc_url($settings['drivco_banner_four_background_image']['url']) ?>" alt="<?php echo esc_attr('Background Image', 'drivco-core') ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="car-img">
                                    <?php if (!empty($settings['drivco_banner_four_image']['url'])) :   ?>
                                        <img src="<?php echo esc_url($settings['drivco_banner_four_image']['url']) ?>" alt="<?php echo esc_attr('Banner Image', 'drivco-core') ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal signUp-modal sell-with-us fade" id="sellUsModal01" tabindex="-1" aria-labelledby="sellUsModal01Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="sellUsModal01Label"><?php echo esc_html($settings['drivco_banner_button_four_modal_heading_title']) ?></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                        </div>
                        <div class="modal-body">
                            <?php echo do_shortcode($settings['drivco_banner_button_four_form_shortcode'])  ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new drivco_banner_Widget());
