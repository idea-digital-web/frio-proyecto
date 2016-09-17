<?php 
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'revslider/revslider.php' ) ): ?>
	<?php putRevSlider("principal", "homepage") ?>
<?php else: ?>
	<?php if (is_front_page() || is_home()): ?> 
	<?php get_template_part( 'templates/banner', 'principal' ); ?>
	<?php endif; ?>
<?php endif; ?>
