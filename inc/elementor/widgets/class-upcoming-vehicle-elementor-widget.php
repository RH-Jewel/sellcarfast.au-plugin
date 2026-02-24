<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Upcoming_Vehicle_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_upcoming_vehicle';
    }

    public function get_title()
    {
        return esc_html__('EG Upcoming Vehicle', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-calendar';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car_general',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_style_choose',
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
            'driveco_show_info_btn',
            [
                'label' => esc_html__('Info And Button?', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_info_text',
            [
                'label' => esc_html__('Info Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('There will be 100+ Upcoming Car', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'driveco_show_info_btn' => 'yes',
                ],
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_btn_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View More', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'driveco_show_info_btn' => 'yes',
                ],
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );

        $this->add_control(
            'info_button_url_upcoming',
            [
                'label' => esc_html__('Button Link', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'driveco_show_info_btn' => 'yes',
                ],
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => 'style_one',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car_style_two_heading',
            [
                'label' => esc_html__('Heading', 'drivco-core'),
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_three', 'style_two', 'style_four', 'style_five', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_style_two_heading_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Upcoming Cars', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Here are some of the featured cars in different categories', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_style_four_heading_button_text',
            [
                'label' => esc_html__('Header Button Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore More', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => 'style_four',
                ],
            ]
        );

        $this->add_control(
            'heading_button_url_style_four',
            [
                'label' => esc_html__('Header Button URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => 'style_four',
                ],
            ]
        );




        $this->end_controls_section();



        //style_one
        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car',
            [
                'label' => esc_html__('Upcoming Cars', 'drivco-core'),
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'upcoming-car-image',
            [
                'label' => esc_html__('Choose Car Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'upcoming_company_logo',
            [
                'label' => esc_html__('Company Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_price',
            [
                'label' => esc_html__('Car Price', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_title',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_launch',
            [
                'label' => esc_html__('Launch Date Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Expected Launch', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_launch_date',
            [
                'label' => esc_html__('Launch Date', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('02 June, 2023', 'drivco-core'),
                'label_block' => true,

            ]
        );


        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_btn_txt',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Notify Me When Launch', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'upcoming_car_gallery',
            [
                'label' => esc_html__('Add Car Gallery Images', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],

            ]
        );


        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_list',
            [
                'label' => esc_html__('Car List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title' => esc_html__('Lamborghini Aventador', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price' => esc_html__('$34,637.00', 'drivco-core'),


                    ], [
                        'drivco_upcoming_vehicle_upcoming_car_title' => esc_html__('Tesla Model S-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title' => esc_html__('Tesla Model S-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title' => esc_html__('BMW 3 Series-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title' => esc_html__('Kia Telluride-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_two' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                ],
                'title_field' => '{{{ drivco_upcoming_vehicle_upcoming_car_title }}}',
            ]
        );


        $this->end_controls_section();

        //style_two
        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car_style_two',
            [
                'label' => esc_html__('Upcoming Cars', 'drivco-core'),
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_two'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'upcoming-car-image_2',
            [
                'label' => esc_html__('Choose Car Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );



        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_style_two_price',
            [
                'label' => esc_html__('Car Price', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_style_two_model',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_two',
            [
                'label' => esc_html__('Launch Date', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('02 June, 2023', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_style_two_list',
            [
                'label' => esc_html__('Car List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_upcoming_vehicle_upcoming_car_style_two_model' => esc_html__('Lamborghini Aventador', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_two' => esc_html__('$34,637.00', 'drivco-core'),


                    ], [
                        'drivco_upcoming_vehicle_upcoming_car_style_two_model' => esc_html__('Tesla Model S-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_two' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_style_two_model' => esc_html__('Tesla Model S-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_two' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_style_two_model' => esc_html__('BMW 3 Series-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_two' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_style_two_model' => esc_html__('Kia Telluride-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_two' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                ],
                'title_field' => '{{{ drivco_upcoming_vehicle_upcoming_car_style_two_model }}}',
            ]
        );

        $this->end_controls_section();

        //style_three
        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car_style_three',
            [
                'label' => esc_html__('Upcoming Cars', 'drivco-core'),
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_three'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'upcoming-car-image3',
            [
                'label' => esc_html__('Car Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_title_style_three',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_mileage_style_three',
            [
                'label' => esc_html__('Mileage', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2500 miles', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_fuel_type_style_three',
            [
                'label' => esc_html__('Fuel Type', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Petrol + Gas', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_feature_style_three',
            [
                'label' => esc_html__('Feature', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Electric', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'upcoming_car_gallery_style_three',
            [
                'label' => esc_html__('Add Car Images To Gallary', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],

            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_list_style_three',
            [
                'label' => esc_html__('Car List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_three' => esc_html__('Lamborghini Aventador', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_three' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_three' => esc_html__('Expected Date', 'drivco-core'),

                    ], [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_three' => esc_html__('Tesla Model S-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_three' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_three' => esc_html__('Expected Date', 'drivco-core'),

                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_three' => esc_html__('Tesla Model S-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_three' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_three' => esc_html__('Expected Date', 'drivco-core'),

                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_three' => esc_html__('BMW 3 Series-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_three' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_three' => esc_html__('Expected Date', 'drivco-core'),

                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_three' => esc_html__('Kia Telluride-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_three' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_three' => esc_html__('Expected Date', 'drivco-core'),

                    ],
                ],
                'title_field' => '{{{ drivco_upcoming_vehicle_upcoming_car_title_style_three }}}',
            ]
        );

        $this->end_controls_section();

        //style_four
        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car_style_four',
            [
                'label' => esc_html__('Upcoming Cars', 'drivco-core'),
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'upcoming-car-image4',
            [
                'label' => esc_html__('Choose Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_title_style_four',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Demo', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_launch_text_style_four',
            [
                'label' => esc_html__('Launch Date Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Expected Launched', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_four',
            [
                'label' => esc_html__('Launch Date', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('02 June, 2023', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_mileage_style_four',
            [
                'label' => esc_html__('Mileage', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2500 miles', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_fuel_type_style_four',
            [
                'label' => esc_html__('Fuel Type', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Petrol + Gas', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_feature_style_four',
            [
                'label' => esc_html__('Feature', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Electric', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_btn_txt_style_four',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Alert Me', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_price_text_style_four',
            [
                'label' => esc_html__('Price Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Excellent Price', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_price_style_four',
            [
                'label' => esc_html__('Car Price', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$20000', 'drivco-core'),
                'label_block' => true,

            ]
        );


        $repeater->add_control(
            'upcoming_car_gallery_style_four',
            [
                'label' => esc_html__('Add Car Images To Gallary', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],

            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_list_style_four',
            [
                'label' => esc_html__('Car List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_four' => esc_html__('Lamborghini Aventador', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_four' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_four' => esc_html__('Expected Date', 'drivco-core'),

                    ], [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_four' => esc_html__('Lamborghini Aventador', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_four' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_four' => esc_html__('Expected Date', 'drivco-core'),

                    ],
                ],
                'title_field' => '{{{ drivco_upcoming_vehicle_upcoming_car_title_style_four }}}',
            ]
        );

        $this->end_controls_section();


        //style_five
        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car_style_five',
            [
                'label' => esc_html__('Upcoming Cars', 'drivco-core'),
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_five'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'upcoming-car-image5',
            [
                'label' => esc_html__('Choose Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_title_style_five',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Demo', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_price_style_five',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$240000', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_launch_text_style_five',
            [
                'label' => esc_html__('Launch Date Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Expected Date', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_five',
            [
                'label' => esc_html__('Launch Date', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('02 June, 2023', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_btn_txt_style_five',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View Details', 'drivco-core'),
                'label_block' => true,

            ]
        );


        $repeater->add_control(
            'upcoming_car_gallery_style_five',
            [
                'label' => esc_html__('Add Images To Gallary', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],

            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_list_style_five',
            [
                'label' => esc_html__('Car List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_five' => esc_html__('Lamborghini Aventador', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_five' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_text_style_five' => esc_html__('Expected Date', 'drivco-core'),

                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_five' => esc_html__('Lamborghini Aventador', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_five' => esc_html__('$34,637.00', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_expected_launch_text_style_five' => esc_html__('Expected Date', 'drivco-core'),
                    ],
                ],
                'title_field' => '{{{ drivco_upcoming_vehicle_upcoming_car_title_style_five }}}',
            ]
        );

        $this->end_controls_section();

        //style_six
        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car_style_six',
            [
                'label' => esc_html__('Upcoming Cars', 'drivco-core'),
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_six'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'upcoming-car-image6',
            [
                'label' => esc_html__('Choose Car Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_title_style_six',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Demo', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_location_text_style_six',
            [
                'label' => esc_html__('Location', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Sydne City', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_mileage_style_six',
            [
                'label' => esc_html__('Mileage', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2500 miles', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_fuel_type_style_six',
            [
                'label' => esc_html__('Fuel Type', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Petrol + Gas', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_feature_style_six',
            [
                'label' => esc_html__('Feature', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Electric', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_price_text_style_six',
            [
                'label' => esc_html__('Price Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Great Price', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_price_style_six',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$240000', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'drivco_upcoming_vehicle_upcoming_car_expected_btn_txt_style_six',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View Details', 'drivco-core'),
                'label_block' => true,

            ]
        );


        $repeater->add_control(
            'upcoming_car_gallery_style_six',
            [
                'label' => esc_html__('Add Car Images To Gallary', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],

            ]
        );

        $this->add_control(
            'drivco_upcoming_vehicle_upcoming_car_list_style_six',
            [
                'label' => esc_html__('Car List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_six' => esc_html__('Lamborghini Aventador', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_six' => esc_html__('$34,637.00', 'drivco-core'),


                    ], [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_six' => esc_html__('Tesla Model S-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_six' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_six' => esc_html__('Tesla Model S-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_six' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_six' => esc_html__('BMW 3 Series-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_six' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                    [
                        'drivco_upcoming_vehicle_upcoming_car_title_style_six' => esc_html__('Kia Telluride-2023', 'drivco-core'),
                        'drivco_upcoming_vehicle_upcoming_car_price_style_six' => esc_html__('$34,637.00', 'drivco-core'),


                    ],
                ],
                'title_field' => '{{{ drivco_upcoming_vehicle_upcoming_car_title_style_six }}}',
            ]
        );

        $this->end_controls_section();




        $this->start_controls_section(
            'drivco_upcoming_vehicle_upcoming_car_modal_box',
            [
                'label' => esc_html__('Modal Box', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_modal_box_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Notify For Upcoming Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_modal_box_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('If you need to set up email want to receive notifications', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_modal_box_bottom_notice',
            [
                'label' => esc_html__('Bottom Notice', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your notify instantly by email when new car will launch.', 'drivco-core'),
                'placeholder' => esc_html__('Type your notice here', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_modal_box_shortcode',
            [
                'label' => esc_html__('Shortcode', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type your shortcode here', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();


        //style_start
        //style_one

        //Title
        $this->start_controls_section(
            'drivco_upcoming_car_style_one_model',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_one_model_typ',
                'selector' => '{{WRAPPER}} .product-card .product-content h5 a',
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_one_model_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_one_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card .product-content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //price
        $this->start_controls_section(
            'drivco_upcoming_car_style_one_price',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_one_price_typ',
                'selector' => '{{WRAPPER}} .product-card.style-2 .product-content .content-top .price',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card.style-2 .product-content .content-top .price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card.style-2 .product-content .content-top .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card.style-2 .product-content .content-top .price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Date Label
        $this->start_controls_section(
            'drivco_upcoming_car_style_one_date_label',
            [
                'label' => esc_html__('Date Label', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_one_date_label_typ',
                'selector' => '{{WRAPPER}} .product-card.style-2 .product-content .launch-date p',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_date_label_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card.style-2 .product-content .launch-date p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Date
        $this->start_controls_section(
            'drivco_upcoming_car_style_one_date',
            [
                'label' => esc_html__('Date', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_one_date_typ',
                'selector' => '{{WRAPPER}} .product-card.style-2 .product-content .launch-date p span',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_date_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card.style-2 .product-content .launch-date p span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_date_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card.style-2 .product-content .launch-date p span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_date_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card.style-2 .product-content .launch-date p span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //button
        $this->start_controls_section(
            'drivco_upcoming_car_style_one_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_one_button_hover_txt_color',
            [
                'label'     => esc_html__('Hover Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_one_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card.style-2 .product-content .launch-btn .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_button_background_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //info text
        $this->start_controls_section(
            'drivco_upcoming_car_style_one_info_text',
            [
                'label' => esc_html__('Info Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_one_info_text_typ',
                'selector' => '{{WRAPPER}} .view-btn-area p',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_one_info_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn-area p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_info_text_margin',
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
            'drivco_upcoming_car_style_one_info_text_padding',
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

        //bottom button
        $this->start_controls_section(
            'drivco_upcoming_car_style_one_b_button',
            [
                'label' => esc_html__('Bottm Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_one_b_button_typ',
                'selector' => '{{WRAPPER}} .view-btn',
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_one_b_button_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_one_b_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .view-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_b_button_margin',
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
            'drivco_upcoming_car_style_one_b_button_padding',
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

        //pagination

        $this->start_controls_section(
            'drivco_upcoming_car_style_one_pagination',
            [
                'label' => esc_html__('Pagination', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_one_pagination_typ',
                'selector' => '{{WRAPPER}} .view-btn',
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_one_pagination_hover',
            [
                'label'     => esc_html__('Hover BG Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_one_pagination_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_one_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-group .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_one_pagination_margin',
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
            'drivco_upcoming_car_style_one_pagination_padding',
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



        //image
        $this->start_controls_section(
            'drivco_upcoming_car_style_one_image',
            [
                'label' => esc_html__('Image', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_one'],
                ],
            ]
        );

        $this->add_control(
            'image_control_style_one',
            [
                'label' => esc_html__('Width', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .product-card .product-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
        //styletwo

        //heading_title_style_two
        $this->start_controls_section(
            'drivco_upcoming_car_style_two_heading_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_two_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_two_heading_title_margin',
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
            'drivco_upcoming_car_style_two_heading_title_padding',
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

        //heading_subtitle_style_two
        $this->start_controls_section(
            'drivco_upcoming_car_style_two_heading_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_two_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_two_heading_subtitle_margin',
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
            'drivco_upcoming_car_style_two_heading_subtitle_padding',
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

        //Model
        $this->start_controls_section(
            'drivco_upcoming_car_style_two_model',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_two_model_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-content h6 a',
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_two_model_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_two_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_two_model_margin',
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
            'drivco_upcoming_car_style_two_model_padding',
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

        //style_two_price
        $this->start_controls_section(
            'drivco_upcoming_car_style_two_price',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_two_price_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-content .price strong',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content .price strong' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_two_price_margin',
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
            'drivco_upcoming_car_style_two_price_padding',
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

        //style_two_date
        $this->start_controls_section(
            'drivco_upcoming_car_style_two_date',
            [
                'label' => esc_html__('Date', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_two_date_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-img .date button',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_date_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-img .date button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-img .date button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_two_date_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-img .date button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_two_date_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card2 .product-img .date button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //style_two_button
        $this->start_controls_section(
            'drivco_upcoming_car_style_two_arrow_btn',
            [
                'label' => esc_html__('Arrow Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_two'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_two_arrow_btn_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-img .date button',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_arrow_hover_btn_color',
            [
                'label'     => esc_html__('Hover BG Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content .details-btn a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_arrow_bg_btn_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content .details-btn a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_btn_bg_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2:hover .product-content .details-btn a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_two_btn_normal_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content .details-btn a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_two_btn_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-img .date button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_two_btn_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card2 .product-img .date button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //image_style_two
        $this->start_controls_section(
            'drivco_upcoming_car_style_two_image',
            [
                'label' => esc_html__('Image', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_two'],
                ],
            ]
        );

        $this->add_control(
            'image_control_style_two',
            [
                'label' => esc_html__('Width', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();


        //style_three_start

        //heading_title_style_three
        $this->start_controls_section(
            'drivco_upcoming_car_style_three_heading_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_three_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_three_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_three_heading_title_margin',
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
            'drivco_upcoming_car_style_three_heading_title_padding',
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


        //heading_subtitle_style_three
        $this->start_controls_section(
            'drivco_upcoming_car_style_three_heading_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_three_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_three_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_three_heading_subtitle_margin',
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
            'drivco_upcoming_car_style_three_heading_subtitle_padding',
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

        //Model_style_three
        $this->start_controls_section(
            'drivco_upcoming_car_style_three_car_model',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_three_car_model_typ',
                'selector' => '{{WRAPPER}} .product-card3 .product-content h5 a',
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_three_car_model_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card3 .product-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_three_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card3 .product-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_three_car_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card3 .product-content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_three_car_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card3 .product-content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Information Meta_style_three
        $this->start_controls_section(
            'drivco_upcoming_car_style_three_car_info_meta',
            [
                'label' => esc_html__('information Meta', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_three'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_three_car_info_meta_typ',
                'selector' => '{{WRAPPER}} .product-card3.style-3 .features li',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_three_car_info_meta_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card3.style-3 .features li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_three_car_info_meta_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card3.style-3 .features li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_three_car_info_meta_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card3.style-3 .features li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //image_style_three
        $this->start_controls_section(
            'drivco_upcoming_car_style_three_image',
            [
                'label' => esc_html__('Image', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_three'],
                ],
            ]
        );

        $this->add_control(
            'image_control_style_three',
            [
                'label' => esc_html__('Width', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .product-card3 .product-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style_four_start

        //heading_title_style_four

        $this->start_controls_section(
            'drivco_upcoming_car_style_four_heading_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_four_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_heading_title_marign',
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
            'drivco_upcoming_car_style_four_heading_title_padding',
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




        //heading_subtitle_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_heading_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_four_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_heading_subtitle_margin',
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
            'drivco_upcoming_car_style_four_heading_subtitle_padding',
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




        //model_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_model',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_model_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content h6 a',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_four_model_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_four_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_model_margin',
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
            'drivco_upcoming_car_style_four_model_padding',
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


        //date_text_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_date_text',
            [
                'label' => esc_html__('Date Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_date_text_typ',
                'selector' => '{{WRAPPER}} .product-card4.style-2 .product-content .exp-date p',
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_four_date_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4.style-2 .product-content .exp-date p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_date_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4.style-2 .product-content .exp-date p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_date_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4.style-2 .product-content .exp-date p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //date_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_date',
            [
                'label' => esc_html__('Date', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_date_typ',
                'selector' => '{{WRAPPER}} .product-card4.style-2 .product-content .exp-date p span',
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_four_date_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4.style-2 .product-content .exp-date p span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_date_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4.style-2 .product-content .exp-date p span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_date_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4.style-2 .product-content .exp-date p span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //information_meta_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_info_meta',
            [
                'label' => esc_html__('Information Meta', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_info_meta_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .features li',
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_four_info_meta_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_info_meta_margin',
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
            'drivco_upcoming_car_style_four_info_meta_padding',
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

        //button_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_button_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .features li',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_four_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_four_button_only_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_four_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_button_margin',
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
            'drivco_upcoming_car_style_four_button_padding',
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

        //price_text_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_price_text',
            [
                'label' => esc_html__('Price Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_price_text_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area span',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_four_price_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_price_text_margin',
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
            'drivco_upcoming_car_style_four_price_text_padding',
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

        //price_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_price',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_four_price_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_four_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_four_price_margin',
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
            'drivco_upcoming_car_style_four_price_padding',
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


        //card_style_four
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_card',
            [
                'label' => esc_html__('Card', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_four_card_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //image_style_three
        $this->start_controls_section(
            'drivco_upcoming_car_style_four_image',
            [
                'label' => esc_html__('Image', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_four'],
                ],
            ]
        );

        $this->add_control(
            'image_control_style_four',
            [
                'label' => esc_html__('Width', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();



        //style_five_start

        //heading_title_style_five
        $this->start_controls_section(
            'drivco_upcoming_car_style_five_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_five'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_five_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_five_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_title_margin',
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
            'drivco_upcoming_car_style_five_title_padding',
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


        //heading_title_style_five

        $this->start_controls_section(
            'drivco_upcoming_car_style_five_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_five'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_five_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_five_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_subtitle_margin',
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
            'drivco_upcoming_car_style_five_subtitle_padding',
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

        //Price_style_five

        $this->start_controls_section(
            'drivco_upcoming_car_style_five_price',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_five'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_five_price_typ',
                'selector' => '{{WRAPPER}} .product-card5 .product-img .product-price span',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_five_price_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_five_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-img .product-price span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_upcoming_car_style_five_price_bg_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-img .product-price span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_price_margin',
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
            'drivco_upcoming_car_style_five_price_padding',
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


        //style_five_model

        $this->start_controls_section(
            'drivco_upcoming_car_style_five_model',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_five'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_five_model_typ',
                'selector' => '{{WRAPPER}} .product-card5 .product-content h6 a',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_five_model_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_five_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_model_margin',
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
            'drivco_upcoming_car_style_five_model_padding',
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


        //style_five_date_text

        $this->start_controls_section(
            'drivco_upcoming_car_style_five_date_text_five',
            [
                'label' => esc_html__('Date Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_five'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_five_date_text_five_typ',
                'selector' => '{{WRAPPER}} .product-card5.two .product-content .exp-date p',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_five_date_text_five_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5.two .product-content .exp-date p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_date_text_five_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card5.two .product-content .exp-date p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_date_text_five_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card5.two .product-content .exp-date p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //style_five_date

        $this->start_controls_section(
            'drivco_upcoming_car_style_five_date',
            [
                'label' => esc_html__('Date', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_five'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_five_date_typ',
                'selector' => '{{WRAPPER}} .product-card5.two .product-content .exp-date p span',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_five_date_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5.two .product-content .exp-date p span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_date_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card5.two .product-content .exp-date p span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_date_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card5.two .product-content .exp-date p span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //style_five_buttons

        $this->start_controls_section(
            'drivco_upcoming_car_style_five_button',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_five'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_five_button_typ',
                'selector' => '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2',
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_five_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2 svg path:first-child' => 'stroke: {{VALUE}};',
                    '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2 svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_five_button_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card5 .product-content .content-btm .view-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_five_button_margin',
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
            'drivco_upcoming_car_style_five_button_padding',
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



        //style_six_start

        //heading title


        //style_six_heading_title

        $this->start_controls_section(
            'drivco_upcoming_car_style_six_heading_title',
            [
                'label' => esc_html__('Heading Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_six'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_six_heading_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_six_heading_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_six_heading_title_margin',
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
            'drivco_upcoming_car_style_six_heading_title_padding',
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

        //style_six_heading_subtitle

        $this->start_controls_section(
            'drivco_upcoming_car_style_six_heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_six'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_six_heading_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_six_heading_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_six_heading_subtitle_margin',
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
            'drivco_upcoming_car_style_six_heading_subtitle_padding',
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

        //style_six_heading_city

        $this->start_controls_section(
            'drivco_upcoming_car_style_six_city',
            [
                'label' => esc_html__('City', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_six'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_six_city_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .location a',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_six_city_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_six_city_margin',
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
            'drivco_upcoming_car_style_six_city_padding',
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


        //style_six_heading_model

        $this->start_controls_section(
            'drivco_upcoming_car_style_six_model',
            [
                'label' => esc_html__('Car Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_six'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_six_model_typ',
                'selector' => '{{WRAPPER}}.product-card4 .product-content h6 a',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_six_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_six_model_margin',
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
            'drivco_upcoming_car_style_six_model_padding',
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

        //style_six_info_meta

        $this->start_controls_section(
            'drivco_upcoming_car_style_six_info_meta',
            [
                'label' => esc_html__('Information Meta', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_six'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_six_info_meta_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .features li',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_six_info_meta_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'drivco_upcoming_car_style_six_info_meta_margin',
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
            'drivco_upcoming_car_style_six_info_meta_padding',
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

        //style_six_btn

        $this->start_controls_section(
            'drivco_upcoming_car_style_six_btn',
            [
                'label' => esc_html__('Button', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_six'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_six_btn_typ',
                'selector' => '{{WRAPPER}} .primary-btn7',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_six_btn_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn7' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_six_btn_text_hover_color',
            [
                'label'     => esc_html__('Hover Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn7:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_six_btn_hover_bg_color',
            [
                'label'     => esc_html__('Hover BG Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn7::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'drivco_upcoming_car_style_six_btn_bg_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn7' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_upcoming_car_style_six_btn_margin',
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
            'drivco_upcoming_car_style_six_btn_padding',
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

        //style_six_price

        $this->start_controls_section(
            'drivco_upcoming_car_style_six_price',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_upcoming_vehicle_style_choose' => ['style_six'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_upcoming_car_style_six_price_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6',
            ]
        );



        $this->add_control(
            'drivco_upcoming_car_style_six_price_text_color',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_upcoming_car_style_six_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'drivco_upcoming_car_style_six_price_margin',
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
            'drivco_upcoming_car_style_six_price_padding',
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
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $data = $settings['drivco_upcoming_vehicle_upcoming_car_list'];
        $data_two = $settings['drivco_upcoming_vehicle_upcoming_car_style_two_list'];
        $data_three = $settings['drivco_upcoming_vehicle_upcoming_car_list_style_three'];
        $data_four = $settings['drivco_upcoming_vehicle_upcoming_car_list_style_four'];
        $data_five = $settings['drivco_upcoming_vehicle_upcoming_car_list_style_five'];
        $data_six = $settings['drivco_upcoming_vehicle_upcoming_car_list_style_six'];
        if (!empty($settings['heading_button_url_style_four']['url'])) {
            $this->add_link_attributes('heading_button_url_style_four', $settings['heading_button_url_style_four']);
        }


        $show_info_with_btn = $settings['driveco_show_info_btn'];
?>
        <?php if (is_admin()) : ?>
            <script>
                // Compare Car 
                var swiper = new Swiper(".upcoming-car-slider", {
                    slidesPerView: 3,
                    speed: 1500,
                    // spaceBetween: 25,
                    // autoplay: {
                    //     delay: 2500,
                    //     disableOnInteraction: false,
                    // },
                    navigation: {
                        nextEl: ".next-2",
                        prevEl: ".prev-2",
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
                            spaceBetween: 24,
                        },
                        1400: {
                            slidesPerView: 3
                        },
                    }
                });
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
                    }
                });
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
            </script>
        <?php endif; ?>

        <div class="modal signUp-modal fade" id="alartModal01" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <?php if (!empty($settings['drivco_upcoming_car_style_one_modal_box_title'])) :   ?>
                        <h4 class="modal-title" id="alartModal01Label"><?php echo esc_html($settings['drivco_upcoming_car_style_one_modal_box_title']) ?></h4>
                        <?php endif; ?>
                        <?php if (!empty($settings['drivco_upcoming_car_style_one_modal_box_subtitle'])) :   ?>
                        <p><?php echo esc_html($settings['drivco_upcoming_car_style_one_modal_box_subtitle']) ?></p>
                        <?php endif; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <?php echo do_shortcode($settings['drivco_upcoming_car_style_one_modal_box_shortcode']) ?>
                        <?php if (!empty($settings['drivco_upcoming_car_style_one_modal_box_bottom_notice'])) :   ?>
                        <div class="terms-conditon two">
                            <p><?php echo esc_html($settings['drivco_upcoming_car_style_one_modal_box_bottom_notice']) ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($settings['drivco_upcoming_vehicle_style_choose'] == 'style_one') : ?>
            <div class="upcoming-car-area">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="swiper upcoming-car-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($data as $item) : ?>
                                    <div class="swiper-slide">
                                        <div class="product-card style-2">
                                            <div class="product-img">
                                                <img src="<?php echo esc_attr($item['upcoming-car-image']['url']); ?>" alt="<?php echo esc_attr__('product-img', 'drivco-core') ?>">
                                                <?php
                                                $id = uniqid();
                                                // Assuming $settings['upcoming_car_gallery'] contains your image data
                                                if (!empty($item['upcoming_car_gallery']) && is_array($item['upcoming_car_gallery'])) : ?>
                                                    <div id="<?php echo $id ?>" class="hidden">
                                                        <?php
                                                        $i = 0;
                                                        foreach ($item['upcoming_car_gallery'] as $image) :
                                                        ?>
                                                            <a href="<?php echo esc_attr($image['url']); ?>"></a>
                                                        <?php
                                                            $i++;
                                                        endforeach;
                                                        ?>
                                                    </div>
                                                    <div class="number-of-img">
                                                        <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="product-content">
                                                <div class="content-top">
                                                    <div class="price-and-title">
                                                        <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_price'])) :   ?>
                                                            <h5 class="price"><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_price']) ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_title'])) :   ?>
                                                            <h5><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_title']) ?></h5>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="company-logo">
                                                        <img src="<?php echo esc_url($item['upcoming_company_logo']['url']) ?>" alt="<?php echo esc_attr('Logo image', 'drivco-core') ?>">
                                                    </div>
                                                </div>
                                                <div class="launch-date">
                                                    <p><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_launch']) ?> <span><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_launch_date']) ?></span></p>
                                                </div>
                                                <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_expected_btn_txt'])) :   ?>
                                                    <div class="launch-btn">
                                                        <button type="button" class="primary-btn1" data-bs-toggle="modal" data-bs-target="#alartModal01">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4311 12.759C15.417 11.4291 16 9.78265 16 8C16 3.58169 12.4182 0 8 0C3.58169 0 0 3.58169 0 8C0 12.4182 3.58169 16 8 16C10.3181 16 12.4058 15.0141 13.867 13.4387C14.0673 13.2226 14.2556 12.9957 14.4311 12.759ZM13.9875 12C14.7533 10.8559 15.1999 9.48009 15.1999 8C15.1999 4.02355 11.9764 0.799983 7.99991 0.799983C4.02355 0.799983 0.799983 4.02355 0.799983 8C0.799983 9.48017 1.24658 10.8559 2.01245 12C2.97866 10.5566 4.45301 9.48194 6.17961 9.03214C5.34594 8.45444 4.79998 7.49102 4.79998 6.39995C4.79998 4.63266 6.23271 3.19993 8 3.19993C9.76729 3.19993 11.2 4.63266 11.2 6.39995C11.2 7.49093 10.654 8.45444 9.82039 9.03206C11.5469 9.48194 13.0213 10.5565 13.9875 12ZM13.4722 12.6793C12.3495 10.8331 10.3188 9.59997 8.00008 9.59997C5.68126 9.59997 3.65049 10.8331 2.52776 12.6794C3.84829 14.2222 5.80992 15.2 8 15.2C10.1901 15.2 12.1517 14.2222 13.4722 12.6793ZM8 8.79998C9.32551 8.79998 10.4 7.72554 10.4 6.39995C10.4 5.07444 9.32559 3.99992 8 3.99992C6.6744 3.99992 5.59997 5.07452 5.59997 6.40003C5.59997 7.72554 6.67449 8.79998 8 8.79998Z"></path>
                                                            </svg><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_btn_txt']) ?>
                                                        </button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 divider">
                        <div class="slider-btn-group style-2 justify-content-md-between justify-content-center">
                            <div class="slider-btn prev-2 d-md-flex d-none">
                                <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                </svg>
                            </div>
                            <?php if ('yes'  == $show_info_with_btn) : ?>
                                <div class="view-btn-area">
                                    <p><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_info_text']) ?></p>
                                    <a class="view-btn" href="<?php echo $settings['info_button_url_upcoming']['url']; ?>"><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_btn_text']) ?></a>
                                </div>
                            <?php endif; ?>
                            <div class="slider-btn next-2 d-md-flex d-none">
                                <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['drivco_upcoming_vehicle_style_choose'] == 'style_two') : ?>


            <div class="recent-launched-car">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                        <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title'])) :   ?>
                            <h2><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title']) ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle'])) :   ?>
                            <p> <?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle']) ?></p>
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
                        <div class="swiper recent-launch-car-slider">
                            <div class="swiper-wrapper">

                                <?php foreach ($data_two as $item_two) : ?>

                                    <div class="swiper-slide">
                                        <div class="product-card2">
                                            <div class="product-img">
                                                <div class="date">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#alartModal01">
                                                        <?php echo esc_html($item_two['drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_two']) ?> <i class="bi bi-exclamation-circle"></i>
                                                    </button>
                                                </div>

                                                <img src="<?php echo esc_attr($item_two['upcoming-car-image_2']['url']); ?>" alt="<?php echo esc_attr('product-img', 'drivco-core') ?>">
                                            </div>
                                            <div class="product-content">
                                                <div class="details-btn">
                                                    <a data-bs-toggle="modal" data-bs-target="#alartModal01"><i class="bi bi-arrow-right-short"></i></a>
                                                </div>
                                                <?php if (!empty($item_two['drivco_upcoming_vehicle_upcoming_car_style_two_price'])) :   ?>
                                                <div class="price">
                                                    <strong><?php echo esc_html($item_two['drivco_upcoming_vehicle_upcoming_car_style_two_price']) ?></strong>
                                                </div>
                                                <?php endif; ?>
                                                <h6><a data-bs-toggle="modal" data-bs-target="#alartModal01"><?php echo esc_html($item_two['drivco_upcoming_vehicle_upcoming_car_style_two_model']) ?></a></h6>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php endif; ?>


        <?php if ($settings['drivco_upcoming_vehicle_style_choose'] == 'style_three') : ?>

            <div class="home3-recent-launched-section">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                        <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title'])) :   ?>
                            <h2><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title']) ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle'])) :   ?>
                            <p><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle']) ?></p>
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

                                <?php foreach ($data_three as $item) : ?>
                                    <div class="swiper-slide">
                                        <div class="product-card3 style-3">
                                            <div class="product-img">
                                                <img src="<?php echo esc_attr($item['upcoming-car-image3']['url']); ?>" alt="<?php echo esc_attr('product-img', 'drivco-core') ?>">
                                                <?php
                                                $id = uniqid();
                                                // Assuming $settings['upcoming_car_gallery'] contains your image data
                                                if (!empty($item['upcoming_car_gallery_style_three']) && is_array($item['upcoming_car_gallery_style_three'])) : ?>
                                                    <div id="<?php echo $id ?>" class="hidden">
                                                        <?php
                                                        $i = 0;
                                                        foreach ($item['upcoming_car_gallery_style_three'] as $image) :
                                                        ?>
                                                            <a href="<?php echo esc_attr($image['url']); ?>"></a>
                                                        <?php
                                                            $i++;
                                                        endforeach;
                                                        ?>
                                                    </div>
                                                    <div class="number-of-img">
                                                        <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="product-content">
                                                <h5><a data-bs-toggle="modal" data-bs-target="#alartModal01"><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_title_style_three']) ?></a></h5>
                                                <ul class="features">
                                                <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_mileage_style_three'])) :   ?>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/milage_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_mileage_style_three']) ?>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_fuel_type_style_three'])) :   ?>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/info_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_fuel_type_style_three']) ?>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_feature_style_three'])) :   ?>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/engine_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                                        <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_feature_style_three']) ?>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <?php if ($settings['drivco_upcoming_vehicle_style_choose'] == 'style_four') : ?>

            <div class="home4-upcomming-car-section">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                        <div class="section-title-2">
                        <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title'])) :   ?>
                            <h2><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title']) ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle'])) :   ?>
                            <p><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle']) ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_four_heading_button_text'])) :   ?>
                        <div class="explore-more-btn">
                            <a <?php echo $this->get_render_attribute_string('heading_button_url_style_four'); ?>><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_four_heading_button_text']) ?> <i class="bi bi-arrow-right"></i></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-40">
                        <div class="swiper home4-latest-car-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($data_four as $item) : ?>
                                    <div class="swiper-slide">
                                        <div class="product-card4 style-2">
                                            <div class="product-img">
                                                <img src="<?php echo esc_attr($item['upcoming-car-image4']['url']); ?>" alt="<?php echo esc_attr__('check-icon', 'drivco-core') ?>" features>
                                                <?php
                                                $id = uniqid();
                                                // Assuming $settings['upcoming_car_gallery'] contains your image data
                                                if (!empty($item['upcoming_car_gallery_style_four']) && is_array($item['upcoming_car_gallery_style_four'])) : ?>
                                                    <div id="<?php echo $id ?>" class="hidden">
                                                        <?php
                                                        $i = 0;
                                                        foreach ($item['upcoming_car_gallery_style_four'] as $image) :
                                                        ?>
                                                            <a href="<?php echo esc_attr($image['url']); ?>"></a>
                                                        <?php
                                                            $i++;
                                                        endforeach;
                                                        ?>
                                                    </div>
                                                    <div class="number-of-img">
                                                        <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="product-content">
                                                <h6><a data-bs-toggle="modal" data-bs-target="#alartModal01"><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_title_style_four']) ?></a></h6>
                                                <div class="exp-date">
                                                    <p><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_launch_text_style_four']) ?> <span><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_four']) ?></span></p>
                                                </div>
                                                <ul class="features">
                                                <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_mileage_style_four'])) :   ?>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home4/icon/miles.svg" alt="<?php echo esc_attr__('miles-icon', 'drivco-core') ?>">
                                                        <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_mileage_style_four']) ?>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_fuel_type_style_four'])) :   ?>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home4/icon/fuel.svg" alt="<?php echo esc_attr__('fuel-icon', 'drivco-core') ?>">
                                                        <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_fuel_type_style_four']) ?>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_feature_style_four'])) :   ?>
                                                    <li>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home4/icon/electric.svg" alt="<?php echo esc_attr__('electric-icon', 'drivco-core') ?>">
                                                        <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_feature_style_four']) ?>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                                <div class="button-and-price">
                                                    <button type="button" class="primary-btn3" data-bs-toggle="modal" data-bs-target="#alartModal01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14">
                                                            <path d="M10.9778 7.18763V5.87891C10.9778 3.96971 9.63702 2.35154 7.80001 1.82301V1.23047C7.80001 0.551988 7.21684 0 6.50002 0C5.7832 0 5.20003 0.551988 5.20003 1.23047V1.82301C3.36299 2.35154 2.02226 3.96968 2.02226 5.87891V7.18763C2.02226 8.86468 1.3469 10.4549 0.120605 11.6653C0.0618066 11.7234 0.0223205 11.7965 0.00705533 11.8755C-0.00820982 11.9546 0.00141928 12.0362 0.0347455 12.1102C0.0680718 12.1841 0.123625 12.2472 0.1945 12.2915C0.265375 12.3358 0.348445 12.3594 0.433383 12.3594H4.37696C4.57825 13.2943 5.4537 14 6.50002 14C7.54637 14 8.42176 13.2943 8.62308 12.3594H12.5667C12.6516 12.3594 12.7346 12.3358 12.8055 12.2914C12.8764 12.2471 12.9319 12.1841 12.9653 12.1101C12.9986 12.0362 13.0082 11.9546 12.9929 11.8755C12.9777 11.7965 12.9382 11.7234 12.8794 11.6653C11.6531 10.4549 10.9778 8.86465 10.9778 7.18763ZM6.06669 1.23047C6.06669 1.00431 6.26108 0.820312 6.50002 0.820312C6.73896 0.820312 6.93335 1.00431 6.93335 1.23047V1.66053C6.79073 1.64752 6.6462 1.64062 6.50002 1.64062C6.35384 1.64062 6.20931 1.64752 6.06669 1.66053V1.23047ZM6.50002 13.1797C5.9351 13.1797 5.45344 12.8368 5.27456 12.3594H7.72548C7.5466 12.8368 7.06494 13.1797 6.50002 13.1797ZM1.36736 11.5391C2.35422 10.2869 2.88893 8.77166 2.88893 7.18763V5.87891C2.88893 3.99424 4.50886 2.46094 6.50002 2.46094C8.49118 2.46094 10.1111 3.99424 10.1111 5.87891V7.18763C10.1111 8.77166 10.6458 10.2869 11.6327 11.5391H1.36736ZM12.1333 5.87891C12.1333 6.10542 12.3273 6.28906 12.5667 6.28906C12.806 6.28906 13 6.10542 13 5.87891C13 4.23555 12.3239 2.69054 11.0962 1.52852C10.927 1.36836 10.6526 1.36834 10.4834 1.52852C10.3141 1.6887 10.3141 1.94838 10.4834 2.10856C11.5474 3.11566 12.1333 4.45465 12.1333 5.87891ZM0.433383 6.28906C0.672698 6.28906 0.866714 6.10542 0.866714 5.87891C0.866714 4.45468 1.45269 3.11568 2.51667 2.10859C2.6859 1.94841 2.6859 1.68872 2.51667 1.52854C2.34746 1.36836 2.07308 1.36836 1.90385 1.52854C0.676164 2.69057 5.22303e-05 4.23555 5.22303e-05 5.87891C5.22303e-05 6.10542 0.194069 6.28906 0.433383 6.28906Z" />
                                                        </svg><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_btn_txt_style_four']) ?>
                                                    </button>
                                                    <div class="price-area">
                                                    <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_price_text_style_four'])) :   ?>
                                                        <span><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_price_text_style_four']) ?></span>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_price_style_four'])) :   ?>
                                                        <h6><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_price_style_four']) ?></h6>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="slider-btn-pagination">
                            <div class="slider-btn prev-11"><i class="bi bi-arrow-left"></i></div>
                            <!-- <div class="pagination pagination11"></div> -->
                            <div class="slider-btn next-11"><i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>


        <?php endif; ?>


        <?php if ($settings['drivco_upcoming_vehicle_style_choose'] == 'style_five') : ?>

            <div class="home5-upcomming-car-section">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                            <div class="section-title-2">
                            <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title']) ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle']) ?></p>
                                <?php endif; ?>
                            </div>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home5-fetured-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data_five as $item) : ?>
                                        <div class="swiper-slide">
                                            <div class="product-card5 two">
                                                <div class="product-img">
                                                <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_price_style_five'])) :   ?>
                                                    <div class="product-price">
                                                        <span><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_price_style_five']) ?></span>
                                                    </div>
                                                <?php endif; ?>
                                                    <img src="<?php echo esc_attr($item['upcoming-car-image5']['url']); ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>">
                                                    <?php
                                                    $id = uniqid();
                                                    // Assuming $settings['upcoming_car_gallery'] contains your image data
                                                    if (!empty($item['upcoming_car_gallery_style_five']) && is_array($item['upcoming_car_gallery_style_five'])) : ?>
                                                        <div id="<?php echo $id ?>" class="hidden">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($item['upcoming_car_gallery_style_five'] as $image) :
                                                            ?>
                                                                <a href="<?php echo esc_attr($image['url']); ?>"></a>
                                                            <?php
                                                                $i++;
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                        <div class="number-of-img">
                                                            <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>

                                                <div class="product-content">
                                                <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_title_style_five'])) :   ?>
                                                    <h6><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_title_style_five']) ?></h6>
                                                    <?php endif; ?>
                                                    <div class="exp-date">
                                                        <p><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_launch_text_style_five']) ?> <span><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_launch_date_style_five']) ?></span></p>
                                                    </div>
                                                    <div class="content-btm">
                                                        <a class="view-btn2" data-bs-toggle="modal" data-bs-target="#alartModal01">
                                                            <svg width="35" height="21" viewBox="0 0 35 21" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 20C5.47715 20 1 15.7467 1 10.5C1 5.25329 5.47715 1 11 1" stroke-linecap="round"></path>
                                                                <path d="M14.2597 3C14.1569 3 14.0583 3.04166 13.9856 3.11582C13.9129 3.18997 13.8721 3.29055 13.8721 3.39542C13.8721 3.50029 13.9129 3.60086 13.9856 3.67502C14.0583 3.74917 14.1569 3.79083 14.2597 3.79083H15.8104C15.9132 3.79083 16.0118 3.74917 16.0845 3.67502C16.1572 3.60086 16.198 3.50029 16.198 3.39542C16.198 3.29055 16.1572 3.18997 16.0845 3.11582C16.0118 3.04166 15.9132 3 15.8104 3H14.2597ZM16.7795 3C16.6767 3 16.5781 3.04166 16.5054 3.11582C16.4327 3.18997 16.3919 3.29055 16.3919 3.39542C16.3919 3.50029 16.4327 3.60086 16.5054 3.67502C16.5781 3.74917 16.6767 3.79083 16.7795 3.79083H21.3346C21.4374 3.79083 21.536 3.74917 21.6087 3.67502C21.6814 3.60086 21.7222 3.50029 21.7222 3.39542C21.7222 3.29055 21.6814 3.18997 21.6087 3.11582C21.536 3.04166 21.4374 3 21.3346 3H16.7795Z">
                                                                </path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2292 5.76953C15.1264 5.76953 15.0278 5.81119 14.9551 5.88535C14.8824 5.9595 14.8415 6.06008 14.8415 6.16495C14.8415 6.26982 14.8824 6.3704 14.9551 6.44455C15.0278 6.51871 15.1264 6.56037 15.2292 6.56037H24.1454C25.653 6.56037 26.5822 6.79999 27.3256 7.18493C27.9575 7.51194 28.4672 7.9467 29.1055 8.49119C29.2375 8.60368 29.3749 8.72073 29.5201 8.84271L29.6101 8.91824L29.726 8.93069C33.2653 9.31069 34.0622 10.5309 34.2246 11.1557V12.6893C34.2246 12.7942 34.1838 12.8948 34.1111 12.9689C34.0384 13.0431 33.9398 13.0847 33.8369 13.0847H32.8356C32.6511 11.9627 31.6943 11.1077 30.5418 11.1077C29.3893 11.1077 28.4325 11.9627 28.248 13.0847H21.2058C21.0212 11.9627 20.0645 11.1077 18.912 11.1077C17.7594 11.1077 16.8027 11.9627 16.6182 13.0847H14.7446C14.6418 13.0847 14.5432 13.1264 14.4705 13.2006C14.3978 13.2747 14.3569 13.3753 14.3569 13.4802C14.3569 13.585 14.3978 13.6856 14.4705 13.7598C14.5432 13.8339 14.6418 13.8756 14.7446 13.8756H16.6182C16.8027 14.9976 17.7594 15.8527 18.912 15.8527C20.0645 15.8527 21.0212 14.9976 21.2058 13.8756H28.248C28.4325 14.9976 29.3893 15.8527 30.5418 15.8527C31.6943 15.8527 32.6511 14.9976 32.8356 13.8756H33.8369C34.1454 13.8756 34.4412 13.7506 34.6593 13.5281C34.8774 13.3057 34.9999 13.0039 34.9999 12.6893V11.0626L34.99 11.0187C34.7431 9.92754 33.5791 8.57502 29.9239 8.15706C29.8217 8.07086 29.7215 7.98505 29.6227 7.90063C28.9828 7.35397 28.3942 6.851 27.6766 6.4795C26.7966 6.02418 25.7391 5.76953 24.1454 5.76953H15.2292ZM28.9912 13.4802C28.9912 13.0607 29.1545 12.6584 29.4453 12.3618C29.7361 12.0651 30.1306 11.8985 30.5418 11.8985C30.9531 11.8985 31.3475 12.0651 31.6383 12.3618C31.9291 12.6584 32.0925 13.0607 32.0925 13.4802C32.0925 13.8996 31.9291 14.302 31.6383 14.5986C31.3475 14.8952 30.9531 15.0618 30.5418 15.0618C30.1306 15.0618 29.7361 14.8952 29.4453 14.5986C29.1545 14.302 28.9912 13.8996 28.9912 13.4802ZM18.912 11.8985C18.5007 11.8985 18.1063 12.0651 17.8155 12.3618C17.5247 12.6584 17.3613 13.0607 17.3613 13.4802C17.3613 13.8996 17.5247 14.302 17.8155 14.5986C18.1063 14.8952 18.5007 15.0618 18.912 15.0618C19.3232 15.0618 19.7176 14.8952 20.0084 14.5986C20.2992 14.302 20.4626 13.8996 20.4626 13.4802C20.4626 13.0607 20.2992 12.6584 20.0084 12.3618C19.7176 12.0651 19.3232 11.8985 18.912 11.8985Z">
                                                                </path>
                                                                <path d="M11 8.14151C11 8.03664 11.0408 7.93606 11.1135 7.86191C11.1862 7.78775 11.2848 7.74609 11.3877 7.74609H15.7489C15.8517 7.74609 15.9503 7.78775 16.023 7.86191C16.0957 7.93606 16.1365 8.03664 16.1365 8.14151C16.1365 8.24638 16.0957 8.34696 16.023 8.42111C15.9503 8.49527 15.8517 8.53693 15.7489 8.53693H11.3877C11.2848 8.53693 11.1862 8.49527 11.1135 8.42111C11.0408 8.34696 11 8.24638 11 8.14151ZM26.6836 8.65278C26.7563 8.72694 26.7971 8.82749 26.7971 8.93234C26.7971 9.03719 26.7563 9.13775 26.6836 9.2119L26.6532 9.24294C26.2897 9.61367 25.7968 9.82197 25.2828 9.82203H19.1409C19.0381 9.82203 18.9395 9.78037 18.8668 9.70622C18.7941 9.63206 18.7532 9.53149 18.7532 9.42662C18.7532 9.32174 18.7941 9.22117 18.8668 9.14701C18.9395 9.07286 19.0381 9.0312 19.1409 9.0312H25.2826C25.4354 9.03122 25.5866 9.00055 25.7277 8.94095C25.8688 8.88134 25.997 8.79397 26.105 8.68382L26.1355 8.65278C26.2082 8.57866 26.3068 8.53701 26.4096 8.53701C26.5123 8.53701 26.6109 8.57866 26.6836 8.65278ZM19.5286 17.7304C19.5286 17.6255 19.5694 17.5249 19.6421 17.4508C19.7148 17.3766 19.8134 17.335 19.9162 17.335H21.5638C21.6666 17.335 21.7652 17.3766 21.8379 17.4508C21.9106 17.5249 21.9514 17.6255 21.9514 17.7304C21.9514 17.8352 21.9106 17.9358 21.8379 18.01C21.7652 18.0841 21.6666 18.1258 21.5638 18.1258H19.9162C19.8134 18.1258 19.7148 18.0841 19.6421 18.01C19.5694 17.9358 19.5286 17.8352 19.5286 17.7304ZM22.2422 17.7304C22.2422 17.6255 22.283 17.5249 22.3557 17.4508C22.4284 17.3766 22.527 17.335 22.6299 17.335H26.991C27.0939 17.335 27.1925 17.3766 27.2652 17.4508C27.3379 17.5249 27.3787 17.6255 27.3787 17.7304C27.3787 17.8352 27.3379 17.9358 27.2652 18.01C27.1925 18.0841 27.0939 18.1258 26.991 18.1258H22.6299C22.527 18.1258 22.4284 18.0841 22.3557 18.01C22.283 17.9358 22.2422 17.8352 22.2422 17.7304Z">
                                                                </path>
                                                            </svg>
                                                            <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_btn_txt_style_five']) ?>
                                                        </a>
                                                    </div>
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


        <?php if ($settings['drivco_upcoming_vehicle_style_choose'] == 'style_six') : ?>
            <div class="home6-upcoming-car-section">
                <div class="container">
                    <div class="row mb-60">
                        <div class="col-lg-12 d-flex align-items-end justify-content-between flex-wrap gap-4">
                            <div class="section-title-2">
                            <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_title']) ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_upcoming_vehicle_upcoming_car_style_two_heading_subtitle']) ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="slider-btn-group2 style-6">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home6-top-use-car-slider">
                                <div class="swiper-wrapper">

                                    <?php foreach ($data_six as $item) : ?>
                                        <div class="swiper-slide">
                                            <div class="product-card4 style-3">
                                                <div class="product-img">
                                                    <img src="<?php echo esc_attr($item['upcoming-car-image6']['url']); ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>">
                                                    <?php
                                                    $id = uniqid();
                                                    // Assuming $settings['upcoming_car_gallery'] contains your image data
                                                    if (!empty($item['upcoming_car_gallery_style_six']) && is_array($item['upcoming_car_gallery_style_six'])) : ?>
                                                        <div id="<?php echo $id ?>" class="hidden">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($item['upcoming_car_gallery_style_six'] as $image) :
                                                            ?>
                                                                <a href="<?php echo esc_attr($image['url']); ?>"></a>
                                                            <?php
                                                                $i++;
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                        <div class="number-of-img">
                                                            <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="product-content">
                                                <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_location_text_style_six'])) :   ?>
                                                    <div class="location">
                                                        <i class="bi bi-geo-alt"></i> <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_location_text_style_six']) ?></a>
                                                    </div>
                                                    <?php endif; ?>
                                                    <h6><a data-bs-toggle="modal" data-bs-target="#alartModal01"><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_title_style_six']) ?></a></h6>
                                                    <ul class="features">
                                                    <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_mileage_style_six'])) :   ?>
                                                        <li>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home4/icon/miles.svg" alt="<?php echo esc_attr__('miles-icon', 'drivco-core') ?>">
                                                            <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_mileage_style_six']) ?>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_fuel_type_style_six'])) :   ?>
                                                        <li>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home4/icon/fuel.svg" alt="<?php echo esc_attr__('fuel-icon', 'drivco-core') ?>">
                                                            <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_fuel_type_style_six']) ?>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_feature_style_six'])) :   ?>
                                                        <li>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home4/icon/electric.svg" alt="<?php echo esc_attr__('electric-icon', 'drivco-core') ?>">
                                                            <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_feature_style_six']) ?>
                                                        </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                    <div class="button-and-price">
                                                        <a class="primary-btn7" data-bs-toggle="modal" data-bs-target="#alartModal01">
                                                            <?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_expected_btn_txt_style_six']) ?>
                                                        </a>
                                                        <div class="price-area">
                                                        <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_price_text_style_six'])) :   ?>
                                                            <span><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_price_text_style_six']) ?></span>
                                                            <?php endif; ?>
                                                            <?php if (!empty($item['drivco_upcoming_vehicle_upcoming_car_price_style_six'])) :   ?>
                                                            <h6><?php echo esc_html($item['drivco_upcoming_vehicle_upcoming_car_price_style_six']) ?></h6>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
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

Plugin::instance()->widgets_manager->register(new Drivco_Upcoming_Vehicle_Widget());
