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

    $('.infoToolTip').tooltip({html: true});

   $(".dateInput").flatpickr({
      dateFormat: "d , m , Y",
        <?php
      if (pll_current_language()=='pl')
        echo '"locale": "pl",';
      ?>
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
     console.log('klikk');
      return false;
  });






});
</script>
</body>
</html>
