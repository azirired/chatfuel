<?php
/*********************************************
 *  API doc :https://translate.yandex.com/developers
 *  Author : Aziri 
 *          @ m.me/mohdaziri
 *  Written: 24/2/2018
 *  Last updated:  15/04/2018
 *
 *  Description : Translate word to selected language  
 *  
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
*********************************************/
//chatfuel JSON API plugin : user attribute {{text}}
$text=$_GET[text];

//language to translate : user attribute {{lang}}
$lang=$_GET[lang];
$lang=strtolower($lang); //make sure language code in lowercase

//get API key from Yandex website
$key='put_your_yandex_translate_key_here';

//API url
$url='https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$key.'&text='. str_replace(" ", "%20", $text).'&lang='.$lang.'');

$jsondata=file_get_contents($url);
$dataJ = json_decode($jsondata);
$translateWord= $dataJ->text[0];

//output
echo '{
 "messages": [
   {"text": "Translation :\n'.$translateWord.'"},
   {"text": "dev by Aziri"}
 ]
}';


?>


