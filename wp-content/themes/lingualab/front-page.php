<?php
$redirectTo = get_site_url().'/strona-glowna';
wp_redirect(get_the_permalink(pll_get_post(get_page_by_path( 'strona-glowna' )->ID)));
