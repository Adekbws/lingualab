<?php
get_header();
get_template_part( 'content', 'subheader' );
?>

<div class="container-fluid defaultPageWrapper">
		<div class="row">
				<div class="container">
					<div class="row">
							<div class="col-md-3 defaultPageLeft">

<?php
$taxonomy = 'jezyki_category';
$terms = get_terms($taxonomy); // Get all terms of a taxonomy
$postID = get_the_ID();

if ( $terms && !is_wp_error( $terms ) ) :
?>
				<?php foreach ( $terms as $key => $term ) {


												$args = array(
												 'posts_per_page'   => -1,
												 'orderby'          => 'date',
												 'order'            => 'DESC',
												 'post_type'        => 'jezyki',
												 'post_status'      => 'publish',
												 'tax_query' => array(
														array(
															'taxonomy' => $term->taxonomy,
															'field'    => 'term_id',
															'terms'    => $term->term_id,
														),
													),
											 );
											 $category=wp_get_post_terms( get_the_ID(), 'jezyki_category' );
											 //var_dump($category[0]->name); var_dump($term->name); exit;
											 $the_query = new WP_Query( $args );
												?>

																					<span class="groupName"><a href="<?php echo get_term_link($term); ?>"><?php  echo get_field("language_left_label",$term); ?></a></span>
																					<ul class="groupPostsList mobile-expand" <?php if ($category[0]->name!=$term->name) echo'style="display:none;"'?>>
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


				<?php } ?>
<?php endif; ?>
								</div>
								<div class="col-md-9 defaultPageRight leftColumnExist">
										<span class="contentTitle"><?php echo $category[0]->name; ?></span>
										<div class="contentBox">
												<?php echo get_field("language_content",$category[0]); ?>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>

        <?php
				$princing_form = get_field( "princing_form",$category[0] );
        if($princing_form)
        {
            get_template_part( 'content', 'evaluationform' );
        }
				$reference_form = get_field( "reference_form",$category[0] );
				if($reference_form)
				{
						get_template_part( 'content', 'referenceform' );
				}
        $show_contactblog_box = get_field( "show_contactblog_box",$category[0] );
        if($show_contactblog_box)
        {
          get_template_part( 'content', 'contact_blog' );
        }
				$range_of_services = get_field( "range_of_services",$category[0] );
        if($range_of_services)
        {
            get_template_part( 'content', 'range_of_services' );
        }
				$branches_block = get_field( "branches_block",$category[0]);
        if($branches_block)
        {
            get_template_part( 'content', 'branches' );
        }

				$quality_lang_row = get_field( "quality_lang_row",$category[0] );
        if($quality_lang_row)
        {
            get_template_part( 'content', 'quality_lang_row' );
        }



get_footer();
