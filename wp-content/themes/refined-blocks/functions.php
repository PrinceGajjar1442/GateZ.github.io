<?php

/**
 *Recommended way to include parent theme styles.
 *(Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 */
//after theme setup hook for background color
if (!function_exists('refined_blocks_setup')) :
    function refined_blocks_setup()
    {

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('refined_magazine_custom_background_args', array(
            'default-color' => '#ffffff ',
            'default-image' => '',
        )));
    }
endif;
add_action('after_setup_theme', 'refined_blocks_setup');
/**
 * Loads the child theme textdomain.
 */
function refined_blocks_load_language()
{
    load_child_theme_textdomain('refined-blocks');
}
add_action('after_setup_theme', 'refined_blocks_load_language');

/**
 * Enqueue Style
 */
add_action('wp_enqueue_scripts', 'refined_blocks_style');
function refined_blocks_style()
{
    wp_enqueue_style('refined-blocks-heading', '//fonts.googleapis.com/css?family=Oswald');
    wp_enqueue_style('refined-magazine-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('refined-blocks-style', get_stylesheet_directory_uri() . '/style.css', array('refined-magazine-style'));

    wp_enqueue_script('refined-blocks-custom-js', get_stylesheet_directory_uri() . '/js/refined-blocks-custom.js', array('jquery'), '20151215', true);
}
/**
 * Refined Magazine Theme Customizer default values
 *
 * @package Refined Magazine
 */
if (!function_exists('refined_magazine_default_theme_options_values')) :
    function refined_magazine_default_theme_options_values()
    {
        $default_theme_options = array(

            /*General Colors*/
            'refined-magazine-primary-color' => '#e5a812',
            'refined-magazine-site-title-hover' => '',
            'refined-magazine-site-tagline' => '',


            /*Logo Section Colors*/
            'refined-magazine-logo-section-background' => '#ffffff',

            /*logo position*/
            'refined-magazine-custom-logo-position' => 'left',

            /*Site Layout Options*/
            'refined-magazine-site-layout-options' => 'full-width',
            'refined-magazine-boxed-width-options' => 1500,

            /*Top Header Section Default Value*/
            'refined-magazine-enable-top-header' => true,
            'refined-magazine-enable-top-header-social' => true,
            'refined-magazine-enable-top-header-menu' => true,
            'refined-magazine-enable-top-header-date' => true,
            'refined-magazine-top-header-date-format' => 'default-date',

            /*Treding News*/
            'refined-magazine-enable-trending-news' => true,
            'refined-magazine-enable-trending-news-text' => esc_html__('Trending News', 'refined-blocks'),
            'refined-magazine-trending-news-category' => 0,

            /*Menu Section*/
            'refined-magazine-enable-menu-section-search' => true,
            'refined-magazine-enable-sticky-primary-menu' => true,
            'refined-magazine-enable-menu-home-icon' => true,

            /*Header Ads Default Value*/
            'refined-magazine-enable-ads-header' => false,
            'refined-magazine-header-ads-image' => '',
            'refined-magazine-header-ads-image-link' => 'https://www.candidthemes.com/themes/refined-magazine/',

            /*Slider Section Default Value*/
            'refined-magazine-enable-slider' => true,
            'refined-magazine-select-category' => 0,
            'refined-magazine-select-category-featured-right' => 0,
            'refined-magazine-slider-post-date' => true,
            'refined-magazine-slider-post-author' => false,
            'refined-magazine-slider-post-category' => true,
            'refined-magazine-slider-post-read-time' => true,


            /*Sidebars Default Value*/
            'refined-magazine-sidebar-blog-page' => 'right-sidebar',
            'refined-magazine-sidebar-front-page' => 'right-sidebar',
            'refined-magazine-sidebar-archive-page' => 'right-sidebar',

            /*Blog Page Default Value*/
            'refined-magazine-content-show-from' => 'excerpt',
            'refined-magazine-excerpt-length' => 25,
            'refined-magazine-pagination-options' => 'numeric',
            'refined-magazine-read-more-text' => esc_html__('Read More', 'refined-blocks'),
            'refined-magazine-enable-blog-author' => false,
            'refined-magazine-enable-blog-category' => true,
            'refined-magazine-enable-blog-date' => true,
            'refined-magazine-enable-blog-comment' => false,
            'refined-magazine-enable-blog-tags' => false,

            /*Single Page Default Value*/
            'refined-magazine-single-page-featured-image' => true,
            'refined-magazine-single-page-related-posts' => true,
            'refined-magazine-single-page-related-posts-title' => esc_html__('Related Posts', 'refined-blocks'),
            'refined-magazine-enable-single-category' => true,
            'refined-magazine-enable-single-date' => true,
            'refined-magazine-enable-single-author' => true,


            /*Sticky Sidebar Options*/
            'refined-magazine-enable-sticky-sidebar' => true,

            /*Social Share Options*/
            'refined-magazine-enable-single-sharing' => true,
            'refined-magazine-enable-blog-sharing' => false,
            'refined-magazine-enable-static-page-sharing' => false,

            /*Footer Section*/
            'refined-magazine-footer-copyright' =>  esc_html__('All Rights Reserved 2022.', 'refined-blocks'),
            'refined-magazine-go-to-top' => true,


            /*Extra Options*/
            'refined-magazine-extra-breadcrumb' => true,
            'refined-magazine-breadcrumb-text' =>  esc_html__('You are Here', 'refined-blocks'),
            'refined-magazine-extra-preloader' => true,
            'refined-magazine-front-page-content' => false,
            'refined-magazine-extra-hide-read-time' => false,
            'refined-magazine-extra-post-formats-icons' => true,
            'refined-magazine-enable-category-color' => false,

            'refined-magazine-breadcrumb-display-from-option' => 'theme-default',
            'refined-magazine-breadcrumb-display-from-plugins' => 'yoast',

            'refined-magazine-blog-col-options' => 'two-columns',
            'refined-magazine-enable-post-carousel-below-slider' => true,
            'refined-magazine-post-carousel-below-slider-cat' => 0,
            'refined-magazine-enable-post-carousel-below-slider-title' => esc_html__('Featured Posts Carousel', 'refined-blocks'),

        );
        return apply_filters('refined_magazine_default_theme_options_values', $default_theme_options);
    }
endif;


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function refined_blocks_customize_register($wp_customize)
{

    $default = refined_magazine_default_theme_options_values();

    /*Blog Page Pagination Options*/
    $wp_customize->add_setting('refined_magazine_options[refined-magazine-blog-col-options]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['refined-magazine-blog-col-options'],
        'sanitize_callback' => 'refined_magazine_sanitize_select'
    ));
    $wp_customize->add_control('refined_magazine_options[refined-magazine-blog-col-options]', array(
        'choices' => array(
            'one-column'    => __('Single Column', 'refined-blocks'),
            'two-columns'   => __('Two Column', 'refined-blocks'),
        ),
        'label'     => __('Blog Column Options', 'refined-blocks'),
        'description' => __('Select the Required Blog Page Column', 'refined-blocks'),
        'section'   => 'refined_magazine_blog_page_section',
        'settings'  => 'refined_magazine_options[refined-magazine-blog-col-options]',
        'type'      => 'select',
        'priority'  => 9,
    ));


    /*Post Carousel Below Slider*/
    $wp_customize->add_section('refined_magazine_post_carousel_below_slider', array(
        'priority'       => 26,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Carousel Below Featured Section', 'refined-blocks'),
        'panel'          => 'refined_magazine_panel',
    ));
    /*Enable Post Carousel Below Slider*/
    $wp_customize->add_setting('refined_magazine_options[refined-magazine-enable-post-carousel-below-slider]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['refined-magazine-enable-post-carousel-below-slider'],
        'sanitize_callback' => 'refined_magazine_sanitize_checkbox'
    ));
    $wp_customize->add_control('refined_magazine_options[refined-magazine-enable-post-carousel-below-slider]', array(
        'label'     => __('Enable Post Carousel Below Slider', 'refined-blocks'),
        'description' => __('Enable post carousel below Slider.', 'refined-blocks'),
        'section'   => 'refined_magazine_post_carousel_below_slider',
        'settings'  => 'refined_magazine_options[refined-magazine-enable-post-carousel-below-slider]',
        'type'      => 'checkbox',
        'priority'  => 20,
    ));

    /*callback functions you may missed*/
    if (!function_exists('refined_blocks_post_carousel_enable')) :
        function refined_blocks_post_carousel_enable()
        {
            global $refined_magazine_theme_options;
            $posts_carousel = absint($refined_magazine_theme_options['refined-magazine-enable-post-carousel-below-slider']);
            if (1 == $posts_carousel) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    /*Carousel Category*/
    $wp_customize->add_setting('refined_magazine_options[refined-magazine-post-carousel-below-slider-cat]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['refined-magazine-post-carousel-below-slider-cat'],
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control(
        new refined_magazine_Customize_Category_Dropdown_Control(
            $wp_customize,
            'refined_magazine_options[refined-magazine-post-carousel-below-slider-cat]',
            array(
                'label'     => __('Select Category For Post Carousel', 'refined-blocks'),
                'description' => __('From the dropdown select the category for the first column.', 'refined-blocks'),
                'section'   => 'refined_magazine_post_carousel_below_slider',
                'settings'  => 'refined_magazine_options[refined-magazine-post-carousel-below-slider-cat]',
                'type'      => 'category_dropdown',
                'priority'  => 20,
                'active_callback' => 'refined_blocks_post_carousel_enable'
            )
        )
    );


    /*Post Carousel Title*/
    $wp_customize->add_setting('refined_magazine_options[refined-magazine-enable-post-carousel-below-slider-title]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['refined-magazine-enable-post-carousel-below-slider-title'],
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('refined_magazine_options[refined-magazine-enable-post-carousel-below-slider-title]', array(
        'label'     => __('Title Post Carousel Below Slider', 'refined-blocks'),
        'description' => __('Enter the title of Post Carousel.', 'refined-blocks'),
        'section'   => 'refined_magazine_post_carousel_below_slider',
        'settings'  => 'refined_magazine_options[refined-magazine-enable-post-carousel-below-slider-title]',
        'type'      => 'text',
        'priority'  => 20,
        'active_callback' => 'refined_blocks_post_carousel_enable',
    ));
}
add_action('customize_register', 'refined_blocks_customize_register', 999);

/**
 * Load new thumbnail widget
 */
require get_stylesheet_directory() . '/candid-thumbnail-three-col.php';

/**
 * Implement the Custom Header feature.
 */
require get_stylesheet_directory() . '/inc/custom-header.php';

if (!function_exists('refined_magazine_constuct_carousel')) {
    /**
     * Add carousel on header
     *
     * @since 1.0.0
     */
    function refined_magazine_constuct_carousel()
    {

        if (is_front_page()) {
            global $refined_magazine_theme_options;
            $refined_magazine_site_layout = $refined_magazine_theme_options['refined-magazine-site-layout-options'];
            $slider_cat = $refined_magazine_theme_options['refined-magazine-select-category'];
            $featured_cat = $refined_magazine_theme_options['refined-magazine-select-category-featured-right'];
            $refined_magazine_enable_date = $refined_magazine_theme_options['refined-magazine-slider-post-date'];
            $refined_magazine_enable_author = $refined_magazine_theme_options['refined-magazine-slider-post-author'];
?>
            <div class="refined-magazine-featured-block refined-magazine-ct-row refined-awesome-carousel clearfix">
                <?php

                refined_magazine_main_carousel($slider_cat);


                $query_args = array(
                    'post_type' => 'post',
                    'ignore_sticky_posts' => true,
                    'posts_per_page' => 4,
                    'cat' => $featured_cat
                );

                $query = new WP_Query($query_args);
                if ($query->have_posts()) :
                ?>
                    <div class="refined-magazine-col refined-magazine-col-2">
                        <div class="refined-magazine-inner-row clearfix">
                            <?php
                            $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();



                            ?>
                                <div class="refined-magazine-col">
                                    <div class="featured-section-inner ct-post-overlay">
                                        <?php
                                        if (has_post_thumbnail()) {
                                        ?>
                                            <div class="post-thumb">
                                                <?php
                                                refined_magazine_post_formats(get_the_ID());
                                                ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if ($refined_magazine_site_layout == 'boxed') {
                                                        the_post_thumbnail('refined-magazine-carousel-img');
                                                    } else {
                                                        the_post_thumbnail('refined-magazine-carousel-large-img');
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="post-thumb">
                                                <?php
                                                refined_magazine_post_formats(get_the_ID());
                                                ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if ($refined_magazine_site_layout == 'boxed') {
                                                    ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/refined-mag-carousel.jpg' ?>" alt="<?php the_title_attribute(); ?>">
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/refined-mag-carousel-large.jpg' ?>" alt="<?php the_title_attribute(); ?>">
                                                    <?php
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <div class="featured-section-details post-content">
                                            <div class="post-meta">
                                                <?php
                                                refined_magazine_featured_list_category(get_the_ID());
                                                ?>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="post-meta">
                                                <?php
                                                if ($refined_magazine_enable_date) {
                                                    refined_magazine_widget_posted_on();
                                                }
                                                refined_magazine_read_time_slider(get_the_ID());
                                                if ($refined_magazine_enable_author) {
                                                    refined_magazine_widget_posted_by();
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div> <!-- .featured-section-inner -->
                                </div>
                                <!--.refined-magazine-col-->
                            <?php
                                $i++;

                            endwhile;
                            wp_reset_postdata()
                            ?>

                        </div>
                    </div>
                    <!--.refined-magazine-col-->
                <?php
                endif;
                ?>

            </div><!-- .refined-magazine-ct-row-->
        <?php


        } //is_front_page
    }
}


/**
 * Add class in post list
 *
 * @since 1.0.0
 *
 */
add_filter('post_class', 'refined_blocks_post_column_class');
function refined_blocks_post_column_class($classes)
{
    global $refined_magazine_theme_options;
    if (!is_singular()) {
        $classes[] = esc_attr($refined_magazine_theme_options['refined-magazine-blog-col-options']);
    }
    return $classes;
}



if (!function_exists('refined_magazine_footer_siteinfo')) {
    /**
     * Add footer site info block
     *
     * @param none
     * @return void
     * @since 1.0.0
     *
     */
    function refined_magazine_footer_siteinfo()
    {
        ?>

        <div class="site-info" <?php refined_magazine_do_microdata('footer'); ?>>
            <div class="container-inner">
                <?php
                global $refined_magazine_theme_options;
                $refined_magazine_copyright = wp_kses_post($refined_magazine_theme_options['refined-magazine-footer-copyright']);
                if (!empty($refined_magazine_copyright)) :
                ?>
                    <span class="copy-right-text"><?php echo $refined_magazine_copyright; ?></span><br>
                <?php
                endif; //$refined_magazine_copyright
                ?>

                <a href="<?php echo esc_url(__('https://wordpress.org/', 'refined-blocks')); ?>" target="_blank">
                    <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf(esc_html__('Proudly powered by %s', 'refined-blocks'), 'WordPress');
                    ?>
                </a>
                <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf(esc_html__('Theme: %1$s by %2$s.', 'refined-blocks'), 'Refined Blocks', '<a href="https://www.candidthemes.com/" target="_blank">Candid Themes</a>');
                ?>
            </div> <!-- .container-inner -->
        </div><!-- .site-info -->
        <?php
    }
}


// Post Carousel from Customizer
if (!function_exists('refined_blocks_post_carousel_customizer')) {
    /**
     * Post Carousel from Customizer
     *
     * @since 1.0.0
     */
    function refined_blocks_post_carousel_customizer()
    {
        global $refined_magazine_theme_options;
        $cat_id = absint($refined_magazine_theme_options['refined-magazine-post-carousel-below-slider-cat']);
        $section_title = esc_html($refined_magazine_theme_options['refined-magazine-enable-post-carousel-below-slider-title']);
        $hide_read_time = $refined_magazine_theme_options['refined-magazine-extra-hide-read-time'];

        $query_args = array(
            'post_type' => 'post',
            'cat' => $cat_id,
            'posts_per_page' => 9,
            'ignore_sticky_posts' => true
        );

        $query = new WP_Query($query_args);

        if ($query->have_posts()) :

        ?>
            <div class="ct-header-carousel-section">
                <div class="container-inner">
                    <?php
                    if ($section_title) {
                    ?>
                        <h2 class="widget-title"> <?php echo $section_title; ?> </h2>
                    <?php
                    }
                    ?>
                    <div class="ct-header-carousel clearfix">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                        ?>
                            <div class="ct-carousel-single ct-post-overlay">
                                <?php
                                if (has_post_thumbnail()) {
                                ?>
                                    <div class="post-thumb">
                                        <?php
                                        refined_magazine_post_formats(get_the_ID());
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('refined-magazine-carousel-img'); ?>
                                        </a>
                                    </div>
                                <?php
                                } else {
                                ?>

                                    <div class="post-thumb">
                                        <?php
                                        refined_magazine_post_formats(get_the_ID());
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/refined-mag-carousel.jpg' ?>" alt="<?php the_title_attribute(); ?>">

                                        </a>
                                    </div>

                                <?php
                                }
                                ?>
                                <div class="featured-section-details post-content">
                                    <div class="post-meta">
                                        <?php
                                        refined_magazine_list_category(get_the_ID());
                                        ?>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="post-meta">
                                        <?php
                                        refined_magazine_posted_on();
                                        if ($hide_read_time != 1) {
                                            refined_magazine_read_time_words_count(get_the_ID());
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div> <!-- .container-inner -->
            </div> <!-- .ct-header-carousel-section -->
<?php
        endif;
    }
}
add_action('refined_blocks_post_carousel_customizer', 'refined_blocks_post_carousel_customizer', 10);


if (!function_exists('refined_magazine_front_page')) :

    function refined_magazine_front_page()
    {

        if (is_active_sidebar('refined-magazine-home-widget-area')) {
            dynamic_sidebar('refined-magazine-home-widget-area');
        }
        global $refined_magazine_theme_options;
        $refined_magazine_front_page_content = $refined_magazine_theme_options['refined-magazine-front-page-content'];

        if (false == $refined_magazine_front_page_content) {
            if ('posts' == get_option('show_on_front')) {
                if (have_posts()) :
                    /* Start the Loop */
                    echo "<div class='refined-blocks-article-wrapper'>";
                    while (have_posts()) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_format());
                    endwhile;
                    echo "</div>";
                    /**
                     * refined_magazine_post_navigation hook
                     * @since Refined Magazine 1.0.0
                     *
                     * @hooked refined_magazine_posts_navigation -  10
                     */
                    do_action('refined_magazine_action_navigation');

                else :
                    get_template_part('template-parts/content', 'none');
                endif;
            } else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                endwhile; // End of the loop.
            }
        }
    }

endif;
