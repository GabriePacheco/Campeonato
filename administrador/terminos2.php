<script>
function instag(tag){
 var input = document.form1.contenido;
 if(typeof document.selection != 'undefined' && document.selection) {
  var str = document.selection.createRange().text;
  input.focus();
  var sel = document.selection.createRange();
  sel.text = "[" + tag + "]" + str + "[/" +tag+ "]";
  sel.select();
  return;
 }else if(typeof input.selectionStart != 'undefined'){
  var start = input.selectionStart;
  var end = input.selectionEnd;
  var insText = input.value.substring(start, end);
  input.value = input.value.substr(0, start) + '['+tag+']' + insText + '[/'+tag+']'+ input.value.substr(end);
  input.focus();
  input.setSelectionRange(start+2+tag.length+insText.length+3+tag.length,start+2+tag.length+insText.length+3+tag.length);
  return;
 }else{
  input.value+=' ['+tag+']Reemplace este texto[/'+tag+']';
  return;
 }
}
function inslink(){
 var input = document.form1.contenido;
 if(typeof document.selection != 'undefined' && document.selection) {
  var str = document.selection.createRange().text;
  input.focus();
  var my_link = prompt("Enter URL:","http://");
  if (my_link != null) {
   if(str.length==0){
   str=my_link;
   }
  var sel = document.selection.createRange();
  sel.text = "[a href=\"" + my_link + "\"]" + str + "[/a]";
  sel.select();
  }
  return;
 }else if(typeof input.selectionStart != 'undefined'){
  var start = input.selectionStart;
  var end = input.selectionEnd;
  var insText = input.value.substring(start, end);
  var my_link = prompt("Enter URL:","http://");
  if (my_link != null) {
   if(insText.length==0){
    insText=my_link;
   }
   input.value = input.value.substr(0, start) +"[a href=\"" + my_link +"\"]" + insText + "[/a]"+ input.value.substr(end);
   input.focus();
   input.setSelectionRange(start+11+my_link.length+insText.length+4,start+11+my_link.length+insText.length+4);
  }
  return;
 }else{
  var my_link = prompt("Ingresar URL:","http://");
  var my_text = prompt("Ingresar el texto del link:","");
  input.value+=" [a href=\"" + my_link + "\"]" + my_text + "[/a]";
  return;
 }
}
</script>

<form name="form1" method="post" action="">
<input type="button" name="Submit" value="B" onClick="instag('b')">
<input type="button" name="Submit3" value="U" onClick="instag('u')">
<input type="button" name="Submit4" value=" I " onClick="instag('i')">
<input type="button" name="Submit2" value="LINK" onClick="inslink()">
<br>
<textarea name="contenido" cols="40" rows="10" id="contenido"></textarea>