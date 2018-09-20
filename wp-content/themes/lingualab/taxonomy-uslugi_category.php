<?php
get_header(); ?>
<?php
  get_template_part( 'content', 'subheader_blog' );
        ?>
        aaaaaaaaa
        <?php if ( is_active_sidebar( 'blogcontact-info' ) ) : ?>
        <?php dynamic_sidebar( 'blogcontact-info' ); ?>
        <?php endif; ?>

        <?php

get_footer();
