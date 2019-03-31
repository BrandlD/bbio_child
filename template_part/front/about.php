<div id="about" class=" container">
  <div class="row">
        <div class="col-md-4">
          <a href="#">
          <img
                class="img-fluid rounded mb-3 mb-md-0"
                  src="<?php the_field('img_first_block', 'option'); ?>"
                alt=""
            >
          </a>
        </div>
        <div class="col-md-8 text-about">
          <h3><?php the_field('title_first_block' , 'option') ?></h3>
          <p><?php the_field('text_first_block', 'option') ?></p>
        </div>
      </div>

<?php if(get_field('second_block', 'option') ) :  ?>
  <div class="row">
        <div class="col-md-5 text-about text-right">
        <h3><?php the_field('title_second_block', 'option'); ?></h3>
          <p><?php the_field('text_second_block', 'option'); ?></p>
        </div>
        <div class="col-md-7">
          <a href="#">
          <img
                class="img-fluid rounded mb-3 mb-md-0"
                  src="<?php the_field('img_second_block', 'option'); ?>"
                alt=""
            >
          </a>
        </div>
      </div>
<?php endif;  ?>




</div>
