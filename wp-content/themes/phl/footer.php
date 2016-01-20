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

                <div class="owl-carousel" id="owl-carousel-popup">
                    <a href="#" class="slide">
                        <p>January <span>2016</span></p>
                    </a>
                    <a href="#" class="slide">
                        <p>February <span>2016</span></p>
                    </a>
                    <a href="#" class="slide">
                        <p>March <span>2016</span></p>
                    </a>
                    <a href="#" class="slide">
                        <p>April <span>2016</span></p>
                    </a>
                    <a href="#" class="slide">
                        <p>May <span>2016</span></p>
                    </a>
                    <a href="#" class="slide">
                        <p>June <span>2016</span></p>
                    </a>
                    <a href="#" class="slide">
                        <p>July <span>2016</span></p>
                    </a>
                </div>

                <div class="popup-pagination">
                    <ul>
                        <li><a href="#">2006</a></li>
                        <li><a href="#">2007</a></li>
                        <li><a href="#">2008</a></li>
                        <li><a href="#">2009</a></li>
                        <li><a href="#">2010</a></li>
                        <li><a href="#">2011</a></li>
                        <li><a href="#">2012</a></li>
                        <li class="active"><a href="#">2013</a></li>
                        <li><a href="#">2014</a></li>
                        <li><a href="#">2015</a></li>
                        <li><a href="#">2016</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
