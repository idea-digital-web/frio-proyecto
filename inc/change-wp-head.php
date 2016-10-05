<?php 

function change_wp_head(){
remove_action('wp_head', 'wp_generator');
}

 ?>