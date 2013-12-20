<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package nyu core
 */
?>

<?php 
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

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>				
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>
					<?php endwhile; ?>

					<?php nyu_core_content_nav( 'nav-below' ); ?>

				<?php else : ?>			
						<?php get_template_part( 'no-results', 'index' ); ?>		
				<?php endif; ?>

				</main><!-- #main -->
			
			</div><!--/.tripleBox-->
			<div class="doubleBox">
				<?php get_sidebar(); ?>
			</div><!--/.doubleBox-->
		</div><!--/#contentWrapper-->
	<?php get_footer(); ?>
	</div><!--/#masterContainer-->
</div><!--/#page-->
</body>
</html>