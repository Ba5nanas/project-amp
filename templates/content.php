<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>




<article id="post-<?php the_ID(); ?>" <?php post_class("mdl-card mdl-cell mdl-cell--12-col"); ?>>


	<header class="entry-header mdl-card__media mdl-color-text--grey-50" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>'); background-size:cover;">

		<?php the_title( '<h3 class="entry-title"><a href="'.get_permalink().'">', '</a></h3>' ); ?>

	</header><!-- .entry-header -->



	<div class="entry-content mdl-card__supporting-text meta mdl-color-text--grey-600">
		<div class="minilogo"></div>
		<div>
			<strong><?php echo get_the_title(); ?></strong>
			<span><?php the_date(); ?></span>
		</div>
	</div>


</article><!-- #post-## -->
