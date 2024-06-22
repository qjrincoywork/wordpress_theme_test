<?php
/**
 * WebFX_Test_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WebFX_Test_theme
 */

 if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function my_custom_theme_enqueue_scripts() {
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/lib.min.js', ['jquery'], null, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_scripts');

function enqueue_styles_from_folder() {
    $folder_path = get_template_directory() . '/assets/css/';
    if ($handle = opendir($folder_path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' !== $file && '..' !== $file && '.css' === substr($file, -4)) {
                $file_uri = get_template_directory_uri() . '/assets/css/' . $file;
                wp_enqueue_style('style-' . $file, $file_uri);
            }
        }
        closedir($handle);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_styles_from_folder');
function webfx_test_theme_add_slideshow() { ?>
    <?php if ( have_rows('slides') ) : ?>
        <div class="home-slider owl-carousel owl-theme">
            <?php while (have_rows('slides')) : the_row();?>
            <div class="item">
                <div class="slide-image">
                    <img src="<?= get_sub_field('image')['url'] ?>" alt="Slide">
                </div>
                <div class="container">
                    <div class="slide-content">
                        <h4 class="optinal-h4"><?= get_sub_field('alt_text') ?></h4>
                        <h3><?= get_sub_field('caption') ?></h3>
                        <a href="<?= get_sub_field('url') ?>" class="btn btn-primary"><?= get_sub_field('url_text') ?></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php
}

/**
 * Add welcome post
 *
 * @param post $post Post object.
 */
function webfx_test_theme_add_welcome_post($post) { ?>
    <div class="welcome-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-4 mobile-order2">
                    <div class="welcome-box team-box">
                        <div class="team-image">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="team-title">
                            <?= get_post(get_post_thumbnail_id())->post_title ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-8">
                    <div class="welcome-content">
                        <!-- <h4 class="optinal-h4"><?//= str_replace('-', ' ', $post->post_name); ?></h4> -->
                        <h4 class="optinal-h4"><?= get_the_excerpt(); ?></h4>
                        <h1><?php the_title(); ?></h1>
                        <?= apply_filters( 'the_content', $post->post_content ); ?>
                        <a href="#" class="btn btn-primary">Meet our Team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

/**
 * Add service post
 *
 * @param post $post Post object.
 */
function webfx_test_theme_add_service_post($post) { ?>
    <div class="home-services line-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="service-content">
                        <h4 class="optinal-h4"><?= get_the_excerpt(); ?></h4>
                        <h1><?php the_title(); ?></h1>
                        <?= apply_filters( 'the_content', $post->post_content ); ?>
                        <a href="#" class="btn btn-primary">Explore All Services</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <div class="service-owl owl-carousel owl-theme">
                            <div class="item">
                                <div class="row">
                                <?php if( have_rows('slides') ): ?>
                                    <?php while (have_rows('slides')) : the_row();?>
                                        <div class="col-md-6">
                                            <div class="service-box">
                                                <div class="service-image">
                                                    <img src="<?= get_sub_field('image')['url'] ?>" alt="Service" />
                                                </div>
                                                <div class="service-info">
                                                    <div class="service-inner">
                                                        <div class="service-icon comman-icon">
                                                            <span class="<?= get_sub_field('icon_class') ?>"></span>
                                                        </div>
                                                        <div class="service-title"><?= acf_esc_html( get_sub_field('caption') )?></div>
                                                        <a class="learn-more" href="<?= get_sub_field('url') ?>"><?= acf_esc_html( get_sub_field('url_text') )?> 
                                                        <span class="icon-arrow-right"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

/**
 * Add team post
 *
 * @param post $post Post object.
 */
function webfx_test_theme_add_team_post($post) { ?>
    <div class="home-team">
        <div class="team-banner">
            <div class="banner-image">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php echo get_the_post_thumbnail($post->ID); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="team-content">
            <div class="container">
                <div class="team-wrap">
                    <h4 class="optinal-h4"><?= get_post(get_post_thumbnail_id())->post_title ?></h4>
                    <h1><?= get_post(get_post_thumbnail_id())->post_excerpt ?></h1>
                    <div class="row">
                        <?php if( have_rows('slides') ): ?>
                            <?php if( have_rows('slides') ): ?>
                                <?php while (have_rows('slides')) : the_row();?>
                                <div class="col-md-4">
                                    <div class="team-box">
                                        <div class="team-image">
                                            <img src="<?= get_sub_field('image')['url'] ?>" alt="Team" />
                                            <div class="team-hover">
                                                <div class="team-h-inner">
                                                    <div class="comman-icon">
                                                        <span class="<?= get_sub_field('icon_class') ?>"></span>
                                                    </div>
                                                    <div class="more-div">
                                                        <a class="learn-more yellow-link" href="<?= get_sub_field('url') ?>"><?= acf_esc_html( get_sub_field('url_text') )?> 
                                                            <span class="icon-arrow-right"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="team-title">
                                            <?= acf_esc_html( get_sub_field('caption') )?>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="meet-button">
                        <a href="#" class="btn btn-secondary">Meet the Whole Team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

/**
 * Add exotic post
 *
 * @param post $post Post object.
 */
function webfx_test_theme_add_exotic_post($post) { ?>
    <div class="exotic-care">
        <div class="container">
            <div class="exotic-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h4 class="optinal-h4"><?= get_the_excerpt(); ?></h4>
                        <h1><?php the_title(); ?></h1>
                        <?= apply_filters( 'the_content', $post->post_content ); ?>
                    </div>
                    <div class="col-lg-5">
                        <div class="exotic-images">
                            <?php if( have_rows('slides') ): ?>
                                <?php if( have_rows('slides') ): ?>
                                    <?php while (have_rows('slides')) : the_row();?>
                                    <div class="exotic-image1 team-box">
                                        <div class="team-image">
                                            <img src="<?= get_sub_field('image')['url'] ?>" alt="Exotic" />
                                        </div>
                                        <div class="team-title">
                                            <?= acf_esc_html( get_sub_field('caption') )?>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

/**
 * Add youtube playlist post
 *
 * @param post $post Post object.
 */
function webfx_test_theme_add_playlist_post($post) { ?>
    <div class="fun-fact line-bg">
        <div class="container">
            <div class="fun-friday">
                <?php the_title(); ?>
                <span class="friday-label"><?= get_the_excerpt(); ?></span>
            </div>
            <div class="fun-fact-owl owl-carousel">
                <?php if( have_rows('slides') ): ?>
                    <?php while (have_rows('slides')) : the_row();?>
                    <div class="item">
                        <div class="fun-image">
                            <img src="<?= get_sub_field('image')['url'] ?>" alt="Video">
                        </div>
                        <div class="fun-content">
                            <p>
                                <?= get_sub_field('caption') ?>
                            </p>
                            <a class="btn btn-primary" href="javascript:void(0);">View Our Video Library</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
}

/**
 * Add testimonials and blog post
 *
 * @param post $post Post object.
 */
function webfx_test_theme_add_testi_and_blog_post($post) { ?>
    <div class="testi-blog">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="testimonials">
                        <div class="comman-icon">
                            <span class="icon-quotes"></span>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <a class="btn btn-primary" href="<?= $post->guid ?>"><?= get_the_excerpt(); ?></a>
                        <div class="testi-owl owl-carousel">
                            <?php if( have_rows('testimonials') ): ?>
                                <?php while (have_rows('testimonials')) : the_row();?>
                                <div class="item">
                                    <p><?= get_sub_field('content') ?><br />
                                    </p>
                                    <b>- <?= get_sub_field('author') ?></b>
                                </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home-blog">
                        <?php if( have_rows('blog') ): ?>
                            <?php while (have_rows('blog')) : the_row();?>
                            <div class="blog-title">
                                <h4 class="optinal-h4"><?= get_sub_field('title') ?></h4>
                                <a class="btn btn-secondary" href="<?= get_sub_field('blogs_url') ?>"><?= get_sub_field('blogs_url_text') ?></a>
                            </div>
                            <div class="blog-main">
                                <div class="blog-image">
                                    <img src="<?= get_sub_field('image')['url'] ?>" alt="Blog" />
                                </div>
                                <div class="blog-content">
                                    <div class="blog-inner">
                                        <h4><?= get_sub_field('caption') ?></h4>
                                        <p><?= mb_substr(get_sub_field('content'), 0, 50); ?></p>
                                        <div class="readmore">
                                            <a class="btn btn-primary" href="<?= get_sub_field('blog_url') ?>"><?= get_sub_field('blog_url_text') ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}


