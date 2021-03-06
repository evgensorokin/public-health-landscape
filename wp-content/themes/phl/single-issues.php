<?php
/* Template Name Posts: Issues template */
get_header('issues');
global $post;
$postId = $post->ID;
?>
<?php
// Start the loop.
while ( have_posts() ) : the_post(); ?>
    <div class="clearfix">

        <?php get_sidebar('issues'); ?>

        <div class="col content">

            <h3><?php the_field('title_h3'); ?></h3>
            <h1><?php the_field('title_h1'); ?></h1>

            <div class="description-box">
                <?php the_content(); ?>
            </div>

            <div class="shareThis">
                <strong>Share this article on:</strong>
                <?php echo do_shortcode('[addtoany]'); ?>
            </div>

        </div>
    </div>
<?php endwhile; ?>

<?php get_footer('popups'); ?>

<?php get_footer('issues'); ?>