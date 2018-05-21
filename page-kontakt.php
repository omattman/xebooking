<?php

/* Template Name: Kontakt */

get_header();
?>

<div id="main-content">
  <div class="sp__10--xlg sp__10--lg sp_6--md sp__3--sm"></div>
  <div class="container narrow et_pb_row et_pb_row_0">
    <div class="g__row">
      <div class="sp__12--xlg sp__12--lg sp__5--md sp__5--sm"></div>
      <div class="g__c4 g__c6--lg g__c12--md g__c12--sm">
        <h2 class="t__h1 f__left u__reset">
        <?php echo the_field('send_besked_titel') ?>
        </h2>
        <div class="sp__05"></div>
        <p class="t__h5 contact__hero-subheadline">
          <?php echo the_field('send_besked_beskrivelse') ?>
        </p>
        <?php echo do_shortcode('[contact-form-7 html_id="kontakt__forespoergsel-cta" id="3972" title="Kontakt"]'); ?>
      </div>
      <div class="g__c1 g__c6--lg g__c12--md g__c12--sm"></div>
      <div class="sp__3--sm"></div>
      <div class="g__c7 g__c6--lg g__c12--md g__c12--sm">
        <div class="sp__5--md sp__5--sm"></div>
        <div class="f__left">
          <h1 class="t__h1 f__left u__reset">
            <?php echo the_field('kontakt_titel') ?>
          </h1>
          <div class="sp__05"></div>
          <p class="t__h5 f__left u__reset"><?php echo the_field('kontakt_telefon') ?></p>
        </div>
        <div class="sp__5--xlg sp__5--lg sp__3--md sp__2--sm"></div>
        <div class="g__row">
          <?php
          if( have_rows('kontakt_team') ):
            while ( have_rows('kontakt_team') ) : the_row();
              $team_navn = get_sub_field('navn');
              $team_funktion = get_sub_field('funktion');
              $team_email = get_sub_field('email');
              $team_telefon = get_sub_field('telefon');
              $team_billede = get_sub_field('billede');
              ?>
              <div class="g__c4 g__c6--md g__c12--sm">
                <img src="<?php echo $team_billede['url']; ?>" alt="<?php echo $team_billede['alt']; ?>" />
                <div class="sp__2"></div>
                <h4 class="t__h5">
                  <?php echo $team_navn ?>
                </h5>
                <p class="homepage__prod-desc f__up">
                  <?php echo $team_funktion ?>
                </p>
                <div class="sp__1"></div>
                <a class="t__h6 c__orange f__no-und about__team-title u__block" href="mailto:<?php echo $team_email ?>">
                  <?php echo $team_email ?>
                </a>
                <?php if( get_sub_field('telefon') ): ?>
                  <a class="t__h6 c__orange f__no-und about__team-title" href="tel:<?php echo $team_telefon ?>">
                    <?php echo $team_telefon ?>
                  </a>
                <?php endif; ?>
                <div class="sp__3--md sp__3--sm"></div>
              </div>
            <?php
            endwhile;
          endif; ?>
        </div>
      </div>
    </div>
    <div class="sp__12--xlg sp__12--lg sp__8--md sp__3--sm"></div>
    <div class="g__row">
      <?php
      if( have_rows('xe_info') ):
        while ( have_rows('xe_info') ) : the_row();
          $info_emne = get_sub_field('emne');
          $info_oplysninger = get_sub_field('oplysninger');
          ?>
          <div class="g__c3 g__c12--md g__c12--sm">
            <div class="sp__5--sm sp__5--md sp__1--lg sp__1--xlg"></div>
            <h6 class="t__h6 f__left">
              <?php echo $info_emne ?>
            </h6>
            <div class="sp__1"></div>
            <div class="sp__07"></div>
            <div class="g__row">
              <div class="g__c12 g__c12--sm">
                <?php echo $info_oplysninger ?>
              </div>
            </div>
          </div>
        <?php
        endwhile;
      endif; ?>
    </div>
    <div class="sp__8--xlg sp__8--lg sp__4--md sp__1--sm"></div>
  </div>
</div> <!-- #main-content -->


<?php
get_footer();

?>