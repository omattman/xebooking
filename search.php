<?php $search_query = get_search_query(); ?>

<head>
  <title>Du søgter efter <?php printf($search_query) ?> – xe</title>
</head>
<?php get_header(); ?>

<div id="main-content" class="clearfix">
  <?php
  if ( have_posts() ) : ?>
    <div class="sp__10--xlg sp__10--lg sp_6--md sp__3--sm"></div>
    <section class="container narrow">
      <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
        <div class="">
          <h2 class="category__header-byline f__up">Du har søgt efter:</h2>
          <h1 class="category__header-title">
          <?php
            /* Search Count */
            // Changed '&new' to 'new'
            $allsearch = new WP_Query("s=$s&showposts=-1");
            $key = wp_specialchars($s, 1);
            $count = $allsearch->post_count;
            _e('');
            _e('<span class="search-terms">'); echo $key; _e('</span>'); wp_reset_query();
          ?>
          </h1>
          <div class="sp__4"></div>
        </div>
      </div>
      <div class="category__header-main">
        <div class="et_pb_portfolio_grid g__row clearfix et_pb_module">
        <?php while ( have_posts() ) : the_post();
          $post_format = et_pb_post_format(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post et_pb_portfolio_item g__c3--xlg g__c3--lg g__c3--md g__c6--sm g__flex artist__item' ); ?>>
              <div class="artist__display et_pb_portfolio_item">

                <?php
                  $thumb = '';

                  $width = (int) apply_filters( 'et_pb_index_blog_image_width', 303 );

                  $height = (int) apply_filters( 'et_pb_index_blog_image_height', 412 );
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
                      <h2 class="artist__display-title truncate"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
      </div>
    </div> <!-- #main-content -->
  </div> <!-- et_pb_portfolio -->
</section> <!-- container -->

<?php get_footer(); ?>