let rating = $(".rating");
rating.each(function(){
	let score = $(this).attr("data-rate");
	$(this).find(`.fa-star:lt(${score})`).css({
		color:"#ffae1f"
	})
})
