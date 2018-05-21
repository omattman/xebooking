<?php

/* Template Name: Forespoergsel */

get_header();
?>

<div id="main-content">
  <div class="sp__3"></div>
  <div class="container narrow__small">
    <div class="g__row">
      <div class="g__c12 g__c5--xlg">
        <div class="sp__6--xlg sp__6--lg u__hidden--md u__hidden--sm"></div>
        <h1 class="t__h2"><?php echo the_field('titel') ?></h1>
        <p class="t__h5" style="max-width: 400px;"><?php echo the_field('beskrivelse') ?></p>
        <div class="book__description-points u__hidden--md u__hidden--sm">
          <div class="sp__5 sp__3--md sp__3--sm"></div>
          <span class="t__larger"><?php echo the_field('bullet_titel') ?></span>
          <div class="sp__2"></div>
          <ul class="book__description-list">
            <?php
            if( have_rows('bullet_list') ):
              while ( have_rows('bullet_list') ) : the_row();
                $bullet_point = get_sub_field('bullet_point');
                ?>
                <li class="book__description-list-item"><?php echo $bullet_point ?></li>
              <?php
              endwhile;
            endif; ?>
          </ul>
        </div>
      </div>
      <div class="g__c12 g__c7--xlg cta__wrapper">
        <div class="sp__5--xlg sp__5--lg sp__01--md sp__01--sm"></div>
          <?php echo do_shortcode('[contact-form-7 html_id="booking__forespoergsel-cta" id="4008" title="Booking"]'); ?>
        </div>
      </div>
      <div class="book__description-points u__hidden--xlg u__hidden--lg">
        <div class="sp__5 sp__3--md sp__3--sm"></div>
        <span class="t__larger"><?php echo the_field('bullet_titel') ?></span>
        <div class="sp__2"></div>
        <ul class="book__description-list">
          <?php
          if( have_rows('bullet_list') ):
            while ( have_rows('bullet_list') ) : the_row();
              $bullet_point = get_sub_field('bullet_point');
              ?>
              <li class="book__description-list-item"><?php echo $bullet_point ?></li>
            <?php
            endwhile;
          endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div> <!-- #main-content -->


<?php
get_footer();

?>