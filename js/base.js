'use strict';

//★ハンバーガーメニューの挙動 -->
$(".openbtn1").click(function () {//ボタンがクリックされたら
	$(this).toggleClass('active');//ボタン自身に activeクラスを付与し
  $(".sp-menu__wrapper").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
  $(".header-area").toggleClass('nav-opened');//ナビにnav-openedクラスを付与（背景を黒にする）
});
$(".header-sp-nav a").on("click", function() {
$(".openbtn1").removeClass("active");
$(".sp-menu__wrapper").removeClass("panelactive");
$(".header-area").removeClass("nav-opened");

});

//スライダー部分の記述 -->
$(function(){
	var swiperTop = new Swiper('.top-slider', {
		loop: true,
		effect: 'fade',
		slidesPerView: 1,
		spaceBetween: 0,
		speed: 5000,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
	});
});


//アコーディオンをクリックした時の動作
$('.accordion-title').on('click', function() {//タイトル要素をクリックしたら
	var findElm = $(this).next(".box");//直後のアコーディオンを行うエリアを取得し
	$(findElm).slideToggle();//アコーディオンの上下動作

	if($(this).hasClass('close')){//タイトル要素にクラス名closeがあれば
		$(this).removeClass('close');//クラス名を除去し
	}else{//それ以外は
		$(this).addClass('close');//クラス名closeを付与
	}
});

//ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
$(window).on('load', function(){
	$('.accordion-area li:first-of-type section').addClass("open"); //accordion-areaのはじめのliにあるsectionにopenクラスを追加
	$(".open").each(function(index, element){	//openクラスを取得
		var Title =$(element).children('.accordion-title');	//openクラスの子要素のtitleクラスを取得
		$(Title).addClass('close');				//タイトルにクラス名closeを付与し
		var Box =$(element).children('.box');	//openクラスの子要素boxクラスを取得
		$(Box).slideDown(500);					//アコーディオンを開く
	});
});
//記事ページで「表示」ボタンを押した際のスクロール防止
jQuery(function($){
	$('.toc-hide').on('click', function(e) {
		e.preventDefault();
		$(this).parents('.toc-container').slideUp();
	});
});
