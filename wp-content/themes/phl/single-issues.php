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

            <h1><?php the_field('title_h1'); ?></h1>

            <?php the_content(); ?>

        </div>
    </div>
<?php endwhile; ?>

<?php get_footer('popups'); ?>

<?php get_footer('issues'); ?>