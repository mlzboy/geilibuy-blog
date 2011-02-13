<?php get_header(); ?>
<div id="container">
    <!--content -->

		<div class="post" >

			<div class="notfound">
				<h1>Error 404 - Not Found</h1>
				<p>你要查看的网页可能已被删除、名称已被更改，或者暂时不可用。<br />
				请尝试以下操作：<br />
				1. 如果您已经在地址栏中输入该网页的地址，请确认其拼写正确；<br />
				2. 点击首页进入 <a href="<?php bloginfo('url') ?>"><?php bloginfo('url') ?></a> 主页；<br />
				3. 单击<span class="light">后退</span>按钮，尝试其他链接；
				</p>
			</div>
		</div><!--/content -->


</div>
<!-- End container-->

<?php get_footer();?>