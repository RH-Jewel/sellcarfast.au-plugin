<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Marquee_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_marquee_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Marquee Slider', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_marquee_slider_area_style_section',
            [
                'label' => esc_html__('Choose Style', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_marquee_slider_section',
            [
                'label'   => esc_html__('Select Style', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'     => esc_html__('Style One', 'drivco-core'),
                    'style_two'     => esc_html__('Style Two', 'drivco-core'),
                ],
                'default' => 'style_one',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'drivco_marquee_slider_area',
            [
                'label' => esc_html__('General', 'drivco-core'),
                'condition' => [
                    'drivco_marquee_slider_section' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'drivco_marquee_slider_area_subtitle',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Trusted Partners', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_marquee_slider_img_logo',
            [
                'label' => esc_html__(' Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_marquee_slider_area_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();


        //Style Two


        $this->start_controls_section(
            'drivco_banner_two_slider_area',
            [
                'label' => esc_html__('General', 'drivco-core'),
                'condition' => [
                    'drivco_marquee_slider_section' => 'style_two',
                ],
            ]
        );


        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'drivco_banner_two_slider_area_title',
            [
                'label' => esc_html__(' Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('GET 30% OFFER ON TOYOTA CAR', 'drivco-core'),
                'placeholder' => esc_html__('Type your  title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_banner_two_slider_area_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_banner_two_slider_area_title' => esc_html__('GET 30% OFFER ON TOYOTA CAR', 'drivco-core'),
                    ],
                ],
                'title_field' => '{{{ drivco_banner_two_slider_area_title }}}',
            ]
        );
        $this->end_controls_section();




        // =====================Style One=======================//

        $this->start_controls_section(
            'drivco_marquee_slider_subtitle_sec',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_marquee_slider_section' => 'style_one',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_marquee_slider_subtitle_typ',
                'selector' => '{{WRAPPER}} .customar-feedback-area .sub-title h6',

            ]
        );

        $this->add_control(
            'drivco_marquee_slider_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .sub-title h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_marquee_slider_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .sub-title h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_marquee_slider_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customar-feedback-area .sub-title h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // =====================Style Two=======================//

        $this->start_controls_section(
            'drivco_banner_two_slider_title_sec',
            [
                'label' => esc_html__(' Marquee Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_marquee_slider_section' => 'style_two',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_marquee_slider_two_subtitle_typ',
                'selector' => '{{WRAPPER}} .text-slider2 .marquee_text .js-marquee',

            ]
        );

        $this->add_control(
            'drivco_marquee_slider_two_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-slider2 .marquee_text .js-marquee' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_marquee_slider_two_subtitle_background_color',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-slider2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_marquee_slider_two_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .text-slider2 .marquee_text .js-marquee' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_marquee_slider_two_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .text-slider2 .marquee_text .js-marquee' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_marquee_slider_area_list'];
        $data2 = $settings['drivco_banner_two_slider_area_list'];
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

                jQuery(".marquee_text").marquee({
                    direction: "left",
                    duration: 25000,
                    gap: 50,
                    delayBeforeStart: 0,
                    duplicated: true,
                    startVisible: true,
                });
            </script>
        <?php endif ?>

        <?php if ($settings['drivco_marquee_slider_section'] == 'style_one') : ?>
            <div class="customar-feedback-area">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sub-title">
                            <?php if (!empty($settings['drivco_marquee_slider_area_subtitle'])) :   ?>
                                <h6><?php echo wp_kses($settings['drivco_marquee_slider_area_subtitle'], wp_kses_allowed_html('post'))  ?></h6>
                            <?php endif ?>
                            <div class="dash"></div>
                        </div>
                        <div class="partner-slider">
                            <h2 class="marquee_text2">
                                <?php foreach ($data as $item) : ?>
                                    <?php if (!empty($item['drivco_marquee_slider_img_logo']['url'])) :   ?>
                                        <img src="<?php echo esc_url($item['drivco_marquee_slider_img_logo']['url']) ?>" alt="<?php echo esc_attr('Logo image', 'drivco-core') ?>">
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['drivco_marquee_slider_section'] == 'style_two') : ?>
            <div class="text-slider2">
                <div class="marquee_text">
                    <?php foreach ($data2 as $item2) : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/home2/icon/text-slider-vec.svg') ?>" alt="<?php echo esc_attr('slider-image') ?>">
                        <?php if (!empty($item2['drivco_banner_two_slider_area_title'])) :   ?>
                            <?php echo esc_html($item2['drivco_banner_two_slider_area_title']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Marquee_Slider_Widget());
