
<?php
/*********************************************
 *  Description : Scan/read QR code using fb chatbot   
 *  API doc : http://goqr.me/api/doc/read-qr-code/
 *  Author : Aziri 
 *          @ m.me/mohdaziri
 *  Written: 22/2/2018
 *  Last updated:  15/04/2018
 * 
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
*********************************************/
//QR code scan by user
$data=$_GET[pic];

//get messenger id. QR code will be name by messenger id
$user=$_GET[id];

//create picture filename using user messenger id
$picFilename=$user.'.jpg';

//Get the file
$content = file_get_contents($data);

//Save QR picture to server. (if using $_GET[pic] json got error don't know why. So I save picture of QR to server)
$fp = fopen($picFilename, "w");
fwrite($fp, $content);
fclose($fp);

$fileurl='url_that_you_save_the_qrcode_image'; 

//QR API url
$url='http://api.qrserver.com/v1/read-qr-code/?fileurl='.$fileurl.'/'.$picFilename;

//Read QR code submitted by user. Use qrserver API
$jsondata=file_get_contents($url);

//read json from api
$dataJ = json_decode($jsondata);
$dataJ= $dataJ[0]->symbol[0]->data;

//send response json to chatfuel
echo '
{
  "messages": [ 
    {"text": "QR Code content : '.$dataJ.'"},
    {"text": "dev by Aziri"}
  ]
}';

//delete picture of QR code which is save to server
unlink($picFilename);
?>
