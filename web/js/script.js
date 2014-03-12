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
})(jQuery);


