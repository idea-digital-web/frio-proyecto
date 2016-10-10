<?php
/**
 * AUTOUPDATE
 */
 if (get_bloginfo( 'url' ) === "http://localhost/frio") {
	add_filter( 'auto_update_plugin', '__return_true' );
	add_filter( 'auto_update_theme', '__return_true' );
} else {
	add_filter('allow_minor_auto_core_updates', '__return_true');
	add_filter( 'auto_update_plugin', '__return_false' );
	add_filter( 'auto_update_theme', '__return_false' );
}

/**
 * AÑADE NOFOLLOW A ENLACES EXTERNOS
 */

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
add_filter('the_content', 'auto_nofollow');

/** AÑADE ALT TAGS A IMG */
function add_alt_tags( $content ) {
  preg_match_all( '/<img (.*?)\/>/', $content, $images );
  if ( ! is_null( $images ) ) {
    foreach ( $images[1] as $index => $value ) {
      if ( ! preg_match( '/alt=/', $value ) ) {
        $new_img = str_replace(
          '<img',
          '<img alt="' . esc_attr( get_the_title() ) . '"',
          $images[0][$index] );
        $content = str_replace(
          $images[0][$index],
          $new_img,
          $content );
      }
    }
  }
  return $content;
}
add_filter( 'the_content', 'add_alt_tags', 99999 );

/**
 * MINIFIER SCRIPT
 */

class WP_HTML_Compression
{
	// Settings
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;

	// Variables
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);

		$savings = ($raw-$compressed) / $raw * 100;

		$savings = round($savings, 2);

		return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;

			$content = $token[0];

			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;

					// Don't print the comment
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;

						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);

						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace(' />', '/>', $content);
					}
				}
			}

			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}

			$html .= $content;
		}

		return $html;
	}

	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);

		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}

	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);

		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}

		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');
?>
