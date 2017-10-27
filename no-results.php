<?php get_header(); ?>
<?php 
  $requested_url = get_query_var('name');
  $homeurl = esc_url( home_url( '/' ) );
?>

<section class="container narrow et_pb_row et_pb_row_0">
  <div class="et_pb_column et_pb_column_4_4  et_pb_column_0">
    <div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left et_pb_text_0">
      <div class="g__c7 g__row clearfix">
        <div class="entry">
          <!--If no results are found-->
          <p class="t__h4 f__left c__grey u__reset">Din efterspurge side på xe.dk kunne desværre ikke findes.</p>
          <p class="t__h4 f__left c__grey">Du kan prøve at søge igen på formularen under, gå tilbage til forsiden <a class="c__blue f__no-und" href="<?php echo $homeurl ?>">xe.dk</a> eller se <a class="c__blue f__no-und" href="<?php echo $homeurl ?>artister">alle vores artister</a>.</p>
          <p>Den side, du leder efter, er ikke tilgængelig, da linket til den efterspurgte side muligvis er forældet eller forkert.</p>
          <div class="sp__4"></div>
          <form role="search" method="get" action="<?php echo $homeurl; ?>">
            <div>
              <input type="text" value="" name="s" class="et_pb_s cta__email" placeholder="Søg efter artist her..." style="padding-right: 52.0208px;">
              <input type="submit" value="Søg" class="btn btn__primary cta__error">
            </div>
          </form>
        </div>
      </div> 
      <div class="g__c2 g__row"></div>
      <div class="g__c3 g__row clearfix">
      <div class="sp__4--sm"></div>
        <div id="banner__company" class="et_pb_code et_pb_module  et_pb_code_0">
          <div class="banner">
            <h4>Nyttige links</h4>
            <a class="c__blue f__no-und u__block" href="<?php echo $homeurl; ?>">Forside</a>
            <a class="c__blue f__no-und u__block" href="<?php echo $homeurl; ?>musik">Musik artister</a>
            <a class="c__blue f__no-und u__block" href="<?php echo $homeurl; ?>underholdning">Underholdnings artister</a>
            <a class="c__blue f__no-und u__block" href="<?php echo $homeurl; ?>konferenciers-vaerter/konferencier/">Værter og konferenciers</a>
            <a class="c__blue f__no-und u__block" href="<?php echo $homeurl; ?>priser">Priser og pakkeløsninger</a>
            <a class="c__blue f__no-und u__block" href="<?php echo $homeurl; ?>referencer">Referencer</a>
            <a class="c__blue f__no-und u__block" href="<?php echo $homeurl; ?>nyheder">Nyheder</a>
            <a class="c__blue f__no-und u__block" href="<?php echo $homeurl; ?>kontak">Kontakt</a>
          </div>
        </div>
      </div><!--End if no results are found-->
    </div> <!-- et_pb_portfolio -->
  </div> <!-- .et_pb_column -->
</section> <!-- container -->
<div class="sp__5"></div>

 
<?php get_footer(); ?>