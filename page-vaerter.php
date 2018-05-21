<?php

/* Template Name: Værter */
get_header();

$vaert_kategori = 'blandet_vaerter_kategori';

?>

<div id="main-content">
	<div class="container narrow">
		<div id="content-area" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="sp__2--xlg sp__5--lg sp__3--md sp__2--sm"></div>
					<div class="category__header-sub g__flex g__flex-a-end g__flex-space-between f__up">
						<div class="">
							<h2 class="category__header-byline">Konferenciers og værter</h2>
							<h3 class="category__header-title"><?php the_field('blandet_vaerter_titel'); ?></h3>
						</div>
					</div>
					<div class="u__hidden--sm">
						<div class="g__row">
						<?php
						if( have_rows($vaert_kategori) ):
							while ( have_rows($vaert_kategori) ) : the_row();
								$kategori_billede = get_sub_field('kategori_billede');
								$kategori_titel = get_sub_field('kategori');
								$kategori_link = get_sub_field('kategori_link');
								?>

								<div class="g__c6 f__center">
									<a href="<?php echo $kategori_link?>">
										<img src="<?php echo $kategori_billede['url']; ?>" alt="<?php echo $kategori_billede['alt']; ?>" />
									</a>
									<h2 class="category__item-footer f__und f__bold">
										<a href="<?php echo $kategori_link?>"><?php echo $kategori_titel ?></a>
									</h2>
								</div>
							<?php endwhile;
							else :

						endif;
						?>
						</div>
					</div>
					<div class="u__hidden--xlg u__hidden--lg u__hidden--md">
						<div class="slider">
							<?php
							if( have_rows($vaert_kategori) ):
								while ( have_rows($vaert_kategori) ) : the_row();
									$kategori_billede = get_sub_field('kategori_billede');
									$kategori_titel = get_sub_field('kategori');
									$kategori_link = get_sub_field('kategori_link');
									?>
									<div class="carousell-cell">
										<div class="slider__card">
											<a href="<?php echo $kategori_link?>">
												<figure class="carousell-cell-image" style="background-image:url('<?php echo $kategori_billede['url']; ?>')"></figure>
												<div class="slider__info f__center">
													<h2 class="slider__title truncate">
														<a href="<?php echo $kategori_link?>"><?php echo $kategori_titel ?></a>
													</h2>
												</div>
											</a>
										</div>
									</div>
								<?php
								endwhile;
							endif;
							?>
						</div>
					</div>
					<div class="sp__8"></div>
					<div class="category__header-main category__header-text">
						<?php
						if( have_rows('titel_og_indhold') ):
							while ( have_rows('titel_og_indhold') ) : the_row();
							?>
							<h1 class="t__larger f__bold"><?php echo get_sub_field('titel'); ?></h1>
							<?php echo get_sub_field('indhold'); ?>

							<?php
							endwhile;
						endif;
						if( have_rows('resterende_indhold') ):
							while ( have_rows('resterende_indhold') ) : the_row();
							?>
							<h2 class="t__larger f__bold"><?php echo get_sub_field('undertitel'); ?></h2>
							<?php echo get_sub_field('indhold'); ?>

							<?php
							endwhile;
						endif;
						?>
					</div>
				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
