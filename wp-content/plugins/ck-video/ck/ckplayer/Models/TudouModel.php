<?php
function getvideo($id, $pid = 2)
{
    $hz = '_tudou';
    $pidarrs[] = '2';
    $pidarrs[] = '3';
    $pidarrs[] = '4';
    $content = get_curl_contents((('http://www.tudou.com/outplay/goto/getItemSegs.action?iid=' . $id) . '&r=') . time());
    $json = json_decode($content, 1);
    $wd = $json[4];
    $pido = '3';
    if (!$wd) {
        $wd = $json[3];
        $pido = '2';
    }
    if (!$wd) {
        $wd = $json[2];
        $pido = '1';
    }
    switch ($pido) {
    case '1':
        $qvars = ((__BQ__ . '_') . $id) . $hz;
        break;
    case '2':
        $qvars = (((((((__BQ__ . '_') . $id) . $hz) . '|') . __GQ__) . '_') . $id) . $hz;
        break;
    case '3':
        $qvars = ((((((((((((__BQ__ . '_') . $id) . $hz) . '|') . __GQ__) . '_') . $id) . $hz) . '|') . __CQ__) . '_') . $id) . $hz;
        break;
    default:
        $qvars = $id . $hz;
        break;
    }
    $pid = min($pid, $pido);
    $wd = $json[$pid + 1];
    foreach ($wd as $k => $v) {
        $urllist['urls'][$k]['url'] = k2url($v['k']);
        $urllist['urls'][$k]['size'] = $v['size'];
        $urllist['urls'][$k]['sec'] = $v['seconds'] / 1000;
    }
    $urllist['vars'] = ((((('{h->3}{a->' . $qvars) . '}{f->') . __HOSTURL__) . '?url=[$pat') . ($pid - 1)) . ']}';
    return $urllist;
}
function k2url($k)
{
    $content = get_curl_contents((('http://v2.tudou.com/f?sj=1&sid=10000&hd=2&id=' . $k) . '&rand=') . time());
    preg_match('~>(http[s]{0,1}://.*)<~iUs', $content, $vurl);
    strpos($vurl[1], '&amp;') and $url = strtr($vurl[1], array('&amp;' => '&'));
    return $url;
}