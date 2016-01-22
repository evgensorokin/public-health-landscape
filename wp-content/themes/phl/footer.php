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
            <a href="<?php the_field('title_facebook', 'option'); ?>"><img src="<?php the_field('icon_facebook', 'option'); ?>" /></a>
            <a href="<?php the_field('title_twitter', 'option'); ?>"><img src="<?php the_field('icon_twitter', 'option'); ?>" /></a>
            <a href="<?php the_field('title_google_plus', 'option'); ?>"><img src="<?php the_field('icon_google_plus', 'option'); ?>" /></a>
        </div>

        <p><?php the_field('copyright', 'option'); ?></p>

    </div>
</footer>

<div class="popup calendar" id="calendar">
    <div class="popup-wrapper">

        <div class="container">

            <div class="popup-content">
                <span class="close-btn"><img src="<?php echo get_template_directory_uri(); ?>/img/close-popup.png" /></span>

                <div class="popup-title text-center">The Calendar</div>

                <?php
                $categoryCalendar = get_category_by_slug('calendar');

                $args = array('parent' => $categoryCalendar->term_id);
                $categories = get_categories( $args );
                ?>

                <div class="box-slider">
                    <div class="owl-carousel" id="owl-carousel-calendar-popup">
                        <?php $activeIPopup = 1;
                        if( $categories ) {
                            foreach ($categories as $cat) {
                                if($cat->name != date("Y")) continue;

                                $args = array('post_type' => 'post', 'posts_per_page' => 12, 'category_name' => $cat->slug, 'orderby' => 'post_date', 'order' => 'ASC');
                                $loop = new WP_Query( $args );

                                if( $loop->have_posts() ) : ?>

                                <?php $i = 0; while ( $loop->have_posts() ) :
                                    $titlePost = get_the_title($loop->the_post());
                                    if($titlePost == date('F') && $cat->name == date('Y')){
                                        $activeIPopup = $i;
                                    }
                                    ?>
                                    <a href="<?php the_permalink(); ?>" class="slide <?= $titlePost == date('F') ? 'active' : '' ?>">
                                        <p><?php the_title(); ?> <span><?= date('Y'); ?></span></p>
                                    </a>
                                    <?php $i++; endwhile; wp_reset_query(); ?>
                                <?php endif; ?>
                        <?php } } ?>
                    </div>
                </div>

                <script type="application/javascript">
                    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    var startMonthCarouselPopup = <?= $activeIPopup ?>;
                </script>

                <?php
                $categoryCalendar = get_category_by_slug('calendar');

                $args = array('parent' => $categoryCalendar->term_id);
                $categories = get_categories( $args );

                if( $categories ) { ?>

                <div class="popup-pagination">
                    <ul>
                        <?php foreach ($categories as $cat) { ?>
                            <li class="<?= $cat->name == date('Y') ? 'active' : '' ?>" data-slug="<?= $cat->slug ?>"><?= $cat->cat_name ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <?php } ?>
            </div>

        </div>

    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
