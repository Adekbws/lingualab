<div class="container-fluid infoArea">
    <div class="container size1">
        <div class="row">
            <div class="col-md-6 contactInfoWrapp">
                <?php if ( is_active_sidebar( 'contact-info' ) ) : ?>
                <?php dynamic_sidebar( 'contact-info' ); ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6 blogInfoWrapp">
                <span class="blogInfoTitle"><?php _e('Odwiedź nasz blog', 'lingualab') ?></span>
                <div class="latestPosts">
                  <?php
                    $lastPosts = new WP_Query(array(
                      'post_type' => 'blog_post',
                      'posts_per_page' => 2,
                    ));
                    if ($lastPosts->have_posts())
                    {
                       while ( $lastPosts->have_posts() )
                       {
                         $lastPosts->the_post();
                         echo '<a href="' . esc_url( get_permalink(get_the_ID())) . '" class="lastPost">
                             <span class="lastPostTitle">' . get_the_title() . '</span>
                             <div class="lastPostContent">
                             ' . the_excerpt_max_charlength(105) . '
                             </div>
                         </a>';
                       }
                       wp_reset_postdata();
                    }
                  ?>
                </div>

            </div>
        </div>
    </div>
</div>
