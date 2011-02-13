<?php get_header(); ?>
<div id="container">
    <!--content -->
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" >
			<div class="title">
				<p class="contit"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="点击查看—><?php the_title(); ?>" ><?php the_title(); ?></a></h2></p>
				<p class="date"><?php the_time('D,Y M j H:i:s') ?></p>
			</div>

			<div class="entry">
				<?php the_content('阅读全文'); ?>
			</div>
			<!-- End entry -->

			<div class="info">
					<span style="float:left;">&nbsp;&nbsp;</span>
					<span class="admin"><?php the_author_posts_link() ?>&nbsp;|&nbsp;</span>
					<span class="cat"><?php the_category(', ') ?>&nbsp;|&nbsp;</span>
					<span class="comments"><?php comments_popup_link('[0]', '[1]', '[%]'); ?>&nbsp;|&nbsp;</span>
					<span class="views"><?php if(function_exists('the_views')) : ?><?php the_views() ?><?php else: ?>无法获取数据<?php endif; ?><!--//文章浏览次数显示，需要插件支持。没安装不显示、不影响主题使用-->&nbsp;&nbsp;</span>
					<span class="edit"><strong><?php edit_post_link('编缉','',''); ?></strong></span>
			</div>
		</div>
		<!--/post -->
		<?php endwhile; ?>
		<?php else : ?>
			<div class="notfound">
				<h1>Not Found</h1>
				Sorry, but you are looking for something that isn't here.
			</div>
		<?php endif; ?>


		<?php if(function_exists('flight_pagination')) : ?>
			<?php flight_pagination($query_string); ?><!--//分页，需要插件支持。没安装采用默认的分页、不影响主题使用-->
			<div class="clear"></div>
		<?php else : ?>
			<div class="wp-pagenavi">
				<span class="fleft"><?php previous_posts_link(__('&laquo; 上一页', 'Dreamy')); ?></span>
				<span class="fright"><?php next_posts_link(__('下一页 &raquo;&nbsp;&nbsp;', 'Dreamy')); ?></span>
				<div class="clear"></div>
			</div>
		<?php endif; ?>
	</div><!--/content -->

	<!--Right -->
    <div class="fright"><?php get_sidebar(); ?></div>
    <!--/Right -->
	<div class="clear"></div>

</div>
<!-- End container-->

<?php get_footer();?>
