'use strict';
//フェイドイン部分の記述 -->
$(window).on('load scroll', function() {
   $(".show").each(function() {
      var winScroll = $(window).scrollTop();
      var winHeight = $(window).height();
      var scrollPos = winScroll + (winHeight * 0.9);
      if($(this).offset().top < scrollPos) {
         $(this).css({opacity: 1, transform: 'translate(0, 0)'});
      }
   });
});

//★スムーズスクロール部分の記述 -->
$(function(){
  $('a[href^="#"]').click(function(){
    var adjust = 0;
    var speed = 400;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top + adjust;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
});
//モーダルウィンドウ
$(function () {
  $('.openModal').click(function(){
      // 投稿ID取得
      var id = $(this).data("id");
      $('.modalArea[data-id="'+id+'"]').fadeIn();
  });
  $('#closeModal , #modalBg').click(function(){
    $('.modalArea').fadeOut();
  });
});
