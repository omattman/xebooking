<?php

/* Template Name: Om XE */

get_header();
?>

<div id="main-content">
	<div class="container narrow">
    <div class="sp__4"></div>

    <div id="presentation">
      <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
        <div class="">
          <h3 class="category__header-byline f__up"><?php echo the_field('personlig_kontakt_subheading') ?></h3>
          <h1 class="category__header-title"><?php echo the_field('personlig_kontakt_titel') ?></h1>
          <div class="sp__2"></div>
          <p class="t__larger"><?php echo the_field('personlig_kontakt_tekst') ?></p>
        </div>
      </div>
      <div class="sp__2--xlg sp__2--lg sp__3--md sp__01--sm"></div>
      <div class="artist__embed">
        <?php the_field('xe_video'); ?>
        <div class="sp__2"></div>
        <p class="f__center">Vil du vide mere? <a href="//www.xe.dk/referencer/" class="c__orange">Lær hvordan vi har hjulpet tidligere kunder med planlægning og afvikling</a></p>
      </div>
    </div>

    <div class="sp__8--xlg sp__8--lg sp__4--md sp__4--sm"></div>

    <div class="cta__lead">
      <div class="container">
        <div class="g__row g__flex g__flex-middle">
          <div class="g__c6--xlg g__c6--lg g__c12--md g__c12--sm f__center--md f__center--sm">
            <h2 class="t__h2 cta__lead__h2">Start din fest her</h2>
            <div class="t__smaller">
              <div style="max-width: 420px;">
                <strong>Er du klar til at komme igang?</strong> Gør som andre og ring for professionel vejledning, eller <a href="//www.xe.dk/referencer/" class="f__no-und c__orange">læs +180 referencer</a>.
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

    <div class="sp__8--xlg sp__8--lg sp__4--md sp__4--sm"></div>
    <div id="team">
      <div class="category__header-main">
        <div class="">
          <h3 class="category__header-byline f__up"><?php echo the_field('team_subheading') ?></h3>
          <h2 class="category__header-title"><?php echo the_field('team_titel') ?></h2>
          <div class="sp__2"></div>
          <div style="max-width: 600px;">
          <?php echo the_field('team_tekst') ?>
          </div>
        </div>
      </div>
      <div class="sp__3"></div>
      <div class="category__header-main">
        <div class="g__row">
        <?php
        if( have_rows('team_members') ):
          while ( have_rows('team_members') ) : the_row();
            $team_navn = get_sub_field('navn');
            $team_funktion = get_sub_field('funktion');
            $team_billede = get_sub_field('billede');
            ?>
            <div class="g__c4--xlg g__c4--lg g__c6--md g__c6--sm f__center--sm">
              <div class="">
                <img src="<?php echo $team_billede['url']; ?>" alt="<?php echo $team_billede['alt']; ?>" />
              </div>
              <div class="sp__2"></div>
              <div class="">
                <h4 class="t__h5"><?php echo $team_navn ?></h4>
                <p class="homepage__prod-desc f__up"><?php echo $team_funktion ?></p>
              </div>
            </div>
          <?php
          endwhile;
        endif; ?>
        </div>
      </div>
      <div class="sp__10--xlg sp__10--lg sp__5--md sp__5--sm"></div>
    </div>

    <div id="about-xe">
      <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
        <div class="">
          <h3 class="category__header-byline f__up"><?php echo the_field('laer_mere_subheading') ?></h3>
          <h2 class="category__header-title"><?php echo the_field('laer_mere_titel') ?></h2>
          <div class="sp__2"></div>
          <div class="g__row">
            <div class="g__c6--xlg g__c6--lg g__c6--md g__12--sm">
              <?php echo the_field('laer_mere_beskrivelse_1') ?>
            </div>
            <div class="g__c6--xlg g__c6--lg g__c6--md g__12--sm">
              <?php echo the_field('laer_mere_beskrivelse_2') ?>
            </div>
          </div>
            </div>
          </div>
      <div class="sp__2--xlg sp__2--lg sp__3--md sp__01--sm"></div>
    </div>
	</div> <!-- .container -->
</div> <!-- #main-content -->


<?php
get_footer();

?>