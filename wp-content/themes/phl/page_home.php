<?php
/* Template Name: Home page */
get_header();
?>

<section class="subscribe">
    <div class="container text-center">

        <h2 class="title"><?php the_field('title_subscribe'); ?></h2>

        <span class="bold"><?php the_field('subtitle_subscribe'); ?></span>

        <?php the_field('description_subscribe'); ?>

        <div class="form-subscribe">
            <?php echo do_shortcode('[contact-form-7 id="73" title="Subscribe"]'); ?>
        </div>

    </div>
</section>

<section class="art-calendar">
    <div class="container text-center">

        <h2 class="title"><?php the_field('title_slider_box'); ?></h2>

        <?php the_field('description_slider_box'); ?>

        <?php
            $categoryCalendar = get_category_by_slug('calendar');

            $args = array('parent' => $categoryCalendar->term_id);
            $categories = get_categories( $args );
        ?>

        <div class="owl-carousel" id="owl-carousel">
            <?php
                if( $categories ) {$i = 0;
                    foreach ($categories as $cat) {
                        $args = array('post_type' => 'post', 'posts_per_page' => -1, 'category_name' => $cat->slug, 'orderby' => 'post_date', 'order' => 'ASC');
                        $loop = new WP_Query( $args );
                        if( $loop->have_posts() ) : ?>

                            <?php while ( $loop->have_posts() ) :
                                $titlePost = get_the_title($loop->the_post());
                                if($titlePost == date('F') && $cat->name == date('Y')){
                                    $activeI = $i;
                                }
                                ?>
                                <a href="<?php the_permalink(); ?>" class="slide <?= $titlePost == date('F') && $cat->name == date('Y') ? 'active' : '' ?>">
                                    <p><?php the_title(); ?> <span><?= $cat->name; ?></span></p>
                                </a>
                            <?php $i++; endwhile; wp_reset_query(); ?>
                        <?php endif; ?>
            <?php $i++; } } ?>
        </div>

        <script type="application/javascript">
            var startMonthCarousel = <?= $activeI ?>;
        </script>

    </div>
</section>

<?php get_footer(); ?>