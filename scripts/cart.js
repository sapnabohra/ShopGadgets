$(document).ready(function () {
  $(".cart").on("click", function() {
  	var id = $(this).attr('id');

  if(id.length===2)
  {
  	 id = id.charAt(1);
  }
  alert('new id is'+ id);

  	var prodID = '.id'+id;
  	var productID = $(prodID).val();

  	var proddesc = '.desc'+id;
  	var productdesc = $(proddesc).val();

  	var prodPrice = '.price'+id;
  	var productPrice = $(prodPrice).val();

  	var prodQty = '#qty'+id;
  	var productQty= $(prodQty).val();
  alert('productQty is'+ productQty);

var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cartHeader.php?productID='+productID+'&productQty='+productQty);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {

var dataReturn= xhr.responseText;
  countcart();
      }
    xhr.send(productQty);

  	  });

 function countcart() {

  	var id = $(this).attr('id');
  	var productQty = 2;

var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cartHeader.php?productQty='+productQty);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {

var dataReturn= xhr.responseText;
  var dataString = $(dataReturn).filter("p").text();
  alert(dataString);
  var dataJsonCon = jQuery.parseJSON(dataString);
  //dataJsonCon["msg"]
  var iContentBody = $("#headerIframe").contents().find("body");
  iContentBody.find(".cartPrice").text(dataJsonCon["msg"]);
  iContentBody.find(".countinCart").text(dataJsonCon["pricet"]);

      }
    xhr.send(productQty);

  	  }

//setInterval(function(){

//var dataReturn= xhr1.responseText;
 // alert(dataReturn);
//var dataString = $(dataReturn).filter("p").text();
  //alert(dataString);
//var dataJsonCon = jQuery.parseJSON(dataString);
//$(iContentBody.find(".countinCart")).load("cartHeader.php")
//},10000);

 });

