<div id="blogs">

<div class="container">
<?php $sticky = get_option('sticky_posts'); ?>
<?php $posts = get_posts(array(
    'posts_per_page'    => -1,
    'post_type'         => 'post',
    'post__in'          => $sticky,
    'posts_per_page'    => 4,
));

if( $posts ): ?>
<div class="row">
<?php foreach( $posts as $post ): setup_postdata( $post ); ?>


<div class="col-sm-12 col-md-6 card-box">
<div class="img-box">
<?php echo get_avatar( get_the_author_meta( 'ID' ) , 90 ); ?>
</div>

<div class="card-blog">
<div class="card-text">
<h3><?php the_title(); ?></h3>
<p><?php the_field('desc_article'); ?></p>
</div>

<div class="button-box">
 <a class="" href="<?php the_permalink(); ?>">Lire Plus</a>
</div>
        </div>

</div>
    <?php endforeach; ?>

<!--fin row -->
</div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<!--fin contairen -->
</div>
<!--fin blogs -->
</div>
