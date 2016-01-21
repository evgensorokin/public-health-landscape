<?php
/* Template Name: Calendar Month page */
get_header('month');
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

                    <select>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                    </select>

                    <ul>
                        <li class="active"><a href="#">Jan</a></li>
                        <li><a href="#">Feb</a></li>
                        <li><a href="#">Mar</a></li>
                        <li><a href="#">Apr</a></li>
                        <li><a href="#">May</a></li>
                        <li><a href="#">Jun</a></li>
                        <li><a href="#">Jul</a></li>
                        <li><a href="#">Aug</a></li>
                        <li><a href="#">Sep</a></li>
                        <li><a href="#">Oct</a></li>
                        <li><a href="#">Nov</a></li>
                        <li><a href="#">Dec</a></li>
                    </ul>

                </div>

            </div>

        </div>
    </section>
<?php endwhile; ?>

<?php get_footer('month'); ?>