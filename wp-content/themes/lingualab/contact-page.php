<?php
/* Template Name: Kontakt */
get_header(); ?>
<?php
    while ( have_posts() )
    {
        the_post(); 
        get_template_part( 'content', 'subheader' );

        //contact content
        ?>
        <div class="container-fluid contactPageWrapper">
            <div class="row">
                <div class="container contactPageContent">
                    <div class="row pageTitleWrapper">
                        <div class="col-md-12">
                            <span class="contactTitle">Zapraszamy do kontaktu</span>
                        </div>
                    </div>
                    <div class="row contactSections">
                        <div class="col-md-4 contactSectionWrapper">
                            <div class="contactSection">
                                <span class="contactSectionTitle">Dział Obsługi Klienta</span>
                                <ul>
                                    <li class="email">info@lingualab.pl</li>
                                    <li class="phone">Warszawa (+48) 22 379 79 41</li>
                                    <li class="phone">Kraków (+48) 22 35 59 20</li>
                                </ul>
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
    }
get_footer();