<?php
get_header();

        get_template_part( 'content', 'subheader' );
        get_template_part( 'content', 'branches' );

        $princing_form = get_field( "princing_form" );
        if($princing_form)
        {
            get_template_part( 'content', 'evaluationform' );
        }

get_footer();
