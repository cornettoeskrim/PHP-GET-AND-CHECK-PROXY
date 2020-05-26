<?php
error_reporting(0);
$url="https://www.proxy-list.download/api/v0/get?l=en&t=socks5";
 $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0");
    $headers = array(
        'Host: www.proxy-list.download',
        'Accept: text/html,application',
        'Cookie: __cfduid=d1f1786654a59c1e7a38ee3a7957afb161590399227; _ga=GA1.2.647044381.1590399227; _gid=GA1.2.1084580474.1590399228',
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result   = curl_exec($ch);
	$getshock = json_decode($result);
    $total      = $getshock[0]->TOTAL;
    for ($i = 0; $i <$total ; $i++){
	$getshock = json_decode($result);
	$ip      = $getshock[0]->LISTA[$i]->IP;
	$port      = $getshock[0]->LISTA[$i]->PORT;
	$count++;
    echo " \e[0;33m[$count]\e[0m";
	echo " $ip:$port\n";
    $fp = fopen("shock.txt", 'a');
        fwrite($fp, "$brand:$port\n");
        fclose($fp);
}

?>
