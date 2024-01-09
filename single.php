<?php get_header(); ?>

<script>
jQuery(function($){
    $('.toc_toggle a').on('click', function(e) {
        e.preventDefault();
        $(this).parents('.toc-container').slideUp();
    });
});
</script>




    <main class="main-area">


      <!-- ーーートップビューーーー -->
      <div class="page-top-view bg-blog">
        <div class="page-top-view__inner">

          <div class="title__outer">
            <h2 class="title_theme_l font-en ta-center show slide-bottom">
              ブログ
            </h2><!-- .title_theme_l-ja -->
          </div><!-- .title__outer -->


          <!-- ーーーパンくずリストーーー -->
          <div class="breadcrumb-area">
            <div class="breadcrumb-area__inner">
              <div id="breadcrumb">
                <?php custom_breadcrumb(); ?>
              </div><!-- #breadcrumb -->
            </div><!-- .breadcrumb-area__inner -->
          </div><!-- .breadcrumb-area -->
        </div><!-- .page-top-view__inner -->
      </div><!-- .page-top-view -->




    <!-- ーーーコンテンツーーー -->
    <!-- ーーーブログ用２カラムーーー -->
    <div class="postpage-box">
      <div class="postpage-box__inner">



      <!-- ーーー1.お知らせーーー -->

      <div class="mainbar">

        <!-- ーーー1.お知らせーーー -->
        <section class="page-section-01 page-section last-section">
          <div class="page-section-01__inner page-section__inner">

            <?php if (have_posts() ): ?>

              <?php while (have_posts() ): ?>
                <?php the_post(); ?>

            <article class="article-area">

              <h3 class="title_theme_m">
                <?php the_title(); ?>
              </h3><!-- .title_theme_l-sub2-ja -->

              <?php if( get_the_time('Ymd') !== get_the_modified_date('Ymd')){ ?>
                <span title="更新日" class="modified-day text_theme_2s">
                  <i class="fa-solid fa-arrows-rotate"></i><time itemprop="dateModified" datetime="<?php the_modified_date('c');?>"><?php the_modified_date('Y.m.d'); ?></time>
                </span>
              <?php } ?>
              <span title="公開日" class="published-day text_theme_2s">
                <i class="fa-regular fa-calendar-days"></i><time itemprop="datePublished" datetime="<?php the_time('c');?>"><?php the_time('Y.m.d');?></time>
              </span>


              <?php $cat = the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>











            <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail('');
            }else{ ?>
              <img src="<?php bloginfo('template_url'); ?>/images/img_no-image.jpg">
            <?php } ?>

            <div class="article-contents-area">
              <?php the_content(); ?>


              <div class="btn-area">
                <p class="text_theme_s slash-message ta-center">＼インソールや痛み等、ご相談はお気軽に／</p><!-- .text_theme_s -->
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-orange">お問い合わせ</a>
              </div><!-- .btn-area -->

            </div><!-- .article-contents-area -->




          <?php endwhile; ?>

        <?php endif; ?>




          </article><!-- .article-area -->


          <?php get_template_part( 'sns-area' ); ?>





            <!-- 関連記事 -->
            <?php if( has_category() ) : //表示中の投稿に登録されているカテゴリがある場合のみ下記実行 ?>
          <?php
          //表示中の投稿に登録されているカテゴリID（term_id）を全て取得
          $categories = get_the_category();
          $cat_term_ids = array();
          foreach($categories as $category){
          	$cat_term_ids[] = $category->term_id; //cat_ID でも同じ
          }

          //関連記事取得用クエリパラメーター
          $args = array(
          	'post_type' => 'post',	//投稿を指定 （固定ページの場合は 'page'）
          	'posts_per_page' => '6',	//取得する件数
          	'ignore_sticky_posts' => true,	//「トップに固定」した投稿は除く
          	'post__not_in' => array( $post->ID ),	//除外する投稿（本記事）
          	'category__in' => $cat_term_ids,	//対象となるカテゴリID（配列）
          	'orderby' => 'rand'	//表示順をランダムにしてい（日付順の場合は 'date'）
          	);
          $the_query = new WP_Query( $args );	//クエリ実行
          ?>

          <?php if( $the_query->post_count > 0 ) : //該当する投稿が１件以上あったら下記出力 ?>
          <div class="related_post">
          	<h4 class="title_theme_m">その他の関連記事</h4>
          	<ul class="related_post_container">
          		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          			<li>
          				<div class="related_thumb">
          					<a href="<?php the_permalink(); ?>">
                      <span class="mask">
                        <?php
                        if ( has_post_thumbnail() ) {
                          the_post_thumbnail('');
                        }else{ ?>
                          <img src="<?php bloginfo('template_url'); ?>/images/img_no-image.jpg">
                        <?php } ?>
                      </span>
          				</div>
          				<p class="text_theme_2s"><?php echo wp_trim_words(get_the_title(), 48, "…", "UTF-8"); ?></p>
          			</a>

                <?php if( get_the_time('Ymd') !== get_the_modified_date('Ymd')){ ?>
                  <span title="更新日" class="modified-day text_theme_2s">
                    <i class="fa-solid fa-arrows-rotate"></i><time itemprop="dateModified" datetime="<?php the_modified_date('c');?>"><?php the_modified_date('Y.m.d'); ?></time>
                  </span>
                <?php } ?>
                <span title="公開日" class="published-day text_theme_2s">
                  <i class="fa-regular fa-calendar-days"></i><time itemprop="datePublished" datetime="<?php the_time('c');?>"><?php the_time('Y.m.d');?></time>
                </span>


                <span class="post-categories_no-link text_theme_3s">
                  <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
                </span><!-- .post-category_no-link -->



              </li>
          		<?php endwhile; ?>
          		<?php wp_reset_postdata(); ?>
          	</ul>
          </div>
          <?php endif; // end of "if( $the_query->post_count > 0 )" ?>
          <?php endif; // end of "if( has_category() )" ?>



          </div><!-- .section-01__inner -->
        </section><!-- .section-01 -->



      </div><!-- .mainbar -->



      <?php get_template_part('sidebar'); ?>

  </div><!-- .postpage-box__inner -->
</div><!-- .postpage-box -->

      <?php get_template_part('contact-area'); ?>

      <?php get_template_part('contact-banner'); ?>



    </main><!-- .main-area-->


      <?php get_footer(); ?>
