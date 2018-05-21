<?php

/* Template Name: Priser */
require_once "Mobile_Detect.php";
get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$pris_titel = get_field('pris_titel');
$pris_subheading = get_field('pris_subheading');
$pris_byline = get_field('pris_byline');

?>

<div id="main-content">
	<div class="container narrow">
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>">
        <div class="sp__4"></div>

        <div id="pricing">
          <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
            <div class="">
              <h2 class="category__header-byline f__up"><?php echo $pris_subheading ?></h2>
              <h1 class="category__header-title"><?php echo $pris_titel ?></h1>
              <div class="sp__2"></div>
              <p class="t__larger" style="max-width: 600px;"><?php echo $pris_byline ?></p>
            </div>
          </div>
          <div class="sp__2--xlg sp__2--lg sp__3--md sp__3--sm"></div>
          <div class="category__header-main">
            <div class="g__row">
            <?php
              if( have_rows('prisklasser') ):
                while ( have_rows('prisklasser') ) : the_row();
                  $pris_kategori_titel = get_sub_field('pris_kategori_titel');
                  $pris_kategori = get_sub_field('pris_kategori');
                  $pris_kategori_tekst = get_sub_field('pris_kategori_tekst');
                  ?>
                  <div class="g__c4 g__c12--md g__c12--sm">
                    <div class="pricing__option pricing__option__packaging f__left f__center--sm">
                      <div class="sp__1--sm"></div>
                      <h3 class="t__h4 u__reset  f__shrink f__left f__center--sm u__center--sm">
                        <?php echo $pris_kategori_titel ?>
                      </h4>
                      <div class="sp__1"></div>
                      <div class="t__small">
                        fra <span class="f__bold"><?php echo $pris_kategori ?></span> DKK
                      </div>
                      <div class="bundle__view__pricing__hr"></div>
                      <div>
                        <?php echo $pris_kategori_tekst ?>
                      </div>
                      <div class="sp__1"></div>
                      <a class="homepage__hero-button" href="//www.xe.dk/forespoergsel/">
                        <div class="homepage__hero-button--bg"></div>
                        <div class="homepage__hero-button--text">Send forespørgsel</div>
                      </a>
                    </div>
                    <div class="sp__2--sm"></div>
                  </div>
                <?php
                endwhile;
              endif; ?>
            </div>
          </div>
          <div class="sp__1--xlg sp__1--lg sp__4--md sp__4--sm"></div>
        </div>

        <div class="cta__lead">
          <div class="container">
            <div class="g__row g__flex g__flex-middle">
              <div class="g__c6--xlg g__c6--lg g__c12--md g__c12--sm f__center--md f__center--sm">
                <h2 class="t__h2 cta__lead__h2">Få prisen nu</h2>
                <div class="t__smaller">
                  <div style="max-width: 420px;">
                    <strong>Hvad skal jeg vælge?</strong> Gør som andre og ring for professionel vejledning, eller <a href="//www.xe.dk/referencer/" class="f__no-und c__orange">læs +180 referencer</a>.
                  </div>
                </div>
              </div>
              <div class="g__c6--xlg g__c6--lg g__c12--md g__c12--sm f__right f__center--xlg f__center--lg f__center--md f__center--sm">
                <div class="sp__1--xlg sp__2--md sp__3--sm"></div>
                <div class="t__h2 cta__lead__h2"><a href="tel:+4570217025">Ring <span class="c__orange">+45 7021 7025</span></a></div>
              </div>
            </div>
          </div>
        </div>

        <div class="sp__10--xlg sp__10--lg sp__5--md sp__5--sm"></div>
        <div id="solutions">
          <div class="category__header-main">
            <div class="">
              <h3 class="category__header-byline f__up">Kom nemt og hurtigt igang</>
              <h2 class="category__header-title">Færdig pakkeløsning</h2>
              <div class="sp__2"></div>
              <p class="t__larger" style="max-width: 600px;">Med en af vores sammensatte løsninger har du et godt fundament for enhver begivenhed. Sammen beslutter vi valget af artister og setup for at imødekomme dine behov bedst muligt.</p>
            </div>
          </div>
          <div class="sp__3"></div>
          <div class="category__header-main">
            <div class="g__row">
            <?php
            if( have_rows('pakkelosninger') ):
              while ( have_rows('pakkelosninger') ) : the_row();
                $pakkelosning_kategori_titel = get_sub_field('pakkelosning_kategori_titel');
                $pakkelosning_kategori_tekst = get_sub_field('pakkelosning_kategori_tekst');
                $pakkelosning_billede = get_sub_field('pakkelosning_billede');
                ?>
                <div class="g__c4--xlg g__c4--lg g__c6--md g__c12--sm">
                  <div class="f__center">
                    <img style="max-width: 90%;" src="<?php echo $pakkelosning_billede['url']; ?>" alt="<?php echo $pakkelosning_billede['alt']; ?>" />
                  </div>
                  <div class="sp__2"></div>
                  <div class="f__center">
                    <h4 class="t__h4"><?php echo $pakkelosning_kategori_titel ?></h4>
                    <p class="homepage__prod-desc"><?php echo $pakkelosning_kategori_tekst ?></p>
                  </div>
                </div>
              <?php
              endwhile;
            endif; ?>
            </div>
          </div>
          <div class="sp__10--xlg sp__10--lg sp__5--md sp__5--sm"></div>
        </div>

        <div id="popular-categories">
          <div class="category__header-sub g__flex g__flex-a-end g__flex-space-between">
            <div class="u__inline-block">
              <div class="category__header-byline f__up"><?php the_field('kategori_subheading') ?></div>
              <div class="category__header-title2"><?php the_field('kategori_titel'); ?></div>
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
                          <h2 class="slider__title truncate"><a href="<?php echo $kategori_link?>"><?php echo $kategori_navn ?></a></>
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
                    <h2 class="category__item-footer f__und f__bold"><a href="<?php echo $kategori_link?>"><?php echo $kategori_navn ?></a></>
                  </div>
                <?php endwhile;
                else :

              endif;
              ?>
              </div>
            </div> <?php
          } ?>
        </div>
      </article> <!-- .et_pb_post -->

    <?php endwhile; ?>
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
