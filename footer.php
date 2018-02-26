</main>
<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>
	<span class="et_pb_scroll_top et-pb-icon"></span>
<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>
			<footer class="footer__wrap">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div class="container narrow">
                    <div class="footer__row">
                        <div class="footer__links">
                            <h4 class="t__h6 footer__heading">Artister</h4>
                            <div class="footer__link"><a href="//www.xe.dk/musik/">Musikalske</a></div>
                            <div class="footer__link"><a href="//www.xe.dk/underholdning/">Underholdning</a></div>
                            <div class="footer__link"><a href="//www.xe.dk/konferenciers-vaerter/konferencier/">Konferencier</a></div>
                            <div class="footer__hr"></div>
                            <div class="footer__link"><a href="//www.xe.dk/priser/">Se Priser</a></div>
                            <div class="footer__link"><a href="//www.xe.dk/artister-i-saerklasse/">Artister i særklasse</a></div>
                        </div>
                        <div class="footer__links">
                            <h4 class="t__h6 footer__heading">Bureauet</h4>
                            <div class="footer__link"><a href="//www.xe.dk/om-xe/">Om XE</a></div>
                            <div class="footer__link"><a href="//www.xe.dk/referencer/">Referencer</a></div>
                            <div class="footer__link"><a href="//www.xe.dk/nyheder/">Nyheder</a></div>
                            <div class="footer__link"><a href="//www.xe.dk/nyhedsbrev/">Tilmeld Nyhedsbrev</a></div>
                            <div class="footer__link"><a href="//www.xe.dk/kontakt/">Kontakt os</a></div>
                        </div>
                        <div class="footer__links">
                            <h4 class="t__h6 footer__heading">Kontakt</h4>
                            <div class="footer__link">Solhøjvej 24</div>
							<div class="footer__link">8210 Aarhus V</div>
                            <div class="footer__link">Tlf. +45 7021 7025</div>
                            <div class="footer__link"><a href="mailto:niels@xe.dk">niels@xe.dk</a></div>
							<div class="footer__link">CVR: 27962491</div>
                        </div>
						<div class="footer__links">
                            <h4 class="t__h6 footer__heading">Følg os</h4>
                            <div class="footer__link"><a href="https://www.facebook.com/XEbooking/">Følg os på Facebook</a></div>
                            <div class="footer__link"><a href="//www.xe.dk/nyhedsbrev/">Tilmeld Nyhedsbrev</a></div>
                        </div>
                        <div class="footer__links  footer__links-blog">
                            <h4 class="t__h6 footer__heading">Seneste Nyheder</h4>
                            <div class="footer__hr"></div>
                            <?php
                                $args = array( 
									'numberposts' => '3',
									'post_status' => 'publish'
								);
                                $recent_posts = wp_get_recent_posts( $args );
                                    foreach( $recent_posts as $recent ){
                                        echo '<div class="footer__link"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </div> ';
                                    }
                                    wp_reset_query();
                             ?>
                            <div class="sp__2"></div>
                            <a class="c__orange f__no-und" href="//www.xe.dk/nyheder/">Læs mere</a><span class="t__small c__orange">&nbsp;→</span>
                        </div>
                    </div>
					<div class="u__hidden--sm u__hidden--md">
				      	<div class="sp__7"></div>
						<div class="footer__secondary center">
							<div class="g__c6 footer__info">
								<div class="footer__link t__smallest">Copyright &copy; <?php echo date("Y"); ?> Xcluzive Entertainment ApS</div>
						  	</div>
						</div>
					</div>
				</div> <!-- .container -->
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
