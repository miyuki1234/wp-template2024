<?php

  //ここに関数の中身を記述

  function add_css_js(){

    //CSSの読み込みはここから
    wp_enqueue_script('jquery');

    //全てのページにstyle.cssを読み込み
    wp_enqueue_style('style', get_template_directory_uri().'/css/style.css', '', date('YmdGi', filemtime(get_template_directory().'/css/style.css')), '');
    wp_enqueue_style('jq_swiper_css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css');
    // wp_enqueue_style('jq_validation_css', get_template_directory_uri() . '/validation/validationEngine.jquery.css');
    wp_enqueue_style( 'validationEngine.jquery.css', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css', array(), '1.0', 'all');

    //JavaScriptの読み込みはここから

    //全てのページにjs/ani.jsを読み込み
    wp_enqueue_script('pagetop', get_template_directory_uri() . '/js/ani.js', array(), '', true);
    wp_enqueue_script('jq_swiper_js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js');
    wp_enqueue_script('jq_swiper_js2', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js');
    // wp_enqueue_script('jq_validation_js', get_template_directory_uri() . '/validation/jquery.validationEngine.js', array(), '', true);
    // wp_enqueue_script('jq_validation_ja_js', get_template_directory_uri() . '/validation/jquery.validationEngine-ja.js', array(), '', true);
    wp_enqueue_script( 'jquery.validationEngine-ja.js', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js', array('jquery'), '2.0.0', true );
    wp_enqueue_script( 'jquery.validationEngine.js', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js', array('jquery'), '2.6.4', true );
    wp_enqueue_script( 'jquery3.6.0', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array('jquery'), '3.6.0', true );

    // ↑↑bodyタグの中で読み込んだ方が良い！
  }

  //関数名add_scripts()を表側で呼び出す
  add_action('wp_enqueue_scripts', 'add_css_js');

  //「Wordpress本体」の自動更新メール通知を停止する
  add_filter('auto_core_update_send_email' , '__return_false');

  // 「プラグイン」の自動更新メール通知を停止する
  add_filter( 'auto_plugin_update_send_email', '__return_false' );

  // 「テーマ」の自動更新メール通知を停止する
  add_filter( 'auto_theme_update_send_email', '__return_false' );

  function wp_shime_setup()
  {
  // サイト名|記事のタイトルをhead内のtitleに表示
      add_theme_support('title-tag');

  // アイキャッチ画像を有効にする
      add_theme_support('post-thumbnails');
  // アイキャッチ画像サイズを追加で定義する
      // add_image_size( 'thumb370', 370, 208, true );
      // add_image_size( 'thumb400', 400, 400, true );

  //bodyクラスにページスラッグと最上の親ページスラッグのクラスを追加
  add_filter( 'body_class', 'add_page_slug_class_name' );
  function add_page_slug_class_name( $classes ) {
    if ( is_page() ) {
      $page = get_post( get_the_ID() );
      $classes[] = $page->post_name;

      $parent_id = $page->post_parent;
      if ( 0 == $parent_id ) {
        $classes[] = get_post($parent_id)->post_name;
      } else {
        $progenitor_id = array_pop( get_ancestors( $page->ID, 'page', 'post_type' ) );
        $classes[] = get_post($progenitor_id)->post_name . '-child';
      }
    }
    return $classes;
  }

  //カテゴリスラッグクラスをbodyクラスに追加
  function add_category_slug_classes_to_body_classes($classes) {
    global $post;
    if ( is_single() ) {
      foreach((get_the_category($post->ID)) as $category)
        $classes[] = $category->category_nicename;
    }
    return $classes;
  }
  add_filter('body_class', 'add_category_slug_classes_to_body_classes');

  // テーマ内にカスタムメニューサポートを自動的に登録する
  register_nav_menus(array(
      'global' => 'Global Menu',
      'sp_global' => 'SP Menu',
      'footer_global' => 'Footer Global Menu',

    ));
  }
  add_action('after_setup_theme', 'wp_shime_setup');

  // パンくずリスト
  if ( ! function_exists( 'custom_breadcrumb' ) ) {
    function custom_breadcrumb() {

      // トップページでは何も出力しないように
      if ( is_front_page() ) return false;

      //そのページのWPオブジェクトを取得
      $wp_obj = get_queried_object();

      echo '<div id="breadcrumb">'.  //id名などは任意で
        '<ul>'.
          '<li>'.
            '<a href="'. esc_url( home_url() ) .'"><span>HOME</span></a>'.
          '</li>';

      if ( is_attachment() ) {

        /**
         * 添付ファイルページ ( $wp_obj : WP_Post )
         * ※ 添付ファイルページでは is_single() も true になるので先に分岐
         */
        $post_title = apply_filters( 'the_title', $wp_obj->post_title );
        echo '<li><span>'. esc_html( $post_title ) .'</span></li>';

      } elseif ( is_single() ) {

        /**
         * 投稿ページ ( $wp_obj : WP_Post )
         */
        $post_id    = $wp_obj->ID;
        $post_type  = $wp_obj->post_type;
        $post_title = apply_filters( 'the_title', $wp_obj->post_title );

        // カスタム投稿タイプかどうか
        if ( $post_type !== 'post' ) {

          $the_tax = "";  //そのサイトに合わせて投稿タイプごとに分岐させて明示的に指定してもよい

          // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
          $tax_array = get_object_taxonomies( $post_type, 'names');
          foreach ($tax_array as $tax_name) {
              if ( $tax_name !== 'post_format' ) {
                  $the_tax = $tax_name;
                  break;
              }
          }

          $post_type_link = esc_url( get_post_type_archive_link( $post_type ) );
          $post_type_label = esc_html( get_post_type_object( $post_type )->label );

          //カスタム投稿タイプ名の表示
          echo '<li>'.
                '<a href="'. $post_type_link .'">'.
                  '<span>'. $post_type_label .'</span>'.
                '</a>'.
              '</li>';

          } else {

            $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示

          }

          // 投稿に紐づくタームを全て取得
          $terms = get_the_terms( $post_id, $the_tax );

          // 投稿自身の表示
          echo '<li><span>'. esc_html( strip_tags( $post_title ) ) .'</span></li>';

      } elseif ( is_page() || is_home() ) {

        /**
         * 固定ページ ( $wp_obj : WP_Post )
         */
        $page_id    = $wp_obj->ID;
        $page_title = apply_filters( 'the_title', $wp_obj->post_title );

        // 親ページがあれば順番に表示
        if ( $wp_obj->post_parent !== 0 ) {
          $parent_array = array_reverse( get_post_ancestors( $page_id ) );
          foreach( $parent_array as $parent_id ) {
            $parent_link = esc_url( get_permalink( $parent_id ) );
            $parent_name = esc_html( get_the_title( $parent_id ) );
            echo '<li>'.
                  '<a href="'. $parent_link .'">'.
                    '<span>'. $parent_name .'</span>'.
                  '</a>'.
                '</li>';
          }
        }
        // 投稿自身の表示
        echo '<li><span>'. esc_html( strip_tags( $page_title ) ) .'</span></li>';

      } elseif ( is_post_type_archive() ) {

        /**
         * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
         */
        echo '<li><span>'. esc_html( $wp_obj->label ) .'</span></li>';

      } elseif ( is_date() ) {

        /**
         * 日付アーカイブ ( $wp_obj : null )
         */
        $year  = get_query_var('year');
        $month = get_query_var('monthnum');
        $day   = get_query_var('day');

        if ( $day !== 0 ) {
          //日別アーカイブ
          echo '<li>'.
                '<a href="'. esc_url( get_year_link( $year ) ) .'"><span>'. esc_html( $year ) .'年</span></a>'.
              '</li>'.
              '<li>'.
                '<a href="'. esc_url( get_month_link( $year, $month ) ) . '"><span>'. esc_html( $month ) .'月</span></a>'.
              '</li>'.
              '<li>'.
                '<span>'. esc_html( $day ) .'日</span>'.
              '</li>';

        } elseif ( $month !== 0 ) {
          //月別アーカイブ
          echo '<li>'.
                '<a href="'. esc_url( get_year_link( $year ) ) .'"><span>'. esc_html( $year ) .'年</span></a>'.
              '</li>'.
              '<li>'.
                '<span>'. esc_html( $month ) .'月</span>'.
              '</li>';

        } else {
          //年別アーカイブ
          echo '<li><span>'. esc_html( $year ) .'年</span></li>';

        }

      } elseif ( is_author() ) {

        /**
         * 投稿者アーカイブ ( $wp_obj : WP_User )
         */
        echo '<li><span>'. esc_html( $wp_obj->display_name ) .' の執筆記事</span></li>';

      } elseif ( is_archive() ) {

        /**
         * タームアーカイブ ( $wp_obj : WP_Term )
         */
        $term_id   = $wp_obj->term_id;
        $term_name = $wp_obj->name;
        $tax_name  = $wp_obj->taxonomy;

        /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */

        // 親ページがあれば順番に表示
        if ( $wp_obj->parent !== 0 ) {

          $parent_array = array_reverse( get_ancestors( $term_id, $tax_name ) );
          foreach( $parent_array as $parent_id ) {
            $parent_term = get_term( $parent_id, $tax_name );
            $parent_link = esc_url( get_term_link( $parent_id, $tax_name ) );
            $parent_name = esc_html( $parent_term->name );
            echo '<li>'.
                  '<a href="'. $parent_link .'">'.
                    '<span>'. $parent_name .'</span>'.
                  '</a>'.
                '</li>';
          }
        }

        // ターム自身の表示
        echo '<li>'.
              '<span>'. esc_html( $term_name ) .'</span>'.
            '</li>';


      } elseif ( is_search() ) {

        /**
         * 検索結果ページ
         */
        echo '<li><span>「'. esc_html( get_search_query() ) .'」で検索した結果</span></li>';


      } elseif ( is_404() ) {

        /**
         * 404ページ
         */
        echo '<li><span>お探しの記事は見つかりませんでした。</span></li>';

      } else {

        /**
         * その他のページ（無いと思うけど一応）
         */
        echo '<li><span>'. esc_html( get_the_title() ) .'</span></li>';

      }

      echo '</ul></div>';  // 冒頭に合わせた閉じタグ

    }
  }

  function my_wp_theme_json_data_theme( $theme_json ){
    $new_data['version'] = 2;
    // カラーパレット カスタマイズ 既存パレットに追加（単色）
    $new_data['settings']['color']['palette'] = array(
      array(
        'name'  => 'マーカーレッド',
        'slug'  => 'marker-red',
        'color' => '#FE4647',
      ),
      array(
        'name'  => 'マーカーオレンジ',
        'slug'  => 'marker-orange',
        'color' => '#FE9123',
      ),
      array(
        'name'  => 'マーカーブルー',
        'slug'  => 'marker-blue',
        'color' => '#0159B0',
      ),
      array(
        'name'  => 'マーカーライトブルー',
        'slug'  => 'marker-light-blue',
        'color' => '#E5F2FE',
      ),
    );
    return $theme_json->update_with( $new_data );
}
add_filter( 'wp_theme_json_data_theme', 'my_wp_theme_json_data_theme' );


  /*  -----------------------------------------
  ブログのパーマリンクから「category」を削除
  -----------------------------------------------------*/
  // function remcat_function($link) {
  // return str_replace("/category/", "/", $link);
  // }
  // add_filter('user_trailingslashit', 'remcat_function');
  // function remcat_flush_rules() {
  // global $wp_rewrite;
  // $wp_rewrite->flush_rules();
  // }
  // add_action('init', 'remcat_flush_rules');
  // function remcat_rewrite($wp_rewrite) {
  // $new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2));
  // $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
  // }
  // add_filter('generate_rewrite_rules', 'remcat_rewrite');

  /* --------------------------------------------------
  パーマリンクからタクソノミー名を削除 2023/6/1ブランクに
  -----------------------------------------------------*/
  function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy){
    return str_replace('/'.$taxonomy.'/', '/', $termlink);
  }
  // add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);
  // ↑2023/6/1ブランクに

  //カスタム投稿タイプ名、タクソノミー名部分に該当するタイプ名・タクソノミー名を入力する
  add_rewrite_rule('works/([^/]+)/?$', 'index.php?work_type=$matches[1]', 'top');
  add_rewrite_rule('works/([^/]+)/page/([0-9]+)/?$', 'index.php?work_type=$matches[1]&paged=$matches[2]', 'top');
  /*
      タクソノミー未選択時に特定のタームを選択
  ----------------------------------------------------- */
  function add_defaultcategory_automatically($post_ID) {
    global $wpdb;
    $curTerm = wp_get_object_terms($post_ID, 'work_type');//タクソノミー名
    if (0 == count($curTerm)) {
      $defaultTerm= array(1);//選択させたいタームID
      wp_set_object_terms($post_ID, $defaultTerm, 'work_type');//タクソノミー名
    }
  }
  add_action('publish_work_type', 'add_defaultcategory_automatically');//publish_カスタム投稿タイプ名


  //検索フォームで「ブログ」のみ対象とする
  function SearchFilter( $query ) {
    if ( $query -> is_search ) {
      $query -> set( 'post_type', 'post' );
    }
    return $query;
  }
  add_filter( 'pre_get_posts', 'SearchFilter' );
  ?>

  <?php
  // 人気記事出力用関数
  function getPostViews($postID){
      $count_key = 'post_views_count';
      $count = get_post_meta($postID, $count_key, true);
      if($count==''){
              delete_post_meta($postID, $count_key);
              add_post_meta($postID, $count_key, '0');
              return "0 View";
      }
      return $count.' Views';
  }
  // 記事viewカウント用関数
  function setPostViews($postID) {
      $count_key = 'post_views_count';
      $count = get_post_meta($postID, $count_key, true);
      if($count==''){
              $count = 0;
              delete_post_meta($postID, $count_key);
              add_post_meta($postID, $count_key, '0');
      }else{
              $count++;
              update_post_meta($postID, $count_key, $count);
      }
  }
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

  // 管理画面 カスタム投稿一覧にカテゴリー(ターム)を表示
  function add_custom_column( $defaults ) {
    $defaults['news_category'] = 'カテゴリー'; // 『news_caetgory』はタクソノミースラッグ(複数設定可)
    return $defaults;
  }
  add_filter('manage_news_posts_columns', 'add_custom_column'); // ここの『news』はカスタム投稿タイプスラッグ
  function add_custom_column_id($column_name, $id) {
    $terms = get_the_terms($id, $column_name);
    if ( $terms && ! is_wp_error( $terms ) ){
      $news_links = array(); // ここの『news』は変えなくてもOKだが、カスタム投稿タイプスラッグがおすすめ
      foreach ( $terms as $term ) {
        $news_links[] = $term->name;
      }
      echo join( ", ", $news_links );
    }
  }
  add_action('manage_news_posts_custom_column', 'add_custom_column_id', 10, 2); // ここの『news』はカスタム投稿タイプスラッグ


  // カスタム投稿でのページネーション
  function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() ) {
      return;
    }
    if ( $query->is_archive( 'news_category' ) ) {
      $query->set( 'posts_per_page', '5' );//表示件数を設定
    }
    if ( $query->is_tax( 'news_category' ) ) {
      $query->set( 'posts_per_page', '5' );//表示件数を設定
    }
  }
  add_action( 'pre_get_posts', 'change_posts_per_page' );


  // 管理画面の投稿カスタマイズ
  function add_block_editor_styles() {
    wp_enqueue_style( 'editor-styles', get_stylesheet_directory_uri() . '/css/editor-styles.css' );
  }
  add_action( 'enqueue_block_editor_assets', 'add_block_editor_styles' );
?>
