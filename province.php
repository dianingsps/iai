<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id", //besok tinggal ganti
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
	"key: cb0c29845ae578b7910a79de31136565
  "
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;  //masih dalam xml
  //print_r(json_decode($response)); //decode menjadi json
$response = json_decode($response);
// echo $response->rajaongkir->status->code; //buat ambil data biasa (code)
$province =$response->rajaongkir->results; //menyimpan array
foreach ($province as $p) { //perulangan
	echo $p->province_id." ".$p->province."<br/>";
}
}