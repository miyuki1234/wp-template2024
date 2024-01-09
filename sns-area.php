<!-- ーーーSNSシェアボタンーーー -->
<?php
  $url_encode=urlencode(get_permalink());
  $title_encode=urlencode(get_the_title()).'｜'.get_bloginfo('name');
?>

<!-- ▼コンテンツ中のsnsシェアボタン -->
<div class="sns-btn-flex">
  <p class="text_theme_s ta-center">＼よかったらシェアしてください／</p><!-- .text_theme_s -->
  <ul class="sns-list">
    <li><a class="flowbtn2 fl_tw1" href="//twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="fab fa-twitter"></i><span>Twitter</span></a></li>

    <li><a class="flowbtn2 fl_fb1" href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>

    <li><a class="flowbtn2 fl_hb1" href="//b.hatena.ne.jp/entry/<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;"><span>Hatena</span></a></li>

    <li><a class="flowbtn2 fl_li1" href="//social-plugins.line.me/lineit/share?url=<?php echo $url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;"><i class="fab fa-line"></i><span>LINE</span></a></li>
  </ul>
</div><!-- .sns-btn-flex -->

<!-- ▼追従型のsnsシェアボタン -->
<div class="sns-btn-absolute">
  <ul class="sns-list">
    <li><a class="flowbtn1 fl_tw1" href="//twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="fab fa-twitter"></i></a></li>

    <li><a class="flowbtn1 fl_fb1" href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><i class="fab fa-facebook-f"></i></a></li>

    <li><a class="flowbtn1 fl_hb1" href="//b.hatena.ne.jp/entry/<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;"><img src="<?php bloginfo('template_url'); ?>/images/icon_hateb.svg"></a></li>

    <li><a class="flowbtn1 fl_li1" href="//social-plugins.line.me/lineit/share?url=<?php echo $url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;"><i class="fab fa-line"></i></a></li>
  </ul>
</div><!-- .sns-btn-absolute -->
