<?php
get_header();

// Check if page & subpage is belonging to artist categories
if (in_array(445, $post->ancestors))
{ get_template_part('artist-category'); 
} elseif (in_array(447, $post->ancestors)) {
	get_template_part('artist-category'); 
} elseif (in_array(449, $post->ancestors)) {
	get_template_part('artist-category');
} else {
	the_content();
}

get_footer(); 

?>