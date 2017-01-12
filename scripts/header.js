
$(document).ready(function(){
var usr = localStorage.usr;
if ( typeof(usr) !== "undefined" && usr !== null ){
document.getElementById("UserName").innerHTML="SignOut";
}
document.getElementById("UserName").onclick = function () {
 var text = document.getElementById("UserName").innerHTML;
if (text=="SignOut"){
	alert(text);
  localStorage.removeItem('usr');
window.open("http://localhost:8083/Project_newFormat","_top");
document.getElementById("UserName").innerHTML="Login";
 }

 else{
 	 alert('somethii');
 	window.open("http://localhost:8083/Project_newFormat/login.html","_top");
 }
    };


  });
