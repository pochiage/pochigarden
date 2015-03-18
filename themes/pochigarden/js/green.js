jQuery(function(){

	/* boxlink */
	var boxLink = jQuery(".box-link, .box-half, .box-full");
	jQuery(boxLink).click(function(){
      window.location = jQuery(this).find("a").attr("href");
    });


    /* EqualHeight */
	var biggestHeight = 0;
	jQuery('.equal-height').each(function() {
	    if (jQuery(this).height() > biggestHeight) {
	        biggestHeight = jQuery(this).height();
	    }
	}).height(biggestHeight);


    /* Scroll to top */
/*
    jQuery('a[href*=#]:not(#tabs li > a)').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
				target = target.length && target || jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				var targetOffset = target.offset().top;
				jQuery('html, body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
	});
*/
	





	/* jQuery UI Tabs */
// 	jQuery('#tabs').tabs();
});
jQuery("#termlist span").on("click", function() {
      jQuery(this).next().slideToggle();
      jQuery(this).toggleClass("active");
    });

/**
 * 04-02　ウィンドウ上端でグローバルナビゲーションを固定する
 * 04-03　指定した位置でサイドメニューを固定する
 */
$(function(){

	function mediaDetect(query){
		if(window.matchMedia){
			return window.matchMedia(query).matches;
		} else {
			return false;
		}
	}
	
	$(window).on('scroll', function(){
		var scrollValue = $(this).scrollTop();
		//console.log(scrollValue);
		$('.fixedmenu')
		.trigger('customScroll', {posY: scrollValue});
	});

	$('.fixedmenu')
	.each(function(){
		var $this = $(this);
		$this.data('initial', $this.offset().top);
	})
	.on('customScroll', function(event, object){
		//console.log('customScroll %s', object.posY);
		var $this = $(this);
		
		if($this.hasClass('noresponsive') && mediaDetect('(max-width:600px)')){
			//なにもしない
		} else {
			var offsetTop = 0;
			if($this.data('offsettop')) {
				offsetTop = $this.data('offsettop');
			}
		
			if($this.data('initial') - offsetTop <= object.posY) {
				//要素を固定
				if(!$this.hasClass('fixed')) {
					var $substitute = $('<div></div>');
					$substitute
					.css({
						'margin':'0',
						'padding':'0',
						'font-size':'0',
						'height':'0'
					})
					.addClass('substitute')
					.height($this.outerHeight(true))
					.width($this.outerWidth(true));

					$this
					.after($substitute)
					.addClass('fixed background')
					.css({top: offsetTop});
				}
			} else {
				//要素の固定を解除
				$this.next('.substitute').remove();
				$this.removeClass('fixed background');
			}
		}
	});
});
