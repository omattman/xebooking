<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action( 'et_head_meta' ); ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php $template_directory_uri = get_template_directory_uri(); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( $template_directory_uri . '/js/html5.js"' ); ?>" type="text/javascript"></script>
	<![endif]-->

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKXNQCX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div class="js-nav-fixed">
<?php
	if ( is_page_template( 'page-template-blank.php' ) ) {
		return;
	}

	$et_secondary_nav_items = et_divi_get_top_nav_items();

	$et_phone_number = $et_secondary_nav_items->phone_number;

	$et_email = $et_secondary_nav_items->email;

	$et_contact_info_defined = $et_secondary_nav_items->contact_info_defined;

	$show_header_social_icons = $et_secondary_nav_items->show_header_social_icons;

	$et_secondary_nav = $et_secondary_nav_items->secondary_nav;

	$et_top_info_defined = $et_secondary_nav_items->top_info_defined;

	$et_slide_header = 'slide' === et_get_option( 'header_style', 'left' ) || 'fullscreen' === et_get_option( 'header_style', 'left' ) ? true : false;
?>
            <header class="nav__header">
				<div class="nav__detail nav__detail-wrapper u__hidden--md u__hidden--sm">
					<div class="container narrow">
						<div class="g__flex nav__padding">
							<div class="nav__detail-wrapper">
								<span class="nav__detail-text"><a href="//www.xe.dk/kontakt/"><font color="#FF6900">Gratis</font> professionel rådgivning</a></span>
								<span class="nav__detail-text"><a href="tel:+4570217025">Ring direkte <font color="#FF6900">+45 7021 7025</font></a></span>
								<span class="nav__detail-text"><a href="//www.xe.dk/kontakt/"><font color="#FF6900">+25 års</font> erfaring og <font color="#FF6900">+100</font> anbefalinger</a></span>
							</div>
						</div>
					</div>
				</div>
				<div class="container narrow">
					<div class="nav__top nav__padding center">
		                <?php
		    				$logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
		    					? $user_logo
		    					: $template_directory_uri . '/images/logo.png';
		    			?>
		                <a class="nav__menu-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		                    <img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" data-height-percentage="<?php echo esc_attr( et_get_option( 'logo_height', '54' ) ); ?>" />
		                </a>
		                <nav class="nav__menu-mobile"><ul id="nav__primary" class="nav__primary is-fixed">
							<li class="u__hidden--xlg u__hidden--lg">
		                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Forside</a>
		                    </li>
							<li class="nav__menu-links">
								<a class="nav__menu-category" href="#0">Musik</a>
								<ul class="nav__secondary js-hidden">
									<li class="js-go-back">
										<a href="#0">Tilbage</a>
									</li>
									<a class="u__hidden--xlg u__hidden--lg" href="//www.xe.dk/musik/">Se al musik</a>
									<a href="//www.xe.dk/musik/djs/">DJs</a>
									<a href="//www.xe.dk/musik/solister/">Solister</a>
									<a href="//www.xe.dk/musik/bands/">Bands</a>
									<a href="//www.xe.dk/musik/bryllupsbands/">Bryllupsbands</a>
									<a href="//www.xe.dk/musik/musik-til-reception/">Receptionsmusik</a>
									<a href="//www.xe.dk/musik/">Se alle kategorier</a>
								</ul>
								<a class="nav__menu-category" href="#0">Underholdning</a>
								<ul class="nav__secondary js-hidden">
									<li class="js-go-back">
										<a href="#0">Tilbage</a>
									</li>
									<a class="u__hidden--xlg u__hidden--lg" href="//www.xe.dk/underholdning/">Se al underholdning</a>
									<a href="//www.xe.dk/underholdning/stand-up/">Stand-up</a>
									<a href="//www.xe.dk/underholdning/foredragsholder/">Foredragsholder</a>
									<a href="//www.xe.dk/underholdning/tryllekunstner/">Tryllekunstner</a>
									<a href="//www.xe.dk/underholdning/entertainer/">Entertainer</a>
									<a href="//www.xe.dk/underholdning/entertainer-engelsk/">Entertainer (ENG)</a>
									<a href="//www.xe.dk/underholdning/">S	e alle kategorier</a>
								</ul>
								<a class="nav__menu-category" href="#0">Konferenciers</a>
								<ul class="nav__secondary js-hidden">
									<li class="js-go-back">
										<a href="#0">Tilbage</a>
									</li>
									<a class="u__hidden--xlg u__hidden--lg" href="//www.xe.dk/konferenciers-vaerter/">Se alle værter</a>
									<a href="//www.xe.dk/konferenciers-vaerter/konferencier/">Konferencier</a>
									<a href="//www.xe.dk/konferenciers-vaerter/ordstyrer/">Ordstyrer</a>
									<a href="//www.xe.dk/konferenciers-vaerter/">Se alle kategorier</a>
								</ul>
		                        <li class="u__hidden--xlg u__hidden--lg">
		                            <a href="//www.xe.dk/priser/">Priser</a>
		                        </li>
		                        <li class="u__hidden--xlg u__hidden--lg">
		                            <a href="//www.xe.dk/referencer/">Referencer</a>
		                        </li>
		                        <li class="u__hidden--xlg u__hidden--lg">
		                            <a href="//www.xe.dk/nyheder/">Nyheder</a>
		                        </li>
		                        <li class="u__hidden--xlg u__hidden--lg">
		                            <a href="//www.xe.dk/forespoergsel/">Booking</a>
		                        </li>
		                        <li class="u__hidden--xlg u__hidden--lg">
		                            <a href="//www.xe.dk/om-xe/">Om XE</a>
		                        </li>
		                        <li class="u__hidden--xlg u__hidden--lg">
		                            <a href="//www.xe.dk/kontakt/">Kontakt</a>
		                        </li>
								<li class="bg__blue c__white see-all u__hidden--xlg u__hidden--lg">
									<a href="//www.xe.dk/priser/">Find pakkeløsning her</a>
								</li>
		                    </ul>
		                </nav>
		                <ul class="nav__menu-buttons">
		                    <!-- <li>
		                        <a class="nav__search-trigger" title="Søg blandt vores artister">
		                            <span></span>
		                        </a>
		                    </li> -->
		                    <li>
		                        <a class="nav__menu-trigger" title="Åben menu"> <span></span>
		                        </a>
		                    </li>
						</ul>
					</div>
					<div class="nav__bottom u__hidden--md u__hidden--sm">
						<ul class="nav__bottom-category u__reset f__left">
							<li class="nav__bottom-category-element u__inline-block">
								<a href="//www.xe.dk">Priser</a>
							</li>
							<li class="nav__bottom-category-element u__inline-block">
								<a href="//www.xe.dk">Referencer</a>
							</li>
							<li class="nav__bottom-category-element u__inline-block">
								<a href="//www.xe.dk">Nyheder</a>
							</li>
							<li class="nav__bottom-category-element u__inline-block">
								<a href="//www.xe.dk">Om XE</a>
							</li>
							<li class="nav__bottom-category-element u__inline-block">
								<a href="//www.xe.dk">Kontakt</a>
							</li>
							<li class="nav__bottom-category-element u__inline-block">
								<a class="c__orange" href="//www.xe.dk">Booking</a>
							</li>
						</ul>
						<div class="nav__bottom-search">
							<form class="nav__bottom-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<span class="nav__bottom-search-icon"><svg width="26" height="26" viewBox="0 0 26 26"><<svg id="icon_svg-search-semi-bold" viewBox="0 0 26 26" width="100%" height="100%"><path d="M16.979 17.314a6.181 6.181 0 0 1-4.474 1.506c-3.508-.23-6.198-3.314-6.024-6.888.175-3.583 3.163-6.312 6.68-6.081 3.506.23 6.196 3.314 6.022 6.887a6.484 6.484 0 0 1-1.194 3.466l4.199 3.703-.992 1.125-4.217-3.718zm-4.376.009c-2.683-.176-4.759-2.554-4.624-5.318.135-2.753 2.411-4.832 5.083-4.658 2.682.177 4.757 2.555 4.623 5.318-.134 2.754-2.41 4.833-5.082 4.658z" fill="currentColor" fill-rule="evenodd"></path></svg></svg></span>
								<?php
									printf( '<input type="search" class="nav__bottom-search-filter et-search-field" placeholder="Søg efter artist ..." value="%2$s" name="s" title="%3$s" data-swplive="true"/>',
										esc_attr__( 'Search &hellip;', 'Divi' ),
										get_search_query(),
										esc_attr__( 'Search for:', 'Divi' )
									);
								?>
							</form>
						</div>
					</div>
				</div>
				</div>
             </header>



        <!-- <div class="nav__menu-overlay"></div> -->
        <div id="nav__search" class="nav__search">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php
                printf( '<input type="search" class="et-search-field" placeholder="Søg efter artist..." value="%2$s" name="s" title="%3$s" data-swplive="true"/>',
                    esc_attr__( 'Search &hellip;', 'Divi' ),
                    get_search_query(),
                    esc_attr__( 'Search for:', 'Divi' )
                );
            ?>
            </form>
    	</div>

		<main id="et-main-area" class="main__content">
