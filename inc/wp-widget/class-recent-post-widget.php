<?php

//recent post custom widget

class Egns_Recent_Post_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_recent_post',

            // Widget name
            __('Egns Recent Post', 'drivco-core'),

            // Widget description
            array('description' => __('Egns Recent Post', 'drivco-core'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
?>
        <div class="widget-title blog-title">

            <?php if (!empty($title)) : ?>

                <?php echo $args['before_title'] . esc_attr(__($title, 'drivco-core')) . $args['after_title']; ?>

                <div class="slider-btn-group2 d-flex align-items-center justify-content-between  mb-20">
                    <div class="slider-btn prev-51" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-a1583bbe1904bbd6" aria-disabled="false">
                        <svg width="7" height="12" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                        </svg>
                    </div>
                    <div class="slider-btn next-51 swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-a1583bbe1904bbd6" aria-disabled="true">
                        <svg width="7" height="12" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                        </svg>
                    </div>
                </div>

        </div>

    <?php endif; ?>
    <div class="recent-post-wraper">
        <div class="swiper recent-post-sidebar-slider">
            <div class="swiper-wrapper">
                <?php
                $query = new WP_Query(array(
                    'post_type'           => 'post',
                    'posts_per_page'      => -1,
                    'orderby'             => "DESC",
                ));
                ?>
                <?php
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();

                ?>

                        <div class="swiper-slide">
                            <div class="widget-cnt">
                                <div class="wi">
                                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('egns-thumb-cart') ?></a>
                                </div>
                                <div class="wc">
                                    <?php
                                    $archive_year  = get_the_time('Y');
                                    $archive_month = get_the_time('m');
                                    $archive_day   = get_the_time('d');
                                    ?>
                                    <a class="date" href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>"><?php echo get_the_date() ?></a>
                                    <h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                wp_reset_query();
                ?>

            </div>
        </div>
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

if (!function_exists('Egns_Recent_Post_Widget')) {
    function Egns_Recent_Post_Widget()
    {
        register_widget('Egns_Recent_Post_Widget');
    }
    add_action('widgets_init', 'Egns_Recent_Post_Widget');
}
