<center> <font size="3">Berikut Ini Adalah Beberapa Keyword Google Yang Paling Banyak Di Cari </font></br><hr>
<font size="1">Gunakan lah untuk membuat blog/seo mu lebih seo lagi</font></center>

<?php
function trends($url) {
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER,"https://www.google.com");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER ['HTTP_USER_AGENT']);
    $result=curl_exec($ch);
    return $result;
}
$url=trends('https://trends.google.com/trends/hottrends/atom/feed?pn=p19');
$trends=new SimpleXmlElement($url);
$data=$trends->channel->item;
for($j=0; $j<count($data); $j++) {
    if($data[$j]->title) {
        echo '<table class="table"><tr><td>';
        echo ucwords(strtolower($data[$j]->title)) ."</td></tr></table>";
    }
}

for($i=0; $i<count($data); $i++) {
    $des=explode(',', $data[$i]->description);
    for($k=0; $k<count($des); $k++) {
        if($des[$k]) {
            echo '<table class="table"><tr><td>';
            echo ucwords(strtolower($des[$k])) ."</td></tr></table>";
        }
    }
}

?>

