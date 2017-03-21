// Hero Image Load
function imgOp(){
	if($(window).width() > 1024){
		$('.img-op').each(function(index, el) {
			var heroImg = $(this).attr('img-full');
			$(this).css('background-image','url('+heroImg+')');
			$(this).removeClass('img-op');
		});
	}else if($(window).width() <= 1024){
		$('.img-op').each(function(index, el) {
			var heroImg = $(this).attr('img-large');
			$(this).css('background-image','url('+heroImg+')');
			$(this).removeClass('img-op');
		});
	}
}

// Skip To
function skipTo(){
	if($('.skip').length && $('.skip-to').length){
		if($(window).width() > 880){
			$('.skip').click(function(event) {
				event.preventDefault();
				$('html, body').animate({
				    scrollTop: $(".skip-to").offset().top
				}, 1000);
			});
		}else{
			$('.skip').click(function(event) {
				event.preventDefault();
				$('html, body').animate({
				    scrollTop: $(".skip-to").offset().top
				}, 1000);
			});
		}
	}
}

// Header Scroll
function headerScroll(){
	if($(window).scrollTop() > 155 && $('.header.sm').length == 0){
		$('.header').addClass('sm');
	}else if($(window).scrollTop() <= 155 && $('.header.sm').length == 1){
		$('.header.sm').removeClass('sm');
	}
}

//Conservation Init
function conservationInit(){
	if($('.page-conservation').length){
		$('.conserv-menu li').click(function(event) {
			event.preventDefault();
			$('.conserv-menu li.active').removeClass('active');
			$('.conserv-info.active').removeClass('active');
			$('.gallery-images.active').removeClass('active');
			$('.conserv-loader').addClass('active');
			$(this).addClass('active');

			var data_title = $('.conserv-menu li.active').attr('data-title');

			$('.gallery h2 span').html(data_title);
			$('.gallery-images').html('');
			$('.gallery-info[data-title="'+data_title+'"] .gallery-info-img').each(function(index, el) {
				var data_img_url = $(this).attr('img-full');
				var data_elements = '<div class="gallery-image-outer"><div class="gallery-background"><div class="gallery-image-inner bg cover center img-op lb-item lb-img" lb-url="'+data_img_url+'" data-index="'+(index+1)+'" style="background-image: url(&quot;'+data_img_url+'&quot;);"></div></div></div>';
				$('.gallery-images').append(data_elements);
			});

			setTimeout(function(){
				$('.conserv-loader').removeClass('active');
				$('.conserv-info[data-title="'+data_title+'"]').addClass('active');
				$('.gallery-images').addClass('active');
				lbInit();
			},250)
		});
	}
}


//Contact Init
function contactInit(){
	if($('.page-contact').length){
		$('.form-swap .form-select').click(function(event) {
			event.preventDefault();
			$('.form-select.active').removeClass('active');
			$('.form-rows.up').removeClass('up');
			var hold_this = $(this);
			setTimeout(function(){
				$('.form-rows.active').removeClass('active');
				$('.loader').addClass('active');
				hold_this.addClass('active');
				setTimeout(function(){
					$('.loader.active').removeClass('active');
					$('.form-rows[data-title="'+hold_this.attr("data-title")+'"]').addClass('active');
					setTimeout(function(){
						$('.form-rows.active').addClass('up');
					},50);
				}, 250);
			},250);
		});
	}
}


//EPD init
function epdInit(){
	$('.epd').click(function(event) {
		event.preventDefault();
	});	
}


//Downloads init
function downloadsInit(){
	if($('.page-downloads').length){
		if($(window).width() > 1024){
			var downloads_width = $('.downloads .col-md-12').width();
			$('.downloads .col-md-12 .flex').width((downloads_width/3)*$('.entry').length);
		}


		$('.arrows .right').click(function(event) {
			event.preventDefault();
			if(animateOn == false){
				animateOn = true;
				var parent_section = $(this).closest('section');
				parent_section.find('.entry.lazy-load').each(function(index, el) {
					$(this).find('.bg').attr('style', ''+$(this).find('.bg').attr('data-url')+'');
					$(this).removeClass('lazy-load');
				});
				parent_section.find('.arrows .left.off').removeClass('off');
				var translate_x = parent_section.find('.flex').attr('translate');
				translate_x = parseInt(translate_x) - parseInt(parent_section.find('.entry').width()) - parseInt(30);
				parent_section.find('.flex').attr('translate', translate_x);
				parent_section.find('.flex').css('transform', 'translateX('+translate_x+'px)');

				setTimeout(function(){
					parent_section.find('.entry.active').first().removeClass('active')
					parent_section.find('.entry.active').last().next().addClass('active');
					if(parent_section.find('.entry').last().hasClass('active')){
						parent_section.find('.arrows .right').addClass('off');
					}
					animateOn = false;
				},500);
			}else{
				return;
			}
		});


		$('.arrows .left').click(function(event) {
			event.preventDefault();
			if(animateOn == false){
				animateOn = true;
				var parent_section = $(this).closest('section');
				parent_section.find('.arrows .right.off').removeClass('off');
				var translate_x = parent_section.find('.flex').attr('translate');
				translate_x = parseInt(translate_x) + parseInt(parent_section.find('.entry').width()) + parseInt(30);
				parent_section.find('.flex').attr('translate', translate_x);
				parent_section.find('.flex').css('transform', 'translateX('+translate_x+'px)');

				setTimeout(function(){
					parent_section.find('.entry.active').first().prev().addClass('active')
					parent_section.find('.entry.active').last().removeClass('active');
					if(parent_section.find('.entry').first().hasClass('active')){
						parent_section.find('.arrows .left').addClass('off');
					}
					animateOn = false;
				},500);
			}else{
				return;
			}
		});




		$('.view-all a').click(function(event) {
			event.preventDefault();
			if(!$(this).hasClass('close-btn')){
				$(this).addClass('close-btn fill');

				var parent_section = $(this).closest('section');
				parent_section.addClass('all-open');
				parent_section.find('.arrows').addClass('hide');
				parent_section.find('.arrows .left').addClass('off');
				parent_section.find('.arrows .right').removeClass('off');

				parent_section.find('.flex').css('transform','translateX(0px)');
				parent_section.find('.flex').attr('translate', '0');
				parent_section.find('.flex').width('100%');

				parent_section.find('.entry').removeClass('active');
				parent_section.find('.entry').each(function(index, el) {
					if(index < 3){
						$(this).addClass('active');
					}
				});

				if(parent_section.find('.entry.lazy-load').length){
					parent_section.find('.entry.lazy-load').each(function(index, el) {
						$(this).find('.bg').attr('style', ''+$(this).find('.bg').attr('data-url')+'');
						$(this).removeClass('lazy-load');
					});
				}

			}else{
				var parent_section = $(this).closest('section');
				$(this).removeClass('close-btn fill');
				$('html, body').animate({
					scrollTop: parent_section.offset().top - $('header').height() - 20
				}, 350, function(){
					parent_section.removeClass('all-open');
					parent_section.find('.arrows').removeClass('hide');
				});
			}
		});

	}
}


// Lightbox Init
function lbInit(){
	if($('.lb-items-parent').length){

		$('.lb-item').click(function(event) {
			if($(this).hasClass('lb-img')){
				$('html,body').addClass('lock');
				$(this).addClass('lb-active');
				$('.lb .content').html("<img src='"+$(this).attr('lb-url')+"'>");
				$('.lb .title').html($(this).attr('lb-title'));
				$('.lb').addClass('active');
				var parent_section = $(this).closest('.lb-items-parent');
				$('.lb .pages .total').html(parent_section.find('.lb-item').length);
				$('.lb .pages .current').html($(this).attr('data-index'));

			}else if($(this).hasClass('lb-video')){
				$('html,body').addClass('lock');
				$(this).addClass('lb-active');
				var currentWidth = $(window).width();
				var frameWidth = 0;
				var frameHeight = 0;
				if(currentWidth <= 900 && currentWidth >= 528){
					frameWidth = 512;
					frameHeight = 288;
				}else if(currentWidth > 900 && currentWidth <= 1350){
					frameWidth = 896;
					frameHeight = 504;
				}else if(currentWidth > 1350 && currentWidth <= 1600){
					frameWidth = 1152;
					frameHeight = 648;
				}else if(currentWidth >= 1600){
					frameWidth = 1450;
					frameHeight = 815.63;					
				}

				$('.lb .content').html("<iframe src='https://player.vimeo.com/video/"+$(this).attr('lb-url')+"?autoplay=1&byline=0&portrait=0' width='"+frameWidth+"' height='"+frameHeight+"' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>");
				$('.lb .content-wrap').attr('style', 'max-width:'+frameWidth+'px;flex:0 0 '+frameWidth+'px;');
				$('.lb .title').html($(this).attr('lb-title'));
				$('.lb').addClass('active');
				var parent_section = $(this).closest('.lb-items-parent');
				$('.lb .pages .total').html(parent_section.find('.lb-item').length);
				$('.lb .pages .current').html($(this).attr('data-index'));
			}
		});

		$('.lb-title').click(function(event) {
			event.preventDefault();
			var parent_section = $(this).closest('.lb-item');
			parent_section.click();
		});

		$('.lb .pages .prev').click(function(event) {
			event.preventDefault();
			var data_index = $('.lb-active').attr('data-index');
			var parent_section = $('.lb-active').closest('.lb-items-parent');
			if(data_index == 1){
				data_index = parent_section.find('.lb-item').length;
			}else{
				data_index--;
			}
			$('.lb-active').removeClass('lb-active');
			parent_section.find('.lb-item[data-index="'+data_index+'"]').addClass('lb-active');
			if($('.lb-active').hasClass('lb-img')){
				$('.lb .content').html("<img src='"+$('.lb-active').attr('lb-url')+"'>");
				$('.lb .title').html($('.lb-active').attr('lb-title'));
				$('.lb .current').html($('.lb-active').attr('data-index'));
			}else if($('.lb-active').hasClass('lb-video')){
				var currentWidth = $(window).width();
				var frameWidth = 0;
				var frameHeight = 0;
				if(currentWidth <= 900 && currentWidth >= 528){
					frameWidth = 512;
					frameHeight = 288;
				}else if(currentWidth > 900 && currentWidth <= 1200){
					frameWidth = 896;
					frameHeight = 504;
				}else if(currentWidth > 1200 && currentWidth <= 1600){
					frameWidth = 1152;
					frameHeight = 648;
				}else if(currentWidth >= 1600){
					frameWidth = 1450;
					frameHeight = 815.63;					
				}
				$('.lb .content').html("<iframe src='https://player.vimeo.com/video/"+$('.lb-active').attr('lb-url')+"?autoplay=1&byline=0&portrait=0' width='"+frameWidth+"' height='"+frameHeight+"' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>");
				$('.lb .title').html($('.lb-active').attr('lb-title'));
				$('.lb .current').html($('.lb-active').attr('data-index'));
			}
		});

		$('.lb .pages .next').click(function(event) {
			event.preventDefault();
			var data_index = $('.lb-active').attr('data-index');
			var parent_section = $('.lb-active').closest('.lb-items-parent');
			if(data_index == parent_section.find('.lb-item').length){
				data_index = 1;
			}else{
				data_index++;
			}
			$('.lb-active').removeClass('lb-active');
			parent_section.find('.lb-item[data-index="'+data_index+'"]').addClass('lb-active');
			if($('.lb-active').hasClass('lb-img')){
				$('.lb .content').html("<img src='"+$('.lb-active').attr('lb-url')+"'>");
				$('.lb .title').html($('.lb-active').attr('lb-title'));
				$('.lb .current').html($('.lb-active').attr('data-index'));
			}else if($('.lb-active').hasClass('lb-video')){
				var currentWidth = $(window).width();
				var frameWidth = 0;
				var frameHeight = 0;
				if(currentWidth <= 900 && currentWidth >= 528){
					frameWidth = 512;
					frameHeight = 288;
				}else if(currentWidth > 900 && currentWidth <= 1200){
					frameWidth = 896;
					frameHeight = 504;
				}else if(currentWidth > 1200 && currentWidth <= 1600){
					frameWidth = 1152;
					frameHeight = 648;
				}else if(currentWidth >= 1600){
					frameWidth = 1450;
					frameHeight = 815.63;					
				}
				$('.lb .content').html("<iframe src='https://player.vimeo.com/video/"+$('.lb-active').attr('lb-url')+"?autoplay=1&byline=0&portrait=0' width='"+frameWidth+"' height='"+frameHeight+"' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>");
				$('.lb .title').html($('.lb-active').attr('lb-title'));
				$('.lb .current').html($('.lb-active').attr('data-index'));
			}
		});

		$('.lb .close-btn').click(function(event) {
			event.preventDefault();
			$('html,body').removeClass('lock');
			$('.lb-active').removeClass('active');
			$('.lb.active').removeClass('active');
			$('.lb .content').html('');
			$('.lb .title').html('');
			$('.lb .pages .total').html('');
			$('.lb .pages .current').html('');
		});
	}		
}


// Seasons Init
function seasonsInit(){
	if($('.seasons-nav').length){
		$('.seasons-nav li').click(function(event) {
			console.log('dsadsadas');
			event.preventDefault();
			$('.seasons-nav li.active').removeClass('active')
			$(this).addClass('active');
			var data_year = $(this).attr('data-year');
			$('.loader').addClass('active');
			$('.season.active').removeClass('active');
			$('.season[data-year="'+data_year+'"]').addClass('active');
			$('.season.active .bg').addClass('img-op');
			getMoreVids(1000);
			$('.loader.active').removeClass('active');
		});
	}
}


//Featured Skiffs
function homeSkiffs(){
	if($('.featured-skiffs').length){
		$('.featured-skiffs .skiff').each(function(index, el) {
			var parent_id = $(this).attr('data-parent');
			parent_id = "page-item-"+parent_id;
			$(this).find('.'+parent_id).addClass('current_parent');
		});

		$('.featured-skiffs .boat-nav li').click(function(event) {
			event.preventDefault();
			$('.boat-nav li.active').removeClass('active');
			$(this).addClass('active');
			var data_index = $(this).attr('data-index');
			$('.featured-skiffs .skiff.active').removeClass('active');
			$('.featured-skiffs .skiff[data-index="'+data_index+'"]').addClass('active');
		});

		$('.featured-skiffs .arrows .next i').click(function(event) {
			event.preventDefault();

			if($('.lazy-load').length){
				$('.lazy-load').each(function(index, el) {
					$(this).attr('style', 'background-image:url('+$(this).attr('img-large')+');');
					$(this).removeClass('lazy-load');
				});
			}
			var data_index = $('.featured-skiffs .boat-nav li.active').attr('data-index');
			if(data_index == $('.featured-skiffs .boat-nav li').length){
				data_index = 1;
			}else{
				data_index++;
			}
			$('.featured-skiffs .boat-nav li.active').removeClass('active');
			$('.featured-skiffs .skiff.active').removeClass('active');

			$('.featured-skiffs .boat-nav li[data-index="'+data_index+'"]').addClass('active');
			$('.featured-skiffs .skiff[data-index="'+data_index+'"]').addClass('active');


		});

		$('.featured-skiffs .arrows .prev i').click(function(event) {
			event.preventDefault();

			if($('.lazy-load').length){
				$('.lazy-load').each(function(index, el) {
					$(this).attr('style', 'background-image:url('+$(this).attr('img-large')+');');
					$(this).removeClass('lazy-load');
				});
			}
			var data_index = $('.featured-skiffs .boat-nav li.active').attr('data-index');
			if(data_index == 1){
				data_index = $('.featured-skiffs .boat-nav li').length;
			}else{
				data_index--;
			}
			$('.featured-skiffs .boat-nav li.active').removeClass('active');
			$('.featured-skiffs .skiff.active').removeClass('active');

			$('.featured-skiffs .boat-nav li[data-index="'+data_index+'"]').addClass('active');
			$('.featured-skiffs .skiff[data-index="'+data_index+'"]').addClass('active');


		});
	}
}


//Images Init
function imagesInit(){
	if($('.images .dots').length){
		$('.images .dots .dot').click(function(event) {
			event.preventDefault();
			if($('.lazy-load').length){
				$('.lazy-load').each(function(index, el) {
					$(this).attr('style', 'background-image:url('+$(this).attr('img-large')+');');
					$(this).removeClass('lazy-load');
				});
			}
			var parent_element = $(this).closest('.images');
			parent_element.find('.dots .dot.active').removeClass('active');
			parent_element.find('.image.active').removeClass('active');
			parent_element.find('.image[data-index="'+$(this).attr('data-index')+'"]').addClass('active');
			parent_element.find('.dots .dot[data-index="'+$(this).attr('data-index')+'"]').addClass('active');
		});
	}
}


function gcSort(){
	if($('#gc-sort').length){
		var data_selected = $('#gc-sort').attr('data-selected');
		console.log($('#gc-sort').attr('data-selected'));
		if(data_selected){
			console.log($('#gc-sort').attr('data-selected'));
			$('#gc-sort option').each(function(index, el) {
				if($(this).attr('value') == data_selected){
					$(this).attr('selected', 'selected');
				}
			});
		}
		$('#gc-sort').change(function(event) {
			var data_url = $('#gc-sort').attr('data-url');
			if($('#gc-sort').val() != 'all_areas'){
				data_url = data_url+'?'+$('#gc-sort').val();
			}
			if(data_url != document.location.href){
				document.location.href = data_url;	
			}
		});
	}
}



function playBtn(){
	if($('.play-btn').length){
		$('.play-btn').click(function(event) {
			event.preventDefault();
			$('html,body').addClass('lock');
			$(this).addClass('lb-active');
			var currentWidth = $(window).width();
			var frameWidth = 0;
			var frameHeight = 0;
			if(currentWidth <= 900 && currentWidth >= 528){
				frameWidth = 512;
				frameHeight = 288;
			}else if(currentWidth > 900 && currentWidth <= 1200){
				frameWidth = 896;
				frameHeight = 504;
			}else if(currentWidth > 1200 && currentWidth <= 1600){
				frameWidth = 1152;
				frameHeight = 648;
			}else if(currentWidth >= 1600){
				frameWidth = 1450;
				frameHeight = 815.63;					
			}

			$('.lb .content').html("<iframe src='https://player.vimeo.com/video/"+$(this).attr('data-url')+"?autoplay=1&byline=0&portrait=0' width='"+frameWidth+"' height='"+frameHeight+"' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>");
			$('.lb .content-wrap').attr('style', 'max-width:'+frameWidth+'px;flex:0 0 '+frameWidth+'px;');
			$('.lb .pages').addClass('hide');
			$('.lb').addClass('active');
		});
		$('.lb .close-btn').click(function(event) {
			event.preventDefault();
			$('html,body').removeClass('lock');
			$('.lb-active').removeClass('active');
			$('.lb.active').removeClass('active');
			$('.lb .content').html('');
			$('.lb .title').html('');
			$('.lb .pages .total').html('');
			$('.lb .pages .current').html('');
			$('.lb .pages').removeClass('hide');
		});
	}
}




function navInit(){
	if($('.nav-btn').length){
		$('.nav-btn').click(function(event) {
			event.preventDefault();
			if(!$(this).hasClass('open')){
				$(this).addClass('open');
				$(this).find('#nav-icon3').addClass('open');
				$('html,body').addClass('lock');
				$('nav').addClass('active');
			}else{
				$(this).removeClass('open');
				$(this).find('#nav-icon3').removeClass('open');
				$('html,body').removeClass('lock');
				$('nav').removeClass('active');
			}
		});
		$('.force>a').click(function(event) {
			event.preventDefault();
			if(!$(this).hasClass('active')){
				$(this).addClass('active');
				$(this).closest('.force').addClass('active');
			}else{
				$(this).removeClass('active');
				$(this).closest('.force').removeClass('active');
			}
		});
	}
}




// skiffs spec
function skiffSpecs(){
	if($('.page-skiff-individual .features-specs .title').length){
		$('.page-skiff-individual .features-specs .title p').click(function(event) {
			event.preventDefault();
			$('.page-skiff-individual .features-specs .title p.active').removeClass('active');
			$(this).addClass('active');
			var data_index = $('.page-skiff-individual .features-specs .title p.active').attr('data-index');
			$('.page-skiff-individual .features-specs .description .ce-wrap.active').removeClass('active');
			$('.page-skiff-individual .features-specs .description .ce-wrap[data-index="'+data_index+'"]').addClass('active');
		});
	}
}


// animation out check
function outCheck(){
	if($('.out').length){
		$('.out').each(function(index, el) {
			if($(window).scrollTop() + ($(window).height() * 0.66) > $(this).offset().top){
				$(this).removeClass('out');
			}
		});
	}
}

// bg video
function bgVideo(){
	if($('.img-op-vid-parent').length){
		if($(window).width() > 1220){
			$('.img-op-vid-parent').each(function(index, el) {
				$(this).append('<video class="img-op img-op-vid bg cover center" autoplay loop><source src="'+$(this).attr('mp4-src')+'" type="video/mp4"></video>');
			});
		}
	}
}



function instaInit(){
		if($(window).width() > 1024){
			var downloads_width = $('.insta-feed .insta-slide').width();
			$('.insta-feed .insta-slide').width((downloads_width/3)*$('.entry').length);
		}


		$('.instagram .arrows .next').click(function(event) {
			event.preventDefault();
			if(animateOn == false){
				animateOn = true;
				var parent_section = $(this).closest('section');
				parent_section.find('.entry.lazy-load').each(function(index, el) {
					$(this).find('.bg').attr('style', ''+$(this).find('.bg').attr('data-url')+'');
					$(this).removeClass('lazy-load');
				});
				parent_section.find('.arrows .prev.off').removeClass('off');
				var translate_x = parent_section.find('.insta-slide').attr('translate');
				translate_x = parseInt(translate_x) - parseInt(parent_section.find('.entry').width()) - parseInt(20);
				parent_section.find('.insta-slide').attr('translate', translate_x);
				parent_section.find('.insta-slide').css('transform', 'translateX('+translate_x+'px)');

				setTimeout(function(){
					parent_section.find('.entry.active').first().removeClass('active')
					parent_section.find('.entry.active').last().next().addClass('active');
					if(parent_section.find('.entry').last().hasClass('active')){
						parent_section.find('.arrows .next').addClass('off');
					}
					animateOn = false;
				},500);
			}else{
				return;
			}
		});


		$('.instagram .arrows .prev').click(function(event) {
			event.preventDefault();
			if(animateOn == false){
				animateOn = true;
				var parent_section = $(this).closest('section');
				parent_section.find('.arrows .next.off').removeClass('off');
				var translate_x = parent_section.find('.insta-slide').attr('translate');
				translate_x = parseInt(translate_x) + parseInt(parent_section.find('.entry').width()) + parseInt(20);
				parent_section.find('.insta-slide').attr('translate', translate_x);
				parent_section.find('.insta-slide').css('transform', 'translateX('+translate_x+'px)');

				setTimeout(function(){
					parent_section.find('.entry.active').first().prev().addClass('active')
					parent_section.find('.entry.active').last().removeClass('active');
					if(parent_section.find('.entry').first().hasClass('active')){
						parent_section.find('.arrows .prev').addClass('off');
					}
					animateOn = false;
				},500);
			}else{
				return;
			}
		});
}

function instaResize(){
	if($(window).width() < 1651 && $('.insta-feed .entry.active').length > 3){
		$('.insta-feed .entry.active').removeClass('active');
		$('.insta-feed .insta-slide').css('transform','none');
		$('.insta-feed .insta-slide').attr('translate', '0');

		$('.insta-feed .entry').each(function(index, el) {
			if(index < 3){
				$(this).addClass('active');
			}
		});

	}else if($(window).width() < 1121 && $('.insta-feed .entry.active').length){
		$('.insta-feed .entry').removeClass('active');
		$('.insta-feed .insta-slide').css('width', '100%');
		$('.insta-feed .insta-slide').css('transform','none');
		$('.insta-feed .insta-slide').attr('translate', '0');
	}else if($(window).width() > 1120 && $('.insta-feed .entry.active').length == 0){
		$('.insta-feed .entry').each(function(index, el) {
			if(index < 3){
				$(this).addClass('active');
			}
		});
		if($(window).width() > 1024){
			var downloads_width = $('.insta-feed .insta-slide').width();
			$('.insta-feed .insta-slide').width((downloads_width/3)*$('.entry').length);
		}
		$('.insta-feed .insta-slide').css('transform','none');
		$('.insta-feed .insta-slide').attr('translate', '0');

	}else if($(window).width() > 1650 && $('.insta-feed .entry.active').length == 3){
		$('.insta-feed .entry.active').removeClass('active');
		$('.insta-feed .entry').each(function(index, el) {
			if(index < 4){
				$(this).addClass('active');
			}
		});
		$('.insta-feed .insta-slide').css('transform','none');
		$('.insta-feed .insta-slide').attr('translate', '0');
	}
}


// More Vids Ajax
function getMoreVids(count){
	if($('.season').length){
		if($('.season.active .vid.dn').length){
			$('.loader.active').addClass('active');
		}
		$('.season.active .vid.dn').each(function(index, el) {
			if(index < count){
				var id = $(this).find('.bg').attr('data-url');
				var old_this = $(this);
				var new_this = $(this).find('.bg');
				$.ajax({
				    type:'GET',
				    url: 'http://vimeo.com/api/v2/video/'+id+'.json',
				    jsonp: 'callback',
				    dataType: 'jsonp',
				    success: function(data){
				        var video = data[0];
		        		new_this.attr('img-full',video.thumbnail_large);
		        		new_this.attr('img-large',video.thumbnail_large);
						new_this.css('background-image','url('+video.thumbnail_large+')');
				    }
				});
				$(this).removeClass('dn');
				$('.loader.active').removeClass('active');
			}
		});
	}
}