<?php
$angel_assets = get_template_directory_uri() . '/assets/images/';
$creazioni_url = get_post_type_archive_link('angel_creazione') ?: home_url('/creazioni/');
?>
    <footer>
        <div class="footer-grid">
            <div class="footer-signature">
                <img src="<?php echo esc_url($angel_assets . 'd66c7.png'); ?>" alt="<?php esc_attr_e('Monogramma Angel Candles', 'angel-candles'); ?>">
                <p><?php esc_html_e('Ogni candela racconta una emozione', 'angel-candles'); ?></p>
            </div>
            <section>
                <h2><?php esc_html_e('Angelcandles', 'angel-candles'); ?></h2>
                <img class="heading-line" src="<?php echo esc_url($angel_assets . 'cae64.svg'); ?>" alt="">
                <p class="about-copy"><?php esc_html_e('Candele create a mano, pensate per custodire atmosfere, ricordi e piccoli momenti speciali. Ogni creazione nasce con cura e racconta una storia unica.', 'angel-candles'); ?></p>
            </section>
            <section>
                <h2><?php esc_html_e('Scopri', 'angel-candles'); ?></h2>
                <img class="heading-line" src="<?php echo esc_url($angel_assets . 'cae64.svg'); ?>" alt="">
                <a href="<?php echo esc_url(add_query_arg('categoria', 'bomboniere', $creazioni_url)); ?>"><?php esc_html_e('Bomboniere', 'angel-candles'); ?></a>
                <a href="<?php echo esc_url(add_query_arg('categoria', 'idee-regalo', $creazioni_url)); ?>"><?php esc_html_e('Idee regalo', 'angel-candles'); ?></a>
                <a href="<?php echo esc_url(add_query_arg('categoria', 'festivita', $creazioni_url)); ?>"><?php esc_html_e('Festività', 'angel-candles'); ?></a>
                <a href="<?php echo esc_url(home_url('/candele/')); ?>"><?php esc_html_e('Personalizzazioni', 'angel-candles'); ?></a>
                <h2 class="info-title"><?php esc_html_e('Info', 'angel-candles'); ?></h2>
                <img class="heading-line" src="<?php echo esc_url($angel_assets . 'cae64.svg'); ?>" alt="">
                <a href="<?php echo esc_url(home_url('/privacy/')); ?>"><?php esc_html_e('Privacy', 'angel-candles'); ?></a>
                <a href="<?php echo esc_url(home_url('/cookie/')); ?>"><?php esc_html_e('Cookie', 'angel-candles'); ?></a>
                <a href="<?php echo esc_url(home_url('/note-legali/')); ?>"><?php esc_html_e('Note legali', 'angel-candles'); ?></a>
            </section>
            <section>
                <h2><?php esc_html_e('Contatti', 'angel-candles'); ?></h2>
                <img class="heading-line" src="<?php echo esc_url($angel_assets . 'b20bc.svg'); ?>" alt="">
                <div class="footer-socials">
                    <a href="https://www.facebook.com/angelcandles.it" target="_blank" rel="noopener noreferrer" aria-label="Facebook AngelCandles"><img src="<?php echo esc_url($angel_assets . '2da19.png'); ?>" alt=""></a>
                    <a href="https://www.instagram.com/angelcandles.it/" target="_blank" rel="noopener noreferrer" aria-label="Instagram AngelCandles"><img src="<?php echo esc_url($angel_assets . '8246d.png'); ?>" alt=""></a>
                    <a href="https://wa.me/393476806154?text=Ciao%2C%20vorrei%20avere%20informazioni%20su%20una%20creazione%20AngelCandles" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp AngelCandles"><img src="<?php echo esc_url($angel_assets . '04409.png'); ?>" alt=""></a>
                </div>
            </section>
            <span class="footer-divider footer-divider-one" aria-hidden="true"><img src="<?php echo esc_url($angel_assets . '7b1dc.svg'); ?>" alt=""></span>
            <span class="footer-divider footer-divider-two" aria-hidden="true"><img src="<?php echo esc_url($angel_assets . '3ff7f.svg'); ?>" alt=""></span>
            <span class="footer-divider footer-divider-three" aria-hidden="true"><img src="<?php echo esc_url($angel_assets . '3ff7f.svg'); ?>" alt=""></span>
        </div>
        <div class="copyright">
            <img class="footer-flower footer-flower-left" src="<?php echo esc_url($angel_assets . 'f314c.png'); ?>" alt="">
            <div class="copyright-text"><p>© <?php echo esc_html(wp_date('Y')); ?> AngelCandles · <?php esc_html_e('Tutti i diritti riservati', 'angel-candles'); ?></p><p class="powered-by">Powered by <a href="https://byoursite.com/" target="_blank" rel="noopener noreferrer">BYOURSITE</a></p></div>
            <img class="footer-flower footer-flower-right" src="<?php echo esc_url($angel_assets . '3e54a.png'); ?>" alt="">
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
