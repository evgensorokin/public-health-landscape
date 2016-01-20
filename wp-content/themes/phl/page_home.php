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

        <div class="owl-carousel" id="owl-carousel">
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

    </div>
</section>

<?php get_footer(); ?>
