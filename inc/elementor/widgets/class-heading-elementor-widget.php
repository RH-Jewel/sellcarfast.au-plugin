<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Heading_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_heading';
    }

    public function get_title()
    {
        return esc_html__('EG Heading', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_heading_one_section_genaral',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_heading_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'drivco-core'),
                    'style_two' => esc_html__('Style Two', 'drivco-core'),
                ],
                'default' => 'style_one',
            ]
        );



        $this->add_responsive_control(
            'drivco_heading_content_text_align',
            [
                'label'         => esc_html__('Text Align', 'drivco-core'),
                'type'             => \Elementor\Controls_Manager::CHOOSE,
                'options'         => [
                    'left'         => [
                        'title' => esc_html__('Left', 'drivco-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'drivco-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__('Right', 'drivco-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                    'justify'     => [
                        'title' => esc_html__('Justified', 'drivco-core'),
                        'icon'     => 'eicon-text-align-justify',
                    ],
                ],
                'default'         => 'center',
                'options'         => [
                    'start'         => [
                        'title' => esc_html__('Left', 'drivco-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'drivco-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'end'     => [
                        'title' => esc_html__('Right', 'drivco-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                ],
                'default'         => 'center',
                'selectors'     => [

                    '{{WRAPPER}} .section-title1 ' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section-title-2' => 'text-align: {{VALUE}};',

                ],
                'condition' => [
                    'drivco_heading_content_style_selection' => ['style_one', 'style_two']
                ]
            ]
        );


        $this->add_control(
            'drivco_heading_sub-title',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Available Brand Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_heading_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'drivco_heading_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Most Searched Used Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_heading_content_style_selection' => 'style_one'
                ]
            ]
        );


        //style two content 

        $this->add_control(
            'drivco_heading_two_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Search Your Dream Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_heading_content_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'drivco_heading_two_subtitle',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('There has 30+ Brand Category Available ', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_heading_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->end_controls_section();


        // =====================Style One=======================//




        $this->start_controls_section(
            'drivco_style_one_subtitle',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_heading_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_style_one_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title1 span',

            ]
        );

        $this->add_control(
            'drivco_style_one_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_style_one_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_style_one_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'drivco_style_one_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_heading_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_style_one_title_typ',
                'selector' => '{{WRAPPER}} .section-title1 h2',

            ]
        );

        $this->add_control(
            'drivco_style_one_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_style_one_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_style_one_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // =====================Style Two=======================//




        $this->start_controls_section(
            'drivco_style_two_title',
            [
                'label' => esc_html__(' Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_heading_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_style_two_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_style_two_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_style_two_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_style_two_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'drivco_style_two_subtitle',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_heading_content_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_style_two_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_style_two_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_style_two_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_style_two_subtitle_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title-2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>


        <?php if ($settings['drivco_heading_content_style_selection'] == 'style_one') : ?>
            <div class="section-title1">
                <?php if (!empty($settings['drivco_heading_sub-title'])) :   ?>
                    <span> <?php echo wp_kses($settings['drivco_heading_sub-title'], wp_kses_allowed_html('post'))  ?></span>
                <?php endif; ?>
                <?php if (!empty($settings['drivco_heading_title'])) :   ?>
                    <h2> <?php echo wp_kses($settings['drivco_heading_title'], wp_kses_allowed_html('post'))  ?> </h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['drivco_heading_content_style_selection'] == 'style_two') : ?>
            <div class="section-title-2">
                <?php if (!empty($settings['drivco_heading_two_title'])) :   ?>
                    <h2> <?php echo wp_kses($settings['drivco_heading_two_title'], wp_kses_allowed_html('post'))  ?> </h2>
                <?php endif; ?>
                <?php if (!empty($settings['drivco_heading_two_subtitle'])) :   ?>
                    <p><?php echo wp_kses($settings['drivco_heading_two_subtitle'], wp_kses_allowed_html('post'))  ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Heading_Widget());
