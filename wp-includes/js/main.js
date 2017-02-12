function add_leading_zero(num) {
	var result = (num < 10) ? '0' + num.toString() : num;
	
	return result;
}

function count_num(num, content, target, duration) {
	if(duration) {
		var count = 0;
		var speed = parseInt(duration / num);
		var interval = setInterval(function(){
			if(count - 1 < num) {
				target.html(count);
			}
			else {
				target.html(content);
				clearInterval(interval);
			}
			count++;
		}, speed);
	}
	else {
		target.html(content);
	}
}

function init_menu() {
	var timer = new Array();
	jQuery('.block_top_menu nav li').hover(
		function() {
			clearTimeout(timer[jQuery('.block_top_menu nav li').index(this)]);
			jQuery(this).addClass('hover').find('> ul').slideDown(200);
			
		},
		function() {
			var _this = this;
			timer[jQuery('.block_top_menu nav. li').index(this)] = setTimeout(function() {
				jQuery(_this).removeClass('hover').find('> ul').hide();
			}, 20);
		}
	);
	
	jQuery('.block_top_menu nav a').click(function(e) {
		if(isMobile) {
			var parent = jQuery(this).parent();
			if(((!parent.hasClass('expanded')) || jQuery(this).attr('href') == '#') && (parent.find('ul').length > 0)) {
				jQuery('.block_top_menu nav li').removeClass('expanded');
				jQuery(this).parent().toggleClass('expanded');
				e.preventDefault();
			}
		}
	});
	
	init_secondary_menu();
	build_responsive_menu();
}

function init_secondary_menu() {
	var timer = new Array();
	
	jQuery('.block_secondary_menu nav li').hover(
		function() {
			var tail = jQuery(this).find('.tail');
			var content = jQuery('.block_secondary_menu .dropdown[data-menu="' + jQuery(this).attr('data-content') + '"]');
			clearTimeout(timer[jQuery('.block_secondary_menu nav li').index(this)]);
			jQuery(this).addClass('hover');
			content.addClass('hover');
			/*content.fadeIn(200);
			tail.fadeIn(200);*/
		},
		function() {
			var _this = this;
			var tail = jQuery(this).find('.tail');
			var content = jQuery('.block_secondary_menu .dropdown[data-menu="' + jQuery(this).attr('data-content') + '"]');
			timer[jQuery('.block_secondary_menu nav. li').index(this)] = setTimeout(function() {
				jQuery(_this).removeClass('hover');
				content.removeClass('hover');
				/*content.hide();
				tail.hide();*/
			}, 20);
		}
	);
	
	jQuery('.block_secondary_menu .dropdown').hover(
		function() {
			var menu = jQuery(this).attr('data-menu');
			var tail = jQuery('.block_secondary_menu nav li[data-content=' + menu + '] .tail');
			var num = jQuery('.block_secondary_menu nav li').index(jQuery('.block_secondary_menu nav li[data-content=' + menu + ']'));
			clearTimeout(timer[num]);
			/*jQuery(this).show();
			tail.show();*/
			jQuery('.block_secondary_menu nav li[data-content=' + menu + ']').addClass('hover');
			jQuery(this).addClass('hover');
		},
		function() {
			var menu = jQuery(this).attr('data-menu');
			var tail = jQuery('.block_secondary_menu nav li[data-content=' + menu + '] .tail');
			var num = jQuery('.block_secondary_menu nav li').index(jQuery('.block_secondary_menu nav li[data-content=' + menu + ']'));
			var _this = this;
			timer[num] = setTimeout(function() {
				jQuery('.block_secondary_menu nav li[data-content=' + menu + ']').removeClass('hover');
				jQuery(_this).removeClass('hover');
				/*jQuery(_this).hide();
				tail.hide();*/
			}, 10);
		}
	);
	
	build_responsive_secondary_menu();
}

function build_responsive_menu() {
	jQuery('#header > .top > .inner').prepend('<div class="block_responsive_menu"><div class="button"><a href="#">Menu</a></div><div class="r_menu"></div></div>');
	
	var menu_content = jQuery('.block_top_menu nav > ul').clone();
	jQuery('#header .block_responsive_menu .r_menu').append(menu_content);
	
	jQuery('.block_responsive_menu .r_menu ul').each(function() {
		jQuery(this).find('> li:last').addClass('last_menu_item');
	});
	jQuery('.block_responsive_menu .r_menu li').each(function() {
		if(jQuery(this).find('> ul').length > 0) jQuery(this).addClass('has_children');
	});
	
	jQuery('.block_responsive_menu .button a').click(function(e) {
		jQuery('.block_responsive_menu > .r_menu').toggleClass('hover');
		
		e.preventDefault();
	});
	
	jQuery('.block_responsive_menu .r_menu .has_children > a').click(function(e) {
		if(!jQuery(this).parent().hasClass('expanded') || jQuery(this).attr('href') == '#') {
			jQuery('.block_responsive_menu .r_menu .expanded').removeClass('expanded');
			jQuery(this).parent().toggleClass('expanded');
			
			e.preventDefault();
		}
	});
}

function build_responsive_secondary_menu() {
	jQuery('#header > .bottom > .inner').prepend('<div class="block_secondary_menu_r"><div class="button"><a href="#">Category</a></div><div class="r_menu"></div></div>');
	
	var menu_content = jQuery('.block_secondary_menu nav > ul').clone();
	jQuery('#header .block_secondary_menu_r .r_menu').append(menu_content);
	
	jQuery('.block_secondary_menu_r .button a').click(function(e) {
		jQuery('.block_secondary_menu_r > .r_menu').slideToggle(300);
		
		e.preventDefault();
	});
}

function init_sticky_footer() {
	var page_height = jQuery('.wrapper').height();
	var window_height = jQuery(window).height();
	if(page_height <= window_height) {
		if(jQuery('body').hasClass('sticky_footer')) {
			jQuery('body').addClass('need');
			jQuery('#content').css('padding-bottom', jQuery('footer').outerHeight() + 'px');
		}
	}
	else {
		jQuery('body').removeClass('need');
		jQuery('#content').css('padding-bottom', '0px');
	}
}

function init_slider_1(target) {
	jQuery(target).flexslider({
		animation : 'fade',
		controlNav : false,
		directionNav : true,
		animationLoop : true,
		slideshow : true,
		animationSpeed : 500,
		useCSS : true,
		start : function(slider) {
			slider.slides.each(function(s) {
				jQuery(this).find('.animated_item').each(function(n) {
					var hide_animation = jQuery(this).attr('data-animation-hide');
					jQuery(this).addClass('animate_item' + n);
					if(s != slider.currentSlide) jQuery(this).addClass(hide_animation);
				});
			});
			slider.slides.eq(slider.currentSlide).find('.animated_item').each(function(n) {
				var show_animation = jQuery(this).attr('data-animation-show');
				jQuery(this).addClass(show_animation);
			});
		},
		before : function(slider) {
			slider.slides.eq(slider.currentSlide).find('.animated_item').each(function(n) {
				var show_animation = jQuery(this).attr('data-animation-show');
				var hide_animation = jQuery(this).attr('data-animation-hide');
				jQuery(this).addClass('animate_item');
				jQuery(this).removeClass(show_animation).addClass(hide_animation);
			});
		},
		after : function(slider) {
			slider.slides.find('.animated_item').removeClass('animate_item');
			
			slider.slides.eq(slider.currentSlide).find('.animated_item').each(function(n) {
				var show_animation = jQuery(this).attr('data-animation-show');
				var hide_animation = jQuery(this).attr('data-animation-hide');
				jQuery(this).removeClass(hide_animation).addClass(show_animation);
			});
		}
	});
}

function init_slider_2(target) {
	var flexslider;
	
	jQuery(target).flexslider({
		animation : 'slide',
		controlNav : false,
		directionNav : true,
		animationLoop : true,
		slideshow : false,
		animationSpeed : 500,
		useCSS : true,
		touch : false,
		start : function(slider) {
			flexslider = slider;
		}
	});
	
	jQuery(window).resize(function() {
		flexslider.flexAnimate(0);
	});
}

function init_slider_3(target) {
	var flexslider;
	
	function calc_width() {
		var content_width = jQuery('#content > .inner').width();
		var width = 192;
		if(content_width < 940) width = 236;
		if(content_width < 748) width = 420;
		if(content_width < 420) width = 300;
		return width;
	}
	
	function calc_margin() {
		var content_width = jQuery('#content > .inner').width();
		var width = 21;
		if(content_width < 940) width = 20;
		return width;
	}
	
	jQuery(target).flexslider({
		animation : 'slide',
		controlNav : false,
		directionNav : true,
		animationLoop : false,
		slideshow : false,
		itemWidth : calc_width(),
		itemMargin : calc_margin(),
		useCSS : true,
		touch : false,
		move : 1,
		start : function(slider) {
			flexslider = slider;
			jQuery(target + ' .slides > li').css({
				'width' : calc_width() + 'px',
				'margin-right' : calc_margin() + 'px'
			});
		}
	});
	
	jQuery(window).resize(function() {
		flexslider.flexAnimate(0);
		flexslider.vars.itemWidth = calc_width();
		flexslider.vars.itemMargin = calc_margin();
		jQuery(target + ' .slides > li').css({
			'width' : calc_width() + 'px',
			'margin-right' : calc_margin() + 'px'
		});
	});
}

function init_slider_4(target) {
	jQuery(target + ' .flexslider').flexslider({
		animation : 'slide',
		controlNav : true,
		directionNav : true,
		animationLoop : true,
		slideshow : false,
		useCSS : true,
		manualControls : target + ' .navigation li'
	});
}

function init_slider_5(target) {
	var total_slides = 0;
	var separator = ' of ';
	
	jQuery(target).flexslider({
		animation : 'slide',
		controlNav : false,
		directionNav : true,
		animationLoop : true,
		slideshow : false,
		animationSpeed : 500,
		useCSS : true,
		start : function(slider) {
			total_slides = slider.slides.length;
			jQuery('.flex-direction-nav li', slider).eq(0).after('<li class="nums">' + (slider.currentSlide + 1) + separator + total_slides + '</li>');
			
			slider.slides.find('.icon').live('click', function() {
				var block = jQuery(this).attr('data-target');
				jQuery(this).parent().find(block).show();
			});
		},
		after : function(slider) {
			jQuery('.flex-direction-nav li.nums', slider).html((slider.currentSlide + 1) + separator + total_slides);
		}
	});
}

function init_post_slider_1(target) {
	jQuery(target).flexslider({
		animation : 'fade',
		controlNav : true,
		directionNav : true,
		animationLoop : true,
		slideshow : false,
		useCSS : true
	});
}

function init_button_more() {
	jQuery('#button_load_more').bind('click', function(e) {
		var target = jQuery(this).attr('data-target');
		var container = jQuery(target);
		
		jQuery(this).addClass('loading'); //button loading state
		
		var content = jQuery('article' ,container).clone(); //instead of this do ajax request and get new elements, this line only for demo
		
		jQuery(target).isotope('insert', content);
		jQuery(this).removeClass('loading');
		
		//init_pretty_photo();
		e.preventDefault();
	});
}

function init_map(block, address, description, point) {
	var address_position;
	var latlng = new google.maps.LatLng(0, 0);
	var myOptions = {
		zoom: 16,
		center: latlng,
		scrollwheel: true,
		scaleControl: false,
		disableDefaultUI: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById(block), myOptions);
	var custom_map = new google.maps.Geocoder();
	custom_map.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			address_position = results[0].geometry.location;
			map.setCenter(address_position);
			var marker = new google.maps.Marker({
				map: map,
				icon: point,
				position: map.getCenter()
			});
			var contentString = description;
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
		}
		else {
			alert("Geocode was not successful for the following reason: " + status);
		}
	});
	
	jQuery(window).resize(function() {
		map.setCenter(address_position);
	});
}

function init_calendar(block, settings) {
	var wrapper = jQuery(block).parent();
	var today = new Date();
	var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
	var current_month = today.getMonth();
	
	jQuery(block).DatePicker({
		flat : true,
		date : date,
		calendars : 1,
		starts : 1,
		locale : settings
	});
	
	jQuery(block).find('.datepickerGoPrev a span').bind('click', function() {
		current_month--;
		if(current_month < 1) current_month = 12;
		wrapper.find('.prev_month').html(settings.months[current_month - 1]);
	});
	
	jQuery(block).find('.datepickerGoNext a span').bind('click', function() {
		current_month++;
		if(current_month > 12) current_month = 1;
		wrapper.find('.prev_month').html(settings.months[current_month - 1]);
	});
	
	wrapper.find('.prev_month').html(settings.months[current_month - 1]).bind('click', function(e) {
		current_month--;
		if(current_month < 1) current_month = 12;
		jQuery(this).html(settings.months[current_month - 1]);
		
		jQuery(block).find('.datepickerGoPrev a').trigger('click');
		
		e.preventDefault();
	});
}

function init_fields() {
	jQuery('.w_def_text').each(function() {
		var text = jQuery(this).attr('title');
		
		if(jQuery(this).val() == '') {
			jQuery(this).val(text);
		}
	});
	
	jQuery('.w_def_text').bind('click', function() {
		var text = jQuery(this).attr('title');
		
		if(jQuery(this).val() == text) {
			jQuery(this).val('');
		}
		
		jQuery(this).focus();
	});
	
	jQuery('.w_def_text').bind('blur', function() {
		var text = jQuery(this).attr('title');
		
		if(jQuery(this).val() == '') {
			jQuery(this).val(text);
		}
	});
	
	jQuery('.custom_select:not(.initialized)').each(function() {
		jQuery(this).css('opacity', '0').addClass('initialized');
		jQuery(this).parent().append('<span />');
		var text = jQuery(this).find('option:selected').html();
		jQuery(this).parent().find('span').html(text);
		
		jQuery(this).bind('change', function() {
			var text = jQuery(this).find('option:selected').html();
			jQuery(this).parent().find('span').html(text);
		});
	});
	
	jQuery('.w_focus_mark').bind('focus', function() {
		jQuery(this).parent().removeClass('errored').addClass('focused');
	});
	
	jQuery('.w_focus_mark').bind('blur', function() {
		jQuery(this).parent().removeClass('focused');
	});
}

function field_valid(container) {
	var valid = true;
	var r_email = /^[a-zA-z0-9_\-\.]+@[a-zA-Z0-9_\-]+\.[a-zA-Z]{2,}$/;
	
	jQuery('.w_validation', container).each(function() {
		var the_item = jQuery(this);
		var the_value = the_item.val();
		
		if(the_item.hasClass('required')) {
			if(the_value == '') {
				valid = false;
				the_item.parent().addClass('errored');
			}
		}
		
		if(the_item.hasClass('email')) {
			if(!r_email.test(the_value)) {
				valid = false;
				the_item.parent().addClass('errored');
			}
		}
	});
	
	return valid;
}

function init_pretty_photo() {
	
}

function init_message_boxes() {
	jQuery('.general_info_box .close').live('click', function(e) {
		jQuery(this).parent().fadeOut(300);
		
		e.preventDefault();
	});
}

function init_contact_form() {
	var form = jQuery('#contact_form');
	
	jQuery('.submit', form).bind('click', function(e) {
		var data_send = {}
		if(field_valid(form)) {
			jQuery('.to_send', form).each(function() {
				if(jQuery(this).val() != '') data_send[jQuery(this).attr('name')] = jQuery(this).val();
			});
			
			$.ajax({
				url : 'php/contact_form.php',
				type : 'post',
				data: data_send,
				success : function(msg) {
					alert('Success!');
					jQuery('input, textarea', form).val('');
				},
				error : function(req, mess) {
					alert(mess);
				}
			});
		}
		
		e.preventDefault();
	});
}

function init_blog_mobile() {
	var images = jQuery('.block_posts.type_sort .posts img');
	var total = images.length;
	var count = 0;
	jQuery('body').append('<div id="tmp" style="display:none;" />');
	
	function load_imgs() {
		jQuery('#tmp').load(images.eq(count).attr('src'), function() {
			count++;
			if(count < total) {
				load_imgs();
			}
			else {
				jQuery('.block_posts.type_sort .posts').isotope({
					itemSelector : 'article'
				});
				jQuery(window).resize(function() {
					jQuery('.block_posts.type_sort .posts').isotope('reLayout');
				});
				jQuery('#tmp').remove();
			}
		});
	}
	load_imgs();
}

function init_blog() {
	jQuery('.block_posts.type_sort .posts').isotope({
		itemSelector : 'article'
	});
	jQuery(window).resize(function() {
		jQuery('.block_posts.type_sort .posts').isotope('reLayout');
	});
}

function init_touch_hover() {
	jQuery('.hover').bind('click', function() {
		jQuery(this).parent().toggleClass('hovered');
	});
}

jQuery(document).ready(function() {
	init_menu();
	init_sticky_footer();
	init_fields();
	init_button_more();
	init_message_boxes();
	init_contact_form();
	
	if(isMobile) {
		jQuery('body').addClass('touch_device');
		init_blog_mobile();
	}
	else {
		jQuery('body').addClass('desktop_device');
	}
	/*
	jQuery('.w_tooltip').tooltip({
		position : 'bottom center',
		offset : [5, 0],
		effect : 'fade',
		tipClass : 'tooltip_1'
	});
	*/
	
	jQuery('audio').mediaelementplayer({
		audioWidth: '100%',
		audioHeight: 30,
		features: ['playpause', 'current', 'progress', 'duration', 'volume']
	});
	
	if(isMobile) {
		init_touch_hover();
		jQuery('.general_not_loaded').removeClass('general_not_loaded');
	}
});

jQuery(window).load(function() {
	if(!isMobile) {
		init_blog();
		jQuery('.general_not_loaded').removeClass('general_not_loaded');
	}
});


function submitComment(id) {
	flag = true;
	
	$('#validEmail').hide();
	$('#validName').hide();
	$('#validComment').hide();
	
	if(!validateEmail($('#email').val())) {
		$('#validEmail').show();
		flag = false;
	}
	
	if(!validateName($('#userName').val())) {
		$('#validName').show();
		flag = false;
	}
	
	if(!validateComment($('#comment').val())) {
		$('#validComment').show();
		flag = false;
	}
	
	if(flag) {
		
		try {
			$.ajax({ url: 'submitComment.php',
			 data: {
				 id: id,
				 name: $('#userName').val(),
				 email: $('#email').val(),
				 comment: $('#comment').val()
				 },
			 type: 'post',
			 complete: function(output) {
				if(output) {
					var monthNames = ["January", "February", "March", "April", "May", "June",
					  "July", "August", "September", "October", "November", "December"
					];

					var d = new Date();

					var date = monthNames[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
					var html = $('#postComments').html();
					var newComment = '<div class="comment" id="">';
					newComment += '<div class="inside">';
					newComment += '<div class="content">';
					newComment += '<div class="author">' + $('#userName').val() + '</div>';
					newComment += '<div class="info">' + date +'</div>';
					newComment += '<div class="text">';
					newComment += '<p>' + $('#comment').val() + '</p>';
					newComment += '</div>';
					newComment += '</div>';
					newComment += '<div class="clearboth"></div>';
					newComment += '</div>';
					newComment += '</div>';
					
					var allComments = $('#postComments').html();
					$('#postComments').html(newComment + allComments);
					document.getElementById('postComments').scrollIntoView();
					var num = parseInt($('#commentCount').html()) + 1;
					$('#commentCount').html(num);
					$('#email').val("");
					$('#userName').val("");
					$('#comment').val("");
				}
				else {
					alert("There was an issue submitting your comment.");
				}
			 }
			});
		}
		
		catch(e) {
			
			var monthNames = ["January", "February", "March", "April", "May", "June",
				  "July", "August", "September", "October", "November", "December"
				];

				var d = new Date();

				var date = monthNames[d.getMonth()] + " " + d.getDay() + ", " + d.getYear();
				var html = $('#postComments').html();
				var newComment = '<div class="comment" id="">';
				newComment += '<div class="inside">';
				newComment += '<div class="content">';
				newComment += '<div class="author">' + $('#userName').val() + '</div>';
				newComment += '<div class="info">' + date +'</div>';
				newComment += '<div class="text">';
				newComment += '<p>' + $('#comment').val() + '</p>';
				newComment += '</div>';
				newComment += '</div>';
				newComment += '<div class="clearboth"></div>';
				newComment += '</div>';
				newComment += '</div>';
				
				var allComments = $('#postComments').html();
				$('#postComments').html(newComment + allComments);
				
				document.getElementById('postComments').scrollIntoView();
				$('#email').val("");
				$('#userName').val("");
				$('#comment').val("");
				
		}
		
	}
	
}
	



function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function validateName(name) {
	var re = /^[a-zA-Z ]+$/;
	return re.test(name);
}

function validateComment(comment) {
	if(comment == "") return false;
	else return true;
}


function prevPage() {
	var page = window.currentPage - 1;
	window.currentPage -= 1;
	$("[name='post" + (page + 1) + "']").slideUp( "slow", function() {
		$( "[name='page']" ).removeClass("current");
		$("#paging" + page).addClass("current");
		$( "[name='post" + page + "']" ).slideDown( "slow", function() {});
		$( "[name='post" + page + "']" ).removeClass("hidden");
		
	});
	if(page == 1 && page == window.lastPage) {
			$("#prev").addClass("hidden");
			$("#next").addClass("hidden");
		}
		else if(page == 1) {
			$("#prev").addClass("hidden");
			$("#next").removeClass("hidden");
		}
		else if(page == window.lastPage) {
			$("#next").addClass("hidden");
			$("#prev").removeClass("hidden");
		}
		else {
			$("#prev").removeClass("hidden");
			$("#next").removeClass("hidden");
		}
	$("#pagingNums").html("Page " + page + " of " + window.lastPage);
}
function nextPage() {
	var page = window.currentPage + 1;
	window.currentPage += 1;
	$("[name='post" + (page - 1) + "']").slideUp( "slow", function() {
		$( "[name='page']" ).removeClass("current");
		$("#paging" + page).addClass("current");
		$( "[name='post" + page + "']" ).slideDown( "slow", function() {});
		$( "[name='post" + page + "']" ).removeClass("hidden");
	});
	if(page == 1 && page == window.lastPage) {
			$("#prev").addClass("hidden");
			$("#next").addClass("hidden");
		}
		else if(page == 1) {
			$("#prev").addClass("hidden");
			$("#next").removeClass("hidden");
		}
		else if(page == window.lastPage) {
			$("#next").addClass("hidden");
			$("#prev").removeClass("hidden");
		}
		else {
			$("#prev").removeClass("hidden");
			$("#next").removeClass("hidden");
		}
		$("#pagingNums").html("Page " + page + " of " + window.lastPage);
}
function changePage(num) {
	
	$("[name='post" + window.currentPage + "']").slideUp( "slow", function() {
		$( "[name='page']" ).removeClass("current");
		$("#paging" + num).addClass("current");
		$( "[name='post" + num + "']" ).slideDown( "slow", function() {});
		$( "[name='post" + num + "']" ).removeClass("hidden");
		window.currentPage = num;
	});
	if(num == 1 && num == window.lastPage) {
			$("#prev").addClass("hidden");
			$("#next").addClass("hidden");
		}
		else if(num == 1) {
			$("#prev").addClass("hidden");
			$("#next").removeClass("hidden");
		}
		else if(num == window.lastPage) {
			$("#next").addClass("hidden");
			$("#prev").removeClass("hidden");
		}
		else {
			$("#prev").removeClass("hidden");
			$("#next").removeClass("hidden");
		}
		$("#pagingNums").html("Page " + num + " of " + window.lastPage);
	
}