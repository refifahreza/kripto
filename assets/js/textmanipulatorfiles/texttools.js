var changedPlainText=[];var changedEncryptText=[];function setData(id,text){$('#'+id).val(text);$('#'+id).change();}
function dataGetText(id,which){var text=$('#'+id).val();if(text.length>0){if(which==1){changedEncryptText.push(text);}else{changedPlainText.push(text);}}
return text;}
function dataRemoveSpaces(id,which){var text=dataGetText(id,which);text=text.replace(/\s+/g,'');setData(id,text);}
function dataLettersOnly(id,which){var text=dataGetText(id,which);var alphabeticCodes='A-Za-zÃƒÂ¥ÃƒÂ¤ÃƒÂ¶ÃƒÂ¼ÃƒÂ±Ãƒâ€¦Ãƒâ€žÃƒâ€“ÃƒÅ“Ãƒâ€˜';var regex=new RegExp('[^'+alphabeticCodes+']+','g');text=text.replace(regex,'');setData(id,text);}
function dataNumbersOnly(id,which){var text=dataGetText(id,which);text=text.replace(/\D/g,'');setData(id,text);}
function dataReverseText(id,which){var text=dataGetText(id,which);text=text.split('').reverse().join('');setData(id,text);}
function dataReverseWords(id,which){var text=dataGetText(id,which);text=text.replace(/\n/g," {{newline}} ").split(" ").reverse().join(" ").replace(/ {{newline}} /g,"\n");setData(id,text);}
function dataUpperCase(id,which){var text=dataGetText(id,which);text=text.toUpperCase();setData(id,text);}
function dataLowerCase(id,which){var text=dataGetText(id,which);text=text.toLowerCase();setData(id,text);}
function splitGroups(id,which){var text=dataGetText(id,which);text=text.replace(/\s+/g,'');if(which==1){var group=$('#groupsize1').val();}else{var group=$('#groupsize').val();}
group=group.replace(/\D/g,'');if(!group)
group=5;var newText='';for(var i=0;i<text.length;i++){if(i>0&&(i%group)==0)
newText+=' ';newText+=text[i];}
setData(id,newText);}
function replaceAll(id,which,from,to){var text=dataGetText(id,which);var find=$('#'+from).val();var replace=$('#'+to).val();if(text&&find){text=text.replace(new RegExp(escapeRegExp(find),'g'),replace);setData(id,text);}}
function escapeRegExp(string){return string.replace(/([.*+?^=!:${}()|\[\]\/\\])/g,"\\$1");}
function putBack(id,which){if(which==1){if(changedEncryptText.length>0){var text=changedEncryptText.pop();setData(id,text);}}else{if(changedPlainText.length>0){var text=changedPlainText.pop();setData(id,text);}}}
function clearData(id,which){var text=dataGetText(id,which);$('#'+id).val('');}
function copyData(id){var copyElement=$('#'+id);copyElement.select();document.execCommand("copy");}
function pasteData(id,which,func){if(navigator.clipboard!=undefined&&navigator.clipboard.readText!=null){navigator.clipboard.readText().then(function(text){dataGetText(id,which);$('#'+id).val(text);if(func)func();}).catch(function(){alert('Failed to read from clipboard. Access denied.');});}}
const atoz='ABCDEFGHIJKLMNOPQRSTUVWXYZ';const atoz0to9='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';if(customid){document.querySelector('#'+customid).addEventListener('change',function(){document.querySelector('#alphakeyword'+customidnum).value=this.value.toUpperCase();customAlphabet(customid,customidnum,customaz09);});}
if(customid1){document.querySelector('#'+customid1).addEventListener('change',function(){document.querySelector('#alphakeyword'+customidnum1).value=this.value.toUpperCase();customAlphabet(customid1,customidnum1,customaz09_1);});}
function customAlphabet(id,idnum,az09){var alpha=atoz;if(az09)
alpha=atoz0to9;$('#keywordresult'+idnum).html("Result: "+alpha);var keyword=$('#alphakeyword'+idnum).val();var lastinstance=$('#lastinstance'+idnum).prop('checked');var reversekeyword=$('#reversekeyword'+idnum).prop('checked');var reversealphabet=$('#reversealphabet'+idnum).prop('checked');var reverseentirealphabet=$('#reverseentirealphabet'+idnum).prop('checked');var keywordonright=$('#keywordonright'+idnum).prop('checked');var generaterandom=$('#generaterandom'+idnum).prop('checked');var result="";if(lastinstance){keyword=reverseString(keyword);keyword=createAlphabet(keyword,keyword,az09);keyword=reverseString(keyword);}
if(reversekeyword){keyword=reverseString(keyword);}
if(reversealphabet){alpha=reverseString(alpha);}
if(keywordonright){keyword=createAlphabet(keyword,keyword,az09);keyword=reverseString(keyword);alpha=reverseString(alpha);}
result=createAlphabet(keyword,alpha,az09);if(keywordonright){result=reverseString(result);}
if(generaterandom){result=generateRandomAlphabet(result);}
if(reverseentirealphabet){result=reverseString(result);}
if(ignorechar){result=removeLetter(idnum,result);}
$('#'+id).val(result);$('#keywordresult'+idnum).html("Result: "+result);}
$('#translatefrom').change(function(){if(customid){customAlphabet(customid,customidnum,customaz09);}
if(customid1){customAlphabet(customid1,customidnum1,customaz09_1);}});function clearAlphabet(id,idnum,az09){$('#'+id).val('');$('#alphakeyword'+idnum).val('');$('.keymakercheckbox'+idnum).prop('checked',false);if(az09)
$('#keywordresult'+idnum).html("Result: "+atoz0to9);else
$('#keywordresult'+idnum).html("Result: "+atoz);}
function copyAlphabet(id){var copyElement=$('#'+id);copyElement.select();document.execCommand("copy");}
function pasteAlphabet(id,idnum,az09){if(navigator.clipboard!=undefined&&navigator.clipboard.readText!=null){navigator.clipboard.readText().then(function(text){$('#alphakeyword'+idnum).val(text);customAlphabet(id,idnum,az09);}).catch(function(){alert('Failed to read from clipboard. Access denied.');});}}
function removeLetter(idnum,result){var removeletter=$('#translatefrom').val();result=result.replace(removeletter,"");return result;}
function reverseString(string){string=string.split('').reverse().join('');return string;}
function generateRandomAlphabet(string){var chars=string.split("");var randomAlpha="";lim=chars.length;for(i=0;i<lim;i++){index=Math.floor(chars.length*Math.random());randomAlpha+=chars[index];chars.splice(index,1);}
return randomAlpha;}
function createAlphabet(key,alphabet,az09){var newAlphabet="";if(typeof(alphabet)!='string'){if(az09){alphabet=atoz0to9;}else{alphabet=atoz;}}else{alphabet=alphabet.toUpperCase();}
if(typeof(key)!='string')
return alphabet;key=key.toUpperCase()+alphabet;for(var i=0;i<key.length;i++){if(newAlphabet.indexOf(key.charAt(i))<0&&alphabet.indexOf(key.charAt(i))>=0){newAlphabet+=key.charAt(i);}}
return newAlphabet;}
const alphabet_letters={'A':1,'B':2,'C':3,'D':4,'E':5,'F':6,'G':7,'H':8,'I':9,'J':10,'K':11,'L':12,'M':13,'N':14,'O':15,'P':16,'Q':17,'R':18,'S':19,'T':20,'U':21,'V':22,'W':23,'X':24,'Y':25,'Z':26};const alphabet_numbers={1:'A',2:'B',3:'C',4:'D',5:'E',6:'F',7:'G',8:'H',9:'I',10:'J',11:'K',12:'L',13:'M',14:'N',15:'O',16:'P',17:'Q',18:'R',19:'S',20:'T',21:'U',22:'V',23:'W',24:'X',25:'Y',26:'Z'};