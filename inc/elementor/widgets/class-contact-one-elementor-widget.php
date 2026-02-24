<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Contact_One_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_contact_one';
    }

    public function get_title()
    {
        return esc_html__('EG Contact One', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-google-maps';
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
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_contact_one_area_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Dhaka, Bangladesh', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'drivco_contact_one_button_text',
            [
                'label' => esc_html__('View Map Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('View Map', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'drivco_contact_one_button_url',
            [
                'label' => esc_html__('Map URL', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_contact_one_map_icon',
            [
                'label' => esc_html__(' Map icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'drivco_contact_one_num_one',
            [
                'label' => esc_html__('Contact Num One', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('+880 566 1111 985', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'drivco_contact_one_num_two',
            [
                'label' => esc_html__('Contact Num Two', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('+880 657 1111 576', 'drivco-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'drivco_contact_one_contact_icon',
            [
                'label' => esc_html__('Contact Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-phone-volume',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'drivco_contact_one_address',
            [
                'label' => esc_html__('Address', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Canada City, Office-02, Road-11, House-3B/B, Section-H', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'drivco_contact_one_address_icon',
            [
                'label' => esc_html__(' Address Icon', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-search-location',
                    'library' => 'solid',
                ],
            ]
        );


        $this->add_control(
            'drivco_contact_one_area_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_contact_one_area_title' => esc_html__('Dhaka, Bangladesh', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_contact_one_area_title }}}',
            ]
        );
        $this->end_controls_section();



        // =====================Style =======================//

        //Title

        $this->start_controls_section(
            'drivco_contact_one_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_contact_one_title_typ',
                'selector' => '{{WRAPPER}} .contact-page .single-location .title-and-view-btn h5',

            ]
        );

        $this->add_control(
            'drivco_contact_one_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-location .title-and-view-btn h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_one_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-location .title-and-view-btn h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_one_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-location .title-and-view-btn h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Map Text

        $this->start_controls_section(
            'drivco_contact_one_map_text',
            [
                'label' => esc_html__('Map Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_contact_one_map_text_typ',
                'selector' => '{{WRAPPER}} .contact-page .single-location .title-and-view-btn a',

            ]
        );

        $this->add_control(
            'drivco_contact_one_map_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-location .title-and-view-btn a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_one_map_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-location .title-and-view-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_one_map_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-location .title-and-view-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Contact One Info

        $this->start_controls_section(
            'drivco_contact_one_info',
            [
                'label' => esc_html__('Info', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_contact_one_info_typ',
                'selector' => '{{WRAPPER}} .contact-page .single-location ul li .info a',

            ]
        );

        $this->add_control(
            'drivco_contact_one_info_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-location ul li .info a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_one_info_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-location ul li .info a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_contact_one_info_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-location ul li .info a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_contact_one_area_list'];

?>
        <div class="contact-page">
            <div class="container">
                <div class="row g-4 justify-content-center ">
                    <?php foreach ($data as $item) : ?>
                        <div class="col-lg-4">
                            <div class="single-location">
                                <div class="title-and-view-btn">
                                    <?php if (!empty($item['drivco_contact_one_area_title'])) :   ?>
                                        <h5><?php echo wp_kses($item['drivco_contact_one_area_title'], wp_kses_allowed_html('post'))  ?></h5>
                                    <?php endif ?>
                                    <?php if (!empty($item['drivco_contact_one_button_text'])) :   ?>
                                        <a href="<?php echo esc_url($item['drivco_contact_one_button_url']['url']) ?>"><?php echo wp_kses($item['drivco_contact_one_button_text'], wp_kses_allowed_html('post'))  ?>
                                            <?php \Elementor\Icons_Manager::render_icon($item['drivco_contact_one_map_icon'], ['aria-hidden' => 'true']); ?>
                                        </a>
                                    <?php endif ?>
                                </div>
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($item['drivco_contact_one_contact_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                        <div class="info">
                                            <a href="tel:<?php echo esc_html($item['drivco_contact_one_num_one']) ?>"><?php echo wp_kses($item['drivco_contact_one_num_one'], wp_kses_allowed_html('post'))  ?></a>
                                            <a href="tel:<?php echo esc_html($item['drivco_contact_one_num_two']) ?>"><?php echo wp_kses($item['drivco_contact_one_num_two'], wp_kses_allowed_html('post'))  ?></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <?php if (!empty($item['drivco_contact_one_address_icon'])) :   ?>
                                                <?php \Elementor\Icons_Manager::render_icon($item['drivco_contact_one_address_icon'], ['aria-hidden' => 'true']); ?>
                                            <?php endif ?>
                                        </div>
                                        <div class="info">
                                            <?php if (!empty($item['drivco_contact_one_address'])) :   ?>
                                                <a><?php echo wp_kses($item['drivco_contact_one_address'], wp_kses_allowed_html('post'))  ?></a>
                                            <?php endif ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Contact_One_Widget());
