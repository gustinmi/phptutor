function sayHI() {
 alert("Hi from JavaScript");
}

validateLogin(){
	$('input#txtName').on( "focusout", function(){
		if ($(this).val()===''){
			$(this).css('border','1px solid red');
		}
	});	
	$('input#txtName').on( "focus", function(){
		$(this).css('border','1px solid gray');
	});
	$('input#txtPassword').on( "focusout", function(){
		if ($(this).val()===''){
			$(this).css('border','1px solid red');
		}

	});	
	$('input#txtPassword').on( "focus", function(){
		$(this).css('border','1px solid gray');
	});
}