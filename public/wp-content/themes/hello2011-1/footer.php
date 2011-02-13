<!--footer start -->
<div id="footer">
	<div class="footerBox">
		  <a id="goTop" href="#" title="返回顶部">返回顶部</a><br />
		<?php $options = get_option('fl_options'); ?>
		<?php if ($options['fl_icp_enable']) : ?>
			<a href="http://www.miibeian.gov.cn" target="blank" ><?php echo stripslashes($options['fl_icp']); ?></a>
		<?php endif; ?>
	
		<?php wp_footer(); ?>

	</div>
</div>

<!--footer end -->
</body>
</html>
