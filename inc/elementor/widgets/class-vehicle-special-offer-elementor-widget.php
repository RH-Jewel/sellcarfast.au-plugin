<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core;
use Egns_Core\Egns_Helper;
use Elementor\core\Schemes;

class Drivco_Special_Offer_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'Drivco_Special_Offer_Widget_';
    }

    public function get_title()
    {
        return esc_html__('EG Vehicle Special Offer', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-product-images';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================Vehicle Brand Widget =======================//


        $this->start_controls_section(
            'drivco_vehicle_product_slider_content_section',
            [
                'label' => esc_html__('General', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'drivco_vehicle_product_slider',
            [
                'label'             => esc_html__('Select Products', 'drivco-core'),
                'type'              => \Elementor\Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => Egns_Core\Egns_Helper::get_post_list_by_post_type('vehicle'),
                'default'           => Egns_Core\Egns_Helper::get_all_post_key('vehicle'),
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_order',
            [
                'label'   => esc_html__('Order', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'drivco-core'),
                    'desc' => esc_html__('Descending', 'drivco-core')
                ],
                'default' => 'desc',
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_order_by',
            [
                'label'   => esc_html__('Order By', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'drivco-core'),
                    'author'     => esc_html__('Post Author', 'drivco-core'),
                    'title'      => esc_html__('Title', 'drivco-core'),
                    'post_date'  => esc_html__('Date', 'drivco-core'),
                    'rand'       => esc_html__('Random', 'drivco-core'),
                    'menu_order' => esc_html__('Menu Order', 'drivco-core'),
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'drivco-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->end_controls_section();


        //product button 
        $this->start_controls_section(
            'drivco_vehicle_product_slider_price_button_area',
            [
                'label' => esc_html__('Button', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_slider_price_button_text',
            [
                'label' => esc_html__('Button Text', 'drivco-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Explore More', 'drivco-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();

        //Location
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_location_sec',
            [
                'label' => esc_html__('Location', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_location_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .location a',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_location_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_location_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_location_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_location_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .location a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Car Model
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_car_model_sec',
            [
                'label' => esc_html__('Product Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_car_model_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content h6 a ',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_car_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_car_model_color_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_car_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_car_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Features 
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_features_sec',
            [
                'label' => esc_html__('Features', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_features_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .features li',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_features_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_features_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_features_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .features li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Price Button 
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_button_text_sec',
            [
                'label' => esc_html__('Explore Button ', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'drivco_vehicle_product_four_slider_button_tabs'
        );

        $this->start_controls_tab(
            'drivco_vehicle_product_four_slider_button_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'drivco-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_button_text_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_button_text_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_button_text_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_button_text_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'drivco_vehicle_product_four_slider_button_tab',
            [
                'label' => esc_html__('Hover', 'drivco-core'),
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_button_color_hover',
            [
                'label'     => esc_html__('Text Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_button_bac_color_hover',
            [
                'label'     => esc_html__('Background Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .primary-btn3:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Price
        $this->start_controls_section(
            'drivco_vehicle_product_four_slider_price_sec',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_product_four_slider_price_typ',
                'selector' => '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6',

            ]
        );

        $this->add_control(
            'drivco_vehicle_product_four_slider_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_vehicle_product_four_slider_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card4 .product-content .button-and-price .price-area h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $args = array(
            'post_type'      => 'vehicle',
            'posts_per_page' => $settings['drivco_vehicle_product_slider_posts_per_page'],
            'orderby'        => $settings['drivco_vehicle_product_slider_order_by'],
            'order'          => $settings['drivco_vehicle_product_slider_order'],
            'post__in'       => $settings['drivco_vehicle_product_slider'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );


        $query = new \WP_Query($args);

?>
        <div class="home3-latest-car-section">
            <div class="row g-4">
                <?php
                while ($query->have_posts()) :
                    $query->the_post();
                ?>
                    <div class="col-lg-4">
                        <div class="product-card4">
                            <div class="product-img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('egns-thumb-cart') ?>
                                <?php endif; ?>
                                <?php $id = uniqid();
                                if (!empty(Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_exterior_gallery'))) : ?>
                                    <div id="<?php echo $id ?>" class="hidden">
                                        <?php
                                        $i = 0;
                                        foreach ((array) Egns_Core\Egns_Helper::egns_vehicle_gallery('vehicle_exterior_gallery') as $data) :
                                        ?>
                                            <a href="<?php echo wp_get_attachment_url($data)  ?>"></a>
                                        <?php
                                            $i++;
                                        endforeach
                                        ?>
                                    </div>

                                    <div class="number-of-img">
                                        <a href="#<?php echo $id ?>" class="btn-gallery"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/gallery-icon-1.svg' ?>" alt="<?php echo esc_attr__('gallery-icon', 'drivco-core') ?>"><?php echo $i ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="product-content">
                                <div class="location">
                                    <?php echo Egns_Core\Egns_Helper::term_with_link('bi bi-geo-alt', 'location') ?>
                                </div>
                                <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                <ul class="features">
                                    <li>
                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/milage_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_milage_info_value') ?>
                                    </li>
                                    <li>
                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/info_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?>
                                    </li>
                                    <li>
                                        <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/engine_icon.svg' ?>" alt="<?php echo esc_attr('features-img', 'drivco-core') ?>" />
                                        <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?>
                                    </li>
                                </ul>
                                <div class="button-and-price">
                                    <?php if (!empty($settings['drivco_vehicle_product_slider_price_button_text'])) : ?>
                                        <a class="primary-btn3" href="<?php the_permalink() ?>"> <?php echo $settings['drivco_vehicle_product_slider_price_button_text'] ?></a>
                                    <?php endif; ?>
                                    <div class="price-area">
                                        <span><?php echo esc_html('Great Price') ?></span>
                                        <h6>
                                            <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Special_Offer_Widget());
