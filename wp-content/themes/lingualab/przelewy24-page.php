<?php
/* Template Name: Przelewy24 */
get_header(); ?>

<div class="container-fluid evaluationFormArea payment-form">
  <div class="container size1">
      <div class="row">
          <div class="col-md-12">
              <span class="titleSection">Przelewy24.pl</span>
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
                      <legend>Tytuł płatności</legend>
                      <div class="row efFieldRow threeColumn">
                          <div class="col-md-12 efField">
                              <div class="efFieldContent">
                                  <div class="row efFieldContentRow">
                                      <label class="col-md-1 label" for="client_name">Tytuł płatności:</label>
                                      <div class="col-md-11 input requiredField">
                                          <input class="hiding" name="z24_nazwa" type="text" value="" required/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </fieldset>

                  <fieldset>
                      <legend>Adres Email:</legend>
                      <div class="row efFieldRow threeColumn">
                          <div class="col-md-12 efField">
                              <div class="efFieldContent">
                                  <div class="row efFieldContentRow">
                                      <label class="col-md-1 label" for="client_name">Adres Email:</label>
                                      <div class="col-md-11 input requiredField">
                                          <input class="hiding" name="z24_email" type="email" value="" required/>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </fieldset>

                  <fieldset>
                      <legend>Kwota brutto</legend>
                      <div class="row efFieldRow threeColumn">
                          <div class="col-md-12 efField">
                              <div class="efFieldContent">
                                  <div class="row efFieldContentRow">
                                      <label class="col-md-1 label" for="client_name">Kwota brutto (zł)</label>
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
                          <label for="rodoCheck">Zgadzam się na przetwarzanie danych.</label>
                      </div>
                      <div class="col-md-12">
                          <button type="submit">wyślij</button>
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

get_footer();
