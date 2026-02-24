<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Why_Drivco_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_why_drivco';
    }

    public function get_title()
    {
        return esc_html__('EG Why Drivco', 'drivco-core');
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
            'drivco_partners_area',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_why_drivco_area_section_title',
            [
                'label' => esc_html__(' Section Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Why Drivco?', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_why_drivco_area_subtitle',
            [
                'label' => esc_html__(' Sub Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('To get the most accurate and up-to-date information.', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_why_drivco_image',
            [
                'label' => esc_html__(' Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        //Feature Content
        $this->start_controls_section(
            'drivco_why_drivco_feature_content_style',
            [
                'label' => esc_html__('Feature Content', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_why_drivco_logo',
            [
                'label' => esc_html__(' Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-award',
                    'library' => 'solid',
                ],

            ]
        );

        $repeater->add_control(
            'drivco_why_drivco_area_title',
            [
                'label' => esc_html__('  Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Safe Purchase', 'drivco-core'),
                'placeholder' => esc_html__('Type your  title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_why_drivco_area_content',
            [
                'label' => esc_html__('  Content', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Safe purchase products are typically known for their high quality and reliability.', 'drivco-core'),
                'placeholder' => esc_html__('Type your content here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_why_drivco_area_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_why_drivco_area_title' => esc_html__('Safe Purchase', 'drivco-core'),
                    ],
                ],
                'title_field' => '{{{ drivco_why_drivco_area_title }}}',
            ]
        );
        $this->end_controls_section();



        // =====================Style One=======================//

        //Section Title
        $this->start_controls_section(
            'drivco_why_drivco_section_title_sec',
            [
                'label' => esc_html__(' Section Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_why_drivco_section_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_why_drivco_section_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_why_drivco_section_title_margin',
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
            'drivco_why_drivco_section_title_padding',
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

        //Sub Title
        $this->start_controls_section(
            'drivco_why_drivco_subtitle_sec',
            [
                'label' => esc_html__(' Section Sub Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_why_drivco_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_why_drivco_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_why_drivco_subtitle_margin',
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
            'drivco_why_drivco_subtitle_padding',
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

        //Title
        $this->start_controls_section(
            'drivco_why_drivco_title_sec',
            [
                'label' => esc_html__('  Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_why_drivco_title_typ',
                'selector' => '{{WRAPPER}} .home5-why-drivco-area .drivco-content ul .single-feature .feature-content h5',

            ]
        );

        $this->add_control(
            'drivco_why_drivco_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-content ul .single-feature .feature-content h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_why_drivco_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-content ul .single-feature .feature-content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_why_drivco_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-content ul .single-feature .feature-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Content
        $this->start_controls_section(
            'drivco_why_drivco_content_sec',
            [
                'label' => esc_html__(' Content', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_why_drivco_content_typ',
                'selector' => '{{WRAPPER}} .home5-why-drivco-area .drivco-content ul .single-feature .feature-content p',

            ]
        );

        $this->add_control(
            'drivco_why_drivco_content_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-content ul .single-feature .feature-content p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_why_drivco_content_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-content ul .single-feature .feature-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_why_drivco_content_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-content ul .single-feature .feature-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Image

        $this->start_controls_section(
            'drivco_why_drivco_image_sec',
            [
                'label' => esc_html__('Image', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Add Height Control
        $this->add_control(
            'total_car_icon_height',
            [
                'label' => esc_html__('Height', 'drivco-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500, // Set the maximum height value
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200, // Set the default height value
                ],
                'selectors' => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-img img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Add Width Control
        $this->add_control(
            'total_car_icon_width',
            [
                'label' => esc_html__('Width', 'drivco-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500, // Set the maximum width value
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200, // Set the default width value
                ],
                'selectors' => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_why_drivco_image_border_radius',
            [
                'label'      => __('Border Radius', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home5-why-drivco-area .drivco-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_why_drivco_area_list'];
?>



        <div class="home5-why-drivco-area">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="drivco-content">
                        <div class="section-title-2 mb-60">
                            <?php if (!empty($settings['drivco_why_drivco_area_section_title'])) :   ?>
                                <h2><?php echo esc_html($settings['drivco_why_drivco_area_section_title']) ?></h2>
                            <?php endif ?>
                            <?php if (!empty($settings['drivco_why_drivco_area_subtitle'])) :   ?>
                                <p><?php echo esc_html($settings['drivco_why_drivco_area_subtitle']) ?></p>
                            <?php endif ?>
                        </div>
                        <div class="drivco-featute">
                            <ul>
                                <?php foreach ($data as $item) : ?>
                                    <li class="single-feature">
                                        <div class="feature-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($item['drivco_why_drivco_logo'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                        <div class="feature-content">
                                            <?php if (!empty($item['drivco_why_drivco_area_title'])) :   ?>
                                                <h5><?php echo esc_html($item['drivco_why_drivco_area_title']) ?></h5>
                                            <?php endif ?>
                                            <?php if (!empty($item['drivco_why_drivco_area_content'])) :   ?>
                                                <p><?php echo esc_html($item['drivco_why_drivco_area_content']) ?></p>
                                            <?php endif ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
                    <div class="drivco-img">
                        <?php if (!empty($settings['drivco_why_drivco_image']['url'])) :   ?>
                            <img src="<?php echo esc_url($settings['drivco_why_drivco_image']['url']) ?>" alt="<?php echo esc_attr('Why Drivco Image', 'drivco-core') ?>">
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Why_Drivco_Widget());
