1. Create block and Add New Text card.
2. Copy & paste laguage code to text card
  Language Code
    de : German 
    el : Greek 
    en : English 
    es : Spanish 
    fr : French 
    id : Indonesian
    it : Italian 
    ja : Japanese 
    ko : Korean 
    mn : Mongolian 
    ms : Malay 
    ru : Russian 
    tr : Turkish 
    ur : Urdu 
    vi : Vietnamese 
    zh : Chinese
3. Add new User Input card. Create 2 fields
    1st field : 
     Message to user = Type code language
     save answer to attribute = {{lang}}
     
    2nd field : 
     Message to user = Word to translate
     save answer to attribute = {{text}}
4. Add JSON API card
     Type : GET
     URL : http://your_server_url/translate.php?lang={{lang}}&text={{text}}
