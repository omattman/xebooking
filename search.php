
<?php get_header(); ?>

<div id="main-content" class="clearfix">
	<div class="et_pb_section section et_pb_section_0 et_section_regular">
		<section class="container narrow et_pb_row et_pb_row_0">
			<div class="et_pb_column et_pb_column_4_4  et_pb_column_0">
				<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left et_pb_text_0">
          <div class="et_pb_text_inner">
            <div class="sp__6"></div>
            <h1 class="t__h2 c__dark-blue f__left">Søgeresultater</h1>
              Søgeord: <strong><?php /* Search Count */
							// Changed '&new' to 'new'
							$allsearch = new WP_Query("s=$s&showposts=-1");
							$key = wp_specialchars($s, 1);
							$count = $allsearch->post_count;
							_e('');
							_e('<span class="search-terms">'); echo $key; _e('</span>'); wp_reset_query(); ?> </strong>
          </div>
          <div class="et_pb_code et_pb_module  et_pb_code_0">
            <div class="line__horizontal"></div>
          </div>
        </div>
        <div class="et_pb_portfolio_grid g__row clearfix et_pb_module">
				<?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            $post_format = et_pb_post_format(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post et_pb_portfolio_item g__c3--xlg g__c3--lg g__c3--md g__c6--sm g__flex artist__item' ); ?>>
              <div class="artist__display">

                <?php
                  $thumb = '';

                  $width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

                  $height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
                  $classtext = 'et_pb_post_main_image';
                  $titletext = get_the_title();
                  $thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
                  $thumb = $thumbnail["thumb"];

                  if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) {
                    if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) :
                      printf(
                        '<div class="et_main_video_container">
                          %1$s
                        </div>',
                        $first_video
                      );
                    elseif ( ! in_array( $post_format, array( 'gallery' ) ) && 'on' === et_get_option( 'divi_thumbnails_index', 'on' ) && '' !== $thumb ) : ?>
                      <a href="<?php the_permalink(); ?>">
                        <?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
                      </a>
                  <?php
                    elseif ( 'gallery' === $post_format ) :
                      et_pb_gallery_images();
                    endif;
                  } ?>

                  <div class="artist__display-box">
                    <?php if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) : ?>
                      <?php if ( ! in_array( $post_format, array( 'link', 'audio' ) ) ) : ?>
                      <h3 class="f__center truncate"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
              </div>
            </article> <!-- .et_pb_post -->
        <?php
          endwhile;

          if ( function_exists( 'wp_pagenavi' ) )
            wp_pagenavi();
            else
              get_template_part( 'includes/navigation', 'index' );
            else :
              get_template_part( 'no-results', 'index' );
          endif;
        ?>
        </div> <!-- et_pb_portfolio -->
			</div> <!-- .et_pb_column -->
		</section> <!-- container -->
	</div>  <!-- .et_pb_section -->
</div> <!-- #main-content -->

<?php get_footer(); ?>