<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Contact_Two_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_contact_two';
    }

    public function get_title()
    {
        return esc_html__('EG Contact Two', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//
        $this->start_controls_section(
            'drivco_choose_area',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );


        $this->add_control(
            'drivco_contact_two_area_section_title',
            [
                'label' => esc_html__('Section Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact Us With Support Line', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_contact_two_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('To Know More', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'drivco_contact_two_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Email Now', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'drivco_contact_two_icon',
            [
                'label' => esc_html__('Content Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-at',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'drivco_contact_two_info',
            [
                'label' => esc_html__('Info', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('info@example.com', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'drivco_contact_two_info_link',
            [
                'label' => esc_html__('Info Link', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => wp_kses('mailto:info@example.com', wp_kses_allowed_html('post')),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'drivco_contact_two_area_list',
            [
                'label' => esc_html__('Info List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_contact_two_title' => esc_html__('Dhaka, Bangladesh', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_contact_two_title }}}',
            ]
        );

        $this->add_control(
            'drivco_contact_two_support_time',
            [
                'label' => esc_html__('Support Time', 'drivco-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('N:B:Customer support always open at 9 am to 6 pm in everyday', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'drivco_contact_two_form_shortcode_sec',
            [
                'label' => esc_html__('Form Shortcode', 'drivco-core')
            ]
        );
        $this->add_control(
            'drivco_contact_two_form_shortcode',
            [
                'label' => esc_html__('Form Shortcode', 'drivco-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('[contact-form-7 id="34bb41e" title="Contact form 1"]', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $this->end_controls_section();


        // =====================Style =======================//

        //Title

        $this->start_controls_section(
            'drivco_contact_two_section_title',
            [
                'label' => esc_html__('Section Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_contact_two_section_title_typ',
                'selector' => '{{WRAPPER}} .contact-page .section-title h4',

            ]
        );

        $this->add_control(
            'drivco_contact_two_section_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .section-title h4' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_section_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .section-title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_section_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .section-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Title
        $this->start_controls_section(
            'drivco_contact_two_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_contact_two_title_typ',
                'selector' => '{{WRAPPER}} .contact-page .single-contact .title h6',

            ]
        );

        $this->add_control(
            'drivco_contact_two_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .title h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .title h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-contact .title h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        //Content
        $this->start_controls_section(
            'drivco_contact_two_content',
            [
                'label' => esc_html__('Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_contact_two_content_typ',
                'selector' => '{{WRAPPER}} .contact-page .single-contact .content span',

            ]
        );

        $this->add_control(
            'drivco_contact_two_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .content span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-contact .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();



        //Info

        $this->start_controls_section(
            'drivco_contact_two_info',
            [
                'label' => esc_html__('Info', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_contact_two_info_typ',
                'selector' => '{{WRAPPER}} .contact-page .single-contact .content h6 a',

            ]
        );

        $this->add_control(
            'drivco_contact_two_info_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_info_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_info_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-contact .content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        //Support Time

        $this->start_controls_section(
            'drivco_contact_two_support_time_sec',
            [
                'label' => esc_html__('Support Time ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_contact_two_support_time_typ',
                'selector' => '{{WRAPPER}} .contact-page .service-available ',

            ]
        );

        $this->add_control(
            'drivco_contact_two_support_time_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .service-available ' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_support_time_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .service-available ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_two_support_time_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .service-available ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_contact_two_area_list'];

?>
        <div class="contact-page ">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-5">
                        <div class="section-title mb-50">
                            <?php if (!empty($settings['drivco_contact_two_area_section_title'])) :   ?>
                                <h4><?php echo wp_kses($settings['drivco_contact_two_area_section_title'], wp_kses_allowed_html('post'))  ?></h4>
                            <?php endif ?>
                        </div>
                        <?php foreach ($data as $item) : ?>
                            <div class="single-contact">
                                <div class="title">
                                    <?php if (!empty($item['drivco_contact_two_title'])) :   ?>
                                        <h6><?php echo esc_html($item['drivco_contact_two_title']) ?></h6>
                                    <?php endif ?>
                                </div>
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['drivco_contact_two_icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                                <div class="content">
                                    <?php if (!empty($item['drivco_contact_two_content'])) :   ?>
                                        <span><?php echo esc_html($item['drivco_contact_two_content']) ?></span>
                                    <?php endif ?>
                                    <?php if (!empty($item['drivco_contact_two_info'])) :   ?>
                                        <h6><a href="<?php echo wp_kses($item['drivco_contact_two_info_link'], wp_kses_allowed_html('post'))  ?>"><?php echo esc_html($item['drivco_contact_two_info']) ?></a></h6>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <div class="service-available">
                            <?php if (!empty($settings['drivco_contact_two_support_time'])) :   ?>
                                <p><?php echo wp_kses($settings['drivco_contact_two_support_time'], wp_kses_allowed_html('post'))  ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="inquiry-form">
                            <?php echo do_shortcode($settings['drivco_contact_two_form_shortcode'])  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Contact_Two_Widget());
