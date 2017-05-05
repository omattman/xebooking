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
	<div id="page-container" class="js-nav-fixed">
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
                        <a href="#0" class="selected">Find artist</a>
                        <ul class="nav__secondary js-hidden">
                            <li class="js-go-back">
                                <a href="#0">Tilbage</a>
                            </li>
                            <li class="bg__blue see-all">
                                <a href="http://localhost/xe/priser"><span>🎉 </span>Find din samlede pakkeløsning her<span class="flip-horizontal"> 🎉</span></a>
                            </li>
                            <li class="nav__menu-links">
                                <a class="t__h5 c__blue f__left" href="/kategorier/stand-up/">Musik</a>
                                <ul class="js-hidden">
                                    <li class="js-go-back">
                                        <a href="#0">Tilbage</a>
                                    </li>
									<li class="see-all">
                                        <a href="/kategorier/koncertnavne/">Se al musik</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/sangere-solister/">Solister</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/koncertnavne/">Koncertnavne</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/bands/">Bands</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/djs/">DJs</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/jazzlounge/">Jazz/Lounge</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/klassisk_kirkekoncert/">Kirkekoncert</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/">Se alle kategorier</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav__menu-links">
                                <a class="t__h5 c__blue f__left" href="/kategorier/koncertnavne/">Underholdning</a>
                                <ul class="js-hidden">
                                    <li class="js-go-back">
                                        <a href="#0">Tilbage</a>
                                    </li>
									<li class="see-all">
                                        <a href="/kategorier/stand-up/">Se al underholdning</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/stand-up/">Stand-up / Comedy</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/foredrag/">Foredragsholder</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/konfrenciers-vaerter/">Konferencier / værter</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/entertainment/">Entertainment</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/">Se alle kategorier</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav__menu-links">
                                <a class="t__h5 c__blue f__left" href="/kategorier/koncertnavne/">Konferenciers</a>
                                <ul class="js-hidden">
                                    <li class="js-go-back">
                                        <a href="#0">Tilbage</a>
                                    </li>
                                    <li class="see-all">
                                        <a href="/kategorier/koncertnavne/">Konferencier</a>
                                    </li>
                                    <li class="dropdown__desc">
                                        <a href="/kategorier/sangere-solister/">Konferencier</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/sangere-solister/">Ordstyrer</a>
                                    </li>
                                    <li>
                                        <a href="/kategorier/">Se alle kategorier</a>
                                    </li>
                                </ul>
                            </li>
							<li class="nav__menu-links">
                                <a class="t__h5 c__blue f__left" href="/kategorier/koncertnavne/">Artister</a>
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
                                        <a href="/kategorier/">Se alle kategorier</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="http://localhost/xe/priser">Priser</a>
                        </li>
                        <li>
                            <a href="http://localhost/xe/referencer">Referencer</a>
                        </li>
                        <li>
                            <a href="http://localhost/xe/Nyheder">Comedykalender</a>
                        </li>
                        <li>
                            <a href="http://localhost/xe/Booking">Kontakt</a>
                        </li>
                        <li>
                            <a href="http://localhost/xe/Booking">Om XE</a>
                        </li>
                        <li>
                            <a href="http://localhost/xe/Kontakt">Kontakt</a>
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
             </header>



        <div class="nav__menu-overlay"></div>
        <div id="nav__search" class="nav__search">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php
                printf( '<input type="search" class="et-search-field" placeholder="Søg artist..." value="%2$s" name="s" title="%3$s" />',
                    esc_attr__( 'Search &hellip;', 'Divi' ),
                    get_search_query(),
                    esc_attr__( 'Search for:', 'Divi' )
                );
            ?>
            </form>
    	</div>

		<main id="et-main-area" class="main__content">
