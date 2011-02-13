<?php
/*
function Name: Wordpress comments
Author: Await
Version: 1.0
Author URI: http://leotheme.cn
*/
function Dreamy_news_comments($limit = 10, $length = 20 ) {
	global $wpdb;
	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, 
			SUBSTRING(comment_content,1,$length) AS com_excerpt 
		FROM $wpdb->comments 
		LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) 
		WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' 
		ORDER BY comment_date_gmt DESC 
		LIMIT $limit";
	$comments = $wpdb->get_results($sql);
	foreach ($comments as $comment) {
        $avatar = '<img alt="'.$comment->comment_author.'" src="http://www.gravatar.com/avatar/'.md5($comment->comment_author_email).'?s=42&d=wavatar&r=G"/>';
		$output .= "\n\t<li>".$avatar."<div class=''><strong>" . $comment->comment_author . ":</strong> <br /><a href=\"" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID  . "\" title=\"on " . $comment->post_title . "\">" . strip_tags($comment->com_excerpt) . "...</a></div><div class='clear'></div></li>";
	}
	echo $output;
}

/*
function Name: Wordpress pagination
Author: Await
Version: 1.0
Author URI: http://leotheme.cn
*/
function flight_pagination($query_string){
	global $posts_per_page, $paged;
	$my_query = new WP_Query($query_string ."&posts_per_page=-1");
	$total_posts = $my_query->post_count;
	if(empty($paged))$paged = 1;
		$prev = $paged - 1;							
		$next = $paged + 1;	
		$range = 3; // only edit this if you want to show more page-links
		$showitems = ($range * 2)+1;
		$pages = ceil($total_posts/$posts_per_page);
		if(1 != $pages){
			echo "<div class='wp-pagenavi'><span class='pages'>".$paged."/".$pages."</span>";
			echo ($paged > 3 && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>第一页</a>":"";
			echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";
	
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>"; 
				}
			}
		echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";
		echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>最后一页</a>":"";
		echo "</div>\n";
	}
}
/*
Plugin Name: Wordpress Smilies
Plugin URI: http://www.thinkagain.cn
Description: The plugin will generate series of clickable icon buttons for wordpress built-in smilies.
Author: ThinkAgain
Version: 1.0
Author URI: http://www.thinkagain.cn
*/
//add_action('comment_form','wp_smilies',-1);
function wp_smilies() {
	global $wpsmiliestrans;
	if ( !get_option('use_smilies') or (empty($wpsmiliestrans))) return;
	$smilies = array_unique($wpsmiliestrans);
	$link='';
	foreach ($smilies as $key => $smile) {
		$file = get_bloginfo('wpurl').'/wp-includes/images/smilies/'.$smile;
		$value = " ".$key." ";
		$img = "<img src=\"{$file}\" alt=\"{$smile}\" />";
		$imglink = htmlspecialchars($img);
		$link .= "<a href=\"javascript:void(0);\" title=\"{$smile}\" onclick=\"document.getElementById('comment').value += '{$value}';jQuery('.wp_smilies').hide();\">{$img}</a>&nbsp;";
	}
	echo '<div class="wp_smilies">'.$link.'</div>';
}

/**
 * Custom Login
 *
 */
function Flight_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/custom_login.css" />';
}
add_action('login_head', 'Flight_custom_login');
?>
<?php
// Theme Option Function
	include('theme_options.php');
?>