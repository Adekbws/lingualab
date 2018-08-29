<?php
get_header(); ?>
<?php
  get_template_part( 'content', 'subheader_blog' );

        ?>
        <div class="container-fluid blogPageWrapper">
            <div class="row">
                <div class="container blogPageContent">
                  <div class="col-md-9 leftBlog">
                    <div class="row postsList">
                      <?php
                      $counter=0;
                      while ( have_posts() )
                      {
                        $counter++;
                          the_post();
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
                            <span class="postItemTitle"><?php echo get-the_title();?></span>
                            <div class="postExcerpt">
                                <?php  echo get_the_excerpt(); ?>
                            </div>
                          </a>
                      </div>

                        <?php
                        if($counter%2==0)
                        echo '<div class="clearfix"></div>';
                      }
                      ?>
                    </div>
                    <div class="row blogPagination">
                      <?php wp_pagenavi();?>
                    </div>
                  </div>
                  <div class="col-md-3 rightBlog">
                      <div class="row blogCategoriesWrapper">
                        <div class="col-md-12">
                          <span class="boxTitle">Kategorie</span>
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
                          <span class="boxTitle">Szybki kontakt</span>
                          <?php echo do_shortcode('[contact-form-7 id="370" title="Kontakt na blogu"]'); ?>
                        </div>
                      </div>
                      <div class="row blogTagsWrapper">
                        <div class="col-md-12">
                          <span class="boxTitle">Tagi</span>
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

get_footer();
