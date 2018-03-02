<div id="main-content">
  <div class="container narrow__small">
    <div id="content-area" class="clearfix">
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
          <h2>Hvad er det der sker her?</h2>
          <?php the_content(); ?>

        </article>

      <?php endwhile; ?>

      <?php get_sidebar(); ?>
    </div> <!-- #content-area -->
  </div> <!-- .container -->
</div> <!-- #main-content -->