<?php 
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from($old) {
 return 'frioproyecto.master@gmail.com';
}
function new_mail_from_name($old) {
 return 'Frio Proyecto';
}
 ?>