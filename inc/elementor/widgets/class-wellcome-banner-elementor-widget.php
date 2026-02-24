<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Wellcome_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_wellcome_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Wellcome Banner', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-custom';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'drivco_wellcome_banner_area',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_wellcome_banner_year',
            [
                'label' => esc_html__('vehicle-year', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('(Since-1994)', 'drivco-core'),
                'placeholder' => esc_html__('Type your Year here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_wellcome_banner_Title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Welcome To Drivco', 'drivco-core'),
                'placeholder' => esc_html__('Type your Title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_wellcome_banner_desc',
            [
                'label' => esc_html__('Description', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('We are passionate car agency we are thrilled to have you join our community of automotive enthusiasts and professionals. Whether you are a passionate driver, a car owner, or someone who loves all things automotive, you ve come to the right place.At Drivco, we strive to create a space where people can connect, share knowledge, and explore the exciting world of automobiles. From discussing the latest car models and technologies to sharing driving tips and tricks, we re here to fuel your love for everything on wheels.Feel free to ask any questions you have, seek advice, or simply engage in friendly conversations with fellow members. Our community is full of experts and enthusiasts who are eager to share their insights and experiences. Buckle up and enjoy your journey with Drivco! ', 'drivco-core'),
                'placeholder' => esc_html__('Type your Description here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        //Author Section
        $this->start_controls_section(
            'drivco_wellcome_banner_author_sec_area',
            [
                'label' => esc_html__('Author Section', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_wellcome_banner_author_signature',
            [
                'label' => esc_html__('Author Signature', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'drivco_wellcome_banner_author_name',
            [
                'label' => esc_html__('Author Name', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Natrison Mongla', 'drivco-core'),
                'placeholder' => esc_html__('Type Author Name here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'drivco_wellcome_banner_author_designations',
            [
                'label' => esc_html__('Author Designation', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('(CEO & Founder)', 'drivco-core'),
                'placeholder' => esc_html__('Type Author Designation here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // =====================Style=======================//

        //Year

        $this->start_controls_section(
            'drivco_wellcome_banner_year_sec',
            [
                'label' => esc_html__(' Year', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_wellcome_banner_year_typ',
                'selector' => '{{WRAPPER}} .section-title1 span',

            ]
        );

        $this->add_control(
            'drivco_wellcome_banner_year_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_wellcome_banner_year_margin',
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
            'drivco_wellcome_banner_year_padding',
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

        //Title

        $this->start_controls_section(
            'drivco_wellcome_banner_title_sec',
            [
                'label' => esc_html__(' Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_wellcome_banner_title_typ',
                'selector' => '{{WRAPPER}} .section-title1 h2',

            ]
        );

        $this->add_control(
            'drivco_wellcome_banner_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_wellcome_banner_title_margin',
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
            'drivco_wellcome_banner_title_padding',
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

        //Description

        $this->start_controls_section(
            'drivco_wellcome_banner_desc_sec',
            [
                'label' => esc_html__(' Description', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_wellcome_banner_desc_typ',
                'selector' => '{{WRAPPER}} .welcome-banner-section .welcome-wrap .welcome-content p',

            ]
        );

        $this->add_control(
            'drivco_wellcome_banner_desc_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .welcome-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_wellcome_banner_desc_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .welcome-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_wellcome_banner_desc_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .welcome-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        //Author Name

        $this->start_controls_section(
            'drivco_wellcome_banner_author_name_sec',
            [
                'label' => esc_html__(' Author Name', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_wellcome_banner_author_name_typ',
                'selector' => '{{WRAPPER}} .welcome-banner-section .welcome-wrap .author-area h6',

            ]
        );

        $this->add_control(
            'drivco_wellcome_banner_author_name_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .author-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_wellcome_banner_author_name_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .author-area h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_wellcome_banner_author_name_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .author-area h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        //Author Designations

        $this->start_controls_section(
            'drivco_wellcome_banner_author_designations_sec',
            [
                'label' => esc_html__(' Author Designations', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_wellcome_banner_author_designations_typ',
                'selector' => '{{WRAPPER}} .welcome-banner-section .welcome-wrap .author-area span',

            ]
        );

        $this->add_control(
            'drivco_wellcome_banner_author_designations_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .author-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_wellcome_banner_author_designations_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .author-area span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_wellcome_banner_author_designations_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .welcome-banner-section .welcome-wrap .author-area span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>
        <div class="welcome-banner-section">
            <div class="welcome-wrap text-center">
                <div class="section-title1 text-center">
                    <?php if (!empty($settings['drivco_wellcome_banner_year'])) :   ?>
                        <span><?php echo wp_kses($settings['drivco_wellcome_banner_year'], wp_kses_allowed_html('post'))  ?></span>
                    <?php endif ?>
                    <?php if (!empty($settings['drivco_wellcome_banner_Title'])) :   ?>
                        <h2><?php echo wp_kses($settings['drivco_wellcome_banner_Title'], wp_kses_allowed_html('post'))  ?></h2>
                    <?php endif ?>
                </div>
                <div class="welcome-content">
                    <?php if (!empty($settings['drivco_wellcome_banner_Title'])) :   ?>
                        <p><?php echo wp_kses($settings['drivco_wellcome_banner_desc'], wp_kses_allowed_html('post'))  ?></p>
                    <?php endif ?>
                </div>
                <div class="author-area">
                    <?php if (!empty($settings['drivco_wellcome_banner_author_signature']['url'])) :   ?>
                        <img src="<?php echo esc_url($settings['drivco_wellcome_banner_author_signature']['url']) ?>" alt="<?php echo esc_attr('author signature', 'drivco-core') ?>">
                    <?php endif ?>
                    <?php if (!empty($settings['drivco_wellcome_banner_author_name'])) :   ?>
                        <h6><?php echo esc_html($settings['drivco_wellcome_banner_author_name']) ?></h6>
                    <?php endif ?>
                    <?php if (!empty($settings['drivco_wellcome_banner_author_designations'])) :   ?>
                        <span><?php echo wp_kses($settings['drivco_wellcome_banner_author_designations'], wp_kses_allowed_html('post'))  ?></span>
                    <?php endif ?>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Wellcome_Banner_Widget());
