<?php
get_header(); ?>
<?php
		while ( have_posts() )
    {
        the_post();
        get_template_part( 'content', 'subheader' );

				$args = array(
				 'posts_per_page'   => -1,
				 'orderby'          => 'date',
				 'order'            => 'DESC',
				 'post_type'        => 'jezyki',
				 'post_status'      => 'publish',
			 );
			 $the_query = new WP_Query( $args );
        ?>
        <div class="container-fluid defaultPageWrapper">
            <div class="row">
                <div class="container">
									<div class="row">
											<div class="col-md-3 defaultPageLeft">
													<span class="groupName">Języki</span>
													<ul class="groupPostsList">
														<?php  // The Loop
														if ( $the_query->have_posts() ) {
														  while ( $the_query->have_posts() ) {
														    $the_query->the_post(); ?>
														    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														<?php    }
														  /* Restore original Post Data */
														  wp_reset_postdata();
														} else {
														  // no posts found
														} ?>
													</ul>
											</div>
											<div class="col-md-9 defaultPageRight leftColumnExist">
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
        $princing_form = get_field( "princing_form" );
        if($princing_form)
        {
            get_template_part( 'content', 'evaluationform' );
        }
        $show_contactblog_box = get_field( "show_contactblog_box" );
        if($show_contactblog_box)
        {
          get_template_part( 'content', 'contact_blog' );
        }
    }
get_footer();
