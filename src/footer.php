<?php

/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<footer>
    <div class="row d-flex flex-wrap">
        <div class="col-lg-2 col-sm-4 col-xs-12"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-rodape.png" /></a></div>

        <div class="social col-lg-2 col-sm-4 col-xs-12">
            <h3>Fique por dentro</h3>
            <nav>
                <a href="<?php the_social_facebook(); ?>" class="facebook">Nupill Cosméticos</a>
                <a href="<?php the_social_instagram(); ?>" class="instagram">@nupill_oficial</a>
                <a href="<?php the_social_youtube(); ?>" class="youtube">Nupill Oficial</a>
            </nav>
        </div>

        <div class="download col-lg-3 col-sm-4 col-xs-12">
            <h3>Downloads</h3>
            <p><a href="/download"><span>Clique aqui</span></a> para baixar nossos materiais institucionais (logos, lâminas, fotos de produtos, banners, etc).</p>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
            <h3>SAC - Fale conosco</h3>
            <p>
                <a href="tel:+55<?php echo preg_replace('/[^0-9]/', '', get_the_contact_phone()); ?>" target="_blank">
                    <span>Fixo</span> <?php the_contact_phone(); ?>
                </a>
            </p>
            <p>
                <a href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace('/[^0-9]/', '', get_the_contact_cell()); ?>&text=Olá,%20escreva%20aqui" target="_blank"><span>Whatsapp</span> <?php the_contact_cell(); ?></a>
            </p>

            <p>
                <a href="mailto:<?php the_contact_mail(); ?>" target="_blank">
                    <span>E-mail</span> <?php the_contact_mail(); ?>
                </a>
            </p>
        </div>
        <div class="copyright col-lg-2 col-sm-6 col-xs-12">
            <p>Copyright © 2020 <br />
                Nupill Cosméticos.</p>
        </div>
    </div>
</footer>
</div>
</section>
<script id="__bs_script__">
    //<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.12'><\/script>".replace("HOST", location.hostname));
    //]]>
</script>

<?php wp_footer(); ?>
</body>

</html>