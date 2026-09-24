<?php
if (!defined('ABSPATH')) { exit; }
get_header();
?>
<main class="ac-home">
  <div class="ac-topbar">Salvia • Avorio • Champagne</div>

  <section class="ac-hero">
    <div class="ac-hero__copy">
      <p class="ac-kicker">AngelCandle</p>
      <h1>Natura<br>che illumina<br>le tue emozioni.</h1>
      <p>Candele fatte a mano con cura, pensate per rendere speciali i tuoi momenti.</p>
      <a class="ac-btn" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>">Scopri le collezioni <span>→</span></a>
    </div>
    <div class="ac-hero__visual" aria-label="Immagine hero AngelCandle">
      <div class="ac-placeholder"><span>Qui inseriremo la fotografia hero definitiva</span></div>
    </div>
  </section>

  <section class="ac-benefits">
    <div class="ac-wrap ac-benefits__grid">
      <div class="ac-benefit"><div class="ac-benefit__icon">♧</div><strong>Ingredienti<br>naturali</strong></div>
      <div class="ac-benefit"><div class="ac-benefit__icon">♡</div><strong>Fatte a mano<br>in Italia</strong></div>
      <div class="ac-benefit"><div class="ac-benefit__icon">❀</div><strong>Personalizzabili<br>su richiesta</strong></div>
      <div class="ac-benefit"><div class="ac-benefit__icon">♢</div><strong>Idea regalo<br>per ogni occasione</strong></div>
    </div>
  </section>

  <section class="ac-collections">
    <div class="ac-wrap">
      <h2 class="ac-section-title">Le nostre collezioni</h2>
      <div class="ac-collections__grid">
        <article class="ac-card"><div class="ac-card__image"><span>Foto collezione</span></div><h3>Botanical</h3><p>La forza della natura</p></article>
        <article class="ac-card"><div class="ac-card__image"><span>Foto collezione</span></div><h3>Vanilla &amp; Cream</h3><p>Profumi che avvolgono</p></article>
        <article class="ac-card"><div class="ac-card__image"><span>Foto collezione</span></div><h3>Minimal</h3><p>Eleganza essenziale</p></article>
        <article class="ac-card"><div class="ac-card__image"><span>Foto collezione</span></div><h3>Wedding &amp; Eventi</h3><p>Dettagli che restano</p></article>
      </div>
    </div>
  </section>

  <section class="ac-story">
    <div class="ac-story__visual"><div class="ac-placeholder"><span>Fotografia editoriale AngelCandle</span></div></div>
    <div class="ac-story__copy">
      <h2>Ogni candela<br>racconta una storia.</h2>
      <a class="ac-btn" href="<?php echo esc_url(home_url('/chi-siamo/')); ?>">Scopri di più <span>→</span></a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
