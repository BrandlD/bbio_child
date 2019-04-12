<?php /* Template Name: CONTACT */ ?>
<?php get_header(); ?>

<div id="contact" class="container">

<div id="mapId"></div>
<div class="notice-box">
<a class="notice link-unstyled" href="#notice"><?php the_field('short_notice', 'option'); ?></a>
</div>


<div class="lower-contact row">

<div class="contact-list col-md-5 col-12">
<ul>
    <span>Nous contacter</span>
    <li>
    <i class="far fa-user-circle"></i> Jessica Nassen</li>
    <li><a
        class='link-unstyled'
        target="_blank"
        href="https://www.facebook.com/BbioHerstal">
        <i class="fab fa-facebook"></i><?php the_field('facebook_texte', 'option'); ?></a>
    </li>
    <li><a
        class='link-unstyled'
        target="_blank"
        href="mailto:info@b-bio.be">
        <i class="fas fa-envelope-open-text"></i>
        info@b-bio.be</a>
    </li>
    <li> <i class="fas fa-map-marker-alt"></i><?php the_field('business_adresse', 'option'); ?></li>
</ul>

</div>
<div class="contact-form col-md-7 col-12"> <span>Et par mail</span>
 <?php echo do_shortcode('[contact-form-7 id="126"]'); ?> </div>
</div>

<p id="notice"><?php the_field('long_notice', 'option'); ?></p>
</div>
<?php get_footer(); ?>
