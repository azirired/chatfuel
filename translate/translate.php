<?php

$text1=$_GET[text];
$lang=$_GET[lang];
$user=$_GET[id];

$jsondata=file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20180221T153827Z.9c86681bc1cd6fa3.342b83fa0f45353f7c9a31fd0e6993f24efe453d&text='. str_replace(" ", "%20", $text1).'&lang='.$lang.'');
$dataJ = json_decode($jsondata);
$abc= $dataJ->text[0];

echo '{
  "messages": [
    {
      "text":  "Translation :\n'.$abc.'",
      "quick_replies": [
        {
          "title":"Translate again",
          "block_names": ["translate"]
        },
        {
          "title":"Menu",
          "block_names": ["mainMenu More1"]
        },
        {
          "title":"Loved it!",
          "block_names": ["dmMe"]
        }
      ]
    }
  ]
}';

?>


