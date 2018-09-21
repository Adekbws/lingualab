<?php
/* Template Name: Przelewy24 */
get_header(); ?>
<?php
get_template_part( 'content', 'subheader_404' );
?>
<div class="container-fluid evaluationFormArea payment-form">
  <div class="container size1">
      <div class="row">
          <div class="col-md-12">
              <span class="titleSection"><?php _e( 'Strona nie została znaleziona', 'lingualab' );?></span>
          </div>
          <div class="col-md-12 contentTextBlock">
                <?php _e( 'Przepraszamy strona którą próbujesz odwiedzić nie została znaleziona.', 'lingualab' );?>
          </div>
      </div>
  </div>
</div>
<?php

get_footer();
