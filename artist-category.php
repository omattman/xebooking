<div id="main-content">
  <div class="container narrow__small">
    <div id="content-area" class="clearfix">
      <?php while ( have_posts() ) : the_post(); ?>
        <article class="category-text" id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
          <div class="sp__11--xlg sp__11--lg sp__7--md sp__5--sm"></div>
          <h1 class="t__h2 f__left"><?php the_title(); ?></h1>
          <?php echo the_field('beskrivelse') ?>
          <div class="line__horizontal"></div>
          <?php the_content(); ?>

          <?php
            if( have_rows('uddybende_beskrivelse') ):
              ?>
              <div class="line__horizontal"></div>
              <?php              
							while ( have_rows('uddybende_beskrivelse') ) : the_row();
								$undertitel = get_sub_field('undertitel');
                $beskrivelse = get_sub_field('beskrivelse');
                ?>
                <div class="sp__3"></div>
                <h2 class="t__h3 u__reset"><?php echo $undertitel; ?></h2>
                <?php echo $beskrivelse; ?>
							<?php endwhile;
							else :

						endif;
          ?>

        </article>

      <?php endwhile; ?>

      <?php get_sidebar(); ?>
    </div> <!-- #content-area -->
  </div> <!-- .container -->
</div> <!-- #main-content -->