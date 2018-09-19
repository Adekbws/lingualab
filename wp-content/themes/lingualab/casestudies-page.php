<?php
/* Template Name: Case Studies */
get_header(); ?>
<?php
    while ( have_posts() )
    {
        the_post();
        get_template_part( 'content', 'subheader' );
        //contact content

        $args = array(
         'posts_per_page'   => -1,
         'orderby'          => 'date',
         'order'            => 'DESC',
         'post_type'        => 'case_studies',
         'post_status'      => 'publish',
       );
       $caseStudies = new WP_Query( $args );

       if ($caseStudies->have_posts() )
       {
         ?>
         <div class="container-fluid caseStudiesPageWrapper">
               <div class="container caseStudiesList">
         <?php
         while($caseStudies->have_posts())
         {
           $caseStudies->the_post();
        ?>
                  <div class="row caseStudy">
                      <div class="col-md-6 caseStudyImg">
                        <?php if(has_post_thumbnail())
                        {
                           echo '<img src="' . get_the_post_thumbnail_url() . '" alt="'.get_the_title().'">';
                        }
                        else
                        {
                          echo '<img src="' . get_template_directory_uri() . '/images/blog-photo.jpg" alt="'.get_the_title().'">';
                        }
                        ?>
                      </div>
                      <div class="col-md-6 caseStudyContentWrapper">
                          <span class="caseStudyTitle"><?php echo get_the_title();?></span>
                          <div class="caseStudyContent">
                              <?php echo do_shortcode(get_the_content()); ?>
                          </div>
                      </div>
                  </div>
        <?php
        }
        ?>
              </div>
        </div>
        <?php
      }
      else
      {
        ?>
        <div class="container-fluid caseStudiesPageWrapper">
              <div class="container caseStudiesList">
                <div class="row caseStudy">
                    <div class="col-md-6 caseStudyContentWrapper">
                      <p><?php _e('Nie znaleziono wpisów','lingualab');?></p>
                    </div>
                </div>
              </div>
        </div>
        <?php
      }
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

				$quality_lang_row = get_field( "quality_lang_row" );
        if($quality_lang_row)
        {
            get_template_part( 'content', 'quality_lang_row' );
        }

				$branches_block = get_field( "branches_block" );
        if($branches_block)
        {
            get_template_part( 'content', 'branches' );
        }
    }
get_footer();
