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
                            <h4 class="t__h6 c__blue footer__heading">Artister</h4>
                            <div class="footer__link"><a href="/live-chat">Musikalske</a></div>
                            <div class="footer__link"><a href="/customer-engagement">Underholdning</a></div>
                            <div class="footer__link"><a href="/customer-support-software">Konferencier</a></div>
                            <div class="footer__hr"></div>
                            <div class="footer__link"><a href="/pricing">Se Priser</a></div>
                            <div class="footer__link"><a href="/customer-intelligence">Artister i særklasse</a></div>
                        </div>
                        <div class="footer__links">
                            <h4 class="t__h6 c__blue footer__heading">Bureauet</h4>
                            <div class="footer__link"><a href="/live-chat">Om XE</a></div>
                            <div class="footer__link"><a href="/customer-engagement">Referencer</a></div>
                            <div class="footer__link"><a href="/customer-support-software">Nyheder</a></div>
                            <div class="footer__link"><a href="/pricing">Tilmeld Nyhedsbrev</a></div>
                            <div class="footer__link"><a href="/customer-intelligence">Kontakt os</a></div>
                        </div>
                        <div class="footer__links">
                            <h4 class="t__h6 c__blue footer__heading">Kontakt</h4>
                            <div class="footer__link">8210 Aarhus V</div>
                            <div class="footer__link">Solhøjvej 24</div>
                            <div class="footer__link">Tlf. +45 7021 7025</div>
                            <div class="footer__link">Niels@xe.dk</div>
                        </div>
                        <div class="footer__links  footer__links-blog">
                            <h4 class="t__h6 c__blue footer__heading">Seneste Nyheder</h4>
                            <div class="footer__hr"></div>
                            <?php
                                $args = array( 'numberposts' => '3' );
                                $recent_posts = wp_get_recent_posts( $args );
                                    foreach( $recent_posts as $recent ){
                                        echo '<div class="footer__link"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </div> ';
                                    }
                                    wp_reset_query();
                             ?>
                            <div class="sp__2"></div>
                            <a class="c__blue f__no-und" href="http://localhost/xe/nyheder/">Læs mere</a><span class="t__small c__blue">&nbsp;→</span>
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
