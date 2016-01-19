<?php
$ip = "50.22.62.66";
$ip = "1.192.94.203";
$ip ="80.101.29.83";
$ip ="119.81.2.166";
include("geoip.inc.php");
$gi = geoip_open("GeoIP.dat",GEOIP_STANDARD);
$country_code = geoip_country_code_by_addr($gi,$ip);
$country_name = geoip_country_name_by_addr($gi, $ip);
geoip_close($gi);

$jsonEcho = array();
$jsonEcho["error"] = 0;
$jsonEcho["country_code"] = $country_code;
$jsonEcho["country_name"] = $country_name;


function jsonp($object, $callback = 'callback') {
		if (!empty($_GET[$callback])) {
			header('Content-Type: application/x-javascript');
		} else {
						header('Content-Type: application/json');
		}
		return $_GET[$callback].'('.json_encode($object).')';
}


echo jsonp($jsonEcho);

?>