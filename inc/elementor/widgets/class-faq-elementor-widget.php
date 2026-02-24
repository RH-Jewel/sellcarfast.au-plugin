<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Faq_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_faq';
    }

    public function get_title()
    {
        return esc_html__('EG Faq', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_faq_sec',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_faq_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ’s & Latest Answer', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'drivco_faq_accordion_section',
            [
                'label' => esc_html__('Accordion Contents', 'drivco-core')
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        // accordion title
        $repeater->add_control(
            'drivco_section_content_accordion_title',
            [
                'label' => esc_html__('Question', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('How often should I get my car serviced ? ', 'drivco-core'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeater->add_control(
            'drivco_section_content_accordion_description',
            [
                'label' => esc_html__('Answer', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__('Lorem ipsum dolor sit amet, an simul salutandi efficiantur mel. Eum at dicant reprehendunt, in tritani mediocrem duo, eam ne lorem accusam explicari. Ut impedit molestie vix, sit at affert congue', 'drivco-core'),
                'placeholder' => esc_html__('Type your description here', 'drivco-core'),
            ]
        );


        $this->add_control(
            'drivco_faq_section_accordion_list',
            [
                'label' => esc_html__('Accordion List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_section_content_accordion_title' => esc_html__('How often should I get my car serviced ? ', 'drivco-core'),

                    ],

                ],
                'title_field' => '{{{ drivco_section_content_accordion_title }}}',
            ]
        );

        $this->end_controls_section();

        //////////////Style ///////////////////

        $this->start_controls_section(
            'drivco_faq_title_style',
            [
                'label' => esc_html__(' Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_faq_title_typ',
                'selector' => '{{WRAPPER}} .faq-page-wrap .faq-area .section-title-and-filter .section-title h4',

            ]
        );

        $this->add_control(
            'drivco_faq_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-page-wrap .faq-area .section-title-and-filter .section-title h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_faq_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-page-wrap .faq-area .section-title-and-filter .section-title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_faq_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-page-wrap .faq-area .section-title-and-filter .section-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'drivco_faq_question_sec',
            [
                'label' => esc_html__('Question ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_faq_question_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'drivco_faq_question_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_faq_question_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_faq_question_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'drivco_faq_answer',
            [
                'label' => esc_html__(' Answer ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_faq_answer_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'drivco_faq_answer_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_faq_answer_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_faq_answer_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_faq_section_accordion_list'];
?>


        <div class="faq-page-wrap">
            <div class="faq-area">
                <div class="section-title-and-filter mb-40">
                    <?php if (!empty($settings['drivco_faq_title'])) :   ?>
                        <div class="section-title">
                            <h4> <?php echo esc_html($settings['drivco_faq_title']) ?></h4>
                        </div>
                    <?php endif ?>
                </div>
                <div class="faq-wrap">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php
                        $accordion_items = $this->get_settings('drivco_faq_section_accordion_list');

                        if (!empty($accordion_items)) {
                            $index = 0;
                            foreach ($accordion_items as $item) {
                                $is_active = ($index === 0) ? 'show' : '';
                        ?>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="flush-heading<?php echo $index; ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $index; ?>">
                                            <?php if (!empty($item['drivco_section_content_accordion_title'])) :   ?>
                                                <?php echo esc_html($item['drivco_section_content_accordion_title']); ?>
                                            <?php endif ?>
                                        </button>
                                    </h5>
                                    <div id="flush-collapse<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $is_active; ?>" aria-labelledby="flush-heading<?php echo $index; ?>" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?php if (!empty($item['drivco_section_content_accordion_description'])) :   ?>
                                                <?php echo esc_html($item['drivco_section_content_accordion_description']); ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                $index++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Faq_Widget());
