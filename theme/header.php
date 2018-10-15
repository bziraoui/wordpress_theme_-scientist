<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @packageScientist-is-Awesome
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'scientist-is-awesome' ); ?></a>

	<header id="masthead" class="site-header c-main-header">
		<div class="site-branding o-container">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$scientist_is_awesome_description = get_bloginfo( 'description', 'display' );
			if ( $scientist_is_awesome_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $scientist_is_awesome_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'scientist-is-awesome' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		 <!-- NAVIGATION -->
		 <div class="c-main-header__nav-wrapper" data-menuAnimated="true">
      <nav class="c-main-nav js-main-nav">
        <ul class="c-main-nav__list nav-fixed--is-active js-main-nav__list">
          <li class="c-main-nav__item"><a href="#section-about" class="c-main-nav__link" data-navPosition="1"><span>01_</span>about</a></li>
          <li class="c-main-nav__item"><a href="#section-education" class="c-main-nav__link" data-navPosition="2"><span>02_</span>education</a></li>
          <li class="c-main-nav__item"><a href="#section-research" class="c-main-nav__link" data-navPosition="3"><span>03_</span>research</a></li>
          <li class="c-main-nav__item"><a href="#section-publications" class="c-main-nav__link" data-navPosition="4"><span>04_</span>publications</a></li>
          <li class="c-main-nav__item"><a href="#section-teaching" class="c-main-nav__link" data-navPosition="5"><span>05_</span>teaching</a></li>
          <li class="c-main-nav__item"><a href="#section-contacts" class="c-main-nav__link" data-navPosition="6"><span>06_</span>contacts</a></li>
        </ul>
        <div class="c-main-nav__bars js-main-nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </div>
    <!-- NAVIGATION END -->
	</header><!-- #masthead -->


	<main class="o-main">
