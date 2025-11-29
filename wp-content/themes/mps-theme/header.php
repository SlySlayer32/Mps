<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <div class="header-container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" aria-label="<?php bloginfo('name'); ?>">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="site-logo-text">Merlin<span>PS</span></span>
            <?php endif; ?>
        </a>

        <nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'mps-theme'); ?>">
            <button class="nav-toggle" id="nav-toggle" aria-label="<?php esc_attr_e('Toggle Navigation', 'mps-theme'); ?>" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <?php if (has_nav_menu('primary')) : ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'walker'         => new MPS_Nav_Walker(),
                    'fallback_cb'    => false,
                ));
                ?>
            <?php else : ?>
                <ul class="nav-menu" id="primary-menu">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo is_front_page() ? 'active' : ''; ?>">Home</a></li>
                    <li class="has-dropdown">
                        <a href="#">Services</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo esc_url(home_url('/services/end-of-lease-cleaning/')); ?>">End of Lease Cleaning</a></li>
                            <li><a href="<?php echo esc_url(home_url('/services/move-in-cleaning/')); ?>">Move In Cleaning</a></li>
                            <li><a href="<?php echo esc_url(home_url('/services/commercial-cleaning/')); ?>">Commercial Cleaning</a></li>
                            <li><a href="<?php echo esc_url(home_url('/services/pre-sale-cleaning/')); ?>">Pre-sale Cleaning</a></li>
                            <li><a href="<?php echo esc_url(home_url('/services/gardening-services/')); ?>">Gardening Services</a></li>
                            <li><a href="<?php echo esc_url(home_url('/services/carpet-cleaning/')); ?>">Carpet Cleaning</a></li>
                            <li><a href="<?php echo esc_url(home_url('/services/window-cleaning/')); ?>">Window Cleaning</a></li>
                            <li><a href="<?php echo esc_url(home_url('/services/minor-maintenance/')); ?>">Minor Maintenance</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About Us</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                </ul>
            <?php endif; ?>

            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary header-cta">Get a Quote</a>
        </nav>
    </div>
</header>

<main id="main-content" class="site-main">
