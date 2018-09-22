<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Carbody
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog_post_wrapper_main">
		<div class="blog_thumbnail"> 
		<?php if (has_post_thumbnail()){ ?>
			<?php the_post_thumbnail('carbody-blog-single'); ?>
		<?php } ?>
		</div>
	</div>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
				<?php if ( is_sticky() ) {
				 echo '<span class="featured-post"><i class="fa fa-thumb-tack"></i>' . esc_html__( ' Sticky', 'carbody' ).'</span>';
			} ?>
			<?php carbody_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
	<?php 
	if(is_single()){ 
		 the_content();
	}else{
		the_excerpt();
	}	?>
	</div><!-- .entry-content -->
	<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'carbody' ),
				'after'  => '</div>',
			) );
		?>
		<?php if(!is_single()){  ?>
		<span class="link_icon">
		<a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', 'carbody'); ?></a>
		</span>
		<?php } ?>
</article>
