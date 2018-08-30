<?php
/* Template Name: Payments */
get_header(); ?>

<div class="container-fluid evaluationFormArea payment-page">
  <div class="container size1">
      <div class="row">
          <div class="col-md-12">
              <span class="titleSection">Zapłać online</span>
          </div>
          <div class="col-md-12 contentTextBlock">
            <?php
            // TO SHOW THE PAGE CONTENTS
            while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
                    <?php the_content(); ?> <!-- Page Content -->
            <?php
            endwhile; //resetting the page loop
            wp_reset_query(); //resetting the page query
            ?>
          </div>
      </div>
  </div>
  <div class="container formcontainer form">
    <form>
      <fieldset>
          <legend>Wybierz sposób płatności</legend>
          <div class="row">
              <div class="col-md-6">
                <a href="<?php echo get_permalink(462); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/paypal_big.png" /></a>
              </div>
              <div class="col-md-6">
                <a href="<?php echo get_permalink(465); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/przelewy_big.png" /></a>
              </div>
          </div>
      </fieldset>
    </form>
  </div>
</div>

  <?php

  $princing_form = get_field( "princing_form" );
  if($princing_form)
  {
      get_template_part( 'content', 'evaluationform' );
  }

get_footer();
