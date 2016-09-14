<?php 
//Cambiar author/username a profile/ID_de_usuario
function change_author_permalinks() {
  global $wp_rewrite;
   // Primero cambiamos el valor de la base de author a lo que queramos
   $WP_rewrite->author_base = 'profile';
  $wp_rewrite->flush_rules();
}

add_action('init','change_author_permalinks');

add_filter('query_vars', 'users_query_vars');
function users_query_vars($vars) {
    // ahora añadimos el ID de usuario a la lista de variables válidas
    $new_vars = array('profile');
    $vars = $new_vars + $vars;
    return $vars;
}

//Y finalmente generamos la regla de escritura de la URL con los valores anteriores 
function user_rewrite_rules( $wp_rewrite ) {
  $newrules = array();
  $new_rules['profile/(\d*)$'] = 'index.php?author=$matches[1]';
  $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules','user_rewrite_rules');

 ?>