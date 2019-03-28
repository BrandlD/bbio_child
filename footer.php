<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>

	</div><!-- #content -->

<footer id="colophon" class="py-5">
<div class="logo-full"> <?php the_custom_logo(); ?> </div>
<div class="container">
<div class="row ">
    <div class="col-sm-12 col-md">
        <ul>
            <li>Accueil</li>
            <li><a class="link-unstyled" href="">sub-item2</a></li>
            <li><a class="link-unstyled" href="">sub-item2</a></li>
            <li><a class="link-unstyled" href="">sub-item2</a></li>
            <li><a class="link-unstyled" href="">sub-item2</a></li>
        </ul>
    </div>
    <div class="col-sm-12 col-md">
        <ul>
            <li>Site</li>
            <li><a class="link-unstyled" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">Magasin</a></li>
            <li><a class="link-unstyled" href="/contact/">Contact</a></li>
            <li><a class="link-unstyled" href="">sub-item2</a></li>
            <li><a class="link-unstyled" href="">sub-item2</a></li>
        </ul>
    </div>
    <div class="col-sm-12 col-md">
        <ul>
            <li>Légal</li>
            <li><a class="link-unstyled" href="/cgu-cgv">CGV</a></li>
            <li><a class="link-unstyled" href="/cgu-cgv">CGU</a></li>
            <li><a class="link-unstyled" href="">Plan du site</a></li>
            <li><a class="link-unstyled" href="">sub-item2</a></li>
        </ul>
    </div>
</div>
</div>
<div class="copywrite text-muted text-center my-0">B-BIO owned made in <?php the_date('Y') ?> </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
