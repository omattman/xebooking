<?php

/* Template Name: Underholdning */

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$stand_up_billede = get_field('stand_up_billede');
$foredragsholder_billede = get_field('foredragsholder_billede');

?>

<div id="main-content">
	<div class="container narrow">
		<div id="content-area" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (et_get_option('divi_integration_single_top') <> '' && et_get_option('divi_integrate_singletop_enable') == 'on') echo(et_get_option('divi_integration_single_top')); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="category__header-main g__flex g__flex-a-end g__flex-space-between f__up">
						<div class="">
							<h2 class="category__header-byline">Stand-up / Comedy</h2>
							<h3 class="category__header-title"><?php the_field( 'stand_up_titel' ); ?></h3>
						</div>
					</div>
					<a class="category__header-image" href="<?php the_field('stand_up_link'); ?>">
						<img src="<?php echo $stand_up_billede['url']; ?>" alt="<?php echo $stand_up_billede['alt']; ?>" />
					</a>
					<div class="sp__5--xlg sp__5--lg sp__3--md sp__2--sm"></div>
					<div class="category__header-sub g__flex g__flex-a-end g__flex-space-between f__up">
						<div class="">
							<h2 class="category__header-byline">Entertainere, Tryllekunst og dinner</h2>
							<h3 class="category__header-title2"><?php the_field('blandet_underholdning_titel'); ?></>
						</div>
					</div>
					<div class="category__header-main u__hidden--sm">
						<div class="g__row">
						<?php
						if( have_rows('blandet_underholdning_kategori') ):
							while ( have_rows('blandet_underholdning_kategori') ) : the_row();
								$kategori_billede = get_sub_field('kategori_billede');
								$kategori_titel = get_sub_field('kategori');
								$kategori_link = get_sub_field('kategori_link');
								?>

								<div class="g__c4 f__center">
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
							if( have_rows('blandet_underholdning_kategori') ):
								while ( have_rows('blandet_underholdning_kategori') ) : the_row();
									$kategori_billede = get_sub_field('kategori_billede');
									$kategori_titel = get_sub_field('kategori');
									$kategori_link = get_sub_field('kategori_link');
									?>
									<div class="carousell-cell">
										<div class="slider__card">
											<a href="<?php echo $kategori_link?>">
												<figure class="carousell-cell-image" style="background-image:url('<?php echo $kategori_billede['url']; ?>')"></figure>
												<div class="slider__info f__center">
													<h2 class="slider__title truncate"><a href="<?php echo $kategori_link?>"><?php echo $kategori_titel ?></a></h2>
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
					<div class="sp__5--xlg sp__5--lg"></div>
					<div class="category__header-main g__flex g__flex-a-end g__flex-space-between f__up">
						<div class="">
							<h2 class="category__header-byline">Foredragsholdere</h2>
							<h3 class="category__header-title"><?php echo the_field( 'foredragsholder_titel' ); ?></>
						</div>
					</div>
					<a class="category__header-image" href="<?php echo the_field('foredragsholder_link'); ?>">
						<img src="<?php echo $foredragsholder_billede['url']; ?>" alt="<?php echo $foredragsholder_billede['alt']; ?>" />
					</a>
					<div class="sp__8"></div>
					<div class="category__header-main">
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
