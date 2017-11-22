        
           $( "#Brief1" ).load( "/komoecontainer/comoeandfoldertree/komoeEng/Texts/text1.txt" );
           $( "#Brief2" ).load( "/komoecontainer/comoeandfoldertree/komoeEng/Texts/text2.txt" );
           $( "#Brief3" ).load( "/komoecontainer/comoeandfoldertree/komoeEng/Texts/text3.txt" );
           $( "#Brief4" ).load( "/komoecontainer/comoeandfoldertree/komoeEng/Texts/text4.txt" );
       
   
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}

 