<?php

/* Template Name: Nyheder */

get_header();

// the query
$query_posts = new WP_Query(
	array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 8,
	)
);

if ( $query_posts->have_posts() ) :
	// the loop
	$i = 0;
	while ( $query_posts->have_posts() ) : $query_posts->the_post();
		$i++;
			if ($i == 1) { ?>
				<div class="g__row">
					<article id="post-<?php the_ID(); ?>" class="g__c12">
						<div class="hero__news">
							<div class="hero__image">
								<a href="<?php the_permalink(); ?>" class="f__no-und">
									<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
									?>
								</a>
							</div>
							<div class="hero__container">
								<div class="hero__inner">
									<div class="post__media-wrap">
										<div class="post__media-content">
											<div class="f__up categories__link">
												<?php echo strip_tags(get_the_category_list(' | ')) ?>
												/
												<?php the_weekday() ?>
												/
												<?php echo get_the_time(); ?>
											</div>
										</div>
									</div>
									<h1 class="hero__title f__bold c__black">
										<a href="<?php the_permalink(); ?>" class="f__no-und"><?php the_title(); ?></a>
									</h1>
									<div class="hero__desc">
									<?php
										if ( has_excerpt() ) {
												the_excerpt();
										} else {
												truncate_post( 200 );
										}
									?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			} else if ($i == 2) { ?>
				<div class="sp__5"></div>
				<div class="featured__container g__flex">
					<article id="post-<?php the_ID(); ?>" class="">
						<div class="featured__news">
							<div class="featured__image">
								<a href="<?php the_permalink(); ?>" class="f__no-und">
									<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
									?>
								</a>
							</div>
							<div class="featured__inner">
								<div class="post__media-wrap">
									<div class="post__media">
										<div class="post__media-content">
											<div>
												<div class="f__up categories__link">
												<?php echo strip_tags(get_the_category_list(' | ')) ?>
												/
												<?php the_weekday() ?>
												/
												<?php echo get_the_time(); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<h2 class="featured__title f__bold c__black">
									<a href="<?php the_permalink(); ?>" class="f__no-und"><?php the_title(); ?></a>
								</h2>
								<div class="featured__desc">
								<?php
									if ( has_excerpt() ) {
											the_excerpt();
									} else {
											truncate_post( 120 );
									}
								?>
								</div>
							</div>
						</div>
					</article>
					<div class="sp__5--sm"></div>
					<div class="featured__sidebar">
						<div class="email__newsletter-inner f__center">
							<div class="email__newsletter-headline f__bold">
								Har du spørgsmål til artister eller priser?
							</div>
							<div class="sp__2"></div>
							<div class="email__newsletter-headline">
								Husk: det koster ikke noget at spørge ...
							</div>
							<hr class="email__newsletter-hr">
							<a href="tel:+4570217025" class="email__newsletter-headline c__orange">Ring +45 7021 7025</a>
						</div>
					</div>
				</div>
				<div class="sp__5"></div>
		<?php }
	endwhile;

	else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<div class="post__container g__flex">
	<div class="g__row g__row-negative posts">
	<?php
	if ( $query_posts->have_posts() ) :
		// the loop
		$i = 0;
		while ( $query_posts->have_posts() ) : $query_posts->the_post();
			$i++;
			if ($i >= 3) { ?>
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
										<?php
											echo strip_tags(get_the_category_list(' | ')) ?>
											/
											<?php the_weekday() ?>
											/
											<?php echo get_the_time(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<h2 class="post__title f__bold c__black">
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
			<?php }
		endwhile;
	wp_reset_postdata();

	else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	</div>
</div>


<?php get_footer(); ?>