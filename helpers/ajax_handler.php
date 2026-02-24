<?php

add_action("wp_ajax__get_compare_vehicle_data", "get_compare_vehicle_data");
add_action("wp_ajax_nopriv__get_compare_vehicle_data", "get_compare_vehicle_data");

function get_compare_vehicle_data()
{
    ob_start();
    $vehicle_ids = !empty($_GET['vehicle_ids']) ? sanitize_text_field($_GET['vehicle_ids']) : '';
    $single_id = explode('_', $vehicle_ids);
?>
    <div class="modal-header">
        <h5 class="modal-title" id="compareModal01Label">Comparision</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="compare-top">

                    <?php
                    global $query;
                    $args = array(
                        'post_type'      => 'vehicle',
                        'post__in'      => array($single_id[0]),
                    );
                    $query = new \WP_Query($args);

                    while ($query->have_posts()) :
                        $query->the_post();

                        $term = get_the_terms(get_the_ID(), 'vehicle-brand');
                    ?>
                        <div class="single-car">
                            <div class="car-img">
                                <?php the_post_thumbnail('egns-thumb-cart') ?>
                            </div>
                            <div class="content text-center">
                                <h6 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                <h6 class="price">
                                    <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                </h6>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                    <?php if ($compare_slider['drivco_compare_post_list'] ?? '') : ?>
                        <div class="vs">
                            <span><?php echo esc_html__('VS', 'drivco-core') ?></span>
                        </div>
                    <?php endif; ?>


                    <?php
                    global $query;
                    $args = array(
                        'post_type'      => 'vehicle',
                        'post__in' => array($single_id[1]),
                    );
                    $query = new \WP_Query($args);

                    while ($query->have_posts()) :
                        $query->the_post();

                        $term = get_the_terms(get_the_ID(), 'vehicle-brand');

                    ?>
                        <div class="single-car">
                            <div class="car-img">
                                <?php the_post_thumbnail('egns-thumb-cart') ?>
                            </div>
                            <div class="content text-center">
                                <h6 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                <h6 class="price">
                                    <?php echo Egns_Core\Egns_Helper::get_vehicle_price() ?>
                                </h6>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                </div>

                <div class="table-car">
                    <?php
                    global $query;
                    $args = array(
                        'post_type'      => 'vehicle',
                        'post__in' => array($single_id[0]),
                    );
                    $query = new \WP_Query($args);

                    while ($query->have_posts()) :
                        $query->the_post();

                        $term = get_the_terms(get_the_ID(), 'vehicle-brand');
                        $body_type = get_the_terms(get_the_ID(), 'body-type');

                    ?>
                        <div class="compare-btm">
                            <div class="table-wrapper">
                                <table class="eg-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo $term[0]->name ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Vehicle Type:', 'drivco-core') ?> </strong> <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_condition_info_value') ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Engine Speed:', 'drivco-core') ?></strong> <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Body Type:', 'drivco-core') ?></strong> <?php echo $body_type[0]->name ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Mileage:', 'drivco-core') ?> </strong><?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_milage_info_value') ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Fuel Type:', 'drivco-core') ?></strong> <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?></td>
                                        </tr>
                                        <?php if (!empty(Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_overview_items'))) :
                                            foreach ((array)Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_overview_items') as $key_overview) :
                                        ?>
                                                <tr>
                                                    <td><strong><?php echo $key_overview['vehicle_overview_label'] . ':' ?></strong> <?php echo $key_overview['vehicle_overview_value'] ?></td>
                                                </tr>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        <tr>
                                            <td><a class="primary-btn2" href="<?php the_permalink() ?>"><?php echo esc_html__('View Details', 'drivco-core') ?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>


                    <?php
                    global $query;
                    $args = array(
                        'post_type'      => 'vehicle',
                        'post__in' => array($single_id[1]),
                    );
                    $query = new \WP_Query($args);

                    while ($query->have_posts()) :
                        $query->the_post();

                        $term = get_the_terms(get_the_ID(), 'vehicle-brand');
                        $body_type = get_the_terms(get_the_ID(), 'body-type');

                    ?>
                        <div class="compare-btm">
                            <div class="table-wrapper">
                                <table class="eg-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo $term[0]->name ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Vehicle Type:', 'drivco-core') ?> </strong> <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_condition_info_value') ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Engine Speed:', 'drivco-core') ?></strong> <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_engine_info_value') ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Body Type:', 'drivco-core') ?></strong> <?php echo $body_type[0]->name ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Mileage:', 'drivco-core') ?> </strong><?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_milage_info_value') ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo esc_html__('Fuel Type:', 'drivco-core') ?></strong> <?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_type_info_value') ?></td>
                                        </tr>
                                        <?php if (!empty(Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_overview_items'))) :
                                            foreach ((array)Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_overview_items') as $key_overview) :
                                        ?>
                                                <tr>
                                                    <td><strong><?php echo $key_overview['vehicle_overview_label'] . ':' ?></strong> <?php echo $key_overview['vehicle_overview_value'] ?></td>
                                                </tr>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        <tr>
                                            <td><a class="primary-btn2" href="<?php the_permalink() ?>"><?php echo esc_html__('View Details', 'drivco-core') ?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
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
<?php
    die();
    return ob_get_clean();
}
