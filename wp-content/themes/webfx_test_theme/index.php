<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package my_custom_theme
 */

if ( ! defined( 'TESTIMONIAL' ) ) {
    define( 'TESTIMONIAL', 'testimonial' );
}
if ( ! defined( 'BLOG' ) ) {
    define( 'BLOG', 'blog' );
}
get_header();
?>

<?php
if ( have_posts() ) :
    if ( is_front_page() && ! is_home()) :
        ?>
    <header>
        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    </header>
    <?php endif; ?>
    <?php while (have_posts()) : the_post();?>
    <?php
        switch (get_the_category()[0]->slug) {
            case 'slider':
                webfx_test_theme_add_slideshow();
                break;
            case 'welcome':
                webfx_test_theme_add_welcome_post($post);
                break;
            case 'services':
                webfx_test_theme_add_service_post($post);
                break;
            case 'team':
                webfx_test_theme_add_team_post($post);
                break;
            case 'exotic':
                webfx_test_theme_add_exotic_post($post);
                break;
            case 'playlist':
                webfx_test_theme_add_playlist_post($post);
                break;
            case 'testimonial':
                webfx_test_theme_add_testi_and_blog_post($post);
                break;
        }
    ?>    
    <?php endwhile; ?>
<?php else: ?>
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>

<?php
get_sidebar();
get_footer();
