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
                            <?php
                            $contact_title = get_field( "contact_title" );
                            if($contact_title)
                            {
                                echo '<span class="contactTitle">' .$contact_title. '</span>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php

                    $section1_show = get_field( "section1_show" );
                    $section2_show = get_field( "section2_show" );
                    $section3_show = get_field( "section3_show" );

                    if($section1_show ||   $section2_show || $section3_show)
                    {
                        echo '<div class="row contactSections">';
                        $j=1;
                        for($j;$j<=3;$j++)
                        {
                            if(${'section'.$j.'_show'})
                            {
                        ?>
                        <div class="col-md-4 contactSectionWrapper">
                            <div class="contactSection">
                                <?php
                                    $section_title = get_field( 'section' .$j. '_title' );
                                    if( $section_title)
                                    {
                                        echo '<span class="contactSectionTitle">' .$section_title. '</span>';
                                    }
                                    echo '<ul class="contactSectionData">';

                                    $section_email= get_field( 'section' .$j. '_email' );
                                    if($section_email)
                                    {
                                        echo '<li class="email"><img src="' . get_template_directory_uri() . '/images/contact-mail.png" alt=""><a href="mailto:' .$section_email. '">' .$section_email. '</a></li>';
                                    }
                                    $i=1;
                                    for($i;$i<=2;$i++)
                                    {
                                        $section_town= get_field( 'section' .$j. '_town'.$i );
                                        $section_phone= get_field( 'section' .$j. '_phone'.$i );
                                        if($section_town || $section_phone)
                                        {
                                            echo '<li class="phone">';
                                            if($section_town)
                                            {
                                                echo '<span>' .$section_town. '</span>';
                                            }
                                            echo '<img src="' . get_template_directory_uri() . '/images/phone-contact.png" alt="">';
                                            if($section_phone)
                                            {
                                                echo '<a href="tel:' .$section_phone. '">' .$section_phone. '</a>';
                                            }
                                        }
                                    }

                                ?>
                               </ul>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    echo '</div>';
                    }

                    $contact_alert = get_field( "contact_alert" );
                    if($contact_alert)
                    {
                    ?>
                    <div class="row">
                        <div class="col-md-12 contactAlert">
                                <div>
                                    <?php echo $contact_alert; ?>
                                </div>
                        </div>
                    </div>
                    <?php
                    }

                    $point1_show = get_field( "point1_show" );
                    $point2_show = get_field( "point2_show" );

                    if($point1_show || $point2_show)
                    {
                        echo '<div class="row contactPoints">';

                        $j=1;
                        for($j;$j<=2;$j++)
                        {
                            if(${'point'.$j.'_show'})
                            {
                    ?>

                        <div class="col-md-6 contactPoint">
                            <div class="contactPointContent">
                                <?php
                                    $point_title = get_field( 'point' .$j. '_title' );
                                    if($point_title)
                                    {
                                        echo '<span class="contactPointTitle">' .$point_title. '</span>';
                                    }

                                    $point_adress = get_field( 'point' .$j. '_adress' );
                                    if($point_adress)
                                    {
                                        echo '<p class="contactPointAddress">' .$point_adress. '</p>';
                                    }

                                    echo '<ul class="contactPointData">';

                                    $point_phone = get_field( 'point' .$j. '_phone' );
                                    if($point_phone)
                                    {
                                        echo '<li class="phone"><a href="tel:' .$point_phone. '">' .$point_phone. '</a></li>';
                                    }

                                    $point_fax = get_field( 'point' .$j. '_fax' );
                                    if($point_fax)
                                    {
                                        echo '<li class="fax"><a href="fax:' .$point_fax. '">' .$point_fax. '</a></li>';
                                    }

                                    $point_email = get_field( 'point' .$j. '_email' );
                                    if($point_email)
                                    {
                                        echo '<li class="email"><a href="mailto:' .$point_email. '">' .$point_email. '</a></li>';
                                    }

                                    echo '</ul>';

                                    $point_footer = get_field( 'point' .$j. '_footer' );
                                    if($point_footer)
                                    {
                                        echo '<p class="contactPointTime">' .$point_footer. '</p>';
                                    }
                                ?>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>

                    </div>

                    <div class="row contactPointsMap">
                        <?php
                             if($point1_show)
                             {
                                 ?>
                                <div class="col-md-6 mapPoint">
                                    <div class="mapPointContent">
                                        <iframe src="<?php the_field('map_link_1'); ?>" width="600" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                 <?php
                             }
                        ?>
                         <?php
                             if($point2_show)
                             {
                                 ?>
                                <div class="col-md-6 mapPoint">
                                    <div class="mapPointContent">
                                        <iframe src="<?php the_field('map_link_2'); ?>" width="600" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                 <?php
                             }
                        ?>
                    </div>

                    <?php
                    }

                    $company_data = get_field( "company_data" );

                    if($company_data)
                    {
                    ?>
                    <div class="row">
                        <div class="col-md-12 companyData">
                            <?php echo $company_data; ?>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>



        <?php

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
