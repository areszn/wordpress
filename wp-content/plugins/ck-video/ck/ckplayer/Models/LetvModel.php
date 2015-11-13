<?php
function getvideo($id,$pid=2){
	$hz='_letv';
	$pidarrs[] = '350';
	$pidarrs[] = '1000';
	$pidarrs[] = '720p';
	$stime = 'http://api.letv.com/time?tn=0.' . time();
	$str = get_curl_contents($stime);
	$t = preg_match('|{"stime":(\d+)}|', $str , $matchs) ? $matchs[1] : false;
	$content = get_curl_contents('http://api.letv.com/mms/out/video/play?id=' .$id. '&platid=1&splatid=101&domain=http://www.letv.com&tkey=' . getKey($t),0,0,1);
	$data = preg_match('~<playurl><!\[cdata\[(.*)\]\]></playurl>~iUs', $content , $matchs) ? $matchs[1] : false;
	$json=json_decode($data);
	$pido = '';
	if(strpos($data,'"720p"'))$pido = '3';
	if(!$pido){if(strpos($data,'"1000"'))$pido = '2';}
	if(!$pido)$pido = '1';
	switch($pido){
		case '1':
			$qvars=__BQ__.'_'.$id.$hz;
			break;
		case '2':
			$qvars=__BQ__.'_'.$id.$hz.'|'.__GQ__.'_'.$id.$hz;
			break;
		case '3':
			$qvars=__BQ__.'_'.$id.$hz.'|'.__GQ__.'_'.$id.$hz.'|'.__CQ__.'_'.$id.$hz;
			break;
		default:
			$qvars=$id.$hz;
			break;
	}
	$pid=min($pid,$pido);
	$dispatch=$json->dispatch->$pidarrs{$pid-1};
	$urllist['urls'][0]['url'] = str_replace( 'tss=ios', 'tss=no', $dispatch[0] );
	$urllist['vars']='{h->1}{a->'.$qvars.'}{f->'.__HOSTURL__.'?url=[$pat'.($pid-1).']}';
	return $urllist;
}
function getKey($t){
        for($a, $i = 0; $i < 8; $i++){
                $a = 1 & $t;
                $t >>= 1; 
                $a <<= 31; 
                $t += $a;
        }
        return $t^185025305;
}
?>