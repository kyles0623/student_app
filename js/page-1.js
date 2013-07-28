$(document).ready(function(){
	//Validation
	$("#submit").click(function(){
		errors = new Array();

		if($("#first_name").val() == "")
			errors.push("First Name is required");
		if($("#last_name").val() == "")
			errors.push("Last Name is required");
		if($("#phone").val() == "")
			errors.push("Phone Number is required");
		if($("#address").val() == "")
			errors.push("Address is required");
		if($("#city").val() == "")
			errors.push("City is required");
		if($("#state").val() == "")
			errors.push("State is required");
		if($("#zip").val() == "")
			errors.push("Zip Code is required");



		if(errors.length > 0)
		{
			alert(errors.join('\n'));
			return false;
		}
	});

});