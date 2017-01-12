function validateForm() {
    
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
	

	
	
}