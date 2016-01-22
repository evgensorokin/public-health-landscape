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
                    <div class="owl-carousel">
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
                                            <p><?php the_title(); ?><span><?= date('Y'); ?></span></p>
                                        </a>
                                        <?php $i++; endwhile; wp_reset_query(); ?>
                                <?php endif; ?>
                            <?php } } ?>
                    </div>
                </div>

                <script type="application/javascript">var startMonthCarouselPopup = <?= $activeIPopup ?>;</script>

                <?php
                $categoryCalendar = get_category_by_slug('calendar');

                $args = array('parent' => $categoryCalendar->term_id);
                $categories = get_categories( $args );

                if( $categories ) { ?>

                    <div class="popup-pagination calendar">
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

<div class="popup issues" id="issues">
    <div class="popup-wrapper">

        <div class="container">

            <div class="popup-content">
                <span class="close-btn"><img src="<?php echo get_template_directory_uri(); ?>/img/close-popup.png" /></span>

                <div class="popup-title text-center">See Previous Issues</div>

                <?php
                $categoryIssues = get_category_by_slug('issues');

                $args = array('parent' => $categoryIssues->term_id, 'hide_empty' => 0);
                $categories = get_categories( $args );
                ?>

                <div class="box-slider">
                    <div class="owl-carousel">
                        <?php $activeIPopup = 1;
                        if( $categories ) {
                            foreach ($categories as $cat) {
                                if($cat->name != date("Y")) continue;

                                $args = array('parent' => $cat->term_id, 'hide_empty' => 0);
                                $categories = get_categories( $args );

                                if( $categories ) :
                                    foreach ($categories as $catS) { ?>
                                        <a href="<?php echo get_category_link($catS->cat_ID); ?>" class="slide">
                                            <p><?= $catS->cat_name ?><span><?= $cat->cat_name; ?></span></p>
                                        </a>
                                        <?php } wp_reset_query(); ?>
                                <?php endif; ?>
                            <?php } } ?>
                    </div>
                </div>

                <script type="application/javascript">var startMonthCarouselPopup = <?= $activeIPopup ?>;</script>

                <?php
                $categoryIssues = get_category_by_slug('issues');

                $args = array('parent' => $categoryIssues->term_id, 'hide_empty' => 0);
                $categories = get_categories( $args );

                if( $categories ) { ?>

                    <div class="popup-pagination issues">
                        <ul>
                            <?php foreach ($categories as $cat) { ?>
                                <li class="<?= $cat->name == date('Y') ? 'active' : '' ?>" data-id="<?= $cat->cat_ID ?>"><?= $cat->cat_name ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } ?>
            </div>

        </div>

    </div>
</div>

<script type="application/javascript">var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';</script>