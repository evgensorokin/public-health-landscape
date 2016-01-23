<?php
/* Template Name: Calendar Month page */
get_header('issues');

$category = get_queried_object();
?>
    <div class="clearfix">

        <?php get_sidebar(); ?>

        <div class="col content">

            <h1><?php the_field('category_title_h1', $category->taxonomy.'_'.$category->term_id); ?></h1>

            <?php the_field('category_description', $category->taxonomy.'_'.$category->term_id); ?>

            <div class="shareThis">
                <strong>Share this article on:</strong>
                <?php echo do_shortcode('[addtoany]'); ?>
            </div>

        </div>
    </div>

<?php get_footer('popups'); ?>

<?php get_footer('issues'); ?>