<?php

/* Template Name: Artister */
get_header();
require_once "Mobile_Detect.php";
?>



<div id="main-content">
	<div class="container narrow">
		<div id="content-area" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
                    <div class="sp__8--xlg sp__8--lg sp__4--md sp__2--sm"></div>
                    <div id="musik-kategori">
                        <div class="category__header-sub g__flex g__flex-a-end g__flex-space-between">
                            <div class="u__inline-block">
                                <div class="category__header-byline f__up"><?php the_field('musik_subheading') ?></div>
                                <h2 class="category__header-title2"><?php the_field('musik_titel'); ?></>
                            </div>
                        </div>

                        <?php
                        $detect = new Mobile_Detect;

                        if ($detect->isMobile()) { ?>
                            <div class="slider">
                            <?php
                            if( have_rows('musik_liste') ):
                                while ( have_rows('musik_liste') ) : the_row();
                                $musik_billede = get_sub_field('musik_billede');
                                $musik_navn = get_sub_field('musik_navn');
                                $musik_link = get_sub_field('musik_url');

                                $image_size = 'popular-categories';
                                $image_array = wp_get_attachment_image_src($musik_billede, $image_size);
                                $image_url = $image_array[0];
                                ?>
                                <div class="carousell-cell">
                                    <div class="slider__card">
                                    <a href="<?php echo $musik_link?>">
                                        <figure class="carousell-cell-image" style="background-image:url('<?php echo $image_url; ?>')"></figure>
                                        <div class="slider__info f__center">
                                        <h2 class="slider__title truncate"><a href="<?php echo $musik_link?>"><?php echo $musik_navn ?></a></h2>
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
                            if( have_rows('musik_liste') ):
                                while ( have_rows('musik_liste') ) : the_row();
                                $musik_billede = get_sub_field('musik_billede');
                                $musik_navn = get_sub_field('musik_navn');
                                $musik_link = get_sub_field('musik_url');

                                $image_size = 'popular-categories';
                                $image_array = wp_get_attachment_image_src($musik_billede, $image_size);
                                $image_url = $image_array[0];
                                ?>

                                <div class="g__c3 f__center">
                                    <a href="<?php echo get_sub_field('musik_url'); ?>">
                                    <img src="<?php echo $image_url; ?>" alt="<?php echo $musik_billede['alt']; ?>" />
                                    </a>
                                    <div class="category__item-footer f__und f__bold"><a href="<?php echo $musik_link?>"><?php echo $musik_navn ?></a></div>
                                </div>
                                <?php endwhile;
                                else :

                            endif;
                            ?>
                            </div>
                            </div> <?php
                        } ?>
                    </div>
                    <div class="sp__8--xlg sp__8--lg"></div>
                    <div id="underholdning-kategori">
                        <div class="category__header-sub g__flex g__flex-a-end g__flex-space-between">
                            <div class="u__inline-block">
                                <div class="category__header-byline f__up"><?php the_field('underholdning_subheading') ?></div>
                                <h2 class="category__header-title2"><?php the_field('underholdning_titel'); ?></>
                            </div>
                        </div>
                        <?php
                        $detect = new Mobile_Detect;

                        if ($detect->isMobile()) { ?>
                            <div class="slider">
                            <?php
                            if( have_rows('underholdning_liste') ):
                                while ( have_rows('underholdning_liste') ) : the_row();
                                $underholdning_billede = get_sub_field('underholdning_billede');
                                $underholdning_navn = get_sub_field('underholdning_navn');
                                $underholdning_link = get_sub_field('underholdning_url');

                                $image_size = 'popular-categories';
                                $image_array = wp_get_attachment_image_src($underholdning_billede, $image_size);
                                $image_url = $image_array[0];
                                ?>
                                <div class="carousell-cell">
                                    <div class="slider__card">
                                    <a href="<?php echo $underholdning_link?>">
                                        <figure class="carousell-cell-image" style="background-image:url('<?php echo $image_url; ?>')"></figure>
                                        <div class="slider__info f__center">
                                        <h2 class="slider__title truncate"><a href="<?php echo $underholdning_link?>"><?php echo $underholdning_navn ?></a></h2>
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
                            if( have_rows('underholdning_liste') ):
                                while ( have_rows('underholdning_liste') ) : the_row();
                                $underholdning_billede = get_sub_field('underholdning_billede');
                                $underholdning_navn = get_sub_field('underholdning_navn');
                                $underholdning_link = get_sub_field('underholdning_url');

                                $image_size = 'popular-categories';
                                $image_array = wp_get_attachment_image_src($underholdning_billede, $image_size);
                                $image_url = $image_array[0];
                                ?>

                                <div class="g__c3 f__center">
                                    <a href="<?php echo get_sub_field('underholdning_url'); ?>">
                                    <img src="<?php echo $image_url; ?>" alt="<?php echo $underholdning_billede['alt']; ?>" />
                                    </a>
                                    <div class="category__item-footer f__und f__bold"><a href="<?php echo $underholdning_link?>"><?php echo $underholdning_navn ?></a></div>
                                </div>
                                <?php endwhile;
                                else :

                            endif;
                            ?>
                            </div>
                            </div> <?php
                        } ?>
                    </div>
                    <div class="sp__8--xlg sp__8--lg"></div>
                    <div id="vaert-kategori">
                        <div class="category__header-sub g__flex g__flex-a-end g__flex-space-between">
                            <div class="u__inline-block">
                                <div class="category__header-byline f__up"><?php the_field('vaert_subheading') ?></div>
                                <h2 class="category__header-title2"><?php the_field('vaert_titel'); ?></h2>
                            </div>
                        </div>
                        <?php
                        $detect = new Mobile_Detect;

                        if ($detect->isMobile()) { ?>
                            <div class="slider">
                            <?php
                            if( have_rows('vaert_liste') ):
                                while ( have_rows('vaert_liste') ) : the_row();
                                $vaert_billede = get_sub_field('vaert_billede');
                                $vaert_navn = get_sub_field('vaert_navn');
                                $vaert_link = get_sub_field('vaert_url');

                                $image_size = 'popular-categories';
                                $image_array = wp_get_attachment_image_src($vaert_billede, $image_size);
                                $image_url = $image_array[0];
                                ?>
                                <div class="carousell-cell">
                                    <div class="slider__card">
                                    <a href="<?php echo $vaert_link?>">
                                        <figure class="carousell-cell-image" style="background-image:url('<?php echo $image_url; ?>')"></figure>
                                        <div class="slider__info f__center">
                                        <h2 class="slider__title truncate"><a href="<?php echo $vaert_link?>"><?php echo $vaert_navn ?></a></>
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
                            if( have_rows('vaert_liste') ):
                                while ( have_rows('vaert_liste') ) : the_row();
                                $vaert_billede = get_sub_field('vaert_billede');
                                $vaert_navn = get_sub_field('vaert_navn');
                                $vaert_link = get_sub_field('vaert_url');

                                $image_size = 'popular-categories';
                                $image_array = wp_get_attachment_image_src($vaert_billede, $image_size);
                                $image_url = $image_array[0];
                                ?>

                                <div class="g__c3 f__center">
                                    <a href="<?php echo get_sub_field('vaert_url'); ?>">
                                    <img src="<?php echo $image_url; ?>" alt="<?php echo $vaert_billede['alt']; ?>" />
                                    </a>
                                    <div class="category__item-footer f__und f__bold"><a href="<?php echo $vaert_link?>"><?php echo $vaert_navn ?></a></div>
                                </div>
                                <?php endwhile;
                                else :

                            endif;
                            ?>
                            </div>
                            </div> <?php
                        } ?>
                    </div>
                    <div class="sp__8--xlg sp__8--lg sp__6--md sp__6--sm"></div>
                    <div class="category__header-main">
						<h1 class="t__larger f__bold"><?php the_field('titel') ?></h1>
                        <?php echo the_field('teaser_tekst') ?>
                        <div class="sp__1"></div>
                        <?php
						if( have_rows('uddybende_beskrivelse') ):
							while ( have_rows('uddybende_beskrivelse') ) : the_row();
							?>
							<h2 class="t__larger f__bold"><?php echo get_sub_field('undertitel'); ?></h2>
							<?php echo get_sub_field('indhold'); ?>
                            <div class="sp__1"></div>

							<?php
							endwhile;
						endif;
						?>
					</div>
				</article> <!-- .et_pb_post -->
			<?php endwhile; ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
