<?php
/**
 * The Template for displaying all single posts.
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

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php nyu_core_content_nav( 'nav-below' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template();
					?>

				<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			
			</div><!--/.tripleBox-->
			<div class="doubleBox">
				<?php get_sidebar(); ?>
			</div><!--/.doubleBox-->
		</div><!--/#contentWrapper-->

	<?php get_footer(); ?>
	</div><!--/#masterContainer-->
</div><!--/#page-->