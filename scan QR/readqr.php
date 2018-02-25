<?php

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

//QR API url
$url='http://api.qrserver.com/v1/read-qr-code/?fileurl=http://replace_with_url_for_your_image/'.$picFilename';

//Read QR code submitted by user. Use qrserver API
$jsondata=file_get_contents($url);

//read json from api
$dataJ = json_decode($jsondata);
$dataJ= $dataJ[0]->symbol[0]->data;

//send response json to chatfuel
/*
echo '
{
  "messages": [ 
    {"text": "QR Code content : '.$dataJ.'"},
    {"text": "Take a QR code picture to scan again"}
  ]
}';
*/

echo '{
  "messages": [
    {
      "text":  "QR Code content : \n'.$dataJ.'",
      "quick_replies": [
        {
          "title":"Scan again",
          "block_names": ["readQR"]
        }
      ]
    }
  ]
}';


//delete picture of QR code which is save to server
unlink($picFilename);

?>
