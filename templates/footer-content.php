<div class="site-footer__item">
	<h2>
	Nosotros
	</h2>
	<picture>
		<img src="http://i0.wp.com/cerroverdestore.com/wp-content/uploads/2016/08/logo-footer.png" alt="Logo Footer" />
	</picture>
	<p><?php bloginfo('description'); ?></p>
	<span class="cards hidden">
		<i class="fa fa-cc-visa fa-3x"></i>
		<i class="fa fa-cc-mastercard fa-3x"></i>
	</span>
</div>
<div class="site-footer__item">
	<h2>Categorías</h2>
	<?php wp_nav_menu(
			array(
			'theme_location' => 'primary',
			'container' => 'nav',
			'link_before'	=> '<i class="fa fa-angle-right"></i> ',
			'container_class' => 'site-footer__item--nav',
			'menu_class' => 'site-footer__item--nav-categories',
			'depth' => 1
			)
		);
	?>
</div>
<div class="site-footer__item">
	<h2>
	Mensaje Directo
	</h2>

	<?php if (get_bloginfo( 'url' ) === "http://localhost/frio") {
	if (function_exists("add_formcraft_form")) { add_formcraft_form("[fc id='1'][/fc]"); };
	} else {
	if (function_exists("add_formcraft_form")) { add_formcraft_form("[fc id='1'][/fc]"); };
	} ?>


</div>
<div class="site-footer__item">
	<h2>
	Contáctenos
	</h2>
	<div class="site-footer__item--contact">
		<i class="fa fa-phone"></i>
		<span><?php get_template_part( 'templates/add', 'phone'); ?></span>
	</div>
<!-- 	<div class="site-footer__item--contact">
		<i class="fa fa-mobile"></i>
		<span><?php get_template_part( 'templates/add', 'mobile'); ?></span>
	</div> -->
	<div class="site-footer__item--contact">
		<i class="fa fa-whatsapp" aria-hidden="true"></i>
		<span><?php get_template_part( 'templates/add', 'whatsapp'); ?></span>
	</div>
	<div class="site-footer__item--contact">
		<i class="fa fa-envelope"></i>
		<span class="email"><?php get_template_part( 'templates/add', 'email'); ?></span>
	</div>
	<div class="site-footer__item--contact">
		Somos tienda virtual con entregas previo acuerdo.
	</div>
</div>