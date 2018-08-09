<?php
get_header(); ?>
<?php
    while ( have_posts() )
    {
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
                                $colClass='col-md-9 defaultPageRight leftColumnExist';
                                ?>
                                <div class="col-md-3 defaultPageLeft">
                                        fdhyjkuyuy
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
        $princing_form = get_field( "princing_form" );
        if($princing_form)
        {
            get_template_part( 'content', 'evaluationform' );
        }
    }
get_footer();