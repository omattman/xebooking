<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true ); ?>

<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container narrow">
		<div class="sp__2"></div>
		<div id="content-area" class="clearfix">

<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

					<div class="g__row">
						<div class="g__c12 u__hidden--sm">
						<?php
							echo the_post_thumbnail( 'featured-header' );
						?>
						</div>
						<div class="g__c12 u__hidden--xlg u__hidden--lg u__hidden--md">
						<?php
							echo the_post_thumbnail( 'featured-medium' );
						?>
						</div>
					</div>
					<div class="sp__4--xlg sp__4--lg sp__3--md sp__2--sm"></div>
					<div class="sp__08"></div>
					<div class="g__row">
						<div class="g__c5--xlg g__c5--lg g__c12--md g__c12--sm">
							<?php
								if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb('
								<p id="breadcrumbs">','</p>
								');
								}
							?>
							<div class="sp__3--xlg sp__3--lg sp__2--md sp__2--sm"></div>
							<h1 class="entry-title f__left t__h1 c__black"><?php the_title(); ?></h1>
							<ul class="tabs g__flex g__flex-start g__flex-wrap">
							<?php
								if( have_rows('beskrivelse') ):
									$i = 1;
									while ( have_rows('beskrivelse' ) ) : the_row();
										echo '<li class="tabs__item f__up f__bold" rel="tab' . $i . '">' . get_sub_field( "titel-label" ) . '</li>';
										$i++;
									endwhile;
									echo '</ul>';
									echo '<span class="target"></span>';
									echo '<div class="tab_container">';
									$i = 1;
									while ( have_rows('beskrivelse') ) : the_row();
										echo '<span class="tab_drawer_heading f__up f__bold" rel="tab' . $i . '">' . get_sub_field( "titel-label" ) . '<svg class="tabs__collapsedlabel-icon" focusable="false" viewBox="0 0 24 24" width="1em" height="1em" fill="currentColor" style="margin-bottom: -0.15em;"><path d="M17.437 12.207L9.165 4l-1.16 1.17 7.101 7.048L8 19.38l1.17 1.16z"></path></svg></span>';
										echo '<div id="tab' . $i . '" class="tab_content">';
										echo '<h2 class="t__h5">' . get_sub_field( "titel" ) . '</h2>';
										echo get_sub_field( "indhold" );
										echo '</div>';
										$i++;
									endwhile;
									echo '</div>';
									else :
											// no rows found
								endif;
							?>
							<!--<p class="artist__text-lead"><?php the_field('teaser'); ?></p>-->
							<div class="sp__7--xlg sp__7--lg sp__3--md sp__3--sm"></div>
							<div class="g__row artist__cta">
								<?php
								// if 'anbefalinger' is available, show both buttons layout
								if( have_rows('anbefalinger') ): ?>

								<div class="g__c6--xlg g__c12--sm">
									<a type="button" class="btn btn__secondary u__full" data-remodal-target="modal-anbefaling">
										Læs anbefalinger
										<span class="star">
											<svg class="svg-icon" viewBox="0 0 20 20">
												<path fill="#000" d="M16.85,7.275l-3.967-0.577l-1.773-3.593c-0.208-0.423-0.639-0.69-1.11-0.69s-0.902,0.267-1.11,0.69L7.116,6.699L3.148,7.275c-0.466,0.068-0.854,0.394-1,0.842c-0.145,0.448-0.023,0.941,0.314,1.27l2.871,2.799l-0.677,3.951c-0.08,0.464,0.112,0.934,0.493,1.211c0.217,0.156,0.472,0.236,0.728,0.236c0.197,0,0.396-0.048,0.577-0.143l3.547-1.864l3.548,1.864c0.18,0.095,0.381,0.143,0.576,0.143c0.256,0,0.512-0.08,0.729-0.236c0.381-0.277,0.572-0.747,0.492-1.211l-0.678-3.951l2.871-2.799c0.338-0.329,0.459-0.821,0.314-1.27C17.705,7.669,17.316,7.343,16.85,7.275z M13.336,11.754l0.787,4.591l-4.124-2.167l-4.124,2.167l0.788-4.591L3.326,8.5l4.612-0.67l2.062-4.177l2.062,4.177l4.613,0.67L13.336,11.754z"></path>
											</svg>
										</span>
									</a>
									<div class="sp__1--sm"></div>
								</div>
								<div class="g__c6--xlg g__c12--sm p__left-none">
									<a href="#artist__cta" class="btn btn__primary u__full">Forespøg på artist</a>
								</div>

								<?php else : ?>

								<div class="g__c8--xlg g__c12--sm">
									<a href="#artist__cta" class="btn btn__primary u__full">Forespøg på artist</a>
								</div>

								<?php endif; ?>
							</div>
							<div class="sp__1"></div>
							<div class="sp__06"></div>
							<div class="artist__cta">
								<span class="u__block c__black t__smallest">
									<span class="detail u__inline"><svg focusable="false" viewBox="0 0 24 24" width="1em" height="1em" style="margin-bottom: 0.2em; fill: #ff6900;"><path d="M9.857 18L4.5 12.952 6 11.538l3.857 3.635L18 7.5l1.5 1.413z"></path></svg></span>
									<span class="f__bold">Gratis rådgivning</span>
									<span>på <a href="tel:+4570217025">+45 7021 7025</a></span>
								</span>
								<span class="u__block c__black t__smallest">
									<span class="detail u__inline"><svg focusable="false" viewBox="0 0 24 24" width="1em" height="1em" style="margin-bottom: 0.2em; fill: #ff6900;"><path d="M9.857 18L4.5 12.952 6 11.538l3.857 3.635L18 7.5l1.5 1.413z"></path></svg></span>
									<span class="f__bold">+25 års</span>
									<span>erfaring og</span>
									<span class="f__bold"><a class="" href="//www.xe.dk/referencer/">+180</a></span>
									<span><a href="//www.xe.dk/referencer/">anbefalinger</a></span>
								</span>
								<span class="u__block c__black t__smallest">
									<span class="detail u__inline"><svg focusable="false" viewBox="0 0 24 24" width="1em" height="1em" style="margin-bottom: 0.2em; fill: #ff6900;"><path d="M9.857 18L4.5 12.952 6 11.538l3.857 3.635L18 7.5l1.5 1.413z"></path></svg></span>
									<span class="f__bold">Kontrakt</span>
									<span>på hele aftalen</span>
								</span>
							</div>
							<div class="sp__6--xlg sp__6--lg sp__5--md sp__5--sm"></div>
							<div class="artist__category u__hidden--sm">
								<span>Kan bookes som:</span>
								<span class="artist__category-button"><?php echo get_the_term_list( get_the_ID(), 'project_category', '' ); ?></span>
							</div>
						</div>
						<div id="artist__cta" class="g__c-artist-custom g__c12--md g__c12--sm artist__left-gutter">
							<div class="artist__description">
								<div class="artist__cta-formular u__relative u__o-hidden">
									<p>Send din forespørgsel eller kontakt os nu på tlf. <a href="tel:+4570217025" class="c__orange">+45 7021 7025</a>.</p>
									<div class="sp__1"></div>
									<p><span class="f__bold">Husk:</span> Det koster ikke noget at spørge...</p>
									<div class="sp__2--xlg sp__2--lg sp__1--md sp__1--sm"></div>
									<?php echo do_shortcode('[contact-form-7 html_id="artist__forespoergsel-cta" id="817" title="Artist Profil Formular"]'); ?>
									<div class="sp__3"></div>
									<p class="f__center" style="text-decoration: underline";>NB: Din forespørgsel forpligter ikke før nærmere aftale.</p>
								</div>
							</div>
						</div>
					</div>

					<?php if( get_field('embed_url') ): ?>
					<div class="sp__6"></div>
					<div class="artist__embed">
						<?php the_field('embed_url'); ?>
					</div>
					<?php endif; ?>

					<div class="sp__6"></div>
					<div class="artist__suggestions">
						<h4 class="t__h3">Lignende artister</h4>
					<?php

					// get the custom post type's taxonomy terms

					$custom_taxterms = wp_get_object_terms( $post->ID, 'project_category', array('fields' => 'ids') );
					// arguments
					$args = array(
					'post_type' => 'project',
					'post_status' => 'publish',
					'posts_per_page' => 8, // you may edit this number
					'orderby' => 'rand',
					'tax_query' => array(
							array(
									'taxonomy' => 'project_category',
									'field' => 'id',
									'terms' => $custom_taxterms
							)
					),
					'post__not_in' => array ($post->ID),
					);
					$related_items = new WP_Query( $args );
					// loop over query
					echo '<div class="slider">';
					if ($related_items->have_posts()) :
					while ( $related_items->have_posts() ) : $related_items->the_post();
					?>
						<div class="carousell-cell">
							<div class="slider__card">
								<a href="<?php the_permalink(); ?>">
									<figure class="carousell-cell-image" style="background-image:url('<?php the_post_thumbnail_url( array(300, 300) )?>')"></figure>
									<div class="slider__info f__left">
										<h3 class="slider__category truncate"><?php echo get_the_term_list( get_the_ID(), 'project_category', '', ', ' ); ?></h3>
										<h2 class="slider__title f__up truncate"><?php the_title(); ?></h2>
									</div>
								</a>
							</div>
						</div>
					<?php
					endwhile;
					endif;
					echo '</div>';
					// Reset Post Data
					wp_reset_postdata();
					?>
					</div>
				<?php endif; ?>

				<!-- display modal if 'anbefalinger' is available -->
				<?php if( have_rows('anbefalinger') ): ?>
					<div class="remodal artist__recommendations f__left" style="max-width: 600px" data-remodal-id="modal-anbefaling" data-remodal-options="hashTracking: false, closeOnOutsideClick: true">
						<div class="t__h2 f__left truncate">Anbefalinger <?php the_title(); ?></div>
							<div class="artist__recommendations__container">
								<button data-remodal-action="close" class="remodal-close"></button>
								<?php while ( have_rows('anbefalinger') ) : the_row();

								// vars
								$anbefaling = get_sub_field('anbefaling');
								$personens_navn = get_sub_field('personens_navn');
								$firma = get_sub_field('firma');
								?>

								<div class="artist__recommendations-story">
								<?php echo '<p>' . $anbefaling . '</p>'; ?>
									<div class="artist__recommendations-person">
										<?php echo '<p>' . $personens_navn . '</p>'; ?>
										<?php if($firma):
											echo '<p>' . $firma . '</p>'; ?>
										<?php endif; ?>
									</div>
								</div>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

					<div class="remodal f__left" style="max-width: 600px;" data-remodal-id="modal-foresporgsel" data-remodal-options="hashTracking: false, closeOnOutsideClick: true">
						<button data-remodal-action="close" class="remodal-close"></button>
						<div class="t__h2 f__left">Send forespørgsel</div>
						<div class="artist__cta-formular u__relative u__o-hidden">
							<p>Send din forespørgsel eller kontakt os nu på tlf. <a href="tel:+4570217025" class="c__orange">+45 7021 7025</a>.</p>
							<div class="sp__1"></div>
							<p><span class="f__bold">Husk:</span> Det koster ikke noget at spørge...</p>
							<div class="sp__2--xlg sp__2--lg sp__1--md sp__1--sm"></div>
							<?php echo do_shortcode('[contact-form-7 html_id="artist__forespoergsel-cta" id="817" title="Artist Profil Formular"]'); ?>
							<div class="sp__3"></div>
							<p class="f__center" style="text-decoration: underline";>NB: Din forespørgsel forpligter ikke før nærmere aftale.</p>
						</div>
					</div>

				</article> <!-- .et_pb_post -->
			<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>