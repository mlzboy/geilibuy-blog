<?php // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'dreamy'); ?></p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><a href="#respond"><?php comments_number(__('这篇文章还没有网友发表评论&nbsp;&nbsp;', 'dreamy'), __('这篇文章已有 <span class="light">1</span> 位网友发表了评论&nbsp;&nbsp;', 'dreamy'), __('这篇文章已有 <span class="light">%</span> 位网友发表了评论&nbsp;&nbsp;', 'dreamy'));?></a></h3>

	<ol id="commentlist">
	<?php wp_list_comments(array('avatar_size' => 42));?>
	</ol>


 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('评论已经关闭.', 'dreamy'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php if (get_option('page_comments')) {
		$comment_pages = paginate_comments_links('echo=0');
		if ($comment_pages) {
?>
		<div id="comment-pages">
			<span class="commentNaviTit"><?php _e('评论分页', 'dreamy'); ?></span>
			<?php echo $comment_pages; ?>
		</div><div class="clear"></div>
<?php
		}
	}
?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><?php comment_form_title( __('发表新的评论', 'dreamy'), __('为 %s 添加回复' , 'dreamy') ); ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('你必须先 <a href="%s">登陆</a> 才能发表评论.', 'dreamy'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('当前已登陆: <strong><a href="%1$s">%2$s</a></strong>.', 'dreamy'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('注销当前用户', 'dreamy'); ?>"><?php _e('退出 &raquo;', 'dreamy'); ?></a></p>

	<div class="textareabox">
		<textarea name="comment" id="comment" cols="99%" rows="8" tabindex="1"></textarea>
		<?php cancel_comment_reply_link() ?>
	</div>

	<p><input name="submit" type="submit" id="submit" tabindex="2" value="<?php _e('提交评论', 'dreamy'); ?>" /><?php comment_id_fields(); ?></p>
	<p class="comment-tips">
		注意：<br />
		1、本站启用了审核机制，你的留言可能稍后才会显示，请不要重复提交，谢谢。<br />
		2、留言时的头像是Gravatar提供的服务。想设置的看<a href="http://baike.baidu.com/view/675247.htm">这里</a>。<br />
		3、评论者允许使用'@user空格'的方式将自己的评论通知另外评论者。
	</p>

<?php else : ?>
	<div class="textareabox">
		<textarea name="comment" id="comment" cols="99%" rows="8" tabindex="4"></textarea>
		<?php cancel_comment_reply_link() ?>
	</div>

	<div class="inputbox">
		<p class="name"><label for="author"><?php _e('昵称', 'dreamy'); ?> <?php if ($req) _e("(必须)", "dreamy"); ?></label> <br />
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>

		<p class="email"><label for="email"><?php _e('E-Mail', 'dreamy'); ?> <?php if ($req) _e("(必须)", "dreamy"); ?></label><br />
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> /></p>

		<p class="inputurl"><label for="url"><?php _e('网址', 'dreamy'); ?></label><br />
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="4" /></p>
		<div class="clear"></div>
	</div>

	

	<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('提交评论', 'dreamy'); ?>" /><?php comment_id_fields(); ?></p>
	<p class="comment-tips">
		注意：<br />
		1、本站启用了审核机制，你的留言可能稍后才会显示，请不要重复提交，谢谢。<br />
		2、留言时的头像是Gravatar提供的服务。想设置的看<a href="http://baike.baidu.com/view/675247.htm">这里</a>。<br />
		3、评论者允许使用'@user空格'的方式将自己的评论通知另外评论者。
	</p>

<?php endif; ?>

<?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
