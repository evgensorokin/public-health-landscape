<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<section class="home-top">

    <div class="container border-box-top">
        <header>
            <div class="clearfix">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" /></a>

                <?php
                wp_nav_menu( array(
                    'container'      => '',
                    'theme_location' => 'primary',
                    'menu_class'     => 'menu',
                ) );
                ?>
            </div>
        </header>

        <div class="name-month text-center">
            <p><?= date('F'); ?> <?= date('Y'); ?></p>
            <a href="#" class="btn">Read Volume 24</a>
        </div>
    </div>

</section>