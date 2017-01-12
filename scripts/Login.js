  $(document).ready(function(){

 $(".cancel").on("click", function(e) {
var urlRedirection = localStorage.urlRedirection ;
  if (typeof(urlRedirection) !== "undefined" && urlRedirection !== null)
  {
  localStorage.removeItem('urlRedirection');
  window.open(urlRedirection,"_top");
  }
  else {  window.location = "http://localhost:8083/Project_newFormat"; }
  
 });


//Display registration form
$("#registerf2").on("click", function() {
var $loginContainer = $(".container1");  
  $loginContainer.css("display", "none");

  var $registerContainer = $(".container");  
  $registerContainer.css("display", "block");
  });

  //Submition of Form1 :
  $("#submitf1").on("click", function() {
  if (document.forms["myForm"]["fname"].value == null || document.forms["myForm"]["fname"].value == "") {
  errfname.setAttribute("style","visibility:visible");
  document.forms["myForm"]["fname"].focus();
  return false;
  } else{errfname.setAttribute("style","visibility:hidden");} 

  if (document.forms["myForm"]["lname"].value == null || document.forms["myForm"]["lname"].value == "") {
  errlname.setAttribute("style","visibility:visible");
  document.forms["myForm"]["lname"].focus();
  return false;
  }else{errlname.setAttribute("style","visibility:hidden");} 


  if (document.forms["myForm"]["email"].value == null || document.forms["myForm"]["email"].value == "") {
  erremail.setAttribute("style","visibility:visible");
  document.forms["myForm"]["email"].focus();
  return false;
  }else{erremail.setAttribute("style","visibility:hidden");} 

  if (document.forms["myForm"]["Conpassword"].value !== document.forms["myForm"]["password"].value ) {
  errpass.setAttribute("style","visibility:visible");
  document.forms["myForm"]["Conpassword"].focus();
  return false;
  }else{errpass.setAttribute("style","visibility:hidden");} 

  var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;
  var add = document.forms["myForm"]["email"].value;
  if(reg.test(add)== false){
  alert("Email: Invalid email, Please enter a valid email ");
  document.forms["myForm"]["email"].focus();
  return false;
  }
  //get values for new note
  var userName = $("#email").val();
  console.log("userName is" + userName);
  var passWord = $("#password").val();  
  //create new note

  $.ajax({
    url:'checkPwd.php',
method:'post',
data:{username:username},
success:function(data)
{
alert("Sucess");
  var usrName= userName.substr(0, userName.indexOf('@')); 
  localStorage.setItem('usr', usrName);
  var urlRedirection = localStorage.urlRedirection ;
  if (typeof(urlRedirection) !== "undefined" && urlRedirection !== null)
  {
  localStorage.removeItem('urlRedirection');
  window.open(urlRedirection,"_top");
  }
  else {  window.location = "http://localhost:8083/Project_newFormat"; }
}
  // console.log("server post response returned..." + response.toSource());
 // if (!response.length)
 // {
 // var $errorDiv = $("#erremailPwd1");  
 // $errorDiv.css("display", "block");
  //}   
  })
  });  

  //Submition of Form2
  $("#submitf2").on("click", function() {
  if (document.forms["myForm1"]["email1"].value == null || document.forms["myForm1"]["email1"].value == "") {
  erremail1.setAttribute("style","visibility:visible");
  document.forms["myForm1"]["email1"].focus();
  return false;
  }else{erremail1.setAttribute("style","visibility:hidden");} 
  var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;
  var add = document.forms["myForm1"]["email1"].value;
  if(reg.test(add)== false){
  erremailFormat.setAttribute("style","visibility:visible");
  document.forms["myForm1"]["email1"].focus();
  return false;
  }
  var userName = $("#email1").val();
  var passWord = $("#password1").val();
var json = {
        "email": userName,
        "password": passWord
    };
    var data = JSON.stringify(json);


var xhr = new XMLHttpRequest();
    xhr.open('POST', 'checkPwd.php?email='+userName+'&passWord='+passWord);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {

var dataReturn= xhr.responseText;
var dataString = $(dataReturn).filter("p").text();
  alert(dataString);
var dataJsonCon = jQuery.parseJSON(dataString);
//alert(dataReturn);

if(dataJsonCon["msg"] === "true"){

   var usrName= userName.substr(0, userName.indexOf('@')); 
  localStorage.usr=usrName;
  var urlRedirection = localStorage.urlRedirection ;
  if (typeof(urlRedirection) !== "undefined" && urlRedirection !== null)
  {
  localStorage.removeItem('urlRedirection');
  window.open(urlRedirection,"_top");
  }
  else {  window.location = "http://localhost:8083/Project_newFormat"; }
}
else
{
   var $errorDiv = $("#erremailPwd"); 
  $errorDiv.css("display", "block");
}

      }
    xhr.send(passWord);


  });

  });
