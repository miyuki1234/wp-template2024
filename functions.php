<?php
function add_css_js()
{
    //ここに関数の中身を記述



    //CSSの読み込みはここから
    wp_enqueue_script('jquery');

    //全てのページにstyle.cssを読み込み
    wp_enqueue_style('style', get_template_directzory_uri().'/css/style.css', '', date('YmdGi', filemtime(get_template_directory().'/css/style.css')), '');
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
?>
<?php
//「Wordpress本体」の自動更新メール通知を停止する
add_filter('auto_core_update_send_email' , '__return_false');

// 「プラグイン」の自動更新メール通知を停止する
add_filter( 'auto_plugin_update_send_email', '__return_false' );

// 「テーマ」の自動更新メール通知を停止する
add_filter( 'auto_theme_update_send_email', '__return_false' );
?>
<?php
function wp_shime_setup()
{
// サイト名|記事のタイトルをhead内のtitleに表示
    add_theme_support('title-tag');

// アイキャッチ画像を有効にする
    add_theme_support('post-thumbnails');
// アイキャッチ画像サイズを追加で定義する
    // add_image_size( 'thumb370', 370, 208, true );
    // add_image_size( 'thumb400', 400, 400, true );

// bodyのクラスにページのスラグを追加する
//     add_filter( 'body_class', 'add_page_slug_class_name' );
//
// function add_page_slug_class_name( $classes ) {
//   if ( is_page() ) {
//     $page = get_post( get_the_ID() );
//     $classes[] = $page->post_name;
//   }
//   return $classes;
// }


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



// function shime_widgets_init()
// {
//     register_sidebar(array(
//     'name' => 'Sidebar',
//     'id' => 'sidebar',
//
//     'before_widget' => '<li class="widget-list__item">',
//     'after_widget' => '</li>',
//     'before_title' => '<h2 class="widget-title">',
//     'after_title' => '</h2>',
//   ));
// }
// add_action('widgets_init', 'shime_widgets_init');



// function shime_customize_register($wp_customize)
// {
//     //ここでパネル、セクション、コントロール、セッティングを追加します。
//     $wp_customize->add_section('theme_options', array(
//   'title' => 'Theme Options' ,
//   'priority' => 130,
// ));
//
//     for ($i = 1; $i <= 5; $i++) {
//         $wp_customize->add_setting('front_page_content_' . $i, array(
//   'default' => false,
//   'sanitize_callback' => 'absint',
// ));
//
//         $wp_customize->add_control('front_page_content_' . $i, array(
//   'label' => 'Front Page Content ' . $i,
//   'section' => 'theme_options',
//   'type' => 'dropdown-pages',
//   'allow_addition' => true,
// ));
//     }
// }
// add_action('customize_register', 'shime_customize_register');



// function shime_front_page_template( $template ) {
//   return is_home() ? '' : $template;
// }
// add_filter( 'frontpage_template', 'shime_front_page_template' );

// // ▼▼▼▼▼カスタム投稿を追加▼▼▼▼▼▼
// //ーーーーー①イントラ紹介ーーーーーー
// add_action( 'init', 'custum_post_type' );
// function custum_post_type() {
//     register_post_type( 'instructors',
//         array('labels' =>
//                 array(
//                 'name' => __( 'イントラ紹介' ),
//                 'singular_name' => __( 'イントラ紹介' )
//                 ),
//             'public' => true,
//             'menu_position' => 5, //管理画面の左メニュー何番目に表示させるか
//             'hierarchicla' => true,
//              'menu_icon' => 'dashicons-groups',  // アイコン
//             'supports' => array('title','thumbnail',
//             )
//         )
//     );
// //ーーーーー②タイムテーブルーーーーーー
//     register_post_type( 'timetable',
//         array('labels' =>
//                 array(
//                 'name' => __( 'タイムテーブル' ),
//                 'singular_name' => __( 'タイムテーブル' )
//                 ),
//             'public' => true,
//             'menu_position' => 5, //管理画面の左メニュー何番目に表示させるか
//             'hierarchicla' => true,
//              'menu_icon' => 'dashicons-schedule',  // アイコン
//             'supports' => array('title','thumbnail',
//             )
//         )
//     );
// }
// // ▼▼▼▼▼カスタムフィールドを作成▼▼▼▼▼
// //ーーーーー①イントラ紹介ーーーーーー
// // カスタムフィールドボックスを作成
// function add_instructors_fields() {
// 	add_meta_box( 'instructors_setting', 'インストラクター登録', 'insert_instructors_fields', 'instructors', 'normal');
// }
// add_action('admin_menu', 'add_instructors_fields');
//
// // カスタムフィールドの入力エリアを設定
// function insert_instructors_fields() {
// 	global $post;
// 	echo '<p style="display:inline-block; width:140px; vertical-align:top; margin-top:0;">プロフィール：</p>  <textarea name="ir_profile" cols="50" rows="5" value="'.get_post_meta($post->ID, 'ir_profile', true).'">' .get_post_meta($post->ID, 'ir_profile', true). '</textarea><br><br>';
// 	echo '<p style="display:inline-block; width:140px; vertical-align:top; margin-top:0;">経歴：  </p><textarea name="ir_career" cols="50" rows="5" value="'.get_post_meta($post->ID, 'ir_career', true).'">' .get_post_meta($post->ID, 'ir_career', true). '</textarea><br><br>';
// 	echo '<p style="display:inline-block; width:140px;">YouTube URL：</p> <input type="url" name="ir_youtube" value="'.get_post_meta($post->ID, 'ir_youtube', true).'" size="50" />　<br><br>';
//   echo '<p style="display:inline-block; width:140px; vertical-align:top; margin-top:0;">クラス情報：</p>  <textarea name="ir_class" cols="50" rows="5" value="'.get_post_meta($post->ID, 'ir_class', true).'">' .get_post_meta($post->ID, 'ir_class', true). '</textarea><br><br>';
// }
//
// // カスタムフィールドの値を保存させる
// function save_instructors_fields( $post_id ) {
//
// 	if(!empty($_POST['ir_profile'])){
// 		update_post_meta($post_id, 'ir_profile', $_POST['ir_profile'] );
// 	}else{
// 		delete_post_meta($post_id, 'ir_profile');
// 	}
//
// 	if(!empty($_POST['ir_career'])){
// 		update_post_meta($post_id, 'ir_career', $_POST['ir_career'] );
// 	}else{
// 		delete_post_meta($post_id, 'ir_career');
// 	}
//
// 	if(!empty($_POST['ir_youtube'])){
// 		update_post_meta($post_id, 'ir_youtube', $_POST['ir_youtube'] );
// 	}else{
// 		delete_post_meta($post_id, 'ir_youtube');
// 	}
//
// 	if(!empty($_POST['ir_class'])){
// 		update_post_meta($post_id, 'ir_class', $_POST['ir_class'] );
// 	}else{
// 		delete_post_meta($post_id, 'ir_class');
// 	}
//
// }
// add_action('save_post', 'save_instructors_fields');
//
//
// // ▼▼▼▼▼カスタムフィールドを作成▼▼▼▼▼
// //ーーーーー②タイムテーブルーーーーーー
// // カスタムフィールドボックスを作成
// function add_timetable_fields() {
// 	add_meta_box( 'timetable_setting', 'タイムテーブル登録', 'insert_timetable_fields', 'timetable', 'normal');
// }
// add_action('admin_menu', 'add_timetable_fields');
//
// // カスタムフィールドの入力エリアを設定
// function insert_timetable_fields() {
// 	global $post;
//
// 	echo '<p style="display:inline-block; width:140px;">曜日：</p> <input type="text" name="class_day" value="'.get_post_meta($post->ID, 'class_day', true).'" size="50" />　<br><br>';
// 	echo '<p style="display:inline-block; width:140px;">時間：</p> <input type="text" name="class_time" value="'.get_post_meta($post->ID, 'class_time', true).'" size="50" />　<br><br>';
// 	echo '<p style="display:inline-block; width:140px; vertical-align:top; margin-top:0;">クラス名（略称）：  </p><textarea name="class_name" cols="50" rows="5" value="'.get_post_meta($post->ID, 'class_name', true).'">' .get_post_meta($post->ID, 'class_name', true). '</textarea><br><br>';
// 	echo '<p style="display:inline-block; width:140px; vertical-align:top; margin-top:0;">クラス説明：  </p><textarea name="class_exp" cols="50" rows="5" value="'.get_post_meta($post->ID, 'class_exp', true).'">' .get_post_meta($post->ID, 'class_exp', true). '</textarea><br><br>';
//
//
// }
//
// // カスタムフィールドの値を保存させる
// function save_timetable_fields( $post_id ) {
//
// 	if(!empty($_POST['class_day'])){
// 		update_post_meta($post_id, 'class_day', $_POST['class_day'] );
// 	}else{
// 		delete_post_meta($post_id, 'class_day');
// 	}
//
// 	if(!empty($_POST['class_time'])){
// 		update_post_meta($post_id, 'class_time', $_POST['class_time'] );
// 	}else{
// 		delete_post_meta($post_id, 'class_time');
// 	}
//
// 	if(!empty($_POST['class_name'])){
// 		update_post_meta($post_id, 'class_name', $_POST['class_name'] );
// 	}else{
// 		delete_post_meta($post_id, 'class_name');
// 	}
//
// 	if(!empty($_POST['class_exp'])){
// 		update_post_meta($post_id, 'class_exp', $_POST['class_exp'] );
// 	}else{
// 		delete_post_meta($post_id, 'class_exp');
// 	}
// }
// add_action('save_post', 'save_timetable_fields');

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

        //▼▼▼20230307ブランクに

        // タクソノミーが紐づいていれば表示
        // if ( $terms !== false ) {
        //
        //   $child_terms  = array();  // 子を持たないタームだけを集める配列
        //   $parents_list = array();  // 子を持つタームだけを集める配列
        //
        //   //全タームの親IDを取得
        //   foreach ( $terms as $term ) {
        //     if ( $term->parent !== 0 ) {
        //       $parents_list[] = $term->parent;
        //     }
        //   }
        //
        //   //親リストに含まれないタームのみ取得
        //   foreach ( $terms as $term ) {
        //     if ( ! in_array( $term->term_id, $parents_list ) ) {
        //       $child_terms[] = $term;
        //     }
        //   }
        //
        //   // 最下層のターム配列から一つだけ取得
        //   $term = $child_terms[0];
        //
        //   if ( $term->parent !== 0 ) {
        //
        //     // 親タームのIDリストを取得
        //     $parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );
        //
        //     foreach ( $parent_array as $parent_id ) {
        //       $parent_term = get_term( $parent_id, $the_tax );
        //       $parent_link = esc_url( get_term_link( $parent_id, $the_tax ) );
        //       $parent_name = esc_html( $parent_term->name );
        //       echo '<li>'.
        //             '<a href="'. $parent_link .'">'.
        //               '<span>'. $parent_name .'</span>'.
        //             '</a>'.
        //           '</li>';
        //     }
        //   }
        //
        //   $term_link = esc_url( get_term_link( $term->term_id, $the_tax ) );
        //   $term_name = esc_html( $term->name );
        //   // 最下層のタームを表示
        //   echo '<li>'.
        //         '<a href="'. $term_link .'">'.
        //           '<span>'. $term_name .'</span>'.
        //         '</a>'.
        //       '</li>';
        // }

        //▲▲▲20230307ブランクに

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

// ブログエディタでのカラー追加
add_theme_support('editor-color-palette', [
    [
        'name'  => 'マーカーオレンジ',
        'slug'  => 'marker-orange',
        'color' => '#F5C883',
    ],
    [
        'name'  => 'マーカーターコイズ',
        'slug'  => 'marker-turquoise',
        'color' => '#ECF7F7',
    ],
]);
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
?>
