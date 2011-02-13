<?php
/**
 * Flight settings
 *
 */
	
add_action('admin_menu', 'flight_admin_menu');

function flight_admin_menu() {
	add_theme_page(__( 'flight Theme Settings', 'lukoo' ), __( 'Hello 2011设置', 'MilWorm' ), 'edit_themes', basename(__FILE__), 'flight_settings_page');
	add_action( 'admin_init', 'register_flight_settings' );
}

function register_flight_settings() {
	register_setting( 'flight-settings-group', 'fl_options' );
}

function flight_add_init() {
	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("flight_css", $file_dir."/theme_options.css", false, "all");
	wp_enqueue_script("flight_jquery", $file_dir."/js/jquery-1.4.2.min.js", false, "all");
}
add_action('admin_init', 'flight_add_init');

function flight_settings_page() {
if ( isset($_REQUEST['updated']) ) echo '<div id="message" class="updated fade lu_settings_saved"><p><strong>主题设置已保存</strong></p></div>';
if( 'reset' == isset($_REQUEST['action']) ) {
	delete_option('fl_options');
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade lu_settings_reset"><p><strong>主题已重置</strong></p></div>';	
}
?>
<script type="text/javascript" src="http://leotheme.cn/wp-content/themes/flight/js/flight_latest_version.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery(".fl_cbradio_op:checked").each(function() {
		jQuery(this).parent().parent().children().eq(3).show();
	});
	jQuery(".fl_cbradio_cl:checked").each(function() {
		jQuery(this).parent().parent().children().eq(3).hide();
	});
	jQuery(".fl_cbradio_cl").click(function(){
		jQuery(this).parent().parent().children().eq(3).slideUp();
	});
	jQuery(".fl_cbradio_op").click(function(){
		jQuery(this).parent().parent().children().eq(3).slideDown();
	});
   jQuery(".theme_options_content > div:not(:first)").hide();
   jQuery(".theme_options_tab li").each(function(index){
       jQuery(this).click(
	   	  function(){
			  jQuery(".theme_options_tab li.current").removeClass("current");
			  jQuery(this).addClass("current");
			  jQuery(".theme_options_content > div:visible").hide();
			  jQuery(".theme_options_content > div:eq(" + index + ")").show();
	  })
   })
})
</script>

<div class="wrap">
	<h2 class="option-title"><?php _e('Hello 2011设置','Flight') ?></h2>
	<noscript><div class="error"><strong><?php _e('JavaScript被禁用. 请在浏览器设置你开启Javascript.','Flight') ?></strong></div></noscript>

	<form method="post" action="options.php">
		<?php settings_fields( 'flight-settings-group' ); ?>
		<?php $options = get_option('fl_options'); ?>

		<ul class="theme_options_tab">
			<li class="current">常规</li>
			<li>Google ADS</li>
			<div class="clear"></div>
		</ul>
		
		<div class="theme_options_content">
			<div class="theme_options_con1">
				<!-- 是否启用图片LOGO -->
				<div class="box">
					<h3 class="box_title"><?php _e('自定义Logo','flight') ?></h3>
					<div class="box_content">
						<div class="fleft"><?php _e('是否开启自定义LOGO','flight') ?></div>
						<div class="fright custom_logo_option">
							<input type="radio" name="fl_options[fl_customlogo_enable]" class="fl_cbradio_cl" value="" <?php checked('', $options['fl_customlogo_enable']); ?>/> 
							<span class="radio_options"><?php _e('禁用','flight') ?></span>
							<input type="radio" name="fl_options[fl_customlogo_enable]" class="fl_cbradio_op" value="1" <?php checked('1', $options['fl_customlogo_enable']); ?>/> 
							<span class="radio_options"><?php _e('开启','flight') ?></span>
						</div>
						<div class="clear"></div>
							
						<div class="custom_con nodisplay mt20">
							<div class="fleft">
								<label for="fl_options[lu_customlogo]"><?php _e('在右边输入LOGO的路径','flight') ?></label>
							</div>
							<div class="fright">
								<input type="text" name="fl_options[fl_customlogo]" value="<?php echo $options['fl_customlogo']; ?>"/>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>

				<!-- 自定义Feed -->
				<div class="box">
					<h3 class="box_title"><?php _e('自定义Feed来源','flight') ?></h3>
					<div class="box_content">
						<div class="fleft"><?php _e('是否开启自定义Feed来源','flight') ?></div>
						<div class="fright custom_feed_option">
							<input type="radio" name="fl_options[fl_customfeed_enable]" class="fl_cbradio_cl" value="" <?php checked('', $options['fl_customfeed_enable']); ?>/> <span class="radio_options"><?php _e('禁用','flight') ?></span>
							<input type="radio" name="fl_options[fl_customfeed_enable]" class="fl_cbradio_op" value="1" <?php checked('1', $options['fl_customfeed_enable']); ?>/> <span class="radio_options"><?php _e('开启','flight') ?></span>
						</div>
						<div class="clear"></div>

						<div class="custom_con nodisplay mt20">
							<div class="fleft">
								<label for="fl_options[fl_customfeed]"><?php _e('在右边输入你的Feed地址','flight') ?></label>
							</div>
							<div class="fright">
								<input type="text" name="fl_options[fl_customfeed]" value="<?php echo $options['fl_customfeed']; ?>"/>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>

				<!-- 侧边栏关于内容编缉 -->
				<div class="box">
					<h3 class="box_title"><?php _e('侧边栏关于内容编缉','flight') ?></h3>
					<div class="box_content">
						<div class="fleft"><?php _e('是否开启侧边栏关于内容模块','flight') ?></div>
						<div class="fright custom_googlesearch_option">
							<input type="radio" name="fl_options[fl_sidebar_aboutme_enable]" class="fl_cbradio_cl" value="" <?php checked('', $options['fl_sidebar_aboutme_enable']); ?>/>
							<span class="radio_options"><?php _e('禁用','flight') ?></span>
							<input type="radio" name="fl_options[fl_sidebar_aboutme_enable]" class="fl_cbradio_op" value="1" <?php checked('1', $options['fl_sidebar_aboutme_enable']); ?>/> <span class="radio_options"><?php _e('开启','flight') ?></span>
						</div>
						<div class="clear"></div>

						<div class="custom_con nodisplay mt20">
							<div class="fleft"><?php _e('在右边输入你的内容','flight') ?></div>
							<div class="fright">
								<textarea name="fl_options[fl_sidebar_aboutme]"><?php echo $options['fl_sidebar_aboutme']; ?></textarea>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>

				<!-- 最新文章 -->
				<div class="box">
					<h3 class="box_title"><?php _e('最新文章','flight') ?></h3>
					<div class="box_content">
						<div class="fleft"><?php _e('是否开启侧边栏最新文章','flight') ?></div>
						<div class="fright custom_statistics_option">
							<input type="radio" name="fl_options[fl_sidebar_recent_posts_enable]" class="fl_cbradio_cl" value="" <?php checked('', $options['fl_sidebar_recent_posts_enable']); ?>/>
							<span class="radio_options"><?php _e('禁用','flight') ?></span>
							<input type="radio" name="fl_options[fl_sidebar_recent_posts_enable]" class="fl_cbradio_op" value="1" <?php checked('1', $options['fl_sidebar_recent_posts_enable']); ?>/> <span class="radio_options"><?php _e('开启','flight') ?></span>
						</div>
						<div class="clear"></div>

						<div class="custom_con nodisplay mt20">
							<div class="fleft"><?php _e('在右边输入要显示最新文章的条数','flight') ?></div>
							<div class="fright">
								<input type="text" name="fl_options[fl_sidebar_recent_posts]" value="<?php echo $options['fl_sidebar_recent_posts']; ?>" />
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>

				<!-- 统计代码 -->
				<div class="box">
					<h3 class="box_title"><?php _e('统计代码','flight') ?></h3>
					<div class="box_content">
						<div class="fleft"><?php _e('是否开启博客统计','flight') ?></div>
						<div class="fright custom_statistics_option">
							<input type="radio" name="fl_options[fl_statistics_enable]" class="fl_cbradio_cl" value="" <?php checked('', $options['fl_statistics_enable']); ?>/>
							<span class="radio_options"><?php _e('禁用','flight') ?></span>
							<input type="radio" name="fl_options[fl_statistics_enable]" class="fl_cbradio_op" value="1" <?php checked('1', $options['fl_statistics_enable']); ?>/> <span class="radio_options"><?php _e('开启','flight') ?></span>
						</div>
						<div class="clear"></div>

						<div class="custom_con nodisplay mt20">
							<div class="fleft"><?php _e('在右边输入你的统计代码','flight') ?></div>
							<div class="fright">
								<textarea name="fl_options[fl_statistics]"><?php echo $options['fl_statistics']; ?></textarea>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>

				<!-- ICP备案号设置 -->
				<div class="box">
					<h3 class="box_title"><?php _e('ICP备案号','flight') ?></h3>
					<div class="box_content">
						<div class="fleft"><?php _e('是否开启ICP备案号设置','flight') ?></div>
						<div class="fright custom_icp_option">
							<input type="radio" name="fl_options[fl_icp_enable]" class="fl_cbradio_cl" value="" <?php checked('', $options['fl_icp_enable']); ?>/>
							<span class="radio_options"><?php _e('禁用','flight') ?></span>
							<input type="radio" name="fl_options[fl_icp_enable]" class="fl_cbradio_op" value="1" <?php checked('1', $options['fl_icp_enable']); ?>/> 
							<span class="radio_options"><?php _e('开启','flight') ?></span>
						</div>
						<div class="clear"></div>

						<div class="custom_con nodisplay mt20">
							<div class="fleft"><?php _e('在右边输入你的ICP备案号','flight') ?></div>
							<div class="fright">
								<input type="text" name="fl_options[fl_icp]" value="<?php echo $options['fl_icp']; ?>"/>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- End -->
			</div>

			<div class="theme_options_con2">

				<!--侧边栏 Google ADS -->
				<div class="box">
					<h3 class="box_title"><?php _e('侧边栏 Google ADS','flight') ?></h3>
					<div class="box_content">
						<div class="fleft"><?php _e('是否开启侧边栏广告','flight') ?></div>
						<div class="fright custom_sidebarads_option">
							<input type="radio" name="fl_options[fl_sidebar_googleads_enable]" class="fl_cbradio_cl" value="" <?php checked('', $options['fl_sidebar_googleads_enable']); ?>/>
							<span class="radio_options"><?php _e('禁用','flight') ?></span>
							<input type="radio" name="fl_options[fl_sidebar_googleads_enable]" class="fl_cbradio_op" value="1" <?php checked('1', $options['fl_sidebar_googleads_enable']); ?>/> <span class="radio_options"><?php _e('开启','flight') ?></span>
						</div>
						<div class="clear"></div>

						<div class="custom_con nodisplay mt20">
							<div class="fleft"><?php _e('在右边输入你的广告代码','flight') ?></div>
							<div class="fright">
								<textarea name="fl_options[fl_sidebar_googleads]"><?php echo $options['fl_sidebar_googleads']; ?></textarea>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>

			</div>
		</div>

		<div class="fl_submit">
			<input type="submit" class="fl_submit_btn" name="save" value="<?php _e('Save Changes') ?>"/>
		</div>
	</form>
	<form method="post">
		<div class="fl_reset">
			<input type="submit" name="reset" value="<?php _e('重置') ?>" class="fl_reset_btn"/>
			<input type="hidden" name="action" value="重置" />
		</div>
	</form>
</div>
<?php } ?>