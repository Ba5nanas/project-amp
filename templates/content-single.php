<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class("mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col"); ?>>


	<header class="entry-header mdl-card__media mdl-color-text--grey-50" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>'); background-size:cover;">

		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

	</header><!-- .entry-header -->


	<div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
		<div class="minilogo"></div>
		<div>
			<strong><?php echo get_the_title(); ?></strong>
			<span><?php the_date(); ?></span>
		</div>
		<div class="section-spacer"></div>
		<div class="meta__favorites">
			425 <i class="material-icons" role="presentation">favorite</i>
			<span class="visuallyhidden">favorites</span>
		</div>
		<div>
			<i class="material-icons" role="presentation">bookmark</i>
			<span class="visuallyhidden">bookmark</span>
		</div>
		<div>
			<i class="material-icons" role="presentation">share</i>
			<span class="visuallyhidden">share</span>
		</div>
	</div>

	<div class="entry-content mdl-color-text--grey-700 mdl-card__supporting-text">
		<?php the_content(); ?>
	</div>

</article><!-- #post-## -->
