<!--
-->

<div id="testimonials">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

    <?php while (the_repeater_field('testimonials', 'option')): ?>
    <div class="carousel-item testimonials-item">
            <div class="box-inside">
                <div class="content-inner">
                    <div class="testimonials-text">
                    <h3><?php the_sub_field('name_testimonials') ?></h3>
                    <p><?php the_sub_field('opinion_testimonials') ?></p>
                    </div>
                    <div class="testimonials-img">
                    <?php $image = get_sub_field('img_testimonials'); ?>
                     <img   class="img-fluid rounded-circle"
                            src="<?php echo $image['url']; ?>"
                            alt="<?php echo $image['alt'] ?>">

                    </div>
                </div>
            </div>
    </div>
    <?php endwhile; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
