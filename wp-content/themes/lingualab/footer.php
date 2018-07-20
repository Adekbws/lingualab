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
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
	crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js" ></script>
	


<?php wp_footer(); ?>
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


});
</script>
</body>
</html>