<?php

//recent post custom widget

class Egns_Recent_Product_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_recent_product',

            // Widget name
            __('Egns Recent Product', 'drivco-core'),

            // Widget description
            array('description' => __('Egns Recent Product', 'drivco-core'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
?>

        <?php if (!empty($title)) : ?>
            <?php echo $args['before_title'] . esc_attr(__($title, 'drivco-core')) . $args['after_title']; ?>
        <?php endif; ?>

        <?php
        $query = new WP_Query(array(
            'post_type'           => 'product',
            'posts_per_page'      => 4,
            'orderby'             => 'asc',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_type',
                    'field'    => 'slug',
                    'terms'    => 'auction',
                    'operator' => 'NOT IN'
                )
            )

        ));
        ?>

        <ul class="recent-product-list">
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    global $product;
            ?>
                    <li class="recent-product">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="product-img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                        <?php endif ?>
                        <div class="content">
                            <div class="price">
                                <?php
                                if (class_exists('Woocommerce')) {
                                    global $product;
                                ?>
                                    <div class="price">
                                        <h6><?php echo $product->get_price_html(); ?></h6>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <h6><a href="<?php the_permalink(); ?>"><?php esc_html__(the_title()); ?></a></h6>
                        </div>
                    </li>
            <?php
                }
            }
            wp_reset_query();
            ?>
        </ul>
    <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $title = '';
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
    ?>
        <!--Title-->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'drivco-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }

    // Updating widget replacing old instances with
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

if (!function_exists('Egns_Recent_Product_Widget')) {
    function Egns_Recent_Product_Widget()
    {
        register_widget('Egns_Recent_Product_Widget');
    }
    add_action('widgets_init', 'Egns_Recent_Product_Widget');
}
