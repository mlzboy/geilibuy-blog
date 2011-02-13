<!--sidebar -->
<ul id="sidebar">
	<?php $options = get_option('fl_options'); ?>

	<!-- widget 2 -->
	<?php if ($options['fl_sidebar_aboutme_enable']) { ?>
	<li class="aboutme">
		<h2>About Me</h2>
		<p><?php echo stripslashes($options['fl_sidebar_aboutme']); ?></p>
	</li>
	<?php } else { ?>
	<li class="archive">
		<h2>页面</h2>
		<ul>
			<li><a href="<?php echo home_url( '/' ); ?>" title="首页">首页</a></li>
			<?php wp_list_pages('title_li='); ?>
		</ul>
	</li>
	<?php } ?>

	<!-- widget 3 -->
	<?php if ($options['fl_sidebar_recent_posts_enable']) : ?>
	<li class="recent_posts">
		<h2>最新文章</h2>
		<ul>
			<?php $count = stripslashes($options['fl_sidebar_recent_posts']); ?>
			<?php query_posts('showposts='.$count); ?>
			<?php while (have_posts()) : the_post(); ?>
			<li>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
			<?php endwhile;?>
		</ul>
	</li>
	<?php endif; ?>

	<!--侧边栏广告位扩展-->
	<?php if ($options['fl_sidebar_googleads_enable']) : ?>
	<li class="ads">
		<h2>赞助商</h2>
		<ul class="singleADtwo">
			<?php echo stripslashes($options['fl_sidebar_googleads']); ?>
		</ul>
	</li>
	<?php endif; ?>
	

	<li class="comments">
		<h2>最新评论</h2>
		<ul id="sidebarComment">
			<?php Dreamy_news_comments($limit = 5, $length = 15); ?>
		</ul>
	</li>

	<?php wp_list_bookmarks('categorize=0&category=186&title_li=' . __('SOMEe FRIENDS') . '' ); ?>
		
	<li class="meta"><h2>Meta</h2>
		<ul>
			<li>
				<div id="loginformbox">
						<form action="<?php bloginfo('url') ?>/wp-login.php" method="post" id="loginform">
							<p><label class="user" for="log">用 户：</label></p>
							<p><input class="input-user" type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="22" tabindex="6" /></p>
							<p><label class="password" for="pwd">密 码：</label></p>
							<p><input class="input-password" type="password" name="pwd" id="pwd" size="22" tabindex="7" /></p>
							<p>
							<input name="rememberme" id="rememberme" type="checkbox" value="forever" tabindex="8" /><label for="rememberme">记住我</label>
							<input type="submit" name="submit" id="login-submit" value="登 陆" />
							</p>
							<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
						</form>
					</div>
					<?php global $user_ID, $user_identity, $user_level ?>
					<?php if ( $user_ID != "" ) : ?>
					已登陆：<strong><?php echo $user_identity ?></strong> <br /><strong><?php wp_loginout( $redirect ); ?></strong> | <strong><a href="<?php bloginfo('url') ?>/wp-admin/" class="wp-admin">后台</a></strong>	
					<?php else: ?>
					<a href="<?php bloginfo('url') ?>/wp-login.php" class="wp-login">登陆</a>
					<?php endif; ?>
			</li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>

			<?php if ($options['fl_statistics_enable']) : ?>
				<li><?php echo stripslashes($options['fl_statistics']); ?></li>
			<?php endif; ?>

			<?php wp_meta(); ?>
		</ul>
	</li>
</ul>
<!--/sidebar -->