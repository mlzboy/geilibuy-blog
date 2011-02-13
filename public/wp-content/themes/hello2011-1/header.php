<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/flight.js"></script>
<!--[if IE 6]>
<script src="<?php bloginfo('template_directory'); ?>/js/iepng.js"></script>
<script type="text/javascript">
   EvPNG.fix('div, ul, img, li, input, h2');  //EvPNG.fix('包含透明PNG图片的标签'); 多个标签之间用英文逗号隔开。
</script>
<![endif]-->
<script type="text/javascript">
var Img_Maxwidth = 728;	//设定文章图片最大宽度
var url = "<?php echo home_url( '/' ); ?>";
$(function(){
	AutoImgSize('.entry img');
	$("a").bind("focus",function(){ if(this.blur){  this.blur();}});
	$("#goTop").click(function(){$("body").scrollTo(500);return false;}); //返回顶部
	var $value = $("#s").val();
	$("#s").focus(function(){
		$("#s").val("");
	}).blur(function(){
		if ($value!="") {
			 $("#s").val($value);
		}else{
			$("#s").val("请输入关健字...");
		}
	});
	var $sencondLi = $('#search');
	$sencondLi.hover(function() {
        $(this).find('#searchBox').slideDown(150);
        $(this).find('a').animate({opacity: 0.7 },500);
    },function() {
        $(this).find('a').animate({opacity: 1}, 800);
        setTimeout(function() {
            $sencondLi.find('#searchBox').slideUp(150);
        },800);
	});
	var $sidebar = $("#sidebar"),CH = $("#content").outerHeight(),SH = $("#sidebar").outerHeight();
		if (CH>=SH) {
			$sidebar.height(CH);
		}else{
			$("#content").height(SH-10);
		};
		$sidebar.children("li").first().css({borderTop:"none"})
	$("#content>div.post:odd").css({background:"#F5F5F5"});
	$(".wp-login").click(function() {
		$.XYTipsWindow({
			___title: "登陆",
			___content:	"id:loginformbox",
			___width: "342",
			___height: "220",
			___drag: "___boxTitle",
			___showbg: false
		});
		return false;
	});
	$(".wp-admin").click(function() {
		$.XYTipsWindow({
			___title: "后台管理",
			___content: "iframe:"+url+"/wp-admin",
			___width: "950",
			___height: "500",
			___drag: "___boxTitle",
			___showbg: true
		});
		return false;
	});
});
</script>
</head>

<body <?php body_class(); ?>>
<!--starheader-->
<div id="header">
	<?php $options = get_option('fl_options'); ?>
	<div class="logo">
	<?php if ($options['fl_customlogo_enable']) { ?>
		<a href="<?php echo home_url( '/' ); ?>" rel="home"><img src="<?php echo stripslashes($options['fl_customlogo']); ?>" title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
		<p class="description"><?php bloginfo('description'); ?></p>
	<?php } else { ?>
		<a href="<?php echo home_url( '/' ); ?>" rel="home" ><?php bloginfo( 'name' ); ?></a>
		<p class="description"><?php bloginfo('description'); ?></p>
	<?php } ?>
	</div>
	<div class="clear"></div>
	<div id="search">
		<a id="searchBtn" href="#" title="搜索">搜索</a>
		<div id="searchBox">
			<?php get_search_form(); ?>
		</div>
	</div>

	<?php if ($options['fl_customfeed_enable']) { ?>
		<a id="rss" href="<?php echo stripslashes($options['fl_customfeed']); ?>" class="rss" title="RSS Feed" >RSS</a>
	<?php } else { ?>
		<a id="rss" href="<?php bloginfo('rss2_url'); ?>" class="rss" title="RSS Feed" >RSS</a>
	<?php } ?>
	<div class="menu"></div>
	<ul class="nav">
		<li style="border-left: none;" <?php if (is_home() || is_search()) { echo 'class="current-cat"';} ?>><a href="<?php echo home_url( '/' ); ?>" rel="home">Home</a></li>
		<?php wp_list_categories('sort_column=name&hierarchical=0&title_li='); ?>
	</ul>
</div>
<div class="clear"></div>
<!--Endheader-->