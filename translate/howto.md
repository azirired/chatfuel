1. Create block and Add New Text card.<br>
2. Copy & paste language code to text card<br>
  Language Code<br>
    de : German <br>
    el : Greek <br>
    en : English <br>
    es : Spanish <br>
    fr : French <br>
    id : Indonesian<br>
    it : Italian <br>
    ja : Japanese <br>
    ko : Korean <br>
    mn : Mongolian <br>
    ms : Malay <br>
    ru : Russian <br>
    tr : Turkish <br>
    ur : Urdu <br>
    vi : Vietnamese <br>
    zh : Chinese<br>
3. Add new User Input card. Create 2 fields<br>
    1st field : <br>
     Message to user = Type code language<br>
     save answer to attribute = {{lang}}<br>
     <br>
    2nd field : <br>
     Message to user = Word to translate<br>
     save answer to attribute = {{text}}<br>
4. Add JSON API card<br>
     Type : GET<br>
     URL : http://your_server_url/translate.php?lang={{lang}}&text={{text}}<br>
