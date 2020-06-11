<?php
add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );



//カスタムメニュー
register_nav_menu( 'header-nav',  ' ヘッダーナビゲーション ' );
register_nav_menu( 'footer-nav',  ' フッターナビゲーション ' );
//カスタムメニュー







//サイドバーにウィジェット追加
function widgetarea_init() {
register_sidebar(array(
    'name'=>'サイドバー',
    'id' => 'side-widget',
    'before_widget'=>'<div id="%1$s" class="%2$s sidebar-wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar-title">',
    'after_title' => '</h4>'
    ));
}
add_action( 'widgets_init', 'widgetarea_init' );
//サイドバーにウィジェット追加終わり



add_theme_support( 'custom-background', $custom_bgcolor_defaults );




if(trim($GLOBALS['stdata62']) !== ''){
	$heightpx = $GLOBALS['stdata62'];
}else{
	$heightpx = 500;
}
if(trim($GLOBALS['stdata70']) !== ''){
	$headerwidthpx = $GLOBALS['stdata70'];
}else{
	$headerwidthpx = 2200;
}

//カスタムヘッダー呼び出し
add_theme_support( 'custom-header' );
$custom_header = array(
	'random-default' => false,
	'width' => $headerwidthpx,
	'height' => $heightpx,
	'flex-height' => true,
	'flex-width' => false,
	'default-text-color' => '',
	'header-text' => false,
	'uploads' => true,
	'default-image' => get_stylesheet_directory_uri() . '/images/af.png',
);
add_theme_support( 'custom-header', $custom_header );
//カスタムヘッダー呼び出し




//コメント欄
function my_list_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
 
    <div class="comment-listCon">
        <div class="comment-info vcard">
			<span class="comment-author">
            	<?php echo get_avatar( $comment, 32 );//アバター画像 48?>
            	<?php printf(__('名前:<cite class="fn">%s<span class=""></span></cite> :'), get_comment_author_link()); //投稿者の設定 ?>
			</span>
	        <span class="comment-datetime">投稿日：<?php printf(__('%1$s at %2$s'), get_comment_date('Y/m/d'),  get_comment_time('H:i')); //投稿日の設定 ?></span>
            <span class="comment-edit"><?php edit_comment_link(__('Edit'),'  ',''); //編集リンク ?></span>
        </div>
        <?php if ($comment->comment_approved == '0') : //コメント承認前 ?>
            <em><?php _e('Your comment is awaiting moderation.') ?></em>
        <?php endif; ?>
        <div class="comment-text">
        <?php comment_text(); //コメント本文 ?>
        </div>
    </div>
</div>
<?php
}
//コメント欄


