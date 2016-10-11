<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div><!-- .col-full -->

<?php 

	if (is_front_page() || is_home() || is_page_template( 'template-homepage.php' ) || is_page( 'contactanos' ))

		do_action( 'homepage_after_content' ); 

?>

</div><!-- #content -->


	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

			<?php do_action( 'storefront_footer' ); ?>

	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
