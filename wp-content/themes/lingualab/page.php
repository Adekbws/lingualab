<?php
/* Template Name: Kontakt */
get_header(); ?>
<?php
    while ( have_posts() )
    {
        the_post(); 
        get_template_part( 'content', 'subheader' );

        


        $princing_form = get_field( "princing_form" );
        if($princing_form)
        {
            get_template_part( 'content', 'evaluationform' );
        }
    }
get_footer();