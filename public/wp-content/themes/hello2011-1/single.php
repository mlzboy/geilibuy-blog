<?php get_header(); ?>
<div id="container">
    <!--content -->
	<div id="content">
		<?php $options = get_option('fl_options'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" >
			<div class="title">
				<p class="contit"><h2><?php the_title(); ?></h2></p>
				<p class="date"><?php the_time('D,Y M j H:i:s') ?></p>
			</div>
			
			<div class="entry">
				<p><?php the_content(); ?></p>
			</div>

			<!--Next&previous_Nav-->
			<div class="newsPrevions">
				<p>上一篇：<?php previous_post_link('%link') ?></p>
				<p>下一篇：<?php next_post_link('%link') ?></p>
			</div>

			<!--post_pagenav-->
			<?php wp_link_pages("before=<p class='pages'>".__('Pages:','Dreamy')."&after=</p>"); ?>

			<div id="relatedPost">
				<?php if(function_exists('wp_related_posts')) {wp_related_posts();} ?>
			</div>
			<div class="clear"></div>

			<!--//相关日志，需要插件支持。没安装不显示、不影响主题使用-->

			<div id="commentBox">
			 <?php comments_template(); ?><!--评论-->
			</div>

		</div><!--//post -->

		<?php endwhile; ?>
		<?php else : ?>
		<div class="notfound">
			<h1>Not Found</h1>
			Sorry, but you are looking for something that isn't here.
		</div>
		<?php endif; ?>
	</div>
	<!--Right -->
    <div class="fright"><?php get_sidebar(); ?></div>
    <!--/Right -->
	<div class="clear"></div>

</div>
<!-- End container-->

<?php get_footer();?>
