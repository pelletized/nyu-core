<?php
/**
 * The template for displaying search forms in nyu core
 *
 * @package nyu core
 */
?>
<!--
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'nyu-core' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'nyu-core' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'nyu-core' ); ?>">
</form>
-->

<div class="nyuSearch">
	<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
		<div id="searchBar">	
			<label>
				<span class="screen-reader-text offLeft">Search for:</span>
				<input class="search-field" type="search" name="s" value="" placeholder="Search...">
			</label>
		</div>
		<!--<input class="search-submit" type="submit" value="Search">-->
		
		<button id="searchBtn" type="submit"></button>
	</form>
</div><!--/.nyuSearch-->