<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="ac-header">
    <div class="ac-header__inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="ac-brand" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="ac-brand__name"><?php bloginfo('name'); ?></span>
            <?php endif; ?>
        </a>

        <button class="ac-menu-toggle" type="button" aria-expanded="false" aria-controls="ac-primary-nav">
            <span></span><span></span><span></span>
            <span class="screen-reader-text"><?php esc_html_e('Apri menu', 'angelcandle'); ?></span>
        </button>

        <nav id="ac-primary-nav" class="ac-nav" aria-label="<?php esc_attr_e('Menu principale', 'angelcandle'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'ac-nav__menu',
                'fallback_cb'    => 'angelcandle_primary_menu_fallback',
            ]);
            ?>
        </nav>

        <div class="ac-actions">
            <a class="ac-action" href="<?php echo esc_url(home_url('/?s=')); ?>" aria-label="<?php esc_attr_e('Cerca', 'angelcandle'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6.5"></circle><path d="m16 16 4 4"></path></svg>
            </a>

            <?php if (class_exists('WooCommerce')) : ?>
                <a class="ac-action" href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" aria-label="<?php esc_attr_e('Il mio account', 'angelcandle'); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="3.5"></circle><path d="M5 20c.7-4 3.1-6 7-6s6.3 2 7 6"></path></svg>
                </a>
                <a class="ac-action ac-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>" aria-label="<?php esc_attr_e('Carrello', 'angelcandle'); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5h2l2 10h9l2-7H7"></path><circle cx="10" cy="19" r="1"></circle><circle cx="17" cy="19" r="1"></circle></svg>
                    <span class="ac-cart__count"><?php echo WC()->cart ? esc_html(WC()->cart->get_cart_contents_count()) : '0'; ?></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>
