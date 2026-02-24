<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Inquiry_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_inquiry';
    }

    public function get_title()
    {
        return esc_html__('EG Inquiry Form', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-kit-details';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_inquiry_sec',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_inquiry_heading',
            [
                'label' => esc_html__('Heading', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('If Any Inquiry, To Do Ask Somethings', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_inquiry_form',
            [
                'label' => esc_html__('Form ShortCode', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Style 

        $this->start_controls_section(
            'drivco_inquiry_style_heading',
            [
                'label' => esc_html__('Heading ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_inquiry_typography',
                'selector' => '{{WRAPPER}} .faq-inquiery-form .section-title h4',

            ]
        );

        $this->add_control(
            'drivco_inquiry_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-inquiery-form .section-title h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>


        <div class="faq-inquiery-form">
            <div class="row">
                <div class="col-lg-12">
                    <?php if (!empty($settings['drivco_inquiry_heading'])) : ?>
                        <div class="section-title mb-20">
                            <h4><?php echo $settings['drivco_inquiry_heading'] ?></h4>
                        </div>
                    <?php endif; ?>
                    <?php
                    if (!empty($settings['drivco_inquiry_form'])) {
                        echo do_shortcode($settings['drivco_inquiry_form']);
                    }
                    ?>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Inquiry_Widget());
