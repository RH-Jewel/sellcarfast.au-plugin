<?php

function save_posts_vehicle($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    $post_types = get_post_type($post_id);
    if ($post_types === 'vehicle') {
        $all_meta = get_post_meta($post_id);

        // Unserialize the data
        if (!empty($all_meta['EGNS_VEHICLE_META_ID'])) {
            $meta_data = unserialize($all_meta['EGNS_VEHICLE_META_ID'][0]);
            // Access the specific keys you need
            $vehicle_milage_info_value = !empty($meta_data['vehicle_milage_info_value']) ? $meta_data['vehicle_milage_info_value'] : '';
            if (!empty($meta_data['vehicle_discount_price'])) {
                update_post_meta($post_id, 'vehicle_actual_price', $meta_data['vehicle_discount_price']);
            } elseif (!empty($meta_data['vehicle_regular_price'])) {
                update_post_meta($post_id, 'vehicle_actual_price', $meta_data['vehicle_regular_price']);
            } elseif (!empty($meta_data['vehicle_bidding_price'])) {
                update_post_meta($post_id, 'vehicle_actual_price', $meta_data['vehicle_bidding_price']);
            }
            update_post_meta($post_id, 'vehicle_milage_info_value', preg_replace('/[^0-9]/', '', $vehicle_milage_info_value));
        }
    }
}
add_action('save_post', 'save_posts_vehicle', 100);

function drivco_nav_menu_objects($items, $args)
{
    foreach ($items as &$item) {

        if ($item->menu_item_parent == 0) {

            // "data_type => serialize" usage.
            $meta = get_post_meta($item->ID, 'mega_menu_options', true);
            if (!empty($meta['drivco_mega_menu_icon']['url'])) {
                $item->title = $item->title . '<img src="' . esc_url($meta['drivco_mega_menu_icon']['url']) . '" alt="' . esc_html__('nav-menu', 'drivco-core') . '">';
            }

            if (!empty($meta['drivco_mega_menu_class'])) {
                $item->classes[] = $meta['drivco_mega_menu_class'];
            }
        }
    }

    return $items;
}

add_filter('wp_nav_menu_objects', 'drivco_nav_menu_objects', 10, 2);
