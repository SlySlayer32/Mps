<?php
/**
 * The main template file
 *
 * @package MPS_Theme
 */

get_header();
?>

<?php if (is_front_page()) : ?>
    <?php get_template_part('templates/content', 'home'); ?>
<?php elseif (is_page()) : ?>
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
<?php else : ?>
    <div class="container section">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <p><?php esc_html_e('Sorry, no posts found.', 'mps-theme'); ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php
get_footer();
