<?php
/* Template Name: Payments */
get_header();
  while ( have_posts() ) : the_post();
  get_template_part( 'content', 'subheader' );
  ?> 
<div class="container-fluid evaluationFormArea payment-page">
  <div class="container size1">
      <div class="row">
          <div class="col-md-12">
            <?php
            $payments_text1 = get_field( "payments_text1" );
            if($payments_text1)
            {
                  echo '<span class="titleSection">' .$payments_text1. '</span>';
            }
            ?>

          </div>
          <div class="col-md-12 contentTextBlock">


                    <?php the_content(); ?>
          </div>
      </div>
  </div>
  <div class="container formcontainer form">
    <form>
      <fieldset>


          <legend>
            <?php
          $payments_text2 = get_field( "payments_text2" );
          if($payments_text2)
          {
                echo $payments_text2;
          }
          ?>
        </legend>
          <div class="row paymentsMethod">
              <div class="col-md-6 paymentsPayPalWrapper">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="business" value="sales@lingualab.pl">
                  <input type="hidden" name="lc" value="PL">
                  <input type="hidden" name="button_subtype" value="services">
                  <input type="hidden" name="no_note" value="0">
                   <input type="hidden" name="currency_code" value="PLN">
                    <input type="hidden" name="bn" value="PP-BuyNowBF:paypal_col.jpg:NonHostedGuest">
                     <input type="image" alt="PayPal — Płać wygodnie i bezpiecznie" name="submit" src="<?php echo get_template_directory_uri(); ?>/images/paypal_big.png">
                      <img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" border="0">
                </form>
              </div>
              <div class="col-md-6">
                <a href="<?php echo get_permalink(pll_get_post(465)); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/przelewy_big.png" /></a>
              </div>
          </div>
      </fieldset>
    </form>
  </div>
</div>
<?php
endwhile; //resetting the page loop
?>
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
