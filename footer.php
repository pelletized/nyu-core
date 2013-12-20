<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package nyu core
 */
?>


<footer class="nyuFooter">
	<hr class="invisible" />
	<div id="footerContainer">			
		<?php if ( ! dynamic_sidebar( 'footer-1' ) ) { ?>
			<p>Unless otherwise noted, all content copyright New York University. All rights reserved.<br>
			Designed by the Digital Communications Group.</p>			
		<?php } else { 
			wp_footer();
		}	//end footer widget area ?>			
	</div>
</footer>
	


