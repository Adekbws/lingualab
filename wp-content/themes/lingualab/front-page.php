<?php
get_header(); ?>

<?php
  $slides = new WP_Query(array(
    'post_type' => 'slider',
    'posts_per_page' => -1,
    'orderby' => 'ID',
	  'order'   => 'ASC',
  ));
  if ($slides->have_posts())
  {

    ?>
<div class="container-fluid mainSliderWrapper">
    <div class="row m0">
        <div class="col-md-12 p0">
            <div id="mainSlider" class="mainSlider">
                  <?php
                  $slideCounter=0;
                  $slide_text1='';
                  $slide_text2='';
                  $slide_img='';
                  $slide_buttontext='';
                  $slide_buttonurl='';

                  while($slides->have_posts())
                  {
                    $slides->the_post();
                    $slideCounter++;


                    //get slide fields
                    if($currentSlide_text1=get_field('slider_text1'))
                    {
                      $slide_text1=$currentSlide_text1;
                    }
                    else
                    {
                      $currentSlide_text1=$slide_text1;
                    }
                    //
                    if($currentSlide_text2=get_field('slider_text2'))
                    {
                      $slide_text2=$currentSlide_text2;
                    }
                    else
                    {
                      $currentSlide_text2=$slide_text2;
                    }
                    //
                    if($currentSlide_img=get_field('slider_img'))
                    {
                      $slide_img=$currentSlide_img;
                    }
                    else
                    {
                      $currentSlide_img=$slide_img;
                    }
                    //
                    if($currentSlide_buttontext=get_field('slider_buttontext'))
                    {
                      $slide_buttontext=$currentSlide_buttontext;
                    }
                    else
                    {
                      $currentSlide_buttontext=$slide_buttontext;
                    }
                    //
                    if($currentSlide_buttonurl=get_field('slider_buttonurl'))
                    {
                      $slide_buttonurl=$currentSlide_buttonurl;
                    }
                    else
                    {
                      $currentSlide_buttonurl=$slide_buttonurl;
                    }

                    echo '<div class="item">';
                  ?>
                         <div class="col-md-5 leftItem">
                            <div class="leftItemContentWrapper">
                                <div class="leftItemContent">
                                     <div class="leftItemText">
                                        <?php echo do_shortcode($currentSlide_text1); ?>
                                    </div>
                                    <div class="leftItemText2">
                                        <?php echo do_shortcode($currentSlide_text2); ?>
                                    </div>

                                    <?php
                                      if($currentSlide_buttonurl && $currentSlide_buttontext)
                                      {
                                        echo '<a href="' .$currentSlide_buttonurl. '" class="leftItemLink">' .$currentSlide_buttontext. '</a>';
                                      }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 rightItem">
                          <img src="<?php echo $currentSlide_img ?>" alt="" class="fullColumn">
                         </div>

                    <?php
                    echo '</div>';
                  }
                  ?>
                </div>
                <?php
                /*  if($slideCounter>=1)
                  {
                    echo '<ol class="carousel-indicators">';
                    $slideIndicator=0;
                    for($slideIndicator;$slideIndicator<$slideCounter;$slideIndicator++)
                    {
                      echo '<li data-target="#mainSlider" data-slide-to="'.$slideIndicator.'"';
                      if($slideIndicator==0)
                      {
                        echo ' class="active"';
                      }
                      echo '></li>';
                    }
                    echo '</ol>';
                  }*/
                ?>

        </div>
    </div>
</div>

<?php
wp_reset_postdata();
}
 ?>

<div class="container-fluid rangeOfServices">
    <div class="row m0">
        <div class="col-md-12">
            <span class="titleSection">Zakres usług</span>
        </div>
    </div>
    <?php
    $taxonomy = 'uslugi_category';
    $terms = get_terms($taxonomy); // Get all terms of a taxonomy
    if ( $terms && !is_wp_error( $terms ) ) :
    ?>
        <div class="row m0 servicesRow">
            <?php foreach ( $terms as $key => $term ) { ?>
              <?php if ($key % 2 == 0 && $key!=0) echo '</div><div class="row m0 servicesRow">';
              ?>


                <div class="col-md-6 serviceWrapper">
                    <div class="serviceWrapperContent">
                        <div class="serviceHeader">
                            <span class="serviceImage" style="background-image:url(<?php echo get_field('zdj_uslug',$term);?>);">&nbsp;</span>
                            <span class="serviceTitle"><?php echo $term->name; ?></span>
                        </div>
                        <div class="serviceContentWrapp">
                            <div class="serviceContent">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            </div>
                            <a href="<?php echo get_permalink(get_field('link_uslugi',$term)->ID) ?>" class="readMoreButton">dowiedz się więcej</a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    <?php endif;?>

</div>

<?php
  $blocktext1_show = get_field( "blocktext1_show" );
  if($blocktext1_show)
  {
    $blocktext1_title = get_field( "blocktext1_title" );
    $blocktext1_content = get_field( "blocktext1_content" );
?>
<div class="container-fluid textBlock">
    <div class="container size1">
        <div class="row">
            <div class="col-md-12">
                <span class="titleSection"><?php echo $blocktext1_title; ?></span>
            </div>
            <div class="col-md-12 contentTextBlock">
              <?php echo do_shortcode($blocktext1_content); ?>
            </div>
        </div>
    </div>
</div>
<?php
}

?>
<?php
  $banner1_show = get_field( "banner1_show" );
  if($banner1_show)
  {

      $banner1_image = get_field( "banner1_image" );
      $banner1_text = get_field( "banner1_text" );
      $banner1_button = get_field( "banner1_button" );
      $banner1_buttonurl = get_field( "banner1_buttonurl" );
?>
<div class="container-fluid staticBannerWrapper">
    <div class="row staticBanner">
        <div class="col-md-7 leftBanner">
              <img src="<?php echo $banner1_image; ?>" alt="" class="fullColumn">
        </div>
        <div class="col-md-5 rightBanner">
            <div class="rightBannerContentWrapper">
            <div class="rightBannerContent">
                    <div class="rightBannerText">
                        <?php echo $banner1_text; ?>
                    </div>
                    <?php
                    if($banner1_button && $banner1_buttonurl)
                    {
                      echo '<a href="'.$banner1_buttonurl.'" class="rightBannerLink">'.$banner1_button.'</a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
}

?>


<div class="container-fluid smallBannersWrapper">
    <div class="row smallBanners">
        <div class="col-sm-12 col-md-6 smallBanner smallBanner1">
            <div class="row smallBannerContent">
                <div class="col-md-5 col-sm-5 smallBanner1ImageWrapp">
                    <div class="smallBanner1Image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/smallbanner1.png" alt="">
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 smallBannerInfo">
                    <div>
                        <span class="smallBannerTitle">Języki</span>
                        <a href="#" class="readMoreButton">dowiedz się więcej</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 smallBanner smallBanner2">
        <div class="row smallBannerContent">
                <div class="col-md-5 col-sm-5 smallBanner2ImageWrapp">
                    <div class="smallBanner2Image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/smallbanner2.png" alt="">
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 smallBannerInfo">
                    <div>
                        <span class="smallBannerTitle">Jakość</span>
                        <a href="#" class="readMoreButton">dowiedz się więcej</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
  $casestudies_show = get_field( "casestudies_show" );
  if($casestudies_show)
  {
?>
<div class="container-fluid textBlock">
    <div class="container size1">
        <div class="row">
          <?php
            $casestudies_title = get_field( "casestudies_title" );
            if($casestudies_title)
            {
              echo '<div class="col-md-12"><span class="titleSection">' . $casestudies_title . '</span></div>';
            }

            $casestudies_text = get_field( "casestudies_text" );
            if($casestudies_text)
            {
              echo '<div class="col-md-12 contentTextBlock">' . do_shortcode($casestudies_text) . '</div>';
            }
          ?>
        </div>
    </div>
</div>
<div class="container-fluid portfolioSliderWrapp">

  <?php
    $caseStudies = new WP_Query(array(
      'post_type' => 'case_studies',
      'posts_per_page' => 9,
    ));
    if ($caseStudies->have_posts())
    {
      echo '<div class="row m0 portfolioSliderRow">
          <div class="col-md-12 portfolioSliderArea">
              <div class="portfolioSliderArrowWrapp portfolioSliderArrowWrappLeft">
                  <button class="leftArrowPortfolio"><img src="' . get_template_directory_uri() . '/images/arrow-left.png" alt=""></button>
              </div>
              <div class="portfolioSlider">';
       while ( $caseStudies->have_posts() )
       {
         $caseStudies->the_post();

          echo '<div class="portfolioSliderItemWrapp">
                 <div class="portfolioSlide">
                     <div class="row portfolioSlideRow">
                         <div class="col-md-5 portfolioSlideImageWrapp">
                             <div class="portfolioSlideImage">';
            if(has_post_thumbnail())
            {
              echo '<img src="' . get_the_post_thumbnail_url() . '" alt="">';
            }
          echo '</div>
                         </div>
                         <div class="col-md-7 portfolioSlideContentWrapp">
                                 <span class="portfolioSlideTitle">' . get_the_title() . '</span>
                                 <div class="portfolioSlideContent">' . strip_tags(do_shortcode(get_the_content())) . '</div>
                         </div>
                     </div>
                 </div>
             </div>';
       }
       echo '</div>
             <div class="portfolioSliderArrowWrapp portfolioSliderArrowWrappRight">
                 <button class="rightArrowPortfolio"><img src="' . get_template_directory_uri() . '/images/arrow-right.png" alt=""></button>
             </div>
         </div>
     </div>';
       wp_reset_postdata();
    }

      $casestudies_url = get_field( "casestudies_url" );
      if($casestudies_url)
      {
        echo '<div class="row m0">
            <div class="col-md-12 portfolioMoreItemsWrapp">
                 <a href="' .$casestudies_url. '" class="portfolioMoreItems">' . __('dowiedz się więcej', 'lingualab')  . '</a>
            </div>
        </div>';
      }
    ?>
</div>

<?php
}

?>


<div class="container-fluid contactArea">
    <div class="container size1">
        <div class="row">
            <div class="col-md-12">
                <span class="titleSection"> W czym możemy Ci pomóc?</span>
            </div>
            <div class="col-md-12 contentTextBlock">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
            </div>
        </div>
        <div class="row contactFormWrapper">
            <?php echo do_shortcode('[contact-form-7 id="16" title="Contact form 1"]'); ?>
        </div>
    </div>
</div>

<?php

  get_template_part( 'content', 'contact_blog' );

?>

<div class="container-fluid bottomMenu">
    <div class="container size1">
        <div class="row">
            <div class="col-md-3">
                <span class="bottomMenuTitle">Usługi</span>

                <?php wp_nav_menu(array('theme_location'=>'bottom_menu_1','menu_class'=>'bottom_menu','menu_id'=>'', 'container'=>'')); ?>

            </div>
            <div class="col-md-4">
                <span class="bottomMenuTitle">Specjalizacja</span>
                <?php wp_nav_menu(array('theme_location'=>'bottom_menu_2','menu_class'=>'bottom_menu','menu_id'=>'', 'container'=>'')); ?>
            </div>
            <div class="col-md-5 bottom_menu_columns_wrapp">
                 <span class="bottomMenuTitle">Języki</span>
                 <?php wp_nav_menu(array('theme_location'=>'bottom_menu_3','menu_class'=>'bottom_menu bottom_menu_columns3','menu_id'=>'', 'container'=>'')); ?>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
