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
                            $categories = get_the_category();
                            if($leftcolumn_show && !empty($categories))
                            {
                                $colClass='col-md-9 defaultPageRight leftColumnExist';
                                ?>
                                <div class="col-md-3 defaultPageLeft">
                                        <span class="groupName"><?php echo esc_html( $categories[0]->name );  ?></span>

                                        <?php
                                        $currentPostID=(int)get_the_ID();
                                        $posts= get_posts(array(
                                          'category'=>(int)$categories[0]->cat_ID,

                                          'numberposts'=>-1,
                                          'meta_query'	=> array(
                                          'relation'		=> 'AND',
                                          array(
                                            'key'	 	=> 'show_in_left_menu',
                                            'value'	  	=> 1,
                                            'compare' 	=> '=',
                                          ),
                                        ),
                                        ));

                                        echo '<ul class="groupPostsList">';

                                          foreach($posts as $post)
                                          {
                                            $styleClass='';
                                            $groupPostID=(int)$post->ID;
                                            if($currentPostID==$groupPostID)
                                            {
                                                $styleClass='class="currentGroupPost"';
                                            }
                                            echo '<li ' .$styleClass. '><a href="' . esc_url( get_permalink($groupPostID)) . '">' . $post->post_title . '</a></li>';
                                          }
                                        echo '</ul>';

                                        ?>
                                </div>
                                <?php
                                wp_reset_postdata();
                            }
                        ?>
                        <div class="<?php echo $colClass;?>">
                          <span class="contentTitle"><?php echo get_the_title(); ?></span>
                          <div class="contentBox">
                            <?php the_content();?>
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
