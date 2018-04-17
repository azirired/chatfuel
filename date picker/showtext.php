<?php
/*********************************************
 *  Description : Show an output from date picker selection for fb chatbot   
 *  Author : Aziri 
 *          @ m.me/mohdaziri
 *  Written: 18/4/2018
 *  Last updated:  -
 * 
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
*********************************************/
//display result to chatbot
echo '{
 "messages": [
   {"text": "You choose : '.$_GET[tkh].'"},
   {"text": "dev by Aziri"}
 ]
}';


?>
