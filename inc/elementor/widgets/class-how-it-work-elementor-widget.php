<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_How_It_Work_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_how_it_work';
    }

    public function get_title()
    {
        return esc_html__('EG How It Work', 'drivco-core');
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
            'drivco_how_it_work_area_section_genaral',
            [
                'label' => esc_html__('Style', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_how_it_work_area_selection',
            [
                'label'   => esc_html__('Select Style', 'drivco-core'),
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
            'drivco_how_it_work_area',
            [
                'label' => esc_html__('General', 'drivco-core'),
                'condition' => [
                    'drivco_how_it_work_area_selection' => 'style_one'
                ]
            ]
        );
        $this->add_control(
            'drivco_how_it_work_section_title',
            [
                'label' => esc_html__('Section Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('How Does It Work', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_how_it_work_section_subtitle',
            [
                'label' => esc_html__('Section Sub-Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Here are some of the featured cars in different categories', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub-title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        //Video Button

        $this->start_controls_section(
            'drivco_how_it_work_video_button_area',
            [
                'label' => esc_html__('Video Button', 'drivco-core'),
                'condition' => [
                    'drivco_how_it_work_area_selection' => 'style_one'
                ]
            ]
        );



        $this->add_control(
            'drivco_how_it_work_video_url',
            [
                'label' => esc_html__('Video URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),

            ]
        );

        $this->add_control(
            'drivco_how_it_work_video_text',
            [
                'label' => esc_html__('Video Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Watch Video', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();


        //Work Process
        $this->start_controls_section(
            'drivco_how_it_work_process_sec',
            [
                'label' => esc_html__('Work Process', 'drivco-core'),
                'condition' => [
                    'drivco_how_it_work_area_selection' => 'style_one'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_how_it_work_icon',
            [
                'label' => esc_html__(' Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-map-marker-alt',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'drivco_how_it_work_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Choose Any where', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_how_it_work_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Car servicing is the regular maintenance and inspection of a vehicle to ensure.', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'drivco_how_it_work_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_how_it_work_title' => esc_html__('Choose Any where', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_how_it_work_title }}}',
            ]
        );
        $this->end_controls_section();


        //Style Two

        $this->start_controls_section(
            'drivco_how_it_work_two_area',
            [
                'label' => esc_html__('General', 'drivco-core'),
                'condition' => [
                    'drivco_how_it_work_area_selection' => 'style_two'
                ]
            ]
        );
        $this->add_control(
            'drivco_how_it_work_two_section_title',
            [
                'label' => esc_html__('Section Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('How Does It Work', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_how_it_work_two_section_subtitle',
            [
                'label' => esc_html__('Section Sub-Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Here are some of the featured cars in different categories', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub-title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'drivco_how_it_work_two_video_button_area',
            [
                'label' => esc_html__('Video Button', 'drivco-core'),
                'condition' => [
                    'drivco_how_it_work_area_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'drivco_how_it_work_two_video_url',
            [
                'label' => esc_html__('Video URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );


        $this->add_control(
            'drivco_how_it_work_two_video_btton_text',
            [
                'label' => esc_html__('Video Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Watch Video', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();


        //Work Process
        $this->start_controls_section(
            'drivco_how_it_work_two_process_sec',
            [
                'label' => esc_html__('Work Process', 'drivco-core'),
                'condition' => [
                    'drivco_how_it_work_area_selection' => 'style_two'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_how_it_work_two_icon',
            [
                'label' => esc_html__('Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-shield-alt',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'drivco_how_it_work_two_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Choose Any where', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_how_it_work_two_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Car servicing is the regular maintenance and inspection of a vehicle to ensure.', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'drivco_how_it_work_two_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_how_it_work_two_title' => esc_html__('Choose Any where', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_how_it_work_two_title }}}',
            ]
        );
        $this->end_controls_section();


        //Review
        $this->start_controls_section(
            'drivco_how_it_work_two_review_style',
            [
                'label' => esc_html__('Review Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_how_it_work_area_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'drivco_how_it_work_two_review_title',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Excellent!', 'drivco-core'),
                'placeholder' => esc_html__('Type your Titlte here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_how_it_work_two_review',
            [
                'label' => esc_html__('Rating From ?', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'general' => esc_html__('General', 'drivco-core'),
                    'trustpilot'  => esc_html__('Trustpilot', 'drivco-core'),
                ],
                'default' => 'general',
            ]
        );


        $this->add_control(
            'drivco_how_it_work_two_review_star',
            [
                'label'         => esc_html__('Rating', 'drivco-core'),
                'type'             => Controls_Manager::NUMBER,
                'min'             => 0,
                'max'             => 5,
                'step'             => 1,
                'default'         => 5,
                'dynamic'         => [
                    'active'     => true,
                ],
            ]
        );

        $this->add_control(
            'drivco_how_it_work_two_review_logo',
            [
                'label' => esc_html__('Choose logo ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_how_it_work_two_review_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_how_it_work_two_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__(' 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();





        // ==================Style==================//

        //Section Title
        $this->start_controls_section(
            'drivco_how_it_work_section_title_sec',
            [
                'label' => esc_html__('Section Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_how_it_work_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_how_it_work_section_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_section_title_margin',
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
            'drivco_how_it_work_section_title_padding',
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

        //Section Sub Title
        $this->start_controls_section(
            'drivco_how_it_work_section_subtitle_sec',
            [
                'label' => esc_html__(' Section Sub-Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_how_it_work_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_how_it_work_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_subtitle_margin',
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
            'drivco_how_it_work_subtitle_padding',
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

        // Icon Or Logo

        $this->start_controls_section(
            'drivco_how_it_work_icon',
            [
                'label' => esc_html__('Icon', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'drivco_how_it_work_step_color',
            [
                'label'     => esc_html__('Step Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .single-work-process .step span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'drivco_how_it_work_icon_svg_size',
            [
                'label' => esc_html__('Icon Size', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',

                ],
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .single-work-process .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .how-it-work-section .single-work-process .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],

            ]
        );


        $this->end_controls_section();



        // Title
        $this->start_controls_section(
            'drivco_how_it_work__title_sec',
            [
                'label' => esc_html__(' Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_how_it_work_style_title_typ',
                'selector' => '{{WRAPPER}} .how-it-work-section .single-work-process .content h6',

            ]
        );

        $this->add_control(
            'drivco_how_it_work_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .single-work-process .content h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .single-work-process .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .how-it-work-section .single-work-process .content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // Content
        $this->start_controls_section(
            'drivco_how_it_work_content_sec',
            [
                'label' => esc_html__(' Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_how_it_work_content_typ',
                'selector' => '{{WRAPPER}} .how-it-work-section .single-work-process .content p',

            ]
        );

        $this->add_control(
            'drivco_how_it_work_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .single-work-process .content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .single-work-process .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .how-it-work-section .single-work-process .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        //Video Button

        $this->start_controls_section(
            'drivco_how_it_work_video_button_style',
            [
                'label' => esc_html__('Video Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_how_it_work_video_button_style_tabs'

        );

        $this->start_controls_tab(
            'drivco_how_it_work_video_button_style_tab',
            [
                'label' => esc_html__('Normal', 'drivco-core'),

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_how_it_work_video_button_typ',
                'selector' => '{{WRAPPER}} .how-it-work-section .video-btn a',

            ]
        );

        $this->add_control(
            'drivco_how_it_work_video_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .video-btn a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_how_it_work_video_button_background',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .video-btn a' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_video_button_border_radius',
            [
                'label'      => __('Border Radius', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .how-it-work-section .video-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .how-it-work-section .video-btn a::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_video_button_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .video-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_how_it_work_video_button_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .how-it-work-section .video-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_how_it_work_video_button_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),

            ]
        );



        $this->add_control(
            'drivco_how_it_work_video_button_color_hover',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .video-btn a:hover' => '-webkit-text-fill-color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'drivco_how_it_work_video_button_background_hover',
            [
                'label' => esc_html__('Background', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-it-work-section .video-btn a::after' => 'background: {{VALUE}}',
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

        $video_url = !empty($settings['drivco_how_it_work_video']['url']);

        $video_url2 = !empty($settings['drivco_how_it_work_two_video']['url']);

        $data = $settings['drivco_how_it_work_list'];
        $data2 = $settings['drivco_how_it_work_two_list'];
?>

        <?php if ($settings["drivco_how_it_work_area_selection"] == "style_one") : ?>
            <div class="how-it-work-section style-3 ">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_how_it_work_section_title'])) : ?>
                                    <h2><?php echo esc_html($settings['drivco_how_it_work_section_title']) ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['drivco_how_it_work_section_subtitle'])) : ?>
                                    <p><?php echo esc_html($settings['drivco_how_it_work_section_subtitle']) ?></p>
                                <?php endif ?>
                            </div>


                            <?php if (!empty($settings['drivco_how_it_work_video_text'])) : ?>
                                <div class="video-btn">
                                    <a class="video-popup" href="<?php echo esc_url($settings['drivco_how_it_work_video_url']['url']) ?>">
                                        <i class="bi bi-play-circle"></i><?php echo esc_html($settings['drivco_how_it_work_video_text']) ?>
                                    </a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="work-process-group">
                                <div class="row justify-content-center g-xl-0 gy-5">
                                    <?php foreach ($data as $key => $item) : ?>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single-work-process text-center">
                                                <div class="steps <?php echo ($key === 3) ? 'd-lg-none d-block' : ''; ?>">
                                                    <span><?php echo sprintf("%02d", $key + 1) ?></span>
                                                </div>
                                                <div class="icon">
                                                    <?php if (!empty($item['drivco_how_it_work_icon'])) : ?>
                                                        <?php \Elementor\Icons_Manager::render_icon($item['drivco_how_it_work_icon'], ['aria-hidden' => 'true']); ?>
                                                    <?php endif ?>
                                                </div>
                                                <div class="content">
                                                    <?php if (!empty($item['drivco_how_it_work_title'])) : ?>
                                                        <h6><?php echo esc_html($item['drivco_how_it_work_title']) ?></h6>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['drivco_how_it_work_content'])) : ?>
                                                        <p><?php echo esc_html($item['drivco_how_it_work_content']) ?></p>
                                                    <?php endif ?>
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
        <?php endif ?>

        <?php if ($settings["drivco_how_it_work_area_selection"] == "style_two") : ?>
            <div class="how-it-work-section style-2">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_how_it_work_two_section_title'])) : ?>
                                    <h2><?php echo esc_html($settings['drivco_how_it_work_two_section_title']) ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['drivco_how_it_work_two_section_subtitle'])) : ?>
                                    <p><?php echo esc_html($settings['drivco_how_it_work_two_section_subtitle']) ?></p>
                                <?php endif ?>
                            </div>
                            <?php if (!empty($settings['drivco_how_it_work_two_video_btton_text'])) : ?>
                                <div class="video-btn">
                                    <a class="video-popup" href="<?php echo esc_url($settings['drivco_how_it_work_two_video_url']['url']) ?>"><i class="bi bi-play-circle"></i><?php echo esc_html($settings['drivco_how_it_work_two_video_btton_text']) ?></a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="work-process-group">
                                <div class="row justify-content-center g-lg-0 gy-5">
                                    <?php foreach ($data2 as $key => $item2) : ?>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single-work-process text-center">
                                                <div class="step">
                                                    <span><?php echo sprintf("%02d", $key + 1) ?></span>
                                                </div>
                                                <div class="icon">
                                                    <?php \Elementor\Icons_Manager::render_icon($item2['drivco_how_it_work_two_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                                <div class="content">
                                                    <?php if (!empty($item2['drivco_how_it_work_two_title'])) : ?>
                                                        <h6><?php echo esc_html($item2['drivco_how_it_work_two_title']) ?></h6>
                                                    <?php endif ?>
                                                    <?php if (!empty($item2['drivco_how_it_work_two_content'])) : ?>
                                                        <p><?php echo esc_html($item2['drivco_how_it_work_two_content']) ?></p>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="trustpilot-review">
                                <?php if (!empty($settings['drivco_how_it_work_two_review_title'])) :   ?>
                                    <strong> <?php echo esc_html($settings['drivco_how_it_work_two_review_title']) ?></strong>
                                <?php endif ?>
                                <div class="star">
                                    <?php if ('general' == $settings['drivco_how_it_work_two_review']) { ?>
                                        <ul>
                                            <?php $rank_counter = intval($settings['drivco_how_it_work_two_review_star']);
                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <?php if ($i <= $rank_counter) : ?>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                <?php endif ?>
                                            <?php endfor; ?>
                                        </ul>
                                    <?php } ?>

                                    <?php if ('trustpilot' == $settings['drivco_how_it_work_two_review']) { ?>
                                        <ul class="trustpilot">
                                            <?php $rank_counter = intval($settings['drivco_how_it_work_two_review_star']);
                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <?php if ($i <= $rank_counter) : ?>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                <?php endif ?>
                                            <?php endfor; ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                                <p><?php echo $rank_counter ?> <?php echo esc_html('Rating out of 5.0 Based On') ?><a href="<?php echo esc_url($settings['drivco_how_it_work_two_review_url']['url']) ?>"><?php echo wp_kses($settings['drivco_how_it_work_two_review_count'], wp_kses_allowed_html('post'))  ?></a> </p>
                                <?php if (!empty($settings['drivco_how_it_work_two_review_logo']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['drivco_how_it_work_two_review_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo', 'drivco-core') ?>">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_How_It_Work_Widget());
