<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Review_Two_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_review_two';
    }

    public function get_title()
    {
        return esc_html__('EG Review Two', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-lock-user';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //Review
        $this->start_controls_section(
            'drivco_counter_review_one_style',
            [
                'label' => esc_html__('Review Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'drivco_review_counter_title',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Excellent!', 'drivco-core'),
                'placeholder' => esc_html__('Type your Titlte here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_review_two_section',
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
            'drivco_review_counter_review_star',
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
            'drivco_review_counter_review_logo',
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
            'drivco_review_counter_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__(' 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_review_counter_review_count_url',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $this->end_controls_section();

        // =====================Style Start=======================//

        //Review Title

        $this->start_controls_section(
            'drivco_review_counter_review_title_style_sec',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_counter_review_title_text_typ',
                'selector' => '{{WRAPPER}} .why-choose-area .trustpilot-review > strong ',


            ]
        );

        $this->add_control(
            'drivco_review_counter_review_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review > strong' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_counter_review_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review > strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_counter_review_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review > strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Review Count
        $this->start_controls_section(
            'drivco_review_counter_review_count_style',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_counter_review_count_typ',
                'selector' => '{{WRAPPER}} .why-choose-area .trustpilot-review p',


            ]
        );

        $this->add_control(
            'drivco_review_counter_review_count_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review p' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_counter_review_count_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_counter_review_count_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Total Review 
        $this->start_controls_section(
            'drivco_review_counter_total_review_count_style',
            [
                'label' => esc_html__(' Total Review ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_counter_total_review_count_typ',
                'selector' => '{{WRAPPER}} .why-choose-area .trustpilot-review p a',


            ]
        );

        $this->add_control(
            'drivco_review_counter_total_review_count_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review p a' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_counter_total_review_count_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_counter_total_review_count_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .why-choose-area .trustpilot-review p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <div class="why-choose-area ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="trustpilot-review">
                        <?php if (!empty($settings['drivco_review_counter_title'])) :   ?>
                            <strong><?php echo esc_html($settings['drivco_review_counter_title']) ?></strong>
                            <?php endif; ?>
                            <?php if ('general' == $settings['drivco_review_two_section']) { ?>
                                <ul>
                                    <?php $rank_counter = intval($settings['drivco_review_counter_review_star']);
                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?php if ($i <= $rank_counter) : ?>
                                            <li><i class="bi bi-star-fill"></i></li>
                                        <?php endif ?>
                                    <?php endfor; ?>
                                </ul>
                            <?php } ?>

                            <?php if ('trustpilot' == $settings['drivco_review_two_section']) { ?>
                                <ul class="trustpilot">
                                    <?php $rank_counter = intval($settings['drivco_review_counter_review_star']);
                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?php if ($i <= $rank_counter) : ?>
                                            <li><i class="bi bi-star-fill"></i></li>
                                        <?php endif ?>
                                    <?php endfor; ?>
                                </ul>
                            <?php } ?>
                            <p><?php echo $rank_counter ?> <?php echo esc_html('Rating out of 5.0 Based On') ?><a href="<?php echo esc_url($settings['drivco_review_counter_review_count_url']['url']) ?>"><?php echo wp_kses($settings['drivco_review_counter_review_count'], wp_kses_allowed_html('post'))  ?></a> </p>
                            <img src="<?php echo esc_url($settings['drivco_review_counter_review_logo']['url']) ?>" alt="<?php echo esc_attr('Review Logo', 'drivco-core') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>




<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Review_Two_Widget());
