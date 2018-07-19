<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
            <?php wp_head(); ?>
  </head>
    <body>
		<div class="container-fluid wrappPage" id="topPage">
		<header class="container-fluid pageHeader">
        <div class="container-fluid topBarWrapper">
            <div class="row topBar">
              	<div class="col-md-12 pull-right topBarContent">
					<?php if ( is_active_sidebar( 'top-info' ) ) : ?>
					<?php dynamic_sidebar( 'top-info' ); ?>
					<?php endif; ?>
					<ul class="languagesSwitch">
					<?php pll_the_languages(); ?>
					</ul>
              	</div>
            </div>
        </div>
        <div class="container-fluid pageMenu">
          <nav class="navbar navbar-default row pageMenuWrapper">
            <div class="navbar-header">
                    <a href="<?php echo get_home_url(); ?>" class="siteLogo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" class="img-responsive">
                    </a>
                <div class="buttonToggleWrapper">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
			</div>
			
            <div class="collapse navbar-collapse menuWrapper" id="bs-example-navbar-collapse-1">
				<?php wp_nav_menu(array('theme_location'=>'top_menu_left','menu_class'=>'nav navbar-nav siteMenu','menu_id'=>'topLeftMenu', 'container'=>'','walker'=> new LinguaLab_Menu_Walker)); ?>
				<?php wp_nav_menu(array('theme_location'=>'top_menu_right','menu_class'=>'nav navbar-nav siteMenu','menu_id'=>'topRightMenu', 'container'=>'','walker'=> new LinguaLab_Menu_Walker)); ?>
            </div>
          </nav>
      </div>		
    </header>