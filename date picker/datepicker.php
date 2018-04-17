<?php
/*********************************************
 *  Description : Date picker for fb chatbot   
 *  Author : Aziri 
 *          @ m.me/mohdaziri
 *  Written: 18/4/2018
 *  Last updated:  -
 * 
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
*********************************************/

    (int)$currentpage = (!empty($_GET["currentpage"]))?$_GET["currentpage"]:0;
    (int)$nextpage = $currentpage + 1;
    (int)$prevpage = $currentpage - 1;
   
    $url= "url_of_this_php_file"; //url for datepicker.php
    $urloutput = "url_to_show_the_date_selection"; //url for showtext.php
    
    //show date using quick reply
    echo '{
      "messages": [
        {
          "text":  "Please select date?",
          "quick_replies": [';
          
    echo '{ "title":"<<", "url": "'.$url.'?currentpage='.$prevpage.'", "type":"json_plugin_url" },';
    
    $ts = date(strtotime('last sunday'));
    $ts += $currentpage * 86400 * 7;
    $daysOfWeek = date('w' , $ts);
    $offset = $daysOfWeek;

    $ts = $ts - $offset * 86400;
    for ($x=0 ; $x<7 ; $x++,$ts += 86400) {
        
        echo    '{
                  "title":"'. date("m-d-Y", $ts) .'",
                  "url": "'.$urloutput.'?tkh='. date("m-d-Y", $ts) .'",
                  "type":"json_plugin_url"
                }';
                if ($counter < 7) {
                    echo ",";
                }  
    }
	
	echo '{ "title":">>", "url": "'.$url.'?currentpage='.$nextpage.'", "type":"json_plugin_url" }';

    //close quick reply
        echo '        
                  ]
                }
              ]
            }';
    
?>
    
