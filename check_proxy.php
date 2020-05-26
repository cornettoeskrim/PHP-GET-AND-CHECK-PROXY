<?php
$g          = file_get_contents($argv[1]);
$f          = explode("\r\n", $g);
$f          = array_unique($f);
$count      = 0;
$hitung     = count($f);
foreach ($f as $data) {
    $pecah = explode(":", $data);
    $cc    = $pecah[0];
    $cv    = $pecah[1];

$ch = curl_init('http://api.proxyipchecker.com/pchk.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,'ip='.$cc.'&port='.$cv);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
list($res_time, $speed, $country, $type) = explode(';', curl_exec($ch));
curl_close($ch);
    $count++;
    echo " \e[0;33m[$count/$hitung]\e[0m";
if ($res_time == 0){
   echo " $cc:$cv ->\e[0;36m RESPONSE:[$res_time/s] COUNTRY:[$country]\e[0m Anomonity : $type\e[1;31m => DEAD\e[0m\n";
}else{
    echo " $cc:$cv ->\e[0;36m RESPONSE:[$res_time/s] COUNTRY:[$country]\e[0m Anomonity : $type\e[1;32m => LIVE\e[0m\n";
        $fp = fopen("live_shocks.txt", 'a');
        fwrite($fp, "$data\n");
        fclose($fp);

}
}
?>

