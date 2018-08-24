<?php
get_header(); ?>
<?php


        get_template_part( 'content', 'subheader' );
        //contact content
        ?>

        <div class="container-fluid branchesPageWrapper">
            <div class="container branches-container">
                <?php if(have_posts()) : while (have_posts() ) : the_post(); ?>

                <div class="branch">
                    <?php if (get_field("branze_min")) { ?>
                        <div>
                            <div style='background-image:url("<?php the_field("branze_min"); ?>");'>
                                <?php the_title(); ?>
                            </div>
                        </div>
                     <?php } ?>
                </div>

                <?php endwhile; endif; // end of featured small loop ?>
            </div>
        </div>



        <?php

        $princing_form = get_field( "princing_form" );
        if($princing_form)
        {
            get_template_part( 'content', 'evaluationform' );
        }

get_footer();
