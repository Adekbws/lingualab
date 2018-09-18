<?php
/* Template Name: Przelewy24 */
get_header(); ?>

<div class="container-fluid evaluationFormArea payment-form">
  <div class="container size1">
      <div class="row">
          <div class="col-md-12">
              <span class="titleSection"><?php _e( 'Przelewy24.pl', 'lingualab' );?></span>
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
  <div class="container formcontainer">
      <div class="row">
          <div class="col-md-12">
              <form action="<?php echo get_template_directory_uri(); ?>/payments.php" method="POST" id="evaluationForm">
                  <fieldset>
                      <legend><?php _e( 'Tytuł płatności:', 'lingualab' );?></legend>
                      <div class="row efFieldRow threeColumn">
                          <div class="col-md-12 efField">
                              <div class="efFieldContent">
                                  <div class="row efFieldContentRow">
                                      <label class="col-md-1 label" for="client_name"><?php _e( 'Tytuł płatności:', 'lingualab' );?></label>
                                      <div class="col-md-11 input requiredField">
                                          <input class="hiding" name="z24_nazwa" type="text" value="" required/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </fieldset>

                  <fieldset>
                      <legend><?php _e( 'Adres e-mail:', 'lingualab' );?></legend>
                      <div class="row efFieldRow threeColumn">
                          <div class="col-md-12 efField">
                              <div class="efFieldContent">
                                  <div class="row efFieldContentRow">
                                      <label class="col-md-1 label" for="client_name"><?php _e( 'Adres e-mail:', 'lingualab' );?></label>
                                      <div class="col-md-11 input requiredField">
                                          <input class="hiding" name="z24_email" type="email" value="" required/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </fieldset>

                  <fieldset>
                      <legend><?php _e( 'Kwota brutto:', 'lingualab' );?></legend>
                      <div class="row efFieldRow threeColumn">
                          <div class="col-md-12 efField">
                              <div class="efFieldContent">
                                  <div class="row efFieldContentRow">
                                      <label class="col-md-1 label" for="client_name"><?php _e( 'Kwota brutto (zł):', 'lingualab' );?></label>
                                      <div class="col-md-11 input requiredField">
                                          <input class="hiding" name="z24_kwota" step="any" type="number" required/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </fieldset>

                  <div class="row">
                      <div class="col-md-12">
                          <input type="checkbox" name="rodo" id="rodoCheck" required="">
                          <label for="rodoCheck"><?php _e( 'Zgadzam się na przetwarzanie danych', 'lingualab' );?></label>
                      </div>
                      <div class="col-md-12">
                          <button type="submit"><?php _e( 'Wyślij', 'lingualab' );?></button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

  <?php

  $princing_form = get_field( "princing_form" );
  if($princing_form)
  {
      get_template_part( 'content', 'evaluationform' );
  }
  $reference_form = get_field( "reference_form" );
  if($reference_form)
  {
      get_template_part( 'content', 'referenceform' );
  }
  $show_contactblog_box = get_field( "show_contactblog_box" );
  if($show_contactblog_box)
  {
    get_template_part( 'content', 'contact_blog' );
  }
  $range_of_services = get_field( "range_of_services" );
  if($range_of_services)
  {
      get_template_part( 'content', 'range_of_services' );
  }
  $branches_block = get_field( "branches_block" );
  if($branches_block)
  {
      get_template_part( 'content', 'branches' );
  }
  $quality_lang_row = get_field( "quality_lang_row" );
  if($quality_lang_row)
  {
      get_template_part( 'content', 'quality_lang_row' );
  }



get_footer();
