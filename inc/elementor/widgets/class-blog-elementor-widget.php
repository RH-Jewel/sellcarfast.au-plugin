<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core;
use Egns_Core\Egns_Helper;
use Elementor\core\Schemes;
use Elementor\Data\Base\Processor\After;

class Drivco_Blog_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_blog';
    }

    public function get_title()
    {
        return esc_html__('EG Blog', 'drivco-core');
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

        $this->start_controls_section(
            'drivco_blog_content_section',
            [
                'label' => esc_html__('General', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_blog_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'drivco-core'),
                    'style_two' => esc_html__('Style Two', 'drivco-core'),
                    'style_three' => esc_html__('Style Three', 'drivco-core'),
                    'style_four' => esc_html__('Style Four', 'drivco-core'),

                ],
                'default' => 'style_one',
            ]
        );
        $this->end_controls_section();

        //Heading One
        $this->start_controls_section(
            'drivco_blog_heading',
            [
                'label' => esc_html__('Headings', 'drivco-core'),
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_one',
                ]
            ]
        );

        $this->add_control(
            'drivco_blog_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('News & Article', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_blog_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('The Latest News Car & Bids', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        //Heading Two
        $this->start_controls_section(
            'drivco_blog_heading_two',
            [
                'label' => esc_html__('Headings', 'drivco-core'),
                'condition' => [
                    'drivco_blog_content_style_selection' => ['style_two', 'style_three', 'style_four']
                ]
            ]
        );

        $this->add_control(
            'drivco_blog_two_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('The Latest News Car & Bids', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_blog_two_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Here are some of the featured cars in different categories', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        //Blog section
        $this->start_controls_section(
            'drivco_blog_general_section',
            [
                'label' => esc_html__('Blog', 'drivco-core')
            ]
        );


        $this->add_control(
            'drivco_blog_social_section',
            [
                'label' => esc_html__('Show Social Icon?', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'drivco_blog_content_style_selection' => ['style_three', 'style_four']
                ]
            ]
        );


        $this->add_control(
            'drivco_blog',
            [
                'label'             => esc_html__('Select Categories', 'drivco-core'),
                'type'              => \Elementor\Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => Egns_Core\Egns_Helper::get_post_list_by_post_type('news'),
                'default'           => Egns_Core\Egns_Helper::get_all_post_key('news'),
            ]
        );



        $this->add_control(
            'drivco_blog_order',
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
            'drivco_blog_order_by',
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
            'drivco_blog_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'drivco-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3,
                'label_block' => false,
            ]
        );


        $this->end_controls_section();


        ////////////////////////Style One////////////////////////////////////////

        //Sub Title
        $this->start_controls_section(
            'drivco_blog_subtitle_sec',
            [
                'label' => esc_html__('Headings', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Subtitle Typography', 'drivco-core'),
                'name'     => 'drivco_blog_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title1 span',

            ]
        );
        $this->add_control(
            'drivco_blog_subtitle_color',
            [
                'label'     => esc_html__('Subtitle Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'drivco-core'),
                'name'     => 'drivco_blog_title_typ',
                'selector' => '{{WRAPPER}} .section-title1 h2',

            ]
        );

        $this->add_control(
            'drivco_blog_title_color',
            [
                'label'     => esc_html__('Title Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //Content

        $this->start_controls_section(
            'drivco_blog_style_content_sec',
            [
                'label' => esc_html__('Blog', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'drivco-core'),
                'name' => 'drivco_blog_style_content_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content > h6 a',
            ]
        );
        $this->add_control(
            'drivco_blog_style_content_color',
            [
                'label' => esc_html__('Title Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content > h6 a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_style_content_hover_color',
            [
                'label' => esc_html__('Title Text Hover Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content > h6 a:hover' => 'color: {{VALUE}}',

                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Author Typography', 'drivco-core'),
                'name' => 'drivco_blog_style_author_name_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content h6',
            ]
        );
        $this->add_control(
            'drivco_blog_style_author_name_content_color',
            [
                'label' => esc_html__('Author Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Date Typography', 'drivco-core'),
                'name' => 'drivco_blog_style_date_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a',
            ]
        );

        $this->add_control(
            'drivco_blog_style_date_color',
            [
                'label' => esc_html__('Date Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_style_date_hover_color',
            [
                'label' => esc_html__('Date Hover Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


        ////////////////////////Style Two////////////////////////////////////////

        //Sub Title
        $this->start_controls_section(
            'drivco_blog_two_subtitle_sec',
            [
                'label' => esc_html__('Headings', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_two'
                ]

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'drivco-core'),
                'name'     => 'drivco_blog_two_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_blog_two_subtitle_color',
            [
                'label'     => esc_html__('Title Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Subtitle Typography', 'drivco-core'),
                'name'     => 'drivco_blog_two_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_blog_two_title_color',
            [
                'label'     => esc_html__('Subtitle Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Content

        $this->start_controls_section(
            'drivco_blog_two_style_content_sec',
            [
                'label' => esc_html__('Blog', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'drivco-core'),
                'name' => 'drivco_blog_two_style_content_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content > h6 a',
            ]
        );
        $this->add_control(
            'drivco_blog_two_style_content_color',
            [
                'label' => esc_html__('Title Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content > h6 a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_two_style_content_hover_color',
            [
                'label' => esc_html__('Title Text Hover Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content > h6 a:hover' => 'color: {{VALUE}}',

                ],
            ]
        );


        //Category

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Category Typography', 'drivco-core'),
                'name' => 'drivco_blog_two_style_category_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .news-img .date a',
            ]
        );

        $this->add_control(
            'drivco_blog_two_style_category_color',
            [
                'label' => esc_html__('Category Text Color', 'drivco-core'),
                'separator' => 'after',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .news-img .date a' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Author Name

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Author Typography', 'drivco-core'),
                'name' => 'drivco_blog_two_style_author_name_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content h6',
            ]
        );
        $this->add_control(
            'drivco_blog_two_style_author_name_content_color',
            [
                'label' => esc_html__('Author Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Date

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Date Typhography', 'drivco-core'),
                'name' => 'drivco_blog_two_style_date_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a',
            ]
        );

        $this->add_control(
            'drivco_blog_two_style_date_color',
            [
                'label' => esc_html__('Date Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_two_style_date_hover_color',
            [
                'label' => esc_html__('Date Hover Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();





        ////////////////////////Style Three////////////////////////////////////////

        //Title
        $this->start_controls_section(
            'drivco_blog_four_subtitle_sec',
            [
                'label' => esc_html__('Headings', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_three'
                ]

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'drivco-core'),
                'name'     => 'drivco_blog_four_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_blog_four_subtitle_color',
            [
                'label'     => esc_html__('Title Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );



        // Sub Title

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Subtitle Typography', 'drivco-core'),
                'name'     => 'drivco_blog_four_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_blog_four_title_color',
            [
                'label'     => esc_html__('Subtitle Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Content

        $this->start_controls_section(
            'drivco_blog_four_style_content_sec',
            [
                'label' => esc_html__('Blog', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'drivco-core'),
                'name' => 'drivco_blog_four_style_content_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content > h6 a',
            ]
        );


        $this->add_control(
            'drivco_blog_four_style_content_color',
            [
                'label' => esc_html__('Title Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content > h6 a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_four_style_content_hover_color',
            [
                'label' => esc_html__('Title Text Hover Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content > h6 a:hover' => 'color: {{VALUE}}',

                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Category Typography', 'drivco-core'),
                'name' => 'drivco_blog_three_style_content_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card.style-2 .date a',
            ]
        );

        $this->add_control(
            'drivco_blog_three_style_category_color',
            [
                'label' => esc_html__('Category Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card.style-2 .date a' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label'      => __('Author Typography', 'drivco-core'),
                'name' => 'drivco_blog_three_style_author_name_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content h6',
            ]
        );
        $this->add_control(
            'drivco_blog_three_style_author_name_content_color',
            [
                'label' => esc_html__('Author Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Date Typography', 'drivco-core'),
                'name' => 'drivco_blog_three_style_date_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a',
            ]
        );

        $this->add_control(
            'drivco_blog_three_style_date_color',
            [
                'label' => esc_html__('Date Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_three_style_date_hover_color',
            [
                'label' => esc_html__('Date Hover Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        ////////////////////////Style Four////////////////////////////////////////

        // Title
        $this->start_controls_section(
            'drivco_blog_five_subtitle_sec',
            [
                'label' => esc_html__('Headings', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_four'
                ]

            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'drivco-core'),
                'name'     => 'drivco_blog_five_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_blog_five_subtitle_color',
            [
                'label'     => esc_html__('Title Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Subtite Typography', 'drivco-core'),
                'name'     => 'drivco_blog_five_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_blog_five_title_color',
            [
                'label'     => esc_html__('Subtitle Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Blog

        $this->start_controls_section(
            'drivco_blog_five_style_content_sec',
            [
                'label' => esc_html__('Blog', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_blog_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'drivco-core'),
                'name' => 'drivco_blog_five_style_content_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content > h6 a',
            ]
        );
        $this->add_control(
            'drivco_blog_five_style_content_color',
            [
                'label' => esc_html__('Title Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content > h6 a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_five_style_content_hover_color',
            [
                'label' => esc_html__('Title Text Hover Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content > h6 a:hover' => 'color: {{VALUE}}',

                ],
            ]
        );

        //Category

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Category Typography', 'drivco-core'),
                'name' => 'drivco_blog_five_style_category_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card.style-2 .date  a',
            ]
        );

        $this->add_control(
            'drivco_blog_five_style_category_color',
            [
                'label' => esc_html__('Category Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card.style-2 .date a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_five_style_category_bac_color',
            [
                'label' => esc_html__('Category Background Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card.style-2 .date ' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //Author Name

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Author Typography', 'drivco-core'),
                'name' => 'drivco_blog_four_style_author_name_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content h6',
            ]
        );

        $this->add_control(
            'drivco_blog_four_style_author_name_content_color',
            [
                'label' => esc_html__('Author Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Date

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Date Typography', 'drivco-core'),
                'name' => 'drivco_blog_four_style_date_type_typography',
                'selector' => '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a',
            ]
        );

        $this->add_control(
            'drivco_blog_four_style_date_color',
            [
                'label' => esc_html__('Date Text Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'drivco_blog_four_style_date_hover_color',
            [
                'label' => esc_html__('Date Hover Color', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-section .news-card .content .news-btm .author-area .author-content a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();


        $query = new \WP_Query(
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => $settings['drivco_blog_posts_per_page'],
                'orderby'        => $settings['drivco_blog_order_by'],
                'order'          => $settings['drivco_blog_order'],
                'post__in'       => $settings['drivco_blog'],
                'offset'         => 0,
                'post_status'    => 'publish',
            )
        );


?>
        <?php if ($settings["drivco_blog_content_style_selection"] == "style_one") : ?>
            <div class="news-section ">
                <div class="row mb-60">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between flex-wrap gap-4">
                        <div class="section-title1">
                            <?php if (!empty($settings['drivco_blog_subtitle'])) : ?>
                                <span> <?php echo $settings['drivco_blog_subtitle']; ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_blog_title'])) : ?>
                                <h2><?php echo $settings['drivco_blog_title']; ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="news-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="news-img">
                                        <?php the_post_thumbnail('egns-thumb-cart'); ?>
                                        <div class="date">
                                            <?php $categories = get_the_category(); ?>
                                            <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"> <?php echo esc_html($categories[0]->name) ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="content">

                                    <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                    </h6>
                                    <div class="news-btm">
                                        <div class="author-area">
                                            <div class="author-img">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                            </div>
                                            <div class="author-content">
                                                <h6><?php echo sprintf(__('%s', 'drivco-core'), get_the_author_meta("display_name")); ?></h6>
                                                <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"> <?php echo esc_html('Posted On-') ?><?php echo get_the_date("F j, Y"); ?></a>
                                            </div>
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
        <?php endif; ?>


        <?php if ($settings["drivco_blog_content_style_selection"] == "style_two") : ?>
            <div class="news-section">
                <div class="row mb-60">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between flex-wrap gap-4">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_blog_two_title'])) : ?>
                                <h2> <?php echo $settings['drivco_blog_two_title']; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_blog_two_subtitle'])) : ?>
                                <p><?php echo $settings['drivco_blog_two_subtitle']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="news-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="news-img">
                                        <?php the_post_thumbnail('egns-thumb-cart'); ?>
                                        <div class="date">
                                            <?php $categories = get_the_category(); ?>
                                            <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"> <?php echo esc_html($categories[0]->name) ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="content">

                                    <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                    </h6>

                                    <div class="news-btm">
                                        <div class="author-area">
                                            <div class="author-img">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                            </div>
                                            <div class="author-content">
                                                <h6><?php echo sprintf(__('%s', 'drivco-core'), get_the_author_meta("display_name")); ?></h6>
                                                <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo esc_html('Posted On-') ?> <?php echo get_the_date("F j, Y"); ?></a>
                                            </div>
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
        <?php endif; ?>


        <?php if ($settings["drivco_blog_content_style_selection"] == "style_three") : ?>
            <div class="news-section two ">
                <div class="row mb-50">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between flex-wrap gap-4">
                        <div class="section-title-2">
                            <?php if (!empty($settings['drivco_blog_two_title'])) : ?>
                                <h2> <?php echo $settings['drivco_blog_two_title']; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_blog_two_subtitle'])) : ?>
                                <p><?php echo $settings['drivco_blog_two_subtitle']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="news-card style-2">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="news-img">
                                        <?php the_post_thumbnail('egns-thumb-cart'); ?>
                                        <div class="date">
                                            <?php $categories = get_the_category(); ?>
                                            <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"> <?php echo esc_html($categories[0]->name) ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="content">

                                    <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                    </h6>

                                    <div class="news-btm d-flex align-items-center justify-content-between">
                                        <div class="author-area">
                                            <div class="author-img">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                            </div>
                                            <div class="author-content">
                                                <h6><?php echo sprintf(__('%s', 'drivco-core'), get_the_author_meta("display_name")); ?></h6>
                                                <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo esc_html('Posted On-') ?> <?php echo get_the_date("F j, Y"); ?></a>
                                            </div>
                                        </div>
                                        <?php if ('yes' === $settings['drivco_blog_social_section']) { ?>
                                            <div class="social-area">
                                                <ul class="social-icons">
                                                    <li><a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_permalink()); ?>"><i class="bx bxl-facebook"></i></a></li>
                                                    <li><a href="<?php echo esc_url('http://www.twitter.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-twitter"></i></a></li>
                                                    <li><a href="<?php echo esc_url('http://www.pinterest.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-pinterest"></i></a></li>
                                                    <li><a href="<?php echo esc_url('http://www.instagram.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-instagram"></i></a></li>
                                                </ul>
                                                <div class="share-icon">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/share.svg' ?>" alt="<?php echo esc_attr__('check-icon', 'drivco-core') ?>" />
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings["drivco_blog_content_style_selection"] == "style_four") : ?>
            <div class="news-section five six ">
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-end justify-content-between flex-wrap gap-4">
                        <div class="section-title-2">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_blog_two_title'])) : ?>
                                    <h2> <?php echo $settings['drivco_blog_two_title']; ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['drivco_blog_two_subtitle'])) : ?>
                                    <p><?php echo $settings['drivco_blog_two_subtitle']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 justify-content-center">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                        ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="news-card style-2 dark">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="news-img">
                                            <?php the_post_thumbnail('egns-thumb-cart'); ?>
                                            <div class="date">
                                                <?php $categories = get_the_category(); ?>
                                                <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>"> <?php echo esc_html($categories[0]->name) ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
                                        <div class="news-btm d-flex align-items-center justify-content-between">
                                            <div class="author-area">
                                                <div class="author-img">
                                                    <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                                </div>
                                                <div class="author-content">
                                                    <h6><?php echo sprintf(__('%s', 'drivco-core'), get_the_author_meta("display_name")); ?></h6>
                                                    <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo esc_html('Posted On-') ?> <?php echo get_the_date("F j, Y"); ?></a>
                                                </div>
                                            </div>
                                            <?php if ('yes' === $settings['drivco_blog_social_section']) { ?>
                                                <div class="social-area">
                                                    <ul class="social-icons">
                                                        <li><a href="<?php echo esc_url('http://www.facebook.com/sharer/sharer.php?u=' . get_permalink()); ?>"><i class="bx bxl-facebook"></i></a></li>
                                                        <li><a href="<?php echo esc_url('http://www.twitter.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-twitter"></i></a></li>
                                                        <li><a href="<?php echo esc_url('http://www.pinterest.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-pinterest"></i></a></li>
                                                        <li><a href="<?php echo esc_url('http://www.instagram.com/share?url=' . get_permalink()); ?>"><i class="bx bxl-instagram"></i></a></li>
                                                    </ul>
                                                    <div class="share-icon">
                                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/share-two.svg' ?>" alt="<?php echo esc_attr__('check-icon', 'drivco-core') ?>" />
                                                    </div>
                                                </div>
                                            <?php } ?>
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
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Blog_Widget());
