$("#form").submit(function(event){
	if($("#question")[0].value == ""){
		$("#question").css("border", "1px solid red");
		event.preventDefault();
	}
})

$("#question").keypress(function(event){
	$("#question").css("border", "");
})

