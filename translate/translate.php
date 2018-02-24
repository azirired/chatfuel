<?php

$text=$_GET[text];
$lang=$_GET[lang];
$key='put_your_yandex_translate_key_here';

//API url
$url='https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$key.'&text='. str_replace(" ", "%20", $text).'&lang='.$lang.'');

$jsondata=file_get_contents($url);
$dataJ = json_decode($jsondata);
$translateWord= $dataJ->text[0];

echo '{
  "messages": [
    {
      "text":  "Translation :\n'.$translateWord.'",
      "quick_replies": [
        {
          "title":"Translate again",
          "block_names": ["translate"]
        },
        {
          "title":"Menu",
          "block_names": ["menu"]
        }
      ]
    }
  ]
}';

?>


