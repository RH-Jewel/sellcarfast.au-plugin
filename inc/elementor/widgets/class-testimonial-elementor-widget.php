<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class drivco_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_testimonial';
    }

    public function get_title()
    {
        return esc_html__('EG Testimonial ', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================Content_One_style_one=======================//


        $this->start_controls_section(
            'drivco_testimonial_style_section',
            [
                'label' => esc_html__('General', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_testimonial_style_selection',
            [
                'label'   => esc_html__('Select Style', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'drivco-core'),
                    'style_two' => esc_html__('Style Two', 'drivco-core'),
                    'style_three' => esc_html__('Style Three', 'drivco-core'),
                    'style_four' => esc_html__('Style Four', 'drivco-core'),
                    'style_five' => esc_html__('Style Five', 'drivco-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();




        //Heading section



        $this->start_controls_section(
            'drivco_testimonial_one_style',
            [
                'label' => esc_html__('Heading Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'drivco_testimonial_heading_sec_switcher',
            [
                'label' => esc_html__('Heading Switcher', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'drivco_testimonial_heading_sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Customer Feedback', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_testimonial_heading_sec_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What Our Customers Are Saying', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'drivco_testimonial_one_style_repeater',
            [
                'label' => esc_html__('Testimonial List', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_testimonial_one_review',
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


        $repeater->add_control(
            'drivco_testimonial_one_style_rank_icon',
            [
                'label' => esc_html__('Rating', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('4', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'drivco_testimonial_one_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Great sevices!', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_one_company_logo_one',
            [
                'label' => esc_html__(' logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $repeater->add_control(
            'drivco_testimonial_one_company_section_description',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Drivco-Agency customer feedback is an invaluable source of', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_one_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Jhon Abraham', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'drivco_testimonial_one_author_designation',
            [
                'label' => esc_html__('Author Designation', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Software Engineer', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_testimonial_one_section_list',
            [
                'label' => esc_html__('Testimony list', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_testimonial_one_author_name' => esc_html__('Jhon Abraham', 'drivco-core'),
                        'drivco_testimonial_one_author_designation' => esc_html__('Software Engineer', 'drivco-core'),
                        'drivco_testimonial_one_company_section_description' => esc_html__('Drivco-Agency customer feedback is an invaluable source of', 'drivco-core'),


                    ],

                ],
                'title_field' => '{{{ drivco_testimonial_one_author_name  }}}',
            ]
        );

        $this->end_controls_section();

        //Devider section

        $this->start_controls_section(
            'drivco_testimonial_devider_devider_section',
            [
                'label' => esc_html__('Devider Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'drivco_testimonial_devider_devider',
            [
                'label' => esc_html__('Devider Slider', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'drivco_testimonial_devider_btn_title',
            [
                'label' => esc_html__('Devider Button Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Thousand of People Reviews to Us', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_testimonial_devider_btn_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('View All Review', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_testimonial_devider_button_url',
            [
                'label' => esc_html__('Button URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );
        $this->end_controls_section();

        /////////////////Style Two/////////////////

        //Heading section two
        $this->start_controls_section(
            'drivco_testimonial_two_style',
            [
                'label' => esc_html__('Heading section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two',
                ],
            ]
        );
        $this->add_control(
            'drivco_testimonial_heading_two_sec_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Customer Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_testimonial_heading_two_sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Here are some of the featured cars in different categories ', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_testimonial_two_review_devider',
            [
                'label' => esc_html__('Devider Slider', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->end_controls_section();

        //Review Section Two

        $this->start_controls_section(
            'drivco_testimonial_two_review_style',
            [
                'label' => esc_html__('Review Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'drivco_testimonial_two_logo',
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
            'drivco_testimonial_two_review',
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
            'drivco_testimonial_two_review_star_two',
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
            'drivco_testimonial_two_review_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_testimonial_two_ranking_text',
            [
                'label' => esc_html__('Ranking Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trust Rating', 'drivco-core'),
                'placeholder' => esc_html__('Type your Text here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_testimonial_two_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Based On 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();


        // =====================Services=======================//
        $this->start_controls_section(
            'drivco_testimonial_two_services_section',
            [
                'label' => esc_html__('Services', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_testimonial_two_services_review',
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

        $repeater->add_control(
            'drivco_testimonial_two_review_star_services_sec',
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


        $repeater->add_control(
            'drivco_testimonial_two_services_title',
            [
                'label' => esc_html__('Service Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trusted Company', 'drivco-core'),
                'placeholder' => esc_html__('Type your Title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_two_services_content',
            [
                'label' => esc_html__(' Testimony', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Drivco-Agencycustomer feedback is an invaluable source ofinformation that can help businesses improve their offerings and provide better experiences.', 'drivco-core'),
                'placeholder' => esc_html__('Type your Testimony here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_two_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Jhon Abraham,', 'drivco-core'),
                'placeholder' => esc_html__('Type your author name here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_two_time',
            [
                'label' => esc_html__('Time', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('25 Minutes Ago', 'drivco-core'),
                'placeholder' => esc_html__('Type your time here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_testimonial_two_section_list',
            [
                'label' => esc_html__('Testimony list', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_testimonial_two_services_title' => esc_html__('Trusted Company', 'drivco-core'),
                        'drivco_testimonial_two_services_content' => esc_html__('Drivco-Agencycustomer feedback is an invaluable source ofinformation that can help businesses improve their offerings and provide better experiences.', 'drivco-core'),
                        'drivco_testimonial_two_author_name' => esc_html__('Jhon Abraham', 'drivco-core'),


                    ],

                ],
                'title_field' => '{{{ drivco_testimonial_two_author_name  }}}',
            ]
        );

        $this->add_control(
            'drivco_testimonial_two_pagignation',
            [
                'label' => esc_html__('Pasignation Arrow', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

        ///////////////////Style Three/////////////////////////

        $this->start_controls_section(
            'drivco_testimonial_three_group_image_sec',
            [
                'label' => esc_html__('Testimonial Gallery Images', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'drivco_testimonial_three_group_image',
            [
                'label' => esc_html__('Choose Image ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'drivco_testimonial_three_section_list',
            [
                'label' => esc_html__('Group Image list', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();

        //Testimonial Area

        $this->start_controls_section(
            'drivco_testimonial_three_group_testimonial_area_sec',
            [
                'label' => esc_html__('Testimonial ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_testimonial_three_author_image',
            [
                'label' => esc_html__('Choose Author Image ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_three_review',
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

        $repeater->add_control(
            'drivco_testimonial_three_review_star_sec',
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

        $repeater->add_control(
            'drivco_testimonial_three_testimonial_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trusted Company ', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_three_testimonial_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('"Drivco Agency actively encourage customers to leave reviews to help promote their products and services and to build trust with potential customers."', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_testimonial_three_testimonial_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('John Abraham', 'drivco-core'),
                'placeholder' => esc_html__('Type your author name here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_testimonial_three_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_testimonial_three_testimonial_title' => esc_html__('Trusted Company', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_testimonial_three_testimonial_title }}}',
            ]
        );

        $this->end_controls_section();

        //Review Section

        $this->start_controls_section(
            'drivco_testimonial_three_review_style',
            [
                'label' => esc_html__('Review ', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three',
                ],
            ]
        );
        $this->add_control(
            'drivco_testimonial_three_style_ranking_text',
            [
                'label' => esc_html__('Ranking Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Excellent!', 'drivco-core'),
                'placeholder' => esc_html__('Type your description here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_testimonial_three_review_section',
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
            'drivco_testimonial_three_review_star',
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
            'drivco_testimonial_three_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_testimonial_three_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_testimonial_three_logo',
            [
                'label' => esc_html__('Choose logo ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        // =====================Style Four=======================//


        $this->start_controls_section(
            'drivco_testimonial_four_testimonial_section',
            [
                'label' => esc_html__('Testimonial', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_testimonial_four_review_section',
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

        $repeater->add_control(
            'drivco_testimonial_four_review_star_services_sec',
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


        $repeater->add_control(
            'drivco_testimonial_four_services_title',
            [
                'label' => esc_html__('Testimonial Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trusted Company', 'drivco-core'),
                'placeholder' => esc_html__('Type your Title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_four_logo',
            [
                'label' => esc_html__('Choose logo ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_four_testimonial_content',
            [
                'label' => esc_html__(' Testimony', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Drivco-Agencycustomer feedback is an invaluable source ofinformation that can help businesses improve their offerings and provide better experiences.', 'drivco-core'),
                'placeholder' => esc_html__('Type your Testimony here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_four_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Jhon Abraham,', 'drivco-core'),
                'placeholder' => esc_html__('Type your author name here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_four_time',
            [
                'label' => esc_html__('Time', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('25 Minutes Ago', 'drivco-core'),
                'placeholder' => esc_html__('Type your time here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_testimonial_four_section_list',
            [
                'label' => esc_html__('Testimony list', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_testimonial_four_services_title' => esc_html__('Trusted Company', 'drivco-core'),
                        'drivco_testimonial_four_testimonial_content' => esc_html__('Drivco-Agencycustomer feedback is an invaluable source ofinformation that can help businesses improve their offerings and provide better experiences.', 'drivco-core'),
                        'drivco_testimonial_four_author_name' => esc_html__('Jhon Abraham', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_testimonial_four_author_name  }}}',
            ]
        );

        $this->end_controls_section();

        //Button 

        $this->start_controls_section(
            'drivco_testimonial_four_testimonial_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four',
                ],
            ]
        );

        $this->add_control(
            'drivco_testimonial_four_button_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Load More', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four',
                ],

            ]
        );

        $this->add_control(
            'drivco_testimonial_four_button_url',
            [
                'label' => esc_html__('Button URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four',
                ],
            ]
        );

        $this->end_controls_section();

        /////////////////Style Five/////////////////

        //Heading section Five
        $this->start_controls_section(
            'drivco_testimonial_five_style',
            [
                'label' => esc_html__('Heading section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five',
                ],
            ]
        );
        $this->add_control(
            'drivco_testimonial_heading_five_sec_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Customer Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_testimonial_heading_five_sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Here are some of the featured cars in different categories ', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
            ]
        );



        $this->end_controls_section();

        //Review Section Five

        $this->start_controls_section(
            'drivco_testimonial_five_review_style',
            [
                'label' => esc_html__('Review Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five',
                ],
            ]
        );

        $this->add_control(
            'drivco_testimonial_five_logo',
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
            'drivco_testimonial_five_review',
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
            'drivco_testimonial_five_review_star_two',
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
            'drivco_testimonial_five_review_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_testimonial_five_ranking_text',
            [
                'label' => esc_html__('Ranking Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trust Rating', 'drivco-core'),
                'placeholder' => esc_html__('Type your Text here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_testimonial_five_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Based On 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // =====================Services=======================//

        $this->start_controls_section(
            'drivco_testimonial_five_services_section',
            [
                'label' => esc_html__('Services', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_testimonial_five_services_review',
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

        $repeater->add_control(
            'drivco_testimonial_five_review_star_services_sec',
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


        $repeater->add_control(
            'drivco_testimonial_five_services_title',
            [
                'label' => esc_html__('Service Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trusted Company', 'drivco-core'),
                'placeholder' => esc_html__('Type your Title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_five_services_content',
            [
                'label' => esc_html__(' Testimony', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Drivco-Agencycustomer feedback is an invaluable source ofinformation that can help businesses improve their offerings and provide better experiences.', 'drivco-core'),
                'placeholder' => esc_html__('Type your Testimony here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_testimonial_five_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Jhon Abraham,', 'drivco-core'),
                'placeholder' => esc_html__('Type your author name here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_testimonial_five_section_list',
            [
                'label' => esc_html__('Testimony List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_testimonial_five_services_title' => esc_html__('Trusted Company', 'drivco-core'),
                        'drivco_testimonial_five_services_content' => esc_html__('Drivco-Agencycustomer feedback is an invaluable source ofinformation that can help businesses improve their offerings and provide better experiences.', 'drivco-core'),
                        'drivco_testimonial_five_author_name' => esc_html__('Jhon Abraham', 'drivco-core'),


                    ],

                ],
                'title_field' => '{{{ drivco_testimonial_five_author_name  }}}',
            ]
        );

        $this->end_controls_section();

        //Bottom Review
        $this->start_controls_section(
            'drivco_counter_review_five_style',
            [
                'label' => esc_html__('Review Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five',
                ],
            ]
        );


        $this->add_control(
            'drivco_review_counter_five_title',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Excellent!', 'drivco-core'),
                'placeholder' => esc_html__('Type your Titlte here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_review_five_section',
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
            'drivco_review_counter_five_review_star',
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
            'drivco_review_counter_five_review_logo',
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
            'drivco_review_counter_five_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__(' 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_review_counter_five_review_count_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->end_controls_section();



        // =====================Style One Start=======================//

        // Title

        $this->start_controls_section(
            'drivco_testimonial_one_style_section_title',
            [
                'label' => esc_html__('Heading Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_one_style_section_title_typ',
                'selector' => '{{WRAPPER}} .section-title1 span',


            ]
        );

        $this->add_control(
            'drivco_testimonial_one_style_section_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_title_margin',
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
            'drivco_testimonial_one_style_section_title_padding',
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

        //Subtitle

        $this->start_controls_section(
            'drivco_testimonial_one_style_section_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_one_style_section_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title1 h2',


            ]
        );

        $this->add_control(
            'drivco_testimonial_one_style_section_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_margin',
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
            'drivco_testimonial_one_style_section_padding',
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

        //Ranking Text

        $this->start_controls_section(
            'drivco_testimonial_one_style_section_ranking_text',
            [
                'label' => esc_html__('Ranking Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_one_style_section_ranking_text_typ',
                'selector' => '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card .feedback-top .stat-area span',


            ]
        );

        $this->add_control(
            'drivco_testimonial_one_style_section_ranking_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card .feedback-top .stat-area span' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_ranking_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card .feedback-top .stat-area span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_ranking_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card .feedback-top .stat-area span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        //Content

        $this->start_controls_section(
            'drivco_testimonial_one_style_section_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_one_style_section_content_typ',
                'selector' => '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card p',


            ]
        );

        $this->add_control(
            'drivco_testimonial_one_style_section_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        //Author Name
        $this->start_controls_section(
            'drivco_testimonial_one_style_section_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_one_style_section_author_name_typ',
                'selector' => '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card .author-name h6',


            ]
        );

        $this->add_control(
            'drivco_testimonial_one_style_section_author_name_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card .author-name h6' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_author_name_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card .author-name h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_author_name_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-right .feedback-card .author-name h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Button Title
        $this->start_controls_section(
            'drivco_testimonial_one_style_section_button_title',
            [
                'label' => esc_html__('Button Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_one_style_section_button_title_typ',
                'selector' => '{{WRAPPER}} .view-btn-area p',


            ]
        );

        $this->add_control(
            'drivco_testimonial_one_style_section_button_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn-area p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_one_style_section_button_title_margin',
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
            'drivco_testimonial_one_style_section_button_title_padding',
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


        //Button
        $this->start_controls_section(
            'drivco_testimonial_one_button_style',
            [
                'label' => esc_html__('Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_one'
                ]
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'drivco_testimonial_one_button_tabs'
        );

        $this->start_controls_tab(
            'drivco_testimonial_one_button_normal_tab',
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
                'name'     => 'drivco_testimonial_one_button_typ',
                'selector' => '{{WRAPPER}} .view-btn',

            ]
        );
        $this->add_control(
            'drivco_testimonial_one_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_one_button_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'drivco-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .view-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_one_button_padding',
            [
                'label'      => __(
                    'Padding',
                    'drivco-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .view-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_testimonial_one_button_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_testimonial_one_button_color_hover',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();




        // =====================Style_two_Start=======================//

        $this->start_controls_section(
            'drivco_testimonial_two_style_section_title',
            [
                'label' => esc_html__('Heading Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_two_style_section_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',


            ]
        );

        $this->add_control(
            'drivco_testimonial_two_style_section_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_two_style_section_title_margin',
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
            'drivco_testimonial_two_style_section_title_padding',
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



        $this->start_controls_section(
            'drivco_testimonial_two_style_section_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_two_style_section_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_testimonial_two_style_section_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_two_style_section_subtitle_margin',
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
            'drivco_testimonial_two_style_section_subtitle_padding',
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

        //Review

        //Review Count
        $this->start_controls_section(
            'drivco_review_two_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_two_review_count_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .rating a .content ul li',


            ]
        );

        $this->add_control(
            'drivco_review_two_review_count_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .rating a .content ul li' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_two_review_count_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .rating a .content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_two_review_count_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-testimonial-section .rating a .content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        //Testimony Title
        $this->start_controls_section(
            'drivco_testimonial_two_style_testimony_title',
            [
                'label' => esc_html__('Testimony Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_two_style_testimony_title_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .feedback-card .feedback-top .services span',


            ]
        );

        $this->add_control(
            'drivco_testimonial_two_style_testimony_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .feedback-top .services span' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_two_style_testimony_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .feedback-top .services span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_two_style_testimony_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .feedback-top .services span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Testimony Description
        $this->start_controls_section(
            'drivco_testimonial_two_style_section_description',
            [
                'label' => esc_html__('Testimony Description', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_two_style_section_description_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .feedback-card p',


            ]
        );

        $this->add_control(
            'drivco_testimonial_two_style_section_description_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_two_style_section_description_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_two_style_section_description_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        //Author Name
        $this->start_controls_section(
            'drivco_testimonial_two_style_section_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_two_style_section_author_name_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .feedback-card .author-name h6',


            ]
        );

        $this->add_control(
            'drivco_testimonial_two_style_section_author_name_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .author-name h6' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_two_style_section_author_name_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .author-name h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_two_style_section_author_name_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .author-name h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Author Time
        $this->start_controls_section(
            'drivco_testimonial_two_style_section_time',
            [
                'label' => esc_html__(' Time', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_two_style_section_time_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .feedback-card .author-name span',


            ]
        );

        $this->add_control(
            'drivco_testimonial_two_style_section_time_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .author-name span' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_two_style_section_time_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .author-name span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_two_style_section_time_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home2-testimonial-section .feedback-card .author-name span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        //================== three_style_start ===============//



        //Tesimony Title
        $this->start_controls_section(
            'drivco_testimonial_three_style_testimony_title',
            [
                'label' => esc_html__('Testimony Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_three_style_testimony_title_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .review h6',


            ]
        );

        $this->add_control(
            'drivco_testimonial_three_style_testimony_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .review h6' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_three_style_testimony_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .review h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_three_style_testimony_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .review h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        //Testimony description
        $this->start_controls_section(
            'drivco_testimonial_three_style_section_description',
            [
                'label' => esc_html__('Testimony Description', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_three_style_section_description_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .content p',


            ]
        );

        $this->add_control(
            'drivco_testimonial_three_style_section_description_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .content p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_three_style_section_description_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_three_style_section_description_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Author Name
        $this->start_controls_section(
            'drivco_testimonial_three_style_section_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_three_style_section_author_name_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .author-name h5',


            ]
        );

        $this->add_control(
            'drivco_testimonial_three_style_section_author_name_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .author-name h5' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_three_style_section_author_name_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .author-name h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_three_style_section_author_name_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial-area .testimonial-wrap .author-name h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Review


        //Review Title
        $this->start_controls_section(
            'drivco_testimonial_three_review_title',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_three_review_title_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-area .trustpilot-review > strong',


            ]
        );

        $this->add_control(
            'drivco_testimonial_three_review_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review > strong' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_three_review_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review > strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_three_review_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review > strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Review Count
        $this->start_controls_section(
            'drivco_review_three_review_rating',
            [
                'label' => esc_html__('Rating', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_three_review_rating_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-area .trustpilot-review p',


            ]
        );

        $this->add_control(
            'drivco_review_three_review_rating_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_three_review_rating_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_three_review_rating_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        //Review Count
        $this->start_controls_section(
            'drivco_review_three_review_logo_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_three_review_logo_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-area .trustpilot-review p a',


            ]
        );

        $this->add_control(
            'drivco_review_three_review_logo_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review p a' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_three_review_logo_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_three_review_logo_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial-area .trustpilot-review p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();



        // =====================Style_four_Start=======================//

        $this->start_controls_section(
            'drivco_testimonial_four_style_review_title',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_four_style_review_title_typ',
                'selector' => '{{WRAPPER}} .customer-feedback-pages .feedback-card .feedback-top .stat-area span',


            ]
        );

        $this->add_control(
            'drivco_testimonial_four_style_review_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .feedback-top .stat-area span' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_four_style_review_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .feedback-top .stat-area span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_four_style_review_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .feedback-top .stat-area span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'drivco_testimonial_four_style_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_four_style_content_typ',
                'selector' => '{{WRAPPER}} .customer-feedback-pages .feedback-card p',


            ]
        );

        $this->add_control(
            'drivco_testimonial_four_style_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_four_style_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_four_style_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'drivco_testimonial_four_style_section_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_four_style_section_author_name_typ',
                'selector' => '{{WRAPPER}} .customer-feedback-pages .feedback-card .author-name h6',


            ]
        );

        $this->add_control(
            'drivco_testimonial_four_style_section_author_name_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .author-name h6' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_four_style_section_author_name_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .author-name h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_four_style_section_author_name_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .author-name h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'drivco_testimonial_four_style_time',
            [
                'label' => esc_html__('Time', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_four_style_time_typ',
                'selector' => '{{WRAPPER}} .customer-feedback-pages .feedback-card .author-name span',


            ]
        );

        $this->add_control(
            'drivco_testimonial_four_style_time_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .author-name span' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_four_style_time_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .author-name span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_four_style_time_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customer-feedback-pages .feedback-card .author-name span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Button
        $this->start_controls_section(
            'drivco_testimonial_four_style',
            [
                'label' => esc_html__('Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_four'
                ]
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'drivco_testimonial_four_tabs'
        );

        $this->start_controls_tab(
            'drivco_testimonial_four_normal_tab',
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
                'name'     => 'drivco_testimonial_four_typ',
                'selector' => '{{WRAPPER}} .primary-btn3',

            ]
        );
        $this->add_control(
            'drivco_testimonial_four_four_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_four_four_button_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'drivco-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_four_four_button_padding',
            [
                'label'      => __(
                    'Padding',
                    'drivco-core'
                ),
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
            'drivco_testimonial_four_four_button_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_testimonial_four_four_button_color_hover',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_testimonial_four_four_button_bac_color_hover',
            [
                'label'     => esc_html__('Background-Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // =====================Style_Five_Start=======================//

        $this->start_controls_section(
            'drivco_testimonial_five_style_section_title',
            [
                'label' => esc_html__('Heading title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_five_style_section_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',


            ]
        );

        $this->add_control(
            'drivco_testimonial_five_style_section_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_five_style_section_title_margin',
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
            'drivco_testimonial_five_style_section_title_padding',
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



        $this->start_controls_section(
            'drivco_testimonial_five_style_section_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_five_style_section_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_testimonial_five_style_section_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_five_style_section_subtitle_margin',
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
            'drivco_testimonial_five_style_section_subtitle_padding',
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

        //Review Count
        $this->start_controls_section(
            'drivco_review_five_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_five_review_count_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .rating a .content ul li',


            ]
        );

        $this->add_control(
            'drivco_review_five_review_count_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .rating a .content ul li' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->end_controls_section();


        //Testimony Title
        $this->start_controls_section(
            'drivco_testimonial_five_style_testimony_title',
            [
                'label' => esc_html__('Testimony Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_five_style_testimony_title_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .feedback-card .feedback-top .services span',


            ]
        );

        $this->add_control(
            'drivco_testimonial_five_style_testimony_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card .feedback-top .services span' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_five_style_testimony_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card .feedback-top .services span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_five_style_testimony_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card .feedback-top .services span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Testimony Description
        $this->start_controls_section(
            'drivco_testimonial_five_style_section_description',
            [
                'label' => esc_html__('Testimony description', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_five_style_section_description_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .feedback-card p',


            ]
        );

        $this->add_control(
            'drivco_testimonial_five_style_section_description_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_five_style_section_description_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_five_style_section_description_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        //Author Name
        $this->start_controls_section(
            'drivco_testimonial_five_style_section_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_testimonial_style_selection' => 'style_five'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_testimonial_five_style_section_author_name_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .feedback-card .author-name h6',


            ]
        );

        $this->add_control(
            'drivco_testimonial_five_style_section_author_name_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card .author-name h6' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_testimonial_five_style_section_author_name_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card .author-name h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_testimonial_five_style_section_author_name_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonial-section .feedback-card .author-name h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Bottom Review Title

        $this->start_controls_section(
            'drivco_review_counter_five_review_title_style_sec',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_counter_five_review_title_text_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .trustpilot-review > strong',


            ]
        );

        $this->add_control(
            'drivco_review_counter_five_review_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review > strong' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_counter_five_review_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review > strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_counter_five_review_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review > strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Review Count
        $this->start_controls_section(
            'drivco_review_counter_five_review_count_style',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_counter_five_review_count_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .trustpilot-review p',


            ]
        );

        $this->add_control(
            'drivco_review_counter_five_review_count_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_counter_five_review_count_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_counter_five_review_count_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Total Review 
        $this->start_controls_section(
            'drivco_review_counter_five_total_review_count_style',
            [
                'label' => esc_html__(' Total Review ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_counter_five_total_review_count_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .trustpilot-review p a',


            ]
        );

        $this->add_control(
            'drivco_review_counter_five_total_review_count_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review p a' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_counter_five_total_review_count_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_counter_five_total_review_count_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-testimonial-section .trustpilot-review p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_testimonial_one_section_list'];
        $data2 = $settings['drivco_testimonial_two_section_list'];
        $data3 = $settings['drivco_testimonial_three_section_list'];
        $data5 = $settings['drivco_testimonial_three_list'];
        $data4 = $settings['drivco_testimonial_four_section_list'];
        $data6 = $settings['drivco_testimonial_five_section_list'];

?>
        <?php if (is_admin()) : ?>
            <script>
                jQuery(".marquee_text2").marquee({
                    direction: "left",
                    duration: 25000,
                    gap: 50,
                    delayBeforeStart: 0,
                    duplicated: true,
                    startVisible: true,
                });
                // Customer Feedback
                var swiper = new Swiper(".customer-feedback-slider", {
                    slidesPerView: 3,
                    speed: 1500,
                    spaceBetween: 25,
                    loop: true,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-4",
                        prevEl: ".prev-4",
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
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 24,
                        },
                        1400: {
                            slidesPerView: 2
                        },
                    }
                });

                var swiper = new Swiper(".customer-feedback-slider2", {
                    slidesPerView: 3,
                    speed: 1500,
                    spaceBetween: 25,
                    loop: true,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-6",
                        prevEl: ".prev-6",
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
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 2,
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

                var swiper = new Swiper(".testimonial-slider3", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 30,
                    slidesPerView: 1,
                    centerSlides: true,
                    loop: true,
                    autoplay: {
                        delay: 3000, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".next-10",
                        prevEl: ".prev-10",
                    },

                });
            </script>
        <?php endif ?>


        <?php if ($settings['drivco_testimonial_style_selection'] == 'style_one') : ?>
            <div class="customar-feedback-area">
                <?php if ('yes' == $settings['drivco_testimonial_heading_sec_switcher']) { ?>
                    <div class="mb-60">
                        <div class="section-title1">
                            <?php if (!empty($settings['drivco_testimonial_heading_sec_subtitle'])) :   ?>
                                <span><?php echo esc_html($settings['drivco_testimonial_heading_sec_subtitle']) ?></span>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_testimonial_heading_sec_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_testimonial_heading_sec_title']) ?></h2>
                            <?php endif ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="customer-feedback-right">
                    <div class="swiper customer-feedback-slider mb-40">
                        <div class="swiper-wrapper">
                            <?php foreach ($data as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="feedback-card">
                                        <div class="feedback-top">
                                            <div class="stat-area">
                                                <?php if ('general' == $item['drivco_testimonial_one_review']) { ?>
                                                    <ul>
                                                        <?php $rank_counter = intval($item['drivco_testimonial_one_style_rank_icon']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php } ?>

                                                <?php if ('trustpilot' == $item['drivco_testimonial_one_review']) { ?>
                                                    <ul class="trustpilot">
                                                        <?php $rank_counter = intval($item['drivco_testimonial_one_style_rank_icon']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php } ?>
                                                <?php if (!empty($item['drivco_testimonial_one_title'])) :   ?>
                                                    <span><?php echo esc_html($item['drivco_testimonial_one_title']) ?></span>
                                                <?php endif ?>
                                            </div>
                                            <div class="logo">
                                                <?php if (!empty($item['drivco_testimonial_one_company_logo_one']['url'])) :   ?>
                                                    <img src="<?php echo esc_url($item['drivco_testimonial_one_company_logo_one']['url']) ?>" alt="<?php echo esc_attr('Company Logo', 'drivco-core') ?>">
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($item['drivco_testimonial_one_company_section_description'])) :   ?>
                                            <p><?php echo esc_html($item['drivco_testimonial_one_company_section_description']) ?></p>
                                        <?php endif ?>
                                        <div class="author-name">
                                            <?php if (!empty($item['drivco_testimonial_one_author_name'])) :   ?>
                                                <h6><?php echo esc_html($item['drivco_testimonial_one_author_name']) ?></h6>
                                            <?php endif ?>
                                            <?php if (!empty($item['drivco_testimonial_one_author_designation'])) :   ?>
                                                <span><?php echo esc_html($item['drivco_testimonial_one_author_designation']) ?></span>
                                            <?php endif ?>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row ">
                        <?php if ('yes' == $settings['drivco_testimonial_devider_devider']) { ?>
                            <div class="col-lg-12 divider">
                                <div class="slider-btn-group style-2 justify-content-md-between justify-content-center">
                                    <div class="slider-btn prev-4 d-md-flex d-none">
                                        <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                        </svg>
                                    </div>
                                    <div class="view-btn-area">
                                        <?php if (!empty($settings['drivco_testimonial_devider_btn_title'])) :   ?>
                                            <p><?php echo esc_html($settings['drivco_testimonial_devider_btn_title']) ?></p>
                                        <?php endif ?>
                                        <?php if (!empty($settings['drivco_testimonial_devider_btn_text'])) :   ?>
                                            <a class="view-btn" href="<?php echo esc_url($settings['drivco_testimonial_devider_button_url']['url']) ?>"><?php echo esc_html($settings['drivco_testimonial_devider_btn_text']) ?></a>
                                        <?php endif ?>
                                    </div>
                                    <div class="slider-btn next-4 d-md-flex d-none">
                                        <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endif ?>


        <?php if ($settings['drivco_testimonial_style_selection'] == 'style_two') : ?>
            <div class="home2-testimonial-section ">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_testimonial_heading_two_sec_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['drivco_testimonial_heading_two_sec_title']) ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['drivco_testimonial_heading_two_sec_subtitle'])) :   ?>
                                    <p><?php echo esc_html($settings['drivco_testimonial_heading_two_sec_subtitle']) ?></p>
                                <?php endif ?>
                            </div>
                            <div class="review-and-btn d-flex flex-wrap align-items-center gap-sm-5 gap-3">
                                <div class="rating">
                                    <a>
                                        <div class="review-top">
                                            <div class="logo">
                                                <?php if (!empty($settings['drivco_testimonial_two_logo']['url'])) :   ?>
                                                    <img src="<?php echo esc_url($settings['drivco_testimonial_two_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo', 'drivco-core') ?>">
                                                <?php endif ?>
                                            </div>
                                            <div class="star">
                                                <?php if ('general' == $settings['drivco_testimonial_two_review']) { ?>
                                                    <ul>
                                                        <?php $rank_counter = intval($settings['drivco_testimonial_two_review_star_two']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php } ?>

                                                <?php if ('trustpilot' == $settings['drivco_testimonial_two_review']) { ?>
                                                    <ul class="trustpilot">
                                                        <?php $rank_counter = intval($settings['drivco_testimonial_two_review_star_two']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <?php if (!empty($settings['drivco_testimonial_two_ranking_text'])) :   ?>
                                                    <li><?php echo esc_html($settings['drivco_testimonial_two_ranking_text']) ?> <span><?php echo sprintf("%2d.0", $rank_counter) ?></span></li>
                                                <?php endif ?>
                                                <?php if (!empty($settings['drivco_testimonial_two_review_count'])) :   ?>
                                                    <li> <?php echo wp_kses($settings['drivco_testimonial_two_review_count'], wp_kses_allowed_html('post'))  ?></li>
                                                <?php endif ?>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                <?php if ('yes' == $settings['drivco_testimonial_two_review_devider']) { ?>
                                    <div class="slider-btn-group2">
                                        <div class="slider-btn prev-6">
                                            <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                            </svg>
                                        </div>
                                        <div class="slider-btn next-6">
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
                        <div class="col-lg-12">
                            <div class="swiper customer-feedback-slider2">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data2 as $item2) : ?>
                                        <div class="swiper-slide">
                                            <div class="feedback-card">
                                                <div class="feedback-top">
                                                    <div class="stat-area">
                                                        <?php if ('general' == $item2['drivco_testimonial_two_services_review']) { ?>
                                                            <ul>
                                                                <?php $rank_counter = intval($item2['drivco_testimonial_two_review_star_services_sec']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li><i class="bi bi-star-fill"></i></li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            </ul>
                                                        <?php } ?>

                                                        <?php if ('trustpilot' == $item2['drivco_testimonial_two_services_review']) { ?>
                                                            <ul class="trustpilot">
                                                                <?php $rank_counter = intval($item2['drivco_testimonial_two_review_star_services_sec']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li><i class="bi bi-star-fill"></i></li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="services">
                                                        <?php if (!empty($item2['drivco_testimonial_two_services_title'])) :   ?>
                                                            <span><?php echo wp_kses($item2['drivco_testimonial_two_services_title'], wp_kses_allowed_html('post'))  ?></span>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <?php if (!empty($item2['drivco_testimonial_two_services_content'])) :   ?>
                                                    <p><?php echo wp_kses($item2['drivco_testimonial_two_services_content'], wp_kses_allowed_html('post'))  ?></p>
                                                <?php endif ?>
                                                <div class="author-name">
                                                    <?php if (!empty($item2['drivco_testimonial_two_author_name'])) :   ?>
                                                        <h6><?php echo wp_kses($item2['drivco_testimonial_two_author_name'], wp_kses_allowed_html('post'))  ?></h6>
                                                    <?php endif ?>
                                                    <?php if (!empty($item2['drivco_testimonial_two_time'])) :   ?>
                                                        <span><?php echo wp_kses($item2['drivco_testimonial_two_time'], wp_kses_allowed_html('post'))  ?></span>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ('yes' == $settings['drivco_testimonial_two_pagignation']) { ?>
                        <div class="col-lg-12 d-flex justify-content-center mt-40">
                            <div class="slider-btn-pagination">
                                <div class="slider-btn prev-6" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-85309489d313fe87"><i class="bi bi-arrow-left"></i></div>
                                <div class="pagination pagination8 swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                                <div class="slider-btn next-6" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-85309489d313fe87"><i class="bi bi-arrow-right"></i></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['drivco_testimonial_style_selection'] == 'style_three') : ?>
            <div class="home3-testimonial-area ">
                <ul class="sm-img-group">
                    <?php
                    $count = 0;
                    foreach ($data3 as $item3) :
                        if ($count >= 6) {
                            break;
                        }
                        if (!empty($item3['drivco_testimonial_three_group_image'])) :
                    ?>
                            <?php if (!empty($item3['drivco_testimonial_three_group_image']['url'])) : ?>
                                <li><img src="<?php echo esc_url($item3['drivco_testimonial_three_group_image']['url']) ?>" alt="<?php echo esc_attr('Group Image', 'drivco-core') ?>"></li>
                            <?php endif ?>
                    <?php
                            $count++;
                        endif;
                    endforeach;
                    ?>
                </ul>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper testimonial-slider3">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data5 as $item5) : ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-wrap text-center">
                                                <div class="author-image-area">
                                                    <div class="quat">
                                                        <img src="<?php echo get_template_directory_uri()  ?>/assets/img/home3/icon/quat.svg" alt="<?php echo esc_attr__('quot-icon', 'drivco-core') ?>">
                                                    </div>
                                                    <?php if (!empty($item5['drivco_testimonial_three_author_image']['url'])) :   ?>
                                                        <img src="<?php echo esc_url($item5['drivco_testimonial_three_author_image']['url']) ?>" alt="<?php echo esc_attr('Author Image', 'drivco-core') ?>">
                                                    <?php endif ?>
                                                </div>
                                                <div class="review">
                                                    <div class="star">
                                                        <?php if ('general' == $item5['drivco_testimonial_three_review']) { ?>
                                                            <ul>
                                                                <?php $rank_counter = intval($item5['drivco_testimonial_three_review_star_sec']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li><i class="bi bi-star-fill"></i></li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            </ul>
                                                        <?php } ?>

                                                        <?php if ('trustpilot' == $item5['drivco_testimonial_three_review']) { ?>
                                                            <ul class="trustpilot">
                                                                <?php $rank_counter = intval($item5['drivco_testimonial_three_review_star_sec']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li><i class="bi bi-star-fill"></i></li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            </ul>
                                                        <?php } ?>

                                                    </div>
                                                    <?php if (!empty($item5['drivco_testimonial_three_testimonial_title'])) :   ?>
                                                        <h6><?php echo esc_html($item5['drivco_testimonial_three_testimonial_title']) ?></h6>
                                                    <?php endif ?>
                                                </div>
                                                <div class="content">
                                                    <?php if (!empty($item5['drivco_testimonial_three_testimonial_content'])) :   ?>
                                                        <p><?php echo esc_html($item5['drivco_testimonial_three_testimonial_content']) ?></p>
                                                    <?php endif ?>
                                                </div>
                                                <div class="author-name">
                                                    <?php if (!empty($item5['drivco_testimonial_three_testimonial_author_name'])) :   ?>
                                                        <h5><?php echo esc_html($item5['drivco_testimonial_three_testimonial_author_name']) ?></h5>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="slider-btn-group2">
                                <div class="slider-btn prev-10">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                    </svg>
                                </div>
                                <div class="trustpilot-review">
                                    <?php if (!empty($settings['drivco_testimonial_three_style_ranking_text'])) :   ?>
                                        <strong> <?php echo esc_html($settings['drivco_testimonial_three_style_ranking_text']) ?></strong>
                                    <?php endif ?>
                                    <div class="star">
                                        <?php if ('general' == $settings['drivco_testimonial_three_review_section']) { ?>
                                            <ul>
                                                <?php $rank_counter = intval($settings['drivco_testimonial_three_review_star']);
                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <?php if ($i <= $rank_counter) : ?>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                    <?php endif ?>
                                                <?php endfor; ?>
                                            </ul>
                                        <?php } ?>

                                        <?php if ('trustpilot' == $settings['drivco_testimonial_three_review_section']) { ?>
                                            <ul class="trustpilot">
                                                <?php $rank_counter = intval($settings['drivco_testimonial_three_review_star']);
                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <?php if ($i <= $rank_counter) : ?>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                    <?php endif ?>
                                                <?php endfor; ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                    <p><?php echo $rank_counter ?> <?php echo esc_html('Rating out of 5.0 Based On') ?><a href="<?php echo esc_url($settings['drivco_testimonial_three_url']['url']) ?>"><?php echo wp_kses($settings['drivco_testimonial_three_review_count'], wp_kses_allowed_html('post'))  ?></a> </p>
                                    <img src="<?php echo esc_url($settings['drivco_testimonial_three_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo', 'drivco-core') ?>">
                                </div>

                                <div class="slider-btn  next-10">
                                    <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['drivco_testimonial_style_selection'] == 'style_four') : ?>
            <div class="customer-feedback-pages">
                <div class="container">
                    <div class="row g-4">
                        <?php foreach ($data4 as $item4) : ?>
                            <div class="col-lg-4">
                                <div class="feedback-card">
                                    <div class="feedback-top">
                                        <div class="stat-area">

                                            <?php if ('general' == $item4['drivco_testimonial_four_review_section']) { ?>
                                                <ul class="star">
                                                    <?php $rank_counter = intval($item4['drivco_testimonial_four_review_star_services_sec']);
                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <?php if ($i <= $rank_counter) : ?>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                        <?php endif ?>
                                                    <?php endfor; ?>
                                                </ul>
                                            <?php } ?>

                                            <?php if ('trustpilot' == $item4['drivco_testimonial_four_review_section']) { ?>
                                                <ul class="trustpilot">
                                                    <?php $rank_counter = intval($item4['drivco_testimonial_four_review_star_services_sec']);
                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <?php if ($i <= $rank_counter) : ?>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                        <?php endif ?>
                                                    <?php endfor; ?>
                                                </ul>
                                            <?php } ?>


                                            <?php if (!empty($item4['drivco_testimonial_four_services_title'])) :   ?>
                                                <span> <?php echo esc_html($item4['drivco_testimonial_four_services_title']) ?></span>
                                            <?php endif ?>
                                        </div>
                                        <div class="logo">
                                            <?php if (!empty($item4['drivco_testimonial_four_logo']['url'])) :   ?>
                                                <img src="<?php echo esc_url($item4['drivco_testimonial_four_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo', 'drivco-core') ?>">
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($item4['drivco_testimonial_four_testimonial_content'])) :   ?>
                                        <p><?php echo esc_html($item4['drivco_testimonial_four_testimonial_content']) ?></p>
                                    <?php endif ?>
                                    <div class="author-name">
                                        <?php if (!empty($item4['drivco_testimonial_four_author_name'])) :   ?>
                                            <h6><?php echo esc_html($item4['drivco_testimonial_four_author_name']) ?>,</h6>
                                        <?php endif ?>
                                        <?php if (!empty($item4['drivco_testimonial_four_time'])) :   ?>
                                            <span><?php echo esc_html($item4['drivco_testimonial_four_time']) ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['drivco_testimonial_style_selection'] == 'style_five') : ?>
            <div class="home5-testimonial-section">
                <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_testimonial_heading_five_sec_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_testimonial_heading_five_sec_title']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_testimonial_heading_five_sec_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_testimonial_heading_five_sec_subtitle']) ?></p>
                            <?php endif ?>
                        </div>
                        <div class="review-and-btn d-flex flex-wrap align-items-center gap-sm-5 gap-3">
                            <div class="rating">
                                <a href="<?php echo esc_url($settings['drivco_testimonial_five_review_url']['url']) ?>">
                                    <div class="review-top">
                                        <div class="logo">
                                            <?php if (!empty($settings['drivco_testimonial_five_logo']['url'])) :   ?>
                                                <img src="<?php echo esc_url($settings['drivco_testimonial_five_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo', 'drivco-core') ?>">
                                            <?php endif ?>
                                        </div>
                                        <div class="star">
                                            <?php if ('general' == $settings['drivco_testimonial_five_review']) { ?>
                                                <ul>
                                                    <?php $rank_counter = intval($settings['drivco_testimonial_five_review_star_two']);
                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <?php if ($i <= $rank_counter) : ?>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                        <?php endif ?>
                                                    <?php endfor; ?>
                                                </ul>
                                            <?php } ?>

                                            <?php if ('trustpilot' == $settings['drivco_testimonial_five_review']) { ?>
                                                <ul class="trustpilot">
                                                    <?php $rank_counter = intval($settings['drivco_testimonial_five_review_star_two']);
                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <?php if ($i <= $rank_counter) : ?>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                        <?php endif ?>
                                                    <?php endfor; ?>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <?php if (!empty($settings['drivco_testimonial_five_ranking_text'])) :   ?>
                                                <li><?php echo esc_html($settings['drivco_testimonial_five_ranking_text']) ?> <span><?php echo sprintf("%2d.0", $rank_counter) ?></li>
                                            <?php endif ?>
                                            <?php if (!empty($settings['drivco_testimonial_five_review_count'])) :   ?>
                                                <li> <?php echo wp_kses($settings['drivco_testimonial_five_review_count'], wp_kses_allowed_html('post'))  ?></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay="300ms">
                    <div class="col-lg-12">
                        <div class="swiper customer-feedback-slider2 wow fadeInUp" data-wow-delay="300ms">
                            <div class="swiper-wrapper">
                                <?php foreach ($data6 as $item6) : ?>
                                    <div class="swiper-slide">
                                        <div class="feedback-card">
                                            <div class="feedback-top">
                                                <div class="stat-area">
                                                    <?php if ('general' == $item6['drivco_testimonial_five_services_review']) { ?>
                                                        <ul>
                                                            <?php $rank_counter = intval($item6['drivco_testimonial_five_review_star_services_sec']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    <?php } ?>

                                                    <?php if ('trustpilot' == $item6['drivco_testimonial_five_services_review']) { ?>
                                                        <ul class="trustpilot">
                                                            <?php $rank_counter = intval($item6['drivco_testimonial_five_review_star_services_sec']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                                <div class="services">
                                                    <?php if (!empty($item6['drivco_testimonial_five_services_title'])) :   ?>
                                                        <span><?php echo wp_kses($item6['drivco_testimonial_five_services_title'], wp_kses_allowed_html('post'))  ?></span>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <?php if (!empty($item6['drivco_testimonial_five_services_content'])) :   ?>
                                                <p><?php echo wp_kses($item6['drivco_testimonial_five_services_content'], wp_kses_allowed_html('post'))  ?></p>
                                            <?php endif ?>
                                            <div class="author-name">
                                                <?php if (!empty($item6['drivco_testimonial_five_author_name'])) :   ?>
                                                    <h6><?php echo wp_kses($item6['drivco_testimonial_five_author_name'], wp_kses_allowed_html('post'))  ?></h6>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="slider-btn-group2 pt-50 wow fadeInUp" data-wow-delay="400ms">
                            <div class="slider-btn prev-6 d-lg-flex d-none">
                                <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                </svg>
                            </div>
                            <div class="trustpilot-review">
                                <?php if (!empty($settings['drivco_review_counter_five_title'])) :   ?>
                                    <strong><?php echo esc_html($settings['drivco_review_counter_five_title']) ?></strong>
                                <?php endif; ?>
                                <?php if ('general' == $settings['drivco_review_five_section']) { ?>
                                    <ul>
                                        <?php $rank_counter = intval($settings['drivco_review_counter_five_review_star']);
                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <?php if ($i <= $rank_counter) : ?>
                                                <li><i class="bi bi-star-fill"></i></li>
                                            <?php endif ?>
                                        <?php endfor; ?>
                                    </ul>
                                <?php } ?>

                                <?php if ('trustpilot' == $settings['drivco_review_five_section']) { ?>
                                    <ul class="trustpilot">
                                        <?php $rank_counter = intval($settings['drivco_review_counter_five_review_star']);
                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <?php if ($i <= $rank_counter) : ?>
                                                <li><i class="bi bi-star-fill"></i></li>
                                            <?php endif ?>
                                        <?php endfor; ?>
                                    </ul>
                                <?php } ?>
                                <p><?php echo $rank_counter ?> <?php echo esc_html('Rating out of 5.0 Based On') ?><a href="<?php echo esc_url($settings['drivco_review_counter_five_review_count_url']['url']) ?>"><?php echo wp_kses($settings['drivco_review_counter_five_review_count'], wp_kses_allowed_html('post'))  ?></a> </p>
                                <img src="<?php echo esc_url($settings['drivco_review_counter_five_review_logo']['url']) ?>" alt="<?php echo esc_attr('Review Logo', 'drivco-core') ?>">
                            </div>
                            <div class="slider-btn next-6 d-lg-flex d-none">
                                <svg width="9" height="15" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php endif ?>



<?php

    }
}

Plugin::instance()->widgets_manager->register(new drivco_Testimonial_Widget());
