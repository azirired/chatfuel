<?php
/*********************************************
 *  Description : Detect language from chat bot and Translate reply message to detected language using Yandex Translate API   
 *  API doc : https://tech.yandex.com/translate/doc/dg/reference/detect-docpage/
              https://tech.yandex.com/translate/doc/dg/reference/translate-docpage/
 *  Author : Aziri 
 *          @ m.me/mohdaziri
 *  Written: 19/5/2018
 *  Last updated:  -
 * 
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
*********************************************/

//Yandex translation API key 
$key='PUT_API_HERE';


//get the language from user input. Attribute {{userInput}}
$userInput=$_GET['text'];

//API URL
$urllang='https://translate.yandex.net/api/v1.5/tr.json/detect?key='.$key.'&text='.str_replace(" ", "%20", $userInput);

//get JSON content
$jsonlang=file_get_contents($urllang);
$jlang=json_decode($jsonlang);
$lang=$jlang->lang;

// end get the language from user input. Attribute {{userInput}}

//text to reply to user
$text='Hi, How are you today? My name is Boopy Bot. How can I help you?';

//translate bot text to customer language
$url='https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$key.'&text='. str_replace(" ", "%20", $text).'&lang='.$lang;

//get JSON content
$jsondata=file_get_contents($url);
$dataJ = json_decode($jsondata);
$abc= $dataJ->text[0];

//send to chatbox 
echo '{
 "messages": [
   {"text": "Language ='.$lang.' \n\nTranslation :\n'.$abc.'"},
   {"text": "dev by Aziri"}
 ]
}';

?>
