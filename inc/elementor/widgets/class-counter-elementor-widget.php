<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Counter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_counter';
    }

    public function get_title()
    {
        return esc_html__('EG Counter', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-counter';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {


        //Counter
        $this->start_controls_section(
            'drivco_counter_section',
            [
                'label' => esc_html__('General', 'drivco-core'),
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'drivco_counter_icon',
            [
                'label' => esc_html__('Choose Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-cart-plus',
                    'library' => 'solid',
                ],

            ]
        );
        $repeater->add_control(
            'drivco_counter_number_of_activity',
            [
                'label' => esc_html__('Number Of Activity', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('600', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_counter_number_of_activity_tag',
            [
                'label' => esc_html__('Number Of Activity Tag', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('K+', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_counter_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 15,
                'default' => esc_html__('Car Available', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_counter_list',
            [
                'label' => esc_html__('Counter List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_counter_number_of_activity' => esc_html__('600', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_counter_number_of_activity }}}',
            ]
        );
        $this->end_controls_section();


        // ==================Style==================//


        //Numder Of Activity
        $this->start_controls_section(
            'drivco_counter_no_of_activity_sec',
            [
                'label' => esc_html__('Number Of Activity', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_counter_no_of_activity_typ',
                'selector' => '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number ',
            ]
        );
        $this->add_control(
            'drivco_counter_no_of_activity_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number ' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_counter_no_of_activity_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_counter_no_of_activity_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content .number ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //COntent
        $this->start_controls_section(
            'drivco_counter_content_sec',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_counter_content_typ',
                'selector' => '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p',
            ]
        );
        $this->add_control(
            'drivco_counter_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_counter_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_counter_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home6-brand-section .our-activetis .single-activiti .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_counter_list'];
?>


        <div class="home6-brand-section ">
            <div class="our-activetis">
                <div class="row justify-content-center g-lg-4 gy-5">
                    <?php foreach ($data as $item) : ?>
                        <div class="col-lg-3 col-sm-4 col-sm-6 divider d-flex justify-content-lg-start justify-content-sm-center">
                            <div class="single-activiti">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['drivco_counter_icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                                <div class="content">
                                    <div class="number">
                                        <?php if (!empty($item['drivco_counter_number_of_activity'])) :   ?>
                                            <h5 class="counter"><?php echo wp_kses($item['drivco_counter_number_of_activity'], wp_kses_allowed_html('post'))  ?></h5>
                                        <?php endif ?>
                                        <?php if (!empty($item['drivco_counter_number_of_activity_tag'])) :   ?>
                                            <span><?php echo wp_kses($item['drivco_counter_number_of_activity_tag'], wp_kses_allowed_html('post'))  ?></span>
                                        <?php endif ?>
                                    </div>
                                    <?php if (!empty($item['drivco_counter_content'])) :   ?>
                                        <p><?php echo esc_html($item['drivco_counter_content']) ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Counter_Widget());
