<?php if( get_field('img_article') ): ?>
    <img class="img-fluid main-img" src="<?php the_field('img_article'); ?>" />
<?php endif; ?>

<div class="container">
    <h1 class="title-article"><?php the_title() ?></h1>
    <p class="content-article"><?php the_field("content_article") ?></h1>


    <div class="btn-container">
    <?php
    //getting the previous post url
    $previous_post = get_previous_post();
    if (!empty( $previous_post )): ?>
      <a  class="btn-pagination" href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>"><?php echo esc_attr( $previous_post->post_title ); ?></a>
    <?php endif; ?>

    <?php
    //getting the next post url
    $next_post = get_next_post();
    if (!empty( $next_post )): ?>
      <a class="btn-pagination" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_attr( $next_post->post_title ); ?></a>
    <?php endif; ?>
    </div>

</div>
