<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package nyu core
 */

get_header(); ?>
<div id="page" class="hfeed site">
	<div id="masterContainer" class="category cpTemps">
					
		<span class="offLeft">New York University</span>

		<!-- JUMP LINKS -->
		<a class="offLeft" href="#contentWrapper">Skip to Content</a>
		<a class="offLeft" href="#searchField">Skip to Search</a>
		<a class="offLeft" href="#nav">Skip to Navigation</a>
		<a class="offLeft" href="#subnav">Skip to Sub Navigation</a>
		<div id="contentWrapper">
			<div id="primary" class="content-area tripleBox rightBorder">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'nyu-core' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

				<?php nyu_core_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

				</main><!--/#main -->
			</div><!--/#primary .tripleBox-->

			<div class="doubleBox">
				<?php get_sidebar(); ?>
			</div><!--/.doubleBox-->
			
		</div><!--/#contentWrapper-->
	<?php get_footer(); ?>
	</div><!--/#masterContainer-->
</div><!--/#page-->