<?php
amp_get_header();
?>

<div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
	<main class="mdl-layout__content">
		<div class="demo-blog__posts mdl-grid">


			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						amp_get_template_part( 'content' );

						// If comments are open or we have at least one comment, load up the comment template.

						// End of the loop.
					endwhile;
					?>

				</main><!-- .site-main -->

			</div><!-- .content-area -->

</div>
<footer class="mdl-mini-footer">
	<div class="mdl-mini-footer--left-section">
		<button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
			<span class="visuallyhidden">Twitter</span>
		</button>
		<button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
			<span class="visuallyhidden">Facebook</span>
		</button>
		<button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
			<span class="visuallyhidden">Google Plus</span>
		</button>
	</div>
	<div class="mdl-mini-footer--right-section">
		<button class="mdl-mini-footer--social-btn social-btn__share">
			<i class="material-icons" role="presentation">share</i>
			<span class="visuallyhidden">share</span>
		</button>
	</div>
</footer>
</main>
<div class="mdl-layout__obfuscator"></div>
</div>
<?php
amp_get_footer();
?>
