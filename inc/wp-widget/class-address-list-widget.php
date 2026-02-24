<?php


class Custom_Widget extends WP_Widget
{

    public function __construct()
    {
        // Widget initialization
        parent::__construct(
            // Base ID of our widget
            'company_info_widget',

            // Widget name
            'Egns Company Info',

            // Widget description
            array('description' => 'A custom widget that allows you to display office address, map, and button.')
        );
    }

    public function widget($args, $instance)
    {
        // Widget output
        echo $args['before_widget'];

        // Widget content
?>
        <?php if (!empty($instance['address_cnt'] || $instance['address_title'])) : ?>
            <div class="footer-contact mb-40">
                <?php if (!empty($instance['address_title'])) : ?>
                    <h4>
                        <svg width="14" height="20" viewBox="0 0 14 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.9213 3.4249C11.7076 1.33021 9.55162 0.0504883 7.15416 0.00158203C7.05181 -0.000527344 6.9488 -0.000527344 6.84642 0.00158203C4.449 0.0504883 2.29306 1.33021 1.07923 3.4249C-0.161468 5.566 -0.195414 8.13787 0.988414 10.3047L5.94791 19.3823C5.95013 19.3863 5.95236 19.3904 5.95466 19.3944C6.17287 19.7736 6.56377 20 7.00037 20C7.43693 20 7.82783 19.7736 8.04599 19.3944C8.0483 19.3904 8.05052 19.3863 8.05275 19.3823L13.0122 10.3047C14.196 8.13787 14.162 5.566 12.9213 3.4249ZM7.00029 9.06252C5.44947 9.06252 4.18779 7.80084 4.18779 6.25002C4.18779 4.6992 5.44947 3.43752 7.00029 3.43752C8.55111 3.43752 9.81279 4.6992 9.81279 6.25002C9.81279 7.80084 8.55115 9.06252 7.00029 9.06252Z"></path>
                        </svg>
                        <?php echo esc_html($instance['address_title']) ?>
                    </h4>
                <?php endif; ?>

                <?php if (!empty($instance['address_cnt'])) : ?>
                    <address><?php echo wp_kses($instance['address_cnt'], wp_kses_allowed_html('post')); ?></address>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($instance['email_title'] || $instance['email_cnt'] || $instance['email_cnt2'])) : ?>
            <div class="footer-contact mb-40">
                <?php if (!empty($instance['email_title'])) : ?>
                    <h4>
                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.29163 14.6767V18.5417C7.29227 18.6731 7.33422 18.8009 7.41154 18.9071C7.48886 19.0133 7.59764 19.0924 7.72245 19.1334C7.84727 19.1743 7.9818 19.1749 8.10699 19.1351C8.23217 19.0954 8.34167 19.0172 8.41997 18.9117L10.6808 15.8351L7.29163 14.6767ZM19.7375 0.115895C19.6436 0.0490233 19.533 0.00942685 19.418 0.00148505C19.303 -0.00645676 19.188 0.0175656 19.0858 0.0708953L0.3358 9.86256C0.227918 9.91958 0.13903 10.0069 0.0800422 10.1137C0.0210548 10.2205 -0.00546466 10.3422 0.00373833 10.4639C0.0129413 10.5855 0.0574664 10.7019 0.131849 10.7986C0.206232 10.8953 0.307236 10.9683 0.422467 11.0084L5.63497 12.7901L16.7358 3.2984L8.1458 13.6476L16.8816 16.6334C16.9683 16.6625 17.0603 16.6723 17.1512 16.6622C17.2421 16.652 17.3296 16.6221 17.4078 16.5746C17.4859 16.527 17.5526 16.463 17.6034 16.3869C17.6542 16.3108 17.6877 16.2246 17.7016 16.1342L19.9933 0.717562C20.0103 0.603437 19.9953 0.486844 19.9502 0.380665C19.905 0.274486 19.8314 0.182855 19.7375 0.115895Z"></path>
                        </svg>
                        <?php echo esc_html($instance['email_title']) ?>
                    </h4>
                <?php endif; ?>

                <?php if (!empty($instance['email_cnt'])) : ?>
                    <a href="mailto:<?php echo esc_html($instance['email_cnt']); ?>"><?php echo esc_html($instance['email_cnt']); ?></a><br>
                <?php endif; ?>

                <?php if (!empty($instance['email_cnt2'])) : ?>
                    <a href="mailto:<?php echo esc_html($instance['email_cnt2']); ?>"><?php echo esc_html($instance['email_cnt2']); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($instance['newslatter_title'] || $instance['newslatter_shortcode'])) : ?>
            <div class="footer-contact">
                <?php if (!empty($instance['newslatter_title'])) : ?>
                    <h6> <?php echo esc_html($instance['newslatter_title']); ?></h6>
                <?php endif; ?>
                <?php if (!empty($instance['newslatter_shortcode'])) : ?>
                    <?php echo do_shortcode($instance['newslatter_shortcode']); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php
        echo $args['after_widget'];
    }


    public function form($instance)
    {
        // Widget form fields
        $address_title = !empty($instance['address_title']) ? esc_attr($instance['address_title']) : '';
        $address_cnt = !empty($instance['address_cnt']) ? $instance['address_cnt'] : '';

        $email_title = !empty($instance['email_title']) ? esc_attr($instance['email_title']) : '';
        $email_cnt = !empty($instance['email_cnt']) ? $instance['email_cnt'] : '';
        $email_cnt2 = !empty($instance['email_cnt2']) ? $instance['email_cnt2'] : '';

        $newslatter_title = !empty($instance['newslatter_title']) ? esc_attr($instance['newslatter_title']) : '';
        $newslatter_shortcode = !empty($instance['newslatter_shortcode']) ? esc_attr($instance['newslatter_shortcode']) : '';


        // Display the form
    ?>

        <!-- Address Fields  -->
        <p>
            <label for="<?php echo $this->get_field_id('address_title'); ?>"><?php echo esc_html__('Address Title : ', 'drivco-core ') ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('address_title'); ?>" name="<?php echo $this->get_field_name('address_title'); ?>" value="<?php echo $address_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('address_cnt'); ?>"><?php echo esc_html__('Company Address :', 'drivco-core') ?></label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('address_cnt'); ?>" id="<?php echo $this->get_field_id('address_cnt'); ?>" cols="30" rows="5"><?php echo $address_cnt; ?></textarea>
        </p>


        <!-- Email Fields  -->
        <p>
            <label for="<?php echo $this->get_field_id('email_title'); ?>"><?php echo esc_html__('Email Title : ', 'drivco-core ') ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('email_title'); ?>" name="<?php echo $this->get_field_name('email_title'); ?>" value="<?php echo $email_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email_cnt'); ?>"><?php echo esc_html__('Input Email :', 'drivco-core') ?></label>
            <input class="widefat" type="email" id="<?php echo $this->get_field_id('email_cnt'); ?>" name="<?php echo $this->get_field_name('email_cnt'); ?>" value="<?php echo $email_cnt; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email_cnt2'); ?>"><?php echo esc_html__('Input Email :', 'drivco-core') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email_cnt2'); ?>" type="email" name="<?php echo $this->get_field_name('email_cnt2'); ?>" value="<?php echo $email_cnt2; ?>">
        </p>

        <!-- Neslatter Fields  -->
        <p>
            <label for="<?php echo $this->get_field_id('newslatter_title'); ?>"><?php echo esc_html__('Newslatter Title : ', 'drivco-core ') ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('newslatter_title'); ?>" name="<?php echo $this->get_field_name('newslatter_title'); ?>" value="<?php echo $newslatter_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('newslatter_shortcode'); ?>"><?php echo esc_html__('Newslatter Shortcode :', 'drivco-core') ?></label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('newslatter_shortcode'); ?>" id="<?php echo $this->get_field_id('newslatter_shortcode'); ?>" cols="30" rows="5"><?php echo $newslatter_shortcode; ?></textarea>
        </p>
<?php
    }



    public function update($new_instance, $old_instance)
    {
        // Save widget form values
        $instance = array();

        $instance['address_title'] = (!empty($new_instance['address_title'])) ? $new_instance['address_title'] : '';
        $instance['address_cnt'] = (!empty($new_instance['address_cnt'])) ? $new_instance['address_cnt'] : '';

        $instance['email_title'] = (!empty($new_instance['email_title'])) ? $new_instance['email_title'] : '';
        $instance['email_cnt'] = (!empty($new_instance['email_cnt'])) ? $new_instance['email_cnt'] : '';
        $instance['email_cnt2'] = (!empty($new_instance['email_cnt2'])) ? $new_instance['email_cnt2'] : '';

        $instance['newslatter_title'] = (!empty($new_instance['newslatter_title'])) ? sanitize_text_field($new_instance['newslatter_title']) : '';
        $instance['newslatter_shortcode'] = (!empty($new_instance['newslatter_shortcode'])) ? sanitize_text_field($new_instance['newslatter_shortcode']) : '';

        return $instance;
    }
}

function register_company_info_widget()
{
    // Register the widget
    register_widget('Custom_Widget');
}
add_action('widgets_init', 'register_company_info_widget');
