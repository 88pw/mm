<?php


/*----------------------------------------------------------
  initial
----------------------------------------------------------*/
register_nav_menus();// メニュー機能init
add_theme_support('post-thumbnails');// サムネイル機能init










/*----------------------------------------------------------
  bagfix
----------------------------------------------------------*/
// AdvancedCustomFieldのGooglemap表示
function my_acf_google_map_api( $api ){
  $api['key'] = 'AIzaSyDsJ-SzT-_l_jXygNh8JoNuTpbgstZyQWs';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');










/*----------------------------------------------------------
  updates
----------------------------------------------------------*/
// WPのメジャーアップデート、マイナーアップデート自動更新
add_filter( 'allow_major_auto_core_updates', '__return_true' );
add_filter( 'allow_minor_auto_core_updates', '__return_true' );
// プラグインの自動更新
add_filter( 'auto_update_plugin', '__return_true' );










/*----------------------------------------------------------
  headclean
----------------------------------------------------------*/
// WPjQuery読み込み拒否
function stop_wp_jq() {
//if ( !is_admin() ) {  wp_deregister_script('jquery'); }
}
add_action('init', 'stop_wp_jq');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );// WPの絵文字機能読み込み拒否
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // WPの絵文字機能読み込み拒否
remove_action( 'wp_head', 'feed_links', 2 ); //サイト全体のフィード
remove_action( 'wp_head', 'feed_links_extra', 3 ); //その他のフィード
remove_action( 'wp_head', 'rsd_link' ); //Really Simple Discoveryリンク
remove_action( 'wp_head', 'wlwmanifest_link' ); //Windows Live Writerリンク
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); //前後の記事リンク
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); //ショートリンク
remove_action( 'wp_head', 'rel_canonical' ); //canonical属性
remove_action( 'wp_head', 'wp_generator' ); //WPバージョン










/*----------------------------------------------------------
  サイドバー登録
----------------------------------------------------------*/
if (function_exists('register_sidebar')) {
    register_sidebar(array(
      'name' => 'サイドバー',
      'id' => 'sidebar',
      'description' => 'サイドバーウィジェット',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget__title title__normal">',
      'after_title' => '</h3>',
   ));
}


/*----------------------------------------------------------
  Restapi内でカテゴリー名・タグ名を取得
----------------------------------------------------------*/
//カテゴリ名を取得する関数を登録
add_action( 'rest_api_init', 'register_category_name' );
  function register_category_name() {
      register_rest_field( 'post',
        'category_name',
          array(
            'get_callback'    => 'get_category_name'
          )
      );
      register_rest_field( 'post',
        'tag_name',
          array(
            'get_callback'    => 'get_tag_name'
          )
      );
      register_rest_route(
        'api/v1',
        '/search/categories/',
        // '/search/categories/(?P<category_name>\d+)',
        array(
          'methods' => 'GET',
          'callback' => 'search_by_categories'
        )
      );
  }


  //$objectは現在の投稿の詳細データが入る
  function get_category_name( $object ) {
    $categories = array();
    $category = get_the_category($object[ 'id' ]);
    
    foreach ($category as $k => $v) {
      $categories[$k]['name'] = $v->cat_name;
      $categories[$k]['slug'] = $v->slug;
      //カテゴリーにカラー設定してた場合
      if(get_field('color','category_'.$v->term_id)) $categories[$k]['color'] = get_field('color','category_'.$v->term_id);
    }
    return $categories;
  }
  function get_tag_name( $object ) {
    $tags = array();
    $tag = get_the_tags($object[ 'id' ]);
    if($tag){
      foreach ($tag as $k => $v) {
        $tags[$k]['name'] = $v->name;
        $tags[$k]['slug'] = $v->slug;
      }
    }else{
      $tags = false;
    }
    return $tags;
  }

  ///////////////////////////////////////////////////////////////////////////////////////////
  //  自分でフォーマットした日付を出す
  ///////////////////////////////////////////////////////////////////////////////////////////
  function get_format_date($object){
    // 日付取得の際のフォーマット指定（フォーマット一覧は下記より）
    // http://php.net/manual/ja/function.date.php
    $format_youbi_en = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
    $format_youbi_js = array("月","火","水","木","金","土","日");
    $youbi = ' '.str_replace($format_youbi_js,$format_youbi_en,get_the_date("D",get_the_id()));
    $format = "Y.m.d";
    return get_the_date($format,get_the_id()).$youbi;
  }
  function register_format_date() {
    register_rest_field( 'post',
      'fdate',
        array(
          'get_callback'    => 'get_format_date'
        )
    );
  }
  add_action( 'rest_api_init', 'register_format_date' );


  ///////////////////////////////////////////////////////////////////////////////////////////
  //  メニューのタイトル下に左部見出しをつける
  ///////////////////////////////////////////////////////////////////////////////////////////
  function description_in_nav_menu($item_output, $item){
    if($item->attr_title){
      return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<span class='nav__label'>{$item->attr_title}</span><", $item_output);
    }else{
      return $item_output;
    }
  }
  add_filter('walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4);


  ///////////////////////////////////////////////////////////////////////////////////////////
  //  自動でpがつくのを防ぐ
  ///////////////////////////////////////////////////////////////////////////////////////////
  // remove_filter ('the_content', 'wpautop');
  remove_filter( 'the_excerpt', 'wpautop' );


  ///////////////////////////////////////////////////////////////////////////////////////////
  //  カスタム投稿タイプの追加
  ///////////////////////////////////////////////////////////////////////////////////////////

function create_post_type() {
  $options = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'thumbnail',  // アイキャッチ画像
    'revisions'  // リビジョン
  ];
  register_post_type( 'car',  // カスタム投稿名
    array(
      'label' => 'カーラインナップ',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'show_in_rest' => true, //APIから取得できるようにするか
      'menu_position' => 5,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      'supports' => $options,  // 投稿画面でどのmoduleを使うか的な設定
      'taxonomies' => array( 'price' ),
    )
  );
}
$price = array(
'label' => '価格帯',
'public' => true,
'show_ui' => true,
'hierarchical' => true,
'show_in_rest' => true,
'show_admin_column'=>true
);
$maker = array(
'label' => 'メーカー',
'public' => true,
'show_ui' => true,
'hierarchical' => true,
'show_in_rest' => true,
'show_admin_column'=>true
);
$obaject_type = array(
  'car'
);
register_taxonomy('price',$obaject_type,$price);
register_taxonomy('maker',$obaject_type,$maker);
add_action( 'init', 'create_post_type' ); // アクションに上記関数をフックします


/*----------------------------------------------------------
  Restapi内でカテゴリー名・タグ名を取得
----------------------------------------------------------*/
//カテゴリ名を取得する関数を登録
add_action( 'rest_api_init', 'register_price_detail' );
  function register_price_detail() {
      register_rest_field( 'car',
        'price_detail',
          array(
            'get_callback'    => 'get_price_detail'
          )
      );
  }
  function get_price_detail( $object ) {
    $prices = object;
    $price = get_term( $object['price'][0], 'price', ARRAY_A );
    if(get_field('color','price_'.$price['term_id'])){
      $color = array('color'=>get_field('color','price_'.$price['term_id']));
      $price = array_merge($price,$color);
    }
    return $price;
  }

add_action( 'rest_api_init', 'register_maker_detail' );
  function register_maker_detail() {
      register_rest_field( 'car',
        'maker_detail',
          array(
            'get_callback'    => 'get_maker_detail'
          )
      );
  }
  function get_maker_detail( $object ) {
    $makers = object;
    $maker = get_term( $object['maker'][0], 'maker', ARRAY_A );
    if(get_field('logo','maker_'.$maker['term_id'])){
      $logo = array('logo'=>get_field('logo','maker_'.$maker['term_id']));
      $maker = array_merge($maker,$logo);
    }
    return $maker;
  }

?>