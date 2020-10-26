<?php

/**
 * Template Name: Pagina SAC
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!-- middle -->
<section class="middle">




    <!-- bloco Internal -->
    <div class="sac internal">
        <div class="row d-flex flex-wrap">

            <div class="col-lg-6 col-sm-6 col-xs-12 order-1 order-sm-0 description">
                <h1>SAC</h1>
                <h3>Serviço de Atendimento ao Consumidor.</h3>
                <p>Estamos prontos para atendê-lo para tirar qualquer dúvida, seja você parceiro, revendedor ou cliente final. Entre em contato pelos endereços abaixo:</p>

                <div class="contact">
                    <p>
                        <a href="tel:+55<?php echo preg_replace('/[^0-9]/', '', get_the_contact_phone()); ?>" target="_blank">
                            <span>Fixo</span> <?php the_contact_phone(); ?>
                        </a>
                    </p>
                    <p>
                        <a href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace('/[^0-9]/', '', get_the_contact_cell()); ?>&text=Olá,%20escreva%20aqui" target="_blank">
                            <span>Whatsapp</span> <?php the_contact_cell(); ?>
                        </a>
                    </p>

                    <p>
                        <a href="mailto:<?php the_contact_mail(); ?>" target="_blank">
                            <span>E-mail</span>
                            <?php the_contact_mail(); ?>
                        </a>
                    </p>
                </div>

                <!-- bloco Form Contact -->
                <div class="form-contact description">
                    <h3>Fale Conosco</h3>
                    <form name="form-contact" action="" method="GET">
                        <div class="row d-flex align-items-center justify-content-start justify-content-sm-center">
                            <div class="col-lg-12 col-sm-12 col-xs-12 text">
                                <p>Ou preencha o formulário abaixo e aguarde nossa resposta:</p>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                Nome:
                                <input type="text" name="nome" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                E-mail:
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                Telefone:
                                <input type="tel" name="telefone" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                Assunto:
                                <input type="text" name="assunto" class="form-control" required>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                Digite sua mensagem:
                                <textarea name="mensagem" class="form-control" required></textarea>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input type="submit" class="form-control btn btn-blue" value="Enviar minha mensagem">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /bloco Form Contact -->

            </div>

            <div class="col-lg-6 col-sm-6 col-xs-12 order-0 order-sm-1 image">
                <?php
                // check if the post has a Post Thumbnail assigned to it.
                if (has_post_thumbnail()) {
                    the_post_thumbnail();
                }
                ?>
            </div>

        </div>
        <!-- /bloco Internal -->


</section>
<!-- /middle -->

<?php get_footer(); ?>