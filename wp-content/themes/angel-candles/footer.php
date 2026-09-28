<?php $angel_assets = get_template_directory_uri() . '/assets/images/'; ?>
    <footer id="contatti">
        <div class="footer-grid">
            <div class="footer-signature">
                <img src="<?php echo esc_url($angel_assets . 'd66c7.png'); ?>" alt="<?php esc_attr_e('Monogramma Angel Candles', 'angel-candles'); ?>">
                <p><?php esc_html_e('Ogni candela racconta una emozione', 'angel-candles'); ?></p>
            </div>
            <section id="chi-sono">
                <h2><?php esc_html_e('Angelcandles', 'angel-candles'); ?></h2>
                <img class="heading-line" src="<?php echo esc_url($angel_assets . 'cae64.svg'); ?>" alt="">
                <p class="about-copy"><?php esc_html_e('Candele create a mano, pensate per custodire atmosfere, ricordi e piccoli momenti speciali. Ogni creazione nasce con cura e racconta una storia unica.', 'angel-candles'); ?></p>
            </section>
            <section>
                <h2><?php esc_html_e('Scopri', 'angel-candles'); ?></h2>
                <img class="heading-line" src="<?php echo esc_url($angel_assets . 'cae64.svg'); ?>" alt="">
                <a href="#creazioni"><?php esc_html_e('Bomboniere', 'angel-candles'); ?></a>
                <a href="#creazioni"><?php esc_html_e('Idee regalo', 'angel-candles'); ?></a>
                <a href="#creazioni"><?php esc_html_e('Festività', 'angel-candles'); ?></a>
                <a href="#creazioni"><?php esc_html_e('Personalizzazioni', 'angel-candles'); ?></a>
                <h2 class="info-title"><?php esc_html_e('Info', 'angel-candles'); ?></h2>
                <img class="heading-line" src="<?php echo esc_url($angel_assets . 'cae64.svg'); ?>" alt="">
                <a href="#contatti"><?php esc_html_e('Privacy', 'angel-candles'); ?></a>
                <a href="#contatti"><?php esc_html_e('Cookie', 'angel-candles'); ?></a>
                <a href="#contatti"><?php esc_html_e('Note legali', 'angel-candles'); ?></a>
            </section>
            <section>
                <h2><?php esc_html_e('Contatti', 'angel-candles'); ?></h2>
                <img class="heading-line" src="<?php echo esc_url($angel_assets . 'b20bc.svg'); ?>" alt="">
                <div class="footer-socials">
                    <a href="#contatti" aria-label="Facebook"><img src="<?php echo esc_url($angel_assets . '2da19.png'); ?>" alt=""></a>
                    <a href="#contatti" aria-label="Instagram"><img src="<?php echo esc_url($angel_assets . '8246d.png'); ?>" alt=""></a>
                    <a href="#contatti" aria-label="Pinterest"><img src="<?php echo esc_url($angel_assets . '04409.png'); ?>" alt=""></a>
                </div>
            </section>
            <span class="footer-divider footer-divider-one" aria-hidden="true"><img src="<?php echo esc_url($angel_assets . '7b1dc.svg'); ?>" alt=""></span>
            <span class="footer-divider footer-divider-two" aria-hidden="true"><img src="<?php echo esc_url($angel_assets . '3ff7f.svg'); ?>" alt=""></span>
            <span class="footer-divider footer-divider-three" aria-hidden="true"><img src="<?php echo esc_url($angel_assets . '3ff7f.svg'); ?>" alt=""></span>
        </div>
        <div class="copyright">
            <img class="footer-flower footer-flower-left" src="<?php echo esc_url($angel_assets . 'f314c.png'); ?>" alt="">
            <p>© <?php echo esc_html(wp_date('Y')); ?> AngelCandles · <?php esc_html_e('Tutti i diritti riservati', 'angel-candles'); ?></p>
            <img class="footer-flower footer-flower-right" src="<?php echo esc_url($angel_assets . '3e54a.png'); ?>" alt="">
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
