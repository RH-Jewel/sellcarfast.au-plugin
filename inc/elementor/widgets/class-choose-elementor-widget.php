<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Drivco_Choose_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'drivco_choose';
    }

    public function get_title()
    {
        return esc_html__('EG Choose', 'drivco-core');
    }

    public function get_icon()
    {
        return 'eicon-select';
    }

    public function get_categories()
    {
        return ['drivco_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'drivco_choose_style_section',
            [
                'label' => esc_html__('Choose Style', 'drivco-core')
            ]
        );

        $this->add_control(
            'drivco_choose_style_selection',
            [
                'label'   => esc_html__('Select Style', 'drivco-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'     => esc_html__('Style One', 'drivco-core'),
                    'style_two'     => esc_html__('Style Two', 'drivco-core'),

                ],
                'default' => 'style_one',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'drivco_choose_area',
            [
                'label' => esc_html__('General', 'drivco-core')
            ]
        );
        $this->add_control(
            'drivco_choose_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Why Choose Drivco', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
            ]
        );
        $this->add_control(
            'drivco_choose_subtitle',
            [
                'label' => esc_html__('Sub Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Here are some of the featured cars in different categories', 'drivco-core'),
                'placeholder' => esc_html__('Type your sub-title here', 'drivco-core'),
                'label_block' => true,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
			'drivco_choose_link_url',
			[
				'label' => esc_html__( 'URL Link', 'drivco-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
			]
		);


        $repeater = new \Elementor\Repeater();

        //Style One
        $repeater->add_control(
            'drivco_choose_area_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Affordable Price', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'drivco_choose_area_desc',
            [
                'label' => esc_html__('Description', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('An affordable price for a luxury car may be significantly higher than an affordable price for a budget car...', 'drivco-core'),
                'placeholder' => esc_html__('Type your title here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_choose_area_icon',
            [
                'label' => esc_html__('Logo', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'drivco_choose_area_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_choose_area_title' => esc_html__('Affordable Price', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_choose_area_title }}}',
            ]
        );
        $this->end_controls_section();

        //////////////////////////////// //Style Two////////////////////////////////


        //Review Section
        $this->start_controls_section(
            'drivco_choose_style_review_repeater',
            [
                'label' => esc_html__('Review', 'drivco-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'drivco_choose_style_review_text',
            [
                'label' => esc_html__('Rating Text', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trust Ratings', 'drivco-core'),
                'placeholder' => esc_html__('Type your description here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_choose_style_review_section_rank_icon_show',
            [
                'label' => esc_html__('Show google stars', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'drivco_choose_style_review_section_rank_icon_show_trustpilot',
            [
                'label' => esc_html__(
                    'Show trustpilot stars',
                    'drivco-core'
                ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'drivco-core'),
                'label_off' => esc_html__('Hide', 'drivco-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $repeater->add_control(
            'drivco_choose_style_review_star',
            [
                'label'         => esc_html__('Rating', 'drivco-core'),
                'type'             => Controls_Manager::NUMBER,
                'min'             => 0,
                'max'             => 5,
                'step'             => 1,
                'default'         => 5,
                'dynamic'         => [
                    'active'     => true,
                ],
            ]
        );

        $repeater->add_control(
            'drivco_choose_style_review_count',
            [
                'label' => esc_html__('Review Count', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Based On 2348 Reviews', 'drivco-core'),
                'placeholder' => esc_html__('Type your Count Review here', 'drivco-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'drivco_choose_style_review_logo',
            [
                'label' => esc_html__('Choose logo ', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'drivco_choose_style_review_list',
            [
                'label' => esc_html__('Choose List', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'drivco_choose_style_review_text' => esc_html__('Trust Ratings', 'drivco-core'),
                    ],

                ],
                'title_field' => '{{{ drivco_choose_style_review_text }}}',
            ]
        );
        $this->end_controls_section();




        // =====================Style One=======================//

        //Title

        $this->start_controls_section(
            'drivco_choose_one_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_one',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_choose_typ',
                'selector' => '{{WRAPPER}} .why-choose-area .choose-card .choose-top h5',

            ]
        );

        $this->add_control(
            'drivco_choose_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .choose-card .choose-top h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .choose-card .choose-top h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .why-choose-area .choose-card .choose-top h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Description

        $this->start_controls_section(
            'drivco_choose_desc',
            [
                'label' => esc_html__('Description', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_choose_desc_typ',
                'selector' => '{{WRAPPER}} .why-choose-area .choose-card p',

            ]
        );

        $this->add_control(
            'drivco_choose_desc_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .choose-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_desc_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .choose-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_desc_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .why-choose-area .choose-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();



        // =====================Style two=======================//

        //Title
        $this->start_controls_section(
            'drivco_choose_two_section_title',
            [
                'label' => esc_html__('Section Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_choose_two_section_title_typ',
                'selector' => '{{WRAPPER}} .section-title-2 h2',

            ]
        );

        $this->add_control(
            'drivco_choose_two_section_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 h2' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_two_section_title_margin',
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
            'drivco_choose_two_section_title_padding',
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

        //Sub Title
        $this->start_controls_section(
            'drivco_choose_two_section_subtitle',
            [
                'label' => esc_html__('Section SubTitle', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_choose_two_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title-2 p',

            ]
        );

        $this->add_control(
            'drivco_choose_two_subtitle_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-2 p' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_two_subtitle_margin',
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
            'drivco_choose_two_subtitle_padding',
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

        //Review 

        //Rating Count
        $this->start_controls_section(
            'drivco_choose_two_rating_sec',
            [
                'label' => esc_html__('Review', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_choose_two_description_typ',
                'selector' => '{{WRAPPER}} .why-choose-area.two .rating a .content ul li',
            ]
        );
        $this->add_control(
            'drivco_choose_two_rating_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area.two .rating a .content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_choose_two_rating_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area.two .rating a .content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'drivco_choose_two_rating_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .why-choose-area.two .rating a .content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();


        //Title

        $this->start_controls_section(
            'drivco_choose_two_title',
            [
                'label' => esc_html__('Title', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_choose_two_title_typ',
                'selector' => '{{WRAPPER}} .why-choose-area .choose-card .choose-top h5',

            ]
        );

        $this->add_control(
            'drivco_choose_two_title_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .choose-card .choose-top h5' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_two_title_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .choose-card .choose-top h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_two_title_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .why-choose-area .choose-card .choose-top h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //Description

        $this->start_controls_section(
            'drivco_choose_two_desc',
            [
                'label' => esc_html__('Description', 'drivco-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'drivco_choose_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'drivco-core'),
                'name'     => 'drivco_choose_two_desc_typ',
                'selector' => '{{WRAPPER}} .why-choose-area .choose-card p',

            ]
        );

        $this->add_control(
            'drivco_choose_two_desc_color',
            [
                'label'     => esc_html__('Color', 'drivco-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .choose-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_two_desc_margin',
            [
                'label' => esc_html__('Margin', 'drivco-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-area .choose-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'drivco_choose_two_desc_padding',
            [
                'label'      => __('Padding', 'drivco-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .why-choose-area .choose-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['drivco_choose_area_list'];
        $data2 = $settings['drivco_choose_style_review_list'];
        if ( ! empty( $settings['drivco_choose_link_url']['url'] ) ) {
			$this->add_link_attributes( 'drivco_choose_link_url', $settings['drivco_choose_link_url'] );
		}
?>
        <?php if ($settings['drivco_choose_style_selection'] == 'style_one') : ?>
            <div class="why-choose-area">
                <div class="row">
                    <?php foreach ($data as $item) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="choose-card">
                                <div class="choose-top">
                                    <div class="choose-icon">
                                        <?php if (!empty($item['drivco_choose_area_icon'])) :   ?>
                                            <?php \Elementor\Icons_Manager::render_icon($item['drivco_choose_area_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php endif ?>
                                    </div>
                                    <?php if (!empty($item['drivco_choose_area_title'])) :   ?>
                                        <h5><?php echo wp_kses($item['drivco_choose_area_title'], wp_kses_allowed_html('post'))  ?></h5>
                                    <?php endif ?>
                                </div>
                                <?php if (!empty($item['drivco_choose_area_desc'])) :   ?>
                                    <p><?php echo wp_kses($item['drivco_choose_area_desc'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['drivco_choose_style_selection'] == 'style_two') : ?>
            <div class="why-choose-area two">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                            <div class="section-title-2">
                                <?php if (!empty($settings['drivco_choose_title'])) :   ?>
                                    <h2><?php echo esc_html($settings['drivco_choose_title']) ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['drivco_choose_subtitle'])) :   ?>
                                    <p><?php echo esc_html($settings['drivco_choose_subtitle']) ?></p>
                                <?php endif ?>
                            </div>
                            <div class="review-and-btn d-flex flex-wrap align-items-center gap-3">
                                <?php foreach ($data2 as $item2) : ?>
                                    <div class="rating">
                                        <a <?php echo $this->get_render_attribute_string( 'drivco_choose_link_url' ); ?>>
                                            <div class="review-top">
                                                <div class="logo">
                                                    <?php if (!empty($item2['drivco_choose_style_review_logo']['url'])) :   ?>
                                                        <img src="<?php echo esc_url($item2['drivco_choose_style_review_logo']['url']) ?>" alt="<?php echo esc_attr('Company Logo ', 'drivco-core') ?>">
                                                    <?php endif ?>
                                                </div>
                                                <div class="star">
                                                    <?php if ('yes' == $item2['drivco_choose_style_review_section_rank_icon_show']) { ?>
                                                        <ul>
                                                            <?php $rank_counter = intval($item2['drivco_choose_style_review_star']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    <?php } ?>

                                                    <?php if ('yes' == $item2['drivco_choose_style_review_section_rank_icon_show_trustpilot']) { ?>
                                                        <ul class="trustpilot">
                                                            <?php $rank_counter = intval($item2['drivco_choose_style_review_star']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <ul>
                                                <?php if (!empty($item2['drivco_choose_style_review_text'])) :   ?>
                                                    <li><?php echo esc_html($item2['drivco_choose_style_review_text']) ?> <span><?php echo sprintf("%2d.0", $rank_counter) ?></span></li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item2['drivco_choose_style_review_count'])) :   ?>
                                                    <li><?php echo wp_kses($item2['drivco_choose_style_review_count'], wp_kses_allowed_html('post'))  ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 justify-content-center">
                        <?php foreach ($data as $item) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="choose-card">
                                    <div class="choose-top">
                                        <div class="choose-icon">
                                            <?php if (!empty($item['drivco_choose_area_icon'])) :   ?>
                                                <?php \Elementor\Icons_Manager::render_icon($item['drivco_choose_area_icon'], ['aria-hidden' => 'true']); ?>
                                            <?php endif ?>
                                        </div>
                                        <?php if (!empty($item['drivco_choose_area_title'])) :   ?>
                                            <h5><?php echo wp_kses($item['drivco_choose_area_title'], wp_kses_allowed_html('post'))  ?></h5>
                                        <?php endif ?>
                                    </div>
                                    <?php if (!empty($item['drivco_choose_area_desc'])) :   ?>
                                        <p><?php echo wp_kses($item['drivco_choose_area_desc'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Drivco_Choose_Widget());
