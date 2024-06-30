function myTest(myCity){// function(myEvt , myCity) 
    var tabContent;
    var tabLinks;
    tabContent=document.getElementsByClassName("tabcontent");
    for( var i = 0; i < tabContent.length; i++){
        tabContent[i].style.display="none";
    }
    tabLinks=document.getElementsByClassName("tablinks");
    for(var i =0 ; i < tabLinks.length ; i++){
        tabLinks[i].className=tabLinks[i].classList.toggle("active" , " ");

    }
    var myCityy=document.getElementById(myCity)
        myCityy.style.display="block";
        // myEvt.currentTarget.className+="active";
}
window.onload=function(){
    document.getElementById("one").style.display="block";
}