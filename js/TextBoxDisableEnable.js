// JavaScript Document
function chMd()
 {
  // initialize form with empty field
  document.forms[0].sTextBox.disabled=false;
  document.forms[0].sTextBox.value="";

  for(var i=0;i<document.forms[0].elements.length;i++)
  {
    if(document.forms[0].elements[i].name=="dOption")
    {
     if(document.forms[0].elements[i].value=="N")
     {
       if(document.forms[0].elements[i].checked==true){

        document.forms[0].sTextBox.disabled=true;

        document.forms[0].sRadio[0].disabled=true;
        document.forms[0].sRadio[1].disabled=true;
        document.forms[0].sRadio[2].disabled=true;

       }
     }
     else if(document.forms[0].elements[i].value=="T")
     {
       if(document.forms[0].elements[i].checked==true){
        document.forms[0].sTextBox.disabled=false;

        document.forms[0].sRadio[0].disabled=true;
        document.forms[0].sRadio[1].disabled=true;
        document.forms[0].sRadio[2].disabled=true;
       }
     }
     else if(document.forms[0].elements[i].value=="R")
     {
       if(document.forms[0].elements[i].checked==true){
        document.forms[0].sTextBox.disabled=true;

        document.forms[0].sRadio[0].disabled=false;
        document.forms[0].sRadio[1].disabled=false;
        document.forms[0].sRadio[2].disabled=false;

       }
     }
    }
  }
 }
