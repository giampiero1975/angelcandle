<?php
if (!defined('ABSPATH')) exit;
$shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$cart = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$logo_id = get_theme_mod('custom_logo');
$logo = $logo_id ? wp_get_attachment_image($logo_id, 'full', false, ['class'=>'ac-logo','alt'=>get_bloginfo('name')]) : '';
?><!doctype html>
<html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
<div class="ac-site">
  <div class="ac-topbar">Salvia • Avorio • Champagne</div>
  <header class="ac-header">
    <div class="ac-shell">
      <a class="ac-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo $logo ?: '<span class="ac-brand-text">AngelCandle</span>'; ?></a>
      <nav class="ac-nav" aria-label="Menu principale">
        <?php
        $items=[['Home',home_url('/')],['Candele',$shop],['Collezioni',home_url('/collezioni/')],['Eventi',home_url('/eventi/')],['Chi siamo',home_url('/chi-siamo/')],['Contatti',home_url('/contatti/')]];
        foreach($items as $item) printf('<a href="%s">%s</a>',esc_url($item[1]),esc_html($item[0]));
        ?>
      </nav>
      <a class="ac-cart" href="<?php echo esc_url($cart); ?>" aria-label="Carrello">
        <svg viewBox="0 0 32 32" aria-hidden="true"><path d="M8 11h16l1.5 17h-19L8 11Z"/><path d="M12 12V8a4 4 0 0 1 8 0v4"/></svg>
        <?php if(function_exists('WC') && WC()->cart): ?><span class="ac-cart-count"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span><?php endif; ?>
      </a>
    </div>
  </header>

  <main>
    <section class="ac-hero"><div class="ac-shell">
      <div class="ac-hero-copy">
        <div class="ac-hero-mark">AngelCandle</div>
        <h1>Natura<br>che illumina<br>le tue emozioni.</h1>
        <p>Candele fatte a mano con ingredienti naturali,<br>per rendere speciali i tuoi momenti.</p>
        <a class="ac-btn" href="<?php echo esc_url($shop); ?>">Scopri le collezioni <span>→</span></a>
      </div>
      <div class="ac-photo ac-hero-photo"><span class="ac-photo-label">Fotografia hero definitiva</span></div>
    </div></section>

    <section class="ac-benefits"><div class="ac-shell ac-benefit-grid">
      <div class="ac-benefit"><svg viewBox="0 0 48 48"><path d="M38 8C21 8 11 16 10 31c10 2 21-4 28-23Z"/><path d="M10 36c7-10 14-16 24-22"/></svg><strong>Ingredienti<br>naturali</strong></div>
      <div class="ac-benefit"><svg viewBox="0 0 48 48"><path d="M24 40S7 30 7 18c0-8 10-11 17-3 7-8 17-5 17 3 0 12-17 22-17 22Z"/></svg><strong>Fatte a mano<br>in Italia</strong></div>
      <div class="ac-benefit"><svg viewBox="0 0 48 48"><path d="M24 42c-9-6-14-13-14-21 7 1 12 4 14 9-1-10 2-17 7-23 4 7 5 14 2 22 4-5 9-8 15-8-1 9-7 16-16 21Z"/><path d="M24 42c-7-8-9-17-6-27"/></svg><strong>Personalizzabili<br>su richiesta</strong></div>
      <div class="ac-benefit"><svg viewBox="0 0 48 48"><path d="M8 19h32v23H8z"/><path d="M24 19v23M6 13h36v8H6z"/><path d="M24 13c-7 0-11-2-11-6 0-5 9-2 11 6Zm0 0c7 0 11-2 11-6 0-5-9-2-11 6Z"/></svg><strong>Idea regalo<br>per ogni occasione</strong></div>
    </div></section>

    <section class="ac-collections"><div class="ac-shell">
      <h2 class="ac-section-title">Le nostre collezioni</h2>
      <div class="ac-collection-grid">
        <article class="ac-card"><div class="ac-card-photo"></div><h3>Botanical</h3><p>La forza della natura</p></article>
        <article class="ac-card"><div class="ac-card-photo"></div><h3>Vanilla &amp; Cream</h3><p>Profumi che avvolgono</p></article>
        <article class="ac-card"><div class="ac-card-photo"></div><h3>Minimal</h3><p>Eleganza essenziale</p></article>
        <article class="ac-card"><div class="ac-card-photo"></div><h3>Wedding &amp; Eventi</h3><p>Dettagli che restano</p></article>
      </div>
    </div></section>

    <section class="ac-story"><div class="ac-shell">
      <div class="ac-photo ac-story-photo"><span class="ac-photo-label">Fotografia editoriale</span></div>
      <div class="ac-story-copy"><h2>Ogni candela<br>racconta una storia.</h2><a class="ac-btn" href="<?php echo esc_url(home_url('/chi-siamo/')); ?>">Scopri di più <span>→</span></a></div>
    </div></section>
  </main>
</div>
<?php wp_footer(); ?></body></html>
