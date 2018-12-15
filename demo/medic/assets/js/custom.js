$(document).ready(function() {

$("a.fancyimage").fancybox(); 

$('.block').hover(function () {

  $(this).find('.img-block').hide();
  $(this).find('.img-block-h').show();
  $(this).find('.block-p').css('color','#fff');
},function(){
  $(this).find('.img-block-h').hide();
  $(this).find('.img-block').show();
  $(this).find('.block-p').css('color','#000000');

});

   

});