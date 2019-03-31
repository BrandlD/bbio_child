<?php global $woocommerce; ?>
<?php if ( is_front_page() ) : ?>
  <nav id="site-navigation" class="main-navigation navbar navbar-expand-lg not-top  ">
<?php  else : ?>
<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg ">
<?php endif; ?>

<?php the_custom_logo() ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu-wrap" aria-controls="primary-menu-wrap" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
        </button>
<?php
wp_nav_menu( array(
  'theme_location'  => 'menu-1',
  'menu_id'         => 'primary-menu',
  'container'       => 'div',
  'container_class' => 'collapse navbar-collapse',
  'container_id'    => 'primary-menu-wrap',
  'menu_class'      => 'navbar-nav ml-auto nav-fill w-100 mx-auto',
  'fallback_cb'     => '__return_false',
  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  'depth'           => 2,
  'walker'          => new WP_bootstrap_4_walker_nav_menu()
) );
?>

<a class="link-unstyled" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
<i class="fas fa-shopping-basket basket-payement">
  <span class="badge badge-danger">
   <?php echo $woocommerce->cart->get_cart_contents_count(); ?>
  </span>
</i>
</a>
</nav><!-- #site-navigation -->
