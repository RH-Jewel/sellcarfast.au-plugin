<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class drivco_Hero_Banner_Six_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_hero_banner_six';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Six', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================Content=======================//

        $this->start_controls_section(
            'drivco_hero_banner_six_section',
            [
                'label' => esc_html__('General', 'drivco-core')

            ]
        );
        $this->add_control(
            'drivco_hero_banner_six_subtitle',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Elite Car Dealer', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub-title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Premier Auto Sales', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Car dealerships may sell new cars from one or several manufacturers', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_total_car_counter',
            [
                'label' => esc_html__('Total Car Counter', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('4,56,730+', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_hero_banner_six_total_car_content_text',
            [
                'label' => esc_html__('Total Car Counter Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Total Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //Button Section

        $this->start_controls_section(
            'drivco_hero_banner_six_button_section',
            [
                'label' => esc_html__('Button', 'drivco-core')

            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_button_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Find Your Car', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_button_icon',
            [
                'label' => esc_html__('Button Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-car',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_button_url',
            [
                'label' => esc_html__('Button URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );
        $this->end_controls_section();

        //Review Section

        $this->start_controls_section(
            'drivco_hero_banner_six_review_style',
            [
                'label' => esc_html__('Review section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_review_rating_text',
            [
                'label' => esc_html__('Rating Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trust Ratings', 'drivco-core'),
                'placeholder' => esc_html__('Type your text here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'drivco_hero_banner_six_review',
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
            'drivco_hero_banner_six_review_star',
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
            'drivco_hero_banner_six_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Based On 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_review_count_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_review_logo',
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

        //Banner Image Group
        $this->start_controls_section(
            'drivco_hero_banner_six_banner_image_group',
            [
                'label' => esc_html__('Banner Image Group', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_banner_top_left_card_icon',
            [
                'label' => esc_html__('Choose Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_banner_top_left_card_content',
            [
                'label' => esc_html__('Total Car Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__(' Total Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your total car title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_banner_top_right_image',
            [
                'label' => esc_html__('Top Right Image ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_hero_banner_six_banner_bottom_left_image',
            [
                'label' => esc_html__('Bottom Left Image ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'drivco_hero_banner_six_banner_bottom_right_image',
            [
                'label' => esc_html__('Bottom Right Image ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        // =====================Style Start=======================//

        //Sub Title
        $this->start_controls_section(
            'drivco_hero_banner_six_subtitle_sec',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_six_subtitle_typ',
                'selector' => '{{WRAPPER}} .home6-banner-area .banner-content > span',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_six_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_six_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_six_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-banner-area .banner-content > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Title
        $this->start_controls_section(
            'drivco_hero_banner_six_title_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_six_title_typ',
                'selector' => '{{WRAPPER}} .home6-banner-area .banner-content h1',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_six_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_six_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_six_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-banner-area .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Content
        $this->start_controls_section(
            'drivco_hero_banner_six_content_sec',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_six_content_typ',
                'selector' => '{{WRAPPER}} .home6-banner-area .banner-content p',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_six_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_six_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_six_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-banner-area .banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Button
        $this->start_controls_section(
            'drivco_hero_banner_button_six_style',
            [
                'label' => esc_html__('Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'drivco_hero_banner_button_six_tabs'
        );

        $this->start_controls_tab(
            'drivco_hero_banner_button_six_normal_tab',
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
                'name'     => 'drivco_hero_banner_button_six_typ',
                'selector' => '{{WRAPPER}} .home6-banner-area .banner-content .banner-content-bottom .primary-btn7',

            ]
        );
        $this->add_control(
            'drivco_hero_banner_button_six_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content .banner-content-bottom .primary-btn7' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_hero_banner_button_six_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'drivco-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content .banner-content-bottom .primary-btn7' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_hero_banner_button_six_padding',
            [
                'label'      => __(
                    'Padding',
                    'drivco-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-banner-area .banner-content .banner-content-bottom .primary-btn7' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_hero_banner_button_six_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_hero_banner_button_six_background_color_hover',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content .banner-content-bottom .primary-btn7::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_hero_banner_button_six_color_hover',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-content .banner-content-bottom .primary-btn7:hover' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Total car Title
        $this->start_controls_section(
            'drivco_hero_banner_six_total_car_title_sec',
            [
                'label' => esc_html__('Total Car Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_six_total_car_title_typ',
                'selector' => '{{WRAPPER}} .home6-banner-area .banner-img-group .top-img-group .top-left-card span',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_six_total_car_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-img-group .top-img-group .top-left-card span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_six_total_car_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-area .banner-img-group .top-img-group .top-left-card span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_six_total_car_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-banner-area .banner-img-group .top-img-group .top-left-card span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();



?>

        <div class="home6-banner-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 d-flex align-items-center">
                        <div class="banner-content">
                            <?php if (!empty($settings['drivco_hero_banner_six_subtitle'])) :   ?>
                                <span><?php echo esc_html($settings['drivco_hero_banner_six_subtitle']) ?></span>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_hero_banner_six_title'])) :   ?>
                                <h1><?php echo esc_html($settings['drivco_hero_banner_six_title']) ?></h1>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_hero_banner_six_content'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_hero_banner_six_content']) ?></p>
                            <?php endif ?>
                            <div class="banner-content-bottom">
                                <?php if (!empty($settings['drivco_hero_banner_six_button_text'])) :   ?>
                                    <a href="<?php echo esc_url($settings['drivco_hero_banner_six_button_url']['url']) ?>" class="primary-btn7">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['drivco_hero_banner_six_button_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php echo esc_html($settings['drivco_hero_banner_six_button_text']) ?>
                                    </a>
                                <?php endif ?>
                                <div class="rating">
                                    <a href="<?php echo esc_url($settings['drivco_hero_banner_six_review_count_url']['url']) ?>">
                                        <div class="review-top">
                                            <div class="logo">
                                                <?php if (!empty($settings['drivco_hero_banner_six_review_logo']['url'])) :   ?>
                                                    <img src="<?php echo esc_url($settings['drivco_hero_banner_six_review_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo', 'drivco-core') ?>">
                                                <?php endif ?>
                                            </div>
                                            <div class="star">
                                                <?php if ('general' == $settings['drivco_hero_banner_six_review']) { ?>
                                                    <ul>
                                                        <?php $rank_counter = intval($settings['drivco_hero_banner_six_review_star']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php } ?>

                                                <?php if ('trustpilot' == $settings['drivco_hero_banner_six_review']) { ?>
                                                    <ul class="trustpilot">
                                                        <?php $rank_counter = intval($settings['drivco_hero_banner_six_review_star']);
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
                                                <li><?php echo esc_html($settings['drivco_hero_banner_six_review_rating_text']) ?> <span><?php echo sprintf("%2d.0", $rank_counter) ?></span> </li>
                                                <?php if (!empty($settings['drivco_hero_banner_six_review_count'])) :   ?>
                                                    <li><?php echo wp_kses($settings['drivco_hero_banner_six_review_count'], wp_kses_allowed_html('post'))  ?></li>
                                                <?php endif ?>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex justify-content-lg-end">
                        <div class="banner-img-group">
                            <div class="top-img-group">
                                <div class="top-left-card">
                                    <div class="icon">
                                        <?php if (!empty($settings['drivco_hero_banner_six_banner_top_left_card_icon']['url'])) :   ?>
                                            <img src="<?php echo esc_url($settings['drivco_hero_banner_six_banner_top_left_card_icon']['url']) ?>" alt="<?php echo esc_attr('Total car Logo', 'drivco-core') ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="content">
                                    <?php if (!empty($settings['drivco_hero_banner_six_total_car_counter'])) :   ?>
                                        <h4><?php echo esc_html($settings['drivco_hero_banner_six_total_car_counter']) ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['drivco_hero_banner_six_total_car_content_text'])) :   ?>
                                        <span><?php echo esc_html($settings['drivco_hero_banner_six_total_car_content_text']) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="top-right-img">
                                    <?php if (!empty($settings['drivco_hero_banner_six_banner_top_right_image']['url'])) :   ?>
                                        <img src="<?php echo esc_url($settings['drivco_hero_banner_six_banner_top_right_image']['url']) ?>" alt="<?php echo esc_attr('Top Right Image', 'drivco-core') ?>">
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="bottom-img-group">
                                <div class="bottom-left-img">
                                    <?php if (!empty($settings['drivco_hero_banner_six_banner_bottom_left_image']['url'])) :   ?>
                                        <img src="<?php echo esc_url($settings['drivco_hero_banner_six_banner_bottom_left_image']['url']) ?>" alt="<?php echo esc_attr('Top Right Image', 'drivco-core') ?>">
                                    <?php endif ?>
                                </div>
                                <div class="bottom-right-img">
                                    <?php if (!empty($settings['drivco_hero_banner_six_banner_bottom_right_image']['url'])) :   ?>
                                        <img src="<?php echo esc_url($settings['drivco_hero_banner_six_banner_bottom_right_image']['url']) ?>" alt="<?php echo esc_attr('Top Right Image', 'drivco-core') ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home6-search-area mb-100">
            <?php
            // Search Filter 
            echo do_shortcode('[egns_general_filter style=3]');
            ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new drivco_Hero_Banner_Six_Widget());
