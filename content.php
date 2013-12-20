<?php
/**
 * @package nyu core
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nyu_core_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nyu-core' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'nyu-core' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'nyu-core' ) );
				if ( $categories_list && nyu_core_categorized_blog() ) :
			?>
			<div class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'nyu-core' ), $categories_list ); ?>
			</div>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'nyu-core' ) );
				if ( $tags_list ) :
			?>
			
			<div class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'nyu-core' ), $tags_list ); ?>
			</div>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'nyu-core' ), __( '1 Comment', 'nyu-core' ), __( '% Comments', 'nyu-core' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit Post', 'nyu-core' ), '<span class="edit-link">[', ']</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
