<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Hero_Banner_One_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_hero_banner_one';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner One', 'drivco-core');
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


        //Banner Content section
        $this->start_controls_section(
            'drivco_hero_banner_one_style',
            [
                'label' => esc_html__('Banner section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'drivco_hero_banner_one_sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Fastest Speed', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_hero_banner_one_sec_subtitle_icon',
            [
                'label' => esc_html__('Subtitle Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_hero_banner_one_sec_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('To Best Way Buy Dream Car.', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_one_section_description',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Car dealerships may sell new cars from one or several manufacturers, as well as used cars from a variety of sources.', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();



        //Review Section

        $this->start_controls_section(
            'drivco_hero_banner_one_review_style',
            [
                'label' => esc_html__('Review section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_hero_banner_one_company_logo',
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
            'drivco_hero_banner_one_review',
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
            'drivco_hero_banner_one_review_star',
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
            'drivco_hero_banner_one_rating_text',
            [
                'label' => esc_html__('Rating Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trust Rating ', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Rating here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_hero_banner_one_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_hero_banner_one_review_count_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );


        $this->add_control(
            'drivco_hero_banner_one_review_repeater_list',
            [
                'label' => esc_html__('Review List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_hero_banner_one_review_count' => esc_html__('2348 Reviews', 'drivco-core'),
                    ],
                ],
                'title_field' => '{{{ drivco_hero_banner_one_review_count }}}',
            ]
        );
        $this->end_controls_section();


        //Car Filter Area
        // $this->start_controls_section(
        //     'drivco_hero_banner_one_car_filter_area',
        //     [
        //         'label' => esc_html__('Car Filter Area', 'drivco-core'),
        //         'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        //     ]
        // );

        // $this->add_control(
        //     'drivco_hero_banner_one_car_filter',
        //     [
        //         'label' => esc_html__('Shortcode', 'drivco-core'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => esc_html__('', 'drivco-core'),
        //         'placeholder' => esc_html__('Type your shortcode here', 'drivco-core'),
        //         'label_block' => true,
        //     ]
        // );
        // $this->end_controls_section();


        // =====================Style Start=======================//

        //SUb Title
        $this->start_controls_section(
            'drivco_hero_banner_one_subtitle_sec',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_one_subtitle_typ',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-content .sub-title',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_one_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-content .sub-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_one_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-content .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_one_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section1 .banner-content .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Title
        $this->start_controls_section(
            'drivco_hero_banner_one_title_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_one_title_typ',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-content h1',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_one_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_one_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_one_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section1 .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Description
        $this->start_controls_section(
            'drivco_hero_banner_one_description_sec',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_one_description_typ',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-content p',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_one_description_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_one_description_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_one_description_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section1 .banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Rating Count
        $this->start_controls_section(
            'drivco_hero_banner_one_rating_sec',
            [
                'label' => esc_html__('Review', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_one_rating_typ',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-content .customar-review > ul > li a .content ul li',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_one_rating_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-content .customar-review > ul > li a .content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_one_rating_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-content .customar-review > ul > li a .content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_one_rating_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section1 .banner-content .customar-review > ul > li a .content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_hero_banner_one_review_repeater_list'];
?>
        <?php if (is_admin()) : ?>
            <script>
                $('select)').niceSelect();
            </script>
        <?php endif ?>

        <div class="banner-section1">
            <div class="container">
                <div class="row g-xl-4 gy-5">
                    <div class="col-xxl-8 col-xl-7 d-flex align-items-center">
                        <div class="banner-content">
                            <span class="sub-title">
                                <?php if (!empty($settings['drivco_hero_banner_one_sec_subtitle'])) :   ?>
                                    <?php echo esc_html($settings['drivco_hero_banner_one_sec_subtitle']) ?>
                                <?php endif ?>
                                <?php if (!empty($settings['drivco_hero_banner_one_sec_subtitle_icon']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['drivco_hero_banner_one_sec_subtitle_icon']['url']) ?>" alt="<?php echo esc_attr('Title Logo', 'drivco-core') ?>">
                                <?php endif ?>
                            </span>
                            <?php if (!empty($settings['drivco_hero_banner_one_sec_title'])) :   ?>
                                <h1><?php echo wp_kses($settings['drivco_hero_banner_one_sec_title'], wp_kses_allowed_html('post'))  ?></h1>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_hero_banner_one_section_description'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_hero_banner_one_section_description']) ?></p>
                            <?php endif ?>
                            <div class="customar-review">
                                <ul>
                                    <?php foreach ($data as $item) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($item['drivco_hero_banner_one_review_count_url']['url']) ?>">
                                                <div class="review-top">
                                                    <div class="logo">
                                                        <?php if (!empty($item['drivco_hero_banner_one_company_logo']['url'])) :   ?>
                                                            <img src="<?php echo esc_url($item['drivco_hero_banner_one_company_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo', 'drivco-core') ?>">
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="star">
                                                        <?php if ('general' == $item['drivco_hero_banner_one_review']) { ?>
                                                            <ul>
                                                                <?php $rank_counter = intval($item['drivco_hero_banner_one_review_star']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li><i class="bi bi-star-fill"></i></li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            </ul>
                                                        <?php } ?>

                                                        <?php if ('trustpilot' == $item['drivco_hero_banner_one_review']) { ?>
                                                            <ul class="trustpilot">
                                                                <?php $rank_counter = intval($item['drivco_hero_banner_one_review_star']);
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
                                                        <?php if (!empty($item['drivco_hero_banner_one_rating_text'])) :   ?>
                                                            <li> <?php echo esc_html($item['drivco_hero_banner_one_rating_text']) ?><span><?php echo sprintf("%2d.0", $rank_counter) ?></span></li>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['drivco_hero_banner_one_review_count'])) :   ?>
                                                            <li><?php echo wp_kses($item['drivco_hero_banner_one_review_count'], wp_kses_allowed_html('post'))  ?></li>
                                                        <?php endif ?>
                                                    </ul>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-5">
                        <?php
                        echo do_shortcode('[egns_general_filter]');
                        ?>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Hero_Banner_One_Widget());
