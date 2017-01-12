
$(document).ready(function () {
$("#leave_review").hide();
 });

function show_leave_review(){
			$("#leave_review").animate({"height": "toggle"}, { duration: 300 });
		}	
function close_review()
{
	$("#leave_review").hide();
}