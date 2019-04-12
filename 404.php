<?php
/**
 *  * The template for displaying 404 pages (Not Found)
 *   *
 *    * @package WordPress
 *     * @subpackage Twenty_Thirteen
 *      * @since Twenty Thirteen 1.0
 *       */

get_header(); ?>

  <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">


      <div class="page-wrapper">
        <div class="page-content">
          <p>Erreur 404 page non trouvée !</p>
          <h2>Hey, Vous vous êtes perdu ?</h2>
          <p>N'hésitez pas à retourner à l'accueil !</p>
          <a href="<?php echo get_home_url(); ?>" class="home_link" > on y va ! </a>

        </div><!-- .page-content -->
      </div><!-- .page-wrapper -->

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_footer(); ?>
