
$(document).ready(function(){
	$("#submit").click(function(){
		
		errors = new Array();
		
		if($("input:radio[name=sex]:checked").val() == null)
		{
			errors.push("A sex is required");
		}

		if($("input:radio[name=marital-status]:checked").val() == null)
		{
			errors.push("A Marital Status is required");
		}

		if($("input:radio[name=parent-status]:checked").val() == null)
		{
			errors.push("A Parent Status is required");
		}
		if($("#income").val() == "")
		{
			errors.push("An Income is required");
		}
		
		if($("input[name='race[]']:checked").val() == null)
		{
			errors.push("At least 1 race is required");
		}
		
		
		if(errors.length > 0)
		{
			alert(errors.join("\n"));
			return false;
		}
	});

});