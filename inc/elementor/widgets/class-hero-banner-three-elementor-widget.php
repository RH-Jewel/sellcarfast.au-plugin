<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Hero_Banner_Three_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_hero_banner_three';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Three', 'drivco-core');
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
            'drivco_hero_banner_two_section',
            [
                'label' => esc_html__('General', 'drivco-core')

            ]
        );
        $this->add_control(
            'drivco_hero_banner_three_content_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Elite Car Dealership', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_three_feature_one',
            [
                'label' => esc_html__('Feature One', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Total Car <span> 23, 855 </span>',wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your feature here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_hero_banner_three_feature_two',
            [
                'label' => esc_html__('Feature Two', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Used Car <span> 19, 230 </span>',wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your feature here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_hero_banner_three_feature_three',
            [
                'label' => esc_html__('Feature Three', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('New Car <span>  2, 230 </span>',wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your feature here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_hero_banner_three_feature_four',
            [
                'label' => esc_html__('Feature Four', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Auction Car <span> 2, 230 </span>',wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your feature here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_three_devider',
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

        //Banner Background Image

        $this->start_controls_section(
            'drivco_hero_banner_three_background_image',
            [
                'label' => esc_html__('Banner Slider Images', 'drivco-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_hero_banner_three_background_image',
            [
                'label' => esc_html__('Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_hero_banner_background_image_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
        );
        $this->end_controls_section();

        //Review Section

        $this->start_controls_section(
            'drivco_hero_banner_three_review_style',
            [
                'label' => esc_html__('Review Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_three_review_title',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Excellent!', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_three_review',
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
            'drivco_hero_banner_three_review_star',
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
            'drivco_hero_banner_three_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Based On 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_hero_banner_three_review_count_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_hero_banner_three_review_logo',
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

        // =====================Style Start=======================//

        //Title
        $this->start_controls_section(
            'drivco_hero_banner_three_title_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_three_title_typ',
                'selector' => '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content h1',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_three_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_three_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_three_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Feature
        $this->start_controls_section(
            'drivco_hero_banner_three_feature_sec',
            [
                'label' => esc_html__('Feature Area', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_three_feature_typ',
                'selector' => '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .banner-feature ul li',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_three_feature_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .banner-feature ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_three_feature_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .banner-feature ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_three_feature_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .banner-feature ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Review Title
        $this->start_controls_section(
            'drivco_hero_banner_three__review_title_sec_style',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_three__review_title_typ',
                'selector' => '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review > strong',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_three__review_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review > strong' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_three__review_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review > strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_three__review_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review > strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Review Count
        $this->start_controls_section(
            'drivco_hero_banner_two_review_sec',
            [
                'label' => esc_html__('Review', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_two_review_typ',
                'selector' => '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review p',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_two_review_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review p ' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_two_review_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_two_review_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Review Count
        $this->start_controls_section(
            'drivco_hero_banner_two_review_count_sec',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_two_review_count_typ',
                'selector' => '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review p a',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_two_review_count_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review p a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_two_review_count_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_two_review_count_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner-area .banner-wrapper .banner-content .trustpilot-review p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_hero_banner_background_image_list'];
?>

        <div class="home3-banner-area">
            <div class="swiper home3-banner-slider">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($data as $item) :
                        if (!empty($item['drivco_hero_banner_three_background_image'])) :
                    ?>
                            <div class="swiper-slide">
                                <div class="banner-bg" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 100%), url('<?php echo esc_url($item['drivco_hero_banner_three_background_image']['url']) ?>" alt="<?php echo esc_attr('background-img', 'drivco-core') ?>');">
                                </div>
                            </div>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-wrapper">
                            <div class="banner-content">
                                <?php if (!empty($settings['drivco_hero_banner_three_content_title'])) :   ?>
                                    <h1><?php echo esc_html($settings['drivco_hero_banner_three_content_title']) ?></h1>
                                <?php endif ?>
                                <div class="banner-feature">
                                    <ul>
                                        <?php if (!empty($settings['drivco_hero_banner_three_feature_one'])) :   ?>
                                            <li><?php echo wp_kses($settings['drivco_hero_banner_three_feature_one'], wp_kses_allowed_html('post'))  ?></li>
                                        <?php endif ?>
                                        <?php if (!empty($settings['drivco_hero_banner_three_feature_two'])) :   ?>
                                            <li><?php echo wp_kses($settings['drivco_hero_banner_three_feature_two'], wp_kses_allowed_html('post'))  ?></li>
                                        <?php endif ?>
                                        <?php if (!empty($settings['drivco_hero_banner_three_feature_three'])) :   ?>
                                            <li><?php echo wp_kses($settings['drivco_hero_banner_three_feature_three'], wp_kses_allowed_html('post'))  ?> </li>
                                        <?php endif ?>
                                        <?php if (!empty($settings['drivco_hero_banner_three_feature_four'])) :   ?>
                                            <li><?php echo wp_kses($settings['drivco_hero_banner_three_feature_four'], wp_kses_allowed_html('post'))  ?></li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                                <div class="trustpilot-review">
                                    <?php if (!empty($settings['drivco_hero_banner_three_review_title'])) :   ?>
                                        <strong><?php echo esc_html($settings['drivco_hero_banner_three_review_title']) ?></strong>
                                    <?php endif ?>
                                    <div class="star">
                                        <?php if ('general' == $settings['drivco_hero_banner_three_review']) { ?>
                                            <ul>
                                                <?php $rank_counter = intval($settings['drivco_hero_banner_three_review_star']);
                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <?php if ($i <= $rank_counter) : ?>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                    <?php endif ?>
                                                <?php endfor; ?>
                                            </ul>
                                        <?php } ?>

                                        <?php if ('trustpilot' == $settings['drivco_hero_banner_three_review']) { ?>
                                            <ul class="trustpilot">
                                                <?php $rank_counter = intval($settings['drivco_hero_banner_three_review_star']);
                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <?php if ($i <= $rank_counter) : ?>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                    <?php endif ?>
                                                <?php endfor; ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                    <p><strong><?php echo sprintf("%2d.0", $rank_counter) ?></strong> <?php echo esc_html('Rating out of 5.0 based on') ?> <a href="<?php echo esc_url($settings['drivco_hero_banner_three_review_count_url']['url']) ?>"> <?php echo wp_kses($settings['drivco_hero_banner_three_review_count'], wp_kses_allowed_html('post'))  ?></a></p>
                                    <?php if (!empty($settings['drivco_hero_banner_three_review_logo']['url'])) :   ?>
                                        <img src="<?php echo esc_url($settings['drivco_hero_banner_three_review_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo ', 'drivco-core') ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                            <?php if ('yes' == $settings['drivco_hero_banner_three_devider']) { ?>
                                <div class="slider-btn-group style-2 style-3 justify-content-md-end justify-content-center gap-4">
                                    <div class="slider-btn prev-4 d-md-flex d-none">
                                        <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                        </svg>
                                    </div>
                                    <div class="paginations111"></div>
                                    <div class="slider-btn next-4 d-md-flex d-none">
                                        <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                        </svg>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Hero_Banner_Three_Widget());
