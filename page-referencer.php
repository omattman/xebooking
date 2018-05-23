<?php

/* Template Name: Referencer */

get_header();

$case_billede = get_field('case_billede');

?>

<div id="main-content">
	<div class="container narrow">
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>">
        <div class="sp__4"></div>

        <div id="cases">
          <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
            <div class="">
              <h3 class="category__header-byline f__up"><?php echo the_field('reference_subheading') ?></h3>
              <h1 class="category__header-title"><?php echo the_field('reference_titel') ?></h1>
              <div class="sp__2"></div>
              <p class="t__larger" style="max-width: 600px;"><?php echo the_field('reference_byline') ?></p>
            </div>
          </div>
          <div class="sp__2--xlg sp__2--lg sp__3--md sp__01--sm"></div>
          <div class="g__row">
            <div class="g__c6--xlg g__c6--lg g__c6--md g__12--sm">
              <a href="//www.xe.dk/referencer/kvadrat/" class="customer__card">
                <div class="u__relative u__flex-column">
                  <div class="customer__card-logo">
                    <img alt="<?php echo $case_billede['alt'] ?>" width="150" src="<?php echo $case_billede['url'] ?>">
                  </div>
                  <p class="customer__card-desc">Se hvordan Xcluzive Entertainment hjalp Kvadrat med at opnå den komplette sommerfest med en samlet og skræddersyet pakkeløsning.</p>
                  <p class="customer__card-desc">Festens afvikling forløb som planlagt og stemningen var helt i top imens både Mads Laumann og Turboweekend fyrede op under festen fra start til slut. Find ud af, hvad Kvadrat selv mente om festen.</p>
                  <div class="sp__2"></div>
                  <div class="t__h6 customer__card-read">Læs Historien</div>
                </div>
              </a>
            </div>
            <div class="sp__3--sm"></div>
            <div class="g__c6--xlg g__c6--lg g__c6--md g__12--sm">
              <?php the_field('case_video'); ?>
              <div class="sp__2"></div>
              <p class="f__center">Lær hvordan vi arbejder hos Xcluzive Entertainment</p>
            </div>
          </div>
          <div class="sp__11--xlg sp__11--lg sp__4--md sp__4--sm"></div>
        </div>

        <div id="recommendations">
          <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
            <div class="">
              <div class="category__header-byline f__up"><?php echo the_field('kunde_reference_subheading') ?></div>
              <h2 class="category__header-title"><?php echo the_field('kunde_reference_titel') ?></h2>
              <div class="sp__2"></div>
              <p class="t__larger" style="max-width: 600px;"><?php echo the_field('kunde_reference_byline') ?></p>
            </div>
          </div>
          <div class="sp__2--xlg sp__2--lg sp__3--md sp__01--sm"></div>
          <div class="g__row">
            <?php
            if( have_rows('kunde_anbefaling') ):
            $i = 1;
              while ( have_rows('kunde_anbefaling') ) : the_row();
              $i++;
              $kunde_anbefaling_tekst = get_sub_field('kunde_anbefaling_tekst');
              $kunde_billede = get_sub_field('kunde_billede');
              $kunde_navn = get_sub_field('kunde_navn');
              $kunde_firma = get_sub_field('kunde_firma');

              if ($i % 8 == 0) { ?>
                <div class="g__c12">
                  <div class="cta__lead">
                    <div class="container">
                      <div class="g__row g__flex g__flex-middle">
                        <div class="g__c6--xlg g__c6--lg g__c12--md g__c12--sm f__center--md f__center--sm">
                          <div class="t__h2 cta__lead__h2">Få et succesfuldt event</div>
                          <div class="t__smaller">
                            <div style="max-width: 420px;">
                              <strong>Hvor skal jeg starte?</strong> Gør som andre og ring for professionel vejledning. Det koster ikke noget at spørge...
                            </div>
                          </div>
                        </div>
                        <div class="g__c6--xlg g__c6--lg g__c12--md g__c12--sm f__right f__center--xlg f__center--lg f__center--md f__center--sm">
                          <div class="sp__1--xlg sp__2--md sp__3--sm"></div>
                          <div class="t__h2 cta__lead__h2"><a href="tel:+4570217025">Ring nu <span class="c__orange">+45 7021 7025</span></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sp__2--xlg"></div>
              <?php } ?>

              <div class="g__c6--xlg g__c6--lg g__c6--md g__12--sm">
                <div class="customer__recommendation">
                  <div class="customer__recommendation-story">
                    <?php echo $kunde_anbefaling_tekst ?>
                    <div class="g__row customer__recommendation-person">
                      <?php if(get_sub_field('kunde_billede')): ?>
                        <div class="g__c2 customer__recommendation-image">
                          <img src="<?php echo $kunde_billede['url'] ?>" alt="<?php echo $kunde_billede['alt'] ?>">
                        </div>
                      <?php endif; ?>
                      <div class="g__c10">
                        <p class="f__bold"><?php echo $kunde_navn ?></p>
                        <?php if(get_sub_field('kunde_firma')): ?>
                          <p><?php echo $kunde_firma ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
          <div class="sp__11--xlg sp__11--lg sp__4--md sp__4--sm"></div>
        </div>

      </article> <!-- .et_pb_post -->

    <?php endwhile; ?>
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
