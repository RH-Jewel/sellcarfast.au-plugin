<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Quick_Link_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_quick_link';
    }

    public function get_title()
    {
        return esc_html__('EG Quick Link', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-link';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//
        $this->start_controls_section(
            'drivco_quick_link_area',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_quick_link_area_text',
            [
                'label' => esc_html__('Quick Link Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Browse Used a Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_quick_link_area_link',
            [
                'label' => esc_html__('URL Link', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'drivco-core'),
            ]
        );

        $repeater->add_control(
            'drivco_quick_link_area_icon',
            [
                'label' => esc_html__(' Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-user-cog',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'drivco_quick_link_area_list',
            [
                'label' => esc_html__('Quick Link List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_quick_link_area_text' => esc_html__('Browse Used a Car', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_quick_link_area_text }}}',
            ]
        );
        $this->end_controls_section();



        // =====================Style One=======================//

        // Icon or svg

        $this->start_controls_section(
            'drivco_quick_link_style_icon',
            [
                'label' => esc_html__('Icon', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
      
        $this->add_responsive_control(
            'drivco_quick_link_icon_svg_size',
            [
                'label' => esc_html__('Icon Size', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',

                ],
                'selectors' => [
                    '{{WRAPPER}} .quick-link-area ul li a svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .quick-link-area ul li a  i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
      
        $this->end_controls_section();

        //Text

        $this->start_controls_section(
            'drivco_quick_link_text',
            [
                'label' => esc_html__('Link Text', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_quick_link__text_typ',
                'selector' => '{{WRAPPER}} .quick-link-area ul li a',

            ]
        );

        $this->add_control(
            'drivco_quick_link__text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quick-link-area ul li a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_quick_link__text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quick-link-area ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_quick_link__text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quick-link-area ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_quick_link_area_list'];
?>
        <div class="quick-link-area">
            <ul>
                <?php foreach ($data as $item) : ?>
                    <li>
                        <a href="<?php echo esc_url($item['drivco_quick_link_area_link']['url']) ?>">
                            <?php \Elementor\Icons_Manager::render_icon($item['drivco_quick_link_area_icon'], ['aria-hidden' => 'true']); ?>
                            <?php echo esc_html($item['drivco_quick_link_area_text']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Quick_Link_Widget());
