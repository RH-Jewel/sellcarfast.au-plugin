<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class drivco_Hero_Banner_Five_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_hero_banner_five';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Five', 'drivco-core');
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
            'drivco_hero_banner_five_section',
            [
                'label' => esc_html__('General', 'drivco-core')

            ]
        );
        $this->add_control(
            'drivco_hero_banner_five_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Premier Auto Sales', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_five_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Car dealerships may sell new cars from one or several manufacturers', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //Banner Background Image

        $this->start_controls_section(
            'drivco_hero_banner_five_background_image',
            [
                'label' => esc_html__('Banner Photos', 'drivco-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_hero_banner_five_background_image',
            [
                'label' => esc_html__('Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_hero_banner_five_background_image_list',
            [
                'label' => esc_html__('Choose Images', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
        );
        $this->end_controls_section();

        //Button Section

        $this->start_controls_section(
            'drivco_hero_banner_five_button_section',
            [
                'label' => esc_html__('Button', 'drivco-core')

            ]
        );

        $this->add_control(
            'drivco_hero_banner_five_button_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Find Your Car', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'drivco_hero_banner_five_button_icon',
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
            'drivco_hero_banner_five_button_url',
            [
                'label' => esc_html__('Button URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );
        $this->end_controls_section();
        

        //Review Section
        $this->start_controls_section(
            'drivco_hero_banner_five_review_style',
            [
                'label' => esc_html__('Review Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_five_review_rating_text',
            [
                'label' => esc_html__('Rating Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trust Ratings', 'drivco-core'),
                'placeholder' => esc_html__('Type your description here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_five_review',
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
            'drivco_hero_banner_five_review_star',
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
            'drivco_hero_banner_five_review_count_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_hero_banner_five_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Based On 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_hero_banner_five_review_logo',
            [
                'label' => esc_html__('Choose Logo ', 'drivco-core'),
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
            'drivco_hero_banner_five_title_sec',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_five_title_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-content h1',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_five_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_five_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_five_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-banner-area .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Content
        $this->start_controls_section(
            'drivco_hero_banner_five_content_sec',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_five_content_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-content p',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_five_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_five_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_five_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-banner-area .banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Button
        $this->start_controls_section(
            'drivco_hero_banner_button_five_style',
            [
                'label' => esc_html__('Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        // Tabs
        $this->start_controls_tabs(
            'drivco_hero_banner_button_five_tabs'
        );

        $this->start_controls_tab(
            'drivco_hero_banner_button_five_normal_tab',
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
                'name'     => 'drivco_hero_banner_button_five_typ',
                'selector' => '{{WRAPPER}} .primary-btn3',

            ]
        );
        $this->add_control(
            'drivco_hero_banner_button_five_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_hero_banner_button_five_icon_color',
            [
                'label'     => esc_html__(' Icon Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3 svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_button_five_margin',
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
            'drivco_hero_banner_button_five_padding',
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
            'drivco_hero_banner_button_five_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_hero_banner_button_five_background_color_hover',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'drivco_hero_banner_button_five_color_hover',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        //Rating Count
        $this->start_controls_section(
            'drivco_hero_banner_five_rating_sec',
            [
                'label' => esc_html__('Review', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_hero_banner_five_description_typ',
                'selector' => '{{WRAPPER}} .home5-banner-area .banner-content .banner-content-bottom .rating a .content ul li',
            ]
        );
        $this->add_control(
            'drivco_hero_banner_one_rating_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-content .banner-content-bottom .rating a .content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_five_rating_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-area .banner-content .banner-content-bottom .rating a .content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_hero_banner_five_rating_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-banner-area .banner-content .banner-content-bottom .rating a .content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_hero_banner_five_background_image_list'];


?>

        <div class="home5-banner-area">
            <div class="paginations111"></div>
            <div class="swiper home3-banner-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($data as $item) : ?>
                        <div class="swiper-slide">
                            <div class="banner-bg" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.30) 0%, rgba(0, 0, 0, 0.30) 100%),  url('<?php echo esc_url($item['drivco_hero_banner_five_background_image']['url']) ?>" alt="<?php echo esc_attr('background-img', 'drivco-core') ?>');">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-content">
                            <?php if (!empty($settings['drivco_hero_banner_five_title'])) :   ?>
                                <h1><?php echo esc_html($settings['drivco_hero_banner_five_title']) ?></h1>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_hero_banner_five_content'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_hero_banner_five_content']) ?></p>
                            <?php endif ?>
                            <div class="banner-content-bottom">
                                <?php if (!empty($settings['drivco_hero_banner_five_button_text'])) :   ?>
                                    <a href="<?php echo esc_url($settings['drivco_hero_banner_five_button_url']['url']) ?>" class="primary-btn3">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['drivco_hero_banner_five_button_icon'], ['aria-hidden' => 'true']); ?>
                                       <?php echo esc_html($settings['drivco_hero_banner_five_button_text']) ?>
                                    </a>
                                <?php endif ?>
                                <div class="rating">
                                    <a href="<?php echo esc_url($settings['drivco_hero_banner_five_review_count_url']['url']) ?>">
                                        <div class="review-top">
                                            <div class="logo">
                                                <?php if (!empty($settings['drivco_hero_banner_five_review_logo']['url'])) :   ?>
                                                    <img src="<?php echo esc_url($settings['drivco_hero_banner_five_review_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo ', 'drivco-core') ?>">
                                                <?php endif ?>
                                            </div>
                                            <div class="star">
                                                <?php if ('general' == $settings['drivco_hero_banner_five_review']) { ?>
                                                    <ul>
                                                        <?php $rank_counter = intval($settings['drivco_hero_banner_five_review_star']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php } ?>

                                                <?php if ('trustpilot' == $settings['drivco_hero_banner_five_review']) { ?>
                                                    <ul class="trustpilot">
                                                        <?php $rank_counter = intval($settings['drivco_hero_banner_five_review_star']);
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
                                                <?php if (!empty($settings['drivco_hero_banner_five_review_rating_text'])) :   ?>
                                                    <li><?php echo esc_html($settings['drivco_hero_banner_five_review_rating_text']) ?><span><?php echo sprintf("%2d.0", $rank_counter) ?></span></li>
                                                <?php endif ?>
                                                <?php if (!empty($settings['drivco_hero_banner_five_review_count'])) :   ?>
                                                    <li><?php echo wp_kses($settings['drivco_hero_banner_five_review_count'], wp_kses_allowed_html('post'))  ?></li>
                                                <?php endif ?>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new drivco_Hero_Banner_Five_Widget());
