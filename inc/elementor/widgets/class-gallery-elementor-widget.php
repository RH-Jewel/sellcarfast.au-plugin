<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Gallery_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_gallery';
    }

    public function get_title()
    {
        return esc_html__('EG Gallery', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_gallery_area',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_gallery_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Drivco Gallery', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'drivco_gallery_slide_content',
            [
                'label' => esc_html__('Gallery', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_gallery_slide_image',
            [
                'label' => esc_html__('Choose Image', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_gallery_slide_number',
            [
                'label' => esc_html__('Show Image Gallery', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 100,
                'step' => 1,
                'default' => 9,
            ]
        );

        $this->end_controls_section();



        // =====================Style=======================//


        $this->start_controls_section(
            'drivco_gallery_title_sec',
            [
                'label' => esc_html__(' Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_gallery_title_typ',
                'selector' => '{{WRAPPER}} .section-title1 h2',

            ]
        );

        $this->add_control(
            'drivco_gallery_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_gallery_title_margin',
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
            'drivco_gallery_title_padding',
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
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <script>
            // FancyBox Js
            $('[data-fancybox]').fancybox({
                // Options will go here
                buttons: [
                    'close'
                ],
                wheel: false,
                transitionEffect: "slide",
                // thumbs          : false,
                // hash            : false,
                loop: true,
                // keyboard        : true,
                toolbar: false,
                // animationEffect : false,
                // arrows          : true,
                clickContent: false
            });
        </script>

        <div class="drivco-gallery">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="section-title1 text-center">
                            <h2><?php echo wp_kses($settings['drivco_gallery_title'], wp_kses_allowed_html('post'))  ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <?php $count = 0; ?>
                    <?php foreach ($settings['drivco_gallery_slide_image'] as $key => $item) : ?>
                        <?php if (!empty($item['url']) && $count < $settings['drivco_gallery_slide_number']) :   ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="gallery-item">
                                    <img class="img-fluid" src="<?php echo esc_url($item['url']) ?>" alt="gallery">
                                    <a href="<?php echo esc_url($item['url']) ?>" data-fancybox="gallery" class="gallary-item-overlay"></a>
                                </div>
                            </div>
                            <?php $count++; ?>
                        <?php endif ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Gallery_Widget());
