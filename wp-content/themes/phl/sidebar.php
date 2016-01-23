<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
global $post;
$currentPostId = $post->ID;
$category = get_queried_object();

$arg = array('child_of' => $category->term_id, 'hide_empty' => 0);
$subCategories = get_categories($arg);

if($subCategories){
    foreach($subCategories as $fr){
        if($fr->cat_name == 'Features'){
            $features_slug = $fr->slug;
        }
    }
}

if(!empty($features_slug)){
    $args = array('post_type' => 'post', 'posts_per_page' => -1, 'category_name' => $features_slug, 'orderby' => 'post_date', 'order' => 'ASC');
    $loopFeatures = new WP_Query($args);
}

if($subCategories){
    foreach($subCategories as $fr){
        if($fr->cat_name == 'Regional News'){
            $news_slug = $fr->slug;
        }
    }
}

if(!empty($news_slug)){
    $args = array('post_type' => 'post', 'posts_per_page' => -1, 'category_name' => $news_slug, 'orderby' => 'post_date', 'order' => 'ASC');
    $loopNews = new WP_Query($args);
}
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>

    <aside class="col sidebar">
        <div class="sidebar-menu">

            <div class="title">In This <?= $category->cat_name ?> Issue</div>

            <?php if( $loopFeatures->have_posts() ) : ?>
                <ul>
                    <li class="sub-title">FEATURES:</li>
                    <?php while ( $loopFeatures->have_posts() ) : $loopFeatures->the_post(); $idPost = get_the_ID(); ?>
                    <li <?= $currentPostId == $idPost ? 'class="active"' : '' ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php $i++; endwhile; wp_reset_query(); ?>
                </ul>
            <?php endif; ?>

            <?php if( $loopNews->have_posts() ) : ?>
                <ul>
                    <li class="sub-title">REGIONAL NEWS</li>
                    <?php while ( $loopNews->have_posts() ) : $loopNews->the_post(); $idPost = get_the_ID(); ?>
                    <li <?= $currentPostId == $idPost ? 'class="active"' : '' ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php $i++; endwhile; wp_reset_query(); ?>
                </ul>
            <?php endif; ?>

        </div>
    </aside>

<?php endif; ?>
