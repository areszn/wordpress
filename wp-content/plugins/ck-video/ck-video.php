<?php
/*
Plugin Name:CK-Video
Plugin URI: http://www.qiuxinjiang.cn/
Description: 通过超酷播放器增加无广告视频，多集连播地址间用“||”间隔，本版本为内测0.3版本,支持部分优酷手机播放.
Version: 0.2 
Author: Many drops of make an ocean
Author URI:  http://www.qiuxinjiang.cn/
*/

function CK_Video_addbuttons() {
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
	// add the button for wp25 in a new way
		add_filter("mce_external_plugins", "add_ckvideo_tinymce_plugin", 5);
		add_filter('mce_buttons', 'register_ckvideo_button', 5);
	}
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_ckvideo_tinymce_plugin($plugin_array) {
	$plugin_array['ckvideo'] = plugins_url('',__FILE__).'/editor_plugin.js';	
	return $plugin_array;
}
// used to insert button in wordpress 2.5x editor
function register_ckvideo_button($buttons) {
	array_push($buttons, "separator", "ckvideo");
	return $buttons;
}


add_action('init', 'CK_Video_addbuttons');

//视频   
    function CK_Video($atts, $content=null){
    $neturl = get_option('siteurl');	
    extract(shortcode_atts(array(   
    "vtype" => '视频源',   
          "url" => '视频ID',   
          "auto" => '0', 
          "width" => '610', 
          "height" => '460'
    ), $atts));   
	
         return '<p style="text-align: center;"><iframe name="video" scrolling="no" align="middle" frameborder="0"   width="'.$width.'"  marginwidth="0" marginheight="0" height="'.$height.'"src="'.$neturl.'/wp-content/plugins/ck-video/ck/?content='. $content .'&auto='.$auto.'&url='.$url.'" ></iframe>   
</p><p style="text-align: center;">' ; 
          
}
    add_shortcode('ckvideo','CK_Video');   
    function CK_Video_Next($atts, $content=null){
    $neturl = get_option('siteurl');	
    extract(shortcode_atts(array(   
    "vtype" => '视频源',   
          "url" => '视频ID',   
          "auto" => '0', 
    ), $atts));   
         return '<a href="'.$neturl.'/wp-content/plugins/ck-video/ck/?content='. $content .'&auto='.$auto.'&url='.$url.'" target="video">'. $content .'</a>' ;       
       }   
    add_shortcode('ckvideonext','CK_Video_Next'); 	
?>