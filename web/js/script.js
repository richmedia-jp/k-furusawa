// angular.module('myApp', ['mgcrea.ngStrap']);
(function($){
	$(document).foundation({
		orbit: {
			animation: 'slide',
			slide_number: false,
			bullets: false,
			timer: false
		}
	});
	$(".ranking__items:not(a)").on("click", function(){
		//return false;
	});

	$(".salon-form").on("submit", function(){
		console.log($(".salon-form input").val());
		location.href = '/salon/search/'+$(".salon-form input").val();
		return false;
	});
})(jQuery);


