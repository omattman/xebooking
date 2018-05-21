<?php
/**
 * Search results are contained within a div.searchwp-live-search-results
 * which you can style accordingly as you would any other element on your site
 *
 * Some base styles are output in wp_footer that do nothing but position the
 * results container and apply a default transition, you can disable that by
 * adding the following to your theme's functions.php:
 *
 * add_filter( 'searchwp_live_search_base_styles', '__return_false' );
 *
 * There is a separate stylesheet that is also enqueued that applies the default
 * results theme (the visual styles) but you can disable that too by adding
 * the following to your theme's functions.php:
 *
 * wp_dequeue_style( 'searchwp-live-search' );
 *
 * You can use ~/searchwp-live-search/assets/styles/style.css as a guide to customize
 */
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $post_type = get_post_type_object( get_post_type() ); ?>
		<div class="searchwp-live-search-result">
			<a class="searchwp-live-search-item" href="<?php echo esc_url( get_permalink() ); ?>">
				<figure><?php echo get_the_post_thumbnail( $page->ID, array(75, 75) ); ?></figure>
				<figcaption>
					<p class="searchwp-live-search-artist-title f__up f__bold"><?php the_title(); ?></p>
					<p class="searchwp-live-search-artist-category truncate"><?php echo strip_tags(get_the_term_list( get_the_ID(), 'project_category', '', ' | ' ) ); ?></p>
				</figcaption>
			</a>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<div class="searchwp-live-search-no-results" style="padding: 10px;">
		<p class="f__left"><?php _ex( 'Desværre, vi kunne ikke finde nogen resultater.', 'swplas' ); ?></p>
		<p class="f__left">Ring <a class="c__orange" href="tel:+457017025">+45 7021 7025</a> for professionel vejledning og booking.</p>
	</div>
<?php endif; ?>
