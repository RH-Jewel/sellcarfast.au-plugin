<?php

/*-------------------------------------------------------
		   ** Vehicle Archive options
	--------------------------------------------------------*/

CSF::createSection($prefix, array(
    'parent' => 'vehicle_options',
    'id'     => 'vehicle_archive_options',
    'title'  => esc_html__('Archive Vehicle', 'drivco-core'),
    'icon'   => 'fas fa-archive',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Archive Options', 'drivco-core') . '</h3>'
        ),
        array(
            'id'      => 'vehicle_archive_filter_switcher',
            'type'    => 'switcher',
            'title'   => esc_html__('Search Filter', 'drivco-core'),
            'label'   => esc_html__('Do you want activate it ?', 'drivco-core'),
            'default' => true
        ),
        array(
            'id'      => 'vehicle_posts_per_page',
            'type'    => 'number',
            'title'   => esc_html__('Posts per page', 'drivco-core'),
            'default' => 9,
        ),
    )
));
