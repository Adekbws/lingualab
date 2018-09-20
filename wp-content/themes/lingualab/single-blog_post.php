<?php
get_header();
 ?>

<?php
  get_template_part( 'content', 'subheader_blog' );

        ?>
        <div class="container-fluid blogPageWrapper">
            <div class="row">
                <div class="container blogPageContent">
                  <div class="col-md-9 leftBlog">
                    <?php

                        while (have_posts() )
                        {
                              the_post();
                              ?>
                              <div class="row postContentWrapp">
                                <div class="col-md-12 postTitle">
                                  <?php echo get_the_title(); ?>
                                </div>
                                  <div class="col-md-12 postContent">
                                      <?php echo the_content(); ?>
                                  </div>
                              </div>
                              <?php

                        $postCategories=wp_get_post_terms(get_the_ID(),'blog_category');
                        if(!empty($postCategories))
                        {
                          echo '<div class="row postRelations"><div class="col-md-12">';
                          echo '<span class="postRelationsTitle">' .  __('Kategoria', 'lingualab') . '</span><ul class="postCategoriesList">';
                            $countCategories=count($postCategories)-1;
                            $categoryCounter=0;
                            foreach($postCategories as $postCategory)
                            {
                              echo '<li><a href="'. get_term_link($postCategory->slug, 'blog_category') .'">';
                                echo $postCategory->name;
                                echo '</a>';
                                if($categoryCounter<$countCategories)
                                  echo ', ';
                                  echo '</li>';
                                $categoryCounter++;
                            }
                            echo '</ul></div></div>';
                        }
                        $terms = wp_get_post_terms(get_the_ID(),'blog_tag');

                        if (!empty($terms) )
                        {
                        ?>
                        <div class="row postRelations postTags">
                          <div class="col-md-12">
                            <span class="postRelationsTitle"><?php  _e('Tagi', 'lingualab'); ?></span>
                                      <ul class="postRelationsTags">
                                          <?php foreach ( $terms as $term ) { ?>
                                              <li><a href="<?php echo get_term_link($term->slug, 'blog_tag'); ?>"><?php echo $term->name; ?></a></li>
                                          <?php } ?>
                                      </ul>
                          </div>
                        </div>
                        <?php
                      }
                      }

                    $blogPosts = new WP_Query(array(
                      'post_type' => 'blog_post',
                      'posts_per_page' => 2,
                      //kategorie zwiazene z postem i losowo
                    ));
                    if ($blogPosts->have_posts())
                    {
                      ?>

                    <div class="row postListHeader">
                      <div class="col-md-12">
                        <span><?php _e('Zobacz również:', 'lingualab') ?></span>
                      </div>
                    </div>
                    <div class="row postsList inPost">
                      <?php
                      $counter=0;
                      while ($blogPosts->have_posts() )
                      {
                        $counter++;
                          $blogPosts->the_post();
                      ?>

                        <div class="col-md-6 postItem">
                          <a href="<?php echo get_post_permalink(); ?>">
                            <div class="thumbWrapper">
                              <?php
                                if(has_post_thumbnail())
                                {
                                  echo '<img src="' . get_the_post_thumbnail_url() . '">';
                                }
                                else
                                {
                                  echo '<img src="' . get_template_directory_uri() . '/images/blog-photo.jpg">';
                                }

                                $categories=wp_get_post_terms(get_the_ID(),'blog_category');
                                if(!empty($categories))
                                {
                                  echo '<div class="postCategories">';
                                    $countCategories=count($categories)-1;
                                    $categoryCounter=0;
                                    foreach($categories as $category)
                                    {
                                        echo $category->name;

                                        if($categoryCounter<$countCategories)
                                          echo ', ';

                                        $categoryCounter++;
                                    }
                                    echo '</div>';
                                }
                              ?>
                            </div>
                            <span class="postItemTitle"><?php the_title();?></span>
                            <div class="postExcerpt">
                                <?php  echo get_the_excerpt(); ?>
                            </div>
                          </a>
                      </div>

                        <?php
                        if($counter%2==0)
                        echo '<div class="clearfix"></div>';
                      }
                      wp_reset_postdata();
                      ?>
                    </div>
                    <?php
                    }
                  ?>
                  </div>
                  <div class="col-md-3 rightBlog">
                      <div class="row blogCategoriesWrapper">
                        <div class="col-md-12">
                          <span class="boxTitle"><?php _e('Kategorie', 'lingualab') ?></span>
                          <?php
                                $taxonomy = 'blog_category';
                                $terms = get_terms(array('taxonomy' => $taxonomy));

                                if ( $terms && !is_wp_error( $terms ) )
                                {
                                ?>
                                    <ul class="blogCategories">
                                        <?php foreach ( $terms as $term ) { ?>
                                            <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php
                              }
                                ?>
                        </div>
                      </div>
                      <div class="row blogContactForm">
                        <div class="col-md-12">
                          <span class="boxTitle"><?php _e('Szybki kontakt', 'lingualab') ?></span>
                          <?php echo do_shortcode('[contact-form-7 id="370" title="Kontakt na blogu"]'); ?>
                        </div>
                      </div>

                      <div class="row blogSearchForm">
                        <div class="col-md-12">
                          <div>
                               <h3><?php _e('Szukaj', 'lingualab') ?></h3>
                               <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" autocomplete="off">
                               <div class="search-text">
                                 <input type="text" name="s" />
                               </div>
                               <input type="hidden" name="post_type" value="blog_post" /> <!-- // hidden 'products' value -->
                               <input type="submit" alt="Search" value="Search" style="display:none;"/>
                             </form>
                          </div>
                        </div>
                      </div>

                      <div class="row blogTagsWrapper">
                        <div class="col-md-12">
                          <span class="boxTitle"><?php _e('Tagi', 'lingualab') ?></span>
                          <?php
                                $taxonomy = 'blog_tag';
                                $terms = get_terms(array('taxonomy' => $taxonomy));

                                if ( $terms && !is_wp_error( $terms ) )
                                {
                                ?>
                                    <ul class="blogTags">
                                        <?php foreach ( $terms as $term ) { ?>
                                            <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php
                              }
                                ?>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <?php if ( is_active_sidebar( 'blogcontact-info' ) ) : ?>
        <?php dynamic_sidebar( 'blogcontact-info' ); ?>
        <?php endif; ?>

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

get_footer();
