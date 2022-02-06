/**
 * @package 	WordPress
 * @subpackage 	Amigos
 * @version		1.0.4
 * 
 * Theme Scripts
 * Created by CMSMasters
 * 
 */


jQuery(document).ready(function() { 
	"use strict";

    /* Menu item custom colors */
    (function ($) {
        $('.menu-item > a[data-color]').each(function () {
            $(this).attr('style', $(this).data('color'));
        } );
    } )(jQuery);


	
	/* Header Top Hide Toggle */
	(function ($) { 
		$('.header_top_but').on('click', function () { 
			var headerTopBut = $(this), 
				headerTopButArrow = headerTopBut.find('> span'), 
				headerTopOuter = headerTopBut.parents('.header_top').find('.header_top_outer');
			
			if (headerTopBut.hasClass('opened')) {
				headerTopOuter.slideUp();
				
				headerTopButArrow.removeClass('cmsmasters_theme_icon_slide_top').addClass('cmsmasters_theme_icon_slide_bottom');
				
				headerTopBut.removeClass('opened').addClass('closed');
			} else if (headerTopBut.hasClass('closed')) {
				headerTopOuter.slideDown();
				
				headerTopButArrow.removeClass('cmsmasters_theme_icon_slide_bottom').addClass('cmsmasters_theme_icon_slide_top');
				
				headerTopBut.removeClass('closed').addClass('opened');
			}
		} );
	} )(jQuery);
	
	
	
	/* Header Style */
	(function ($) { 
		$(window).on('load', function () { 
			var active_event = $('#page');
			
			if (active_event.hasClass('enable_header_side')) {
				if ($(window).width() >= (1333 - 17)) {
					active_event.removeClass('cmsmasters_default_nav');
					
					active_event.addClass('cmsmasters_header_side');
				} else if (($(window).width() >= (1024 - 17)) && ($(window).width() < (1333 - 17))) {
					active_event.removeClass('cmsmasters_header_side');
					
					active_event.addClass('cmsmasters_default_nav');
				}
				
				$(window).on('debouncedresize', function () { 
					if ($(window).width() >= (1333 - 17)) {
						active_event.removeClass('cmsmasters_default_nav');
						
						active_event.addClass('cmsmasters_header_side');
					} else if (($(window).width() >= (1024 - 17)) && ($(window).width() < (1333 - 17))) {
						active_event.removeClass('cmsmasters_header_side');
						
						active_event.addClass('cmsmasters_default_nav');
					} else if ($(window).width() <(1024 - 17)) {
						active_event.removeClass('cmsmasters_header_side');
						
						active_event.removeClass('cmsmasters_default_nav');
					}
				});
			}
		});
	} )(jQuery);
	
	
	
	/* Header Search Form */
	(function ($) { 
		$('.cmsmasters_header_search_but').on('click', function () { 
			$('.cmsmasters_header_search_form').addClass('cmsmasters_show');
			
			$('.cmsmasters_header_search_form').find('input[type=search]').focus();
		} );
		
		
		$('.cmsmasters_header_search_form_close').on('click', function () { 
			$('.cmsmasters_header_search_form').removeClass('cmsmasters_show');
		} );
	} )(jQuery);
	
	
	
	/* Stats Run */
	(function ($) { 
		if ( 
			!checker.os.iphone && 
			!checker.os.ipod && 
			!checker.os.ipad && 
			!checker.os.blackberry && 
			!checker.os.android && 
			!checker.ua.ie9 
		) {
			$('.cmsmasters_counters').waypoint(function () { 
				var i = 1;
				
				
				$(this).find('.cmsmasters_counter').each(function () { 
					var el = $(this);
					
					
					setTimeout(function () { 
						el.easyPieChart( { 
							size : 			140, 
							lineWidth : 	0, 
							lineCap : 		'square', 
							animate : 		1500, 
							scaleColor : 	false, 
							trackColor : 	false, 
							barColor : 		'#ffffff', 
							onStep : function (from, to, val) { 
								$(this.el).find('.cmsmasters_counter_counter').text(~~val);
							} 
						} );
					}, 500 * i);
					
					
					i += 1;
				} );
			}, { 
				offset : 		'100%' 
			} );
		} else {
			$('.cmsmasters_counters').find('.cmsmasters_counter').easyPieChart( { 
				size : 			140, 
				lineWidth : 	0, 
				lineCap : 		'square', 
				animate : 		1500, 
				scaleColor : 	false, 
				trackColor : 	false, 
				barColor : 		'#ffffff', 
				onStep : function (from, to, val) { 
					$(this.el).find('.cmsmasters_counter_counter').text(~~val);
				} 
			} );
		}
	} )(jQuery);
	
	
	
	/* View Button */
	function cmsmastersView(postID) { 
	"use strict";
	
	var viewButton = jQuery('.cmsmastersView');
	
	if (viewButton.hasClass('no_active')) {
		var postID = viewButton.attr('id').replace(/cmsmastersView-/g, ''),
			data = { 
				action : 	'cmsmasters_ajax_view', 
				id : 		postID, 
				nonce : 	cmsmasters_script.nonce_ajax_view 
			};
		
		
		if (postID !== '') { 
				viewButton.find('> span').text('...');
				
				
				jQuery.post(cmsmasters_script.ajaxurl, data, function(response) {
					viewButton.find('> span').text(response);
					
					
					viewButton.removeClass('no_active');
					
					viewButton.addClass('active');
				} );
			}
		}
		
		
		return false;
	}
	
	cmsmastersView();
	
	
	
	/* Form Builder Animation */
	(function($) {
		var elems = $('textarea');
		
		
		elems.on('focus', function () { 
			var el = $(this);
			
			
			if (el.is(':not(.area_opened)')) {
				el.addClass('area_opened');
			} 
		} );
		
		
		elems.on('blur', function () { 
			var el = $(this);
			
			
			if (el.val().trim() === '') {
				el.val('');
				
				el.removeClass('area_opened');
			} 
		} );
	} )(jQuery);

	
	/* Input type checkbox & radio wrapper */
	(function ($) { 
		var form = $('#fbuilder'), 
			flength = form.length;
		
		if (flength > 0) {
			var timerId = setInterval(function () {
				form.each(function () { 
					var fields = $(this).find('> div > div').eq(1);
					
					
					if (fields.not(':empty')) {
						flength -= 1;
						
						
						if (flength <= 0) {
							clearTimeout(timerId);
							
							
							var checkbox = form.find('input:checkbox'), 
								radio = form.find('input:radio');
							
							
							checkbox.each(function () {
								$(this).after('<div class="field_before" />');
							} );
							
							
							
							radio.each(function () {
								$(this).after('<div class="field_before" />');
							} );
						}
					}
				} );
			}, 100);
		}
	} )(jQuery);
} );



/*!
 * Fixed Header Function
 */
!function(e){"use strict";e.fn.cmsmastersFixedHeaderScroll=function(o){var t={headerTop:".header_top",headerMid:".header_mid",headerBot:".header_bot",navBlock:"nav",navList:"#navigation",navTopList:"#top_line_nav",respNavButtonWrap:".resp_mid_nav_wrap",respNavButton:".responsive_nav",respTopNavButton:".responsive_top_nav",fixedClass:".fixed_header",fixedClassBlock:"#page",respHideBlocks:"",maxWidthMid:1024,maxWidthBot:1024,changeTopHeight:!0,changeMidHeight:!0,mobileDisabled:!0},i=this,a={};a={init:function(){a.options=a.o=e.extend({},t,o),a.el=i,a.vars=a.v={},a.v.newTopHeight=0,a.v.newMidHeight=0,a.setHeaderVars(),a.startHeader()},setHeaderVars:function(){a.v.headerMidString=a.o.headerMid,a.v.headerTop=a.el.find("> "+a.o.headerTop),a.v.headerMid=a.el.find("> "+a.v.headerMidString),a.v.headerBot=a.el.find("> "+a.o.headerBot),a.v.respNavButtonWrap=a.el.find(a.o.respNavButtonWrap),a.v.respNavButton=a.el.find(a.o.respNavButton),a.v.respTopNavButton=a.el.find(a.o.respTopNavButton),a.v.respHideBlocks=e(a.o.respHideBlocks),a.v.fixedClassBlock=e(a.o.fixedClassBlock),a.v.navListString=a.o.navList,a.v.navTopListString=a.o.navTopList,a.v.navBlockString=a.o.navBlock,a.v.navBlock=a.el.find(a.v.navListString).parents(a.v.navBlockString),a.v.navTopBlock=a.el.find(a.v.navTopListString).parents(a.v.navBlockString),a.v.midChangeHeightBlocks=e(a.v.headerMidString),a.v.midChangeHeightBlocksResp=e(a.v.headerMidString),a.v.topHeight=0,a.v.midHeight=a.v.headerMid.attr("data-height"),a.v.win=e(window),a.v.winScrollTop=a.v.win.scrollTop(),a.v.winMidScrollTop=a.v.winScrollTop-a.v.topHeight,a.v.isMobile="ontouchstart"in document.documentElement},startHeader:function(){a.v.headerTop.length>0&&(a.v.topHeight=a.v.headerTop.attr("data-height")),a.attachEvents(),a.v.win.trigger("scroll")},attachEvents:function(){a.v.respNavButton.bind("click",function(){return a.v.respNavButton.is(":not(.active)")?(a.v.respNavButtonWrap.addClass("active"),a.v.respNavButton.addClass("active")):(a.v.respNavButtonWrap.removeClass("active"),a.v.respNavButton.removeClass("active")),!1}),a.v.respTopNavButton.bind("click",function(){return a.v.respTopNavButton.is(":not(.active)")?(a.v.navTopBlock.css({display:"block"}),a.v.respHideBlocks.css({display:"none"}),a.v.respTopNavButton.addClass("active")):(a.v.navTopBlock.css({display:"none"}),a.v.respHideBlocks.css({display:"block"}),a.v.respTopNavButton.removeClass("active")),!1}),a.v.win.bind("scroll",function(){cmsmasters_media_width()>a.o.maxWidthMid&&(a.getScrollTop(),a.headerTransform())}),a.v.win.bind("resize",function(){a.v.headerBot.length>0?a.headerResize(a.o.maxWidthBot):a.headerResize(a.o.maxWidthMid)})},getScrollTop:function(){a.v.winScrollTop=a.v.win.scrollTop(),a.v.winMidScrollTop=a.v.winScrollTop-a.v.topHeight},headerTransform:function(){if(a.v.fixedClassBlock.hasClass('fixed_header')){a.v.winScrollTop<a.v.topHeight?(a.v.headerMid.removeClass("header_mid_scroll"),a.v.headerTop.removeClass("header_top_scroll"),a.v.newTopHeight=a.v.topHeight-a.v.winScrollTop,a.v.headerTop.css({overflow:"hidden",height:a.v.newTopHeight+"px"}),a.v.winScrollTop<=3&&a.v.headerTop.css({overflow:"inherit"}),a.v.midChangeHeightBlocks.css({height:a.v.midHeight+"px"})):(a.v.headerTop.css({overflow:"hidden",height:0}),a.v.winMidScrollTop<a.v.midHeight/3?(a.v.headerMid.removeClass("header_mid_scroll"),a.v.headerTop.removeClass("header_top_scroll"),a.v.newMidHeight=a.v.midHeight-a.v.winMidScrollTop):(a.v.headerMid.addClass("header_mid_scroll"),a.v.headerTop.addClass("header_top_scroll"),a.v.newMidHeight=a.v.midHeight/1.5),a.v.midChangeHeightBlocks.css({height:a.v.newMidHeight+"px"}))}},headerResize:function(e){cmsmasters_media_width()>e?(a.v.navBlock.removeAttr("style"),a.v.respHideBlocks.removeAttr("style"),a.v.respNavButtonWrap.removeClass("active"),a.v.respNavButton.removeClass("active"),a.getScrollTop(),a.headerTransform()):(a.v.headerTop.removeAttr("style"),(a.v.fixedClassBlock.hasClass('fixed_header')?a.v.midChangeHeightBlocksResp.css("height","auto"):''))}},a.init()}}(jQuery);



/*!
 * Responsive Navigation Function
 */
!function(s){"use strict";s.fn.cmsmastersResponsiveNav=function(n){var t={submenu:"ul.sub-menu, ul.children",respButton:".responsive_nav",startWidth:1024},e=this,i={};i={init:function(){i.o=s.extend({},t,n),i.el=e,i.v={},i.v.pLinkText="",i.v.subLinkToggle=void 0,i.setVars(),i.restartNav()},setVars:function(){i.v.submenu=i.el.find(i.o.submenu),i.v.subLink=i.v.submenu.closest("li").find("> a"),i.v.respButton=s(i.o.respButton),i.v.startWidth=i.o.startWidth,i.v.win=s(window),i.v.trigger=!1,i.v.counter=0,i.startEvent()},buildNav:function(){i.v.trigger=!0,i.v.counter=1,i.v.subLink.each(function(){""===s(this).text()&&(i.v.pLinkText=s(this).closest("ul").closest("li").find("> a").text(),s(this).addClass("cmsmasters_resp_nav_custom_text").html('<span class="nav_item_wrap"><span class="nav_title">'+i.v.counter+'. '+i.v.pLinkText+'</span></span>'),i.v.counter+=1),s(this).append('<span class="cmsmasters_resp_nav_toggle cmsmasters_theme_icon_resp_nav_slide_down"></span>')}),i.v.subLinkToggle=i.v.subLink.find("> span.cmsmasters_resp_nav_toggle"),i.v.submenu.hide(),i.attachEvents()},restartNav:function(){!i.v.trigger&&cmsmasters_media_width()<=i.v.startWidth?i.buildNav():i.v.trigger&&cmsmasters_media_width()>i.v.startWidth&&i.destroyNav()},resetNav:function(){i.v.subLinkToggle.removeClass("cmsmasters_theme_icon_resp_nav_slide_up").addClass("cmsmasters_theme_icon_resp_nav_slide_down"),i.v.submenu.hide()},destroyNav:function(){i.v.subLink.each(function(){s(this).hasClass("cmsmasters_resp_nav_custom_text")&&s(this).removeClass("cmsmasters_resp_nav_custom_text").text(""),s(this).find("span.cmsmasters_resp_nav_toggle").remove()}),i.v.submenu.css("display",""),i.v.trigger=!1,i.detachEvents()},startEvent:function(){i.v.win.on("resize",function(){i.restartNav()})},attachEvents:function(){i.v.subLinkToggle.on("click",function(){return s(this).hasClass("cmsmasters_theme_icon_resp_nav_slide_up")?(s(this).removeClass("cmsmasters_theme_icon_resp_nav_slide_up").addClass("cmsmasters_theme_icon_resp_nav_slide_down").closest("li").find("ul.sub-menu, ul.children").hide(),s(this).closest("li").find("span.cmsmasters_resp_nav_toggle").removeClass("cmsmasters_theme_icon_resp_nav_slide_up").addClass("cmsmasters_theme_icon_resp_nav_slide_down")):(s(this).removeClass("cmsmasters_theme_icon_resp_nav_slide_down").addClass("cmsmasters_theme_icon_resp_nav_slide_up"), s(this).closest("li").find("> ul.sub-menu, > ul.children").show(),s(this).closest("li").find("> div > ul.sub-menu, > div > ul.children").show()),!1}),i.v.respButton.on("click",function(){i.v.trigger&&s(this).hasClass("active")&&i.resetNav()})},detachEvents:function(){i.v.subLinkToggle.off("click")}},i.init()}}(jQuery);

