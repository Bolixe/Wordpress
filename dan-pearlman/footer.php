<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="block-bar">

			<div class="site-info">
				
				<div class="footer-contact">
					<span class="arrow-up">CONTACT US</span>
					<div class="contact-info">
						<p>
							dan pearlman<br>
							Markenarchitektur GmbH<br>
							<a href="mailto:office@danpearlman.com">office@danpearlman.com</a> 
							+49(0)30 53 00 05 60
						</p>
						<p>
							dan pearlman<br>
							Erlebnisarchitektur GmbH<br>
							<a href="mailto:office-ea@danpearlman.com">office-ea@danpearlman.com </a>  
							+49(0)30 53 60 18 60
						</p>
					</div>				
				</div>

				<div class="footer-find-us">
					<span class="arrow-up">FIND US</span>
					<div class="find-info">
						<p>
							dan pearlman<br>
							Markenarchitektur GmbH<br>
							Kiefholzstraße 1<br>
							12435 Berlin
						</p>
						<p>
							dan pearlman<br>
							Erlebnisarchitektur GmbH<br>
							Kiefholzstraße 2<br>
							12435 Berlin
						</p>
					</div>				
				</div>

				<div class="footer-follow-us">
					<span class="arrow-up">FOLLOW US</span>
					<div class="follow-info">
						<a class="social fb" title="" target="_blank" href="https://www.facebook.com/danpearlman.berlin">
							<img alt="" src="http://2015.danpearlman.com/wp-content/themes/dan-pearlman/img/temp/logo-facebook.png">
						</a>
						<a class="social lk" title="" target="_blank" href="https://www.linkedin.com/company/dan-pearlman-gmbh">
							<img alt="" src="http://2015.danpearlman.com/wp-content/themes/dan-pearlman/img/temp/logo-linkedin.png">
						</a>
						<a class="social pt" title="" target="_blank" href="https://www.pinterest.com/danpearlman/">
							<img alt="" src="http://2015.danpearlman.com/wp-content/themes/dan-pearlman/img/temp/logo-pinterest.png">
						</a>
						<a class="social xg" title="" target="_blank" href="https://www.xing.com/companies/danpearlmangmbh">
							<img alt="" src="http://2015.danpearlman.com/wp-content/themes/dan-pearlman/img/temp/logo-xing.png">
						</a>
					</div>				
				</div>

				<?php
					if(is_active_sidebar('sidebar-2')){
						dynamic_sidebar('sidebar-2');
					}
				?>

			</div><!-- .site-info -->
		</div><!-- .block-bar -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<script>

	(function($) {
		$(document).ready(function(){	
			var lang_code= '<?php echo ICL_LANGUAGE_CODE; ?>';
			if ( lang_code == 'de' ){						
				$('input.search-field').attr('placeholder', 'Suche …');
			}

			$('.site-info div span').click(function(){					// Show or hide footer extra info				

				if ( $( document ).width() >= 603) {
					if ( $('.site-info div div').css('display') == 'block' ){						console.log(" hide ");	
						$('.site-info div span').removeClass('arrow-down').addClass('arrow-up'); 
						$('.site-info div div').slideToggle(); 
						$('.site-main').removeClass('site-main-padding');
					}else{ 																			console.log(" show ");
						$('.site-info div span').removeClass('arrow-up').addClass('arrow-down'); 
						$('.site-info div div').slideToggle();
						$('.site-main').addClass('site-main-padding');
					}
				}else $('.site-info div div').slideDown();

			});				
		});
	})(jQuery);

</script>

<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11572387-2', 'auto');
  ga('set', 'anonymizeIp', 'true');
  ga('send', 'pageview');

</script>

</body>
</html>
