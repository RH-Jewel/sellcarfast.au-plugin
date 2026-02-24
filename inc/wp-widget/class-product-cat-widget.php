<?php

//recent post custom widget

class Egns_Product_Cat_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_product_cat',

            // Widget name
            __('Egns Product Category', 'drivco-core'),

            // Widget description
            array('description' => __('Egns Product Category', 'drivco-core'),)
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

        // Get all product categories
        $product_categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
        ));

        ?>

        <div class="checkbox-container">
            <ul class="wp-block-categoris-cloud">
                <?php foreach ($product_categories as $category) : ?>
                    <li><a href="<?php echo esc_url(get_term_link($category)) ?>" class="active"><span><?php echo sprintf(__('%s', 'drivco-core'), $category->name) ?></span> <span class="number-of-categoris">(<?php echo $category->count ?>)</span></a></li>
                <?php endforeach ?>
            </ul>
        </div>


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

if (!function_exists('Egns_Product_Cat_Widget')) {
    function Egns_Product_Cat_Widget()
    {
        register_widget('Egns_Product_Cat_Widget');
    }
    add_action('widgets_init', 'Egns_Product_Cat_Widget');
}
