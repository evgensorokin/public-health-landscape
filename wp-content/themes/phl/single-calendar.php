<?php
/* Template Name Posts: Calendar template */
get_header('month');
global $post;
$postId = $post->ID;
?>
<?php
// Start the loop.
while ( have_posts() ) : the_post(); ?>
    <section class="month-page">
        <div class="container">

            <div class="perl-box">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-close"><img src="<?php echo get_template_directory_uri(); ?>/img/back-close.png" /></a>

                <div class="nicescroll row clearfix">

                    <div class="col col-50">

                        <h1><?php the_field('title_h1'); ?></h1>

                        <div class="desc"><?php the_content(); ?></div>

                        <?php $file = get_field('download_wallpaper'); if( $file ): ?>

                            <div class="text-center"><a href="<?= $file; ?>" class="btn">Download <?php the_title(); ?> Wallpaper</a></div>

                        <?php endif; ?>

                    </div>
                    <div class="col col-50">

                        <?php $images = get_field('gallery'); if( $images ): ?>
                            <div class="images-post">
                                <?php foreach( $images as $image ): ?>
                                    <div class="img">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php the_field('second_description'); ?>

                    </div>

                </div>

                <div class="pagination-month clearfix">

                    <?php
                    $categoryCalendar = get_category_by_slug('calendar');
                    $currentCategory = get_the_category($postId);

                    $args = array('parent' => $categoryCalendar->term_id);
                    $categories = get_categories( $args );

                    if( $categories ) { ?>
                        <select></select>

                        <div class="nice-select">
                            <span class="current"><?= $currentCategory[0]->cat_name; ?></span>
                            <ul class="list">
                                <?php foreach ($categories as $cat) { ?>
                                <li class="option <?= $cat->cat_name == $currentCategory[0]->cat_name ? 'selected' : '' ?>" onclick="redirectLink('<?php echo esc_url( home_url( '/' ) ); ?>calendar/<?= $cat->cat_name ?>/january')"><?= $cat->cat_name ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php
                    $args = array('post_type' => 'post', 'posts_per_page' => 12, 'category_name' => $currentCategory[0]->slug, 'orderby' => 'post_date', 'order' => 'ASC');
                    $loop = new WP_Query( $args );
                    if( $loop->have_posts() ) : ?>
                    <ul>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <li <?php if($postId == get_the_ID()) : ?>class="active"<?php endif; ?>><a href="<?php the_permalink(); ?>"><?= substr(get_the_title(), 0, 3); ?></a></li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </section>
<?php endwhile; ?>

<?php get_footer('month'); ?>