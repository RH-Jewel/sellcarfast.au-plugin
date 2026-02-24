<?php

use Egns_Core\Egns_Helper;

global $wp;
// General filter shortcode 
function egns_general_filter_shortcode($args)
{
    // Query for vehicle brand
    $vehicle_brands = Egns_Core\Egns_Helper::get_all_brand();
    $vehicle_brands_with_image = Egns_Core\Egns_Helper::get_all_brand(true);
    // Query for location
    $locations = Egns_Core\Egns_Helper::get_all_location();
    // body Type
    $body_types = Egns_Core\Egns_Helper::get_all_body();
    // Colors
    $colors = Egns_Core\Egns_Helper::get_all_colors();
    // vehicle year
    $vehicle_years = Egns_Core\Egns_Helper::get_all_year();
    // vehicle model
    $vehicle_models = Egns_Core\Egns_Helper::get_all_model();

    $all_vehicle = wp_count_posts('vehicle');
    $is_advance = !empty($args['advance']) ? $args['advance'] : '';
    ob_start();
?>
    <?php if (!empty($args['style']) && $args['style'] == 2) : ?>
        <div class="filter-wrap">
            <form method="get" action="<?php echo get_post_type_archive_link('vehicle'); ?>">
                <div class="form-inner">
                    <select name="vehicle_condition">
                        <option value=""><?php echo esc_html__('Vehicle Condition', 'drivco-core') ?></option>
                        <option value="Brand New"><?php echo esc_html__('Brand New', 'drivco-core') ?></option>
                        <option value="Used Car"><?php echo esc_html__('Used', 'drivco-core') ?></option>
                        <option value="auction_product"><?php echo esc_html__('Auction Car', 'drivco-core') ?></option>
                    </select>
                </div>
                <div class="form-inner">
                    <select name="vehicle_brand">
                        <option value=""><?php echo esc_html__('Select Brand', 'drivco-core') ?></option>
                        <?php
                        if (!empty($vehicle_brands) && !is_wp_error($vehicle_brands)) {
                            foreach ($vehicle_brands as $key => $term) {
                        ?>
                                <option value="<?php echo $key ?>"><?php echo $term ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-inner">
                    <select name="vehicle_model">
                        <option value=""><?php echo esc_html__('Select Model', 'drivco-core') ?></option>
                        <?php
                        if (!empty($vehicle_models) && !is_wp_error($vehicle_models)) {
                            foreach ($vehicle_models as $key => $term) {
                        ?>
                                <option value="<?php echo $key ?>"><?php echo $term ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-inner">
                    <button class="primary-btn3" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <path d="M10.2746 9.04904C11.1219 7.89293 11.5013 6.45956 11.3371 5.0357C11.1729 3.61183 10.4771 2.30246 9.38898 1.36957C8.30083 0.436668 6.90056 -0.050966 5.46831 0.00422091C4.03607 0.0594078 2.67747 0.653346 1.66433 1.66721C0.651194 2.68107 0.0582276 4.04009 0.00406556 5.47238C-0.0500965 6.90466 0.43854 8.30458 1.37222 9.39207C2.30589 10.4795 3.61575 11.1744 5.03974 11.3376C6.46372 11.5008 7.89682 11.1203 9.05232 10.2722H9.05145C9.07769 10.3072 9.10569 10.3405 9.13719 10.3729L12.5058 13.7415C12.6699 13.9057 12.8924 13.9979 13.1245 13.998C13.3566 13.9981 13.5793 13.906 13.7435 13.7419C13.9076 13.5779 13.9999 13.3553 14 13.1232C14.0001 12.8911 13.908 12.6685 13.7439 12.5043L10.3753 9.13566C10.344 9.104 10.3104 9.07562 10.2746 9.04904ZM10.5004 5.68567C10.5004 6.31763 10.3759 6.9434 10.1341 7.52726C9.89223 8.11112 9.53776 8.64162 9.0909 9.08849C8.64403 9.53535 8.11352 9.88983 7.52967 10.1317C6.94581 10.3735 6.32003 10.498 5.68807 10.498C5.05611 10.498 4.43034 10.3735 3.84648 10.1317C3.26262 9.88983 2.73211 9.53535 2.28525 9.08849C1.83838 8.64162 1.48391 8.11112 1.24207 7.52726C1.00023 6.9434 0.875753 6.31763 0.875753 5.68567C0.875753 4.40936 1.38276 3.18533 2.28525 2.28284C3.18773 1.38036 4.41177 0.873346 5.68807 0.873346C6.96438 0.873346 8.18841 1.38036 9.0909 2.28284C9.99338 3.18533 10.5004 4.40936 10.5004 5.68567Z" />
                        </svg>
                        <?php echo esc_html__('Search', 'drivco-core') ?>
                    </button>
                </div>
            </form>
            <?php if ($is_advance !== 'disabled') : ?>
                <div class="advanced-btn">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#adSearchModal01">
                        <?php echo esc_html__('Advanced Filter', 'drivco-core') ?>
                        <svg width="13" height="10" viewBox="0 0 13 10" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.48336 0V8.0272L4.16668 7.36221L4.91394 8.09055L2.95489 10L0.99585 8.09055L1.74311 7.36221L2.42642 8.0272V0H3.48336ZM8.23961 7.72638V8.75657H5.59725V7.72638H8.23961ZM9.82502 5.15092V6.18111H5.59725V5.15092H9.82502ZM11.4104 2.57546V3.60565H5.59725V2.57546H11.4104ZM12.9958 0V1.03018H5.59725V0H12.9958Z"></path>
                        </svg>
                    </button>
                </div>
            <?php endif ?>
        </div>
    <?php elseif (!empty($args['style']) && $args['style'] == 3) : ?>
        <div class="container">
            <form method="get" action="<?php echo get_post_type_archive_link('vehicle'); ?>">
                <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 justify-content-center">
                    <div class="col">
                        <div class="form-inner">
                            <label><?php echo esc_html__('Vehicle Condition*', 'drivco-core') ?></label>
                            <select name="vehicle_condition">
                                <option value=""><?php echo esc_html__('Select Condition', 'drivco-core') ?></option>
                                <option value="<?php echo esc_attr('Brand New', 'drivco-core') ?>"><?php echo esc_html__('Brand New', 'drivco-core') ?></option>
                                <option value="<?php echo esc_attr('Used Car', 'drivco-core') ?>"><?php echo esc_html__('Used Car', 'drivco-core') ?></option>
                                <option value="<?php echo esc_attr('auction_product', 'drivco-core') ?>"><?php echo esc_html__('Auction Car', 'drivco-core') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-inner">
                            <label><?php echo esc_html__('Select Color*', 'drivco-core') ?></label>
                            <select name="color">
                                <option value=""><?php echo esc_html__('Select Color', 'drivco-core') ?></option>
                                <?php if (!empty($colors) && !is_wp_error($colors)) {
                                    foreach ($colors as $key => $term) {
                                ?>
                                        <option value="<?php echo $key ?>"> <?php echo $term ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-inner">
                            <label><?php echo esc_html__('Select Brand*', 'drivco-core') ?></label>
                            <select name="vehicle_brand">
                                <option value=""><?php echo esc_html__('Select Brand', 'drivco-core') ?></option>
                                <?php
                                if (!empty($vehicle_brands) && !is_wp_error($vehicle_brands)) {
                                    foreach ($vehicle_brands as $key => $term) {
                                ?>
                                        <option value="<?php echo $key ?>"><?php echo $term ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-inner">
                            <label><?php echo esc_html__('Select Model*', 'drivco-core') ?></label>
                            <select name="vehicle_model">
                                <option value=""><?php echo esc_html__('Select Model', 'drivco-core') ?></option>
                                <?php
                                if (!empty($vehicle_models) && !is_wp_error($vehicle_models)) {
                                    foreach ($vehicle_models as $key => $term) {
                                ?>
                                        <option value="<?php echo $key ?>"><?php echo $term ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col d-flex align-items-end">
                        <div class="form-inner">
                            <button class="primary-btn3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                    <path d="M10.2746 9.04904C11.1219 7.89293 11.5013 6.45956 11.3371 5.0357C11.1729 3.61183 10.4771 2.30246 9.38898 1.36957C8.30083 0.436668 6.90056 -0.050966 5.46831 0.00422091C4.03607 0.0594078 2.67747 0.653346 1.66433 1.66721C0.651194 2.68107 0.0582276 4.04009 0.00406556 5.47238C-0.0500965 6.90466 0.43854 8.30458 1.37222 9.39207C2.30589 10.4795 3.61575 11.1744 5.03974 11.3376C6.46372 11.5008 7.89682 11.1203 9.05232 10.2722H9.05145C9.07769 10.3072 9.10569 10.3405 9.13719 10.3729L12.5058 13.7415C12.6699 13.9057 12.8924 13.9979 13.1245 13.998C13.3566 13.9981 13.5793 13.906 13.7435 13.7419C13.9076 13.5779 13.9999 13.3553 14 13.1232C14.0001 12.8911 13.908 12.6685 13.7439 12.5043L10.3753 9.13566C10.344 9.104 10.3104 9.07562 10.2746 9.04904ZM10.5004 5.68567C10.5004 6.31763 10.3759 6.9434 10.1341 7.52726C9.89223 8.11112 9.53776 8.64162 9.0909 9.08849C8.64403 9.53535 8.11352 9.88983 7.52967 10.1317C6.94581 10.3735 6.32003 10.498 5.68807 10.498C5.05611 10.498 4.43034 10.3735 3.84648 10.1317C3.26262 9.88983 2.73211 9.53535 2.28525 9.08849C1.83838 8.64162 1.48391 8.11112 1.24207 7.52726C1.00023 6.9434 0.875753 6.31763 0.875753 5.68567C0.875753 4.40936 1.38276 3.18533 2.28525 2.28284C3.18773 1.38036 4.41177 0.873346 5.68807 0.873346C6.96438 0.873346 8.18841 1.38036 9.0909 2.28284C9.99338 3.18533 10.5004 4.40936 10.5004 5.68567Z">
                                    </path>
                                </svg>
                                <?php echo esc_html__('Search', 'drivco-core') ?>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php elseif (!empty($args['style']) && $args['style'] == 4) : ?>
        <form method="get" action="<?php echo get_post_type_archive_link('vehicle'); ?>">
            <div class="row">
                <div class="col-lg-12 mb-15">
                    <div class="form-inner">
                        <div class="d-flex justify-content-between align-items-center">
                            <label><?php !empty($args['label']) ? sprintf('%s', $args['label']) : esc_html__('What kinds of car do you want?*', 'drivco-core') ?></label>
                            <div class="slider-btn d-flex align-items-center gap-3">
                                <div class="prev-10"><i class="bi bi-chevron-left"></i></div>
                                <div class="next-10"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="swiper categoty-filter-slider">
                            <div class="swiper-wrapper">
                                <?php
                                if (!empty($vehicle_brands_with_image) && !is_wp_error($vehicle_brands_with_image)) {
                                    foreach ($vehicle_brands_with_image as $brand) {
                                        $meta = get_term_meta($brand->term_id, 'drivco_brand_taxonomy', true);
                                ?>
                                        <div class="swiper-slide select-wrap">
                                            <div class="single-category">
                                                <div class="check-icon">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/home4/icon/check.svg' ?>" alt="<?php echo esc_attr__('check-icon', 'drivco-core') ?>">
                                                </div>
                                                <div class="icon">
                                                    <label for="<?php echo $brand->slug ?? '' ?>">
                                                        <span><?php echo $brand->name ?></span>
                                                    </label>
                                                    <img src="<?php echo !empty($meta['drivco_brand_thumb']['url']) ? $meta['drivco_brand_thumb']['url'] : '' ?>" alt="<?php echo esc_html__('brand-thumb', 'drivco-core') ?>">
                                                </div>
                                                <input type="radio" name="vehicle_brand" value="<?php echo $brand->term_id ?? '' ?>" id="<?php echo $brand->slug ?? '' ?>">
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-30">
                    <div class="form-inner">
                        <label><?php echo esc_html__('Car Conditions*', 'drivco-core') ?></label>
                        <select class="js-example-basic-single" name="state">
                            <option value=""><?php echo esc_html__('Select Condition', 'drivco-core') ?></option>
                            <option value="<?php echo esc_attr('Brand New', 'drivco-core') ?>"><?php echo esc_html__('Brand New', 'drivco-core') ?></option>
                            <option value="<?php echo esc_attr('Used Car'), 'drivco-core' ?>"><?php echo esc_html__('Used', 'drivco-core') ?></option>
                            <option value="<?php echo esc_attr('auction_product'), 'drivco-core' ?>"><?php echo esc_html__('Auction Car', 'drivco-core') ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-30">
                    <div class="form-inner">
                        <label><?php echo esc_html__('Model*', 'drivco-core') ?></label>
                        <select class="js-example-basic-single" name="state">
                            <option value=""><?php echo esc_html__('Select Model', 'drivco-core') ?></option>
                            <?php
                            if (!empty($vehicle_models) && !is_wp_error($vehicle_models)) {
                                foreach ($vehicle_models as $key => $term) {
                            ?>
                                    <option value="<?php echo $key ?>"><?php echo $term ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 mb-10">
                    <div class="form-inner last">
                        <button class="primary-btn1" type="submit"><?php echo !empty($all_vehicle->publish) ? sprintf(__('SEARCH %d VEHICLES', 'drivco-core'), $all_vehicle->publish) : esc_html__('SEARCH VEHICLES') ?></button>
                    </div>
                </div>
                <!-- <div class="col-lg-12">
                    <div class="advanced-btn">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#adSearchModal01">
                            <?php echo esc_html__('Advanced Filter') ?>
                            <svg width="13" height="10" viewBox="0 0 13 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.48336 0V8.0272L4.16668 7.36221L4.91394 8.09055L2.95489 10L0.99585 8.09055L1.74311 7.36221L2.42642 8.0272V0H3.48336ZM8.23961 7.72638V8.75657H5.59725V7.72638H8.23961ZM9.82502 5.15092V6.18111H5.59725V5.15092H9.82502ZM11.4104 2.57546V3.60565H5.59725V2.57546H11.4104ZM12.9958 0V1.03018H5.59725V0H12.9958Z"></path>
                            </svg>
                        </button>
                    </div>
                </div> -->
            </div>
        </form>
    <?php else : ?>
        <div class="car-filter-area">
            <?php if (!empty($args['title'])) : ?>
                <h4><?php echo $args['title'] ?></h4>
            <?php else : ?>
                <h4><?php echo esc_html__('Find Your Dream Vehicle', 'drivco-core') ?></h4>
            <?php endif ?>
            <form method="get" action="<?php echo get_post_type_archive_link('vehicle'); ?>">
                <div class="filter-menu">
                    <ul class="car-category">
                        <li class="nav-item" role="presentation">
                            <label for="new_card">
                                <img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/car-01.svg' ?>" alt="<?php echo esc_attr__('car1-icon', 'drivco-core') ?>">
                                <span><?php echo esc_html__('Brand New', 'drivco-core') ?></span>
                                <input type="radio" id="new_card" name="vehicle_condition_info_value" value="<?php echo esc_attr('Brand New') ?>" checked>
                            </label>
                        </li>
                        <li class="nav-item" role="presentation">
                            <label for="used_car">
                                <img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/car-01.svg' ?>" alt="<?php echo esc_attr__('car2-icon', 'drivco-core') ?>">
                                <span><?php echo esc_html__('Used Car', 'drivco-core') ?></span>
                                <input type="radio" id="used_car" name="vehicle_condition_info_value" value="<?php echo esc_attr('Used Car') ?>">
                            </label>
                        </li>
                        <li class="nav-item" role="presentation">
                            <label for="auction_product">
                                <img src="<?php echo get_template_directory_uri() . '/assets/img/home1/icon/car-01.svg' ?>" alt="<?php echo esc_attr__('auction-icon', 'drivco-core') ?>">
                                <span><?php echo esc_html__('Auction', 'drivco-core') ?></span>
                                <input type="radio" id="auction_product" value="<?php echo esc_attr('auction_product') ?>" name="vehicle_condition_info_value">
                            </label>
                        </li>
                    </ul>
                    <div class="filter-data">
                        <div class="form-inner budget-range mb-25">
                            <label><?php echo esc_html__('Select Budget*', 'drivco-core') ?></label>
                            <input type="number" name="vehicle_min_price" placeholder="<?php echo esc_attr__('Min Budget', 'drivco-core') ?>" style="border:1px solid #ddd;">
                            <input type="number" name="vehicle_max_price" placeholder="<?php echo esc_attr__('Max Budget', 'drivco-core') ?>" style="border:1px solid #ddd;">
                        </div>
                        <div class="form-inner mb-25">
                            <label><?php echo esc_html__('Select Brand*', 'drivco-core') ?></label>
                            <select name="vehicle_brand" class="select">
                                <option value=""><?php echo esc_html__('Select Brand', 'drivco-core') ?></option>
                                <?php
                                if (!empty($vehicle_brands) && !is_wp_error($vehicle_brands)) {
                                    foreach ($vehicle_brands as $key => $term) {
                                ?>
                                        <option value="<?php echo $key ?>"><?php echo $term ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-inner last">
                            <button class="primary-btn1" type="submit"><?php echo !empty($all_vehicle->publish) ? sprintf(__('SEARCH %d VEHICLES', 'drivco-core'), $all_vehicle->publish) : esc_html__('SEARCH VEHICLES') ?></button>
                        </div>
                        <div class="advanced-btn">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#adSearchModal01">
                                <?php echo esc_html__('Advanced Filter', 'drivco-core') ?>
                                <svg width="13" height="10" viewBox="0 0 13 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.48336 0V8.0272L4.16668 7.36221L4.91394 8.09055L2.95489 10L0.99585 8.09055L1.74311 7.36221L2.42642 8.0272V0H3.48336ZM8.23961 7.72638V8.75657H5.59725V7.72638H8.23961ZM9.82502 5.15092V6.18111H5.59725V5.15092H9.82502ZM11.4104 2.57546V3.60565H5.59725V2.57546H11.4104ZM12.9958 0V1.03018H5.59725V0H12.9958Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php endif ?>
    <?php if ($is_advance !== 'disabled') : ?>
        <!-- Advance-search-modal -->
        <div class="modal adSearch-modal fade" id="adSearchModal01" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                    <div class="modal-body">
                        <form method="get" action="<?php echo get_post_type_archive_link('vehicle'); ?>">
                            <h5 class="main-title"><?php echo esc_html__('Advanced Option', 'drivco-core') ?></h5>
                            <div class="row">
                                <div class="col-md-12 mb-30">
                                    <div class="form-inner">
                                        <select name="locations">
                                            <option value=""><?php echo esc_html__('Select Location', 'drivco-core') ?></option>
                                            <?php if (!empty($locations) && !is_wp_error($locations)) {
                                                foreach ($locations as $key => $term) {
                                            ?>
                                                    <option value="<?php echo $key ?>"><?php echo $term ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <h5><?php echo esc_html__('More Filter', 'drivco-core') ?></h5>
                                <div class="row mb-10">
                                    <div class="col-md-6 mb-20">
                                        <div class="form-inner">
                                            <label><?php echo esc_html__('Select Brand', 'drivco-core') ?> </label>
                                            <select name="brand">
                                                <option value=""><?php echo esc_html__('Select Brand', 'drivco-core') ?></option>
                                                <?php
                                                if (!empty($vehicle_brands) && !is_wp_error($vehicle_brands)) {
                                                    foreach ($vehicle_brands as $key => $term) {
                                                ?>
                                                        <option value="<?php echo $key ?>"><?php echo $term ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="form-inner">
                                            <label><?php echo esc_html__('Select Body Type', 'vehicle') ?></label>
                                            <select name="body-type">
                                                <option value=""><?php echo esc_html__('Select Body Type', 'drivco-core') ?></option>
                                                <?php if (!empty($body_types) && !is_wp_error($body_types)) {
                                                    foreach ($body_types as $key => $term) {
                                                ?>
                                                        <option value="<?php echo $key ?>"> <?php echo $term ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="form-inner">
                                            <label><?php echo esc_html__('Select Fuel Type', 'drivco-core') ?> </label>
                                            <select name="fuel">
                                                <option value=""><?php echo esc_html__('Select Fuel Type', 'drivco-core') ?></option>
                                                <option value="<?php echo esc_attr('Petrol + Gas', 'drivco-core') ?>"> <?php echo esc_html__('Petrol + Gas', 'drivco-core') ?> </option>
                                                <option value="<?php echo esc_attr('Petrol', 'drivco-core') ?>"><?php echo esc_html__('Petrol', 'drivco-core') ?></option>
                                                <option value="<?php echo esc_attr('Gas', 'drivco-core') ?>"><?php echo esc_html__('Gas', 'drivco-core') ?></option>
                                                <option value="<?php echo esc_attr('Electric', 'drivco-core') ?>"><?php echo esc_html__('Electric', 'drivco-core') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="form-inner">
                                            <label><?PHP echo esc_html__('Steering Side', 'drivco-core') ?></label>
                                            <select name="steering">
                                                <option value=""><?php echo esc_html__('Steering Side', 'drivco-core') ?></option>
                                                <option value="<?php echo esc_attr('left') ?>"><?php echo esc_html__('Left', 'drivco-core') ?></option>
                                                <option value="<?php echo esc_attr('right') ?>"><?php echo esc_html__('Right', 'drivco-core') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="form-inner">
                                            <label><?php echo esc_html__('Select Color', 'drivco-core') ?></label>
                                            <select name="color">
                                                <option value=""><?php echo esc_html__('Select Color', 'drivco-core') ?></option>
                                                <?php if (!empty($colors) && !is_wp_error($colors)) {
                                                    foreach ($colors as $key => $term) {
                                                ?>
                                                        <option value="<?php echo $key ?>"> <?php echo $term ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="form-inner">
                                            <label><?php echo esc_html__('Select Year', 'drivco-core') ?> </label>
                                            <select name="years">
                                                <option value=""><?php echo esc_html__('Select year', 'drivco-core') ?></option>
                                                <?php if (!empty($vehicle_years) && !is_wp_error($vehicle_years)) {
                                                    foreach ($vehicle_years as $key => $term) {
                                                ?>
                                                        <option value="<?php echo $key ?>"> <?php echo $term ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h5><?php echo esc_html__('Mileage', 'drivco-core') ?></h5>
                                <div class="row">
                                    <div class="col-md-6 mb-20">
                                        <div class="form-inner">
                                            <label><?php echo esc_html__('Min Miles', 'drivco-core') ?></label>
                                            <input name="min_miles" type="text" placeholder="<?php echo esc_attr__('Min Miles', 'drivco-core') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="form-inner">
                                            <label><?php echo esc_html__('Max Miles', 'drivco-core') ?></label>
                                            <input type="text" name="max_miles" placeholder="<?php echo esc_attr__('Max Miles', 'drivco-core') ?>">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mb-20"><?php echo esc_html__('Price Range', 'drivco-core') ?></h5>
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
                                        <div class="range-wrapper2">
                                            <div class="valus">
                                                <div class="min-value">
                                                    <?php if (Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_bidding_price_currency')) : ?>
                                                        <span><?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_bidding_price_currency') ?></span>
                                                    <?php endif; ?>
                                                    <input name="vehicle_min_price" type="text" class="from" placeholder="<?php echo esc_attr('Min Price', 'drivco-core') ?>" />
                                                </div>
                                                <div class="min-value">
                                                    <?php if (Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_bidding_price_currency')) : ?>
                                                        <span><?php echo Egns_Core\Egns_Helper::egns_vehicle_product_value('vehicle_bidding_price_currency') ?></span>
                                                    <?php endif; ?>
                                                    <input name="vehicle_min_price" type="text" class="to" placeholder="<?php echo esc_attr('Max Price', 'drivco-core') ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="apply-btn pt-30">
                                <button class="primary-btn2" type="submit"><?php echo esc_html__('Apply Filter', 'drivco-core') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
<?php
    return ob_get_clean();
}

add_shortcode('egns_general_filter', 'egns_general_filter_shortcode');


function drivco_sep_reg_form()
{
    if (is_admin()) return;
    if (is_user_logged_in()) return;
    ob_start();

    // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
    // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY

    do_action('woocommerce_before_customer_login_form');

?>
    <?php if (class_exists('Woocommerce')) : ?>
        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>
            <?php do_action('woocommerce_register_form_start'); ?>

            <?php if ('yes' === get_option('woocommerce_registration_generate_username')) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_username"><?php esc_html_e('User Name', 'drivco-core'); ?> <span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" placeholder="User Name" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                            ?>
                </p>

            <?php endif; ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_email"><?php esc_html_e('Email address', 'drivco-core'); ?> <span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" placeholder="Type E-mail" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                            ?>
            </p>

            <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_password"><?php esc_html_e('Password', 'drivco-core'); ?> <span class="required">*</span></label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                </p>

            <?php else : ?>

                <p><?php esc_html_e('A password will be sent to your email address.', 'drivco-core'); ?></p>

            <?php endif; ?>

            <?php do_action('woocommerce_register_form'); ?>

            <p class="woocommerce-FormRow form-row">
                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <button type="submit" class="primary-btn2 woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Sign Up Now', 'drivco-core'); ?>"><?php esc_html_e('Sign Up Now', 'drivco-core'); ?></button>
            </p>

            <?php do_action('woocommerce_register_form_end'); ?>

        </form>
    <?php endif ?>
    <?php

    return ob_get_clean();
}
add_shortcode('drivco_registration_form', 'drivco_sep_reg_form');


function drivco_sep_login_form()
{
    if (is_admin()) return;
    if (is_user_logged_in()) return;
    ob_start();
    if (class_exists('Woocommerce')) {
        woocommerce_login_form(array('redirect' => 'your-url'));
    } else {
    ?>
        <div class="login-form">
            <div class="login-form-wrapper">
                <?php
                if (isset($_GET['login'])) {
                    $loginValue = $_GET['login'];
                    if (isset($loginValue)) {
                ?>
                        <h3 class="wrong-cre"><?php echo esc_html__('Your username & password didn\'t mass', 'drivco-core') ?></h3>
                <?php
                    }
                }
                ?>
                <?php wp_login_form(); ?>
            </div>
        </div>
    <?php
    }
    return ob_get_clean();
}
add_shortcode('wc_login_form', 'drivco_sep_login_form');

// Search form for vehicle post type
function vehicle_search_form($args = [])
{
    ob_start(); ?>
    <?php if (!empty($args['style']) && $args['style'] == 2) : ?>
        <form role="search" method="get" action="<?php echo get_post_type_archive_link('vehicle'); ?>" class="wp-block-search__button-inside wp-block-search__text-button wp-block-search">
            <label class="wp-block-search__label screen-reader-text" for="wp-block-search__input-1"><?php echo esc_html__('Search', 'drivco-core') ?></label>
            <div class="wp-block-search__inside-wrapper ">
                <input class="wp-block-search__input" id="wp-block-search__input-1" type="text" name="s" id="s" placeholder="<?php echo esc_attr__('Search car names', 'drivco-core'); ?>" />
                <input type="hidden" name="post_type" value="vehicle" /> <!-- Change 'vehicle' to your custom post type name -->
                <button aria-label="Search" class="wp-block-search__button wp-element-button" type="submit"><?php echo esc_html__('Search', 'drivco-core') ?></button>
            </div>
        </form>
    <?php else : ?>
        <form method="get" id="searchform" action="<?php echo get_post_type_archive_link('vehicle'); ?>">
            <div class="form-inner">
                <input type="text" name="s" id="s" placeholder="<?php echo esc_attr__('Search your products', 'drivco-core'); ?>" />
                <input type="hidden" name="post_type" value="vehicle" /> <!-- Change 'vehicle' to your custom post type name -->
                <button type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
    <?php endif ?>
<?php
    return ob_get_clean();
}
add_shortcode('vehicle_search_form', 'vehicle_search_form');










// New filter add only for sellcarfast.au 
function filter_sellcarfast()
{
    $tabs      = Egns_Helper::get_taxonomy_list('vehicle-tab', 'desc');
    $makes     = Egns_Helper::get_taxonomy_list('vehicle-make');
    $models    = Egns_Helper::get_taxonomy_list('vehicle-model');
    $years     = Egns_Helper::get_taxonomy_list('vehicle-year');
    $states    = Egns_Helper::get_taxonomy_list('vehicle-states');
    $locations = Egns_Helper::get_taxonomy_list('location');

    function vehicle_product_counts()
    {
        $types   = array('auction_product', 'general_product', 'simulcast_product');
        $results = array();

        foreach ($types as $type) {
            $results[$type] = count(get_posts(array(
                'post_type'      => 'vehicle',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'meta_query'     => array(
                    array(
                        'key'     => 'EGNS_VEHICLE_META_ID',
                        'value'   => $type,
                        'compare' => 'LIKE'
                    )
                )
            )));
        }

        return $results;
    }

    $count = vehicle_product_counts();

?>

    <div class="search-wrapper">
        <form method="get" action="<?php echo get_post_type_archive_link('vehicle'); ?>" id="sellcarfastForm">
            <!-- Tabs -->
            <div class="tabs" id="auctionTabs">
                <?php if (!empty($tabs) && !is_wp_error($tabs)) : ?>
                    <?php
                    $i = 0;
                    foreach ($tabs as $key => $tab) :
                        $meta = get_term_meta($tab->term_id, 'drivco_tab_taxonomy', true);
                    ?>
                        <div class="tab<?php echo $i == 0 ? ' active' : ''; ?>" data-type="<?php echo esc_attr($key); ?>">
                            <?php if (!empty($meta['drivco_tab_logo']['url'])) : ?>
                                <span class="icon">
                                    <img src="<?php echo $meta['drivco_tab_logo']['url']; ?>" alt="<?php echo esc_attr($tab->name); ?>">
                                </span>
                            <?php endif; ?>
                            <?php echo esc_html($tab->name); ?>
                        </div>
                    <?php
                        $i++;
                    endforeach;
                    ?>
                <?php endif; ?>
            </div>
            <!-- Hidden input to store selected tab -->
            <input type="hidden" name="vehicle_tab" id="vehicleTabInput" value="">

            <!-- Filters Container -->
            <div class="filters-box" style="position:relative;">

                <div class="filter-row">
                    <select name="vehicle_make" id="vehicleMake" class="select-field">
                        <option value=""><?php echo esc_html__('All Makes', 'drivco-core') ?></option>
                        <?php if (!empty($makes) && !is_wp_error($makes)) : ?>
                            <?php foreach ($makes as $key => $make) : ?>
                                <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($make->name); ?></option>
                            <?php endforeach;  ?>
                        <?php endif; ?>
                    </select>

                    <select name="vehicle_model" id="vehicleModel" class="select-field">
                        <option value=""><?php echo esc_html__('All Models', 'drivco-core') ?></option>
                        <?php if (!empty($models) && !is_wp_error($models)) : ?>
                            <?php foreach ($models as $key => $model) : ?>
                                <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($model->name); ?></option>
                            <?php endforeach;  ?>
                        <?php endif; ?>
                    </select>

                    <select name="vehicle_year" id="vehicleYear" class="select-field">
                        <option value=""><?php echo esc_html__('Year', 'drivco-core') ?></option>
                        <?php if (!empty($years) && !is_wp_error($years)) : ?>
                            <?php foreach ($years as $key => $year) : ?>
                                <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($year->name); ?></option>
                            <?php endforeach;  ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="filter-row">
                    <select name="vehicle_states" id="vehicleState" class="select-field">
                        <option value=""><?php echo esc_html__('All States', 'drivco-core') ?></option>
                        <?php if (!empty($states) && !is_wp_error($states)) : ?>
                            <?php foreach ($states as $key => $state) : ?>
                                <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($state->name); ?></option>
                            <?php endforeach;  ?>
                        <?php endif; ?>
                    </select>

                    <select name="vehicle_location" id="vehicleLocation" class="select-field">
                        <option value=""><?php echo esc_html__('All Locations', 'drivco-core') ?></option>
                        <?php if (!empty($locations) && !is_wp_error($locations)) : ?>
                            <?php foreach ($locations as $key => $location) : ?>
                                <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($location->name); ?></option>
                            <?php endforeach;  ?>
                        <?php endif; ?>
                    </select>

                    <input type="text" name="custom_keyword" value="" class="keyword" placeholder="Keyword search">
                </div>

                <!-- Search button -->
                <button class="search-btn" id="searchBtn" type="submit">🔍 <?php echo esc_html__('Search', 'drivco-core') ?></button>

                <!-- Sale Types -->
                <div class="sale-types">
                    <label class="sale-item">
                        <input type="checkbox" name="sale_type[]" value="auction_product" class="sale-check"> <?php echo esc_html__('Bid Now', 'drivco-core') ?>
                        <span class="count"><?php echo esc_html($count['auction_product']); ?></span>
                    </label>

                    <label class="sale-item">
                        <input type="checkbox" name="sale_type[]" value="general_product" class="sale-check"> <?php echo esc_html__('Buy Now', 'drivco-core') ?>
                        <span class="count"><?php echo esc_html($count['general_product']); ?></span>
                    </label>

                    <label class="sale-item">
                        <input type="checkbox" name="sale_type[]" value="simulcast_product" class="sale-check"> <?php echo esc_html__('Simulcast', 'drivco-core') ?>
                        <span class="count"><?php echo esc_html($count['simulcast_product']); ?></span>
                    </label>
                </div>

                <div class="clear-btn" id="clearSaleTypes">
                    <?php echo esc_html__('Clear Sale Type Selection', 'drivco-core') ?>
                </div>

            </div>
        </form>
    </div>

<?php
}
add_shortcode('sellcarfast', 'filter_sellcarfast');




// Get all vehicles based on the filters submitted 
function get_filtered_vehicles($args = array())
{

    // Default empty filters
    $vehicle_tab      = sanitize_text_field($_GET['vehicle_tab'] ?? ''); // new tab filter
    $vehicle_make     = sanitize_text_field($_GET['vehicle_make'] ?? '');
    $vehicle_model    = sanitize_text_field($_GET['vehicle_model'] ?? '');
    $vehicle_year     = sanitize_text_field($_GET['vehicle_year'] ?? '');
    $vehicle_state    = sanitize_text_field($_GET['vehicle_state'] ?? '');
    $vehicle_location = sanitize_text_field($_GET['vehicle_location'] ?? '');
    $custom_keyword   = sanitize_text_field($_GET['custom_keyword'] ?? '');
    $sale_types       = $_GET['sale_type'] ?? array(); // array of selected meta values

    // Build tax_query
    $tax_query = array('relation' => 'AND');

    if ($vehicle_tab) {
        $tax_query[] = array(
            'taxonomy' => 'vehicle-tab',
            'field'    => 'slug',
            'terms'    => $vehicle_tab,
        );
    }
    if ($vehicle_make) {
        $tax_query[] = array(
            'taxonomy' => 'vehicle-make',
            'field'    => 'slug',
            'terms'    => $vehicle_make,
        );
    }
    if ($vehicle_model) {
        $tax_query[] = array(
            'taxonomy' => 'vehicle-model',
            'field'    => 'slug',
            'terms'    => $vehicle_model,
        );
    }
    if ($vehicle_year) {
        $tax_query[] = array(
            'taxonomy' => 'vehicle-year',
            'field'    => 'slug',
            'terms'    => $vehicle_year,
        );
    }
    if ($vehicle_state) {
        $tax_query[] = array(
            'taxonomy' => 'vehicle-states',
            'field'    => 'slug',
            'terms'    => $vehicle_state,
        );
    }
    if ($vehicle_location) {
        $tax_query[] = array(
            'taxonomy' => 'location',
            'field'    => 'slug',
            'terms'    => $vehicle_location,
        );
    }

    // Only add tax_query if not empty
    if (count($tax_query) === 1) {
        $tax_query = []; // no tax filter applied
    }

    // Build meta_query
    $meta_query = array();
    if (!empty($sale_types) && is_array($sale_types)) {
        $meta_query[] = array(
            'key'     => 'EGNS_VEHICLE_META_ID',
            'value'   => $sale_types,
            'compare' => 'IN',
        );
    }

    // WP_Query arguments
    // $query_args = array_merge(array(
    //     'post_type'      => 'vehicle',
    //     'post_status'    => 'publish',
    //     'posts_per_page' => -1,
    //     's'              => $custom_keyword,
    //     'tax_query'      => $tax_query,
    //     'meta_query'     => $meta_query,
    // ), $args);

    // $query = new WP_Query($query_args);

    // return $query;
}


// $vehicle_query = get_filtered_vehicles();


// var_dump($vehicle_query); 
