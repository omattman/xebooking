<?php

/* Template Name: Forside */
get_header();
require_once "Mobile_Detect.php";
?>



<div id="main-content">
	<div class="container narrow">
		<div id="content-area" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
          <div class="homepage__hero">
          <?php
             if( have_rows('kategori_1') ):
              while ( have_rows('kategori_1') ) : the_row();
                $titel = get_sub_field('titel');
                $knap_tekst = get_sub_field('knap_tekst');
                $knap_url = get_sub_field('knap_url');
                $baggrundsbillede = get_sub_field('baggrundsbillede');

                $detect = new Mobile_Detect;
                if ($detect->isMobile()) { ?>
                  <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
                    <div class="">
                      <div class="category__header-byline f__up">Landets bedste musik</div>
                      <h1><a href="<?php echo $knap_url ?>" class="category__header-title"><?php echo $titel ?></a></h1>
                    </div>
                  </div>
                  <div class="g__row">
                    <div class="g__c12">
                      <a href="<?php echo $knap_url?>">
                        <img class="category__header-image" src="<?php echo $baggrundsbillede['url']; ?>" alt="<?php echo $baggrundsbillede['alt']; ?>" />
                      </a>
                    </div>
                  </div>
                  <div class="sp__05"></div>
                <?php } else { ?>
                  <div class="sp__5"></div>
                  <div class="homepage__hero-left u__o-hidden">
                    <a href="<?php echo $knap_url?>">
                      <img src="<?php echo $baggrundsbillede['url']; ?>" alt="<?php echo $baggrundsbillede['alt']; ?>" />
                      <div class="homepage__hero-left-desc">
                        <h1 class="t__h2"><?php echo $titel ?></h1>
                        <div class="homepage__hero-cta u__right">
                          <div class="homepage__hero-button">
                            <div class="homepage__hero-button--bg"></div>
                            <div class="homepage__hero-button--text">Find artist</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>
                    <?php
                  }
                endwhile;
              else :
            endif;
            ?>

            <?php
             if( have_rows('kategori_2') ):
              while ( have_rows('kategori_2') ) : the_row();
                $titel = get_sub_field('titel');
                $knap_tekst = get_sub_field('knap_tekst');
                $knap_url = get_sub_field('knap_url');
                $baggrundsbillede = get_sub_field('baggrundsbillede');

                $detect = new Mobile_Detect;
                if ($detect->isMobile()) { ?>
                  <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
                    <div class="">
                      <div class="category__header-byline f__up">Grin, latter og minder</div>
                      <h2 class="category__header-title"><a href="<?php echo $knap_url ?>"><?php echo $titel ?></a></h2>
                    </div>
                  </div>
                  <div class="g__row">
                    <div class="g__c12">
                      <a href="<?php echo $knap_url?>">
                        <img class="category__header-image" src="<?php echo $baggrundsbillede['url']; ?>" alt="<?php echo $baggrundsbillede['alt']; ?>" />
                      </a>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="homepage__hero-right u__o-hidden">
                      <a href="<?php echo $knap_url?>">
                        <img src="<?php echo $baggrundsbillede['url']; ?>" alt="<?php echo $baggrundsbillede['alt']; ?>" />
                        <div class="homepage__hero-right-desc">
                          <h2 class="t__h2 f__right--xlg f__right--lg"><?php echo $titel ?></h2>
                          <div class="homepage__hero-cta u__right">
                            <div class="homepage__hero-button">
                              <div class="homepage__hero-button--bg"></div>
                              <div class="homepage__hero-button--text">Find artist</div>
                            </div>
                          </div>
                        </div>
                      </a>
                    <?php
                  }
                endwhile;
              else :
            endif;
            ?>
            </div>
          </div>
          <div class="sp__8--xlg sp__8--lg"></div>
          <div id="popular-categories">
            <div class="category__header-sub g__flex g__flex-a-end g__flex-space-between">
              <div class="u__inline-block">
                <div class="category__header-byline f__up"><?php the_field('kategori_subheading') ?></div>
                <h2 class="category__header-title2"><?php the_field('kategori_titel'); ?></h2>
              </div>
              <div class="category__header-cta u__hidden--sm">
                <a class="homepage__hero-button" href="//www.xe.dk/artister/">
                  <div class="homepage__hero-button--bg"></div>
                  <div class="homepage__hero-button--text">Alle kategorier</div>
                </a>
              </div>
            </div>
            <?php
              $detect = new Mobile_Detect;

              if ($detect->isMobile()) { ?>
                <div class="slider">
                  <?php
                  if( have_rows('kategori_liste') ):
                    while ( have_rows('kategori_liste') ) : the_row();
                      $kategori_billede = get_sub_field('kategori_billede');
                      $kategori_navn = get_sub_field('kategori_navn');
                      $kategori_link = get_sub_field('kategori_url');

                      $image_size = 'popular-categories';
                      $image_array = wp_get_attachment_image_src($kategori_billede, $image_size);
                      $image_url = $image_array[0];
                      ?>
                      <div class="carousell-cell">
                        <div class="slider__card">
                          <a href="<?php echo $kategori_link?>">
                            <figure class="carousell-cell-image" style="background-image:url('<?php echo $image_url; ?>')"></figure>
                            <div class="slider__info f__center">
                              <div class="slider__title truncate"><a href="<?php echo $kategori_link?>"><?php echo $kategori_navn ?></a></div>
                            </div>
                          </a>
                        </div>
                      </div>
                    <?php
                    endwhile;
                  endif; ?>
                </div> <?php
              } else { ?>
                <div class="category__header-main u__hidden--sm">
                  <div class="g__row">
                  <?php
                  if( have_rows('kategori_liste') ):
                    while ( have_rows('kategori_liste') ) : the_row();
                      $kategori_billede = get_sub_field('kategori_billede');
                      $kategori_navn = get_sub_field('kategori_navn');
                      $kategori_link = get_sub_field('kategori_url');

                      $image_size = 'popular-categories';
                      $image_array = wp_get_attachment_image_src($kategori_billede, $image_size);
                      $image_url = $image_array[0];
                      ?>

                      <div class="g__c3 f__center">
                        <a href="<?php echo get_sub_field('kategori_url'); ?>">
                          <img src="<?php echo $image_url; ?>" alt="<?php echo $kategori_billede['alt']; ?>" />
                        </a>
                        <div class="category__item-footer f__und f__bold"><a href="<?php echo $kategori_link?>"><?php echo $kategori_navn ?></a></div>
                      </div>
                    <?php endwhile;
                    else :

                  endif;
                  ?>
                  </div>
                </div> <?php
            } ?>
          </div>
          <div class="sp__9--xlg sp__9--lg sp__4--md sp__4--sm"></div>
          <div id="recommendations">
            <?php
            $anbefaling_titel = get_field('anbefaling_titel');
            $anbefaling_subheading = get_field('anbefaling_subheading');
            $anbefaling_kunde = get_field('anbefaling_kunde');
            $kunde_billede = get_field('kunde_billede');
            $kunde_navn = get_field('kunde_navn');
            $kunde_firma = get_field('kunde_firma');
            ?>
            <div class="category__header-sub g__flex g__flex-a-end g__flex-space-between">
              <div class="u__inline-block">
                <div class="category__header-byline f__up"><?php echo $anbefaling_subheading ?></div>
                <div class="category__header-title2"><?php echo $anbefaling_titel ?></div>
              </div>
              <div class="category__header-cta u__hidden--sm">
                <a class="homepage__hero-button" href="//www.xe.dk/referencer/">
                  <div class="homepage__hero-button--bg"></div>
                  <div class="homepage__hero-button--text">Læs referencer</div>
                </a>
              </div>
            </div>
            <div class="category__header-main">
              <?php echo $anbefaling_kunde ?>
              <div class="sp__01"></div>
              <div class="homepage__customer-person">
                <div class="homepage__customer-image">
                  <img src="<?php echo $kunde_billede['url']; ?>" alt="<?php echo $kunde_billede['alt']; ?>" />
                </div>
                <div class="g__c12">
                  <p class="f__bold"><?php echo $kunde_navn ?></p>
                  <p class="t__small"><?php echo $kunde_firma ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="sp__9--xlg sp__9--lg sp__4--md sp__4--sm"></div>
          <div id="recommended-artist">
            <?php
            $foretrukken_artist_billede = get_field('foretrukken_artist_billede');
            ?>
            <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
              <div class="">
                <div class="category__header-byline f__up"><?php the_field('foretrukken_artist_subheading'); ?></div>
                <h2 class="category__header-title"><?php the_field('foretrukken_artist_navn'); ?></>
              </div>
            </div>
            <a class="category__header-image" href="<?php the_field('foretrukken_artist_link'); ?>">
						  <img src="<?php echo $foretrukken_artist_billede['url']; ?>" alt="<?php echo $foretrukken_artist_billede['alt']; ?>" />
				  	</a>
            <div class="sp__2"></div>
            <div class="category__header-sub g__flex g__flex-a-end g__flex-space-between">
              <div class="u__inline-block">
                <div class="category__header-byline f__up">Anbefalet til dig</div>
                <h3 class="category__header-title2">Vi tror du vil ku’ lide disse artister</h3>
              </div>
            </div>
            <div class="category__header-main">
              <div class="slider">
              <?php
              // register field
              $term = get_field('foretrukken_artist_kategori');

              // get the custom post type's taxonomy terms
              $custom_taxterms = $term;

              // arguments
              $args = array(
              'post_type' => 'project',
              'post_status' => 'publish',
              'posts_per_page' => 12, // you may edit this number
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
              if ($related_items->have_posts()) :
              while ( $related_items->have_posts() ) : $related_items->the_post();
              ?>
                <div class="carousell-cell g__c3">
                  <div class="slider__card">
                    <a href="<?php the_permalink(); ?>">
                      <figure class="carousell-cell-image" style="background-image:url('<?php the_post_thumbnail_url( array(300, 300) )?>')"></figure>
                      <div class="slider__info f__left">
                        <h2 class="slider__title truncate"><?php the_title(); ?></h2>
                        <h3 class="slider__category truncate"><?php echo get_the_term_list( get_the_ID(), 'project_category', '', ', ' ); ?></h3>
                      </div>
                    </a>
                  </div>
                </div>
              <?php
              endwhile;
              endif;
              // Reset Post Data
              wp_reset_postdata();
              ?>
              </div>
            </div>
          </div>
				</article> <!-- .et_pb_post -->
			<?php endwhile; ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
