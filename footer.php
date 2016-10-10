<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>




	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

			<?php do_action( 'storefront_footer' ); ?>

	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->




<!-- Inyección de enlaces con wp_footer -->
<?php wp_footer(); ?>
<!-- Fin inyección de enlaces con wp_footer -->
</body>
</html>
