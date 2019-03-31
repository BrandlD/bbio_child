  <div id="carousel-header" data-ride="carousel" class="carousel slide" >
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')"> </div>
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')"> </div>
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')"> </div>
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
