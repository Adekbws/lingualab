<div class="container-fluid bottomInfoWrapp">
    <div class="container size1">
        <div class="row bottomInfo">
            <div class="col-md-3">
                <span class="bottomInfoTitle">Informacje</span>
                <?php wp_nav_menu(array('theme_location'=>'info_menu_1','menu_class'=>'info_menu','menu_id'=>'', 'container'=>'')); ?>
            </div>
            <div class="col-md-4">
                <span class="bottomInfoTitle">Płatności</span>
                <?php wp_nav_menu(array('theme_location'=>'info_menu_2','menu_class'=>'info_menu','menu_id'=>'', 'container'=>'')); ?>
            </div>
            <div class="col-md-5 payLogos">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/paypal.png" alt=""></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/przelewy.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid siteFooter">
  	<div class="row m0">
		<div class="col-md-12 copyright">
			&copy; 2018 Lingua Lab 	&middot; Wszelkie prawa zastrzeżone
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
          $('#evaluationFormContent').html(msg.html);

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
      rowHTML='<div class="row efFieldRow dayRow"><div class="col-md-4 efField dayDate"><div class="efFieldContent"><div class="row efFieldContentRow"><label class="col-md-4 label" for="optional_comment">'+ dayLabels[currentDay-1] +' <span>Data:</span></label><div class="col-md-8 input"><input id="deadline" class="dateInput" type="text" name="daylist[1][deadline]" autocomplete="off" data-id="'+ nextDay +'" placeholder="dd , mm , rrrr"></div></div></div></div><div class="col-md-3 efField dayTime"><div class="efFieldContent"><div class="row efFieldContentRow"> <label class="col-md-4 label" for="optional_comment">Od:</label><div class="col-md-8 input"><select name="daylist[1][from]" id="evaluationFormService"><option value="00:00">00:00</option></select></div></div></div></div><div class="col-md-3 efField dayTime"><div class="efFieldContent"><div class="row efFieldContentRow"><label class="col-md-4 label" for="optional_comment">Do:</label><div class="col-md-8 input"><select name="daylist[1][to]" id="evaluationFormService"><option value="00:00">00:00</option></select></div></div></div></div>';

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






});
</script>
</body>
</html>
