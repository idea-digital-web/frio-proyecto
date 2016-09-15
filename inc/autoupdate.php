<?php 

// Activar actualizaciones automáticas menores
add_filter('allow_minor_auto_core_updates', '__return_true');

// Desactivar todas las actualizaciones automáticas de plugins
// incluyendo las actualizaciones de seguridad
add_filter( 'auto_update_plugin', '__return_false' );

// Desactivar todas las actualizaciones automáticas de temas
// incluyendo las actualizaciones de seguridad
add_filter( 'auto_update_theme', '__return_false' );

 ?>