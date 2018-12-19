$(document).ready(function() {
	//E-mail Ajax Send
	$("#form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			$('.magina07').hide();$('.magina08').fadeIn();
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});
	$('.test-button').click(function(){$('#home').hide();$('.magina01').fadeIn();});
	$('.vopros1-button').click(function(){$('.magina01').hide();$('.magina02').fadeIn();});	    
	$('.vopros2-button').click(function(){$('.magina02').hide();$('.magina03').fadeIn();});	   
	$('.vopros3-button').click(function(){$('.magina03').hide();$('.magina04').fadeIn();});	      
	$('.vopros4-button').click(function(){$('.magina04').hide();$('.magina05').fadeIn();});	      
	$('.vopros5-button').click(function(){$('.magina05').hide();$('.magina06').fadeIn();});	 
	$('.vopros6-button').click(function(){$('.magina06').hide();$('.magina07').fadeIn();});	 

$('.viper-1-1').click(function(){ 
   $(".viper-1-1").attr("title", "10-20");
   $(".viper-1-2").attr("title", "-");
   $(".viper-1-3").attr("title", "-");
   $(".viper-1-4").attr("title", "-");
});
$('.viper-1-2').click(function(){ 
   $(".viper-1-1").attr("title", "-");
   $(".viper-1-3").attr("title", "-");
   $(".viper-1-4").attr("title", "-");
});

$('.viper-1-1,.viper-1-2,.viper-1-3,.viper-1-4').click(function(){ 
	$(this).css({'border':'solid 4px #fff'});
	$('.button-disable01').hide();$('.button-enable01').show();
});
$('.viper-2-1,.viper-2-2,.viper-2-3,.viper-2-4').click(function(){ 
	$(this).css({'border':'solid 4px #fff'});
	$('.button-disable02').hide();$('.button-enable02').show();
});
$('.viper-3-1,.viper-3-2,.viper-3-3,.viper-3-4').click(function(){ 
	$(this).css({'border':'solid 4px #fff'});
	$('.button-disable03').hide();$('.button-enable03').show();
});
$('.viper-4-1,.viper-4-2,.viper-4-3,.viper-4-4').click(function(){ 
	$(this).css({'border':'solid 4px #fff'});
	$('.button-disable04').hide();$('.button-enable04').show();
});
$('.viper-5-1,.viper-5-2,.viper-5-3,.viper-5-4').click(function(){ 
	$(this).css({'border':'solid 4px #fff'});
	$('.button-disable05').hide();$('.button-enable05').show();
});
$('.viper-6-1,.viper-6-2').click(function(){ 
	$(this).css({'border':'solid 4px #fff'});
	$('.button-disable06').hide();$('.button-enable06').show();
});


$('.button-enable01,.button-enable02,.button-enable03,.button-enable04,.button-enable05,.button-enable06').click(function(){ 
  $('.img-2-w').hide();$('.img-1-w').hide();$('.img-3-w').hide();$('.img-4-w').hide();
  $('.img-2').show();$('.img-1').show();$('.img-3').show();$('.img-4').show();
});

$('.quest01').click(function(){ 
	$('.quest02,.quest03,.quest04').css({'border':'solid 1px #C4FFDD'});
  $('.img-1').hide();$('.img-2-w').hide();$('.img-3-w').hide();$('.img-4-w').hide();
  $('.img-1-w').show();$('.img-2').show();$('.img-3').show();$('.img-4').show();
});
$('.quest02').click(function(){ 
	$('.quest01,.quest03,.quest04').css({'border':'solid 1px #C4FFDD'});
  $('.img-2').hide();$('.img-1-w').hide();$('.img-3-w').hide();$('.img-4-w').hide();
  $('.img-2-w').show();$('.img-1').show();$('.img-3').show();$('.img-4').show();
});
$('.quest03').click(function(){ 
	$('.quest02,.quest01,.quest04').css({'border':'solid 1px #C4FFDD'});
  $('.img-3').hide();$('.img-2-w').hide();$('.img-1-w').hide();$('.img-4-w').hide();
  $('.img-3-w').show();$('.img-2').show();$('.img-1').show();$('.img-4').show();
});
$('.quest04').click(function(){ 
	$('.quest02,.quest03,.quest01').css({'border':'solid 1px #C4FFDD'});
  $('.img-4').hide();$('.img-1-w').hide();$('.img-3-w').hide();$('.img-2-w').hide();
  $('.img-4-w').show();$('.img-1').show();$('.img-3').show();$('.img-2').show();
});


});

