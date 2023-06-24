/*price range*/

$('#sl2').slider();

var RGBChange = function() {
  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
};	
	
/*scroll to top*/

$(document).ready(function(){
$(function () {
	$.scrollUp({
		scrollName: 'scrollUp', // Element ID
		scrollDistance: 300, // Distance from top/bottom before showing element (px)
		scrollFrom: 'top', // 'top' or 'bottom'
		scrollSpeed: 300, // Speed back to top (ms)
		easingType: 'linear', // Scroll to top easing (see http://easings.net/)
		animation: 'fade', // Fade, slide, none
		animationSpeed:1200, // Animation in speed (ms)
		scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
				//scrollTarget: false, // Set a custom target element for scrolling to the top
		scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
		scrollTitle: false, // Set a custom <a> title if required.
		scrollImg: false, // Set true to use image
		activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		zIndex: 2147483647 // Z-Index for the overlay
	});
});
});
let count = 0;
//if add to cart btn clicked
$('.add-to-cart').on('click', function (){
let cart = $('.cart');
// find the img of that card which button is clicked by user
let imgtodrag = $(this).parent('.productinfo').find("img").eq(0);
if (imgtodrag) {
// duplicate the img
var imgclone = imgtodrag.clone().offset({
  top: imgtodrag.offset().top,
  left: imgtodrag.offset().left
}).css({
  'opacity': '0.8',
  'position': 'absolute',
  'height': '150px',
  'width': '150px',
  'z-index': '100'
}).appendTo($('body')).animate({
  'top': cart.offset().top + 20,
  'left': cart.offset().left + 30,
  'width': 75,
  'height': 75
}, 1000, 'easeInOutExpo');

setTimeout(function(){
  count++;
  $(".cart .item-count").text(count);
}, 1500);

imgclone.animate({
  'width': 0,
  'height': 0
}, function(){
  $(this).detach()
});
}
});

