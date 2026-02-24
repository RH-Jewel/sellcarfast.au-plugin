<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core;
use Egns_Core\Egns_Helper;
use Elementor\core\Schemes;

class Drivco_Brand_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_brands';
    }

    public function get_title()
    {
        return esc_html__('EG Vehicle Brand', 'drivco-core');
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

        //grneral section
        $this->start_controls_section(
            'drivco_vehicle_brand_general_sec',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_brand_style_choose',
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
            'drivco_vehicle_brands',
            [
                'label' => __('Select Product Brand', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' =>  Egns_Core\Egns_Helper::get_all_brand(),
                'default' =>  Egns_Core\Egns_Helper::get_all_brand_key(),
            ]
        );

        $this->add_control(
            'drivco_vehicle_body_type',
            [
                'label' => __('Select Product Body Types', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' =>  Egns_Core\Egns_Helper::get_all_body(),
                'default' =>  Egns_Core\Egns_Helper::get_all_body_key(),
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_locations',
            [
                'label' => __('Select Product Locations', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' =>  Egns_Core\Egns_Helper::get_all_location(),
                'default' =>  Egns_Core\Egns_Helper::get_all_location_key(),
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],
            ]
        );

        $this->add_control(
            'drivco_brand_content_title',
            [
                'label' => esc_html__('Content Title One', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('1. Brand Category', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],

            ]
        );

        $this->add_control(
            'drivco_brand_content_title_two',
            [
                'label' => esc_html__('Content Title Two', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2. Search Area', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],

            ]
        );

        $this->add_control(
            'drivco_brand_content_form_title',
            [
                'label' => esc_html__('Form Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Find Your Dream Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],

            ]
        );


        $this->add_control(
            'drivco_brand_content_tab_one_text',
            [
                'label' => esc_html__('Tab Text One', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Make', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],

            ]
        );

        $this->add_control(
            'drivco_brand_content_tab_two_text',
            [
                'label' => esc_html__('Tab Text Two', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Body Type', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],

            ]
        );

        $this->add_control(
            'drivco_brand_content_tab_three_text',
            [
                'label' => esc_html__('Tab Text Three', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Location', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],

            ]
        );


        $this->add_control(
            'drivco_brand_content_text',
            [
                'label' => esc_html__('Content Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Available Cars', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two', 'style_three', 'style_four'],
                ],
            ]
        );


        $this->add_control(
            'drivco_vehicle_brand_count_label',
            [
                'label' => esc_html__('Bottom short text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('There has 30+ Brand Category Available', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_one'],
                ],
            ]
        );

        $this->end_controls_section();


        //Counter
        $this->start_controls_section(
            'drivco_brand_counter_section',
            [
                'label' => esc_html__('Counter List', 'drivco-core'),
                'condition' => [
                    'drivco_brand_style_choose' => ['style_six'],
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'drivco_brand_counter_logo',
            [
                'label' => esc_html__('Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-car',
                    'library' => 'solid',
                ],

            ]
        );
        $repeater->add_control(
            'drivco_brand_counter_number_of_activity',
            [
                'label' => esc_html__('Number Of Activity', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('600', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_brand_counter_number_of_activity_tag',
            [
                'label' => esc_html__('Number Of Activity Tag', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('K+', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_brand_counter_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 15,
                'default' => esc_html__('Car Available', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_brand_counter_list',
            [
                'label' => esc_html__('Counters', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_brand_counter_number_of_activity' => esc_html__('600', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_brand_counter_number_of_activity }}}',
            ]
        );
        $this->end_controls_section();

        //button content
        $this->start_controls_section(
            'drivco_brand_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'condition' => [
                    'drivco_brand_style_choose' => ['style_one', 'style_two', 'style_four', 'style_five'],
                ],
            ]
        );

        $this->add_control(
            'drivco_brand_show_button_area',
            [
                'label' => esc_html__('Show Button Area', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'drivco_brand_style_choose' => ['style_one', 'style_four'],
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_view_btn_label',
            [
                'label' => esc_html__('Button Label', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View More', 'drivco-core'),
                'placeholder' => esc_html__('Type here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_view_btn_link',
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

        // End Design tab 


        $this->start_controls_section(
            'drivco_vehicle_brand_heading_content',
            [
                'label' => esc_html__('Heading', 'drivco-core'),
                'condition' => [
                    'drivco_brand_style_choose!' => 'style_one', // Show for all styles except 'style_one'
                ]
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_heading_content_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Brand Categoryy', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_vehicle_brand_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('There has 30+ Brand Category Available', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Start Style Section 
        $this->start_controls_section(
            'drivco_vehicle_brand_style_section',
            [
                'label' => esc_html__('Icon', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_one'],
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_icon',
            [
                'label' => esc_html__('Brand Icon Size', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .brand-category-area .single-category1 .brand-icon img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        //style_one bottom text
        $this->start_controls_section(
            'drivco_brand_style_one_bottom_text',
            [
                'label' => esc_html__('Bottom Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_one_bottom_text_typ',
                'selector' => '{{WRAPPER}} .view-btn-area p',
            ]
        );
        $this->add_control(
            'drivco_brand_style_one_bottom_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn-area p' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_brand_style_one_bottom_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .view-btn-area p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_brand_style_one_bottom_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .view-btn-area p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_one butotn
        $this->start_controls_section(
            'drivco_brand_style_one_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_one_button_typ',
                'selector' => '{{WRAPPER}} .view-btn',
            ]
        );

        $this->add_control(
            'drivco_brand_style_one_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn:hover' => 'color: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'drivco_brand_style_one_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'drivco_brand_style_one_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn::after' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'drivco_brand_style_one_button_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .view-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_brand_style_one_button_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .view-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style two


        //style_two heading title
        $this->start_controls_section(
            'drivco_brand_style_two_heading_title',
            [
                'label' => esc_html__('Heading Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_two_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2.styletwobrandt',
            ]
        );
        $this->add_control(
            'drivco_brand_style_two_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.styletwobrandt' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_brand_style_two_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.styletwobrandt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_brand_style_two_heading_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 h2.styletwobrandt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_two heading subtitle
        $this->start_controls_section(
            'drivco_brand_style_two_heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_two_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p.styletwobrands',
            ]
        );
        $this->add_control(
            'drivco_brand_style_two_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.styletwobrands' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_brand_style_two_heading_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.styletwobrands' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_brand_style_two_heading_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 p.styletwobrands' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_two active_tab
        $this->start_controls_section(
            'drivco_brand_style_two_active_tab',
            [
                'label' => esc_html__('Tab Active', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_two_active_tab_typ',
                'selector' => '{{WRAPPER}} .dream-car-area .nav-pills li button:hover',
            ]
        );
        $this->add_control(
            'drivco_brand_style_two_active_tab_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream-car-area .nav-pills li button:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_two_active_tab_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .dream-car-area .nav-pills li button:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_two_active_tab_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .dream-car-area .nav-pills li button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_two tab
        $this->start_controls_section(
            'drivco_brand_style_two_tab',
            [
                'label' => esc_html__('Tab', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_two_tab_typ',
                'selector' => '{{WRAPPER}} .dream-car-area .nav-pills li button',
            ]
        );
        $this->add_control(
            'drivco_brand_style_two_tab_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream-car-area .nav-pills li button' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_two_tab_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .dream-car-area .nav-pills li button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_two_tab_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .dream-car-area .nav-pills li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_two button
        $this->start_controls_section(
            'drivco_brand_style_two_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_two_button_typ',
                'selector' => '{{WRAPPER}} .explore-btn2',
            ]
        );
        $this->add_control(
            'drivco_brand_style_two_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .explore-btn2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'drivco_brand_style_two_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .explore-btn2:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_two_button_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .explore-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_two_button_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .explore-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_two content text
        $this->start_controls_section(
            'drivco_brand_style_two_content_text',
            [
                'label' => esc_html__('Content Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_two_content_text_typ',
                'selector' => '{{WRAPPER}} .dream-car-area .car-category .content h6',
            ]
        );
        $this->add_control(
            'drivco_brand_style_two_content_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream-car-area .car-category .content h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_two_content_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .dream-car-area .car-category .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_two_content_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .dream-car-area .car-category .content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_three 

        //style_three heading title
        $this->start_controls_section(
            'drivco_brand_style_three_heading_title',
            [
                'label' => esc_html__('Heading Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_three_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2.stylethreebrandt',
            ]
        );
        $this->add_control(
            'drivco_brand_style_three_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.stylethreebrandt' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.stylethreebrandt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_heading_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 h2.stylethreebrandt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_three heading subtitle
        $this->start_controls_section(
            'drivco_brand_style_three_heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_three_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p.stylethreebrands',
            ]
        );
        $this->add_control(
            'drivco_brand_style_three_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.stylethreebrands' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_heading_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.stylethreebrands' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_heading_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 p.stylethreebrands' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_three brand title
        $this->start_controls_section(
            'drivco_brand_style_three_brand_title',
            [
                'label' => esc_html__('Brand Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_three_brand_title_typ',
                'selector' => '{{WRAPPER}} .brand-category-section .brand-category-card .category-content h5 a',
            ]
        );

        $this->add_control(
            'drivco_brand_style_three_brand_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .category-content h5 a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'drivco_brand_style_three_brand_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .category-content h5 a' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_brand_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .category-content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_brand_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .category-content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_three content text
        $this->start_controls_section(
            'drivco_brand_style_three_content_text',
            [
                'label' => esc_html__('Content Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_three_content_text_typ',
                'selector' => '{{WRAPPER}} .brand-category-section .brand-category-card .category-content span',
            ]
        );
        $this->add_control(
            'drivco_brand_style_three_content_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .category-content span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_content_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .category-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_content_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .category-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_three Best Deal
        $this->start_controls_section(
            'drivco_brand_style_three_best_deal',
            [
                'label' => esc_html__('Best Deal', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_three_best_deal_typ',
                'selector' => '{{WRAPPER}} .brand-category-section .brand-category-card .batch span',
            ]
        );
        $this->add_control(
            'drivco_brand_style_three_best_deal_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .batch span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'drivco_brand_style_three_best_deal_bg_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .batch span' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_best_deal_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .batch span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_three_best_deal_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .brand-category-section .brand-category-card .batch span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_four 


        //style_four Best Deal
        $this->start_controls_section(
            'drivco_brand_style_four_heading_title',
            [
                'label' => esc_html__('Heading Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_four_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2.stylefourbrandt',
            ]
        );
        $this->add_control(
            'drivco_brand_style_four_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.stylefourbrandt' => 'color: {{VALUE}};',

                ],
            ]
        );



        $this->add_responsive_control(
            'drivco_brand_style_four_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.stylefourbrandt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_heading_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 h2.stylefourbrandt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_four subtitle
        $this->start_controls_section(
            'drivco_brand_style_four_heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_four_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p.stylefourbrands',
            ]
        );
        $this->add_control(
            'drivco_brand_style_four_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.stylefourbrands' => 'color: {{VALUE}};',

                ],
            ]
        );



        $this->add_responsive_control(
            'drivco_brand_style_four_heading_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.stylefourbrands' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_heading_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 p.stylefourbrands' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_four content heading one
        $this->start_controls_section(
            'drivco_brand_style_four_content_heading',
            [
                'label' => esc_html__('Content Heading', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_four_content_heading_one_typ',
                'selector' => '{{WRAPPER}} .home3-available-car .sub-title h5',
            ]
        );
        $this->add_control(
            'drivco_brand_style_four_content_heading_one_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .sub-title h5' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_content_heading_one_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .sub-title h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_content_heading_one_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-available-car .sub-title h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_four content text
        $this->start_controls_section(
            'drivco_brand_style_four_content_text',
            [
                'label' => esc_html__('Content Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_four_content_text_typ',
                'selector' => '{{WRAPPER}} .home3-available-car .car-category .content h6',
            ]
        );
        $this->add_control(
            'drivco_brand_style_four_content_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .car-category .content h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_content_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .car-category .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_content_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-available-car .car-category .content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_four content counter
        $this->start_controls_section(
            'drivco_brand_style_four_counter',
            [
                'label' => esc_html__('Counter', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_four_counter_typ',
                'selector' => '{{WRAPPER}} .home3-available-car .car-category .content span',
            ]
        );
        $this->add_control(
            'drivco_brand_style_four_counter_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .car-category .content span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_counter_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .car-category .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_counter_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-available-car .car-category .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_four button
        $this->start_controls_section(
            'drivco_brand_style_four_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_four_button_typ',
                'selector' => '{{WRAPPER}} .home3-available-car .explore-btn a',
            ]
        );

        $this->add_control(
            'drivco_brand_style_four_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .explore-btn a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'drivco_brand_style_four_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .explore-btn a' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_button_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .explore-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_button_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-available-car .explore-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_four form title
        $this->start_controls_section(
            'drivco_brand_style_four_form_title',
            [
                'label' => esc_html__('Form Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_four_form_title_typ',
                'selector' => '{{WRAPPER}} .home3-available-car .car-filter-area h4',
            ]
        );


        $this->add_control(
            'drivco_brand_style_four_form_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .car-filter-area h4' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_form_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-available-car .car-filter-area h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_four_form_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-available-car .car-filter-area h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();



        //style_five 

        //style_four heading title
        $this->start_controls_section(
            'drivco_brand_style_five_heading_title',
            [
                'label' => esc_html__('Heading Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_five'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_five_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2.stylefivebrandt',
            ]
        );


        $this->add_control(
            'drivco_brand_style_five_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.stylefivebrandt' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.stylefivebrandt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_heading_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 h2.stylefivebrandt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_four heading subtitle
        $this->start_controls_section(
            'drivco_brand_style_five_heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_five'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_five_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p.stylefivebrands',
            ]
        );


        $this->add_control(
            'drivco_brand_style_five_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.stylefivebrands' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_heading_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.stylefivebrands' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_heading_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 p.stylefivebrands' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_five heading subtitle
        $this->start_controls_section(
            'drivco_brand_style_five_brand_title',
            [
                'label' => esc_html__('Brand Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_five'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_five_brand_title_typ',
                'selector' => '{{WRAPPER}} .single-category5 .category-content h5 a',
            ]
        );


        $this->add_control(
            'drivco_brand_style_five_brand_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .category-content h5 a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'drivco_brand_style_five_brand_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .category-content h5 a' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_brand_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .category-content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_brand_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-category5 .category-content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_five counter
        $this->start_controls_section(
            'drivco_brand_style_five_brand_counter',
            [
                'label' => esc_html__('Counter', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_five'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_five_brand_counter_typ',
                'selector' => '{{WRAPPER}} .single-category5 .category-content span',
            ]
        );



        $this->add_control(
            'drivco_brand_style_five_brand_counter_colors',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .category-content span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_brand_counter_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .category-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_brand_counter_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-category5 .category-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_five button
        $this->start_controls_section(
            'drivco_brand_style_five_brand_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_five'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_five_brand_button_typ',
                'selector' => '{{WRAPPER}} .single-category5 .explore-btn5 a span',
            ]
        );



        $this->add_control(
            'drivco_brand_style_five_brand_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .explore-btn5 a span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'drivco_brand_style_five_brand_button_arrow_bg_color',
            [
                'label'     => esc_html__('Arrow Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-category5:hover .explore-btn5 a i' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'drivco_brand_style_five_brand_button_arrow_color',
            [
                'label'     => esc_html__('Arrow Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .explore-btn5 a i' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'drivco_brand_style_five_brand_button_arrow_border_color',
            [
                'label'     => esc_html__('Arrow Border Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .explore-btn5 a i' => 'border: 1px solid {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_brand_button_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-category5 .explore-btn5 a span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_five_brand_button_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .single-category5 .explore-btn5 a span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_six  


        //style_six heading title
        $this->start_controls_section(
            'drivco_brand_style_six_heading_title',
            [
                'label' => esc_html__('Heading Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_six'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_six_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2.stylesixbrandt',
            ]
        );



        $this->add_control(
            'drivco_brand_style_six_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.stylesixbrandt' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2.stylesixbrandt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_heading_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 h2.stylesixbrandt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_six heading subtitle
        $this->start_controls_section(
            'drivco_brand_style_six_heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_six'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_six_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p.stylesixbrands',
            ]
        );



        $this->add_control(
            'drivco_brand_style_six_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.stylesixbrands' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_heading_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p.stylesixbrands' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_heading_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 p.stylesixbrands' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_six brand title
        $this->start_controls_section(
            'drivco_brand_style_six_brand_title',
            [
                'label' => esc_html__('Brand Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_six'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_six_brand_title_typ',
                'selector' => '{{WRAPPER}} .home6-brand-section .car-category .content h6',
            ]
        );



        $this->add_control(
            'drivco_brand_style_six_brand_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .car-category .content h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_brand_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .car-category .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_brand_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-brand-section .car-category .content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //style_six counters
        $this->start_controls_section(
            'drivco_brand_style_six_brand_counter',
            [
                'label' => esc_html__('Counter', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_six'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_six_brand_counter_typ',
                'selector' => '{{WRAPPER}} .home6-brand-section .car-category .content span',
            ]
        );



        $this->add_control(
            'drivco_brand_style_six_brand_counter_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .car-category .content span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_brand_counter_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .car-category .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_brand_counter_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-brand-section .car-category .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //brand logo style six
        $this->start_controls_section(
            'drivco_vehicle_brand_style_six_section',
            [
                'label' => esc_html__('Brand Logo', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_six'],
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_icon_six',
            [
                'label' => esc_html__('Brand Icon Size', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //style_six  counter number
        $this->start_controls_section(
            'drivco_brand_style_six_brand_b_counter',
            [
                'label' => esc_html__('Count Number', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_six'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_six_brand_counter_b_typ',
                'selector' => '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number h5',
            ]
        );



        $this->add_control(
            'drivco_brand_style_six_brand_counter_b_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_brand_counter_b_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_brand_counter_b_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //style_six  counter text
        $this->start_controls_section(
            'drivco_brand_style_six_brand_b_counter_text',
            [
                'label' => esc_html__('Counter Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_brand_style_choose' => ['style_six'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_brand_style_six_brand_b_counter_text_typ',
                'selector' => '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p',
            ]
        );



        $this->add_control(
            'drivco_brand_style_six_brand_b_counter_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p' => 'color: {{VALUE}};',


                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_brand_b_counter_text_marign',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_brand_style_six_brand_b_counter_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $selected_bnd_ids = $settings['drivco_vehicle_brands'];

        $selected_body_ids = $settings['drivco_vehicle_body_type'];

        $selected_location_ids = $settings['drivco_vehicle_locations'];

        if (!empty($settings['drivco_vehicle_brand_view_btn_link']['url'])) {
            $this->add_link_attributes('drivco_vehicle_brand_view_btn_link', $settings['drivco_vehicle_brand_view_btn_link']);
        }

        // Brand Query 
        $brand_args = [];
        $brand_args['taxonomy'] = 'vehicle-brand';
        $brand_args['count']  = true;
        if (!empty($selected_bnd_ids) && count($selected_bnd_ids) > 0) {
            $brand_args['slug']  = $selected_bnd_ids;
        } else {
            $brand_args['number']  = 6;
        }

        $brands = get_terms($brand_args);

        // Body Query 
        $body_args = [];
        $body_args['taxonomy'] = 'body-type';
        $body_args['count']  = true;
        if (!empty($selected_body_ids) && count($selected_body_ids) > 0) {
            $body_args['slug']  = $selected_body_ids;
        } else {
            $body_args['number']  = 6;
        }

        $bodys = get_terms($body_args);

        // Location Query 
        $location_args = [];
        $location_args['taxonomy'] = 'location';
        $location_args['count']  = true;
        if (!empty($selected_location_ids) && count($selected_location_ids) > 0) {
            $location_args['slug']  = $selected_location_ids;
        } else {
            $location_args['number']  = 6;
        }

        $locations = get_terms($location_args);


        $data = $settings['drivco_brand_counter_list'];

?>
        <?php
        if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".brand-category-slider", {
                    speed: 1500,
                    slidesPerView: 4,
                    spaceBetween: 25,
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
                            slidesPerView: 4,
                        },
                    }
                });

                var swiper = new Swiper(".home5-brand-category-slider", {
                    speed: 1500,
                    slidesPerView: 6,
                    spaceBetween: 25,
                    autoplay: {
                        delay: 3000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-52",
                        prevEl: ".prev-52",
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        420: {
                            slidesPerView: 2,
                            spaceBetween: 15,
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
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 5,
                            spaceBetween: 24,
                        },
                        1400: {
                            slidesPerView: 6
                        },
                    },
                });

                var swiper = new Swiper(".home6-brand-category-slider", {
                    speed: 1500,
                    slidesPerView: 6,
                    spaceBetween: 25,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
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
                        420: {
                            slidesPerView: 2,
                            spaceBetween: 15,
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
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 5,
                            spaceBetween: 24,
                        },
                        1400: {
                            slidesPerView: 6
                        },
                    }
                });

                //  Home4 categoty-filter-slider slider
                var swiper = new Swiper(".categoty-filter-slider", {
                    slidesPerView: 3,
                    speed: 1500,
                    spaceBetween: 15,
                    centerSlides: true,
                    loop: false,
                    navigation: {
                        nextEl: ".next-10",
                        prevEl: ".prev-10",
                    },

                });
                // For Service Select
                $('.select-wrap').on('click', function() {
                    $(this).addClass('selected').siblings().removeClass('selected');
                })
            </script>

        <?php endif; ?>


        <?php if ($settings['drivco_brand_style_choose'] == 'style_one') : ?>
            <div class="brand-category-area">
                <div class="container">
                    <div class="row row-cols-xl-6 row-cols-lg-5 row-cols-md-3 row-cols-sm-3 row-cols-2 g-4 justify-content-center">

                        <?php
                        foreach ((array) $brands as $brand) {
                            $meta = get_term_meta($brand->term_id, 'drivco_brand_taxonomy', true);
                        ?>
                            <div class="col">
                                <a href="<?php echo get_term_link($brand->slug, 'vehicle-brand') ?> " class="single-category1">
                                    <?php if (!empty($meta['drivco_brand_logo']['url'])) :   ?>
                                        <div class="brand-icon">
                                            <img src="<?php echo $meta['drivco_brand_logo']['url']; ?>" alt="<?php echo esc_attr__('brand-icon', 'drivco-core') ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($meta['drivco_brand_thumb']['url'])) :   ?>
                                        <div class="brand-car">
                                            <img src="<?php echo $meta['drivco_brand_thumb']['url']; ?>" alt="<?php echo esc_attr__('brand-car-icon', 'drivco-core') ?>">
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>

                        <?php }  ?>

                    </div>
                    <?php if ('yes' === $settings['drivco_brand_show_button_area']) : ?>
                        <div class="row mt-40">
                            <div class="col-lg-12">
                                <div class="view-btn-area">
                                    <?php if (!empty($settings['drivco_vehicle_brand_count_label'])) :   ?>
                                        <p><?php echo $settings['drivco_vehicle_brand_count_label'] ?> </p>
                                    <?php endif; ?>
                                    <a class="view-btn" href="<?php echo esc_url($settings['drivco_vehicle_brand_view_btn_link']['url']) ?>"><?php echo $settings['drivco_vehicle_brand_view_btn_label'] ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['drivco_brand_style_choose'] == 'style_two') : ?>
            <div class="dream-car-area">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="section-title-2 text-center">
                                <?php if (!empty($settings['drivco_vehicle_brand_heading_content_title'])) :   ?>
                                    <h2 class="styletwobrandt"><?php echo esc_html($settings['drivco_vehicle_brand_heading_content_title']) ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_vehicle_brand_heading_content_subtitle'])) :   ?>
                                    <p class="styletwobrands"><?php echo esc_html($settings['drivco_vehicle_brand_heading_content_subtitle']) ?> </p>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter-area d-flex flex-wrap align-items-center justify-content-between">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-make-tab" data-bs-toggle="pill" data-bs-target="#pills-make" type="button" role="tab" aria-controls="pills-make" aria-selected="true"><?php echo esc_html($settings['drivco_brand_content_tab_one_text']) ?></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-body-tab" data-bs-toggle="pill" data-bs-target="#pills-body" type="button" role="tab" aria-controls="pills-body" aria-selected="false"><?php echo esc_html($settings['drivco_brand_content_tab_two_text']) ?></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-location-tab" data-bs-toggle="pill" data-bs-target="#pills-location" type="button" role="tab" aria-controls="pills-location" aria-selected="false"><?php echo esc_html($settings['drivco_brand_content_tab_three_text']) ?></button>
                                    </li>
                                </ul>
                                <?php if (!empty($settings['drivco_vehicle_brand_view_btn_label'])) :   ?>
                                    <div class="explore-btn d-lg-flex d-none">
                                        <a class="explore-btn2" <?php echo $this->get_render_attribute_string('drivco_vehicle_brand_view_btn_link'); ?>><?php echo esc_html($settings['drivco_vehicle_brand_view_btn_label']) ?> <i class="bi bi-arrow-right-short"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-make" role="tabpanel" aria-labelledby="pills-make-tab">
                            <div class="row g-4 justify-content-center">


                                <?php
                                foreach ((array) $brands as $brand) {
                                    $meta = get_term_meta($brand->term_id, 'drivco_brand_taxonomy', true);
                                ?>
                                    <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                                        <a href="<?php echo get_term_link($brand->slug, 'vehicle-brand') ?>" class="car-category text-center">
                                            <?php if (!empty($meta['drivco_brand_logo'])) :   ?>
                                                <div class="icon">
                                                    <img src="<?php echo $meta['drivco_brand_logo']['url']; ?>" alt="<?php echo esc_attr__('brand-icon', 'drivco-core') ?>">
                                                </div>
                                            <?php endif; ?> <div class="content">
                                                <?php if (!empty($settings['drivco_brand_content_text'])) :   ?>
                                                    <h6><?php echo esc_html($settings['drivco_brand_content_text']) ?></h6>
                                                <?php endif; ?>
                                                <span><?php echo '(' . esc_html($brand->count) . ')'; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-body" role="tabpanel" aria-labelledby="pills-body-tab">
                            <div class="row g-4 justify-content-center">
                                <?php
                                foreach ((array) $bodys as $body) {
                                    $meta = get_term_meta($body->term_id, 'drivco_body_taxonomy', true);
                                ?>

                                    <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                                        <a href="<?php echo get_term_link($body->slug, 'body-type') ?>" class="car-category text-center">
                                            <?php if (!empty($meta['drivco_body_logo'])) :   ?>
                                                <div class="icon">
                                                    <img src="<?php echo $meta['drivco_body_logo']['url']; ?>" alt="<?php echo esc_attr__('logo-icon', 'drivco-core') ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="content">
                                                <h6><?php echo esc_html($body->name); ?></h6>
                                                <span><?php echo '(' . esc_html($body->count) . ')'; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
                            <div class="row g-4 justify-content-center">

                                <?php
                                foreach ((array) $locations as $location) {
                                    $meta = get_term_meta($location->term_id, 'drivco_location_taxonomy', true);
                                ?>

                                    <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                                        <a href="<?php echo get_term_link($location->slug, 'location') ?>" class="car-category text-center">
                                            <?php if (!empty($meta['drivco_location_logo'])) :   ?>
                                                <div class="icon">
                                                    <img src="<?php echo $meta['drivco_location_logo']['url']; ?>" alt="<?php echo esc_attr__('loction-icon', 'drivco-core') ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="content">
                                                <h6><?php echo esc_html($location->name); ?></h6>
                                                <span><?php echo '(' . esc_html($location->count) . ')'; ?></span>
                                            </div>
                                        </a>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['drivco_brand_style_choose'] == 'style_three') : ?>
            <div class="brand-category-section">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_vehicle_brand_heading_content_title'])) :   ?>
                                    <h2 class="stylethreebrandt"> <?php echo esc_html($settings['drivco_vehicle_brand_heading_content_title']) ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_vehicle_brand_heading_content_subtitle'])) :   ?>
                                    <p class="stylethreebrands"> <?php echo esc_html($settings['drivco_vehicle_brand_heading_content_subtitle']) ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="slider-btn-group2">
                                <div class="slider-btn prev-5">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="slider-btn next-5">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper brand-category-slider">
                                <div class="swiper-wrapper">

                                    <?php
                                    foreach ((array) $brands as $brand) {
                                        $meta = get_term_meta($brand->term_id, 'drivco_brand_taxonomy', true);
                                    ?>

                                        <div class="swiper-slide">
                                            <div class="brand-category-card">
                                                <?php if (!empty($meta['drivco_brand_thumb'])) :   ?>
                                                    <div class="category-img">
                                                        <img src="<?php echo $meta['drivco_brand_image']['url']; ?>" alt="<?php echo esc_attr__('cat-img', 'drivco-core') ?>">
                                                    </div>
                                                <?php endif; ?>
                                                <?php
                                                if (!empty($meta['drivco_brand_feature'])) : ?>
                                                    <div class="batch">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                                <mask id="mask0_878_5200" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="14" height="14">
                                                                    <rect width="14" height="14" fill="#D9D9D9" />
                                                                </mask>
                                                                <g mask="url(#mask0_878_5200)">
                                                                    <path d="M10.6178 5.87725C10.6178 3.80129 8.91625 2.11456 6.82879 2.11456C4.74133 2.11456 3.03976 3.80129 3.03976 5.87725C3.03976 7.9502 4.73829 9.63994 6.82879 9.63994C8.91929 9.63994 10.6178 7.9502 10.6178 5.87725ZM6.82879 9.15414C5.00872 9.15414 3.52593 7.68467 3.52593 5.87424C3.52593 4.0638 5.00872 2.59735 6.82879 2.59735C8.64886 2.59735 10.1317 4.06682 10.1317 5.87725C10.1317 7.68769 8.64886 9.15414 6.82879 9.15414Z" />
                                                                    <path d="M11.4716 9.76961C11.6083 9.70021 11.7299 9.60969 11.8241 9.48296C12.0702 9.14803 12.0125 8.71051 11.9578 8.28506C11.9213 8.01047 11.8849 7.72382 11.9487 7.53071C12.0064 7.34966 12.2009 7.1475 12.3862 6.95439C12.6749 6.65265 13 6.31168 13 5.88019C13 5.44871 12.6779 5.10171 12.3892 4.79997C12.2039 4.60384 12.0094 4.40469 11.9517 4.22364C11.8879 4.03053 11.9244 3.74388 11.9608 3.4693C12.0155 3.04384 12.0702 2.60632 11.8271 2.27139C11.581 1.93344 11.1404 1.85197 10.715 1.7705C10.4416 1.71921 10.159 1.66791 9.99794 1.55023C9.83689 1.43557 9.7032 1.18815 9.57254 0.946754C9.37504 0.584667 9.14715 0.174301 8.74303 0.0415357C8.3541 -0.0851949 7.95605 0.101884 7.57016 0.282927C7.31189 0.403623 7.04754 0.527336 6.83484 0.527336C6.62215 0.527336 6.3578 0.403623 6.09952 0.282927C5.71363 0.101884 5.31558 -0.0851949 4.92665 0.0415357C4.51949 0.171284 4.3068 0.566562 4.09714 0.946754C3.96648 1.18513 3.82975 1.43557 3.67175 1.55023C3.50767 1.66791 3.22812 1.72222 2.95466 1.7705C2.52927 1.84895 2.08868 1.93344 1.84256 2.27139C1.59644 2.60632 1.65417 3.04384 1.70887 3.4693C1.74533 3.74388 1.78179 4.03053 1.71798 4.22364C1.66025 4.40469 1.46579 4.60685 1.28044 4.79997C0.991778 5.10171 0.666656 5.44267 0.666656 5.87416C0.666656 6.30565 0.994816 6.64661 1.28044 6.94835C1.46579 7.14448 1.66025 7.34363 1.71798 7.52467C1.78179 7.71779 1.74533 8.00444 1.70887 8.27902C1.65417 8.70447 1.59948 9.142 1.84256 9.47693C1.93676 9.60366 2.0583 9.6972 2.19503 9.76358L0.870237 12.0417C0.821621 12.1262 0.827698 12.2318 0.888468 12.3103C0.949238 12.3887 1.04951 12.4219 1.1437 12.3978L3.10051 11.8758L3.62617 13.819C3.65048 13.9125 3.73252 13.9819 3.82975 13.997C3.84191 13.997 3.85102 14 3.86014 14C3.94521 14 4.02725 13.9547 4.06979 13.8793L5.31255 11.74C5.5769 11.7098 5.84429 11.5861 6.10256 11.4654C6.36083 11.3447 6.62518 11.221 6.83788 11.221C7.05058 11.221 7.31493 11.3447 7.5732 11.4654C7.83148 11.5861 8.09886 11.7128 8.36322 11.74L9.60597 13.8793C9.64851 13.9547 9.73055 14 9.81563 14C9.82474 14 9.83689 14 9.84601 13.997C9.94324 13.9849 10.0222 13.9155 10.0496 13.819L10.5753 11.8758L12.5321 12.3978C12.6263 12.4219 12.7265 12.3887 12.7873 12.3103C12.8481 12.2318 12.8541 12.1262 12.8055 12.0417L11.4716 9.76961ZM3.93306 13.137L3.49855 11.5227C3.46513 11.393 3.33143 11.3175 3.20078 11.3507L1.57517 11.7822L2.65688 9.92048C2.75108 9.94161 2.84831 9.95971 2.94554 9.97781C3.21901 10.0291 3.50159 10.0804 3.66263 10.1981C3.82367 10.3127 3.95737 10.5602 4.08802 10.8016C4.26426 11.1244 4.46176 11.4835 4.78992 11.6525L3.93306 13.137ZM6.82877 10.7412C6.50668 10.7412 6.19068 10.8891 5.88683 11.0309C5.58601 11.1727 5.27608 11.3175 5.0725 11.2512C4.85069 11.1787 4.68357 10.871 4.51949 10.5753C4.36149 10.2886 4.20045 9.9929 3.95129 9.81186C3.69909 9.63081 3.36182 9.56745 3.0367 9.5071C2.7055 9.44374 2.36215 9.38037 2.22541 9.19933C2.09476 9.0213 2.1373 8.67732 2.17984 8.34842C2.22238 8.01953 2.26492 7.68158 2.16768 7.38286C2.07349 7.09922 1.84256 6.85481 1.62075 6.62247C1.38375 6.37505 1.13763 6.11857 1.13763 5.88019C1.13763 5.64182 1.38375 5.38534 1.62075 5.13791C1.8456 4.90256 2.07653 4.66117 2.16768 4.37753C2.26492 4.07881 2.22238 3.74086 2.17984 3.41196C2.1373 3.08005 2.09476 2.73909 2.22541 2.56106C2.35911 2.377 2.70246 2.31363 3.0367 2.25329C3.36182 2.19294 3.69909 2.12957 3.95129 1.94853C4.20045 1.7705 4.36149 1.47178 4.51949 1.18513C4.68357 0.886406 4.85069 0.581649 5.0725 0.509232C5.27912 0.442849 5.58905 0.587684 5.88683 0.729501C6.19068 0.871319 6.50668 1.01917 6.82877 1.01917C7.15085 1.01917 7.46685 0.871319 7.77071 0.729501C8.07152 0.587684 8.38145 0.442849 8.58503 0.509232C8.80684 0.581649 8.97396 0.889423 9.13804 1.18513C9.29604 1.47178 9.45708 1.76749 9.70624 1.94853C9.95844 2.12957 10.2957 2.19294 10.6208 2.25329C10.952 2.31665 11.2954 2.38002 11.4321 2.56106C11.5628 2.73909 11.5202 3.08307 11.4777 3.41196C11.4352 3.74086 11.3926 4.07881 11.4898 4.37753C11.584 4.66117 11.815 4.90557 12.0368 5.13791C12.2738 5.38534 12.5199 5.64182 12.5199 5.88019C12.5199 6.11857 12.2738 6.37505 12.0368 6.62247C11.8119 6.85783 11.581 7.09922 11.4898 7.38286C11.3926 7.68158 11.4352 8.01953 11.4777 8.34842C11.5202 8.68034 11.5628 9.0213 11.4321 9.19933C11.2984 9.38339 10.9551 9.44675 10.6208 9.5071C10.2957 9.56745 9.95844 9.63081 9.70624 9.81186C9.45708 9.98988 9.29604 10.2886 9.13804 10.5753C8.97396 10.874 8.80684 11.1787 8.58503 11.2512C8.37841 11.3175 8.06848 11.1727 7.77071 11.0309C7.46685 10.8891 7.15085 10.7412 6.82877 10.7412ZM10.4568 11.3507C10.3261 11.3175 10.1924 11.393 10.159 11.5227L9.72447 13.137L8.86457 11.6585C9.18969 11.4925 9.38112 11.1455 9.56647 10.8076C9.69712 10.5692 9.83386 10.3188 9.99186 10.2041C10.1559 10.0864 10.4355 10.0321 10.7089 9.98385C10.8062 9.96574 10.9034 9.94764 10.9976 9.92652L12.0793 11.7883L10.4568 11.3507Z" />
                                                                    <path d="M9.10765 4.39858C9.01346 4.30505 8.85849 4.30505 8.7643 4.39858L6.3031 6.84267L4.89627 5.44562C4.80207 5.35208 4.64711 5.35208 4.55291 5.44562C4.45872 5.53916 4.45872 5.69305 4.55291 5.78659L6.13294 7.35563C6.17852 7.40089 6.23929 7.42503 6.30614 7.42503C6.37299 7.42503 6.43376 7.40089 6.47933 7.35563L9.10765 4.73955C9.20184 4.64601 9.20184 4.49212 9.10765 4.39858Z" />
                                                                </g>
                                                            </svg>
                                                            <?php echo $meta['drivco_brand_feature']; ?>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="category-content">
                                                    <h5><a href="<?php echo get_term_link($brand->slug, 'vehicle-brand') ?>"><?php echo esc_html($brand->name); ?></a></h5>
                                                    <span><?php echo esc_html($settings['drivco_brand_content_text']) ?> <?php echo esc_html($brand->count); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['drivco_brand_style_choose'] == 'style_four') : ?>

            <div class="home3-available-car">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="section-title-2 text-center">
                            <?php if (!empty($settings['drivco_vehicle_brand_heading_content_title'])) :   ?>
                                <h2 class="stylefourbrandt"><?php echo esc_html($settings['drivco_vehicle_brand_heading_content_title']) ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_vehicle_brand_heading_content_subtitle'])) :   ?>
                                <p class="stylefourbrands"><?php echo esc_html($settings['drivco_vehicle_brand_heading_content_subtitle']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row gy-5">
                    <div class="col-lg-6">
                        <?php if (!empty($settings['drivco_brand_content_title'])) :   ?>
                            <div class="sub-title two">
                                <h5><?php echo esc_html($settings['drivco_brand_content_title']) ?></h5>
                            </div>
                        <?php endif; ?>
                        <div class="row row-cols-lg-3 row-cols-md-4 row-cols-sm-3 row-cols-2 g-4 justify-content-center">
                            <?php
                            foreach ((array) $brands as $brand) {
                                $meta = get_term_meta($brand->term_id, 'drivco_brand_taxonomy', true);
                            ?>
                                <div class="col">
                                    <a href="<?php echo get_term_link($brand->slug, 'vehicle-brand') ?>" class="car-category text-center">
                                        <?php if (!empty($meta['drivco_brand_logo'])) :   ?>
                                            <div class="icon">
                                                <img src="<?php echo $meta['drivco_brand_logo']['url']; ?>" alt="<?php echo esc_attr__('brand-logo', 'drivco-core') ?>">
                                            </div>
                                        <?php endif; ?>
                                        <div class="content">
                                            <?php if (!empty($settings['drivco_brand_content_text'])) :   ?>
                                                <h6><?php echo esc_html($settings['drivco_brand_content_text']) ?></h6>
                                            <?php endif; ?>
                                            <span><?php echo '(' . esc_html($brand->count) . ')'; ?></span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ('yes' === $settings['drivco_brand_show_button_area']) : ?>
                            <div class="explore-btn">
                                <a <?php echo $this->get_render_attribute_string('drivco_vehicle_brand_view_btn_link'); ?>><?php echo $settings['drivco_vehicle_brand_view_btn_label'] ?> <i class="bi bi-arrow-right"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <?php if (!empty($settings['drivco_brand_content_title_two'])) :   ?>
                            <div class="sub-title mb-20">
                                <h5><?php echo esc_html($settings['drivco_brand_content_title_two']) ?></h5>
                            </div>
                        <?php endif; ?>
                        <div class="car-filter-area">
                            <?php if (!empty($settings['drivco_brand_content_form_title'])) :   ?>
                                <h4><?php echo esc_html($settings['drivco_brand_content_form_title']) ?></h4>
                            <?php endif; ?>
                            <?php echo do_shortcode('[egns_general_filter style=4]') ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($settings['drivco_brand_style_choose'] == 'style_five') : ?>

            <div class="home5-brand-category-area">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_vehicle_brand_heading_content_title'])) :   ?>
                                <h2 class="stylefivebrandt"><?php echo esc_html($settings['drivco_vehicle_brand_heading_content_title']) ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_vehicle_brand_heading_content_subtitle'])) :   ?>
                                <p class="stylefivebrands"><?php echo esc_html($settings['drivco_vehicle_brand_heading_content_subtitle']) ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="filter-and-slider-btn">
                            <div class="slider-btn-group2 d-flex align-items-center justify-content-between">
                                <div class="slider-btn prev-52">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="slider-btn next-52">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper home5-brand-category-slider">
                            <div class="swiper-wrapper">

                                <?php
                                foreach ((array) $brands as $brand) {
                                    $meta = get_term_meta($brand->term_id, 'drivco_brand_taxonomy', true);
                                ?>

                                    <div class="swiper-slide">
                                        <div class="single-category5">
                                            <?php if (!empty($meta['drivco_brand_logo'])) :   ?>
                                                <div class="category-icon">
                                                    <img src="<?php echo $meta['drivco_brand_logo']['url']; ?>" alt="<?php echo esc_attr__('check-icon', 'drivco-core') ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="category-content">
                                                <h5><a href="<?php echo get_term_link($brand->slug, 'vehicle-brand') ?>"><?php echo esc_html($brand->name); ?></a></h5>
                                                <span><?php echo '(' . esc_html($brand->count) . ') +'; ?> </span>
                                            </div>
                                            <div class="explore-btn5">
                                                <?php if (!empty($settings['drivco_vehicle_brand_view_btn_label'])) :   ?>
                                                    <a href="<?php echo get_term_link($brand->slug, 'vehicle-brand') ?>"><span><?php echo $settings['drivco_vehicle_brand_view_btn_label'] ?></span> <i class="bi bi-arrow-right-short"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>



        <?php if ($settings['drivco_brand_style_choose'] == 'style_six') : ?>
            <div class="home6-brand-section">
                <div class="container">
                    <div class="row mb-60">
                        <div class="col-lg-12 d-flex align-items-end justify-content-between flex-wrap gap-4">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_vehicle_brand_heading_content_title'])) :   ?>
                                    <h2 class="stylesixbrandt"><?php echo esc_html($settings['drivco_vehicle_brand_heading_content_title']) ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_vehicle_brand_heading_content_subtitle'])) :   ?>
                                    <p class="stylesixbrands"><?php echo esc_html($settings['drivco_vehicle_brand_heading_content_subtitle']) ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="slider-btn-group2 style-6">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-50">
                            <div class="swiper home6-brand-category-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    foreach ((array) $brands as $brand) {
                                        $meta = get_term_meta($brand->term_id, 'drivco_brand_taxonomy', true);
                                    ?>

                                        <div class="swiper-slide">
                                            <a href="<?php echo get_term_link($brand->slug, 'vehicle-brand') ?>" class="car-category text-center">
                                                <?php if (!empty($meta['drivco_brand_logo'])) :   ?>
                                                    <div class="icon">
                                                        <img src="<?php echo $meta['drivco_brand_logo']['url']; ?>" alt="<?php echo esc_attr__('vehicle_brand', 'drivco-core') ?>">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="content">
                                                    <h6><?php echo esc_html($brand->name); ?></h6>
                                                    <span><?php echo '(' . esc_html($brand->count) . ')'; ?></span>
                                                </div>
                                            </a>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="our-activetis">
                                <div class="row justify-content-center g-lg-4 gy-5">
                                    <?php foreach ($data as $item) : ?>

                                        <div class="col-lg-3 col-sm-4 col-sm-6 divider d-flex justify-content-lg-start justify-content-sm-center">
                                            <div class="single-activiti">
                                                <?php if (!empty($item['drivco_brand_counter_logo'])) :   ?>
                                                    <div class="icon">
                                                        <?php \Elementor\Icons_Manager::render_icon($item['drivco_brand_counter_logo'], ['aria-hidden' => 'true']); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="content">
                                                    <div class="number">
                                                        <h5 class="counter"><?php echo wp_kses($item['drivco_brand_counter_number_of_activity'], wp_kses_allowed_html('post'))  ?></h5>
                                                        <span><?php echo wp_kses($item['drivco_brand_counter_number_of_activity_tag'], wp_kses_allowed_html('post'))  ?></span>
                                                    </div>
                                                    <?php if (!empty($item['drivco_brand_counter_content'])) :   ?>
                                                        <p><?php echo esc_html($item['drivco_brand_counter_content']) ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Brand_Widget());
