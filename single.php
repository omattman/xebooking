<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

// estimated read time
function reading_time() {
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);

	if ($readingtime == 1) {
		$timer = " minuts læsning";
	} else {
		$timer = " minutters læsning";
	}
	$totalreadingtime = $readingtime . $timer;

	return $totalreadingtime;
}

?>

<div id="main-content">
	<div class="">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( '' . $additional_class ); ?>>
					<?php if ( ( 'off' !== $show_default_title && $is_page_builder_used ) || ! $is_page_builder_used ) { ?>
						<div class="container">
							<div class="article__hero">
								<div class="category__link f__up u__inline-block"><?php echo strip_tags( get_the_category_list() ); ?> |</div>
								<div class="category__text f__up u__inline-block"><?php echo reading_time(); ?></div>
								<h1 class="article__hero-title"><?php the_title(); ?></h1>
							</div>
						</div>
						<div class="article__hero-image">
								<?php the_post_thumbnail(); ?>
						</div>
					<?php  } ?>

					<div class="container narrow">
						<div class="article__wrap g__row g__flex">
							<div class="article__team g__c12">
								<div class="article__team-container">
									<div class="article__team-image">
										<img src="https://www.xe.dk/wp-content/uploads/2017/12/niels-kontakt.png" alt="Niels Winther">
									</div>
									<div class="article__team-image">
										<img src="https://www.xe.dk/wp-content/uploads/2017/09/maiken-headshot.png" alt="Maiken Dannesboe">
									</div>
									<div class="f__up">
										<span>
											Vi tilbyder over 25 års erfaring med Danmarks absolut bedste artister
										</span>
									</div>
									<div class="sp__1"></div>
									<a href="tel:+4570217025" class="c__orange f__up u__hidden--md u__hidden--sm">Ring +45 7021 7025 og book nu</a>
									<div class="u__hidden--xlg u__hidden--lg" style="max-width: 200px; margin: 0 auto;">
										<a href="#cta__news-article" class="btn btn__primary btn__full-width">Send forespørgsel</a>
									</div>
								</div>
								<?php if ( get_field('billede_ophavsrettigheder') ): ?>
									<div class="article__credit">
									Foto: <?php the_field('billede_ophavsrettigheder'); ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="g__c12">
								<div class="sp__4"></div>
							</div>
							<div class="article__inner g__c7--xlg g__c7--lg g__12--md g__12--sm">
								<?php the_content(); ?>
							</div>
							<div class="g__c1"></div>
							<div class="g__c4--xlg g__c4--lg g__c12--md g__c12--sm">
								<div class="sp__1"></div>
								<div class="sp__03"></div>
								<div id="cta__news-article" class="cta__lead">
									<div class="t__h3 f__center">Send forespørgsel</div>
									<div class="artist__cta-formular u__relative u__o-hidden">
										<p>Send din forespørgsel eller kontakt os nu på tlf. <a href="tel:+4570217025" class="c__orange">+45 7021 7025</a>.</p>
										<div class="sp__1"></div>
										<p><span class="f__bold">Husk:</span> Det koster ikke noget at spørge...</p>
										<div class="sp__2--xlg sp__2--lg sp__1--md sp__1--sm"></div>
										<?php echo do_shortcode('[contact-form-7 html_id="nyhedsartikel__forespoergsel-cta" id="6768" title="Nyheds Artikel Formular"]'); ?>
										<div class="sp__3"></div>
										<p class="f__center" style="text-decoration: underline";>NB: Din forespørgsel forpligter ikke før nærmere aftale.</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="sp__5--xlg sp__5--lg sp__3--md sp__01--sm"></div>

					<div class="container narrow f__center">
					<h4 class="t__h4 f__up f__und" style="font-size: 18px; font-weight: 500;">Relaterede nyheder</h4>
					</div>
					<div class="post__container g__flex">
						<div class="g__row g__row-negative posts">
						<?php
							$args = array(
								'numberposts' => 3,
								'orderby' => 'rand',
								'post_status' => 'publish',
								'offset' => 1,
								'post__not_in' => array ($post->ID),
							);
							$rand_posts = get_posts( $args );
							foreach( $rand_posts as $post ) : ?>
								<article id="post-<?php the_ID(); ?>" class="g__col blog">
								<div class="post__image">
									<a href="<?php the_permalink(); ?>" class="f__no-und">
										<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										}
										?>
									</a>
								</div>
								<div class="post__inner">
									<div class="post__media-wrap">
										<div class="post__media">
											<div class="post__media-content">
												<div>
													<div class="f__up categories__link">
													<?php echo strip_tags( get_the_category_list() ); ?> |
													</div>
													<div class="f__up categories__link">
														<?php echo reading_time(); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<h2 class="post__title c__black">
										<a href="<?php the_permalink(); ?>" class="f__no-und"><?php the_title(); ?></a>
									</h2>
									<div class="post__desc">
									<?php
										if ( has_excerpt() ) {
												the_excerpt();
										} else {
												truncate_post( 120 );
										}
									?>
									</div>
								</div>
							</article>
							<?php endforeach; ?>
						</div>
					</div>


				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>

<?php ini_set("memory_limit", -1); ?>