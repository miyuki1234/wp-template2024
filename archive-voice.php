<?php get_header(); ?>


  <main class="main-area">



    <!-- ーーートップビューーーー -->
    <div class="page-top-view bg-normal">
      <div class="page-top-view__inner">

        <div class="title__outer">
          <h2 class="title-j_l show slide-bottom">
            お客様の声
          </h2><!-- .title-j_l-ja -->
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

  <!-- ーーー1.お知らせーーー -->
  <section class="page-section-01 page-section section-black">
    <div class="page-section-01__inner page-section__inner last-section__inner">



      <div class="list-boxes">

        <?php if (have_posts() ): ?>

          <?php while (have_posts() ): ?>
            <?php the_post(); ?>



            <div class="list-box">


              <div class="box-container">

                <div class="zoomInRotate">
                  <a href="<?php the_permalink() ?>">
                    <span class="mask">
                      <?php
                      if ( has_post_thumbnail() ) {
                        the_post_thumbnail('large');
                      }else{ ?>
                        <img src="<?php bloginfo('template_url'); ?>/images/img_no-image.jpg">
                      <?php } ?>
                    </span>
                  </a>
                </div>

                <div class="contents-area">



                    <span class="text-j_2s">
                      <?php the_field('symptoms'); ?>
                    </span>

                    <a href="<?php the_permalink() ?>">
                      <p class="title-j_s">
                        <?php the_title(); ?>
                      </p><!-- .client-name -->
                    </a>

                    <p class="text-j_2s">
                      <?php
                      if(mb_strlen($post->post_content,'UTF-8')>80){
                      	$content= str_replace('\n', '', mb_substr(strip_tags($post-> post_content), 0, 80,'UTF-8'));
                      	echo $content.'……';
                      }else{
                      	echo str_replace('\n', '', strip_tags($post->post_content));
                      }
                      ?>
                    </p><!-- .client-name -->
                </div><!-- .contents-area -->
              </div><!-- .box-container -->


            </div><!-- .list-box -->


          <?php endwhile; ?>

        <?php else : ?>
          <p class="text-j_s">まだ投稿がありません。</p>
        <?php endif; ?>

      </div><!-- .list-boxes -->



       <div class="pagination-area">
         <?php
       $args = array(
           'mid_size' => 1,
           'prev_text' => '&lt;',
           'next_text' => '&gt;',
           'screen_reader_text' => ' ',
       );
       the_posts_pagination($args);
       ?>
       </div><!-- .pagination-area -->



    </div><!-- .page-section-01__inner -->
  </section><!-- .page-section-01 -->



<?php get_template_part('blog-banner'); ?>

<?php get_template_part('contact-banner'); ?>

<?php get_template_part('contact-area'); ?>


</main><!-- .main-area-->


      <?php get_footer(); ?>
