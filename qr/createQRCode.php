<?php
/*********************************************
 *  API doc :http://goqr.me/api/doc/create-qr-code/
 *  Author : Aziri
 *  Written: 20/2/2018
 *  Last updated:  -
 *
 *  Description : Create a QR code using Chatfuel plugin json api 
 *  
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
*********************************************/

//Content submit by user to generate QR code
$data=$_GET[data];

//make a proper format
$data = URLencode($data);

//size of QR code max=1000x1000
$size = '150x150';

//sending QR code image to chatfuel
echo '
{
  "messages": [ 
    {
      "attachment": {
        "type": "image",
        "payload": {
          "url": "https://api.qrserver.com/v1/create-qr-code/?size='.$size.'&data='.$data.'"
        }
      }
    }
  ]
}';

?>
