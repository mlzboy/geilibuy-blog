<?php
/*
Template Name: Page
*/
?>
<?php get_header(); ?>
<div id="container">
    <!--content -->
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" >
			<div class="title">
				<p class="contit"><h2><?php the_title(); ?></h2></p>
			</div>

			<div class="entry">
				<?php the_content('阅读全文'); ?>
			</div>
			<!-- End entry -->
			<div id="commentBox">
			 <?php comments_template(); ?><!--评论-->
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

	</div><!--/content -->

	<!--Right -->
    <div class="fright"><?php get_sidebar(); ?></div>
    <!--/Right -->
	<div class="clear"></div>

</div>
<!-- End container-->

<?php get_footer();?>
