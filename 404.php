<head>
  <title>Siden kunne ikke findes – xe</title>
</head>
<?php get_header(); ?>
<?php 
  $requested_url = get_query_var('name');
?>

<div id="main-content" class="clearfix">
  <div class="sp__10--xlg sp__10--lg sp_6--md sp__3--sm"></div>
  <section class="container narrow">
    <div class="category__header-main g__flex g__flex-a-end g__flex-space-between">
      <div class="">
        <h2 class="category__header-byline f__up">Hov! Der er sket en fejl...</h2>
        <h1 class="category__header-title">Siden kunne ikke findes</h1>
              <div class="sp__4"></div>
              <form role="search" method="get" action="<?php echo $homeurl; ?>">
                <div>
                  <input type="text" value="" name="s" class="et_pb_s cta__email" placeholder="Søg efter artist her..." style="padding-right: 52.0208px;">
                  <input type="submit" value="Søg" class="btn btn__primary cta__error">
                </div>
              </form>
            </div>
          <div class="g__c2--xlg g__c2--lg g__row"></div>
          <div class="sp__4--sm"></div>
            <div class="g__c3--xlg g__c3--lg g__c12--md g__12--sm g__row clearfix">
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
  </div>  <!-- .et_pb_section -->
</div>
 
<?php get_footer(); ?>
