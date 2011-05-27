<?php defined('SYSPATH') or die('No direct script access.'); 

echo '
	<article id="post-', $post->id, '">
', View::factory('blog/post/header')->set('post', $post)->set('config', $config), '
		', $post->content(), '
', View::factory('blog/post/share-links')->set('post', $post);

// Any tags?
if (!empty($tags))
{
	echo '
		<p class="tags"><img src="/res/icons/tag_blue.png" alt="Tags" title="Tags" /> ', HTML::link_list($tags), '</p>';
}
		
echo '
		<footer>
			Short URL for sharing: ', $post->short_url(), '. This entry was posted on ', date($config->full_date_format, $post->date), ' and is filed under ', HTML::link_list($categories), '. You can <a href="', $post->url(), '#leave-comment">leave a comment</a> if you\'d like to, or subscribe to the RSS feed to keep up-to-date with all my latest blog posts! 
		</footer>
	</article>';
?>