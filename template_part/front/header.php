  <div id="carousel-header" data-ride="carousel" class="carousel carousel-fade slide" >
    <div class="carousel-inner" role="listbox">

<?php
$images = get_field('imgs_header', 'option');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
$count=0;
if( $images ): ?>
        <?php foreach( $images as $image ): ?>
        <div  class="carousel-item <?php if($count==0){ echo 'active' ;} ?>" >
            <video  muted src="<?php echo $image['url'] ?>" autoplay="" loop=""> </video>
        </div>
        <?php $count++; ?>
        <?php endforeach; ?>
<?php endif; ?>

    </div>
    <div id="overlay-front" class="overlay">

      <div class="content-header container">
      <h1 class="titre"><?php the_field('title_heading', 'option') ?></h1>
      <h3 class="sous-titre"><?php the_field('subtitle_heading', 'option') ?></h3>
      <div class="button-box">
                <a class="link-unstyled button" href="<?php  echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
                    <button class="btn-primaire">Commandez !  </button>
                </a>
            <a class="link-unstyled button" href="#steps"><button class=" mhidden">Voir Plus</button></a>
      </div>
      </div>

    </div>
  </div>
