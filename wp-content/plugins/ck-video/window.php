<?php
$wpconfig = realpath("../../../wp-config.php");
if (!file_exists($wpconfig))  {
	echo "Could not found wp-config.php. Error in path :\n\n".$wpconfig ;	
	die;	
}
require_once($wpconfig);
require_once(ABSPATH.'/wp-admin/admin.php');
global $wpdb;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>视频</title>
<!-- 	<meta http-equiv="Content-Type" content="<?php// bloginfo('html_type'); ?>; charset=<?php //echo get_option('blog_charset'); ?>" /> -->
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)); ?>/js/tinymce.js"></script>
	<base target="_self" />
</head>
		<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';docopyContent();" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form id="ckvideo" action="#">
		<table width="100%" border="0" cellpadding="4" cellspacing="0">
				<label for="cvname"><h2>视频名称</h2></label>
				<textarea title="输入视频名称." class="java" id="cvname" style="width: 100%" name="cvname" rows="1"></textarea>

		        <label for="cvurl"><h2>视频地址或ID</h2></label>
				<textarea title="输入视频地址或视频ID." class="java" id="cvurl" style="width: 100%" name="cvurl" rows="1"></textarea>
				<br>
				<input type="radio" name="autovideo" id="autono" value="0" checked="checked"> 不自动播放
                                <input type="radio" name="autovideo" id="auto" value="1" > 自动播放
				
				<div id="moreurldiv"  style="display:none">
				<b>两集中间使用“||”作为分隔符。</b>
				<label for="startnum">起始集数</label><input title="输入起始集数." class="java" id="startnum"  name="startnum" type="text" size="2" value="1"/>
				<label for="linenum">每行集数</label><input title="输入每行." class="java" id="linenum"  name="linenum" type="text" size="2" value="8"/>

				</div>
				</br>
				
		        <label for="cvwidth"><h3>视频宽度</h3></label>
				<input title="输入视频宽度." class="java" id="cvwidth"  name="cvwidth" type="text" size="5" value="100%"/>
		        <label for="cvheight"><h3>视频高度</h3></label>
				<input title="输入视频高度." class="java" id="cvheight"  name="cvheight" type="text" size="5" value="460"/>
				<label for="moreurl">多集视频</label> <input type="checkbox" name="moreurl" id="moreurl" onchange="moreURLdiv()" />

				<span class="render">
					<INPUT id="cancel"  type="button" value="清&nbsp;&nbsp;除" name="cancel" runat="server" onclick="clearText()">
					<INPUT id="insert"  type="button" value="插&nbsp;&nbsp;入" name="insert" runat="server" onclick="insertCK_Videocode()">
				</span>

        </table>
</form>








 
</body>
</html>