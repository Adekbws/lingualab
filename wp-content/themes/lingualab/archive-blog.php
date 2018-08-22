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
                      while ( have_posts() )
                      {
                          the_post();
                      ?>
                        <div class="col-md-6 postItem">
                          <a href="#">
                            <div class="thumbWrapper">
                              <img src="<?php echo get_template_directory_uri(); ?>/images/post1.jpg">
                              <div class="postCategories">
                                Lingua
                              </div>
                            </div>
                            <span class="postItemTitle">Tytuł newsa blogowego na dwa wersy</span>
                            <div class="postExcerpt">
                              Lokalizacja produktu z języka polskiego na angielski, niemiecki i rosyjski. Prace obejmowały przygotowanie planu lokalizacji, dobór narzędzi lokalizacyjnych dopasowanych do technologii w jakiej aplikacja została napisana...
                            </div>
                          </a>
                      </div>




                      <div class="col-md-6 postItem">
                        <a href="#">
                          <div class="thumbWrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/post1.jpg">
                            <div class="postCategories">
                              Lingua
                            </div>
                          </div>
                          <span class="postItemTitle">Tytuł newsa blogowego na dwa wersy</span>
                          <div class="postExcerpt">
                            Lokalizacja produktu z języka polskiego na angielski, niemiecki i rosyjski. Prace obejmowały przygotowanie planu lokalizacji, dobór narzędzi lokalizacyjnych dopasowanych do technologii w jakiej aplikacja została napisana...
                          </div>
                        </a>
                    </div>
                        <div class="clearfix"></div>






                        <div class="col-md-6 postItem">
                          <a href="#">
                            <div class="thumbWrapper">
                              <img src="<?php echo get_template_directory_uri(); ?>/images/post1.jpg">
                              <div class="postCategories">
                                Lingua
                              </div>
                            </div>
                            <span class="postItemTitle">Tytuł newsa blogowego na dwa wersy</span>
                            <div class="postExcerpt">
                              Lokalizacja produktu z języka polskiego na angielski, niemiecki i rosyjski. Prace obejmowały przygotowanie planu lokalizacji, dobór narzędzi lokalizacyjnych dopasowanych do technologii w jakiej aplikacja została napisana...
                            </div>
                          </a>
                      </div>




                      <div class="col-md-6 postItem">
                        <a href="#">
                          <div class="thumbWrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/post1.jpg">
                            <div class="postCategories">
                              Lingua
                            </div>
                          </div>
                          <span class="postItemTitle">Tytuł newsa blogowego na dwa wersy albo trzy wersy testowe</span>
                          <div class="postExcerpt">
                            Lokalizacja produktu z języka polskiego na angielski, niemiecki i rosyjski. Prace obejmowały przygotowanie planu lokalizacji, dobór narzędzi lokalizacyjnych dopasowanych do technologii w jakiej aplikacja została napisana...
                          </div>
                        </a>
                    </div>
                        <div class="clearfix"></div>








                        <div class="col-md-6 postItem">
                          <a href="#">
                            <div class="thumbWrapper">
                              <img src="<?php echo get_template_directory_uri(); ?>/images/post1.jpg">
                              <div class="postCategories">
                                Lingua
                              </div>
                            </div>
                            <span class="postItemTitle">Tytuł newsa blogowego na dwa wersy</span>
                            <div class="postExcerpt">
                              Lokalizacja produktu z języka polskiego na angielski, niemiecki i rosyjski. Prace obejmowały przygotowanie planu lokalizacji, dobór narzędzi lokalizacyjnych dopasowanych do technologii w jakiej aplikacja została napisana...
                            </div>
                          </a>
                      </div>




                      <div class="col-md-6 postItem">
                        <a href="#">
                          <div class="thumbWrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/post1.jpg">
                            <div class="postCategories">
                              Lingua
                            </div>
                          </div>
                          <span class="postItemTitle">Tytuł newsa blogowego na dwa wersy</span>
                          <div class="postExcerpt">
                            Lokalizacja produktu z języka polskiego na angielski, niemiecki i rosyjski. Prace obejmowały przygotowanie planu lokalizacji, dobór narzędzi lokalizacyjnych dopasowanych do technologii w jakiej aplikacja została napisana...
                          </div>
                        </a>
                    </div>
                        <div class="clearfix"></div>










                        <div class="col-md-6 postItem">
                          <a href="#">
                            <div class="thumbWrapper">
                              <img src="<?php echo get_template_directory_uri(); ?>/images/post1.jpg">
                              <div class="postCategories">
                                Lingua
                              </div>
                            </div>
                            <span class="postItemTitle">Tytuł newsa blogowego na dwa wersy</span>
                            <div class="postExcerpt">
                              Lokalizacja produktu z języka polskiego na angielski, niemiecki i rosyjski. Prace obejmowały przygotowanie planu lokalizacji, dobór narzędzi lokalizacyjnych dopasowanych do technologii w jakiej aplikacja została napisana...
                            </div>
                          </a>
                      </div>




                      <div class="col-md-6 postItem">
                        <a href="#">
                          <div class="thumbWrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/post1.jpg">
                            <div class="postCategories">
                              Lingua
                            </div>
                          </div>
                          <span class="postItemTitle">Tytuł newsa blogowego na dwa wersy</span>
                          <div class="postExcerpt">
                            Lokalizacja produktu z języka polskiego na angielski, niemiecki i rosyjski. Prace obejmowały przygotowanie planu lokalizacji, dobór narzędzi lokalizacyjnych dopasowanych do technologii w jakiej aplikacja została napisana...
                          </div>
                        </a>
                    </div>
                        <div class="clearfix"></div>


                        <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-md-3 rightBlog">
                      <div class="row blogCategoriesWrapper">
                        <div class="col-md-12">
                          <span class="boxTitle">Kategorie</span>
                          <?php
                                $taxonomy = 'blog_categories';
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

        <?php

get_footer();
