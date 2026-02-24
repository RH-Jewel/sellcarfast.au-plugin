<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Egns_Core;
use Egns_Core\Egns_Helper;
use Elementor\core\Schemes;

class Drivco_Vehicle_Brand_Grid_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_vehicle_brand_grid';
    }

    public function get_title()
    {
        return esc_html__('EG Vehicle Brand Grid', 'drivco-core');
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

        //grneral section
        $this->start_controls_section(
            'drivco_vehicle_brand_grid_general',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_general_brand',
            [
                'label' => __('Product Brand', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' =>  Egns_Core\Egns_Helper::get_all_brand(),
                'default' =>  Egns_Core\Egns_Helper::get_all_brand_key(),
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_order',
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
            'drivco_vehicle_brand_grid_general_order_by',
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
            'drivco_vehicle_brand_grid_general_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'drivco-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'drivco_vehicle_brand_grid_heading',
            [
                'label' => esc_html__('Heading', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_heading_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Browse Used Car', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_heading_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('There has 30+ Category Available', 'drivco-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        //style_start

        //heading_title
        $this->start_controls_section(
            'drivco_vehicle_brand_grid_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_brand_grid_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_brand_grid_title_margin',
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
            'drivco_vehicle_brand_grid_title_padding',
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

        //heading_subtitle_style_two
        $this->start_controls_section(
            'drivco_vehicle_brand_grid_subtitle',
            [
                'label' => esc_html__('Subtitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_brand_grid_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_brand_grid_subtitle_margin',
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
            'drivco_vehicle_brand_grid_subtitle_padding',
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


        //tab_text

        $this->start_controls_section(
            'drivco_vehicle_brand_grid_cat_tab',
            [
                'label' => esc_html__('Product Tab Menu', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_brand_grid_cat_tab_typ',
                'selector' => '{{WRAPPER}} .browse-used-car-section .browse-car-filter-area ul li button',
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_cat_tab_color',
            [
                'label'     => esc_html__('Active Tab Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .browse-used-car-section .browse-car-filter-area ul li button.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_cat_tab_active_bg_color',
            [
                'label'     => esc_html__(' Active Tab Bac Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .browse-used-car-section .browse-car-filter-area ul li button.active' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();


        //price

        $this->start_controls_section(
            'drivco_vehicle_brand_grid_price',
            [
                'label' => esc_html__('Price', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_brand_grid_price_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-content .price strong',
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_price_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content .price strong' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_brand_grid_price_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content .price strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_brand_grid_price_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card2 .product-content .price strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //car model

        $this->start_controls_section(
            'drivco_vehicle_brand_grid_model',
            [
                'label' => esc_html__('Model', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_vehicle_brand_grid_model_typ',
                'selector' => '{{WRAPPER}} .product-card2 .product-content h6 a',
            ]
        );
        $this->add_control(
            'drivco_vehicle_brand_grid_model_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drivco_vehicle_brand_grid_model_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_brand_grid_model_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_vehicle_brand_grid_model_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-card2 .product-content h6 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //image


        $this->start_controls_section(
            'drivco_vehicle_brand_grid_model_image',
            [
                'label' => esc_html__('Image', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );


        $this->add_control(
            'image_control_style_brand_grid',
            [
                'label' => esc_html__('Width', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .product-card2 .product-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $selected_brand_ids = $settings['drivco_vehicle_brand_grid_general_brand'];

        $brand_args = [];
        $brand_args['taxonomy'] = 'vehicle-brand';
        $brand_args['count']  = true;
        if (!empty($selected_brand_ids) && count($selected_brand_ids) > 0) {
            $brand_args['slug']  = $selected_brand_ids;
        } else {
            $brand_args['number']  = 6;
        }
        $terms = get_terms($brand_args);

        $args = array(
            'post_type'      => 'vehicle',
            'posts_per_page' => $settings['drivco_vehicle_brand_grid_general_post_per_page'],
            'orderby'        => $settings['drivco_vehicle_brand_grid_general_order_by'],
            'order'          => $settings['drivco_vehicle_brand_grid_order'],
            'offset'         => 0,
            'post_status'    => 'publish',
        );

        // Add the brand filter if any brand are selected
        if (!empty($selected_brand_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'vehicle-brand',
                    'field' => 'term_id',
                    'terms' => $selected_brand_ids,
                    'operator' => 'IN',
                )
            );
        }
?>

        <div class="browse-used-car-section mb-100">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="section-title-2 text-center">
                            <?php if (!empty($settings['drivco_vehicle_brand_grid_heading_title'])) : ?>
                                <h2><?php echo esc_html($settings['drivco_vehicle_brand_grid_heading_title']) ?> </h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['drivco_vehicle_brand_grid_heading_subtitle'])) : ?>
                                <p><?php echo esc_html($settings['drivco_vehicle_brand_grid_heading_subtitle']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-car-filter-area">
                            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tab-all" data-bs-toggle="tab" data-bs-target="#car-all" type="button" role="tab" aria-controls="car-all" aria-selected="false"><?php echo esc_html('All') ?></button>
                                </li>
                                <?php foreach ((array) $terms as $term) :
                                    $term_id = $term->term_id;
                                    $term_name = $term->name;
                                ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab<?php echo $term_id ?>" data-bs-toggle="tab" data-bs-target="#car<?php echo $term_id ?>" type="button" role="tab" aria-controls="car<?php echo  $term_id ?>" aria-selected="true"><?php echo $term_name ?? '' ?></button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content" id="myTab3Content">
                            <?php
                            foreach ($terms as $term) :
                                $term_id = $term->term_id;
                            ?>

                                <div class="tab-pane fade" id="car<?php echo  $term_id ?>" role="tabpanel" aria-labelledby="tab<?php echo $term_id ?>">
                                    <div class="row justify-content-center g-4">
                                        <?php
                                        $args['tax_query'] = array(
                                            array(
                                                'taxonomy' => 'vehicle-brand',
                                                'field' => 'term_id',
                                                'terms' => $term_id,
                                                'operator' => 'IN',
                                            )
                                        );

                                        $query = new \WP_Query($args);

                                        while ($query->have_posts()) :
                                            $query->the_post();

                                        ?>
                                            <div class="col-xl-3 col-md-4 col-sm-6">
                                                <div class="product-card2 two">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <div class="product-img">
                                                            <?php the_post_thumbnail('egns-thumb-cart') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="product-content">
                                                        <div class="company-logo">
                                                            <a href="<?php echo Egns_Core\Egns_Helper::get_any_term_link('vehicle-brand') ?>"><img src="<?php echo Egns_Core\Egns_Helper::egns_vehicle_brand_taxonomy('drivco_brand_logo', 'url') ?>" alt="<?php echo esc_attr__('brand-icon', 'drivco-core') ?>"></a>
                                                        </div>
                                                        <div class="price">
                                                            <strong>
                                                                <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                            </strong>
                                                        </div>
                                                        <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php

                                        endwhile;
                                        wp_reset_postdata();

                                        ?>
                                    </div>
                                </div>
                            <?php

                            endforeach;
                            ?>

                            <div class="tab-pane fade active show" id="car-all" role="tabpanel" aria-labelledby="tab-all">
                                <div class="row justify-content-center g-4">
                                    <?php
                                    $args_all_posts = array(
                                        'post_type'      => 'vehicle',
                                        'posts_per_page' => $settings['drivco_vehicle_brand_grid_general_post_per_page'],
                                        'orderby'        => $settings['drivco_vehicle_brand_grid_general_order_by'],
                                        'order'          => $settings['drivco_vehicle_brand_grid_order'],
                                        'post_status'    => 'publish',
                                    );

                                    $query_all_posts = new \WP_Query($args_all_posts);

                                    while ($query_all_posts->have_posts()) :
                                        $query_all_posts->the_post();
                                    ?>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <div class="product-card2 two">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="product-img">
                                                        <?php the_post_thumbnail('egns-thumb-cart') ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="product-content">
                                                    <div class="company-logo">
                                                        <a href="<?php echo Egns_Core\Egns_Helper::get_any_term_link('vehicle-brand') ?>"><img src="<?php echo Egns_Core\Egns_Helper::egns_vehicle_brand_taxonomy('drivco_brand_logo', 'url') ?>" alt="<?php echo esc_attr__('brand-icon', 'drivco-core') ?>"></a>
                                                    </div>
                                                    <div class="price">
                                                        <strong>
                                                            <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                                        </strong>
                                                    </div>
                                                    <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Vehicle_Brand_Grid_Widget());
