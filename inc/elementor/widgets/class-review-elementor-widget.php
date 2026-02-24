<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class drivco_Review_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_review';
    }

    public function get_title()
    {
        return esc_html__('EG Review ', 'drivco-core');
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

        //=====================Content_One_style_one=======================//

        $this->start_controls_section(
            'drivco__review_one_style',
            [
                'label' => esc_html__('Review Section', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_testimonial_one_review_title_selection',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $repeater->add_control(
            'drivco_review_one_title',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Excellent!', 'drivco-core'),
                'placeholder' => esc_html__('Type your Titlte here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_review_section',
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


        $repeater->add_control(
            'drivco_review_one_review_star',
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

        $repeater->add_control(
            'drivco_review_one_review_logo',
            [
                'label' => esc_html__('Choose logo ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'drivco_review_one_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Based On 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'review_link_drivco_el',
            [
                'label' => esc_html__('Review URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_review_one_review_section_list',
            [
                'label' => esc_html__('Review List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_review_one_review_count' => esc_html__('Based On 2348 Reviews', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_review_one_review_count  }}}',
            ]
        );


        $this->end_controls_section();




        // =====================Style Start=======================//

        //Review Title

        $this->start_controls_section(
            'drivco_review_one_review_title_style_sec',
            [
                'label' => esc_html__('Review Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_one_review_title_text_typ',
                'selector' => '{{WRAPPER}} .customar-feedback-area .customer-feedback-left .google h5 ',


            ]
        );

        $this->add_control(
            'drivco_review_one_review_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-left .google h5' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_one_review_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-left .google h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_one_review_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-left .google h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Review Count
        $this->start_controls_section(
            'drivco_review_one_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_review_one_review_count_typ',
                'selector' => '{{WRAPPER}} .customar-feedback-area .customer-feedback-left  span',


            ]
        );

        $this->add_control(
            'drivco_review_one_review_count_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-left  span' => 'color: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'drivco_review_one_review_count_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-left  span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_review_one_review_count_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .customar-feedback-area .customer-feedback-left  span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_review_one_review_section_list'];

?>

        <div class="customar-feedback-area ">
            <div class="customer-feedback-left">
                <?php foreach ($data as $item) : ?>
                    <?php
                    if (!empty($item['review_link_drivco_el']['url'])) {
                        $this->add_link_attributes('review_link_drivco_el', $item['review_link_drivco_el']);
                    }
                    ?>
                    <a <?php echo $this->get_render_attribute_string('review_link_drivco_el'); ?> class="google">
                        <?php if ('yes' == $item['drivco_testimonial_one_review_title_selection']) { ?>
                            <h5><?php echo esc_html($item['drivco_review_one_title']) ?></h5>
                        <?php } ?>
                        <?php if (!empty($item['drivco_review_one_review_logo']['url'])) :   ?>
                            <img src="<?php echo esc_url($item['drivco_review_one_review_logo']['url']) ?>" alt="<?php echo esc_attr('Review Logo', 'drivco-core') ?>">
                        <?php endif ?>
                        <div class="star">
                            <?php if ('general' == $item['drivco_review_section']) { ?>
                                <ul>
                                    <?php $rank_counter = intval($item['drivco_review_one_review_star']);
                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?php if ($i <= $rank_counter) : ?>
                                            <li><i class="bi bi-star-fill"></i></li>
                                        <?php endif ?>
                                    <?php endfor; ?>
                                </ul>
                            <?php } ?>

                            <?php if ('trustpilot' == $item['drivco_review_section']) { ?>
                                <ul class="trustpilot">
                                    <?php $rank_counter = intval($item['drivco_review_one_review_star']);
                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?php if ($i <= $rank_counter) : ?>
                                            <li><i class="bi bi-star-fill"></i></li>
                                        <?php endif ?>
                                    <?php endfor; ?>
                                </ul>
                            <?php } ?>
                        </div>
                        <?php if (!empty($item['drivco_review_one_review_count'])) :   ?>
                            <span><?php echo wp_kses($item['drivco_review_one_review_count'], wp_kses_allowed_html('post'))  ?></span>
                        <?php endif ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new drivco_Review_Widget());
