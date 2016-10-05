<?php 
/**
 * Añade nofollow a todos los enlaces externos
 */

add_filter('the_content', 'auto_nofollow');

function auto_nofollow($content) {
    return preg_replace_callback('/<a>]+/', 'auto_nofollow_callback', $content);
}

function auto_nofollow_callback($matches) {
    $link = $matches[0];
    $site_link = get_bloginfo('url');
    if (strpos($link, 'rel') === false) {
        $link = preg_replace("%(href=S(?!$site_link))%i", 'rel="nofollow" $1', $link);
    } elseif (preg_match("%href=S(?!$site_link)%i", $link)) {
        $link = preg_replace('/rel=S(?!nofollow)S*/i', 'rel="nofollow"', $link);
    }
    return $link;
}

 ?>