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
				<div class="container">
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
		                    <li>
		                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Forside</a>
		                    </li>
		                    <li class="nav__menu-links">
		                        <a href="#0">Find artist</a>
		                        <ul class="nav__secondary js-hidden">
		                            <li class="js-go-back">
		                                <a href="#0">Tilbage</a>
		                            </li>
		                            <li class="bg__blue c__white see-all u__hidden--md u__hidden--sm">
		                                <a href="/priser"><span>🎉 </span>Find din samlede pakkeløsning her<span class="flip-horizontal"> 🎉</span></a>
		                            </li>
		                            <li class="nav__menu-links">
		                                <a class="t__h5 c__blue--xlg c__blue--lg c__grey--md c__grey--sm f__left" href="/musik/">Musik</a>
		                                <ul class="js-hidden">
		                                    <li class="js-go-back">
		                                        <a href="#0">Tilbage</a>
		                                    </li>
											<li class="see-all">
		                                        <a href="/kategorier/koncertnavne/">Se al musik</a>
		                                    </li>
		                                    <li>
		                                        <a href="musik/koncertnavne/">Koncertnavne</a>
		                                    </li>
											<li>
		                                        <a href="musik/bryllupsbands/">Bryllupsbands</a>
		                                    </li>
		                                    <li>
		                                        <a href="musik/bands/">Bands</a>
		                                    </li>
		                                    <li>
		                                        <a href="musik/djs/">DJs</a>
		                                    </li>
											<li>
		                                        <a href="musik/solister/">Solister</a>
		                                    </li>
											<li>
		                                        <a href="musik/receptions-musik/">Receptions musik</a>
		                                    </li>
		                                    <li>
		                                        <a href="musik/jazzlounge/">Jazz/Lounge</a>
		                                    </li>
		                                    <li>
		                                        <a href="musik/musik">Se alle kategorier</a>
		                                    </li>
		                                </ul>
		                            </li>
		                            <li class="nav__menu-links">
		                                <a class="t__h5 c__blue--xlg c__blue--lg c__grey--md c__grey--sm f__left" href="/kategorier/koncertnavne/">Underholdning</a>
		                                <ul class="js-hidden">
		                                    <li class="js-go-back">
		                                        <a href="#0">Tilbage</a>
		                                    </li>
											<li class="see-all">
		                                        <a href="/underholdning/">Se al underholdning</a>
		                                    </li>
		                                    <li>
		                                        <a href="/underholdning//stand-up/">Stand-up</a>
		                                    </li>
		                                    <li>
		                                        <a href="/underholdning//foredragsholder/">Foredragsholder</a>
		                                    </li>
		                                    <li>
		                                        <a href="/underholdning//tryllekunstner/">tryllekunstner</a>
		                                    </li>
		                                    <li>
		                                        <a href="/underholdning//happening/">Happening / Overraskelse</a>
		                                    </li>
											<li>
		                                        <a href="/underholdning//underholdning-engelsk/">Underholdning (ENG)</a>
		                                    </li>
		                                    <li>
		                                        <a href="/underholdning/">Se alle kategorier</a>
		                                    </li>
		                                </ul>
		                            </li>
		                            <li class="nav__menu-links">
		                                <a class="t__h5 c__blue--xlg c__blue--lg c__grey--md c__grey--sm f__left" href="/konferenciers-vaerter/">Konferenciers / Værter</a>
		                                <ul class="js-hidden">
		                                    <li class="js-go-back">
		                                        <a href="#0">Tilbage</a>
		                                    </li>
		                                    <li class="dropdown__desc">
		                                        <a href="/konferencier/">Konferencier</a>
		                                    </li>
		                                    <li>
		                                        <a href="/ordstyrer/">Ordstyrer</a>
		                                    </li>
		                                    <li>
		                                        <a href="/konferencier/">Se alle kategorier</a>
		                                    </li>
		                                </ul>
		                            </li>
									<li class="nav__menu-links">
		                                <a class="t__h5 c__blue u__hidden--md u__hidden--sm f__left" href="/artister/">Artister</a>
		                                <ul class="js-hidden">
		                                    <li class="js-go-back">
		                                        <a href="#0">Tilbage</a>
		                                    </li>
		                                    <li>
		                                        <a href="/kategorier/koncertnavne/">Prisklasse 1</a>
		                                    </li>
		                                    <li class="dropdown__desc">
		                                        <a href="/kategorier/sangere-solister/">Prisklasse 2</a>
		                                    </li>
		                                    <li>
		                                        <a href="/kategorier/sangere-solister/">Prisklasse 3</a>
		                                    </li>
											<li>
		                                        <a href="/kategorier/sangere-solister/">Artister i særklasse</a>
		                                    </li>
		                                    <li>
		                                        <a href="/artister/">Se alle artister</a>
		                                    </li>
		                                </ul>
		                            </li>
									<li class="bg__blue c__white see-all u__hidden--xlg u__hidden--lg">
										<a href="/priser">Få en samlet pakkeløsning</a>
									</li>
		                        </ul>
		                        </li>
		                        <li>
		                            <a href="/priser">Priser</a>
		                        </li>
		                        <li>
		                            <a href="/referencer">Referencer</a>
		                        </li>
		                        <li>
		                            <a href="/Nyheder">Nyheder</a>
		                        </li>
		                        <li>
		                            <a href="/Booking">Booking</a>
		                        </li>
		                        <li>
		                            <a href="/om-xe">Om XE</a>
		                        </li>
		                        <li>
		                            <a href="/Kontakt">Kontakt</a>
		                        </li>
								<li class="bg__blue c__white see-all u__hidden--xlg u__hidden--lg">
									<a href="/priser">Find pakkeløsning her</a>
								</li>
		                    </ul>
		                </nav>
		                <ul class="nav__menu-buttons">
		                    <li>
		                        <a class="nav__search-trigger" title="Søg blandt vores artister">
		                            <span></span>
		                        </a>
		                    </li>
		                    <li>
		                        <a class="nav__menu-trigger" title="Åben menu"> <span></span>
		                        </a>
		                    </li>
		                </ul>
					</div>
				</div>
             </header>



        <div class="nav__menu-overlay"></div>
        <div id="nav__search" class="nav__search">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php
                printf( '<input type="search" class="et-search-field" placeholder="Søg efter artist..." value="%2$s" name="s" title="%3$s" />',
                    esc_attr__( 'Search &hellip;', 'Divi' ),
                    get_search_query(),
                    esc_attr__( 'Search for:', 'Divi' )
                );
            ?>
            </form>
    	</div>

		<main id="et-main-area" class="main__content">