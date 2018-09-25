<div class="container-fluid bottomInfoWrapp">
    <div class="container size1">
        <div class="row bottomInfo">
            <div class="col-md-3">
                <span class="bottomInfoTitle"><?php _e( 'Informacje', 'lingualab' );?></span>
                <?php wp_nav_menu(array('theme_location'=>'info_menu_1','menu_class'=>'info_menu','menu_id'=>'', 'container'=>'')); ?>
            </div>
            <div class="col-md-4">
                <span class="bottomInfoTitle"><?php _e( 'Płatności', 'lingualab' );?></span>
                <?php wp_nav_menu(array('theme_location'=>'info_menu_2','menu_class'=>'info_menu','menu_id'=>'', 'container'=>'')); ?>
            </div>
            <div class="col-md-5 payLogos">
              <div class="paypalWrapper">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="business" value="sales@lingualab.pl">
                  <input type="hidden" name="lc" value="PL">
                  <input type="hidden" name="button_subtype" value="services">
                  <input type="hidden" name="no_note" value="0">
                   <input type="hidden" name="currency_code" value="PLN">
                    <input type="hidden" name="bn" value="PP-BuyNowBF:paypal_col.jpg:NonHostedGuest">
                     <input type="image" alt="PayPal — Płać wygodnie i bezpiecznie" name="submit" src="<?php echo get_template_directory_uri(); ?>/images/paypal.png">
                      <img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" border="0">
                </form>
              </div>
                <a href="<?php echo esc_url(get_permalink(pll_get_post(465))); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/przelewy.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid siteFooter">
  	<div class="row m0">
		<div class="col-md-12 copyright">
			&copy; 2011-<?php echo date('Y');?> Lingua Lab 	&middot; <?php _e( 'Wszelkie prawa zastrzeżone', 'lingualab' );?>
		</div>
		<div class="col-md-12 arrowTopWrap">
			<a href="#topPage" class="goToTop">
			<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up.png" alt="">
			</a>
		</div>
	</div>
</div>
<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js" ></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/flatpickr.js" ></script>

<?php
if (pll_current_language()=='pl')
  echo '<script src="'.get_template_directory_uri() .'/js/flatpickr-pl.js" ></script>';
?>
<script>
  $(document).ready(function()
  {

    $('.defaultPageLeft .groupName').click(function(){
      $(this).next('.groupPostsList').toggle(200);

    });



	$(document).on('click', '.goToTop', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 900);
});

    $('.portfolioSlider').slick({
      slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  prevArrow: $('.leftArrowPortfolio'),
nextArrow: $('.rightArrowPortfolio'),
responsive: [
{
  breakpoint: 1830,
  settings: {
	slidesToShow: 2,

  }
},
{
  breakpoint: 768,
  settings: {
	slidesToShow: 1,

  }
},
]
    });





    $('#evaluationFormService').change(function()
    {
      evaluationFormServiceTab=$(this).val();

      $.ajax({
        method: "POST",
        url:"<?php echo admin_url( 'admin-ajax.php' );?>",
        data: { action: "evaluationformtab_action", idformtab: evaluationFormServiceTab },
        dataType: 'json',
			})
			.done(function( msg )
			{
        if(msg.status==1)
        {
          if(msg.html){
            $('#evaluationFormContent').empty();
            $('#evaluationFormContent').html(msg.html);
            $('#evaluationForm button[type="submit"]').css("display","inline-block");
          }
          $(".dateInput").flatpickr({
             dateFormat: "d , m , Y",
               <?php
             if (pll_current_language()=='pl')
               echo '"locale": "pl",';
             ?>
          });

          $('.infoToolTip').tooltip({html: true});

        }
			});
    });

    //remove alert border
    $( document ).on( 'change', '#evaluationForm .requiredField', function(e)
    {
        $( this ).removeClass( 'alertEnter' );
    });

    //send evaluation form
    $( '#evaluationForm' ).submit( function()
    {
      $( '#evaluationForm .requiredField' ).removeClass( 'alertEnter' );
      $( '#evaluateResponse' ).fadeOut( 400, function(){ $( this ).html( '' ); } );

      var evaluationFormData = $(this).serialize();

      $.ajax({
        method: "POST",
        url:"<?php echo admin_url( 'admin-ajax.php' );?>?action=evaluationformsend_action",
        data: evaluationFormData,
        dataType: 'json',
			})
			.done(function( msg )
			{
        console.log(msg);
          if( msg.status == 1 )
          {
            $( '#evaluateResponse' ).html( '<p class="evaluateResponseInfo warningInfo"><?php echo get_field( 'evaluationform_rodoalert', pll_get_post( 103 ) ) ?></p>' ).fadeIn();
          }
          if( msg.status == 2 )
          {
            $( '#evaluationForm .requiredField' ).addClass( 'alertEnter' );
            $( '#evaluateResponse' ).html( '<p class="evaluateResponseInfo warningInfo"><?php echo get_field( 'evaluationform_requiredfield', pll_get_post( 103 ) ) ?></p>' ).fadeIn();
          }
          if( msg.status == 3 )
          {
            $( '#evaluationForm .requiredField.client_email' ).addClass( 'alertEnter' );
            $( '#evaluateResponse' ).html( '<p class="evaluateResponseInfo warningInfo"><?php echo get_field( 'evaluationform_emailalert', pll_get_post( 103 ) ) ?></p>' ).fadeIn();
          }
          if( msg.status == 4 )
          {
            $( '#evaluateResponse' ).html( '<p class="evaluateResponseInfo successInfo"><?php echo get_field( 'evaluationform_sended', pll_get_post( 103 ) ) ?></p>' ).fadeIn();
          }
          if( msg.status == 5 )
          {
            $( '#evaluateResponse' ).html( '<p class="evaluateResponseInfo warningInfo"><?php echo get_field( 'evaluationform_error', pll_get_post( 103 ) ) ?></p>' ).fadeIn();
          }
			});

      return false;
    } );


    $( document ).on('change','#evaluationForm .fileInput' , function(e)
    {
      id=$(this).attr('id');
      fileInputText=$('#evaluationForm #'+id+'_fileName');
      console.log(fileInputText);
      if(e.target.files.length)
      {
        fileInputText.text( e.target.files[0].name);
      }
      else
      {
        fileInputText.text( fileInputText.data('label'));
      }
  });

$( document ).on('click','#evaluationForm .addNextDay' , function()
  {
//
    var dayLabels = ["<?php _e('Drugi dzień:', 'lingualab');?>","<?php _e('Trzeci dzień:', 'lingualab');?>", "<?php _e('Czwarty dzień:', 'lingualab');?>", "<?php _e('Piąty dzień:', 'lingualab');?>"];
    currentDay=$(this).data('id');
    $('.addDay[data-id="'+ currentDay +'"]').fadeOut().remove();
    nextDay=$('.daysList').data("nextday");
    if(nextDay<=5)
    {
      rowHTML='<div class="row efFieldRow dayRow"><div class="col-md-4 efField dayDate"><div class="efFieldContent"><div class="row efFieldContentRow"><label class="col-md-4 label">'+ dayLabels[currentDay-1] +' <span>Data:</span></label><div class="col-md-8 input"><input id="deadline" class="dateInput" type="text" name="evaluation_form[daylist][1][deadline]" autocomplete="off" data-id="'+ nextDay +'" placeholder="dd , mm , rrrr"></div></div></div></div><div class="col-md-3 efField dayTime"><div class="efFieldContent"><div class="row efFieldContentRow"> <label class="col-md-4 label">Od:</label><div class="col-md-8 input"><select name="evaluation_form[daylist][1][from]"><option value="00:00">00:00</option></select></div></div></div></div><div class="col-md-3 efField dayTime"><div class="efFieldContent"><div class="row efFieldContentRow"><label class="col-md-4 label">Do:</label><div class="col-md-8 input"><select name="evaluation_form[daylist][1][to]"><option value="00:00">00:00</option></select></div></div></div></div>';

      if(nextDay<5)
      {
        rowHTML=rowHTML+ '<div class="col-md-2 efField addDay" data-id="'+nextDay+'"><div class="efFieldContent"><div class="row efFieldContentRow"><span class="col-md-5 addNextDayLabel">Kolejny<br>dzień:</span><button class="col-md-7 addNextDay" data-id="'+nextDay+'">Dodaj</button></div></div></div>';
      }

      rowHTML=rowHTML+ '</div>';
      $('.daysList').append(rowHTML);

      $('.dateInput[data-id="'+ nextDay +'"]').flatpickr({
         dateFormat: "d , m , Y",
           <?php
         if (pll_current_language()=='pl')
           echo '"locale": "pl",';
         ?>
      });


      $('.daysList').data("nextday",nextDay+1);

    }
      return false;
  });




//mainslider

  var mainSliderDots = true;
  if( $( '#mainSlider' ).hasClass( 'mainSliderOneSlide' ) )
  {
    mainSliderDots = false;
  }
  $( '#mainSlider' ).slick( {
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    infinite: true,
    prevArrow: false,
    nextArrow: false,
    dots: mainSliderDots,
} );


/// Menu   mobilna
  $('.siteMenu > li >a').click(function(){
    if ($( window ).width()<1300) {
      $(this).next(".subMenuCustomWrapper").addClass("mobileMenu");
      $('.subMenuCustomContent >ul >li').append('<span class="bt-expand">+</span>');
      $('.bt-close-menu').show();
      $('body').css("overflow","hidden");
    }


   });
   $(document).on("click",".bt-expand",function(){
     $(this).prev("ul").toggle( "slow" );
   });
   //$('.menuWrapper .siteMenu > li > a').attr("href","#");

   $('.bt-close-menu').click(function(){
     $(this).parent(".subMenuCustomWrapper").removeClass("mobileMenu");
     $(".bt-expand").remove();
     $('.bt-close-menu').hide();
   });

   $z = 0;
   $( window ).scroll(function() {
     if ($( window ).scrollTop()>145) {
       if ($z==0) {
        $( ".pageMenu" ).hide();
         $( ".pageMenu" ).addClass( "fixedMenu" );
         $( ".pageMenu" ).slideDown("slow");
         $z++;
       }

     }else{
       $( ".pageMenu" ).removeClass( "fixedMenu" );
       $z=0;
     }
    });

});
</script>
</body>
<style>
.wrappPage .bottomMenu .bottom_menu.bottom_menu_columns3 {
  -webkit-column-count: <?php echo get_field("column_count", 5); ?>;
  -moz-column-count: <?php echo get_field("column_count", 5); ?>;
  column-count: <?php echo get_field("column_count", 5); ?>;
}
</style>
</html>
