<?php
$wpconfig = realpath("../../../../wp-config.php");
if (!file_exists($wpconfig))  {
	echo "Could not found wp-config.php. Error in path :\n\n".$wpconfig ;	
	die;	
}
require_once($wpconfig);
//require_once(ABSPATH.'/wp-admin/admin.php');
global $wpdb;
include_once('./ckplayer/Mobile.php');
include_once('./ckplayer/Common/vids.php');
include_once('./ckplayer/Common/functions.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_GET["content"];?></title>
</head>

<body>
<div id="video" style="width:100%;height:100%;"><div id="a1"  style="width:100%;height:100%;position:absolute;"></div></div>
  <script type="text/javascript" src="ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
function Extension(str){
        var ext='';
        if(str){
                var file=str.toLowerCase();        
                var filearr=file.split('.');
                var exten=filearr[filearr.length-1];
                if(exten=='flv' || exten=='f4v' || exten=='mp4' || exten=='rmov'){
                        ext='video';        
                }
        }
        return ext;
}
var _f='';//定义调用视频的f值
var _a='';//同上，定义a值
var _s=0;//同上，定义s值

var _flv="<?php echo $_GET["url"];?>";
if(Extension(_flv)){//如果是普通视频的话
        _f=_flv;
        _s=0;
}
else{//如果不是的话就使用另一种调用方式
        _f='<?php echo get_option('siteurl') ?>/wp-content/plugins/ck-video/ck/ckplayer/video.php?url=[$pat]';
        _a=_flv;
        _s=2;
}
	//如果你不需要某项设置，可以直接删除，注意var flashvars的最后一个值后面不能有逗号
	var flashvars={
        f:_f,
        a:_a,
        s:_s,
		c:'0',//是否读取文本配置,0不是，1是
		x:'',//调用xml风格路径，为空的话将使用ckplayer.js的配置
		i:'',//初始图片地址
		d:'',//暂停时播放的广告，swf/图片,多个用竖线隔开，图片要加链接地址，没有的时候留空就行
		u:'',//暂停时如果是图片的话，加个链接地址
		l:'',//前置广告，swf/图片/视频，多个用竖线隔开，图片和视频要加链接地址
		r:'',//前置广告的链接地址，多个用竖线隔开，没有的留空
		t:'',//视频开始前播放swf/图片时的时间，多个用竖线隔开
		y:'',//这里是使用网址形式调用广告地址时使用，前提是要设置l的值为空
		z:'',//缓冲广告，只能放一个，swf格式
		e:'2',//视频结束后的动作，0是调用js函数，1是循环播放，2是暂停播放并且不调用广告，3是调用视频推荐列表的插件，4是清除视频流并调用js功能和1差不多，5是暂停播放并且调用暂停广告
		v:'80',//默认音量，0-100之间
		p:'<?php echo $_GET["auto"];?>',//视频默认0是暂停，1是播放
		h:'0',//播放http视频流时采用何种拖动方法，=0不使用任意拖动，=1是使用按关键帧，=2是按时间点，=3是自动判断按什么(如果视频格式是.mp4就按关键帧，.flv就按关键时间)，=4也是自动判断(只要包含字符mp4就按mp4来，只要包含字符flv就按flv来)
		q:'',//视频流拖动时参考函数，默认是start
		m:'0',//默认是否采用点击播放按钮后再加载视频，0不是，1是,设置成1时不要有前置广告
		o:'',//当m=1时，可以设置视频的时间，单位，秒
		w:'',//当m=1时，可以设置视频的总字节数
		g:'',//视频直接g秒开始播放
		j:'',//视频提前j秒结束
		k:'',//提示点时间，如 30|60鼠标经过进度栏30秒，60秒会提示n指定的相应的文字
		n:'',//提示点文字，跟k配合使用，如 提示点1|提示点2
		b:'1'
		//调用播放器的所有参数列表结束
		};
	  CKobject.embedSWF('ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','100%',flashvars);
	  /*CKobject.embedSWF(播放器路径,容器id,播放器id/name,播放器宽,播放器高,flashvars的值,其它定义也可省略);*/
		//调用ckplayer的flash播放器结束
	/*
	下面三行是调用html5播放器用到的
	var video='视频地址和类型';
	var support='支持的平台或浏览器内核名称';	
	*/
        var video=['<?php  $Mobileurl = getMobileurl($_GET["url"]); echo $Mobileurl?>'];
	var support=['iPad','iPhone','ios','android+false','msie10+false'];//默认的在ipad,iphone,ios设备中用html5播放,android,ie10上没有安装flash的也调用html5
	CKobject.embedHTML5('video','ckplayer_a1','100%','100%',video,flashvars,support);
	//如果不想使用html5播放器，只要把上面三行去掉就可以了
  </script>

</body>
</html>
