// JavaScript Document

$(document).ready(function(){
	"use strict";
	$("#submit-btn").click(function(){
		var errors=0;
		//holds the element values
		var eValue;
		//hold string where it will be passed to the JQuery
		var dataString='';
		
		//Elements is being hold on Elements Hidden input
		//loop through to get values and validate the input
		//pass it to the controller for submission (Email)
		//or display an error message to the user.
		var formElements=$("#elements").val().split(',');
		//loop through the form elements
		formElements.forEach(function(e){
			//check if Radio then capture the value
			if ($('#'+e).is(":radio"))
			{
				if ($('input[name='+e+']:checked').length===0 && $("#"+e).hasClass('required'))
				{
					$("#"+e).focus();
					$("#"+e+"-error").html("This field is required");
					errors++;
					
				}
				else
				{
				eValue=$('input[name='+e+']:checked').val();
				}

			}
			//check if checkbox then capture the value
			else if ($('#'+e).is(":checkbox"))
			{
				//holds checbox data
				//loop through the checkbox values and store as one string (,)
				var i=1;
				var checboxvalue='';
				$('input[name='+e+']:checked').each(function () {
					checboxvalue += $(this).val();
					
					//make sure last element with no "-"
					if ($('input[name='+e+']:checked').length!==i)
					{
						checboxvalue +='-';
					}
					i++;

				});
				if ($('input[name='+e+']:checked').length===0 && $("#"+e).hasClass('required'))
				{
					$("#"+e).focus();
					$("#"+e+"-error").html("This field is required");
					errors++;
					
				}
				else
				{
					eValue=checboxvalue;
				}
			}
			//normal field get the value using .val()
			else
			{
				eValue=$("#"+e).val();
			}
			
			//check if the element is marked as required and value is empty
			if (eValue==='' && $("#"+e).hasClass('required'))
			{
				
				//display error above the element and focus
				$("#"+e).focus();
				$("#"+e+"-error").html("This field is required");
				errors++;
				
			}
			else if ($("#"+e).hasClass('numbersonly') && validateNumbersOnly($("#"+e).val())===false)
			{
				$("#"+e).focus();
				$("#"+e+"-error").html("This field required numbers only");
				errors++;
			}
			else
			{
				//ensure to remove the error message when the value is not null
				$("#"+e+"-error").html("");
				//pass the data to the AJAX submission and display the output	
				
				dataString+=e+"="+eValue+"&";
				
				
			}

		});
		//process the submission if no errors
		if (errors===0)
		{
			//add mailer elements to send an email
			var mailto=$("#mailto").val();
			var mailfrom=$("#mailfrom").val();
			var mailsubject=$("#mailsubject").val();
			//add form token to secure the POST data
			var formToken=$("#formtoken").val();
			dataString+="mailto="+mailto+"&mailfrom="+mailfrom+"&mailsubject="+mailsubject+"&formtoken="+formToken;
			$.ajax({
				type: 'post',
				url: "Controllers/formprocess.php",
				data: dataString,
				cache: false,
				success: function(result){
				$("#message").html(result);
				$(window).scrollTop($('#message').offset().top);
			}
			});
		}
		
		
	});
	function validateNumbersOnly(elementValue)
	{

		return $.isNumeric(elementValue);
		
	}
});