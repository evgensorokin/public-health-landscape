<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage PHL
 * @since PHL 1.0
 */
?>

<footer>
    <div class="container text-center">

        <div class="social">
            <a href="<?php the_field('title_facebook', 'option'); ?>" target="_blank"><img src="<?php the_field('icon_facebook', 'option'); ?>" /></a>
            <a href="<?php the_field('title_twitter', 'option'); ?>" target="_blank"><img src="<?php the_field('icon_twitter', 'option'); ?>" /></a>
            <a href="<?php the_field('title_google_plus', 'option'); ?>" target="_blank"><img src="<?php the_field('icon_google_plus', 'option'); ?>" /></a>
        </div>

        <p><?php the_field('copyright', 'option'); ?></p>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
