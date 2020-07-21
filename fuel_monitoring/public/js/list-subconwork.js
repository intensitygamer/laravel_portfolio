$("document").ready(function(){

	$("#scroll-bar-area").scroll(function(){

		$(".table-responsive").scrollLeft($("#scroll-bar-area").scrollLeft());

	});

// $(".table-responsive").scroll(function(){

// 		$("#scroll-bar-area").scrollLeft($(".table-responsive").scrollLeft());

// 	});


});