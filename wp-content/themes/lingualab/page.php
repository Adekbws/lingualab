<?php
get_header(); ?>
<?php
    while ( have_posts() )
    {
        $my_wp_query = new WP_Query();
        $all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));
        the_post();
        get_template_part( 'content', 'subheader' );

        $display_content = get_field( "not_display_content" );
        if(!$display_content)
        {
        ?>

          <div class="container-fluid defaultPageWrapper">
              <div class="row">
                  <div class="container">
                      <div class="row">
                          <?php
                              $colClass='col-md-12';
                              $leftcolumn_show = get_field( "leftcolumn_show" );
                              if($leftcolumn_show)
                              {
                                  if ( is_page() && $post->post_parent ) {
                                    $childrens= get_page_children( wp_get_post_parent_id( get_the_ID() ), $all_wp_pages );
                                    $groupName = get_the_title(wp_get_post_parent_id( get_the_ID() )) ;
                                  }else {
                                    $childrens= get_page_children( get_the_ID(), $all_wp_pages );
                                    $groupName = get_the_title();
                                  }
                                  $colClass='col-md-9 defaultPageRight leftColumnExist';
                                  ?>
                                  <div class="col-md-3 defaultPageLeft">
                                    <span class="groupName <?php if(empty($childrens)) echo 'empty-ul' ; ?>"><?php echo $groupName; ?></span>
                                    <ul class="groupPostsList mobile-expand">
                                    <?php
                                      foreach ( $childrens as $key => $value) {
                                      ?>
                                          <li <?php if(get_the_ID()==$value->ID) echo' class="currentGroupPost"'; ?>><a href="<?php echo get_permalink($value->ID); ?>"><?php echo $value->post_title ; ?></a>
                                      <?php
                                      }
                                      ?>
          													</ul>
                                  </div>
                                  <?php
                              }
                          ?>
                          <div class="<?php echo $colClass;?>">
                              <span class="contentTitle"><?php the_title(); ?></span>
                              <div class="contentBox">
                                  <?php the_content(); ?>
                              </div>
                          </div>
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


    }
get_footer();
