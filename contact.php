<?php /* Template Name: CONTACT */ ?>
<?php get_header(); ?>

<div id="contact" class="container">

<div id="mapId"></div>
<div class="notice-box">
<a class="notice link-unstyled" href="#notice">
Nous livrons partout dans la zone verte !
<small>
   Vous n'êtes pas dans le cercle vert ?
</small>
</a>
</div>


<div class="lower-contact row">

<div class="contact-list col-md-5 col-12">
<ul>
    <span>Nous contacter</span>
    <li>
    <i class="far fa-user-circle"></i>
    Jessica Nassen</li>
    <li><a
        class='link-unstyled'
        target="_blank"
        href="https://www.facebook.com/jessica.nassen">
        <i class="fab fa-facebook"></i>
        Voir sur facebook</a>
    </li>
    <li><a
        class='link-unstyled'
        target="_blank"
        href="mailto:info@b-bio.be">
        <i class="fas fa-envelope-open-text"></i>
        info@b-bio.be</a>
    </li>
    <li> <i class="fas fa-map-marker-alt"></i>
        Rue Jean Lambert Sauveur 72, <small>4040 Herstal</small> </li>
</ul>

</div>
<div class="contact-form col-md-7 col-12"> <span>Et par mail</span>
 <?php echo do_shortcode('[contact-form-7 id="126"]'); ?> </div>
</div>

<p id="notice">Si vous n'êtes pas dans la zone verte veuillez nous contacter pour être livré
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
no sea takimata sanctus est Lorem ipsum dolor sit amet.
</p>
</div>
<?php get_footer(); ?>
