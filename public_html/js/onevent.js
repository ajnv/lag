// JavaScript Document
//Author Name: Saptarang
//Author URI: http://www.saptarang.org
//Themeforest: http://themeforest.net/user/saptarang?ref=saptarang
//Creation Date: 22nd December, 2013
//Description: A default stylesheet for OnEvent - Special Event Landing Page Template Designed & Developed By Saptarang.


$(document).ready(function() {
	
	
	
	setTimeout (function() {$('#options').animate({left:'-180px'});}, 400);
	// switch
	$('span.dialog').click(function() {
		var optionsPos = $('#options').css("left");
		if(optionsPos == "0px") {
				$('#options').animate({ "left": "-180px" }, "fast" );
				$(this).find('h4').html('&raquo;').parent().css({'background':'#333'});
		} else {
				$('#options').animate({ "left": "0px" }, "fast" );
				$(this).find('h4').html('&laquo;').parent().css({'background':'#000'});
		}
	 });
	 
	$('#options .readyColors a').each(function(index) {
			var ownColor = $(this).text();
			$(this).css({'background-color':'#'+ownColor+''});
	});
	$('#options .backColors a').each(function(index) {
			var ownBgColor = $(this).text();
			$(this).css({'background-color':'#'+ownBgColor+''});
	});
	
	$('body').append('<input type="text" style="visibility:hidden; position:fixed; top:20px; right:20px;" id="siteColorBox">');
	$('body').append('<input type="text" style="visibility:hidden; position:fixed; top:20px; right:20px;" id="siteTexBox"><i id="hiddenhead" style="visibility:hidden; font-size:1px; position:absolute; left:-500px;"></i>');
	
	$('body').append('<input type="text" style="visibility:hidden; position:fixed; top:20px; right:20px;" id="siteBgColorBox">');
	$('body').append('<input type="text" style="visibility:hidden; position:fixed; top:20px; right:20px;" id="siteBgTexBox">');
	
	function DynamicCss() {
			
			var mainColor = $('#siteColorBox').val();
			var mainBgColor = $('#siteBgColorBox').val();
			$('#hiddenhead').attr('style', 'color:#'+mainColor+'; position:absolute; left:-550px; visibility:hidden;');
			var gethexcolor = $('#hiddenhead').css("color");
			var matchingColors = /rgb\((\d{1,3}), (\d{1,3}), (\d{1,3})\)/;
			var match = matchingColors.exec(gethexcolor);
			var transCustomColor = "rgba("+match[1] + ', ' + match[2] + ', ' + match[3]+", 0.9)";
			$('figcaption').css("background-color", transCustomColor);
						
			$('head style').append('h1,h2,h3,h4,h5,h6, .navigation ul li a, blockquote,.btnMain,.btnColor2,.btnColor3,.btnLte {font-family:"'+Heading_Font+'"; } html, body, div, p, table, tr, td, th, tbody, tfoot, ul, li, ol, dl, dd, dt, fieldset, cite, input, select, textarea, button, a, section, article, aside, header, footer, nav {font-family:"'+Site_Font+'"; }  body {background-color:#'+mainBgColor+';} .navbar-header, .btn, .schedule-box h6.section-head span, header.colored, .panel-heading a, .navigation nav ul li {background-color:#'+mainColor+'; }    a, #home li a:hover, .styled div, h3 span, .speaker .col-md-2 i, #directionsPanel .adp-summary, #schedule .nav-tabs li.active h5  {color:#'+mainColor+'} #schedule .nav-tabs li.active i, #schedule .nav-tabs li a:hover h5, .schedule-box li h6 strong {color:#'+mainColor+';}    div.section, #home {border-top:5px solid #'+mainColor+';  }  ::selection {background-color:#'+mainColor+'; color:#fff;} ::-moz-selection {background-color:#'+mainColor+'; color:#fff;} ');
			 
		}
	 
	$('.readyColors a').click( function(event) { 
			var getColor = $(this).text(); 
			$('#siteColorBox').val(getColor);  
			DynamicCss();  
			event.preventDefault();  
	});
	
	$('.backColors a').click( function(event) { 
			var getBgColor = $(this).text(); 
			$('#siteBgColorBox').val(getBgColor);  
			DynamicCss();  
			event.preventDefault();  
	});
	
	$('#customcolorsform').submit( function() { 
			var getCustColor = $('#customColor').val(); 
			$('#siteColorBox').val(getCustColor);  
			DynamicCss();  
			return false;
	});
	
	$('#custombackform').submit( function() { 
			var getCustColor = $('#customBackColor').val(); 
			$('#siteBgColorBox').val(getCustColor);  
			DynamicCss();  
			return false;
	});
	
	
	
	
	
	// Global Color
	$('head style').append('h1,h2,h3,h4,h5,h6, .navigation ul li a, blockquote,.btnMain,.btnColor2,.btnColor3,.btnLte {font-family:"'+Heading_Font+'"; } html, body, div, p, table, tr, td, th, tbody, tfoot, ul, li, ol, dl, dd, dt, fieldset, cite, input, select, textarea, button, a, section, article, aside, header, footer, nav {font-family:"'+Site_Font+'"; }  body {background-color:#'+page_background_color+';} .navbar-header, .btn, .schedule-box h6.section-head span, header.colored, .panel-heading a, .navigation nav ul li {background-color:#'+main_color+'; }  a, #home li a:hover, .styled div, h3 span, .speaker .col-md-2 i, #directionsPanel .adp-summary, #schedule .nav-tabs li.active h5  {color:#'+main_color+'} #schedule .nav-tabs li.active i, #schedule .nav-tabs li a:hover h5, .schedule-box li h6 strong {color:#'+main_color+';}    div.section, #home {border-top:5px solid #'+main_color+';  }  ::selection {background-color:#'+main_color+'; color:#fff;} ::-moz-selection {background-color:#'+main_color+'; color:#fff;} ');

	
	// Gallery Captions
	$(' #eg-thumbs > li ').each( function() { $(this).hoverdir(); } );
	
	var getcolor = $('.speaker i').css("color");
	var matchColors = /rgb\((\d{1,3}), (\d{1,3}), (\d{1,3})\)/;
	var match = matchColors.exec(getcolor);
	var transColor = "rgba("+match[1] + ', ' + match[2] + ', ' + match[3]+", 0.9)";
	$('figcaption').css("background-color", transColor);
	
	// Image Lightbox
	 $("a[rel^='prettyPhoto']").prettyPhoto({overlay_gallery: true});
	 $('.gallery a').append('<span class="link"><i class="fa fa-search-plus"></i></span>');
	 
	 // ULTables
		$('#schedule ul.li-blocks').each(function() {
				var cn = 2;
				var lis = $(this).find('li');
				for(var i = 0; i <= lis.length; i += cn) {
						lis.slice(i, i + cn).wrapAll("<ul class='li-row'></ul>");
				}	
		});
		
		$('#partners ul.li-blocks').each(function() {
				var cn = 4;
				var lis = $(this).find('li');
				for(var i = 0; i <= lis.length; i += cn) {
						lis.slice(i, i + cn).wrapAll("<ul class='li-row'></ul>");
				}	
		});
		
		// equal heights columns
		$('.container').each(function(){  
				var highestBox = 0;
				$('.column', this).each(function(){
					if($(this).height() > highestBox) 
					   highestBox = $(this).height(); 
				});  
				$('.column',this).height(highestBox);
    	});   
		
		// Top Arrow
		$(window).scroll(function() {
				if ($(window).scrollTop() > 1000) { 
					$('a.top').fadeIn('slow'); 
				} else { 
					$('a.top').fadeOut('slow');
				}
		}); 
		
		$('#register').hide();
		$('.register-trigger').click(function() {
				$('#register').slideToggle('fast');
				event.preventDefault();	
		});
		
	
	
	// Tooltip
	$('a.tips').tooltip();
	
	// responsive Video Target your .container, .wrapper, .post, etc.
    $(".container").fitVids();
	
	// Tabs Active
	$('#schedule .nav-tabs li').append('<span class="arrow"></span>');
	$('#schedule .nav-tabs li span.arrow').hide();
	
	// Counter
	
	
	
	
	
	
	
	
	
	
	
	var endDate = "May 7, 2014 08:03:25";
        $('.countdown.styled').countdown({
          date: endDate,
          render: function(data) {
			  var years = this.leadingZeros(data.years, 2);
			  if (years != '00') {
            $(this.el).html("<div><span>" + this.leadingZeros(data.years, 2) + " </span><strong>Años</strong></div><div><span>" + this.leadingZeros(data.days, 2) + " </span><strong>Días</strong></div><div><span>" + this.leadingZeros(data.hours, 2) + "  </span><strong>HRS</strong></div><div><span>" + this.leadingZeros(data.min, 2) + "</span><strong>MIN</strong></div><div><span>" + this.leadingZeros(data.sec, 2) + " </span><strong>SEG</strong></div>");
			  } else {
			  $(this.el).html("<div><span>" + this.leadingZeros(data.days, 3) + " </span><strong>DÍAS</strong></div><div><span>" + this.leadingZeros(data.hours, 2) + "  </span><strong>HRS</strong></div><div><span>" + this.leadingZeros(data.min, 2) + "</span><strong>MIN</strong></div><div><span>" + this.leadingZeros(data.sec, 2) + " </span><strong>SEG</strong></div>");
			  }
          }
        });
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Accordion Symbols
	$('.panel-heading a').click(function() {
			var thisParent = $(this).parent().next();
		if(thisParent.hasClass('in')) {
				$(this).parent().removeClass('active');
		} else {
				$('.panel-heading').removeClass('active');
				$(this).parent().addClass('active');
		}
	});
	
	//page Scroll
	$('nav a[href^=#], a.top[href^=#]').click(function(event) {
			event.preventDefault();
			$('html,body').animate({
            scrollTop: $(this.hash).offset().top - 80},
            1000);	
	});
	
	// Year Update
	var curYear = new Date().getFullYear();
	$('.year').html(curYear);
	
	// Subscription Form Validation
	$('#subscribeForm').submit(function() {
		if($('#emailSubscribe').val() != "") {
			var subEmail = $('#emailSubscribe').val();	
			 if(subEmail.indexOf('@') == -1 || subEmail.indexOf('.') == -1) {
				  $('#subscribeForm')
				  .append('<div class="alert alert-danger fade in">Please enter valid email address!</div>');
				  $('#subscribeForm').find('.alert').animate({ marginTop:'15px', opacity:'1'}, 300);
				  setTimeout(function() {
					  $('#subscribeForm').find('.alert').animate({ marginTop:'-10px', opacity:'0'}, 300);
				  }, 3000);
				  setTimeout(function() {
					  $('#subscribeForm').find('.alert').remove();
				  }, 3300);
			  } else {
				  $('#subscribeForm')
				  .append('<div class="alert alert-success fade in"><strong>Thank You!</strong> Your email address has been added in our list.</div>');
				 $('#subscribeForm').find('.alert').animate({ marginTop:'15px', opacity:'1'}, 300);
				  setTimeout(function() {
					  $('#subscribeForm').find('.alert').animate({ marginTop:'-10px', opacity:'0'}, 300);
				  }, 3000);
				  setTimeout(function() {
					  $('#subscribeForm').find('.alert').remove();
				  }, 3300);
			  }
		} else {
			  $('#subscribeForm')
			  .append('<div class="alert alert-danger">Please enter your email address!</div>');
			  $('#subscribeForm').find('.alert').animate({ marginTop:'15px', opacity:'1'}, 300);
				  setTimeout(function() {
					  $('#subscribeForm').find('.alert').animate({ marginTop:'-10px', opacity:'0'}, 300);
				  }, 3000);
				  setTimeout(function() {
					  $('#subscribeForm').find('.alert').remove();
				  }, 3300);
			
		}
		 return false;
	});	
	
	// Register Form
	   $('.loader').hide();
	   $("#register input, #register textarea").focus(function() {
		  $(this).prev("label").hide();
		  $(this).prev().prev("label").hide();	 		 	
	  });
	   
	  $("#register").submit(function() {
				// validate and process form here
				var name = $("#name").val();
					  if (name == "") {
					  $('#name').addClass('reqfld');
					  $('<span class="error" style="display:none; margin-top:0px; color:#cc0000"><i class="fa fa-exclamation-circle"></i></span>').insertBefore('#name').fadeIn(400);
					  $("#name").focus(function() {  $('#name').removeClass('reqfld');  $(this).prev().fadeOut(400);});
					  return false;
				} 
				  
				var phone = $("#phone").val();
					  if (phone == "") {
					  $('#phone').addClass('reqfld');
					  $('<span class="error" style="display:none; color:#cc0000"><i class="fa fa-exclamation-circle"></i></span>').insertBefore('#phone').fadeIn(400);
					  $("#phone").focus(function() {  $('#phone').removeClass('reqfld');  $(this).prev().fadeOut(400);});
					  return false;
				}
				
				var email = $("#email").val();
				if (email == "") {
					  $('#email').addClass('reqfld');
					  $('<span class="error" style="display:none; color:#cc0000"><i class="fa fa-exclamation-circle"></i></span>').insertBefore('#email').fadeIn(400);
					  $("#email").focus(function() {  $('#email').removeClass('reqfld');  $(this).prev().fadeOut(400);});
					  return false;
				 } else if(email.indexOf('@') == -1 || email.indexOf('.') == -1) {
					  $('#email').addClass('reqfld');
					  $('<span class="error" style="display:none;  color:#cc0000">Invalid!</span>').insertBefore('#email').fadeIn(400);
					  $("#email").focus(function() {  $('#email').removeClass('reqfld');  $(this).prev().fadeOut(400);});
					  return false;
				}
				
				var comment = $("#comment").val();
					  if (comment == "") {
					  $('#comment').addClass('reqfld');
					  $('<span class="error" style="display:none; color:#cc0000"><i class="fa fa-exclamation-circle"></i></span>').insertBefore('#comment').fadeIn(400);
					  $("#comment").focus(function() {  $('#comment').removeClass('reqfld');  $(this).prev().fadeOut(400);});
					  return false;
				}
				
				//$('#register').animate({opacity:'0.3'}, 500);
				
				var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&comment=' + comment;
				//alert (dataString);return false;
				$.ajax({
				  type: "POST",
				  url: "form/register.php",
				  data: dataString,
				  success: function() {
					$("#register").animate({opacity:'1'}, 500);
					$('.loader').hide();
					$("<div id='success' class='alert alert-success' style='border:#"+successBox_Border_Color+" 1px "+successBoxBorderStyle+"; background:#"+successBoxColor+";' ></div>").insertAfter('.field-wrapper');
					$('.field-wrapper').slideUp(300);
					$('#success').html("<h5 style='color:#"+textColor+";'>"+submitMessage+"</h5><p style='color:#"+textColor+";'>"+successParagraph+"</p>")
					.hide().delay(300)
					.fadeIn(1500);
					
					$('#register').delay(6000).slideUp('fast');
					
				  }
				});
				return false;
	  });
	  
	  
});
