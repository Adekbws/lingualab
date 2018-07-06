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
		<div class="container-fluid wrappPage">
          <header>
          <?php wp_nav_menu(array('menu_class'=>'nav navbar-nav bts-menu','menu_id'=>'')); ?>
          </header>
          <?php pll_the_languages(); ?>