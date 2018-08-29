<?php
get_header(); ?>
<?php
        //phpinfo();
        get_template_part( 'content', 'subheader' );
         $args = array(
        	'posts_per_page'   => -1,
        	'orderby'          => 'date',
        	'order'            => 'DESC',
        	'post_type'        => 'branze',
        	'post_status'      => 'publish',
        );
        $the_query = new WP_Query( $args );
        //$posts_array = get_posts( $args );
        //var_dump($posts_array);
        ?>
        <div class="container-fluid branchesPageWrapper">
            <div class="container branches-container">
              <div class="row sub-title">
                  <div class="col-md-12">
                    <span>Branże, dla których tłumaczymy</span>
                  </div>
              </div>
              <?php  // The Loop
              if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                  $the_query->the_post(); ?>
                  <div class="col-md-3 col-sm-4 ">
                    <a href="<?php the_permalink(); ?>">
                      <div class="branch">
                              <div>

                                  <div>
                                      <?php if (get_field("branze_min")) { ?>
                                        <img src="<?php the_field("branze_min"); ?>" style="visibility: hidden;" />
                                      <?php } ?>
                                      <div class="ico-title-box">
                                        <div class="branch-ico" style='background-image:url("<?php the_field("branze_min"); ?>");'>

                                        </div>
                                        <div>
                                          <span class="branch-title"><?php the_title(); ?></span>
                                        </div>
                                      </div>

                                  </div>
                              </div>
                      </div>
                    </a>
                  </div>

              <?php    }
                /* Restore original Post Data */
                wp_reset_postdata();
              } else {
                // no posts found
              } ?>

            </div>
        </div>



        <?php

        $princing_form = get_field( "princing_form" );
        if($princing_form)
        {
            get_template_part( 'content', 'evaluationform' );
        }

get_footer();
