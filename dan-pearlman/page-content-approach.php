<?php
/**
 * The template used for displaying ABOUT page 
 *
 */

	if(ICL_LANGUAGE_CODE == 'de'){

	 	$text_1      = '<p>Wir sind davon überzeugt, dass die besten Lösungen im richtigen Gleichgewicht aus Freiheit und Struktur entstehen. Deshalb ist unsere Kultur von viel Freiraum und Eigeninitiative geprägt. Gleichzeitig gibt der Guiding Process uns und unseren Kunden die nötige Orientierung und Struktur für erfolgreiche Projekte.</p><p>Wir arbeiten mit unseren Kunden auf partnerschaftliche Weise und vereinen Spezialisten aus den Bereichen Strategie, Design, Kommunikation, Architektur und Landschaftsarchitektur. Mit einem Netzwerk aus inspirierenden und kompetenten Denkern und Machern haben wir für nahezu jede Herausforderung die passende Lösung.</p><p>&nbsp;</p>';

	 	$title_1     = 'Our Guiding Process';
	 	$untitle_1   = '4D´s DESCRIBE THE DAN WAY OF DOING.';

	 	$title_2     = 'What we believe';

	 	$title_3     = 'Our partners & collaborators';
	 	$untitle_3   = 'A STRONG NETWORK OF THINKERS AND DOERS.';

	 	$title_4     = 'Wer wir es machen';
	 	$title_5     = 'Von unseren Büros in Berlin';	 	
	 	$untitle_5   = 'Wir arbeiten international';

	 	$head_slogan = 'Wie wir arbeiten';
	 	$head_text   = 'Von der ersten Idee über die intensive Planung<br>  bis zur optimalen Umsetzung arbeitet unser multidisziplinäres Team von Spezialisten daran, unsere Kunden zu überraschen und zu begeistern.';
	 	
	 	$block_text1 = 'Bei unserem Handeln steht stets der Mensch im Mittelpunkt.Wir wollen unsere Kunden und deren Kunden überraschen und glücklich machen.';
	 	$block_text2 = 'Nur wer sich versteht, kann erfolgreich zusammenarbeiten. Und nur wer alle Bedürfnisse versteht, wird Lösungen finden, die relevant sind.';
	 	$block_text3 = 'Wir sind eine Agentur mit flachen Hierarchien. Hier gewinnt nicht die Position, sondern das beste Argument.';
	 	$block_text4 = 'Austausch und Diskussionen haben vor allem ein Ziel: Visionen real werden zu lassen. Am Ende zählen die Erlebnisse.';
	 	$block_text5 = 'Fehler machen ist erlaubt. Wichtig ist, dass der Projekterfolg nicht darunter leidet und Ideen aufeinander aufbauen.';
	 	$block_text6 = 'Menschen denken nicht nur mit dem Kopf, sondern auch mit den Händen. Deshalb ist Prototyping ein absolutes Muss.';

	}else if(ICL_LANGUAGE_CODE == 'en'){

	 	$text_1      = '<p>We strongly believe the best solutions come from a proper balance of creative freedom and structure. This is why our company culture is designed with a great deal of flexibility and personal initiative in mind. At the same time, our guiding process provides us and our clients the necessary orientation and structure to make projects successful.</p> <p>We work with our customers as partners, bringing together specialists from the fields of strategy, design, communication, architecture, and landscape design. With a network of inspiring and competent thinkers and doers, we have the right solution for almost any challenge.</p><p>&nbsp;</p>';

	 	$title_1     = 'Our Guiding Process';
	 	$untitle_1   = '4D´s DESCRIBE THE DAN WAY OF DOING.';

	 	$title_2     = 'What we believe';

	 	$title_3     = 'Our partners & collaborators';
	 	$untitle_3   = 'A STRONG NETWORK OF THINKERS AND DOERS.';

	 	$title_4     = 'Who we do it for';
	 	$title_5     = 'From our berlin offices';	 	
	 	$untitle_5   = 'We work internationally';
	 	
	 	$head_slogan = 'How we work';
	 	$head_text   = 'From the initial idea to intensive planning, <br> to the best possible implementation, our multidisciplinary team of specialists works<br> to amaze and inspire our clients.';

	 	$block_text1 = 'In conducting business people come first. We want to amaze our clients and their clients and make everyone happy.';
	 	$block_text2 = 'Only if you understand yourself can you work successfully with others. And only if you understand all the requirements will you find the relevant solutions.';
	 	$block_text3 = 'We’re an agency with flat hierarchies. Here the best argument wins, not the job title.';
	 	$block_text4 = 'Exchange and discussions have one goal: turning visions into reality. In the end it’s the experiences that count.';
	 	$block_text5 = 'Making mistakes is allowed. Of critical importance is that the success of the project doesn’t suffer as a result and that ideas build on one another.';
	 	$block_text6 = 'People think with their heads and their hands. This is why prototyping is an absolute must.';

	}

	$category_image = get_template_directory_uri( ) . '/img/headers/Approach.jpg';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<div class="opacity-filter"></div>

		<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

		<div class="section-headline">

			<div class="section-title">
				<h1 class="section-name">OUR APPROACH</h1>
				<span class="line"></span>
				<h1 class="section-subname"><?= $head_slogan ?></h1>
			</div>
			<div class="section-description">
				<p>
					<?= $head_text ?>
				</p>
			</div>			

		</div><!--.entry-headline -->
	</header> <!--.entry-header -->

	<div class="entry-block grey-dark">
		<div class="entry-rounded">
			
			<?= get_the_content() ?>			
			
 		</div><!--.entry-rounded -->
	</div><!--.entry-block -->


	<div class="entry-block grey-semilight">
		<div class="entry-approach">

			<h1 class="entry-subtitle"><?= $title_2 ?></h1>

			<div class="entry-slogan">
				<div class="slogan-left">
					<span class="gr">Be human <br> centered</span>
					<p><?= $block_text1 ?></p>
				</div>
				<div class="slogan-right">
					<p><?= $block_text2 ?></p>				
					<span class="bl">Relevant <br> communication <br> is the key</span>
				</div>
			</div>	

			<div class="entry-slogan">
				<div class="slogan-left">
					<span class="tr">Reason <br>beats hierarchy</span>
					<p><?= $block_text3 ?></p>
				</div>
				<div class="slogan-right">
					<p><?= $block_text4 ?></p>
					<span class="vi">Experience <br> beats theory</span>
				</div>
			</div>		

			<div class="entry-slogan">
				<div class="slogan-left">
					<span class="se">Fail fast, <br> learn fast</span>
					<p><?= $block_text5 ?></p>
				</div>
				<div class="slogan-right">
					<p><?= $block_text6 ?></p>
					<span class="pr">Think with <br> your hands</span>
				</div>
			</div>			
		</div><!-- .entry-approach -->
	</div><!-- .entry-block -->


	<div class="entry-block grey-strong">
		<div class="entry-partners">
			<h1 class="entry-subtitle"><?= $title_3 ?></h1>
			<h1 class="entry-title"><?= $untitle_3 ?></h1>
			<div class="logo-partners">
				<a href="http://www.create-berlin.de/home_de.html" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/CreateBerlin.jpg" alt="CreateBerlin" />	</a>				
				<!--<a href="http://www.coellenperon.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/Collenperon.jpg" alt="Collenperon" />	</a>-->
				<a href="http://www.connectingcities.net/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/ConnectingCities.jpg" alt="ConnectingCities" />	</a>				
				<a href="http://deutschlandstipendium.de/de/1966.php" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/DeutschlandStipendium.jpg" alt="DeutschlandStipendium" />	</a>				
				<a href="http://www.netz-werker.com/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/DieNetzwerker.jpg" alt="DieNetzwerker" />	</a>				
				<a href="http://www.esch-brand.com/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/ESCHthebrandconsultants.jpg" alt="ESCHthebrandconsultants" />	</a>				
				<a href="http://www.dhbw.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/dhbw.jpg" alt="dhbw" />	</a>				
				<a href="http://spitzenfrauen-berlin.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/FrauenAnDieSpitze.jpg" alt="FrauenAnDieSpitze" />	</a>				
				<a href="http://www.waza.org/en/site/home" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/WorldAssociationOfZoos.jpg" alt="WorldAssociationOfZoos" />	</a>				
				<a href="http://www.iaapa.org/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/Jaapamember.jpg" alt="Jaapamember" />	</a>				
				<a href="http://www.famab.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/MemberOfFamab.jpg" alt="MemberOfFamab" />	</a>				
				<a href="http://freizeitparks.de/verband/der-verband/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/VDFU.jpg" alt="VDFU" />	</a>				
				<a href="http://www.izw-berlin.de/welcome.html" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/LeibnizInstituteForZoo.jpg" alt="LeibnizInstituteForZoo" />	</a>				
				<a href="http://www.home-mag.com/index.php?id=1&no_cache=1 " target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/Home.jpg" alt="Home" />	</a>				
				<a href="http://www.german-design-council.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/RatFurFormgebung.jpg" alt="RatFurFormgebung" />	</a>				
				<a href="http://www.imk.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/imk.jpg" alt="imk" />	</a>				
				<a href="https://www.design-akademie-berlin.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/design-akademie-berlin.jpg" alt="design-akademie-berlin" />	</a>				
				<a href="https://www.htw-berlin.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/htw.jpg" alt="htw" />	</a>				
				<a href="http://www.reichwaldschultz.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/reichwaldsschutltz.jpg" alt="reichwaldsschutltz" />	</a>				
				<a href="http://www.teaconnect.org/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/TEA_ProudMember_gray.jpg" alt="TEA_ProudMember" />	</a>				
				<a href="http://www.zoodirektoren.de/" target="_blank"><img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logos/VDZ_Logo_gray_70px.jpg" alt="VDZ" />	</a>				
			</div>
		</div><!-- .entry-partners -->
	</div><!-- .entry-block -->

</article><!-- #post-## -->
