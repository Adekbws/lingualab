<?php
get_header(); ?>
<?php
    while ( have_posts() )
    {
        $my_wp_query = new WP_Query();
        $all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));
        the_post();
        get_template_part( 'content', 'subheader' );

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
                                  <ul class="groupPostsList">
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
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(get_field( "reference_form" ))
        {  ?>
          <div class="container-fluid evaluationFormArea">
            <div class="container size1">
                <div class="row">
                    <div class="col-md-12">
                        <span class="titleSection">Referencje</span>
                    </div>
                    <div class="col-md-12 contentTextBlock">
                    Jeśli nie lubisz wypełniać formularzy, wyślij wiadomość na <a href="#">info@lingualab.pl</a> lub zadzwoń - Warszawa: (+48) 22 379 79 41 lub Kraków: (+48) 12 350 59 20.<br>
                    Twój czas jest dla nas cenny! Odpowiadamy błyskawicznie.
                    </div>
                </div>
            </div>
            <div class="container formcontainer">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo do_shortcode('[contact-form-7 id="594" title="referencje"]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

        <?php
        $princing_form = get_field( "princing_form" );
        if($princing_form)
        {
            get_template_part( 'content', 'evaluationform' );
        }
    }
get_footer();
